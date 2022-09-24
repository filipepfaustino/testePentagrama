@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mt-4">
            <div class="pull-left">
                <h2 class="text-3xl">Relatório</h2>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <form class="form-inline">
        <!-- <label class="sr-only" for="inlineFormInputName2">Name</label> -->
        <!-- <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe"> -->

        <!-- <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label> -->
        <div class="input-group mb-2 mr-sm-2">
            <select class="custom-select "name="city_id">
                <option value="">Selecione a cidade</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}" {{ request()->get('city_id') == $city->id ? 'selected' : '' }} >{{ $city->city_name }}</option>
                @endforeach
            </select>
        </div>
        De:<input class="form-control mb-2 mr-sm-2 ml-1" type="date" name="foundation_date_inicial" value="{{ request()->get('foundation_date_inicial') }}"/>
        Até:<input class="form-control mb-2 mr-sm-2 ml-1" type="date" name="foundation_date_final" value="{{ request()->get('foundation_date_final') }}"/>
        <input class="form-control mb-2 mr-sm-2" type="text" name="neighborhood_name" placeholder="Nome do Bairro" value="{{ request()->get('neighborhood_name') }}"/>

        <!-- <div class="form-check mb-2 mr-sm-2">
            <input class="form-check-input" type="checkbox" id="inlineFormCheck">
            <label class="form-check-label" for="inlineFormCheck">
                Remember me
            </label>
        </div> -->

        <button type="submit" class="btn bg-blue-500 hover:bg-blue-600 text-white form-control mb-2 mr-sm-2">Pesquisar</button>
    </form>




    <!-- <form method="GET" >
            <select name="city_id">
                <option value="">Selecione a cidade</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}" {{ request()->get('city_id') == $city->id ? 'selected' : '' }} >{{ $city->city_name }}</option>
                @endforeach
            </select>
            <input type="date" name="foundation_date_inicial" value="{{ request()->get('foundation_date_inicial') }}"/>
            <input type="date" name="foundation_date_final" value="{{ request()->get('foundation_date_final') }}"/>
            <input type="text" name="neighborhood_name" placeholder="Nome do Bairro" value="{{ request()->get('neighborhood_name') }}"/>
            <button type="submit" class="btn bg-blue-500 hover:bg-blue-600 text-white">Pesquisar</button>
        </form> -->
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Cidade</th>
            <th>Data de Fundação da Cidade</th>
            <th>Bairro</th>
        </tr>
        @foreach ($neighborhoods as $neighborhood)
        <tr>
            <td>#{{ $neighborhood->id }}</td>
            <td>{{ $neighborhood->city->city_name }}</td>
            <td>{{ $neighborhood->city->foundation_date->format('d/m/Y') }}</td>     
            <td>{{ $neighborhood->neighborhood_name }}</td>
        </tr>
        @endforeach   
    </table>

@endsection