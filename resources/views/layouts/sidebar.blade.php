<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3> MENÚ</h3>
            <strong>MN</strong>
        </div>
        <ul class="list-unstyled components">
            <li class="active">
                <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-users"></i> Gestionar Usuarios
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu1">
                    <li>
                        <a href="{{ route('administrador.index') }}"><i class="fas fa-user"></i> Administrador</a>
                    </li>
                    <li>
                        <a href="{{ route('empleado.index') }}"><i class="fas fa-user"></i> Empleado</a>
                    </li>
                    <li>
                        <a href="{{ route('cliente.index') }}"><i class="fas fa-user"></i> Cliente</a>
                    </li>
                    <li class="active">
                        <a href="#pageSubmenu10" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fas fa-user-lock"></i> Privilegios
                        </a>
                        <ul class="collapse list" id="pageSubmenu10">
                            <a href="{{ route('role.index') }}"><i class="fas fa-user-lock"></i> Roles</a>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('bitacora') }}"><i class="fas fa-clipboard"></i> Bitácora</a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-store"></i> Gestionar Productos
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu2">
                    <li>
                        <a href="{{ route('tipo.index') }}"><i class="fas fa-asterisk"></i> Tipo</a>
                    </li>
                    <li>
                        <a href="{{ route('categoria.index') }}"><i class="fas fa-asterisk"></i> Categoría</a>
                    </li>
                    <li>
                        <a href="{{ route('peso.index') }}"><i class="fas fa-asterisk"></i> Peso</a>
                    </li>
                    <li>
                        <a href="{{ route('producto.index') }}"><i class="fas fa-box-open"></i> Producto</a>
                    </li>
                    <li>
                        <a href="{{ route('notaIngreso.index') }}"><i class="fas fa-clipboard"></i> Nota De Ingreso</a>
                    </li>
                    <li>
                        <a href="{{ route('cartCliente.index') }}"><i class="fas fa-cart-arrow-down"></i> Carritos Clientes</a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-coins"></i> Gestionar Ventas
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu3">
                    <li>
                        <a href="{{ route('factura.index') }}"> <i class="fas fa-clipboard"></i> Factura</a>
                    </li>
                    <li>
                        <a href="{{ route('notaVenta.index') }}"> <i class="fas fa-clipboard"></i> Nota Venta</a>
                    </li>
                    <li>
                        <a href="{{ route('detalleVenta.index') }}"> <i class="fas fa-clipboard"></i> Detalle Venta</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- Page Content  -->
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand text-black" class="nav-link" href="#" id="sidebarCollapse">
                    <i class="fas fa-align-left"> </i>
                </a>
            </div>
        </nav>
    </div>
</div>
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
    integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
</script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
    integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
