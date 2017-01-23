<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Pagination\LengthAwarePaginator;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Manager;

class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Helpers;

    public function trasformPaginate(LengthAwarePaginator $paginator,$transformer)
    {
        if($paginator->isEmpty())
            return response('', 204);

        $fractal = new Manager();
        $models = $paginator->getCollection();

        $resource = new Collection($models, new $transformer);
        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        // Turn all of that into a JSON string
        return response()->json($fractal->createData($resource)->toJson());
    }

    public function transformModel($model, $transformer)
    {
        if ($model == null)
            return response('', 204);

        $fractal = new Manager();
        $models[0] = $model;
        $resource = new Collection($models, $transformer);
        return response()->json($fractal->createData($resource)->toJson());

    }
}
