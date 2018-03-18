<div class="box-body">
    <div class="row">
        <div class="col-md-2">
            {!! Form::normalInput('nombre', 'Nombre', $errors, $categoriacliente) !!}
        </div>
        <div class="col-md-4"> 
            {!! Form::normalInput('descripcion', "Descripcion de Categoria", $errors, $categoriacliente) !!}
        </div>
    </div>
</div>
