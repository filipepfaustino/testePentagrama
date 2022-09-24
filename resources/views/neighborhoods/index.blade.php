@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mt-4">
            <div class="float-left">
                <h2 class="text-3xl" >Cadastro de bairro</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('neighborhoods.create') }}">Criar Novo bairro</a>
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
            <th>Bairro</th>
            <th>Cidade</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach ($neighborhoods as $neighborhood)
        <tr>
            <td>#{{ $neighborhood->id }}</td>
            <td>{{ $neighborhood->neighborhood_name }}</td>
            <td>{{ $neighborhood->city->city_name}}</td>
            <td>
                <form action="{{ route('neighborhoods.destroy',$neighborhood->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('neighborhoods.edit',$neighborhood->id) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn bg-red-600 hover:bg-red-700 text-white ">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $neighborhoods->links() !!}
@endsection