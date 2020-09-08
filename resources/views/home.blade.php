@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br>
                        <a href="{{ url('demo-kelas') }}" class="btn btn-primary mr-4 mt-4">Beli Paket Kelas</a>
                        <a href="{{ url('demo-company') }}" class="btn btn-info mt-4">Beli Paket Company</a>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
