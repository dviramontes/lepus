<?php namespace Lepus;

use Eloquent;

class Form extends Eloquent {
    protected $table = 'forms';
    protected $hidden = array('created_at', 'updated_at');

    public function workflow()
    {
        return $this->hasOne('Lepus\Workflow');
    }

    public function fields()
    {
        return $this->hasMany('Lepus\FormField');
    }

}