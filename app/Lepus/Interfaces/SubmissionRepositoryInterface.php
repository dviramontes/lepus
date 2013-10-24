<?php

namespace Lepus\Interfaces;

interface SubmissionRepositoryInterface {

    public function find($id);
    public function findBySlug($slug);
    public function getAll($filters);

}