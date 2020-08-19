@extends('layout')

@section('content')
    <h1>Adicionar / Editar Produto</h1>
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
            <form method="post" action="{{url('products')}}">
                @csrf
                <div class="form-group">
                    <label for="name">Nome do produto</label>
                    <input type="text" class="form-control " id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea type="text" rows='5' class="form-control" id="description" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Preço</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="100,00 ou maior" required>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection
