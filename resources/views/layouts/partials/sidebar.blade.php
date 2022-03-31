<!-- Sidebar -->

<?php 
    //if(!auth()->user()->hasRole('Cocinero')){
        ?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-mug-hot"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Mr <sup>Coffe</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Inicio</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Configuración
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
           <i class="fas fa-user-cog"></i>
            <span>Personas</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @can('user_index')    
                <a class="collapse-item" href="/usuarios">
                    <i class="fas fa-users fa-fw"></i> Usuarios
                </a>
                @endcan
                @can('role_index') 
                <a class="collapse-item" href="/roles">
                    <i class="fas fa-user-shield fa-fw"></i> Roles
                </a>
                @endcan
                @can('permission_index') 
                <a class="collapse-item" href="/permissions">
                    <i class="fas fa-user-lock fa-fw"></i> Permisos
                </a>
                @endcan
                @can('estadoenvio_index') 
                <a class="collapse-item" href="/estadoenvios">
                    <i class="fas fa-car-side"></i> Estado Envios
                </a>
                @endcan
                @can('turno_index')
                <a class="collapse-item" href="/turnos">
                      <i class="fas fa-list"></i> Turnos
                </a>
                @endcan
                @can('empleado_index') 
                <a class="collapse-item" href="/empleado">
                    <i class="fas fa-id-card fa-fw"></i> Empleados
                </a>
                @endcan
                @can('salariohis_index') 
                <a class="collapse-item" href="/salario">
                         <i class="fas fa-history"></i></i> Salarios Histórico
                     
                </a>
                @endcan
                @can('cliente_index') 
                <a class="collapse-item" href="/clientes">
                    <i class="fas fa-id-card-alt"></i> Clientes
                </a>
                @endcan
                @can('proveedor_index') 
                <a class="collapse-item" href="/proveedores">
                     <i class="fas fa-people-carry"></i> Proveedores
                </a>
                @endcan
                @can('documento_index') 
                <a class="collapse-item" href="/documentos">
                     <i class="fas fa-file-invoice"></i> Tipo Documento
                </a>
                @endcan
                @can('cargo_index') 
                <a class="collapse-item" href="/cargoempleados">
                     <i class="fas fa-align-justify"></i> Cargo
                </a>
                @endcan
                @can('cargohis_index') 
                <a class="collapse-item" href="/cargoempleadohistorico">
                <i class="fas fa-history"></i></i> Histórico Cargo      
                </a>
                @endcan
            
      <!--          <a class="collapse-item" href="/role_user">
                     <i class="fas fa-align-justify"></i> Rol
                </a>
    -->
                
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3"
           aria-expanded="true" aria-controls="collapseTwo">
           <i class="fas fa-clipboard-check"></i>
            <span>Inventario</span>
        </a>
        <div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                @can('cargohis_index')
                <a class="collapse-item" href="/categorias">
                     <i class="fas fa-project-diagram"></i> Categorias
                </a>
                @endcan
                @can('inventario_index')
                <a class="collapse-item" href="/inventarios">
                    <i class="fas fa-boxes"></i> Inventario
                </a>
                @endcan
                @can('precioinventario_index')
                <a class="collapse-item" href="/precioinventario">
                      <i class="fas fa-history"></i> Histórico Precio <br>inventario</br>
                </a>
                @endcan
                @can('producto_index')
                <a class="collapse-item" href="/productos">
                    <i class="fas fa-boxes"></i> Productos
                </a>
                @endcan
                @can('descuento_index')
                <a class="collapse-item" href="/descuentos">
                     <i class="fas fa-percent"></i> Descuento
                </a>
                @endcan
                @can('preciohismenu_index')
                <a class="collapse-item" href="/historicopreciomenu">
                     <i class="fas fa-history"></i> Histórico Precio Menú
                </a>
                @endcan
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse4"
           aria-expanded="true" aria-controls="collapseTwo">
           <i class="fas fa-receipt"></i>
            <span>Pedidos </span>
        </a>
        <div id="collapse4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                @can('pago_index')
                <a class="collapse-item" href="/pagos">
                     <i class="fas fa-credit-card"></i> Tipo Pago
                </a>
                @endcan
                @can('pedido_index')
                <a class="collapse-item" href="/pedidos">
                     <i class="fas fa-cash-register"></i> Pedidos
                </a>
                @endcan
               <!-- <a class="collapse-item" href="/compras">
                     <i class="fas fa-align-justify"></i> Compras
                </a>-->
         
                @can('isv_index')
                <a class="collapse-item" href="/isv">
                     <i class="fas fa-credit-card"></i> Isv
                </a>
                @endcan
                @can('factura_index')
                <a class="collapse-item" href="/factura">
                 <i class="fas fa-file-invoice-dollar"></i> Factura
                </a>
                @endcan
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Divider 
    <hr class="sidebar-divider">

     Heading
    <div class="sidebar-heading">
        Complementos
    </div>


     Nav Item - Tables 
    <li class="nav-item">
        <a class="nav-link" href="/product">
            <i class="fas fa-boxes"></i>
            <span>Productos</span></a>
        
    </li>-->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
<?php
    //}
?>