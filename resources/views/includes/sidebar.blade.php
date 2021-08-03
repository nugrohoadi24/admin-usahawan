<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="./"><i class="menu-icon fa fa-laptop"></i>Dashboard</a>
                </li>
                <li class="menu-title">Laporan</li>
                <li class="">
                    <a href="{{ route('laporan.index') }}"> <i class="menu-icon fa fa-list"></i>Data Laporan</a>
                </li>
                <li class="">
                    <a href="#"> <i class="menu-icon fa fa-check"></i>Verifikasi Laporan</a>
                </li>

                <li class="menu-title">Permohonan</li>
                <li class="">
                    <a href="{{ route('permohonan.index') }}"> <i class="menu-icon fa fa-list"></i>Data Permohonan</a>
                </li>
                <li class="">
                    <a href="#"> <i class="menu-icon fa fa-check"></i>Verifikasi Permohonan</a>
                </li>
            </ul>
        </div>
    </nav>
</aside>
<!-- /#left-panel -->