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
            <i class="fa fa-tasks"></i>&nbsp;Manajemen subproduk E-Marketing
        </header>
        <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
            <form action="{{ route('administrator.subproduk.post') }}" method="POST">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info alert-block">
                            <i class="fa fa-info-circle"></i>&nbsp; Silahkan tambahkan subproduk baru jika diperlukan.
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Nama Produk</label>
                        <select name="produk_id" class="form-control @error('produk_id') is-invalid @enderror" id="">
                            <option disabled selected>-- pilih nama produk --</option>
                            @foreach ($produks as $produk)
                                <option value="{{ $produk->id }}">{{ $produk->nm_produk }}</option>
                            @endforeach
                        </select>
                        @error('produk_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label>Nama sub produk</label>
                        <input type="text" name="nm_sub_produk" id="nm_sub_produk" class="form-control @error('nm_sub_produk') is-invalid @enderror">
                        @error('nm_sub_produk')
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
                               <th>Nama Produk</th>
                               
                               <th>Nama Sub Produk</th>
                              
                           </tr>
                       </thead>
                       <tbody>
                           @php
                               $no=1;
                           @endphp
                           @foreach ($subproduks as $subproduk)
                               <tr>
                                   <td>{{ $no++ }}</td>
                                   <td>{{ $subproduk->nm_produk }}</td>
                                   <td>{{ $subproduk->nm_sub_produk }}</td>
                                  
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