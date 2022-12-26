<nav id="navbar" class="navbar nav-menu">
  <ul>
    <li>

      <a href="{{ request()->routeIs('informatika.*') ? '/informatika' : '/sipil' }}" class="nav-link {{ ($active == "
        it" or $active=="sipil" ) ? 'active' : '' }}"><i class="bx bx-home"></i> <span>Home</span></a>
    </li>
    <li>
      <a href="{{ request()->routeIs('informatika.*') ? '/informatika/posts' : '/sipil/posts' }}"
        class="nav-link {{ ($active == " it_posts" or $active=="sipil_posts" ) ? 'active' : '' }}"><i
          class="bx bx-news"></i> <span>Postingan</span></a>
    </li>
    <li>
      <a href="{{ request()->routeIs('informatika.*') ? '/informatika/strukturs' : '/sipil/strukturs' }}"
        class="nav-link {{ ($active == " it_struktur" or $active=="sipil_struktur" ) ? 'active' : '' }}"><i
          class="bx bx-sitemap"></i> <span>Struktur Organisasi</span></a>
    </li>
    <li>
      <a href="{{ request()->routeIs('informatika.*') ? '/informatika/saranas' : '/sipil/saranas' }}"
        class="nav-link {{ ($active == " it_sarana" or $active=="sipil_sarana" ) ? 'active' : '' }}"><i
          class="bx bx-wallet"></i> <span>Sarana & Prasarana</span></a>
    </li>
    <li>
      <a href="{{ request()->routeIs('informatika.*') ? '/informatika/galeri' : '/sipil/galeri' }}"
        class="nav-link {{ ($active == " it_galeri" or $active=="sipil_galeri" ) ? 'active' : '' }}"><i
          class="bx bx-image-alt"></i><span>Galeri</span></a>
    </li>
    <li>
      <a href="{{ request()->routeIs('informatika.*') ? '/informatika/about' : '/sipil/about' }}"
        class="nav-link {{ ($active == " it_about" or $active=="sipil_about" ) ? 'active' : '' }}"><i
          class="bx bx-group"></i> <span>Tentang Lab</span></a>
    </li>
    <li>
      <a href="{{ request()->routeIs('informatika.*') ? '/informatika/respon' : '/sipil/respon' }}"
        class="nav-link {{ ($active == " it_respon" or $active=="sipil_respon" ) ? 'active' : '' }}"><i
          class="bx bx-question-mark"></i> <span>Respon</span></a>
    </li>
    <br>
    <br>
    <br>
    @auth
    <li>
      <a class="nav-link"><i class="bx bx-user-pin"></i> <span>Hi, {{ auth()->user()->name }}</span></a>
    </li>
    @else
    <li>
      <a class="nav-link"><i class="bx bx-user-pin"></i> <span>Hi, Guest</span></a>
    </li>
    {{-- <li>
      <a href="/login" class="nav-link {{ ($active === " login") ? 'active' : '' }}"><i class="bx bx-log-in-circle"></i>
        <span>Login</span></a>
    </li> --}}
    @endauth
  </ul>
</nav><!-- .nav-menu -->