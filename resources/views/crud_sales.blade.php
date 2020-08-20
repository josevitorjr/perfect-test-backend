@extends('layout')

@section('content')
    <h1>Adicionar / Editar Venda</h1>
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
            @if(!isset($sale))
                <form method="post" action="{{url('sales')}}">
            @else
                <form method="post" action='{{url("sales/$sale->id")}}'>
                @method('PUT')
            @endif
                @csrf
                <h5 class='mt-5'>Informações da venda</h5>
                <div class="form-group">
                    <label for="client">Cliente</label>
                    <select id="client" name="client" class="form-control" required>
                        <option value="{{$sale->relClients->id ?? ''}}" selected>{{$sale->relClients->nome ?? 'Escolha...'}}</option>
                        @foreach($clients as $client)
                            <option value="{{$client->id}}">{{$client->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="product">Produto</label>
                    <select id="product" name="product" class="form-control" required>
                        <option value="{{$sale->relProducts->id ?? ''}}" selected>{{$sale->relProducts->nome ?? 'Escolha...'}}</option>
                        @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Data</label>
                    <input 
                        type="date" 
                        class="form-control" 
                        name="date" 
                        id="date"
                        value="{{$sale->data ?? ''}}" 
                        required
                    >
                </div>
                <div class="form-group">
                    <label for="quantity">Quantidade</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        name="quantity" 
                        id="quantity" 
                        placeholder="1 a 10" 
                        value="{{$sale->quantidade ?? ''}}" 
                        required
                    >
                </div>
                <div class="form-group">
                    <label for="discount">Desconto</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        name="discount" 
                        id="discount" 
                        placeholder="100,00 ou menor" 
                        value="{{$sale->desconto ?? ''}}"
                        required
                    >
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="{{$sale->status ?? ''}}" selected>{{$sale->status ?? 'Escolha...'}}</option>
                        <option>Aprovado</option>
                        <option>Cancelado</option>
                        <option>Devolvido</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection
