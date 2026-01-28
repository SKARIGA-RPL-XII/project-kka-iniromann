@extends('layouts.app')  <!-- Menggunakan layout app -->

@section('title', 'Dashboard - E-Kelurahan')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-800">Dashboard Warga</h1>
    <p class="text-gray-600">Selamat datang, {{ Auth::user()->warga->nama_lengkap }}!</p>
</div>

<!-- Konten dashboard -->
@endsection