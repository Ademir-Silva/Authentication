@extends('layouts.template')

@section('title', 'BrejaControl | Welcome')

@section('styles')
    <link rel="stylesheet" href="{{ url('css/welcome.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h4>Informações do usuário</h4>

                <table class="table table-hover">
                    <thead>
                        <th class="info">Name</th>
                        <th class="info">Email</th>
                        <th class="info"></th>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="info">{{ $LoggedUserInfo['name'] }}</td>
                            <td class="info">{{ $LoggedUserInfo['email'] }}</td>
                            <td class="info"><a href="{{ route('auth.logout') }}">Sair</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
