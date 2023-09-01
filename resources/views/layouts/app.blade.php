<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>House Market Kazakhstan</title>


    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style3.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/templatemo-breezed.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl-carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/lightbox.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/logo.png')}}"  type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/botstyle.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>


<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>



<!-- SHAPKA -->

<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{route('documents.index')}}" class="logo">
                        <img src="{{asset('assets/images/logo.png')}}" style="width: 40px; height: 40px; margin-bottom: 17px" alt="House Market Logo" />
                        House Market
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="#top" class="active">{{__('bet.homepage')}}</a></li>
                        <li class="scroll-to-section"><a href="#about">{{__('bet.about')}}</a></li>
{{--                        <li class="scroll-to-section"><a href="#projects">{{__('bet.projects')}}</a></li>--}}
                        <li class="scroll-to-section"><a href="#contact-us">{{__('bet.contact')}}</a></li>
                        @guest

                        <li class="submenu">
                            <a href="javascript:;">{{__('bet.register')}}</a>
                            <ul>
                                @if(Route::has('login.form'))
                                <li><a href="{{ route('login.form') }}">{{__('bet.login')}}</a></li>
                                @endif
                                @if(Route::has('register.form'))
                                <li><a href="{{ route('register.form') }}">{{__('bet.registerr')}}</a></li>
                                    @endif

                            </ul>
                        </li>
                        @else
                            <li class="submenu">
                                <a href="javascript:;">{{Auth::user()->name}}</a>
                                <ul>
                                    @if(Auth::user()->role_id == 3)
                                    <li>
                                        <a href="{{url('/adm/users')}}">{{__('bet.admpnl')}}</a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="{{route('documents.profile')}}">ЖЕКЕ КАБИНЕТ</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('bet.logout') }}
                                            <svg xmlns="http://www.w3.org/2000/svg" style="padding-bottom: 2px" width="20" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                            </svg>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>

                                </ul>
                            </li>
                        @endguest
                        <li class="submenu">
                            <a href="javascript:;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
                                    <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
                                </svg>
                                {{ app()->getLocale() }}
                            </a>
                            <ul>
                                <li>
                                    @foreach(config('app.languages') as $ln => $lang)
                                        <a class="dropdown-item" href="{{route('switch.lang', $ln)}}">
                                            {{$lang}}
                                        </a>
                                    @endforeach
                                </li>
                            </ul>
                        </li>
                        <div class="search-icon">
                            <a href="#search"><i class="fa fa-search"></i></a>
                        </div>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>

<!-- SHAPKA -->

<!-- pOISK -->
<div id="search">
    <button type="button" class="close">×</button>
    <form id="contact" action="#" method="get">
        <fieldset>
            <input type="search" name="q" placeholder="{{__('bet.searchkey')}}" aria-label="Search through site content">
        </fieldset>
        <fieldset>
            <button type="submit" class="main-button">{{__('bet.search')}}</button>
        </fieldset>
    </form>
</div>
<!-- pOISK -->


<div class="main-banner header-text" id="top">

    <div class="Modern-Slider">

        <!-- Item -->
        <div class="item">
            <div class="img-fill">
                <img src="{{asset('assets/images/11.png')}}" alt="">
                <div class="text-content">
                    <h3>House Market</h3>
                    <h5>{{__('bet.headtext')}}</h5>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="img-fill">
                <img src="{{asset('assets/images/1.png')}}" alt="">
                <div class="text-content">
                    <h5>{{__('bet.headtext2')}}</h5>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="img-fill">
                <img src="{{asset('assets/images/2.jpg')}}" alt="">
                <div class="text-content">
                    <h5>{{__('bet.headtext3')}}</h5>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="scroll-down scroll-to-section"><a href="#about"><i class="fa fa-arrow-down"></i></a></div>


@if(session('message'))
    <div class="alert hide" style="float: right;background-color: #c5f3d7; margin-top: 5px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
        </svg>
        <span class="msg">
            {{session('message')}}
            @auth()
                @if(Auth::user()->gender === 'male')
                {{Auth::user()->name}}
                {{__('error.myrza')}}
                @else
                    {{Auth::user()->name}}
                    {{__('error.hanym')}}
                @endif
            @endauth
        </span>
    </div>
@endif


<section>
    @yield('content')
</section>



{{--<div id="chat-window" class="chat-window" style="border-radius: 5%">--}}
{{--    <div class="chat-header" style="background-color: black">--}}
{{--        <h5 style="color: whitesmoke">Напишите ваше сообщение--}}
{{--            <p style="color: #2ecc71" class="span">Операторы онлайн!</p>--}}
{{--        </h5>--}}

