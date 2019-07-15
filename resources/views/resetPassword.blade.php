<?php
    $page = 'resetpassword';
    $title = 'Reset Password';
?>

@extends('layouts.reset')

@section('content')
<body>
    <div class="container">
        <div class="col-12">
            <div id="form-reset">
                <div class="form-style-8">
                    <center>
                        <?php
                            echo Form::open(['route' => 'sendResetPassword', 'method' => 'GET']);
                            echo Form::text('username', null, array('placeholder'=>'Username', 'required' => 'required'));
                            echo Form::email('email', null, array('placeholder'=>'E-mail', 'required' => 'required'));
                            echo Form::submit('Reset Password');
                            echo Form::close();
                        ?>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection