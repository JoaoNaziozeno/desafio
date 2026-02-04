<footer class="footer">
    <div class="container-fluid">
        <ul class="nav">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    {{ _('Sobre nós') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="https://github.com/JoaoNaziozeno" target="_blank" class="nav-link">
                    {{ _('GitHub') }}
                </a>
            </li>
        </ul>
        <div class="copyright">
            &copy; {{ now()->year }} {{ _('feito com ') }} <i class="tim-icons icon-heart-2"></i> {{ _(' por') }}
            <a href="https://github.com/JoaoNaziozeno" target="_blank">{{ _('Naziozeno') }}</a> &amp;
            <a href="https://site.adiplix.com.br/" target="_blank">{{ _('Adiplix') }}</a> {{ _('por uma web melhor') }}.
        </div>
    </div>
</footer>
