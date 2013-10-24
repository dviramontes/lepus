<?php namespace Lepus\Repositories;

use Lepus\Form;
use Lepus\Interfaces\FormRepositoryInterface;

class DbFormRepository implements FormRepositoryInterface {

    protected $filterable = array('id', 'name');

    public function find($id)
    {
        return Form::with('fields.options', 'workflow.workflow_steps')->findOrFail($id);
    }

    public function findByName($name)
    {
        return Form::with('fields.options', 'workflow.workflow_steps')->where('name', '=', $name)->first()->toArray();
    }
    
    public function getAll($filters)
    {
        $forms = Form::with('fields.options', 'workflow.workflow_steps');

        foreach ($filters as $key => $value) {
            if(in_array($key, $this->filterable)){
                $forms = $forms->where($key, '=', $value);
            }
        };

        return $forms->get()->toArray();
    }

}

    
    