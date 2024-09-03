<?php

namespace Tests\Feature\Crud;

use Tests\TestCase;
use App\Models\File;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;

class FileTest extends BaseCrudTest
{

    use RefreshDatabase;

    protected $myResource;
    protected $model;
    protected $data;
    protected $endpoint;
    protected $add;

    protected function setUp()
    {
        parent::setUp();
        $this->endpoint = '/api/v1/files';
        $this->data = [
            'name' => "Meu novo CRUD de Files",
        ];
        $this->model = File::create($this->data);
    }

}
