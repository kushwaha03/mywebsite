@extends('auth.layouts.auth')

@section('body_class','register')

@section('content')
    <div>    <center>  <div class="site-logo">
    <a href="#"><img src="http://myweb.joburg/wp-content/uploads/2015/12/My-Website.gif" alt="logo" height="50" width="320" style="margin-top: 10px;"></a>
    </div>
        <div class="login_wrapper">
            <div class="animate form">
                <section class="login_content">
                    {{ Form::open(['route' => 'register']) }}
                        <h1>{{ __('views.auth.register.header') }}</h1>
                        <div>
                            <input type="text" name="name" class="form-control"
                                   placeholder="{{ __('views.auth.register.input_0') }}"
                                   value="{{ old('name') }}" required autofocus/>
                        </div>
                        <div>
                            <input type="email" name="email" class="form-control"
                                   placeholder="{{ __('views.auth.register.input_1') }}"
                                   required/>
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control"
                                   placeholder="{{ __('views.auth.register.input_2') }}"
                                   required=""/>
                        </div>
                        <div>
                            <input type="password" name="password_confirmation" class="form-control"
                                   placeholder="{{ __('views.auth.register.input_3') }}"
                                   required/>
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (!$errors->isEmpty())
                            <div class="alert alert-danger" role="alert">
                                {!! $errors->first() !!}
                            </div>
                        @endif

                        @if(config('auth.captcha.registration'))
                            @captcha()
                        @endif

                        <div>
                            <button type="submit"
                                    class="btn btn-default submit">{{ __('views.auth.register.action_1') }}</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">{{ __('views.auth.register.message') }}
                                <a href="{{ route('login') }}" class="to_register"> {{ __('views.auth.register.action_2') }} </a>
                            </p>

                            <div class="clearfix"></div>
                            <br/>

                            <div>
                                <div class="h1">{{ config('app.name') }}</div>
                                <p>&copy; {{ date('Y') }} {{ config('app.name') }}. {{ __('views.auth.register.copyright_0') }}</p>
                                <p>{{ __('views.auth.register.copyright_1') }}</p>
                            </div>
                        </div>
                    {{ Form::close() }}
                </section>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    @parent

    {{ Html::style(mix('assets/auth/css/register.css')) }}
@endsection
