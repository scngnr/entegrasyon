@extends('layouts.mainLayout', ['slot' => ''])

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
            <img class="mw-50px mw-lg-75px" src="assets/media/svg/brand-logos/volicity-9.svg" alt="image" />
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
                  <a href="" class="text-gray-800 text-hover-primary fs-2 fw-bolder me-3">Xml Dashboard</a>
                </div>
                <!--end::Status-->
              </div>
              <!--end::Details-->
              <!--begin::Actions-->
              <div class="d-flex mb-4">
                <a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">Xml Ekle</a>
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
                    <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                      <a href="#" class="menu-link px-3">
                        <span class="menu-title">Subscriptions</span>
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
                    <div class="fs-4 fw-bolder">31 DEC 2023</div>
                  </div>
                  <!--end::Number-->
                  <!--begin::Label-->
                  <div class="fw-bold fs-6 text-gray-400">Lisans süresi</div>
                  <!--end::Label-->
                </div>
                <!--end::Stat-->
                <!--begin::Stat-->
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                  <!--begin::Number-->
                  <div class="d-flex align-items-center">
                    <div class="fs-4 fw-bolder" data-kt-countup="true" data-kt-countup-value="75">0</div>
                  </div>
                  <!--end::Number-->
                  <!--begin::Label-->
                  <div class="fw-bold fs-6 text-gray-400">Xml Limiti</div>
                  <!--end::Label-->
                </div>
                <!--end::Stat-->
                <!--begin::Stat-->
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                  <!--begin::Number-->
                  <div class="d-flex align-items-center">
                    <!--end::Svg Icon-->
                    <div class="fs-4 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{$toplamUrunAdeti}}" data-kt-countup-prefix="">0</div>
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
        <!--begin::Nav-->
        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
          <!--begin::Nav item-->
          <li class="nav-item">
            <a class="nav-link text-active-primary py-5 me-6 active" href="/xmlservice">Xml Import</a>
          </li>
          <!--end::Nav item-->
        </ul>
        <!--end::Nav-->
      </div>
    </div>
    <!--end::Navbar-->
    <!--begin::Row-->
    <div class="row g-6 g-xl-9">
    </div>
    <!--end::Row-->
    <!--begin::Table-->
    <div class="card card-flush mt-6 mt-xl-9">
      <!--begin::Card header-->
      <div class="card-header mt-5">
        <!--begin::Card title-->
        <div class="card-title flex-column">
          <h3 class="fw-bolder mb-1 fs-7 text-gray-400 text-uppercase">Xml Listesi</h3>
        </div>
        <!--begin::Card title-->
      </div>
      <!--end::Card header-->
      <!--begin::Card body-->
      <div class="card-body pt-0">
        <!--begin::Table container-->
        <div class="table-responsive">
          <!--begin::Table-->
          <table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
            <!--begin::Head-->
            <thead class="fs-7 text-gray-400 text-uppercase">
              <tr>
                <th class="min-w-250px">Xml Adı</th>
                <th class="min-w-150px">Son Güncelleme</th>
                <th class="min-w-90px">Ürün Adeti</th>
                <th class="min-w-90px">Durumu</th>
                <th class="min-w-50px text-end">Düzenle</th>
              </tr>
            </thead>
            <!--end::Head-->
            <!--begin::Body-->
            <tbody class="fs-6">
              @if(count($xmlList) < 1)
                <tr>
                  <td><!--begin::Stat-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3 m-auto">
                      <!--begin::Label-->
                      <div class="fw-bold fs-6 text-gray-400">Gösterilebilecek Veri Bulunmuyor</div>
                      <!--end::Label-->
                    </div>
                    <!--end::Stat--></td>
                </tr>
              @else
                @foreach($xmlList as $xml)
                  <tr>
                    <td>
                      <!--begin::User-->
                      <div class="d-flex align-items-center">
                        <!--begin::Info-->
                        <div class="d-flex flex-column justify-content-center">
                          <a href="" class="fs-6 text-gray-400 text-hover-primary">{{$xml->xmlAdi}}</a>
                        </div>
                        <!--end::Info-->
                      </div>
                      <!--end::User-->
                    </td>
                    <td class="fs-6 text-gray-400 text-hover-primary">{{$xml->updated_at}}</td>
                    <td class="fs-6 text-gray-400 text-hover-primary" >{{$xml->xmlUrunAdet}}</td>
                    <td>
                      <span class="badge badge-light-info fw-bolder px-4 py-3">{{$xml->xmlDurum}}</span>
                    </td>
                    <td class="text-end">

                      <!--begin::Actions-->
                      <div class="d-flex mb-4">
                        <!--begin::Menu-->
                        <div class="me-0">
                          <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <i class="bi bi-three-dots fs-3"></i>
                          </button>
                          <!--begin::Menu 3-->
                          <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3 my-1">
                              <a href="/xmlservice/edit/{{$xml->id}}" class="menu-link px-3">Düzenle</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3 my-1">
                              <a href="/xmlservice/manuel-start/{{$xml->id}}" class="menu-link px-3">Manuel Başlat</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3 my-1">
                              <a href="/xmlservice/delete/{{base64_encode(base64_encode(base64_encode($xml->id)))}}" class="menu-link px-3">Sil</a>
                            </div>
                            <!--end::Menu item-->
                          </div>
                          <!--end::Menu 3-->
                        </div>
                        <!--end::Menu-->
                      </div>
                      <!--end::Actions-->
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
            <!--end::Body-->
          </table>
          <!--end::Table-->
        </div>
        <!--end::Table container-->
      </div>
      <!--end::Card body-->
    </div>
    <!--end::Card-->
  </div>
  <!--end::Container-->
