@extends('layouts.mainLayout', ['slot' => ''])

@section('pageContents')

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
  <!--begin::Container-->
  <div class="container-xxl" id="kt_content_container">
    <!--begin::Navbar-->
    <div class="card mb-6 mb-xl-9">
      <div class="card-body pt-9 pb-0">
        <!--begin::Details-->
        <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
          <!--begin::Image-->
          <div class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
            <img class="mw-50px mw-lg-75px" src="{{asset('assets/media/svg/brand-logos/volicity-9.svg')}}" alt="image" />
          </div>
          <!--end::Image-->
          <!--begin::Wrapper-->
          <div class="flex-grow-1">
            <!--begin::Head-->
            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
              <!--begin::Details-->
              <div class="d-flex flex-column">
                <!--begin::Status-->
                <div class="d-flex align-items-center mb-1">
                  <a href="" class="text-gray-800 text-hover-primary fs-2 fw-bolder me-3">{{$xmlInfo->xmlAdi}}</a>
                </div>
                <!--end::Status-->
              </div>
              <!--end::Details-->
            </div>
            <!--end::Head-->
            <!--begin::Info-->
            <div class="d-flex flex-wrap justify-content-start">
              <!--begin::Stats-->
              <div class="d-flex flex-wrap">
                <!--begin::Stat-->
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                  <!--begin::Number-->
                  <div class="d-flex align-items-center">
                    <!--end::Svg Icon-->
                    <div class="fs-4 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{$xmlInfo->xmlUrunAdet}}" data-kt-countup-prefix="">0</div>
                  </div>
                  <!--end::Number-->
                  <!--begin::Label-->
                  <div class="fw-bold fs-6 text-gray-400">Yüklenen Ürün Adeti</div>
                  <!--end::Label-->
                </div>
                <!--end::Stat-->
              </div>
              <!--end::Stats-->
            </div>
            <!--end::Info-->
          </div>
          <!--end::Wrapper-->
        </div>
        <!--end::Details-->
        <div class="separator"></div>
      </div>
    </div>
    <!--end::Navbar-->
    <!--begin::Row-->
    <div class="row g-6 g-xl-9">
    </div>
    <!--end::Row-->
    <!--begin::Table-->
    <div class="card card-flush mt-6 mt-xl-9">
      <!--begin::Card body-->
      <div class="card-body pt-0">
        <!--begin::Table container-->
        @include('view::script.stepper')
        <!--end::Table container-->
      </div>
      <!--end::Card body-->
    </div>
    <!--end::Card-->
  </div>
  <!--end::Container-->
</div>
<!--end::Content-->

@endsection

