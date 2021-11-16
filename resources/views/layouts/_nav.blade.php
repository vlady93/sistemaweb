<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image">
                    <img src="{{ asset('melody/images/faces/face16.jpg') }}" alt="image" />
                </div>
                <div class="profile-name">
                    <p class="name">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="designation">
                        {{ Auth::user()->email }}
                    </p>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @can('ver-proyecto')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#page-layouts2" aria-expanded="false"
                    aria-controls="page-layouts">
                    <i class="fas fa-project-diagram menu-icon"></i>
                    <span class="menu-title">Proyectos</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="page-layouts2">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link" href="{{ route('projectnews.index') }}">Proyectos Nuevos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('projects.index') }}">Proyectos Concluidos</a>
                        </li>
                    </ul>
                </div>
            </li>
        @endcan
        @can('ver-proveedor')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('providers.index') }}">
                    <i class="fas fa-shipping-fast menu-icon"></i>
                    <span class="menu-title">Proveedores</span>
                </a>
            </li>
        @endcan
        @can('categories.index')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.index') }}">
                    <i class="fas fa-tags menu-icon"></i>
                    <span class="menu-title">Categorías</span>
                </a>
            </li>
        @endcan
        @can('ver-material')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products.index') }}">
                    <i class="fas fa-boxes menu-icon"></i>
                    <span class="menu-title">Materiales</span>
                </a>
            </li>
        @endcan
        @can('ver-ingreso-material')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('purchases.index') }}">
                    <i class="fas fa-cart-plus menu-icon"></i>
                    <span class="menu-title">Ingreso de Material</span>
                </a>
            </li>
        @endcan
        @can('ver-salida-material')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('sales.index') }}">
                    <i class="fas fa-shopping-cart menu-icon"></i>
                    <span class="menu-title">Salida de Material</span>
                </a>
            </li>
        @endcan
        @can('ver-cliente')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('clients.index') }}">
                    <i class="fas fa-users menu-icon"></i>
                    <span class="menu-title">Clientes</span>
                </a>
            </li>
        @endcan
        @can('ver-reporte')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#page-layouts1" aria-expanded="false"
                    aria-controls="page-layouts">
                    <i class="fas fa-chart-line menu-icon"></i>
                    <span class="menu-title">Reportes</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="page-layouts1">
                    <ul class="nav flex-column">

                        <li class="nav-item">

                            <span class="nav-link text-bold">Reporte Diario</span> <i class="menu-arrow"></i>
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item d-none d-lg-block "><a class="nav-link"
                                        href="{{ route('reports.day_purchase') }}">Ingreso de Materiales</a> </li>
                                <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                        href="{{ route('reports.day_sales') }}">Salida de Materiales</a></li>
                                <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                        href="{{ route('reports.day_project') }}">Proyectos</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <span class="menu-title nav-link">Reporte por Fechas</span>
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item d-none d-lg-block "><a class="nav-link"
                                        href="{{ route('reports.date_purchase') }}">Ingreso de Materiales</a> </li>
                                <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                        href="{{ route('reports.date_sales') }}">Salida de Materiales</a></li>
                                <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                        href="{{ route('reports.date_project') }}">Proyectos</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </li>
        @endcan
        @can('ver-usuario')
            <li class="nav-item">
                <a class="nav-link" href="{{ 'users' }}">
                    <i class="fas fa-user-tag menu-icon"></i>
                    <span class="menu-title">Usuarios</span>
                </a>
            </li>
        @endcan

        @can('ver-rol')
            <li class="nav-item">
                <a class="nav-link" href="{{ 'roles' }}">
                    <i class="fas fa-user-cog menu-icon"></i>
                    <span class="menu-title">Roles</span>
                </a>
            </li>
        @endcan



    </ul>
</nav>
