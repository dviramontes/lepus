<?php

use Lepus\FormField;
 
class FormFieldTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('form_fields')->delete();
 
        FormField::create(array(
            'name' => 'fullname',
            'title' => 'Full Name:',
            'value' => '<p>Aaron T. Maturen</p>',
            'type' => 'contenteditable',
            'width' => '12',
            'required' => '1',
            'form_id' => '1',
            'id' => '1'
        ));

        FormField::create(array(
            'name' => 'moreText',
            'title' => 'More Text!',
            'type' => 'text',
            'width' => '12',
            'required' => '1',
            'form_id' => '1',
            'id' => '2'
        ));
    }
 
}