@extends('layouts.app')

@section('title', 'Adicionar')

@section('content')

<div class="wrapper wrapper-content animated fadeInRight ">
<form action="{{ Route('Book.store') }}" class="form-validar form-horizontal" method="post" enctype="multipart/form-data">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center" >Adicionar</h4>
            </div>
            <div class="panel-body">
                {{csrf_field()}}                
                @include('admin.book._form')
            </div>
            <div class="panel-footer text-center">
                <a class="btn btn-danger btn-voltar" href="{{route('Book.index')}}">Voltar</a>
                <button class="btn btn-primary btn-submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Carregando">Adicionar &nbsp;<i class="fa fa-save"></i> 
                    
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
