@extends('layout')

@section('content')
    <h1>@if(!isset($product))Adicionar Produto @else Editar Produto @endif</h1>
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
        @if(!isset($product))
            <form method="post" action="{{url('products')}}">
        @else
            <form method="post" action='{{url("products/$product->id")}}'>
            @method('PUT')
        @endif
                @csrf
                <div class="form-group">
                    <label for="name">Nome do produto</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="name" 
                        name="name" 
                        value="{{$product->nome ?? ''}}"
                        required
                    >
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea 
                        type="text" 
                        rows='5' 
                        class="form-control" 
                        id="description" 
                        name="description" 
                        required
                    >{{$product->descricao ?? ''}}</textarea>
                </div>
                <div class="form-group">
                    <label for="price">Preço</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="price" 
                        name="price" 
                        placeholder="100,00 ou maior" 
                        value="{{$product->preco ?? ''}}"
                        required
                    >
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection
