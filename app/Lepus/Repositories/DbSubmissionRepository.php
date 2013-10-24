<?php namespace Lepus\Repositories;

use Lepus\Submission;
use Lepus\Interfaces\SubmissionRepositoryInterface;

class DbSubmissionRepository implements SubmissionRepositoryInterface {

    protected $filterable = array('id', 'slug', 'form', 'action');

    public function find($id)
    {
        return Submission::with('data')->where('id', '=', $id)->first()->toArray();
    }

    public function findBySlug($slug)
    {
        return Submission::with('data')->where('slug', '=', $slug)->first()->toArray();
    }
    
    public function getAll($filters)
    {
        $submissions = Submission::with('data');

        foreach ($filters as $key => $value) {
            if(in_array($key, $this->filterable)){
                $submissions = $submissions->where($key, '=', $value);
            }
        };

        return $submissions->orderBy('version', 'desc')->groupBy('slug')->get()->toArray();
    }

}

    
    