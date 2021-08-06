@extends('layouts.template')

@section('title', 'BrejaControl | Entrar')

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

            @if(session('msg_success'))
                <div class="alert alert-success" id="msg_success">
                    {{ session('msg_success') }}
                </div>
            @endif

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="box-img">
                            <div id="img"></div>
                        </div>

                        <form action="" method="post" class="form-box">
                            @csrf

                            <div class="form-title">
                                <h1 id="title">Login</h1>
                            </div>

                            <div class="form-input">
                                <label class="form-label">E-mail:</label>
                                <input class="form-control" id="email" name="email" type="email" required>
                            </div>

                            <div class="form-input">
                                <label class="form-label">Senha:</label>
                                <input class="form-control" id="password" name="password" type="password" required>
                            </div>

                            <div class="form-links">
                                <a href="">Cadastrar-me</a>
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