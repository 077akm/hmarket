@extends('layouts.app')

@section('title', 'INDEX PAGE')

@section('content')



    <!-- Quzhattardy tanusurumen Zhiberu -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>{{__('bet.about')}}</h6>
                            <h2>{{__('bet.wework')}}</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="service-item">
                                    <img src="{{asset('assets/images/service-item-01.png')}}" alt="">
                                    <h4>{{__('bet.senimdi')}}</h4>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="service-item">
                                    <img src="{{asset('assets/images/service-item-01.png')}}" alt="">
                                    <h4>{{__('bet.sapaly')}}</h4>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="service-item">
                                    <img src="{{asset('assets/images/contact-info-03.png')}}" alt="">
                                    <h4>{{__('bet.zhyldam')}}</h4>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="service-item">
                                    <img src="{{asset('assets/images/contact-info-03.png')}}" alt="">
                                    <h4>{{__('bet.zholdama')}}</h4>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <a href="{{route('documents.create')}}" class="main-button-icon">
                                    {{__('bet.sendquzhat')}} <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="right-text-content">
                        <h5 class="display-5">{{__('bet.text1')}}

                            <br><br>{{__('bet.text3')}}
                            <br><br>{{__('bet.text4')}} <br>

                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Quzhattardy tanusurumen Zhiberu -->

    <!-- Klientter Otzuv -->
    <section class="section" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            <img style="width: 50px" src="{{asset('assets/images/12.png')}}" alt="">
                        </div>
                        <div class="features-content">
                            <h4>Индира Қожахметова</h4>
                            <p>
                                Керемет мамандар! Өте тез жұмыс істейді! Сатып алуға көмектесті, Мен өз күшіммен шығамын деп ойладым, нәтижесінде сатып алудың ең жақсы нұсқасы болған осы компанияның қызметкерінен келді. Осылайша мен керемет түрде сатып алушы болдым!
                            </p>
{{--                            <a href="#" class="text-button-icon">--}}
{{--                                Learn More <i class="fa fa-arrow-right"></i>--}}
{{--                            </a>--}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter bottom move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            <img style="width: 50px" src="{{asset('assets/images/12.png')}}" alt="">
                        </div>
                        <div class="features-content">
                            <h4>Бауыржан Сапарбай</h4>
                            <p>
                                Мен housemarket компаниясына пәтер іздеудің кәсібилігі мен жеделдігі үшін, атап айтқанда мұратқа, маған қолайлы бағамен тұрғын үй сатып алуға көмектескені үшін және бүкіл құжаттық бөлімді шешуде көрсеткен көмегі үшін алғыс айтқым келеді. Осы компанияға хабарласқаныма өте қуаныштымын. Сіздің компанияңызға өркендеуі мен ризашылық білдіретін, қанағаттанған клиенттеріңіз!
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            <img style="width: 50px" src="{{asset('assets/images/12.png')}}" alt="">
                        </div>
                        <div class="features-content">
                            <h4>Жазира Қайдарқұлқызы</h4>
                            <p>
                                Мен бұл компанияға және Нұрберген маманына үлкен алғысымды білдіргім келеді, пәтерді қысқа мерзімде, артық әуре-сараңсыз және қиындықсыз алуға көмектесті. Жылдам, сапалы және қолайлы бағамен рахмет үлкен!
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Klientter Otzuv -->

    <!-- Housemarket Obrashenie -->
    <section class="section" id="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading">
                        <h2>House Market</h2>
                    </div>
                    <div class="subscribe-content text-center"> <!-- Добавил класс text-center для центрирования -->
                        <p>
                            {{__('bet.head')}}
                        </p>
                        <a href="{{ route('documents.calc') }}" class="btn main-button-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-calculator" viewBox="0 0 16 16">
                                <path d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
                                <path d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-2zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-4z"/>
                            </svg>
                            {{__('bet.button_text')}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Housemarket Obrashenie -->




    <!-- Svaz s Companiei -->
    <section class="section" id="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>{{__('bet.contact')}}</h6>
                            <h2>{{__('bet.feelus')}}</h2>
                        </div>
                        <ul class="contact-info">
                            <li><img src="{{'assets/images/contact-info-01.png'}}" alt="">+7-(778)-848-28-04</li>
                            <li><img src="{{'assets/images/contact-info-02.png'}}" alt="">housemarket16@gmail.com</li>
                            <li><img src="{{'assets/images/contact-info-03.png'}}" alt="">www.housemarket.kz</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-xs-12">
                        <div class="contact-form">
                            <form action="{{route('documents.zaiavka')}}" method="post">
                                @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <fieldset>
                                        <input name="name" type="text" id="name" placeholder="{{ __('bet.producname') }}" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <fieldset>
                                        <input name="phone" type="text" id="phone" placeholder="{{ __('bet.number') }}" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <fieldset>
                                        <input name="email" type="email" id="email" placeholder="{{ __('bet.email') }} *" required="">
                                    </fieldset>
                                </div>
{{--                                <div class="col-md-6 col-sm-12">--}}
{{--                                    <fieldset>--}}
{{--                                        <input name="subject" type="text" id="subject" placeholder="Subject">--}}
{{--                                    </fieldset>--}}
{{--                                </div>--}}
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="text" rows="6" id="text" placeholder="{{ __('bet.content') }}" required=""></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-button-icon">{{ __('bet.sendmessage') }} <i class="fa fa-arrow-right"></i></button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Svaz s Companiei -->


@endsection

