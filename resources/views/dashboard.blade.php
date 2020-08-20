@extends('layout')

@section('content')
    <h1>Dashboard de vendas</h1>
    <div id='sales' class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Tabela de vendas
                <a href='{{url("/sales/create")}}' class='btn btn-secondary float-right btn-sm rounded-pill'><i class='fa fa-plus'></i>  Nova venda</a></h5>
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            <form method="get" action="{{url('sales/search')}}">
                @csrf
                <div class="form-row align-items-center">
                    <div class="col-sm-5 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Clientes</div>
                            </div>
                            <select class="form-control" name="client" id="client">
                                <option>Clientes</option>
                                @foreach($clients as $client)
                                    <option value="{{$client->id}}">{{$client->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 my-1">
                        <label class="sr-only" for="period">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Período</div>
                            </div>
                            <input type="text" class="form-control date_range" name="period" id="period" placeholder="Username">
                        </div>
                    </div>
                    <div class="col-sm-1 my-1">
                        <button type="submit" class="btn btn-primary" style='padding: 14.5px 16px;'>
                            <i class='fa fa-search'></i></button>
                    </div>
                </div>
            </form>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Produto
                    </th>
                    <th scope="col">
                        Data
                    </th>
                    <th scope="col">
                        Valor
                    </th>
                    <th scope="col">
                        Ações
                    </th>
                </tr>
                @foreach($sales as $sale)
                    @php
                        $saleProduct = $sale->find($sale->id)->relProducts;
                    @endphp
                    <tr>
                        <td>
                            {{$saleProduct->nome}}
                        </td>
                        <td>
                            {{date('d/m/Y', strtotime($sale->data))}}
                        </td>
                        <td>
                            R$ {{number_format($sale->quantidade*($saleProduct->preco-$sale->desconto), 2, ',', '.')}}
                        </td>
                        <td>
                            <a 
                                href='{{url("sales/$sale->id/edit")}}' 
                                class='btn btn-primary'
                            >Editar</a>
                            <a 
                                href='{{url("sales/$sale->id")}}' 
                                class='btn btn-danger delete'
                            >Deletar</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{$sales->links()}}
        </div>
    </div>
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Resultado de vendas</h5>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Status
                    </th>
                    <th scope="col">
                        Quantidade
                    </th>
                    <th scope="col">
                        Valor Total
                    </th>
                </tr>
                @foreach($results as $result)
                    <tr>
                        <td>
                            {{$result->status}}
                        </td>
                        <td>
                            {{$result->quantidade}}
                        </td>
                        <td>
                            R$ {{number_format($result->valor, 2, ',', '.')}}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <div id='products' class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Produtos
            <a href='{{url("products/create")}}' class='btn btn-secondary float-right btn-sm rounded-pill'><i class='fa fa-plus'></i>  Novo produto</a></h5>
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <table class='table text-center'>
                <tr>
                    <th scope="col">
                        Nome
                    </th>
                    <th scope="col">
                        Valor
                    </th>
                    <th scope="col">
                        Ações
                    </th>
                </tr>
                @foreach($products as $product)
                <tr>
                    <td>
                    {{$product->nome}}
                    </td>
                    <td>
                    R$ {{number_format($product->preco, 2, ',', '.')}}
                    </td>
                    <td>
                        <a 
                            href='{{url("products/$product->id/edit")}}' 
                            class='btn btn-primary'
                        >Editar</a>
                        <a 
                            href='{{url("products/$product->id")}}' 
                            class='btn btn-danger delete'
                        >Deletar</a>
                    </td>
                </tr>
                @endforeach 
            </table>
            {{$products->links()}}
        </div>
    </div>

    <div id='clients' class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Clientes
            <a href='{{url("clients/create")}}' class='btn btn-secondary float-right btn-sm rounded-pill'><i class='fa fa-plus'></i>  Novo Cliente</a></h5>
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @csrf
            <table class='table text-center'>
                <tr>
                    <th scope="col">
                        Nome
                    </th>
                    <th scope="col">
                        CPF
                    </th>
                    <th scope="col">
                        E-mail
                    </th>
                    <th scope="col">
                        Ações
                    </th>
                </tr>
                @foreach($clients as $client)
                <tr>
                    <td>
                        {{$client->nome}}
                    </td>
                    <td>
                        {{$client->cpf}}
                    </td>
                    <td>
                        {{$client->email}}
                    </td>
                    <td>
                        <a 
                            href='{{url("clients/$client->id/edit")}}' 
                            class='btn btn-primary'
                        >Editar</a>
                        <a 
                            href='{{url("clients/$client->id")}}' 
                            class='btn btn-danger delete'
                        >Deletar</a>
                    </td>
                </tr>
                @endforeach 
            </table>
            {{$clients->links()}}
        </div>
    </div>
@endsection
