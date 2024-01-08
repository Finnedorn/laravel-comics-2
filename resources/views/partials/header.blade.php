@php
    $dcNav = config("comics.navArr");
@endphp
<header class="bg-my-white">
    <div class="container d-flex justify-content-between py-3">
      <!--logo-->
      <div class="logo-wrapper">
        <a href="{{route('home')}}"><img src="{{Vite::asset('resources/img/dc-logo.png')}}" alt="dc-logo"></a>
      </div>
      <!--navbar-->
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                @foreach ($dcNav as $item)
                    <li class="nav-item nav-font me-4">
                        <a class="nav-link active" aria-current="page" href="#">{{$item}}</a>
                    </li>
                @endforeach
            </ul>
          </div>
        </div>
      </nav>
    </div>
</header>
