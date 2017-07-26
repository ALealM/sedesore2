  
<!-- This is the white navigation bar seen on the top. A bit enhanced BS navbar. See .page-controls in _base.scss. -->
<nav class="page-controls navbar navbar-dashboard">
    <div class="container-fluid">
        <!-- .navbar-header contains links seen on xs & sm screens -->
        <div class="navbar-header">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <!-- whether to automatically collapse sidebar on mouseleave. If activated acts more like usual admin templates -->
<!--                    <a class="hidden-md-down nav-link" id="nav-state-toggle" href="#" data-toggle="tooltip" data-html="true" data-original-title="Turn<br>on/off<br>sidebar<br>collapsing" data-placement="bottom">
                        <i class="fa fa-bars fa-lg"></i>
                    </a>
                     shown on xs & sm screen. collapses and expands navigation 
                    <a class="hidden-lg-up nav-link" id="nav-collapse-toggle" href="#" data-html="true" title="Show/hide<br>sidebar" data-placement="bottom">
                        <span class="rounded rounded-lg bg-gray text-white hidden-md-up"><i class="fa fa-bars fa-lg"></i></span>
                        <i class="fa fa-bars fa-lg hidden-sm-down"></i>
                    </a>-->
                </li>
                <li class="nav-item hidden-sm-down"><a href="{{ url('/logout') }}"
                                                       onclick="event.preventDefault();
                                                               document.getElementById('logout-form').submit();">
                        <span>Cerrar sesi&oacute;n</span>
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                <li class="nav-item hidden-md-up"><a href="{{ url('/index') }}">
                        <span><i class="fa fa-home fa-lg"></i></span>
                    </a>
                </li>
                <li class="nav-item hidden-md-up"><a href="{{ url('/busqueda') }}">
                        <span><i class="fa fa-search fa-lg"></i></span>
                    </a>
                </li>
                <li class="nav-item hidden-md-up"><a href="{{ url('/personas/listado') }}">
                        <span><i class="fa fa-list-alt fa-lg"></i></span>
                    </a>
                </li>
                <li class="nav-item hidden-md-up"><a href="{{ url('/personas/auditoria') }}">
                        <span><i class="fa fa-check-square-o fa-lg"></i></span>
                    </a>
                </li>
                <li class="nav-item hidden-md-up"><a href="{{ url('/personas/auditoriaVer') }}">
                        <span><i class="fa fa-eye fa-lg"></i></span>
                    </a>
                </li>
                <li class="nav-item hidden-md-up"><a href="{{ url('/logout') }}"
                                                       onclick="event.preventDefault();
                                                               document.getElementById('logout-form').submit();">
                        <span><i class="fa fa-sign-out fa-lg"></i></span>
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                
            </ul>
            <!-- xs & sm screen logo -->
        </div>

    </div>
</nav>