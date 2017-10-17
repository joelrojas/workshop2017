<ul class="nav">
    <li>
        <a href="{{ url('/home') }}">
            <i class="ti-bar-chart-alt"></i>
            <p>Inicio</p>
        </a>
    </li>
    <li>
        <a data-toggle="collapse" href="#dashboardOverview">
            <i class="ti-panel"></i>
            <p>Reservas
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse" id="dashboardOverview">
            <ul class="nav">
                <li>
                    <a href="{{ url('/reservation/create') }}">
                        <span class="sidebar-mini">O</span>
                        <span class="sidebar-normal">Añadir reserva</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/reservation') }}">
                        <span class="sidebar-mini">S</span>
                        <span class="sidebar-normal">Lista de reserva</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="@yield('menu_catalog','')">
        <a href="{{ url('/catalog') }}">
            <i class="ti-calendar"></i>
            <p>Catalogos</p>
        </a>
    </li>
    <li class="@yield('menu_user','')">
        <a href="{{ url('/users') }}">
            <i class="ti-calendar"></i>
            <p>Usuarios</p>
        </a>
    </li>
    <li class="@yield('menu_task','')">
        <a href="{{ url('/taskAsignment') }}">
            <i class="ti-calendar"></i>
            <p> Asignacion de Tareas</p>
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

    <li>
        <a data-toggle="collapse" href="#formsExamples">
            <i class="ti-clipboard"></i>
            <p>
                Forms
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse" id="formsExamples">
            <ul class="nav">
                <li>
                    <a href="../forms/regular.html">
                        <span class="sidebar-mini">Rf</span>
                        <span class="sidebar-normal">Regular Forms</span>
                    </a>
                </li>
                <li>
                    <a href="../forms/extended.html">
                        <span class="sidebar-mini">Ef</span>
                        <span class="sidebar-normal">Extended Forms</span>
                    </a>
                </li>
                <li>
                    <a href="../forms/validation.html">
                        <span class="sidebar-mini">Vf</span>
                        <span class="sidebar-normal">Validation Forms</span>
                    </a>
                </li>
                <li>
                    <a href="../forms/wizard.html">
                        <span class="sidebar-mini">W</span>
                        <span class="sidebar-normal">Wizard</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>

    <li>
        <a data-toggle="collapse" href="#pagesExamples">
            <i class="ti-gift"></i>
            <p>
                Pages
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse" id="pagesExamples">
            <ul class="nav">
                <li>
                    <a href="../pages/timeline.html">
                        <span class="sidebar-mini">TP</span>
                        <span class="sidebar-normal">Timeline Page</span>
                    </a>
                </li>
                <li>
                    <a href="../pages/user.html">
                        <span class="sidebar-mini">UP</span>
                        <span class="sidebar-normal">User Page</span>
                    </a>
                </li>
                <li>
                    <a href="../pages/login.html">
                        <span class="sidebar-mini">LP</span>
                        <span class="sidebar-normal">Login Page</span>
                    </a>
                </li>
                <li>
                    <a href="../pages/register.html">
                        <span class="sidebar-mini">RP</span>
                        <span class="sidebar-normal">Register Page</span>
                    </a>
                </li>
                <li>
                    <a href="../pages/lock.html">
                        <span class="sidebar-mini">LSP</span>
                        <span class="sidebar-normal">Lock Screen Page</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
</ul>