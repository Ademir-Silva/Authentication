@extends('layouts.template')

@section('title', 'BrejaControl | Cadastrar')

@section('styles')
    <link rel="stylesheet" href="{{ url('css/auth.css') }}">
@endsection

@section('content')
    <div class="section-form">
        <div class="section-box">
            <div class="container">
                <div class="row">
                    <div class="col">
                        @if (Session::get('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        @if (Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                            </div>
                        @endif

                        <div class="box-img">
                            <div id="img"></div>
                        </div>

                        <form action="{{ route('auth.save') }}" method="post" class="form-box">
                            @csrf

                            <div class="form-title">
                                <h1 id="title">Cadastro</h1>
                            </div>

                            <div class="form-input">
                                <label class="form-label">Nome:</label>
                                <input class="form-control" id="name" name="name" type="text" minlength="3" maxlength="60" required value="{{ old('name') }}">
                                <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                            </div>

                            <div class="form-input">
                                <label class="form-label">E-mail:</label>
                                <input class="form-control" id="email" name="email" type="email" required value="{{ old('email') }}">
                                <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                            </div>

                            <div class="form-input">
                                <label class="form-label">Senha:</label>
                                <input class="form-control" id="password" name="password" type="password" minlength="5" maxlength="32" required value="{{ old('password') }}">
                                <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                            </div>

                            <div class="form-links">
                                <p>Já tem conta? <a href="{{ route('auth.accessLogin') }}">Logar</a></p>
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
