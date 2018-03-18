<div class="box-body">
    <div class="row">
        <div class="col-md-4">
            {!! Form::normalInput('descripcion', 'Descripcion del Producto', $errors, $producto) !!}
        </div>
        <div class="col-md-4"> 
            {!! Form::normalInput('marca', "Marca del Producto", $errors, $producto) !!}
        </div>
    </div>
</div>
