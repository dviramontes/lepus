<?php namespace Lepus;

use Eloquent;

class WorkflowStep extends Eloquent {
    protected $table = 'workflow_steps';
    protected $hidden = array('created_at', 'updated_at');

    public function form()
    {
        return $this->hasOne('Lepus\Form');
    }

}