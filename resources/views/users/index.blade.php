@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mt-4">
            <div class="float-left">
                <h2 class="text-3xl" >Cadastro de usuario</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('users.create') }}">Criar Novo Usuario</a>
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
            <th>Email</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>#{{ $user->id }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn bg-red-600 hover:bg-red-700 text-white ">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $users->links() !!}
@endsection