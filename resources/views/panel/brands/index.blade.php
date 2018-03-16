@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="" class="bred">Home></a>
    <a href="" class="bred">Brands</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">Marcas de Aviões</h1>
</div>

<div class="content-din bg-white">

    <div class="form-search">
        <form class="form form-inline" action="{{route('brands.search')}}" method="POST">
            @csrf
            
            <input type="text" name="key_search" placeholder="O que deseja encontrar?" class="form-control">
            
            <button class="btn btn-search">Pesquisar</button>
        </form>
    </div>

    <div class="messages">
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
        @endif
    </div>

    <div class="class-btn-insert">
        <a href="{{route('brands.create')}}" class="btn-insert">
            <span class="glyphicon glyphicon-plus"></span>
            Cadastrar
        </a>
    </div>
    
    <table class="table table-striped">
        <tr>
            <th>Nome</th>
            <th width="150">Ações</th>
        </tr>

        @forelse($brands as $brand)
            <tr>
                <td>{{$brand->name}}</td>
                <td>
                    <a href="{{route('brands.edit', $brand->id)}}" class="edit">Edit</a>
                    <a href="" class="delete">Delete</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="200">Nenhum item cadastrado!</td>
            </tr>
        @endforelse
    </table>

    @if(isset($dataForm))
        {!! $brands->appends($dataForm)->links() !!}
    @else
        {!! $brands->links() !!}
    @endif

</div><!--Content Dinâmico-->

@endsection