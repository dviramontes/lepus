<?php

use Lepus\Data;
use Lepus\Submission;
use Lepus\Interfaces\SubmissionRepositoryInterface;

class SubmissionController extends \BaseController {
    protected $submission;

    public function __construct(SubmissionRepositoryInterface $submission)
    {
        $this->submission = $submission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $filters = Input::all();
        $submissions = $this->submission->getAll($filters);

        // return Response::json(array(
     //        'error' => false,
     //        'submissions' => $submissions),
     //        200
     //    );

        //
        // $submissions = Lepus\Submission::with('data');
        
        // foreach (Input::all() as $key => $value) {
        //  $submissions = $submissions->where($key, '=', $value);
        // };

        // $submissions = $submissions->get();
        return Response::json(array(
            'error' => false,
            'submissions' => $submissions),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
        $formData = Input::All();
        // var_dump(Input::All());

        // Create Submission 
        $submission = new Submission( Array(
            'form'    => $formData['name'],
            'slug'    => $formData['slug'],
            'action'  => $formData['action'], 
            'form_version' => $formData['version'],
            'version' => $formData['submission_version'],
            'submitter' => $formData['submitter'],
            'form_id' => $formData['id']
        ));
        
        // Save Submission
        $submission->save();

        // Iterate through $formData['fields'] and insert all of them to refer to submission
        foreach ($formData['fields'] as $key => $value) {
            switch ($value['type']){

                case 'contenteditable':
                case 'radio':
                case 'select':
                case 'text':

                    if(isset($value['value'])){
                        error_log('field');
                        $element = new Data(Array(
                            'form'          => $formData['id'],
                            'submission_id' => $submission->id,
                            'key'           => $value['name'],
                            'value'         => trim($value['value']),
                            'version'       => $formData['submission_version']
                        ));
                        $element->save();
                    }
                    break;

                case 'checkbox':
                    // return Response::json($value);
                    $element = new Data(Array(
                        'form'          => $formData['id'],
                        'submission_id' => $submission->id,
                        'key'           => $value['name'],
                        'value'         => trim(implode(array_filter(array_map(function($derp){return isset($derp['value'])?$derp['key']:false;}, $value['options'])),',')),
                        'version'       => $formData['submission_version']
                    ));
                    $element->save();
                    
                    break;

                case 'paragraph':
                default: 
                    break;
            }
        }
        

        return Response::json($formData);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        $submission = $this->submission->find($id);

        return Response::json(array(
            'error' => false,
            'submission' => $submission),
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}