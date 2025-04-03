@php
    $contact = getContent('contact_us.content', true);
@endphp

<header class="header-bottom">
    {{-- <div> --}}
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="header-area">
                    <div class="logo">
                        <a href="{{ route('home') }}"><img
                                src="{{ getImage(getFilePath('logoIcon') . '/logo.png') }}" alt="logo"></a>
                    </div>
                    <ul class="menu">
                        <li><a href="{{ url('/') }}">@lang('Home')</a></li>

                        @foreach ($pages as $k => $data)
                            <li><a href="{{ route('pages', [$data->slug]) }}">{{ trans($data->name) }}</a></li>
                        @endforeach
                        <li><a href="{{ route('plan') }}">@lang('Plan')</a></li>
                        <li><a href="{{ route('blog') }}">@lang('Blog')</a></li>
                        <li><a href="{{ route('contact') }}">@lang('Contact')</a></li>

                        @auth
                            <li><a href="javascript:void(0)">@lang('Account')</a>
                                <ul class="submenu">
                                    <li><a href="{{ route('user.home') }}">@lang('Dashboard')</a></li>
                                    <li><a href="{{ route('user.logout') }}">@lang('Logout')</a></li>
                                </ul>
                            </li>
                        @else
                            <li>
                                <a href="javascript:void(0)">@lang('Account')</a>
                                <ul class="submenu">
                                    <li><a href="{{ route('user.login') }}">@lang('Log In')</a>
                                    </li>
                                    <li><a href="{{ route('user.register') }}">@lang('Register')</a></li>
                                </ul>
                            </li>
                        @endauth

                        @if ($general->language == Status::ENABLE)
                            <div class="p-md-0 d-sm-none p-3">
                                <select class="langSel w-100 ml-auto">
                                    @foreach ($language as $item)
                                        <option value="{{ $item->code }}" @if (session('lang') == $item->code) selected @endif>
                                            {{ __($item->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </ul>

                    <div class="header-bar d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}
</header>
