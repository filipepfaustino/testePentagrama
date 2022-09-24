@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mt-4">
        <div class="float-left">
            <h2 class="text-3xl" >Adicionar novo usuario</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}">Voltar</a>
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
<form action="{{ route('users.store') }}" method="POST" class="mt-4">
    @csrf  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control" placeholder="Email"/>
           </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Senha:</strong>
                <input class="form-control" type="password" name="password" placeholder="Senha"/>
            </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn bg-blue-500 hover:bg-blue-600 text-white">Salvar</button>
        </div>
    </div>  
</form>
@endsection