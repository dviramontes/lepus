<?php namespace Lepus;

use Eloquent;

class Data extends Eloquent {
    protected $table = 'submission_data';
    protected $fillable = array('form', 'key', 'value', 'version', 'submission_id');
    protected $hidden = array('created_at', 'updated_at', 'submission_id', 'form', 'version', 'form_version');
}