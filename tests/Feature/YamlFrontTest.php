<?php

namespace Tests\Feature\Crud;

use Tests\TestCase;
use App\Models\YamlFront;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;

class YamlFrontTest extends BaseCrudTest
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
        $this->endpoint = '/api/v1/yaml-fronts';
        $this->data = [
            'name' => "Meu novo CRUD de YamlFronts",
        ];
        $this->model = YamlFront::create($this->data);
    }

}
