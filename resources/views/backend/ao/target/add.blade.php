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
            <i class="fa fa-bullseye"></i>&nbsp;Manajemen Target E-Marketing (Tambah Target)
        </header>
        <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
           <div class="row">
               <div class="col-md-12">
                   <a href="{{ route('ao.target') }}" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
               </div>
               <hr style="width: 50%">
           </div>
           <form action="{{ route('ao.target.post') }}" method="POST">
                {{ csrf_field() }} {{ method_field('POST') }}
               <div class="row">
                   <div class="col-md-12">
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <strong>Perhatian </strong>{{ $message }}
                        </div>
                    @endif
                       @if ($errors->any())
                           <div class="alert alert-danger">
                               <strong>Perhatian : </strong>Harap Untuk Mengisi Semua Formulir
                           </div>
                       @endif
                   </div>

                    <div class="form-group col-md-4">
                        <label for="">Jenis Produk</label>
                        <select name="jenis_produk_id" class="form-control @error('jenis_produk_id') is-invalid @enderror" id="">
                            <option disabled selected>-- pilih jenis produk --</option>
                            @foreach ($jenis as $jenis)
                                <option value="{{ $jenis->id }}" {{ old('jenis_produk_id') == $jenis->id ? "selected" : "" }}>{{ $jenis->nm_jenis_produk }}</option>
                            @endforeach
                        </select>
                        @error('jenis_produk_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Nomor Registrasi</label>
                        <input type="text" name="no_registrasi" value="{{ old('no_registrasi') }}" class="form-control @error('no_registrasi') is-invalid @enderror">
                        @error('no_registrasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Nama Target</label>
                        <input type="text" name="nm_target" value="{{ old('nm_target') }}" class="form-control @error('nm_target') is-invalid @enderror">
                        @error('no_registrasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-12">
                        <label for="">Alamat Detail</label>
                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="" cols="30" rows="3">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-status_unit col-md-4">
                        <label>Kota</label>
                        <select name="kota" id="" class="form-control @error('kota') is-invalid @enderror">
                            <option disabled selected>-- pilih kota --</option>
                            <option value="selatan"  {{ old('kota') == "selatan" ? "selected" : "" }}>Bengkulu Selatan</option>
                            <option value="benteng"  {{ old('kota') == "benteng" ? "selected" : "" }}>Bengkulu Tengah</option>
                            <option value="utara"  {{ old('kota') == "utara" ? "selected" : "" }}>Bengkulu Utara</option>
                            <option value="kaur"  {{ old('kota') == "kaur" ? "selected" : "" }}>Kaur</option>
                            <option value="kepahiang"  {{ old('kota') == "kepahiang" ? "selected" : "" }}>Kepahiang</option>
                            <option value="lebong"  {{ old('kota') == "lebong" ? "selected" : "" }}>Lebong</option>
                            <option value="mukomuko"  {{ old('kota') == "mukomuko" ? "selected" : "" }}>Mukomuko</option>
                            <option value="rejanglebong"  {{ old('kota') == "rejanglebong" ? "selected" : "" }}>Rejang Lebong</option>
                            <option value="seluma"  {{ old('kota') == "seluma" ? "selected" : "" }}>Seluma</option>
                            <option value="bengkulu"  {{ old('kota') == "bengkulu" ? "selected" : "" }}>Kota Bengkulu</option>
                        </select>
                        @error('kota')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">No. Telephone</label>
                        <input type="number" name="no_hp" value="{{ old('no_hp') }}" class="form-control @error('no_hp') is-invalid @enderror">
                        @error('no_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Kategori Target</label>
                        <select name="kategori_target"  class="form-control @error('kategori_target') is-invalid @enderror" id="">
                            <option disabled selected>-- pilih kategori target --</option>
                            <option value="new" {{ old('kategori_target') == "new" ? "selected" : "" }}>New</option>
                            <option value="old" {{ old('kategori_target') == "old" ? "selected" : "" }}>Old</option>
                        </select>
                        @error('kategori_target')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Target Penambahan Dana</label>
                        <input type="number" name="target_penambahan_dana" value="{{ old('target_penambahan_dana') }}" class="form-control @error('target_penambahan_dana') is-invalid @enderror">
                        @error('target_penambahan_dana')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Alat Promosi</label>
                        <select name="alat_promosi" class="form-control @error('alat_promosi') is-invalid @enderror" id="">
                            <option disabled selected>-- pilih alat promosi --</option>
                            @foreach ($alats as $alat)
                                <option value="{{ $alat->id }}" {{ old('alat_promosi') == $alat->id ? "selected" : "" }}>{{ $alat->nm_alat_promosi }}</option>
                            @endforeach
                        </select>
                        @error('alat_promosi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Total Target</label>
                        <input type="number" name="total_target" value="{{ old('total_target') }}" class="form-control @error('total_target') is-invalid @enderror">
                        @error('total_target')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Periode Target</label>
                        <select name="periode_target" class="form-control @error('periode_target') is-invalid @enderror" id="">
                            <option disabled selected>-- pilih periode target --</option>
                            <option value="bulanan" {{ old('periode_target') == "bulanan" ? "selected" : ""}}>Bulanan</option>
                            <option value="triwulan" {{ old('periode_target') == "triwulan" ? "selected" : ""}}>Triwulan</option>
                        </select>
                        @error('periode_target')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-12 text-center">
                        <button type="reset" name="reset" class="btn btn-warning btn-sm"><i class="fa fa-refresh"></i>&nbsp; Ulangi</button>
                        <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i>&nbsp; Simpan Target</button>
                    </div>
               </div>
            </form>
        </div>
    </section>
@endsection