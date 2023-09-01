@extends('layouts.app')

@section('content')
<div class="container">




    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="{{asset('assets/images/123.png')}}"
                                 alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form method="post" action="{{ route('register') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <img src="{{asset('assets/images/logo.png')}}" style="width: 56px; height: 56px; margin-right: 7px">
                                        <span class="h1 fw-bold mb-0">House Market</span>
                                    </div>

                                    <h2 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">{{__('bet.register')}}</h2>

                                    <div class="form-outline mb-2">
                                        <label class="form-label mt-2" for="email">{{ __('bet.name') }}</label>
                                        <input type="text" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus class="form-control form-control-lg @error('name    ') is-invalid @enderror" />
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror

                                    </div>

                                    <div class="form-outline mb-2">
                                        <label class="form-label mt-2" for="email">{{ __('bet.email') }}</label>
                                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="form-control form-control-lg @error('email') is-invalid @enderror" />
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror

                                    </div>

                                    <div class="form-outline mb-2">
                                        <label class="form-label mt-2" for="password">{{ __('bet.password') }}</label>
                                        <input type="password" id="password" name="password" required autocomplete="current-password" class="form-control form-control-lg @error('password') is-invalid @enderror" />
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror

                                    </div>

                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="password-confirm">{{ __('bet.confirmpass') }}</label>
                                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password" />


                                    </div>

                                    <div class="form-outline mb-2">
                                        <label class="form-label mt-2">{{ __('bet.gender') }}</label>
                                        <div class="form-check">
                                            <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="male" value="male" checked>
                                            <label class="form-check-label" for="male">
                                                {{ __('bet.male') }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="female" value="female">
                                            <label class="form-check-label" for="female">
                                                {{ __('bet.female') }}
                                            </label>
                                        </div>
                                        @error('gender')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>


                                    <div class="form-outline mb-3">
                                        <label class="form-label mt-2" for="avatarInput">{{ __('bet.image') }}</label>
                                        <input type="file" id="avatarInput" name="avatar" class="form-control-file " />
                                        @error('avatar')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>




                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" type="submit">{{ __('bet.register') }}</button>

                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