@section('pageContent')

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
  <!--begin::Container-->
  <div class="container-xxl" id="kt_content_container">
    <!--begin::Navbar-->
    <div class="card mb-6 mb-xl-9">
      <div class="card-body pt-9 pb-0">
        <!--begin::Details-->
        <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
          <!--begin::Image-->
          <div class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
            <img class="mw-50px mw-lg-75px" src="{{asset('assets/media/svg/brand-logos/volicity-9.svg')}}" alt="image" />
          </div>
          <!--end::Image-->
          <!--begin::Wrapper-->
          <div class="flex-grow-1">
            <!--begin::Head-->
            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
              <!--begin::Details-->
              <div class="d-flex flex-column">
                <!--begin::Status-->
                <div class="d-flex align-items-center mb-1">
                  <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder me-3">{{$xmlInfo->xmlAdi}}</a>
                  <span class="badge badge-light-success me-auto">{{$xmlInfo->xmlDurum}}</span>
                </div>
                <!--end::Status-->
              </div>
              <!--end::Details-->
              <!--begin::Actions-->
              <div class="d-flex mb-4">
                <a href="#" class="btn btn-sm btn-bg-light btn-active-color-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_users_search">Add User</a>
                <!--begin::Menu-->
                <div class="me-0">
                  <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <i class="bi bi-three-dots fs-3"></i>
                  </button>
                  <!--begin::Menu 3-->
                  <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                    <!--begin::Heading-->
                    <div class="menu-item px-3">
                      <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                      <a href="#" class="menu-link px-3">Create Invoice</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                      <a href="#" class="menu-link flex-stack px-3">Create Payment
                      <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i></a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                      <a href="#" class="menu-link px-3">Generate Bill</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                      <a href="#" class="menu-link px-3">
                        <span class="menu-title">Subscription</span>
                        <span class="menu-arrow"></span>
                      </a>
                      <!--begin::Menu sub-->
                      <div class="menu-sub menu-sub-dropdown w-175px py-4">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                          <a href="#" class="menu-link px-3">Plans</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                          <a href="#" class="menu-link px-3">Billing</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                          <a href="#" class="menu-link px-3">Statements</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                          <div class="menu-content px-3">
                            <!--begin::Switch-->
                            <label class="form-check form-switch form-check-custom form-check-solid">
                              <!--begin::Input-->
                              <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
                              <!--end::Input-->
                              <!--end::Label-->
                              <span class="form-check-label text-muted fs-6">Recuring</span>
                              <!--end::Label-->
                            </label>
                            <!--end::Switch-->
                          </div>
                        </div>
                        <!--end::Menu item-->
                      </div>
                      <!--end::Menu sub-->
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3 my-1">
                      <a href="#" class="menu-link px-3">Settings</a>
                    </div>
                    <!--end::Menu item-->
                  </div>
                  <!--end::Menu 3-->
                </div>
                <!--end::Menu-->
              </div>
              <!--end::Actions-->
            </div>
            <!--end::Head-->
            <!--begin::Info-->
            <div class="d-flex flex-wrap justify-content-start">
              <!--begin::Stats-->
              <div class="d-flex flex-wrap">
                <!--begin::Stat-->
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                  <!--begin::Number-->
                  <div class="d-flex align-items-center">
                    <div class="fs-4 fw-bolder">29 Jan, 2021</div>
                  </div>
                  <!--end::Number-->
                  <!--begin::Label-->
                  <div class="fw-bold fs-6 text-gray-400">Lisans Bitiş Tarihi</div>
                  <!--end::Label-->
                </div>
                <!--end::Stat-->
                <!--begin::Stat-->
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                  <!--begin::Number-->
                  <div class="d-flex align-items-center">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                    <span class="svg-icon svg-icon-3 svg-icon-danger me-2">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
                        <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="black" />
                      </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <div class="fs-4 fw-bolder" data-kt-countup="true" data-kt-countup-value="75">0</div>
                  </div>
                  <!--end::Number-->
                  <!--begin::Label-->
                  <div class="fw-bold fs-6 text-gray-400">İşlemdeki Ürün Adeti</div>
                  <!--end::Label-->
                </div>
                <!--end::Stat-->
                <!--begin::Stat-->
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                  <!--begin::Number-->
                  <div class="d-flex align-items-center">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                    <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
                      </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <div class="fs-4 fw-bolder" >{{$xmlInfo->xmlUrunAdet}}</div>
                  </div>
                  <!--end::Number-->
                  <!--begin::Label-->
                  <div class="fw-bold fs-6 text-gray-400">Ürün Sayısı</div>
                  <!--end::Label-->
                </div>
                <!--end::Stat-->
              </div>
              <!--end::Stats-->
              <!--begin::Users-->
              <div class="symbol-group symbol-hover mb-3">

                {{-- Ürünler çekiliyor daha sonra silinecektir --}}
                <?php $tumUrunler = Scngnr\Product\Models\en_product::all(); ?>
                <?php $urunler = Scngnr\Product\Models\en_product::all()->random(13); ?>
                <?php $countTumUrunler = count($tumUrunler); ?>
                <?php $countUrunler = count($urunler); ?>

                @foreach($urunler as $product)
                  <!--begin::User-->
                  <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="{{$product->name}}">
                    <img src="{{$product->pictures}}" alt="PIC">
                  </div>
                  <!--end::User-->
                @endforeach
                <!--begin::All users-->
                <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
                  <span class="symbol-label bg-dark text-inverse-dark fs-8 fw-bolder" data-bs-toggle="tooltip" data-bs-trigger="hover" title="View more users">+<?php echo  $countTumUrunler - $countUrunler ; ?></span>
                </a>
                <!--end::All users-->
              </div>
              <!--end::Users-->
            </div>
            <!--end::Info-->
          </div>
          <!--end::Wrapper-->
        </div>
        <!--end::Details-->
        <div class="separator"></div>
        <!--begin::Nav-->
        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
          <!--begin::Nav item-->
          <li class="nav-item">
            <a class="nav-link text-active-primary py-5 me-6 active"  data-bs-toggle="tab" href="#kt_vtab_pane_4" >Gene Bakış</a>
          </li>
          <!--end::Nav item-->
          <!--begin::Nav item-->
          <li class="nav-item">
            <a class="nav-link text-active-primary py-5 me-6" data-bs-toggle="tab" href="#kt_vtab_pane_5">Ürün Ayarları</a>
          </li>
          <!--end::Nav item-->
          <!--begin::Nav item-->
          <li class="nav-item">
            <a class="nav-link text-active-primary py-5 me-6" data-bs-toggle="tab" href="#kt_vtab_pane_6">Kategori Fiyatlandır</a>
          </li>
          <!--end::Nav item-->
          <!--begin::Nav item-->
          <li class="nav-item">
            <a class="nav-link text-active-primary py-5 me-6" data-bs-toggle="tab" href="#kt_vtab_pane_7">Koşul Fiyatlandır</a>
          </li>
          <!--end::Nav item-->
          <!--begin::Nav item-->
          <li class="nav-item">
            <a class="nav-link text-active-primary py-5 me-6" data-bs-toggle="tab" href="#kt_vtab_pane_8">Ayarlar</a>
          </li>
          <!--end::Nav item-->
        </ul>
        <!--end::Nav-->
      </div>
    </div>
    <!--end::Navbar-->

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade active show" id="kt_vtab_pane_4" role="tabpanel">
          @include('view::script.xmlInfo')
        </div>
        <div class="tab-pane fade " id="kt_vtab_pane_5" role="tabpanel">
          @include('view::script.xmlProductInfo')
        </div>
        <div class="tab-pane fade" id="kt_vtab_pane_6" role="tabpanel">
          @include('view::script.kategoriFiyat')
        </div>
        <div class="tab-pane fade" id="kt_vtab_pane_7" role="tabpanel">
          @include('view::script.kosulFiyat')
        </div>
        <div class="tab-pane fade" id="kt_vtab_pane_8" role="tabpanel">
          @include('view::script.settings')
        </div>
    </div>
  </div>
  <!--end::Container-->
</div>
<!--end::Content-->


@endsection
