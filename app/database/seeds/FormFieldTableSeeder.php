<?php

use Lepus\FormField;
 
class FormFieldTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('form_fields')->delete();
 
        FormField::create(array(
            'name' => 'fullname',
            'title' => 'Full Name:',
            'type' => 'text',
            'width' => '12',
            'required' => '1',
            'form_id' => '1'
        ));

        FormField::create(array(
            'name' => 'overEighteen',
            'title' => 'Are you over eighteen?',
            'type' => 'Radio',
            'width' => '6',
            'required' => '1',
            'form_id' => '1'
        ));
    }
 
}