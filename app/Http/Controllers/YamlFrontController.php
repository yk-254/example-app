<?php

namespace App\Http\Controllers\Api;

use App\Models\YamlFront;
use App\Services\YamlFrontService;
use App\Http\Requests\YamlFrontRequest;

class YamlFrontController extends AbstractController
{
    /**
     * YamlFrontController constructor.
     *
     * @param YamlFront $model
     * @param YamlFrontService $service
     */
    public function __construct(YamlFront $model, YamlFrontService $service)
    {
        parent::__construct($model, $service, new YamlFrontRequest());
    }

}
