<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-cogs"></i>
            <span>Sistemas</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ route('QuotationIndex') }}">Cotizacion</a>
            <a class="dropdown-item" href="{{ route('QuotationGetIndex') }}">API Cotizacion</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">--</h6>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-table"></i>
            <span>Otros</span></a>
    </li>
</ul>
