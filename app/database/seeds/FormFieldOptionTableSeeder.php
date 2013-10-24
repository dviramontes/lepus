<?php

use Lepus\FormFieldOption;
 
class FormFieldOptionTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('form_field_options')->delete();
 
        FormField::create(array(
            'title' => 'Yes',
            'key' => 'yes',
            'form_field_id' => '2'
        ));
 
        FormField::create(array(
            'title' => 'No',
            'key' => 'no',
            'form_field_id' => '2'
        ));
    }
 
}