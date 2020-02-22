<h1>Register</h1>
<p>Please fill out the form below to create an account</p>
<!--Display Errors-->
<?php // echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
 <?php echo form_open('users/register'); ?>
<!--Field: First Name-->
<div>
<?php echo form_label('First Name:'); ?>
<?php
$data = array(
              'name'        => 'first_name',
              'value'       => set_value('first_name')
            );
?>
<?php echo form_input($data); ?>
<?php echo form_error('first_name', '<div style="color:red">', '</div>'); ?>
</div>
<br>

<!--Field: Last Name-->
<div>
<?php echo form_label('Last Name:'); ?>
<?php
$data = array(
              'name'        => 'last_name',
              'value'       => set_value('last_name')
            );
?>
<?php echo form_input($data); ?>
<?php echo form_error('last_name', '<div style="color:red">', '</div>'); ?>
</div>
<br>

<!--Field: Email Address-->
<div>
<?php echo form_label('Email Address:'); ?>
<?php
$data = array(
              'name'        => 'email',
              'value'       => set_value('email')
            );
?>
<?php echo form_input($data); ?>
<?php echo form_error('email', '<div style="color:red">', '</div>'); ?>
</div>
<br>

<!--Field: Username-->
<div>
<?php echo form_label('Username:'); ?>
<?php
$data = array(
              'name'        => 'username',
              'value'       => set_value('username')
            );
?>
<?php echo form_input($data); ?>
<?php echo form_error('username', '<div style="color:red">', '</div>'); ?>
</div>
<br>

<!--Field: Password-->
<div>
<?php echo form_label('Password:'); ?>
<?php
$data = array(
              'name'        => 'password',
              'value'       => set_value('password')
            );
?>
<?php echo form_password($data); ?>
<?php echo form_error('password', '<div style="color:red">', '</div>'); ?>
</div>
<br>

<!--Field: Password2-->
<div>
<?php echo form_label('Confirm Password:'); ?>
<?php
$data = array(
              'name'        => 'password2',
              'value'       => set_value('password2')
            );
?>
<?php echo form_password($data); ?>
<?php echo form_error('password2', '<div style="color:red">', '</div>'); ?>
</div>
<br>

<!--Submit Buttons-->
<?php $data = array("value" => "Register",
                    "name" => "submit",
                    "class" => "btn btn-primary"); ?>
<div>
    <?php echo form_submit($data); ?>
</div>
<?php echo form_close(); ?>