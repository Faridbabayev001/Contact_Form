<?php
echo $this->session->flashdata('email_sent');
echo form_open('email/send');
$attributes = array(
	'class' => 'form-control',
	'required' => 'required'
);

// name input
echo form_fieldset(false,array('class' => 'form-group'));
echo form_label('Your Name (required)','name');

$attributes['type'] = 'text';
$attributes['name'] = 'name';
$attributes['placeholder'] = 'Enter Your Name';
echo form_input($attributes);
echo form_error('name');
echo form_fieldset_close();

// email input
echo form_fieldset(false,array('class' => 'form-group'));
echo form_label('Your Name (required)','name');

$attributes['type'] = 'email';
$attributes['name'] = 'email';
$attributes['placeholder'] = 'Enter Your Email';
echo form_input($attributes);
echo  form_fieldset_close();

// message input
echo form_fieldset(false,array('class' => 'form-group'));
echo form_label('Your Name (required)','name');

$attributes['type'] = '';
$attributes['name'] = 'message';
$attributes['placeholder'] = 'Enter Your Message';
echo form_textarea($attributes);
echo form_fieldset_close();
echo form_button(array('class' => 'btn btn-dark','type' => 'submit','content' => 'SEND MESSAGE'));
echo form_close();

