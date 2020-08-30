@extends('layouts.app')

@section('content')
<div class="main-content">
  {{ 'Huftt!' }}
  {{ 'Pembayaran anda gagal!' }}
  <a href="{{ route('demo-langganan-course') }}" class="btn btn-primary">Kembali</a>
</div>
@endsection
