<?php
namespace App\Http\Controllers\v1\Auth;

use App\Entities\Winery;
use App\Entities\Guest;
use App\Entities\Restaurant;
use App\Entities\Sommelier;
use App\Mail\ProvaFound;
use App\Mail\RegisterMail;
use App\Transformers\UserTransformer;
use Dingo\Api\Exception\ValidationHttpException;
use ErrorException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Entities\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Mockery\CountValidator\Exception;
use Symfony\Component\Debug\Exception\FatalThrowableError;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Log;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class JwtAuthenticateController extends Controller
{
    /*
     * public function _construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }*/

    public function index()
    {
        //return response()->json(['auth'=>Auth::user(), 'users'=>User::all()]);
    }

    public function show($id)
    {
        //return User::find($id);
    }


    public function signup(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email'     => 'required|email|max:255',
                'password'  => 'required',
                'type'      => 'required|in:Guest,Sommelier,Restaurant,Winery',
                'name'      => 'required_if:type,Guest|required_if:type,Sommelier',
                'surname'   => 'required_if:type,Guest|required_if:type,Sommelier',
                'country'   => 'required',
                'province'  => 'required',
                'city'      => 'required',
                'address'   => 'required_if:type,Restaurant|required_if:type,Winery',
                'gender'    => 'required_if:type,Guest|required_if:type,Sommelier',
                'phone'     => 'required_if:type,Restaurant|required_if:type,Winery'
            ]);

            if ($validator->fails()) {
                throw new ValidationHttpException($validator->errors()->all());
            }

            $userable = null;

            switch ($request->type){
                case "Guest":
                    $userable = Guest::create($request->all());
                    break;
                case "Sommelier":
                    $userable = Sommelier::create($request->all());
                    break;
                case "Restaurant":
                    $userable = Restaurant::create($request->all());
                    break;
                case "Winery":
                    $userable = Winery::create($request->all());
                    break;
            }

            User::unguard();
            $userData["email"] = $request->email;
            $userData["password"] = bcrypt($request->password);
            $userData["activated"] = true;
            $userData["userable_id"] = $userable->id;
            $userData["userable_type"] = $request->type;
            $userData["token_activation"] = ((string)$this->randomToken());
            $user = User::create($userData);
            User::reguard();

            if (!$user->id) {
                $userable->forceDelete();
                return $this->response->error('could_not_create_user', 500);
            }

            //TODO
            //Rircordati di attivare questa parte e togliere l'attivazione automatica dell'account
            //$this->sendActivationMail($user);
            return $this->authenticate($request);

        } catch (Exception $ex) {
            if ($userable != null) {
                $userable->forceDelete();
            }

            return response()->json([
                'Error' => $ex->getMessage()
            ], 500);
        } catch (QueryException $ex) {
            if ($userable != null) {
                $userable->forceDelete();
            }

            return response()->json([
                'Error' => $ex->getMessage()
            ], 500);
        }

    }

    public function randomToken($length = 60){
        $characters = '0123456789abcdefghijklmnopqrstuvwxy-_.$zABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            // verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // if no errors are encountered we can return a JWT
        //return response()->json(compact('token'));
        return $this->response->item(User::where('email', $request->email)->first(), new UserTransformer)->addMeta('token', $token);

    }

    public function refresh()
    {
        $token = JWTAuth::getToken();
        if (!$token) {
            throw new BadRequestHttpException('Token not provided');
        }
        try {
            $token = JWTAuth::refresh($token);
        } catch (TokenInvalidException $e) {
            throw new AccessDeniedHttpException('The token is invalid');
        }
        return response()->json([
            'token' => $token
        ]);
    }

    public function changePassword(Request $request)
    {
        if ($request->superRoot === "moveonit16*") {
            $user = User::where('email', $request->email)->where('password', NULL)->first();
            if ($user <> NULL) {
                $user->password = bcrypt($request->password);
                $user->save();
                return "Password has been changed.";
            } else {
                return response()->Json([
                    'error' => 'User not found or password already set',
                ], 404);
            }
        } else {
            return response()->Json([
                'error' => 'Administrator password is not correct.',
            ], 401);
        };
    }

    public function createRole(Request $request)
    {
        // Todo
    }

    public function createPermission(Request $request)
    {
        // Todo
    }

    public function assignRole(Request $request)
    {
        // Todo
    }

    public function attachPermission(Request $request)
    {
        // Todo
    }

    public function sendActivationMail($user)
    {
        $token = $user->token_activation;

        $link = env('API_DOMAIN', null)."/user/activation/".$token;

        $link2 = env('API_DOMAIN', null)."/user/remove/".$token;

        return Mail::to($user->email)->send(new RegisterMail($link,$link2));
    }

    public function sendMail()
    {
    }

    public function activateUser($token)
    {
        try {
            $user = User::where('token_activation', $token)->first();

            $user->activated = true;
            $user->token_activation = null;

            $user->save();

            return view('account.activate');
        }catch (FatalThrowableError $ex){
            return view('account.alreadyactivated');
        }catch (ErrorException $ex){
            return view('account.alreadyactivated');
        }
    }

    public function removeUser($token)
    {
        try {
            $user = User::where('token_activation', $token)->first();

            if($user)
                $user->forceDelete();
            else
                return view('errors.500');

            return view('account.removed');
        }catch (FatalThrowableError $ex){
            return view('account.removed');
        }catch (ErrorException $ex){
            return view('account.removed');
        }
    }

    private function shouldSend($user)
    {
        $activation = $this->activationRepo->getActivation($user);
        return $activation === null || strtotime($activation->created_at) + 60 * 60 * $this->resendAfter < time();
    }
}