@php
use App\Usulan;
use App\TotalSkor;
use App\NilaiFormulir3;
@endphp
@extends('layouts.layout')
@section('title', 'Dashboard')
@section('login_as', 'Supervisor')
@section('user-login')
{{ Auth::user()->nm_user }}
@endsection
@section('user-login2')
{{ Auth::user()->nm_user }}
@endsection
@section('sidebar-menu')
@include('backend/supervisor/sidebar')
@endsection
@push('styles')
<style>
    #detail:hover {
        text-decoration: underline !important;
        cursor: pointer !important;
        color: teal;
    }

    #selengkapnya {
        color: #5A738E;
        text-decoration: none;
        cursor: pointer;
    }

    #selengkapnya:hover {
        color: #007bff;
    }
</style>
@endpush
@section('content')
<section class="panel" style="margin-bottom:20px;">
    <header class="panel-heading"
        style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
        <i class="fa fa-tasks"></i>&nbsp;Manajemen Unit E-Marketing
    </header>
    <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
        <div class="x_content">
            <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#target" role="tab"
                        aria-controls="home" aria-selected="true">Target</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#targetDiTolak" role="tab"
                        aria-controls="profile" aria-selected="false">Target Ditolak</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="target" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
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
                                            @if ($target->status_realisasi == "target")
                                            {{-- <button class="btn btn-success btn-sm"
                                                style="color:white; cursor:pointer;"><i
                                                    class="fa fa-info-circle"></i></button> --}}
                                            <button class="btn btn-primary btn-sm" onclick="verifikasi({{$target->id}})"
                                                style="color:white; cursor:pointer;"><i
                                                    class="fa fa-thumbs-up"></i></button>

                                            <button class="btn btn-danger btn-sm"
                                                onclick="tolakVerifikasi({{$target->id}})"
                                                style="color:white; cursor:pointer;"><i
                                                    class="fa fa-thumbs-down"></i></button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="targetDiTolak" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no=1;
                                    @endphp
                                    @foreach ($targetsDiTolaks as $targetsDiTolak)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>
                                            {{ $targetsDiTolak->nm_target }}
                                            <br />
                                            <small>Diinputkan
                                                {{ $targetsDiTolak->created_at->diffForHumans() }}</small>
                                        </td>
                                        <td>{{ $targetsDiTolak->nm_jenis_produk }}</td>
                                        <td>{{ $targetsDiTolak->kategori }}</td>
                                        <td>Rp.{{ number_format($targetsDiTolak->total_target,2) }}</td>
                                        <td>
                                            @if ($targetsDiTolak->status_realisasi == "target")
                                            <label class="badge badge-warning">Target</label>
                                            @elseif ($targetsDiTolak->status_realisasi == "pipeline")
                                            <label class="badge badge-primary">Pipeline</label>
                                            @elseif ($targetsDiTolak->status_realisasi == "ditolak")
                                            <label class="badge badge-danger">Target Ditolak</label>
                                            @elseif ($targetsDiTolak->status_realisasi == "berhasil")
                                            <label class="badge badge-info">Berhasil</label>
                                            @elseif ($targetsDiTolak->status_realisasi == "tidak_berhasil")
                                            <label class="badge badge-secondary">Tidak Berhasil</label>
                                            @elseif ($targetsDiTolak->status_realisasi == "verified")
                                            <label class="badge badge-success">Terverifikasi</label>
                                            @elseif ($targetsDiTolak->status_realisasi == "verification_failed")
                                            <label class="badge badge-danger">Verifikasi Gagal</label>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($targetsDiTolak->status_usulan == "1")
                                            <label class="badge badge-success">Sudah Diusulkan</label>
                                            @else
                                            <label class="badge badge-warning">Menunggu</label>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
 
    function verifikasi(id) {
        swal({
            title: 'Yakin Melakukan Verifikasi Target?',
            text: "Target yang sudah terverifikasi tidak bisa diubah kembali!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Verifikasi',
            cancelButtonText: 'Kembali'
        }).then((result) => {
            if(result.value){
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'PATCH',
                    url: "{{ url('/supervisor/verifikasi_target/verifikasi_data_target')}}/" + id,
                    data: {_token: CSRF_TOKEN, _method: "PATCH"},
                    dataType: 'JSON',
                    success: function () {   
                        swal(
                            'Berhasil!',
                            'Target berhasil diverifikasi !!',
                            'success'
                        );
                        window.setTimeout(function(){location.reload()},3000);
                    }
                });
            }
        })
    }

    function tolakVerifikasi(id) {
        swal({
            title: 'Yakin Melakukan Penolakan Target?',
            text: "Target yang sudah terverifikasi tidak bisa diubah kembali!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Tolak',
            cancelButtonText: 'Kembali'
        }).then((result) => {
            if(result.value){
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'PATCH',
                    url: "{{ url('/supervisor/verifikasi_target/tolak_data_target')}}/" + id,
                    data: {_token: CSRF_TOKEN, _method: "PATCH"},
                    dataType: 'JSON',
                    success: function () {   
                        swal(
                            'Berhasil!',
                            'Target berhasil ditolak !!',
                            'success'
                        );
                        window.setTimeout(function(){location.reload()},3000);
                    }
                });
            }
        })
    }


</script>
@endpush