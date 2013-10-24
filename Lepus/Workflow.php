<?php namespace Lepus;

use Eloquent;

class Workflow extends Eloquent {
    protected $table = 'workflows';
    protected $hidden = array('created_at', 'updated_at');

    public function workflow_steps()
    {
        return $this->hasMany('Lepus\WorkflowStep');
    }

}