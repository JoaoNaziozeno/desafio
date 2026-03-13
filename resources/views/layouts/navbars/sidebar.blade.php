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
                    <p>Todas Notícias</p>
                </a>
            </li>
            
            <li class="{{ (($pageSlug ?? '') === 'noticias.index') ? 'active' : '' }}">
                <a href="{{ route('noticias.index') }}">
                    <i class="tim-icons icon-paper"></i>
                    <p>Minhas Notícias</p>
                </a>
            </li>

            <li class="{{ (($pageSlug ?? '') === 'users.index') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>Perfis de Usuários</p>
                </a>
            </li>
            </ul>
    </div>
</div>
