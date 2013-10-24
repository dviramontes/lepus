<?php namespace Lepus;

use Eloquent;

class FormField extends Eloquent {
    protected $table = 'form_fields';
    protected $hidden = array('created_at', 'updated_at', 'id');

    public function options()
    {
        return $this->hasMany('Svsu\FormFieldOption');
    }

}