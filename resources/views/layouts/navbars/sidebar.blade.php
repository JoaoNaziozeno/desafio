<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">WD</a>
            <a href="#" class="simple-text logo-normal">White Dashboard</a>
        </div>

        <ul class="nav">
            <li class="{{ (($pageSlug ?? '') === 'home') ? 'active' : '' }}">
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            
            <li class="{{ (($pageSlug ?? '') === 'noticias.index') ? 'active' : '' }}">
                <a href="{{ route('noticias.index') }}">
                    <i class="tim-icons icon-paper"></i>
                    <p>Notícias</p>
                </a>
            </li>
            
            <li class="{{ (($pageSlug ?? '') === 'profile.edit') ? 'active' : '' }}">
                <a href="{{ route('profile.edit') }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>User Profile</p>
                </a>
            </li>
        </ul>
    </div>
</div>
