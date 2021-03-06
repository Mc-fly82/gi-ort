@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-12 login-banner bg-light  p-5">
            <center><h2>Bienvenue, connectez vous !</h2></center>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-4">
            <div class="login-form px-5 my-5">
                <div class="card" style="">
                    <div class="card-body py-0">
                        <p class="card-text">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <br>
                            <div class="form-group">
                                <label for="email">Utilisateur</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif


                            </div>

                            <div class="form-group">
                                <label for="password">Mot de Passe</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <center><button type="submit" class="btn btn-success my-3 ">Connexion</button></center>
                        </form>
                        <small class="text-danger">Vous avez perdu vos identifiants? Contactez votre administrateur.</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



