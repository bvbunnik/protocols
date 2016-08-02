<header class="main-header">
    {!! link_to_route('frontend.index', "Compare Europe", [], ['class' => 'logo']) !!}

    <nav class="navbar navbar-static-top" role="navigation">
        <a class="navbar-brand" href="#">
            <img alt="Brand" src="/img/Logo_Compare.png" style="height: 45px">
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @if (config('locale.status') && count(config('locale.languages')) > 1)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ trans('menus.language-picker.language') }} <span class="caret"></span></a>
                        @include('includes.partials.lang')
                    </li>
                @endif

                @if (access()->guest())
                    <li>{{ link_to('login', trans('navs.frontend.login')) }}</li>
                @else
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ access()->user()->picture }}" class="user-image" alt="User Avatar"/>
                        <span class="hidden-xs">{{ access()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ access()->user()->picture }}" class="img-circle" alt="User Avatar" />
                            <p>
                                {{ access()->user()->name }} - {{ implode(", ", access()->user()->roles->lists('name')->toArray()) }}
                                <small>{{ trans('strings.backend.general.member_since') }} {{ access()->user()->created_at->format("m/d/Y") }}</small>
                            </p>
                        </li>
                        <li class="user-body">
                            <div class="col-xs-6 text-center">
                                {{ link_to_route('frontend.user.dashboard', trans('navs.frontend.dashboard')) }}
                            </div>

                            <div class="col-xs-6 text-center">
                                {{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration')) }}
                            </div>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                {{ link_to_route('frontend.index', trans('navs.general.home'), [], ['class' => 'btn btn-default btn-flat']) }}
                            </div>
                            <div class="pull-right">
                                {{ link_to_route('auth.logout', trans('navs.general.logout'), [], ['class' => 'btn btn-default btn-flat']) }}
                            </div>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div><!-- /.navbar-custom-menu -->
    </nav>
</header>