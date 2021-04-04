<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $data_extra = [];
    public $data = [];
    public $data_validator = [];
    public $data_validator_messages = [];
    public $model_key = '';
    public $model_id = '';
    public $records = '10';
    public $search = [];

    public function create($data){
        return $this->createAction($data);
    }

    public function get()
    {
        return $this->getAction();
    }

    public function update($data){
        return $this->updateAction($data);
    }

    /*public function delete()
    {
        return $this->deleteAction();
    }*/

    protected function createAction($data){
        $model = $this->getModelObject();
        foreach ($data as $k=>$v){
            $model->$k = $v;
        }
        $model->save();
        return $model;
    }

    protected  function getAction(){
        $model = $this->getModelObject();
        $result = $model::where($this->model_key, $this->model_id)->first();
        return $result;
    }

    protected function updateAction($data){
        $model = $this->getModelObject();
        return $model::where([$this->model_key => $this->model_id])->update($data);
    }

    /*protected  function deleteAction(){
        $model = $this->getModelObject();
        $result = $model::where($this->model_key, $this->model_id)->delete();
        return $result;
    }*/

    protected function validate(){
        $validator = Validator::make($this->data,$this->data_validator,$this->data_validator_messages);
        return $validator;
    }

    protected function sanitizeRequest()
    {
        if(0 < count($this->data_validator))
        {
            foreach ($this->data as $key => $value)
            {
                if ( ! array_key_exists($key, $this->data_validator))
                {
                    unset($this->data[$key]);
                }
            }
        }
    }

    protected function getModelObject(){
        $modelObject =  "\App\\Models\\$this->model";
        return new $modelObject;
    }

    protected function getModelObjectByName($model){
        $modelObject =  "\App\\Models\\$model";
        return new $modelObject;
    }
}
