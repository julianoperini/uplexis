@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
                <div class="panel-heading">Consulta ao Sintegra - Espírito Santo</div>

                <div class="panel-body">
                    
                    <p>Clique no registro desejado para ver mais informações</p>

                    <ul class="list-group">
                        @foreach ($consultas as $consulta)
                        <li class="list-group-item">
                            <a href="/consultas/{{ $consulta->id }}"><b>{{ $consulta->created_at }}</b> - CPF: {{ $consulta->cnpj }}</a> <a href="/consultas/apaga/{{ $consulta->id }}"<span class="badge">Excluir</span></a>
                         </li>

      
   
                        @endforeach
                    </ul>
                    
                    <a class="btn btn-primary" href="{{ url('/home') }}">Voltar</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
