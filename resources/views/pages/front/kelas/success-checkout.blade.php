@extends('layouts.app')

@section('content')
<div class="main-content">
  {{ 'Selamat proses pembayaran kelas premium anda sudah berhasil!' }}
  <a href="{{ url('/kelas') }}" class="btn btn-primary">Kembali</a>
</div>
@endsection
