<!--- Cargo -->
<div class="form-group ">
    <label for="id_municipio" class="control-label col-md-3 col-sm-3 col-xs-12">Municipio:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <?php echo Form::select('id_municipio',$municipios,$mun,['class'=>'form-control','placeholder'=>'Seleccione municipio...','onchange'=>'getLocalidad()','id'=>'id_municipio']); ?>

    </div>
</div>

<div class="form-group ">
    <label for="nombre" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre(s):</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <?php echo Form::text('nombre',$nombre,['class'=>'form-control','placeholder'=>'Ingrese el nombre','autofocus','id'=>'nombre']); ?>

    </div>
</div>

<!--- Ap Paterno Field --->
<div class="form-group ">
    <label for="apellido_paterno" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido paterno:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <?php echo Form::text('apellido_paterno',$apPat,['class'=>'form-control','placeholder'=>'Ingrese el apellido paterno','id'=>'apellido_paterno']); ?>

    </div>
</div>

<!--- Ap Materno Field --->
<div class="form-group ">
    <label for="apellido_materno" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido materno:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <?php echo Form::text('apellido_materno',$apMat,['class'=>'form-control','placeholder'=>'Ingrese el apellido materno','id'=>'apellido_materno']); ?>

    </div>
</div>

<!--- Ap Materno Field --->
<div class="form-group ">
    <label for="clave_electoral" class="control-label col-md-3 col-sm-3 col-xs-12">Clave electoral:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <?php echo Form::text('clave_electoral',$cveElect,['class'=>'form-control','placeholder'=>'Ingrese clave electoral','id'=>'clave_electoral']); ?>

    </div>
</div>
