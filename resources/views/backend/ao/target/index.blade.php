@php
    use App\Usulan;
    use App\TotalSkor;
    use App\NilaiFormulir3;
@endphp
@extends('layouts.layout')
@section('title', 'Dashboard')
@section('login_as', 'Account Officer')
@section('user-login')
    {{ Auth::user()->nm_user }}
@endsection
@section('user-login2')
    {{ Auth::user()->nm_user }}
@endsection
@section('sidebar-menu')
    @include('backend/ao/sidebar')
@endsection
@push('styles')
    <style>
        #detail:hover{
            text-decoration: underline !important;
            cursor: pointer !important;
            color:teal;
        }
        #selengkapnya{
            color:#5A738E;
            text-decoration:none;
            cursor:pointer;
        }
        #selengkapnya:hover{
            color:#007bff;
        }
    </style>
@endpush
@section('content')
    <section class="panel" style="margin-bottom:20px;">
        <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
            <i class="fa fa-bullseye"></i>&nbsp;Manajemen Target E-Marketing
        </header>
        <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
           <div class="row">
               <div class="col-md-12">
                   <a href="{{ route('ao.target.add') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Tambah Target</a>
               </div>
               <div class="col-md-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <strong>Perhatian </strong>{{ $message }}
                    </div>
                    @elseif ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <strong>Perhatian </strong>{{ $message }}
                        </div>
                    @else
                    <div class="alert alert-info alert-block">
                        <i class="fa fa-info-circle"></i>&nbsp; <strong>Perhatian </strong>Berikut target yang sudah ditambahkan, target hanya dapat di edit tanpa dapat dihapus
                    </div>
                @endif
               </div>
               <div class="col-md-12">
                   <table class="table table-hover table-bordered" id="table">
                       <thead>
                           <tr>
                               <th>No</th>
                               <th>Jenis Produk</th>
                               <th>Target</th>
                               <th>No Registrasi</th>
                               <th>Kategori Target</th>
                               <th>Status Realisasi</th>
                               <th>Status Final</th>
                           </tr>
                       </thead>
                       <tbody>
                           @php
                               $no=1;
                           @endphp
                           @foreach ($targets as $target)
                               <tr>
                                   <td>{{ $no++ }}</td>
                                   <td>{{ $target->nm_jenis_produk }}</td>
                                   <td>{{ $target->nm_targer }}</td>
                                   <td>{{ $target->no_registrasi }}</td>
                                   <td>{{ $target->kategori }}</td>
                                   <td>{{ $target->status_realisasi }}</td>
                                   <td></td>
                               </tr>
                           @endforeach
                       </tbody>
                   </table>
               </div>
           </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $("table[id^='table']").DataTable({
                responsive : true,
                "ordering": true,
            });
        } );
    </script>
@endpush