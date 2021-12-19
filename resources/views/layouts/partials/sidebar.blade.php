<!-- Sidebar -->
<?php 
    if(!auth()->user()->hasRole('Cocinero')){
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
                <a class="collapse-item" href="/usuarios">
                    <i class="fas fa-users fa-fw"></i> Usuarios
                </a>
                <a class="collapse-item" href="/estadoenvios">
                    <i class="fas fa-users fa-fw"></i> Estado Envios
                </a>
                <a class="collapse-item" href="/turnos">
                    <i class="fas fa-users fa-fw"></i> Turnos
                </a>
                <a class="collapse-item" href="/empleado">
                    <i class="fas fa-id-card fa-fw"></i> Empleados
                </a>
                <a class="collapse-item" href="/clientes">
                    <i class="fas fa-id-card-alt"></i> Clientes
                </a>
                <a class="collapse-item" href="/proveedores">
                     <i class="fas fa-people-carry"></i> Proveedores
                </a>
                <a class="collapse-item" href="/documentos">
                     <i class="fas fa-file-invoice"></i> Tipo Documento
                </a>
                <a class="collapse-item" href="/cargoempleados">
                     <i class="fas fa-align-justify"></i> Cargo
                </a>
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
                <a class="collapse-item" href="/categorias">
                     <i class="fas fa-project-diagram"></i> Categorias
                </a>
                <a class="collapse-item" href="/inventarios">
                    <i class="fas fa-boxes"></i> Inventario
                </a>
                <a class="collapse-item" href="/productos">
                    <i class="fas fa-boxes"></i> Productos
                </a>
                <a class="collapse-item" href="/descuentos">
                     <i class="fas fa-align-justify"></i> Descuento
                </a>
                <a class="collapse-item" href="/precioinventario">
                     <i class="fas fa-align-justify"></i> Precio historico inventario
                </a>

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
            <span>Pedidos y Compras</span>
        </a>
        <div id="collapse4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/pagos">
                     <i class="fas fa-credit-card"></i> Tipo Pago
                </a>
                <a class="collapse-item" href="/pedidos">
                     <i class="fas fa-cash-register"></i> Pedidos
                </a>
                <a class="collapse-item" href="/compras">
                     <i class="fas fa-align-justify"></i> Compras
                </a>
                <a class="collapse-item" href="/isv">
                     <i class="fas fa-credit-card"></i> Isv
                </a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Complementos
    </div>


    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="/product">
            <i class="fas fa-boxes"></i>
            <span>Productos</span></a>
        
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
<?php
    }
?>