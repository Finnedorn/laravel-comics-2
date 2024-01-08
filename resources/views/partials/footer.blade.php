@php
   $dcComics = config("comics.dcComicsArr");
   $dcShop = config("comics.shopArr");
   $dcInfo = config("comics.dcArr");
   $dcSites = config("comics.sitesArr");
   $dcIcons = config("comics.iconsArr");
@endphp
<footer>
    <div class=" top-footer-wrapper position-relative  overflow-hidden">
        <div class="container">
            <div class="bg-logo-wrapper position-absolute ">
                <img src="{{Vite::asset('resources/img/dc-logo-bg.png')}}" alt="dc-logo-bg">
            </div>
            <div class=" row-cols-6 d-flex py-5 ">
                <!--col1-->
                <div>
                    <ul>
                        <h5 class="font-my-light footer-title">
                            DC COMICS
                        </h5>
                        @foreach ($dcComics as $item)
                            <li>
                                <a href="#" class="font-my-grey footer-links">
                                    {{$item}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <ul>
                        <h5 class="font-my-light footer-title">
                            SHOP
                        </h5>
                        @foreach ($dcShop as $item)
                            <li>
                                <a href="#" class="font-my-grey footer-links">
                                    {{$item}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!--col2-->
                <div>
                    <ul>
                        <h5 class="font-my-light footer-title">
                            DC
                        </h5>
                        @foreach ($dcInfo as $item)
                            <li>
                                <a href="#" class="font-my-grey footer-links">
                                    {{$item}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!--col3-->
                <div>
                    <ul>
                        <h5 class="font-my-light footer-title">
                            SITES
                        </h5>
                        @foreach ($dcSites as $item)
                            <li>
                                <a href="#" class="font-my-grey footer-links">
                                    {{$item}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-my-dark-grey py-4">
        <div class="container d-flex  justify-content-between align-items-center">
            <div class="ps-4">
                <button type="button" class="btn btn-outline-primary font-my-light p-3">
                    SIGN-UP NOW!
                </button>
            </div>
            <div>
                <ul class="d-flex flex-row flex-wrap justify-content-between align-items-center">
                    <h5 class="footer-title font-my-light-blue pt-2">
                        FOLLOW US
                    </h5>
                    @foreach ($dcIcons as $item)
                        <li class=" ms-3 ">
                            <a href="#" class="icon-wrapper">
                                <img src="{{$item['picture']}}" alt="{{$item['info']}}">
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</footer>
