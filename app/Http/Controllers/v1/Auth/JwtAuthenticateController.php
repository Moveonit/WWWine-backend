<?php
namespace App\Http\Controllers\v1\Auth;

use App\Entities\Guest;
use App\Transformers\UserTransformer;
use Dingo\Api\Exception\ValidationHttpException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Entities\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Mockery\CountValidator\Exception;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
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
        $guest_id = 0;
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|max:255',
                'password' => 'required',
                'type' => 'required|in:guest,sommelier,restaurant,cellar',
                'name' => 'required',
                'state' => 'required',
                'province' => 'required',
                'surname' => 'required',
                'city' => 'required',
                'address' => 'required',
                'birthday' => 'required|date',
                'gender' => 'required'
            ]);

            if ($validator->fails()) {
                throw new ValidationHttpException($validator->errors()->all());
            }

            $guest = Guest::create($request->all());

            $guest_id = $guest->id;

            User::unguard();
            $userData["email"] = $request->email;
            $userData["password"] = bcrypt($request->password);
            $userData["userable_id"] = $guest->id;
            $userData["userable_type"] = "Guest";
            $user = User::create($userData);
            User::reguard();

            if (!$user->id) {
                return $this->response->error('could_not_create_user', 500);
            }

            //if($hasToReleaseToken) {
            return $this->authenticate($request);
            //}

            //return $this->response->created();
        } catch (Exception $ex) {
            if ($guest_id > 0) {
                $guest = Guest::find($guest_id);

                $guest->forceDelete();
            }

            return response()->json([
                'Error' => $ex->getMessage()
            ]);
        } catch (QueryException $ex) {
            if ($guest_id > 0) {
                $guest = Guest::find($guest_id);

                $guest->forceDelete();
            }

            return response()->json([
                'Error' => $ex->getMessage()
            ]);
        }

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
            throw new BadRequestHtttpException('Token not provided');
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
}