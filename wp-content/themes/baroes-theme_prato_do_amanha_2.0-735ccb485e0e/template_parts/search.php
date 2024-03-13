<div id="search">
    <header class="search-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="<?php bloginfo('url'); ?>" class="search-form">
                        <input type="text" name="s" class="form-control" placeholder="Buscar..." aria-label="Buscar...">
                    </form>
                    <span class="icon-close">
                        <i class="material-icons">close</i>
                    </span>
                </div>
            </div>
        </div>
    </header>
    <div class="search-body">
        <div class="container">
            <div class="search-message default active">
                <div class="icon">
                    <i class="material-icons">search</i>
                </div>
                <div class="message">Digite sua busca</div>
            </div>
            <div class="search-message loading">
                <div class="icon">
                    <div class="lds-dual-ring"></div>
                </div>
                <div class="message">Buscando...</div>
            </div>
            <div class="search-message no-content">
                <div class="icon">
                    <i class="material-icons">report</i>
                </div>
                <div class="message">Nenhum resultado encontrado.</div>
            </div>
            <div class="row results mobile-v-spacing" style="row-gap: 2rem;">
            </div>
        </div>
    </div>
</div>
