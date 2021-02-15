@php
    use App\Usulan;
    use App\TotalSkor;
    use App\NilaiFormulir3;
@endphp
@extends('layouts.layout')
@section('title', 'Dashboard')
@section('login_as', 'Administrator')
@section('user-login')
    {{ Auth::user()->nm_user }}
@endsection
@section('user-login2')
    {{ Auth::user()->nm_user }}
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
            <i class="fa fa-tasks"></i>&nbsp;Manajemen Unit E-Marketing
        </header>
        <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
            <form action="{{ route('administrator.unit.post') }}" method="POST">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info alert-block">
                            <i class="fa fa-info-circle"></i>&nbsp; Silahkan tambahkan unit baru jika diperlukan.
                        </div>
                    </div>
                    <div class="form-status_unit col-md-4">
                        <label>Nama Unit</label>
                        <input type="text" name="nm_unit" id="nm_unit" class="form-control @error('nm_unit') is-invalid @enderror">
                        @error('nm_unit')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                   
                    <div class="form-status_unit col-md-4">
                        <label>Kategori</label>
                        <select name="kategori" id="" class="form-control @error('kategori') is-invalid @enderror">
                            <option disabled selected>-- pilih kategori --</option>
                            <option value="cabang">Cabang</option>
                            <option value="capem">Cabang Pembantu</option>
                        </select>
                        @error('kategori')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-status_unit col-md-4">
                        <label>Kota</label>
                        <select name="kota" id="" class="form-control @error('kota') is-invalid @enderror">
                            <option disabled selected>-- pilih kota --</option>
                            <option value="selatan">Bengkulu Selatan</option>
                            <option value="benteng">Bengkulu Tengah</option>
                            <option value="utara">Bengkulu Utara</option>
                            <option value="kaur">Kaur</option>
                            <option value="kepahiang">Kepahiang</option>
                            <option value="lebong">Lebong</option>
                            <option value="mukomuko">Mukomuko</option>
                            <option value="rejanglebong">Rejang Lebong</option>
                            <option value="seluma">Seluma</option>
                            <option value="bengkulu">Kota Bengkulu</option>
                        </select>
                        @error('kota')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-status_unit col-md-12">
                        <label>Alamat Detail</label>
                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="" cols="30" rows="3"></textarea>
                        @error('alamat')
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
                           @foreach ($units as $unit)
                               <tr>
                                   <td>{{ $no++ }}</td>
                                   <td>{{ $unit->nm_unit }}</td>
                                   <td>{{ $unit->alamat }}</td>
                                   <td>{{ $unit->kota }}</td>
                                   <td>{{ $unit->kategori }}</td>
                                   <td>
                                       @if ($unit->status_unit == "1")
                                           <label class="badge badge-primary">Aktif</label>
                                           @else
                                           <label class="badge badge-danger">Tidak Aktif</label>
                                       @endif
                                   </td>
                                   <td>
                                    @if ($unit->status_unit == "1")
                                        <form action="{{ route('administrator.unit.non_aktifkan_status', [$unit->id]) }}" method="POST">
                                            {{ csrf_field() }} {{ method_field('PATCH') }}
                                            <button type="submit" class="btn btn-danger btn-sm" style="color:white; cursor:pointer;"><i class="fa fa-thumbs-down"></i></button>
                                        </form>
                                        @else
                                        <form action="{{ route('administrator.unit.aktifkan_status', [$unit->id]) }}" method="POST">
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