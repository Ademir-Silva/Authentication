@extends('layouts.template')

@section('title', 'BrejaControl | Cadastrar')

@section('styles')
    <link rel="stylesheet" href="{{ url('css/auth.css') }}">
@endsection

@section('content')
    <div class="section-form">
        <div class="section-box">
            @if(session('msg_warning'))
                <div class="alert alert-warning" id="msg_warning">
                    {{ session('msg_warning') }}
                </div>
            @endif

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="box-img">
                            <div id="img"></div>
                        </div>

                        <form action="{{ route('login') }}" method="post" class="form-box">
                            @csrf

                            <div class="form-title">
                                <h1 id="title">Cadastro</h1>
                            </div>

                            <div class="form-input">
                                <label class="form-label">Nome:</label>
                                <input class="form-control" id="name" name="name" type="text" required>
                            </div>

                            <div class="form-input">
                                <label class="form-label">Sobrenome:</label>
                                <input class="form-control" id="family-name" name="family-name" type="text" required>
                            </div>

                            <div class="form-input">
                                <label class="form-label">E-mail:</label>
                                <input class="form-control" id="email" name="email" type="email" required>
                            </div>

                            <div class="form-input">
                                <label class="form-label">Senha:</label>
                                <input class="form-control" id="password" name="password" type="password" required>
                            </div>

                            <div class="form-input">
                                <label class="form-label">Repetir senha:</label>
                                <input class="form-control" id="check-password" name="check-password" type="password" required>
                            </div>

                            <div class="form-links">
                                <p>Já tem conta? <a href="{{ route('accessLogin') }}">Logar</a></p>
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