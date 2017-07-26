@extends('layouts.app')

@section('title', 'Main page')

@section('content')

<div class="row" style="margin: 2% 0 2% 0;">
    <div class="col-lg-12">
        <section>
            <div class="widget-body">
                <div class="widget-top-overflow windget-padding-md clearfix text-white" style="background-color:#c0392b;">
                    <h3><span class="widget-icon"><i class="glyphicon glyphicon-globe"></i></span>
                        <span class="fw-semi-bold">Sistema de Captura: {{ \Auth::User()->programa()->nombre }}</span></h3>
                </div>
            </div>
        </section>
    </div>
</div>
<form method="POST" action="{{url('personal/buscar')}}" accept-charset="UTF-8" class="form-horizontal" id="formBuscar" enctype="multipart/form-data">
    <div class="row" style="margin: 2% 0 0 0;">
        <div class="col-lg-12">
            <section>
                <div class="widget-body">
                    {{ csrf_field() }}
                    @include('principal.fieldsBusqueda')
                </div>
            </section>
        </div>
    </div>
    <div class="row" style="margin: 0 0 2% 0;">
        <div class="col-lg-12">
            <section>
                <div class="widget-body">
                    <div class="form-group"> 
                        <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-5">
                            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i>  Buscar</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</form>
    @if($inicio == 1)
    <div class="row" style="margin: 0 0 2% 0;">
        <div class="col-lg-12">
            <section>
                <div class="widget-body">
                    <div class="form-group"> 
                        <div class="pagAjax" id="pagAjax_form"data-url="{{ url('personal/buscar?nombre='.str_replace(' ','',$nombre)) }}">
                            @include('principal.table')
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @include('principal.datos')
    @endif

@endsection