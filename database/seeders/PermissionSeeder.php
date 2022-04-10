<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permission = [
            'permission_index',
            'permission_create',
            'permission_show',
            'permission_edit',
            'permission_destroy',

            'role_index',
            'role_create',
            'role_show',
            'role_edit',
            'role_destroy',

            'user_index',
            'user_create',
            'user_show',
            'user_edit',
            'user_destroy',

            'cargo_index',
            'cargo_create',
            'cargo_reporte',
            'cargo_edit',
            'cargo_destroy',

            'cargohis_index',
            'cargohis_reporte',

            'categoria_index',
            'categoria_create',
            'categoria_reporte',
            'categoria_edit',
            'categoria_destroy',

            'cliente_index',
            'cliente_create',
            'cliente_reporte',
            'cliente_show',
            'cliente_edit',
            'cliente_destroy',

            'descuento_index',
            'descuento_create',
            'descuento_reporte',
            'descuento_edit',
            'descuento_destroy',

            'empleado_index',
            'empleado_create',
            'empleado_reporte',
            'empleado_show',
            'empleado_edit',
            'empleado_destroy',

            'estadoenvio_index',
            'estadoenvio_create',
            'estadoenvio_reporte',
            'estadoenvio_edit',
            'estadoenvio_destroy',

            'inventario_index',
            'inventario_create',
            'inventario_reporte',
            'inventario_show',
            'inventario_edit',
            'inventario_destroy',
            
            'isv_index',
            'isv_create',
            'isv_reporte',
            'isv_edit',
            'isv_destroy',

            'pedido_index',
            'pedido_create',
            'pedido_show',
            'pedido_reporte',
            'pedido_edit',
            'pedido_destroy',

            'precioinventario_index',
            'precioinventario_reporte',

            'preciohismenu_index',
            'preciohismenu_reporte',

            'producto_index',
            'producto_create',
            'producto_show',
            'producto_reporte',
            'producto_edit',
            'producto_destroy',

            'proveedor_index',
            'proveedor_create',
            'proveedor_show',
            'proveedor_reporte',
            'proveedor_edit',
            'proveedor_destroy',

            'salariohis_index',
            'salariohis_reporte',

            'documento_index',
            'documento_create',
            'documento_reporte',
            'documento_edit',
            'documento_destroy',

            'pago_index',
            'pago_create',
            'pago_reporte',
            'pago_edit',
            'pago_destroy',

            'turno_index',
            'turno_create',
            'turno_reporte',
            'turno_edit',
            'turno_destroy',

            'factura_index',
            'factura_create',
            'factura_show',
            'factura_reporte',
            'factura_edit',
            'factura_destroy',

        ];

        foreach ($permission as $permission){
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
