@extends('layout')

@section('content')
<div class="page-content page-container mt-2" id="page-content">
        <div class="padding">
        <div class="row">
            <div class="col-md-6 mx-auto">
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
                <div class="card">
                    <div class="card-header">
                    <strong>Login</strong></div>
                    <div class="card-body">
                    <form action="{{ route('login.index') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="text-muted" for="exampleInputEmail1">Email:</label>
                            <input name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email">                               
                        </div>
                        <div class="form-group">
                            <label class="text-muted" for="exampleInputPassword1">Senha</label>
                            <input name="password" type="password" class="form-control" placeholder="Senha">                           
                        </div>
                        <button type="submit" class="btn bg-blue-500 hover:bg-blue-600 text-white">Login</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
</div>
<!-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Login</h2>
        </div>
    </div>
</div> -->

<!-- <form action="{{ route('login.index') }}" method="POST">
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
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn bg-blue-500 hover:bg-blue-600 text-white">Login</button>
        </div>
    </div>  
</form> -->
@endsection