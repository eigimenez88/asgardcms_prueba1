PLUGIN PARA USAR ORACLE EN LARAVEL  https://github.com/yajra/laravel-oci8 


CREANDO UN NUEVO MODULO;
1-CREAR NUEVO MODULO CON COMANDO DE ASGARD= php artisan asgard:module:scaffold
    vendor/name ===> dls/clientes
    CategoriaCliente
    Cliente
    categoria_cliente
    cliente

2-CONFIGURAR MIGRACION, IR EN CARPETA 'Modules/nombreModulo/Database/Migrations' ahi estan los archivos
    de migracion, por defecto asgard te crea los archivos y vos completas, tambien te crea
    su tabla de traduccion que no hace falta, se puede eliminar

3-CONFIGURAR EL MODELO O ENTIDAD QUE ESTA EN LA CARPETA 'Modules/nombreModulo/Entities', eliminar lo que tenga
    que ver con translation, en el array de fillable agregar el nombre de las columnas

4-MIGRAR MODULO CREADO CON COMANDO: php artisan module:migrate nombreModulo 
    ejemplo: php artisan module:migrate clientes
    PARA RESETEAR LA ULTIMA MIGRACION DEL MODULO: php artisan module:migrate-rollback nombreModulo

5-ASGARD YA GENERA EN EL SIDEBAR ACCESO AL INDEX DEL MODULO, HACE FALTA DARLE PERMISOS AL 
    ROL DEL USUARIO QUE ESTAMOS USANDO PARA ENTRAR, IR AL FORMULARIO DE DAR PERMISOS AL ROL

    EN EL CASO DE QUE NO MUESTRE CORECTAMENTE EL NOMBRE DEL MODULO SE PUEDE EDITAR EN C:\asgarcms\Modules\Compras\Events\Handlers\RegisterComprasSidebar.php
        public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item("Proveedor", function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(

<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< MODELO-RUTAS-CONTROLADOR-VISTA >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

6-LAS RUTAS DEL MODULO ESTAN EN 'Modules/nombreModulo/Http/backendRoutes' por defecto 
    asgard ya te agrego las rutas necesarias para hacer cruds, se puede agregar mas rutas

7-LOS CONTROLADORES DEL MODULO ESTAN EN 'Modules/nombreModulo/Http/backendRoutes'

7-CREAR NUEVO FORMULARIO, ASGARD YA GENERA LAS VISTAS NECESARIAS, NOSOTROS SOLO AGREGAMOS LOS CAMPOS Y 
    CONFIGURAMOS, LAS VISTAS ESTAN EN 'Modules/nombreModulo/Resources/views/admin'


REGISTRAR CLASES PARA USAR GLOBALMENTE: 
    EN EL ARCHIVO config/app.php al final registar el alias deseado y la direccion de la clase, para usar
    globalmente solo se usa una barra opuesta: ejemplo \Producto

