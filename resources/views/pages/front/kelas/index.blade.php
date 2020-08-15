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
        <div class="col-12 col-md-4 col-lg-4">
          <div class="pricing">
            <div class="pricing-title">
              Silver
            </div>
            <div class="pricing-padding">
              <div class="pricing-price">
                <div>Rp 100K</div>
              </div>
              <div class="pricing-details">
                <div class="pricing-item">
                  <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                  <div class="pricing-item-label">1 user agent</div>
                </div>
                <div class="pricing-item">
                  <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                  <div class="pricing-item-label">Core features</div>
                </div>
                <div class="pricing-item">
                  <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                  <div class="pricing-item-label">1GB storage</div>
                </div>
                <div class="pricing-item">
                  <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                  <div class="pricing-item-label">2 Custom domain</div>
                </div>
                <div class="pricing-item">
                  <div class="pricing-item-icon bg-danger text-white"><i class="fas fa-times"></i></div>
                  <div class="pricing-item-label">Live Support</div>
                </div>
              </div>
            </div>
            <div class="pricing-cta">
              <a href="#">Beli Sekarang <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4 col-lg-4">
          <div class="pricing pricing-highlight">
            <div class="pricing-title">
              Gold
            </div>
            <div class="pricing-padding">
              <div class="pricing-price">
                <div>Rp 250K</div>
              </div>
              <div class="pricing-details">
                <div class="pricing-item">
                  <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                  <div class="pricing-item-label">5 user agent</div>
                </div>
                <div class="pricing-item">
                  <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                  <div class="pricing-item-label">Core features</div>
                </div>
                <div class="pricing-item">
                  <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                  <div class="pricing-item-label">10GB storage</div>
                </div>
                <div class="pricing-item">
                  <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                  <div class="pricing-item-label">10 Custom domain</div>
                </div>
                <div class="pricing-item">
                  <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                  <div class="pricing-item-label">24/7 Support</div>
                </div>
              </div>
            </div>
            <div class="pricing-cta">
              <a href="#">Beli Sekarang <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4 col-lg-4">
          <div class="pricing">
            <div class="pricing-title">
              Platinum
            </div>
            <div class="pricing-padding">
              <div class="pricing-price">
                <div>Rp 400K</div>
              </div>
              <div class="pricing-details">
                <div class="pricing-item">
                  <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                  <div class="pricing-item-label">Unlimited user agent</div>
                </div>
                <div class="pricing-item">
                  <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                  <div class="pricing-item-label">Core features</div>
                </div>
                <div class="pricing-item">
                  <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                  <div class="pricing-item-label">8TB storage</div>
                </div>
                <div class="pricing-item">
                  <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                  <div class="pricing-item-label">Unlimited custom domain</div>
                </div>
                <div class="pricing-item">
                  <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                  <div class="pricing-item-label">Lifetime Support</div>
                </div>
              </div>
            </div>
            <div class="pricing-cta">
              <a href="#">Beli Sekarang <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
