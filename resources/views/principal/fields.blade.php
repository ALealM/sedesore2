
<div class="form-group ">
    <label for="nombre" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre(s):</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre','required','autofocus','id'=>'nombre']) !!}
    </div>
</div>

<!--- Ap Paterno Field --->
<div class="form-group ">
    <label for="apellido_paterno" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido paterno:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('apellido_paterno',null,['class'=>'form-control','placeholder'=>'Ingrese el apellido paterno','required','id'=>'apellido_paterno']) !!}
    </div>
</div>

<!--- Ap Materno Field --->
<div class="form-group ">
    <label for="apellido_materno" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido materno:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('apellido_materno',null,['class'=>'form-control','placeholder'=>'Ingrese el apellido materno','required','id'=>'apellido_materno']) !!}
    </div>
</div>

<!--- Email Field --->
<div class="form-group ">
    <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingrese un correo electrónico','required','id'=>'email']) !!}
    </div>
</div>

<!--- Email Field --->
<div class="form-group ">
    <label for="curp" class="control-label col-md-3 col-sm-3 col-xs-12">CURP:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('curp',null,['class'=>'form-control','placeholder'=>'Ingrese una CURP','required','id'=>'curp']) !!}
    </div>
</div>

<!--- Email Field --->
<div class="form-group ">
    <label for="fecha_nac" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de nacimiento:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="picker" id="picker3">
        </div>
    </div>
</div>

<!--- Email Field --->
<div class="form-group ">
    <label for="cve_elector" class="control-label col-md-3 col-sm-3 col-xs-12">Clave de elector:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('cve_elector',null,['class'=>'form-control','placeholder'=>'Ingrese la clave de elector','required','id'=>'cve_elector']) !!}
    </div>
</div>

<!--- Email Field --->
<div class="form-group ">
    <label for="responsable" class="control-label col-md-3 col-sm-3 col-xs-12">Responsable:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('responsable',null,['class'=>'form-control','placeholder'=>'Ingrese un responsable','required','id'=>'responsable']) !!}
    </div>
</div>

<!--- Cargo -->
<div class="form-group ">
    <label for="id_municipio" class="control-label col-md-3 col-sm-3 col-xs-12">Municipio:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::select('id_municipio',$municipios,null,['class'=>'form-control SelectAuto','required','placeholder'=>'Seleccione municipio...','onchange'=>'getLocalidad()','id'=>'id_municipio']) !!}
    </div>
</div>
<div class="form-group ">
    <label for="id_localidad" class="control-label col-md-3 col-sm-3 col-xs-12">Localidad:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::select('id_localidad',[],null,['class'=>'form-control SelectAuto','required','placeholder'=>'Seleccione localidad...','id'=>'id_localidad']) !!}
    </div>
</div>

<!--- Extension Field --->
<div class="form-group ">
    <label for="domicilio" class="control-label col-md-3 col-sm-3 col-xs-12">Domicilio:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('domicilio',null,['class'=>'form-control','placeholder'=>'Ingrese el domicilio','required','id'=>'domicilio']) !!}        
    </div>
</div>

<!--- Extension Field --->
<div class="form-group ">
    <label for="facebook" class="control-label col-md-3 col-sm-3 col-xs-12">Facebook:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('facebook',null,['class'=>'form-control','placeholder'=>'Ingrese el facebook','required','id'=>'facebook']) !!}        
    </div>
</div>

<!--- Telefono Field --->
<div class="form-group ">
    <label for="telefono" class="control-label col-md-3 col-sm-3 col-xs-12">Teléfono:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Ingrese un número de teléfono o celular','required','id'=>'telefono']) !!}
    </div>
</div>

<!--- Band Loggin Field --->
<div class="form-group ">
    <label for="fotografia" class="control-label col-md-3 col-sm-3 col-xs-12">Fotografía:</label>
    <div class="col-md-6 col-sm-6 col-xs-3">       
        {!! Form::file('fotografia',['class'=>'form-control','autofocus','accept'=>'image/*']) !!}
    </div>
</div>

