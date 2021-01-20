@php
    use App\Usulan;
    use App\TotalSkor;
    use App\NilaiFormulir3;
@endphp
@extends('layouts.layout')
@section('title', 'Dashboard')
@section('login_as', 'Account Officer')
@section('user-login')
   
@endsection
@section('user-login2')
    
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
                   <table class="table table-hover table-bordered" id="table">
                       <thead>
                           <tr>
                               <th>No</th>
                               <th>Nama Unit</th>
                               <th>Alamat</th>
                               <th>Kota</th>
                               <th>Kategori Unit</th>
                               <th>Status Aktif</th>
                               <th>Ubah Status</th>
                           </tr>
                       </thead>
                       <tbody>
                           @php
                               $no=1;
                           @endphp
                           @foreach ($targets as $target)
                               <tr>
                                   <td>{{ $no++ }}</td>
                                   <td>{{ $target->nm_unit }}</td>
                                   <td>{{ $target->alamat }}</td>
                                   <td>{{ $target->kota }}</td>
                                   <td>{{ $target->kategori }}</td>
                                   <td>
                                       @if ($target->status_unit == "1")
                                           <label class="badge badge-primary">Aktif</label>
                                           @else
                                           <label class="badge badge-danger">Tidak Aktif</label>
                                       @endif
                                   </td>
                                   <td>
                                    @if ($target->status_unit == "1")
                                        <form action="{{ route('administrator.target.non_aktifkan_status', [$target->id]) }}" method="POST">
                                            {{ csrf_field() }} {{ method_field('PATCH') }}
                                            <button type="submit" class="btn btn-danger btn-sm" style="color:white; cursor:pointer;"><i class="fa fa-thumbs-down"></i></button>
                                        </form>
                                        @else
                                        <form action="{{ route('administrator.target.aktifkan_status', [$target->id]) }}" method="POST">
                                            {{ csrf_field() }} {{ method_field('PATCH') }}
                                            <button type="submit" class="btn btn-primary btn-sm" style="color:white; cursor:pointer;"><i class="fa fa-thumbs-up"></i></button>
                                        </form>
                                    @endif
                                   </td>
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