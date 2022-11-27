<header role="banner">
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-JQ4MRLNY0X"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-JQ4MRLNY0X');
</script>
    <img id="logo-main" src="{{ asset('assets/images/logo_wishlist.png') }}" width="200" alt="Logo Thing main logo">
    <div class="d-none d-lg-block d-xl-block">
        <div class="d-flex social-media-nav">
            <a class="nav-link" href="https://www.facebook.com/universitasdinamika/" target="_blank"><i
                    class="fab fa-facebook-f text-pink"></i></a>
            <a class="nav-link" href="https://www.youtube.com/user/stikomsurabaya" target="_blank"><i
                    class="fab fa-youtube text-pink"></i></a>
            <a class="nav-link" href="https://twitter.com/undikasurabaya" target="_blank"><i
                    class="fab fa-twitter text-pink"></i></a>
            <a class="nav-link" href="https://www.instagram.com/universitasdinamika" target="_blank"><i
                    class="fab fa-instagram text-pink"></i></a>
        </div>
    </div>
    <div class="row justify-content-center ">
        <div class="col-md-6">
            <form action="{{ route('wishlist') }}">
                <div class="input-group mb-3">
                    <input class="form-control me-2" type="text" placeholder="Search" name="search">
                    <button class="btn btn-outline-wishlist" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    <nav class="navbar navbar-expand-sm navbar-light bg-pink">
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"><i
                class="fas fa-bars"></i></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                <!-- active link -->
                <li class="nav-item mx-md-4 active">

                    {{-- <a class="nav-link rounded-lg rounded-pill px-5 bg-pink text-white" href="{{ route('wishlist') }}">HOME <span class="sr-only">(current)</span></a> --}}
                    <a class="nav-link text-white" href="{{ route('wishlist') }}">HOME <span class="sr-only">(current)</span></a>
                </li>
                <!-- end active link -->
                <!-- <li class="nav-item mx-5">
                    <a class="nav-link" href="#">ISSUE</a>
                </li> -->
                @foreach ($kategori as $item)
                    @if ($item->subkategori->count() != 0)
                        <li class="nav-item mx-md-4 dropdown">
                            <a class="nav-link dropdown text-white" href="#" id="dropdownId" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">{{ $item->kategories }}</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                @foreach ($item->subkategori as $subs)
                                    <a class="dropdown-item"
                                        href="{{ route('halaman', ['id' => $subs->id]) }}">{{ $subs->subkategories }}</a>
                                @endforeach
                            </div>
                        </li>
                    @else
                        {{-- @dd($item) --}}
                        <li class="nav-item mx-md-4">
                            <a class="nav-link text-white"
                                href="{{ route('halaman_baru', ['id' => $item->id]) }}">{{ $item->kategories }}</a>
                        </li>
                    @endif
                @endforeach
                {{-- <li class="nav-item mx-5 dropdown">
                    <a class="nav-link dropdown" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">LIFESTYLE</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="#">Action 1</a>
                        <a class="dropdown-item" href="#">Action 2</a>
                    </div>
                </li>
                <li class="nav-item mx-5 dropdown">
                    <a class="nav-link dropdown" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">REFRESH</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="#">Action 1</a>
                        <a class="dropdown-item" href="#">Action 2</a>
                    </div>
                </li> --}}
                <li class="nav-item mx-md-4">
                    <a class="nav-link text-white" href="{{ route('login') }}"><i class="fas fa-key"></i></a>
                </li>
            </ul>

        </div>
    </nav>
</header><!-- header role="banner" -->
