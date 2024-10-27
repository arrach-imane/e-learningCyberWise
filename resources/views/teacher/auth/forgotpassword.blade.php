@extends('static.components.header')
@section('content')

    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--50">
                <form action="" method="post">
                    @csrf
                    <div class="login-form-head">
                        <h4>Teacher - Reset Password</h4>
                        <p>Hey! Reset Your Password and comeback again</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" id="exampleInputEmail1" name="email" required>
                            <i class="ti-email"></i>
                        </div>
                        <div class="submit-btn-area mt-5">
                            <button id="form_submit" type="submit">Reset <i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
