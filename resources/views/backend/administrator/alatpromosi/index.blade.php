@php
    use App\Usulan;
    use App\TotalSkor;
    use App\NilaiFormulir3;
@endphp
@extends('layouts.layout')
@section('title', 'Dashboard')
@section('login_as', 'Administrator')
@section('user-login')
   
@endsection
@section('user-login2')
    
@endsection
@section('sidebar-menu')
    @include('backend/administrator/sidebar')
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
            <i class="fa fa-tasks"></i>&nbsp;Manajemen Alat Promosi E-Marketing
        </header>
        <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
            <form action="{{ route('administrator.alat_promosi.post') }}" method="POST">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info alert-block">
                            <i class="fa fa-info-circle"></i>&nbsp; Silahkan tambahkan Alat Promosi baru jika diperlukan.
                        </div>
                    </div>
                   

                    <div class="form-group col-md-12">
                        <label>Nama Alat Promosi</label>
                        <input type="text" name="nm_alat_promosi" id="nm_alat_promosi" class="form-control @error('nm_alat_promosi') is-invalid @enderror">
                        @error('nm_alat_promosi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                   
                  
                    <div class="col-md-12 text-center mt-2">
                        <button type="reset" name="reset" class="btn btn-warning btn-sm"><i class="fa fa-refresh"></i>&nbsp; Ulangi</button>
                        <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i>&nbsp; Simpan</button>
                    </div>
                </div>
            </form>
           <div class="row">
               <div class="col-md-12">
                   <table class="table table-hover table-bordered" id="table">
                       <thead>
                           <tr>
                               <th>No</th>
                               <th>Nama Alat Promosi</th>
                               
                               <th>Status</th>
                               <th>Ubah Status</th>
                              
                           </tr>
                       </thead>
                       <tbody>
                           @php
                               $no=1;
                           @endphp
                           @foreach ($alatpromosis as $alatpromosi)
                               <tr>
                                   <td>{{ $no++ }}</td>
                                   <td>{{ $alatpromosi->nm_alat_promosi }}</td>
                                   <td>
                                    @if ($alatpromosi->status_alat_promosi == "1")
                                        <label class="badge badge-primary">Aktif</label>
                                        @else
                                        <label class="badge badge-danger">Tidak Aktif</label>
                                    @endif
                                </td>
                               
                                <td>
                                    @if ($alatpromosi->status_alat_promosi == "1")
                                        <form action="{{ route('administrator.alat_promosi.non_aktifkan_status', [$alatpromosi->id]) }}" method="POST">
                                            {{ csrf_field() }} {{ method_field('PATCH') }}
                                            <button type="submit" class="btn btn-danger btn-sm" style="color:white; cursor:pointer;"><i class="fa fa-thumbs-down"></i></button>
                                        </form>
                                        @else
                                        <form action="{{ route('administrator.alat_promosi.aktifkan_status', [$alatpromosi->id]) }}" method="POST">
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