<?php
namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

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

    public function find($id){
        return $this->model->find($id);
    }

    public function flush(Model $model)
    {
        $model->push();
    }
}
