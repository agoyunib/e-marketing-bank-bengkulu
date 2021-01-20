
<li>
    <a href="{{ route('administrator.dashboard') }}"><i class="fa fa-home"></i>Dashboard</a>
</li>

<li>
    <a href="{{ route('administrator.unit') }}"><i class="fa fa-tasks"></i>Manajemen Unit</a>
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