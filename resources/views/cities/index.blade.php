@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mt-4">
            <div class="float-left">
                <h2 class="text-3xl" >Cadastro de cidades</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('cities.create') }}">Criar Nova Cidade</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered mt-4">
        <tr>
            <th>ID</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Data de Fundação</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach ($cities as $city)
        <tr>
            <td>#{{ $city->id }}</td>
            <td>{{ $city->city_name }}</td>
            <td>{{ $city->city_state }}</td>
            <td>{{ $city->foundation_date->format('d/m/Y') }}</td>
            <td>
                <form action="{{ route('cities.destroy',$city->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('cities.edit',$city->id) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn bg-red-600 hover:bg-red-700 text-white ">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $cities->links() !!}
@endsection