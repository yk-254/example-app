<?php

namespace App\Http\Controllers\Api;

use App\Models\File;
use App\Services\FileService;
use App\Http\Requests\FileRequest;

class FileController extends AbstractController
{
    /**
     * FileController constructor.
     *
     * @param File $model
     * @param FileService $service
     */
    public function __construct(File $model, FileService $service)
    {
        parent::__construct($model, $service, new FileRequest());
    }

}
