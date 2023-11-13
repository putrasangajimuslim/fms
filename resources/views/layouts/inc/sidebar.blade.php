<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Administrator</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('campaign.index') }}"> Campaign </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('customer.index') }}"> Upload Data </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('distribute.index') }}"> Distribute Data </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('report.index') }}"> Reporting </a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