</div>
<!--end::Content-->

<!--begin::Modal - New Target-->
<div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
  <!--begin::Modal dialog-->
  <div class="modal-dialog modal-dialog-centered mw-650px">
    <!--begin::Modal content-->
    <div class="modal-content rounded">
      <!--begin::Modal header-->
      <div class="modal-header pb-0 border-0 justify-content-end">
        <!--begin::Close-->
        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
          <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
          <span class="svg-icon svg-icon-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
              <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
            </svg>
          </span>
          <!--end::Svg Icon-->
        </div>
        <!--end::Close-->
      </div>
      <!--begin::Modal header-->
      <!--begin::Modal body-->
      <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
        <!--begin:Form-->
        <form id="kt_modal_new_target_form" class="form" method="POST" action="/xmlservice/add">
          @csrf
          <!--begin::Heading-->
          <div class="mb-13 text-center">
            <!--begin::Title-->
            <h1 class="mb-3">Yeni Xml Kayıt</h1>
            <!--end::Title-->
            <!--begin::Description-->
            {{-- <div class="text-muted fw-bold fs-5">
              If you need more info, please check
              <a href="#" class="fw-bolder link-primary">Project Guidelines</a>.
            </div>--}}
            <!--end::Description-->
          </div>
          <!--end::Heading-->
          <!--begin::Input group-->
          <div class="d-flex flex-column mb-8 fv-row">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
              <span class="required">Xml Adı</span>
              <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Xml Sağlayacı firma adı veya kısa adı girebilirsiniz."></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid" placeholder="Xml Adı Giriniz" name="xmlName" />
          </div>
          <!--end::Input group-->
          <!--begin::Input group-->
          <div class="d-flex flex-column mb-8 fv-row">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
              <span class="required">Xml Linki</span>
              <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Xml Sağlayacı firmanın iletmiş olduğu link"></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid" placeholder="Xml Linkini Giriniz" name="xmlLink" />
          </div>
          <!--end::Input group-->
          <!--begin::Actions-->
          <div class="text-center">
            <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Geri</button>
            <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
              <span class="indicator-label">Gönder</span>
              <span class="indicator-progress">Please wait...
              <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
          </div>
          <!--end::Actions-->
        </form>
        <!--end:Form-->
      </div>
      <!--end::Modal body-->
    </div>
    <!--end::Modal content-->
  </div>
  <!--end::Modal dialog-->
</div>
<!--end::Modal - New Target-->
@endsection
