<?php namespace Lepus;

use Eloquent;

class Submission extends Eloquent {
    protected $table = 'submissions';
    protected $fillable = array('form', 'slug', 'action', 'version', 'form_version', 'submitter', 'form_id');
    protected $hidden = array('created_at', 'updated_at');

    public function data()
    {
        return $this->hasMany('Lepus\Data');
    }

}