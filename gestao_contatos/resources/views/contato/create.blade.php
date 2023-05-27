@extends('layouts.app')
    
@section('content')

    <main>
        <div class="container" style="margin-top: 1%">
            <h1 style="text-align: center; margin-bottom: 20px">Cadastrar Contato</h1>

            <div class="col-md-8" style="margin-left: 17%">
                <form action="{{ route('contato.store') }}" method="POST" >
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Digite o nome" name="nome" value="{{ old('nome') }}">
                        {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                      </div>
    
                      <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="exampleFormControlTextarea1" class="form-label">Contato</label>
                                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Digite o contato" name="contato" value="{{ old('contato') }}">
                                {{ $errors->has('contato') ? $errors->first('contato') : '' }}
                            </div>
    
                            <div class="mb-3 col-md-8">
                                <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Digite o email" name="email" value="{{ old('email') }}">
                                {{ $errors->has('email') ? $errors->first('email') : '' }}
                            </div>
                      </div>
                      <div style="margin-top: 15px">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                      </div>
                      
                </form>
            </div>
            
            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">

                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>
            
        </div>
    </main>
@endsection