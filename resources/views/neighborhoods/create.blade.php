@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mt-4">
        <div class="float-left">
            <h2 class="text-3xl" >Adicionar novo bairro</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-primary" href="{{ route('neighborhoods.index') }}">Voltar</a>
        </div>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        Campos inválidos: <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('neighborhoods.store') }}" method="POST">
    @csrf  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bairro:</strong>
                <input type="name" name="neighborhood_name" class="form-control" placeholder="Bairro"/>
           </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cidade:</strong>
                <select name="city_id" class="form-control" placeholder="Cidade">
                    @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                    @endforeach
                </select>
           </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn bg-blue-500 hover:bg-blue-600 text-white">Salvar</button>
        </div>
        </div>
    </div>  
</form>
@endsection