@extends('layouts.app')

@section('title', 'Beranda')
@section('description', 'Halaman Beranda')

@section('content')
<section class="row">
  <div class="col-12 col-lg-9">
    <div class="row">
      <div class="col-6 col-lg-4 col-md-6">
        <div class="card">
          <a href="{{ route('students.borrowings.index') }}">
            <div class="card-body px-4 py-4-5">
              <div class="row">
                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                  <div class="stats-icon blue mb-2">
                    <i class="iconly-boldProfile"></i>
                  </div>
                </div>
                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                  <h6 class="text-muted font-semibold">Total Peminjamanku</h6>
                  <h6 class="font-extrabold mb-0">{{ $myBorrowings['counts']['total'] }}</h6>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-6 col-lg-4 col-md-6">
        <div class="card">
          <a href="{{ route('students.borrowings.index') }}">
            <div class="card-body px-4 py-4-5">
              <div class="row">
                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                  <div class="stats-icon green mb-2">
                    <i class="iconly-boldProfile"></i>
                  </div>
                </div>
                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                  <h6 class="text-muted font-semibold">Peminjaman Sudah Dikembalikan</h6>
                  <h6 class="font-extrabold mb-0">{{ $myBorrowings['counts']['returned'] }}</h6>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-6 col-lg-4 col-md-6">
        <div class="card">
          <a href="{{ route('students.borrowings.index') }}">
            <div class="card-body px-4 py-4-5">
              <div class="row">
                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                  <div class="stats-icon red mb-2">
                    <i class="iconly-boldBookmark"></i>
                  </div>
                </div>
                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                  <h6 class="text-muted font-semibold">Peminjaman Belum Dikembalikan</h6>
                  <h6 class="font-extrabold mb-0">{{ $myBorrowings['counts']['notReturned'] }}</h6>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-lg-3">
    <div class="card">
      <div class="card-body py-4 px-4">
        <div class="d-flex align-items-center">
          <div class=" ms-3 name">
            <h6 class="font-bold">Login Sebagai:</h6>
            <h5 class="font-bold">{{ auth('student')->user()->name }}</h5>
            <h6 class="text-muted mb-0">{{ auth('student')->user()->email }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

