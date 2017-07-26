<!--
  Main sidebar seen on the left. may be static or collapsing depending on selected state.

    * Collapsing - navigation automatically collapse when mouse leaves it and expand when enters.
    * Static - stays always open.
-->
<nav id="sidebar" class="sidebar" role="navigation">
    <!-- need this .js class to initiate slimscroll -->
    <div class="js-sidebar-content">
        <header class="logo hidden-sm-down">
            <a href="<?php echo e(URL('index/0')); ?>">SC</a>
        </header>
        <!-- seems like lots of recent admin template have this feature of user info in the sidebar.
             looks good, so adding it and enhancing with notifications -->
        <div class="sidebar-status hidden-md-up">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="thumb-sm avatar pull-xs-right">

                </span>
                <!-- .circle is a pretty cool way to add a bit of beauty to raw data.
                     should be used with bg-* and text-* classes for colors -->
                <span class="circle bg-warning fw-bold text-gray-dark">
                    13
                </span>
                &nbsp;
                Administrador
                <b class="caret"></b>
            </a>
            <!-- #notifications-dropdown-menu goes here when screen collapsed to xs or sm -->
        </div>
        <!-- main notification links are placed inside of .sidebar-nav -->
        <ul class="sidebar-nav scroll" style="font-size: 14px; line-height: 15px;">
            <li class="active">
                <a href="#sidebar-dashboard" data-toggle="collapse" data-parent="#sidebar">
                    <a href="<?php echo e(url('index')); ?>">
                        <span class="icon">
                            <i class="fa fa-home"></i>
                        </span>
                        Inicio</a>
                </a>
            </li>            
            <li class="active">
                <a href="#sidebar-dashboard" data-toggle="collapse" data-parent="#sidebar">
                    <a href="<?php echo e(url('busqueda')); ?>">
                        <span class="icon">
                            <i class="fa fa-search"></i>
                        </span>
                        Búsqueda</a>
                </a>
            </li>            
            <li class="active">
                <a href="#sidebar-dashboard" data-toggle="collapse" data-parent="#sidebar">
                    <a href="<?php echo e(url('personas/listado')); ?>">
                        <span class="icon">
                            <i class="fa fa-list-alt"></i>
                        </span>
                        <?php echo e(\Auth::User()->programa()->nombre); ?> detalle</a>
                </a>
            </li>            
            <li class="active">
                <a href="#sidebar-dashboard" data-toggle="collapse" data-parent="#sidebar">
                    <a href="<?php echo e(url('personas/auditoria')); ?>">
                        <span class="icon">
                            <i class="fa fa-check-square-o"></i>
                        </span>
                        Acciones</a>
                </a>
            </li>            
            <li class="active">
                <a href="#sidebar-dashboard" data-toggle="collapse" data-parent="#sidebar">
                    <a href="<?php echo e(url('personas/auditoriaVer')); ?>">
                        <span class="icon">
                            <i class="fa fa-eye"></i>
                        </span>
                        Acciones detalle</a>
                </a>
            </li>            
        </ul>

    </div>
</nav>