@extends('layout')

@section('content')
    <h1>@if(!isset($client))Adicionar Cliente @else Editar Cliente @endif</h1>
    <div class='card'>
        <div class='card-body'>
        @if(isset($errors) && count($errors)>0)
            <div class="alert alert-danger alert-dismissible fade show">
                @foreach($errors->all() as $erro)
                {{$erro}}<br>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(!isset($client))
            <form method="post" action="{{url('clients')}}">
        @else
            <form method="post" action='{{url("clients/$client->id")}}'>
            @method('PUT')
        @endif
                @csrf
                <div class="form-group">
                    <label for="name">Nome do Cliente</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="name" 
                        name="name" 
                        value="{{$client->nome ?? ''}}"
                        required
                    >
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input 
                        type="email" 
                        class="form-control" 
                        id="email" 
                        name="email" 
                        value="{{$client->email ?? ''}}"
                        required
                    >
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="cpf" 
                        name="cpf" 
                        placeholder="99999999999" 
                        value="{{$client->cpf ?? ''}}"
                        required
                    >
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection
