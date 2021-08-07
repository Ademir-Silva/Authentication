@extends('layouts.template')

@section('title', 'BrejaControl | Entrar')

@section('styles')
    <link rel="stylesheet" href="{{ url('css/auth.css') }}">
@endsection

@section('content')
    <div class="section-form">
        <div class="section-box">
            <div class="container">
                <div class="row">
                    <div class="col">
                        @if (Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                            </div>
                        @endif

                        <div class="box-img">
                            <div id="img"></div>
                        </div>

                        <form action="{{ route('auth.check') }}" method="post" class="form-box">
                            @csrf

                            <div class="form-title">
                                <h1 id="title">Login</h1>
                            </div>

                            <div class="form-input">
                                <label class="form-label">E-mail:</label>
                                <input class="form-control" id="email" name="email" type="email" required value="{{ old('name') }}">
                                <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                            </div>

                            <div class="form-input">
                                <label class="form-label">Senha:</label>
                                <input class="form-control" id="password" name="password" type="password" minlength="5" maxlength="32" required value="{{ old('name') }}">
                                <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                            </div>

                            <div class="form-links">
                                <a href="{{ route('auth.accessRegister') }}">Cadastrar-me</a>
                                <a href="#">Esqueci a senha</a>
                            </div>

                            <div class="form-btn">
                                <button class="btn" id="submit" name="submit" type="submit">Entrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
