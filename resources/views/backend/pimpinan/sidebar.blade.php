
<li>
    <a href=""><i class="fa fa-home"></i>Dashboard</a>
</li>

{{-- <li><a><i class="fa fa-building-o"></i>Divisi Universitas <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
        <li><a href="">Fakultas</a></li>
        <li><a href="">Program Study</a></li>
    </ul>
</li> --}}

{{-- <li>
    <a href=""><i class="fa fa-info-circle"></i>Skim Penelitian</a>
</li> --}}

<li><a><i class="fa fa-reply"></i>Usulan Kegiatan <span class="fa fa-chevron-down" ></span></a>
    <ul class="nav child_menu"
        @if (Route::current()->getName() == "")
            style="display:block !important;"
            @elseif(Route::current()->getName() == "")
            style="display:block !important;"
            @elseif(Route::current()->getName() == "")
            style="display:block !important;"
        @endif
    >
        <li><a href="">Usulan Pending</a></li>
        <li
            @if (Route::current()->getName() == "")
                class="current-page"
            @endif
        ><a href="">Tambah Reviewer</a></li>
        <li
            @if (Route::current()->getName() == "")
                class="current-page"
            @endif
        ><a href="">Dalam Proses Review</a></li>
        <li
            @if (Route::current()->getName() == "")
                class="current-page"
            @endif
        ><a href="">Menunggu Verifikasi</a></li>
    </ul>
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