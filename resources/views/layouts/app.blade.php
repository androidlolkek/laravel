<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!— CSRF Token —>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!— Styles —>
    @section('styles')
        <link href="/css/app.css" rel="stylesheet"/>
        <link href="/css/main.css" rel="stylesheet"/>
    @show


    <!— Scripts —>
    <script>
        window.Laravel = {!! json_encode([
'csrfToken' => csrf_token(),
]) !!};
    </script>
    <script src="/js/jquery-1.js"></script>
    <script src="/js/jquery_cookies.js"></script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <div id="basket">
                    <table>
                        <tbody>
                        <tr style="display: none;" class="hPb">
                            <td>Выбрано:</td>
                            <td><span id="totalGoods">0</span> товаров</td>
                        </tr>
                        <tr style="display: none;" class="hPb">
                            <td>Сумма: &asymp; </td>
                            <td><span id="totalPrice">0</span> руб.</td>
                        </tr>
                        <tr style="display: none;" class="hPb">
                            <td>Куки:</td>
                            <td><span id="gugu">0</span> </td>
                        </tr>
                        <tr style="display: table-row;" class="hPe">
                            <td colspan="2">Корзина пуста</td>
                        </tr>
                        <tr>
                            <td><a style="display: none;" id="clearBasket" href="#">Очистить</a></td>
                            <td><a style="display: none;" id="checkOut" href="{{asset('order')}}">Оформить</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <!— Collapsed Hamburger —>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!— Branding Image —>
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Products') }}
                </a>

            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">


                <ul class="nav navbar-nav navbar-right">
                    <!— Authentication Links —>
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="col-md-2">
        <div class="panel panel-default">
            <div class="panel-heading">Menu</div>

            <div class="panel-body">
                @foreach($cats as $one)
                    <a href="{{asset('/catalog/'.$one->id)}}" class="btn btn-default btn-block">{{$one->name}}</a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-10">

        @yield('content')
    </div>
</div>

<!— Scripts —>
{{--<script src="/js/app.js"></script>--}}
<script src="/js/cart.js"></script>
</body>
</html>