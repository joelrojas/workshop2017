<nav class="menu">
                            <ul class="sidebar-menu metismenu" id="sidebar-menu">
                                <li class="@yield('menu_dashboard','')">
                                    <a href="{{ url('/home') }}">
                                        <i class="fa fa-home"></i> Inicio </a>
                                </li>
                                <li class="@yield('menu_reservas','')">
                                    <a href="{{ url('/reservation') }}">
                                        <i class="fa fa-calendar"></i> Reservas </a>
                                </li>
								<li class="@yield('menu_catalog','')">
                                    <a href="{{ url('/catalog') }}">
                                        <i class="fa fa-home"></i> Catalogos </a>
                                </li>
                                <li class="@yield('menu_kardex','')">
                                    <a href="">
                                        <i class="fa fa-th-large"></i> Productos
                                        <i class="fa arrow"></i>
                                    </a>
                                    <ul class="sidebar-nav">
                                        <li>
                                            <a href="/pedidos"> Pedido de productos</a>
                                        </li>
                                        <li>
                                            <a href="/proveedores">Proveedores</a>
                                        </li>

                                        <li>
                                            <a href="/ventas">Venta de productos</a>
                                        </li>

                                        <li>
                                            <a href="/kardex">Kardex de inventarios</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="@yield('menu_manager','')">
                                    <a href="index.html">
                                        <i class="fa fa-home"></i> Kardex de inventario </a>
                                </li>


                                <li>
                                    <a href="">
                                        <i class="fa fa-file-text-o"></i> Pages
                                        <i class="fa arrow"></i>
                                    </a>
                                    <ul class="sidebar-nav">
                                        <li>
                                            <a href="login.html"> Login </a>
                                        </li>
                                        <li>
                                            <a href="signup.html"> Sign Up </a>
                                        </li>
                                        <li>
                                            <a href="reset.html"> Reset </a>
                                        </li>
                                        <li>
                                            <a href="error-404.html"> Error 404 App </a>
                                        </li>
                                        <li>
                                            <a href="error-404-alt.html"> Error 404 Global </a>
                                        </li>
                                        <li>
                                            <a href="error-500.html"> Error 500 App </a>
                                        </li>
                                        <li>
                                            <a href="error-500-alt.html"> Error 500 Global </a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </nav>