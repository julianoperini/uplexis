@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
                <div class="panel-heading">Consulta ao Sintegra - Espírito Santo</div>

                <div class="panel-body">

                    <form role="form" method="POST" action="{{ url('/busca') }}">
                        {!! csrf_field() !!}

                        <div class="form-group">
	                    <input type="text" class="form-control" name="cnpj" value="" placeholder="CNPJ">
                        </div>
	                <button type="submit" class="btn btn-primary">Consultar</button>
                    </form>
                    <hr>
                    <a class="btn btn-primary" href="{{ url('/consultas') }}">Visualizar as consultas realizadas</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
