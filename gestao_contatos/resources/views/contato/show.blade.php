@extends('layouts.app')
    
@section('content')

    <main>
        <div class="container" >
            <div class="card" style="border: 1px solid black; margin-top: 1%; width:60%; margin-left: 20%; padding: 3%; border-radius: 15px">
                <div style="text-align: center; margin-bottom: 5%">
                    <h1>Detalhes do contato</h1>
                </div>
                
                <div style="margin-left: 18%">
                    <p><strong>Nome:</strong> {{ $contato->nome }}</p>
                    <p><strong>Contato:</strong> {{ $contato->contato }}</p>
                    <p><strong>Email:</strong> {{ $contato->email }}</p>
                </div>
                @if(Auth::user())
                <div class="row" style="width: 40%; margin-left:65%">
                    <div class="col-md-4">
                        <form action="/delete-contato/{{ $contato->id }}" method="post">
                                    
                            <button type="submit" class="btn btn-danger">Excluir</button>
                            @method('delete')
                            @csrf
                        </form> 
                    </div>

                    <div class="col-md-4">
                        <a href="/edit-contato/{{ $contato->id }}" class="btn btn-warning">Editar</a>   
                    </div>
                    
                    
                </div>
                @endif

                
                
            </div>
        </div>

        <div class="flex justify-center mt-4 sm:items-center sm:justify-between">

            <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </main>
@endsection