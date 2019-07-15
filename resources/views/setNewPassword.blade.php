<?php
    $page = 'setnewpassword';
    $title = 'Set New Password';
?>

@extends('layouts.clean')

@section('content')
<div class="newpassword">
    <div class="container">
        <div class="col-12">
            <div class="form-reset">
                <div class="form-style">
                    <center>

                        @if ($errors->any())
                            <div class="alert alert-danger">                          
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif

                        <?php
                            echo Form::open(['route' => 'newPassword', 'method' => 'get']);
                            echo Form::text('email', $data['email'], ['readonly']);

                            echo Form::password('password', 
                                array(
                                    'placeholder'=>'New Password', 
                                    'required' => 'required',
                                    'password' => 'required|confirmed|min:6',
                                ));

                            echo Form::password('password_confirmation', 
                                array(
                                    'placeholder'=>'Confirm Password', 
                                    'required' => 'required'
                                ));
                            echo Form::hidden('remember_token', $data['remember_token']);
                            echo Form::submit('Update Password');
                            echo Form::close();
                        ?>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection