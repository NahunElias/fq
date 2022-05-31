<?php
namespace App\Repositories;

class Repository
{
    protected $model;

    function __construct($model){
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create($model){
        $model->save();
    }
}
