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
                <div class="alert alert-info alert-block">
                    <i class="fa fa-info-circle"></i>&nbsp; <strong>Perhatian </strong>Berikut beberapa informasi mengenai target dari account officer :
                    <ol>
                        <li>Harap untuk mengisi target yang sesuai dan benar</li>
                        <li>Target yang sudah ditambahkan tidak dapat dihapus kembali</li>
                        <li>Target yang statusnya menunggu masih dapat diubah oleh Account Officer</li>
                        <li>target yang statusnya sudah diusulkan tidak dapat diubah kembali</li>
                    </ol>
                </div>
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
                    
                @endif
               </div>
               <div class="col-md-12">
                   <table class="table table-hover table-bordered" id="table">
                       <thead>
                           <tr>
                               <th>No</th>
                               <th>Target</th>
                               <th>Jenis Produk</th>
                               <th>Kategori Target</th>
                               <th>Total Target</th>
                               <th>Status Realisasi</th>
                               <th>Status Usulan</th>
                               <th>Usulkan</th>
                               <th>Aksi</th>
                           </tr>
                       </thead>
                       <tbody>
                           @php
                               $no=1;
                           @endphp
                           @foreach ($targets as $target)
                               <tr>
                                   <td>{{ $no++ }}</td>
                                   <td>
                                       {{ $target->nm_target }}
                                       <br />
                                       <small>Diinputkan {{ $target->created_at->diffForHumans() }}</small>
                                    </td>
                                   <td>{{ $target->nm_jenis_produk }}</td>
                                   <td>{{ $target->kategori }}</td>
                                   <td>Rp.{{ number_format($target->total_target,2) }}</td>
                                   <td>
                                       @if ($target->status_realisasi == "target")
                                           <label class="badge badge-warning">Target</label>
                                           @elseif ($target->status_realisasi == "pipeline")
                                           <label class="badge badge-primary">Pipeline</label>
                                           @elseif ($target->status_realisasi == "ditolak")
                                           <label class="badge badge-muted">Target Ditolak</label>
                                           @elseif ($target->status_realisasi == "berhasil")
                                           <label class="badge badge-info">Berhasil</label>
                                           @elseif ($target->status_realisasi == "tidak_berhasil")
                                           <label class="badge badge-secondary">Tidak Berhasil</label>
                                           @elseif ($target->status_realisasi == "verified")
                                           <label class="badge badge-success">Terverifikasi</label>
                                           @elseif ($target->status_realisasi == "verification_failed")
                                           <label class="badge badge-danger">Verifikasi Gagal</label>
                                        @endif
                                   </td>
                                   <td>
                                        @if ($target->status_usulan == "1")
                                           <label class="badge badge-success">Sudah Diusulkan</label>
                                            @else
                                           <label class="badge badge-warning">Menunggu</label>
                                        @endif
                                   </td>
                                   <td>
                                       @if ($target->status_usulan == "0")
                                            <form action="{{ route('ao.target.usulkan',[$target->id]) }}" method="POST">
                                            {{ csrf_field() }} {{ method_field('PATCH') }}
                                            <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-arrow-right"></i>&nbsp; Usulkan</button>
                                            </form>
                                            @else
                                            <button class="btn btn-primary btn-sm" disabled><i class="fa fa-arrow-right"></i>&nbsp; Usulkan</button>
                                       @endif
                                   </td>
                                   <td>
                                       @if ($target->status_usulan == "0")
                                           <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp; Ubah</a>
                                           @else
                                           <a class="text-danger">target sudah diusulkan dan tidak bisa diubah</a>
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