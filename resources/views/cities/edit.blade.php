@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mt-4">
            <div class="float-left">
                <h2 class="text-3xl" >Editar Cidades</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('cities.index') }}"> Voltar</a>
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
    <form action="{{ route('cities.update',$city->id) }}" method="POST">
        @csrf
        @method('PUT') 
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome da cidade:</strong>
                    <input type="text" name="city_name" class="form-control" placeholder="Cidade" value="{{ $city->city_name}}"/>
            </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Estado:</strong>
                    <input class="form-control" type="text" name="city_state" placeholder="Estado" value="{{ $city->city_state}}"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Data Fundação:</strong>
                    <input class="form-control" type="date" name="foundation_date" placeholder="Data" value="{{ $city->foundation_date->format('Y-m-d')}}"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn bg-blue-500 hover:bg-blue-600 text-white">Atualizar</button>
            </div>
        </div>  
    </form>
@endsection