
@extends('layouts.app')
    
@section('content')
    <main>
        <div class="container">
            <div id="dash">
                @if(session('msg'))
                    <p class="msg">{{ session('msg') }}</p>
                @endif
                @if(session('msg-error'))
                    <p class="msg-error">{{ session('msg-error') }}</p>
                @endif
                @if(session('msg-danied'))
                    <p class="msg-danied">{{ session('msg-danied') }}</p>
                @endif
            </div>
            <div class="row">
                <div class="titulo-index" style="margin-left: 1%">
                    <h1 style="text-align: center; margin-bottom: 3%">Todos Contatos</h1>
                </div>
                
                <div class="buttom-create-index" style="margin-left: 65%">
                    @if(Auth::user())
                        <a href="{{ route('contato.create') }}" class="btn btn-success" style="margin-bottom: 15px">Novo Contato</a>
                    @endif
                </div>
                
            </div>
            
            <table class="table table-striped table-hover">
                <thead style="background-color: black; color: white">
                    <tr>
                        <th>id</th>
                        <th>Nome</th>
                        <th>Contato</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($contatos as $contato)
                        <tr>
                            <td>{{ $contato->id }}</td>
                            <td>{{ $contato->nome }}</td>
                            <td>{{ $contato->contato }}</td>
                            <td>{{ $contato->email }}</td>
                            <td>
                                @if(Auth::user())
                                    
                                    <div class="btn-group">
                                        <form action="/delete-contato/{{ $contato->id }}" method="post">
                                        
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </div>
                                    <div class="btn-group">
                                        <a href="/edit-contato/{{ $contato->id }}" class="btn btn-warning">Editar</a>
                                    </div>
                            
                                @endif
                                
                                <div class="btn-group">
                                    <a href="/show-contato/{{ $contato->id }}" class="btn btn-primary">Visualizar</a>
                                </div>

                                

                                
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        
        <div class="flex justify-center mt-4 sm:items-center sm:justify-between">

            <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </main>

    <script>
        const FlashMessages = document.querySelector('#dash')
      
        setTimeout(() => {
        FlashMessages.remove()
        }, 3000);

    </script>
    
    @endsection