{{--        <button style="border-radius: 50%" class="btn btn-danger" id="close-chat">--}}
{{--            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">--}}
{{--                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>--}}
{{--            </svg>--}}
{{--        </button>--}}
{{--    </div>--}}
{{--    <div class="chat-content" style="padding-top: 20px; padding-bottom: 430px">--}}
{{--        <div class="messages" id="messages-container">--}}
{{--            <!-- Сюда будут добавляться сообщения -->--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div style="padding-bottom: 32px;padding-top: 5px; border-radius: 10%" class="input d-flex">--}}
{{--        <div>--}}
{{--            <input class="form-control" type="text" id="userMessage" placeholder="Введите ваше сообщение">--}}
{{--        </div>--}}
{{--        <button class="btn-success" onclick="sendMessage()">Отправить</button>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div id="open-chat-button" class="open-chat-button">--}}
{{--    <button class="button-64" id="open-chat">Напишите нам мы онлайн!</button>--}}
{{--</div>--}}


<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-xs-12">

                <div class="left-text-content">
                    <p>Республика Казахстан, 050061, г. Алматы, улица Кокорай 2/1, 3 этаж 302 каб.
                    </p>
                </div>
                <div class="left-text-content">
                    <p>Copyright &copy; 2023 House Market Kazakhstan.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 col-xs-12">
                <div class="right-text-content">
                    <ul class="social-icons">
                        <li><p>{{__('bet.follow')}}</p></li>
                        <li><a rel="nofollow" href="https://www.instagram.com/house_market.kz/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <li><a rel="nofollow" href="https://api.whatsapp.com/send/?phone=77788482804&text=Здравствуйте%2C+я+c+сайта+House Market" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

{{--<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">--}}

<script>
    var botmanWidget = {
        title:'{{__('bet.chatt')}}',
        introMessage: '{{__('bet.chattext')}}',
        mainColor:'#14559f',
        aboutText:'',
        bubbleBackground:'#209bc0',
        headerTextColor: '#fff',
        placeholderText: '{{__('bet.calll')}} ',
    };

</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>


<!-- jQuery -->
<script src="{{asset('assets/js/jquery-2.1.0.min.js')}}"></script>

<!-- Bootstrap -->
<script src="{{asset('assets/js/popper.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<!-- Plugins -->
<script src="{{asset('assets/js/owl-carousel.js')}}"></script>
<script src="{{asset('assets/js/scrollreveal.min.js')}}"></script>
<script src="{{asset('assets/js/waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/js/imgfix.min.js')}}"></script>
<script src="{{asset('assets/js/slick.js')}}"></script>
<script src="{{asset('assets/js/lightbox.js')}}"></script>
<script src="{{asset('assets/js/isotope.js')}}"></script>

<!-- Global Init -->
<script src="{{asset('assets/js/custom.js')}}"></script>

<script>

    $(function() {
        var selectedClass = "";
        $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
            $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
                $("."+selectedClass).fadeIn();
                $("#portfolio").fadeTo(50, 1);
            }, 500);

        });
    });
    // document.addEventListener("DOMContentLoaded", function() {
    //     var chatWindow = document.getElementById("chat-window");
    //     var openChatButton = document.getElementById("open-chat-button");
    //     var closeChatButton = document.getElementById("close-chat");
    //     var userMessageInput = document.getElementById("userMessage");
    //     var messagesContainer = document.getElementById("messages-container");
    //     var welcomeMessage = "Здравствуйте! Чем я могу вам помочь?";
    //
    //     // Функция для добавления сообщения в чат
    //     function addMessageToChat(message, isBot = false) {
    //         var messageElement = document.createElement("div");
    //         messageElement.className = isBot ? "message bot-message" : "message user-message";
    //         messageElement.textContent = message;
    //         messagesContainer.appendChild(messageElement);
    //     }
    //
    //     // Функция для отправки сообщения
    //     function sendMessage(message) {
    //         addMessageToChat(message, false); // Добавляем сообщение пользователя в чат
    //
    //         // Создание нового объекта XMLHttpRequest
    //         var xhr = new XMLHttpRequest();
    //         xhr.open("POST", "/send-message", true);
    //         xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    //
    //         xhr.onreadystatechange = function() {
    //             if (xhr.readyState === XMLHttpRequest.DONE) {
    //                 if (xhr.status === 200) {
    //                     var botResponse = JSON.parse(xhr.responseText).message;
    //                     addMessageToChat(botResponse, true); // Добавляем ответ бота в чат
    //                 } else {
    //                     addMessageToChat("Ошибка при отправке сообщения.", true); // Добавляем сообщение об ошибке
    //                 }
    //             }
    //         };
    //
    //         var data = JSON.stringify({ userMessage: message });
    //         xhr.send(data);
    //     }
    //
    //     openChatButton.addEventListener("click", function() {
    //         chatWindow.style.display = "block";
    //         sendMessage(welcomeMessage); // Отправляем приветственное сообщение от бота
    //     });
    //
    //     closeChatButton.addEventListener("click", function() {
    //         chatWindow.style.display = "none";
    //     });
    //
    //     userMessageInput.addEventListener("keyup", function(event) {
    //         if (event.key === "Enter") {
    //             var message = userMessageInput.value;
    //             sendMessage(message);
    //             userMessageInput.value = ""; // Очистить поле ввода
    //         }
    //     });
    // });


</script>

</body>
</html>
