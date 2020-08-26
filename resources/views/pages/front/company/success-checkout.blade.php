@extends('layouts.app')

@section('content')
<div class="main-content">
  {{ 'Selamat proses pembayaran berlangganan anda sudah berhasil!' }}
  <a href="{{ url('/company') }}" class="btn btn-primary">Kembali</a>
</div>
@endsection
