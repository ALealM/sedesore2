@extends('layouts.app')

@section('title', 'Main page')

@section('content')

<div class="row" style="margin: 2% 0 2% 0;">
    <div class="col-lg-10">
        <section>
            <div class="widget-body">
                <div class="widget-top-overflow windget-padding-md clearfix text-white" style="background-color:#c0392b;">
                    <h3><span class="widget-icon"><i class="glyphicon glyphicon-globe"></i></span>
                        <span class="fw-semi-bold">Sistema de Captura: PROSPERA</span></h3>
                </div>
            </div>
        </section>
    </div>
</div>
<form method="POST" action="{{url('personal/store')}}" accept-charset="UTF-8" class="form-horizontal" id="formValidar" enctype="multipart/form-data">
    <div class="row" style="margin: 2% 0 2% 0;">
        <div class="col-lg-10">
            <section>
                <div class="widget-body">
                    {{ csrf_field() }}
                    @include('principal.fields')
                </div>
            </section>
        </div>
    </div>
    <div class="row" style="margin: 2% 0 2% 0;">
        <div class="col-lg-10">
            <section>
                <div class="widget-body">
                    <div class="form-group"> 
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="button" class="btn btn-success" onclick="validaDatos()"><i class="fa fa-check-square-o"></i>  Validar</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</form>

@endsection