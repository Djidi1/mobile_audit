@section('menu')
    <li>
        <div class="user-view">
            <div class="background">
                <img src="/images/office.jpg">
            </div>
            @isset(Auth::user()->name)
                <a href="#!user"><img class="circle" src="/images/user.png"></a>
                <a href="#!name"><span class="white-text name">{{ Auth::user()->name }}</span></a>
                <a href="#!email"><span class="white-text email">{{ Auth::user()->email }}</span></a>
            @else
                <a href="#!user"><img class="circle" src="/images/user.png"></a>
                <a href="#!name"><span class="white-text name">Username</span></a>
                <a href="#!email"><span class="white-text email">usermail</span></a>
            @endisset
        </div>
    </li>
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li>
                <a class="collapsible-header">@lang('main.language')<i class="material-icons">arrow_drop_down</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="/en">@lang('main.lg_english')</a></li>
                        <li><a href="/ru">@lang('main.lg_russian')</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </li>
    <hr>
    @guest
        <!-- Authentication Links -->
        <li><a href="{{ route('login') }}">@lang('main.login')</a></li>
        <li><a href="{{ route('register') }}">@lang('main.register')</a></li>
    @else
        <li><a href="{{ route('cl_categories.index') }}">Categories</a></li>
        <li><a href="{{ route('checklists.index') }}">Checklists</a></li>
        @can('user_create')
            <hr>
            <li><a href="{{ route('admin.users.index') }}">@lang('quickadmin.qa_users')</a></li>
            <li><a href="{{ route('admin.roles.index') }}">@lang('quickadmin.qa_roles')</a></li>
        @endcan
        <hr>
        <li>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    @endguest
@stop