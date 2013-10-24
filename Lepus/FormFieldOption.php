<?php  namespace Lepus;

use Eloquent;

class FormFieldOption extends Eloquent {
    protected $table = 'form_field_options';
    protected $hidden = array('created_at', 'updated_at', 'id');

}