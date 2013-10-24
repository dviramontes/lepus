<?php

use Lepus\Interfaces\FormRepositoryInterface;

class FormController extends \BaseController {

    /**
    * @var Lepus\Interfaces\FormRepositoryInterface
    */
    protected $form;

    public function __construct(FormRepositoryInterface $form)
    {
        $this->form = $form;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $filters = Input::all();
        $forms = $this->form->getAll($filters);

        return Response::json(array(
            'error' => false,
            'forms' => $forms),
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  string $name
     * @return Response
     */
    public function show($name)
    {
        $form = $this->form->findByName($name);

        return Response::json(array(
            'error' => false,
            'form' => $form),
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