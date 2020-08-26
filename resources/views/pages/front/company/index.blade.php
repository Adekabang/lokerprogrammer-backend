@extends('layouts.app')

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Pricing</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Components</a></div>
        <div class="breadcrumb-item">Pricing</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        @foreach ($course_packages as $item)
            <div class="col-12 col-md-4 col-lg-4">
          <div class="pricing {{ $item->package_name == 'Gold' ? 'pricing-highlight' : '' }}">
            <div class="pricing-title">
              {{ $item->package_name }}
            </div>
            <div class="pricing-padding">
              <div class="pricing-price">
                <div>@currency($item->price)</div>
              </div>
              <div class="pricing-details">
                  <div class="pricing-item">
                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                    <div class="pricing-item-label">{{ $item->features->feature_name }}</div>
                  </div>
              </div>
            </div>
            <div class="pricing-cta">
              @auth
              <form action="{{ route('checkout_process', $item->id) }}" method="POST">
                @csrf
                <button class="btn btn-primary" type="submit">
                  Beli Sekarang <i class="fas fa-arrow-right"></i>
                </button>
              </form>
             @endauth
             @guest
               <a href="{{ route('login') }}">Login <i class="fas fa-arrow-right"></i></a>
             @endguest
            </div>
          </div>
        </div>
        @endforeach
        
      </div>
    </div>
  </section>
</div>
@endsection
