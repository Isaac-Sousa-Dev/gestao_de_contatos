@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bem Vindo ao Gestão de Contatos') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row" style="margin-bottom: 3%">
                        <div class="col-md-6">
                            <img src="/img/contatos.jpg" alt="" style="border-radius: 15px">
                        </div>
                        <div class="col-md-4">
                            <p style="font-size: 25px">Gerenciando seus contatos com organização e intuitividade</p>
                        </div>   
                    </div>

                    <div class="" style="margin-left: 75%">
                        <a href="{{ route('contato.index') }}" class="btn btn-info">Ver todos contatos</a>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
