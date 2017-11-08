<ul class="nav">
    <li>
        <a href="{{ url('/home') }}">
            <i class="ti-bar-chart-alt"></i>
            <p>Inicio</p>
        </a>
    </li>
    <li class="@yield('menu_catalog','')">
        <a href="{{ url('/catalog') }}">
            <i class="ti-hummer"></i>
            <p>Catalogos</p>
        </a>
    </li>
    <li>
        <a data-toggle="collapse" href="#dashboardOverview">
            <i class="ti-folder"></i>
            <p>Reservas
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse" id="dashboardOverview">
            <ul class="nav">
                <li>
                    <a href="{{ url('/reservation/create') }}">
                        <span class="sidebar-mini">AR</span>
                        <span class="sidebar-normal">Añadir reserva</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('reservations.today') }}">
                        <span class="sidebar-mini">RD</span>
                        <span class="sidebar-normal">Reservas del día</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/reservation') }}">
                        <span class="sidebar-mini">HR</span>
                        <span class="sidebar-normal">Historial de reservas</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li>
        <a data-toggle="collapse" href="#dashboardOverview2">
            <i class="ti-blackboard"></i>
            <p>Tareas
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse" id="dashboardOverview2">
            <ul class="nav">
                <li>
                    <a href="{{ url('/taskCreate') }}">
                        <span class="sidebar-mini">A T</span>
                        <span class="sidebar-normal">Asignar Tarea</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/taskAsignment') }}">
                        <span class="sidebar-mini">L T</span>
                        <span class="sidebar-normal">Lista de Tareas</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li>
        <a data-toggle="collapse" href="#dashboardOverview3">
            <i class="ti-user"></i>
            <p>Usuarios
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse" id="dashboardOverview3">
            <ul class="nav">
                <li>
                    <a href="{{ url('/userCreate') }}">
                        <span class="sidebar-mini">O</span>
                        <span class="sidebar-normal">Añadir Usuario</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/users') }}">
                        <span class="sidebar-mini">S</span>
                        <span class="sidebar-normal">Lista de Usuarios</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="@yield('menu_reports','')">
        <a href="{{ url('/taskReport') }}">
            <i class="ti-calendar"></i>
            <p>Reportes</p>
        </a>
    </li>
    <li>
        <a data-toggle="collapse" href="#productos">
            <i class="ti-panel"></i>
            <p>producto
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse" id="productos">
            <ul class="nav">
                <li>
                    <a href="{{ url('/pedidos') }}">
                        <span class="sidebar-mini">PP</span>
                        <span class="sidebar-normal">Pedido de productos</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/proveedores') }}">
                        <span class="sidebar-mini">S</span>
                        <span class="sidebar-normal">Proveedores</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/ventas') }}">
                        <span class="sidebar-mini">O</span>
                        <span class="sidebar-normal">Venta de productos</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/kardex') }}">
                        <span class="sidebar-mini">O</span>
                        <span class="sidebar-normal">Kardex de inventarios</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="@yield('menu_manager','')">
        <a href="#">
            <i class="ti-calendar"></i>
            <p>Kardex de inventarios</p>
        </a>
    </li>
    
</ul>
