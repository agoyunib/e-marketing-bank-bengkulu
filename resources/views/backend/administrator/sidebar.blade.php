
<li>
    <a href="{{ route('administrator.dashboard') }}"><i class="fa fa-home"></i>Dashboard</a>
</li>

<li>
    <a href="{{ route('administrator.unit') }}"><i class="fa fa-tasks"></i>Manajemen Unit</a>
</li>
<li>
    <a href="{{ route('administrator.produk') }}"><i class="fa fa-tasks"></i>Manajemen Produk</a>
</li>
<li>
    <a href="{{ route('administrator.subproduk') }}"><i class="fa fa-tasks"></i>Manajemen Sub Produk</a>
</li>
<li>
    <a href="{{ route('administrator.jenisproduk') }}"><i class="fa fa-tasks"></i>Manajemen Jenis Produk</a>
</li>
<li>
    <a href="{{ route('administrator.user_ao') }}"><i class="fa fa-tasks"></i>Manajemen AO</a>
</li>
<li>
    <a href="{{ route('administrator.user_supervisi') }}"><i class="fa fa-tasks"></i>Manajemen Super Visi</a>
</li>
<li>
    <a href="{{ route('administrator.user_pimpinan') }}"><i class="fa fa-tasks"></i>Manajemen Pimpinan</a>
</li>
<li>
    <a href="{{ route('administrator.user_administrator') }}"><i class="fa fa-tasks"></i>Manajemen Administrator</a>
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