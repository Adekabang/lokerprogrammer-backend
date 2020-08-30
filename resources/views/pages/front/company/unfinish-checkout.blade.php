@extends('layouts.app')

@section('content')
<div class="main-content">
  {{ 'Pembayaran belum selesai, mohon selesaikan!!' }}
  <a href="{{ route('/demo-langganan-company') }}" class="btn btn-primary">Kembali</a>
</div>
@endsection
