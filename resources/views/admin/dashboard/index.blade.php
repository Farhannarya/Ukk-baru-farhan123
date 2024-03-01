@if(auth()->check())
    <div class="alert alert-success">Halo {{ auth()->user()->name }} Selamat Datang di halaman  {{ auth()->user()->name }}!!</div>
@else
    <div class="alert alert-danger">Anda belum login.</div>
@endif

@php
    $totalUsers = App\Models\User::count();
    $totalProduk = App\Models\Produk::count();
    $totalKategori = App\Models\Kategori::count();
    $totalPenjualan = App\Models\Transaksi::count();
@endphp

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="info-box bg-info">
            <span class="info-box-icon"><i class="fas fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Users</span>
                <span class="info-box-number">{{$totalUsers}}</span>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="info-box bg-danger">
            <span class="info-box-icon"><i class="fas fa-list"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Kategori</span>
                <span class="info-box-number">{{$totalKategori}}</span>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="info-box bg-success">
            <span class="info-box-icon"><i class="fas fa-table"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Produk</span>
                <span class="info-box-number">{{$totalProduk}}</span>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="info-box bg-warning">
            <span class="info-box-icon"><i class="fas fa-exchange-alt"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Transaksi</span>
                <span class="info-box-number">{{$totalPenjualan}}</span>
            </div>
        </div>
    </div>
</div>
