@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
                <div class="panel-heading">Consulta ao Sintegra - Espírito Santo</div>

                <div class="panel-body">
                    
                    <ul class="list-group">
                        <li class="list-group-item">CNPJ: {{ $registro->cnpj }}</li>
                    </ul>

                    <ul class="list-group">
                        <li class="list-group-item">JSON: {{ $registro->resultado_json }}</li>
                    </ul>

                    <a class="btn btn-primary" href="{{ url('/consultas') }}">Voltar</a>
                    <a class="btn btn-primary" href="/consultas/apaga/{{ $registro->id }}">Excluir</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
