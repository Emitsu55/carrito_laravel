<header class="navegacion">
    <h1><a href="/">AppStore</a></h1>
    <div class="mobile-menu">
        <button>
            {{-- <svg class="" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg> --}}
        </button>
    </div>

    <nav class="nav-menu">
            <a href="/" class="">
                Tienda
            </a>
            <a href="/carrito" class="">
                <span class="alert">{{count(Cart::getContent())}}</span>
                <i class="fas fa-shopping-cart"></i>
            </a>     
    </nav>
</header>