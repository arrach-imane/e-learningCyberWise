@extends('static.components.header')
@section('content')
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--40">
                <form action="{{ url('login') }}" method="post">
                    @csrf
                    <div class="login-form-head">
                        <h4>Connexion CyberWise</h4>
                        <p>Connectez-vous à votre compte</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Adresse email</label>
                            <input type="email" id="exampleInputEmail1" name="email" required>
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Mot de passe</label>
                            <input type="password" id="exampleInputPassword1" name="password" required>
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="remember">
                                    <label class="custom-control-label" for="customControlAutosizing">Se souvenir de moi</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{url('forgot-password')}}">Mot de passe oublié ?</a>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Se connecter <i class="ti-arrow-right"></i></button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Vous n'avez pas de compte ? <a href="{{url('signup')}}">S'inscrire</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
