@extends('layouts.app')

@section('content')
<div class="main-content">
  {{ 'Huftt!' }}
  {{ 'Pembayaran anda gagal!' }}
  <a href="{{ url('/company') }}" class="btn btn-primary">Kembali</a>
</div>
@endsection
