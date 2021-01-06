<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> 082333858461</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> amirinsyaifudin6@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/"><img src="{{ asset('eshopper/images/home/logo.png') }}" alt="" /></a>
                    </div>
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canada</a></li>
                                <li><a href="#">UK</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canadian Dollar</a></li>
                                <li><a href="#">Pound</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            {{--  <li><a href="#"><i class="btn btn-default dropdown-toggle"></i>ORDER PRODUCT</a></li>  --}}
                            <div class="btn-group">
                                <a href="" type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    LIST PRODUCT
                                    <span class="caret"></span>
                                </a>
                                 <ul class="dropdown-menu">
                                    <li><a href="/listproduk">Daftar Produk</a></li>
                                    {{-- <li><a href="#">UK</a></li> --}}
                                </ul>
                            </div>
                            {{--  <li><a href="#"><i class="fa fa-user"></i>NAAM USER </a></li>  --}}

                            {{--  untuk menghilangkan tombol login dan register setelah user login   --}}
                            @guest
                                <li><a href="{{ route('register')}}"><i class="fa fa-crosshairs"></i>REGISTER</a></li>
                                <li><a href="{{ route('login')}}"><i class="fa fa-lock"></i> LOGIN</a></li>
                                @else

                                 <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle fa fa-user" data-toggle="dropdown">
                                        {{ auth()->user()->name }}
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                LOG OUT
                                            </a>
                                        </li>

                                    </ul>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            @endguest

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

</header><!--/header-->

    {{--  <ul id="dropdown1" class="dropdown-content">
                                        <li> <a href="">LOG OUT</a></li>
                                </ul>
                                <li><a href="#"><i class="fa fa-user"></i>{{ auth()->user()->name }}</a></li>  --}}
