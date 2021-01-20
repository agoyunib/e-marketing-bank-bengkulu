<li>
    <a href="{{ route('ao.dashboard') }}"><i class="fa fa-home"></i>Dashboard</a>
</li>

<li
    @if (Route::current()->getName() == "ao.target.add")
        class="current-page"
    @endif
>
    <a href="{{ route('ao.target') }}"><i class="fa fa-bullseye"></i>Target Saya</a>
</li>

<li style="padding-left:2px;">
    <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        <i class="fa fa-power-off text-danger"></i>{{__('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

</li>