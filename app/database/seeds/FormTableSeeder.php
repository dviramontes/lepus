<?php
 
use Lepus\Form;

class FormTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('forms')->delete();
 
        Form::create(array(
            'id' => 1,
            'name' => 'test',
            'label' => 'Just A Test Form',
            'slug_template' => 'TEST<%= fullname %>',
            'version' => '1'
        ));
    }
 
}