<section class="hero is-dark">
    <div class="hero-head">
        <nav class="navbar">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item">
                    Blog BAUBYTE
                    </a>
                    <span class="navbar-burger" data-target="navbarMenuHeroB">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </div>
                <div id="navbarMenuHeroB" class="navbar-menu">
                    <div class="navbar-end">
                        <a class="navbar-item">
                            β 
                            β 
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="hero-body">
        <p class="title">
            π Dashboard del Blog π
        </p>
        <p class="subtitle">
            Administra tu Blog π
        </p>
    </div>
    <div class="hero-foot">
        <nav class="tabs is-boxed is-fullwidth">
            <div class="container">
                <ul>
                    <li class="<?= service('request')->uri->getPath() ? 'is-active' : ''; ?>">
                        <a href="<?= base_url() ?>">PaΓ­ses π </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</section>