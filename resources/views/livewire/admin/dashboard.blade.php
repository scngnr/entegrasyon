<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
  <!--begin::Container-->
  <div class="container-xxl" id="kt_content_container">
    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-xl-10">
      <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5">
        <!--begin::Card widget 4-->
        <div class="card card-flush ">
          <!--begin::Header-->
          <div class="card-header pt-5">
            <!--begin::Title-->
            <div class="card-title d-flex flex-column">
              <!--begin::Info-->
              <div class="d-flex align-items-center">
                <!--begin::Currency-->
                <span class="fs-4 fw-bold text-gray-400 me-1 align-self-start">₺</span>
                <!--end::Currency-->
                <!--begin::Amount-->
                <span class="fs-2hx fw-bolder text-dark me-2 lh-1">{{$thisMontSalesAmount}}</span>
                <!--end::Amount-->
                @if($thisMontSalesAmount > $lastMonthSalesAmount )
                  <span class="badge badge-success fs-6 lh-1 py-1 px-2 d-flex flex-center" style="height: 22px">
                  <!--begin::Svg Icon | path: icons/duotune/arrows/arr067.svg-->
                  <span class="svg-icon svg-icon-7 svg-icon-white ms-n1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <path opacity="0.5" d="M13 9.59998V21C13 21.6 12.6 22 12 22C11.4 22 11 21.6 11 21V9.59998H13Z" fill="black" />
                      <path d="M5.7071 7.89291C5.07714 8.52288 5.52331 9.60002 6.41421 9.60002H17.5858C18.4767 9.60002 18.9229 8.52288 18.2929 7.89291L12.7 2.3C12.3 1.9 11.7 1.9 11.3 2.3L5.7071 7.89291Z" fill="black" />
                    </svg>
                  </span> <?php $salesYuzdeFark = explode('.', $salesYuzdeFark) ?>
                  <!--end::Svg Icon-->{{$salesYuzdeFark[0]}}%</span>
                  <!--end::Badge-->
                @elseif($thisMontSalesAmount < $lastMonthSalesAmount )
                <span class="badge badge-danger fs-6 lh-1 py-1 px-2 d-flex flex-center" style="height: 22px">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr068.svg-->
                <span class="svg-icon svg-icon-7 svg-icon-white ms-n1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.5" d="M13 14.4V3.00003C13 2.40003 12.6 2.00003 12 2.00003C11.4 2.00003 11 2.40003 11 3.00003V14.4H13Z" fill="black" />
                    <path d="M5.7071 16.1071C5.07714 15.4771 5.52331 14.4 6.41421 14.4H17.5858C18.4767 14.4 18.9229 15.4771 18.2929 16.1071L12.7 21.7C12.3 22.1 11.7 22.1 11.3 21.7L5.7071 16.1071Z" fill="black" />
                  </svg>
                </span> <?php $salesYuzdeFark = explode('.', $salesYuzdeFark) ?>
                <!--end::Svg Icon-->{{$salesYuzdeFark[0]}}%</span>
                <!--end::Badge-->
                @else

                @endif
              </div>
              <!--end::Info-->
              <!--begin::Subtitle-->
              <span class="text-gray-400 pt-1 fw-bold fs-6">Aylık Satış Tutarı</span>
              <!--end::Subtitle-->
            </div>
            <!--end::Title-->
          </div>
          <!--end::Header-->

        </div>
        <!--end::Card widget 4-->
      </div>

      <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5">
        <!--begin::Card widget 4-->
        <div class="card card-flush ">
          <!--begin::Header-->
          <div class="card-header pt-5">
            <!--begin::Title-->
            <div class="card-title d-flex flex-column">
              <!--begin::Info-->
              <div class="d-flex align-items-center">
                <!--begin::Currency-->
                <span class="fs-4 fw-bold text-gray-400 me-1 align-self-start"></span>
                <!--end::Currency-->
                <!--begin::Amount-->
                <span class="fs-2hx fw-bolder text-dark me-2 lh-1">{{$thisMontSalesCount}}</span>
                <!--end::Amount-->
                <!--begin::Badge-->
                @if($thisMontSalesCount > $lastMonthSalesCount )
                  <span class="badge badge-success fs-6 lh-1 py-1 px-2 d-flex flex-center" style="height: 22px">
                  <!--begin::Svg Icon | path: icons/duotune/arrows/arr067.svg-->
                  <span class="svg-icon svg-icon-7 svg-icon-white ms-n1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <path opacity="0.5" d="M13 9.59998V21C13 21.6 12.6 22 12 22C11.4 22 11 21.6 11 21V9.59998H13Z" fill="black" />
                      <path d="M5.7071 7.89291C5.07714 8.52288 5.52331 9.60002 6.41421 9.60002H17.5858C18.4767 9.60002 18.9229 8.52288 18.2929 7.89291L12.7 2.3C12.3 1.9 11.7 1.9 11.3 2.3L5.7071 7.89291Z" fill="black" />
                    </svg>
                  </span><?php $adetYuzdeFark = explode('.', $adetYuzdeFark) ?>
                  <!--end::Svg Icon-->{{$adetYuzdeFark[0]}}%</span>
                @elseif($thisMontSalesCount < $lastMonthSalesCount )
                <span class="badge badge-danger fs-6 lh-1 py-1 px-2 d-flex flex-center" style="height: 22px">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr068.svg-->
                <span class="svg-icon svg-icon-7 svg-icon-white ms-n1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.5" d="M13 14.4V3.00003C13 2.40003 12.6 2.00003 12 2.00003C11.4 2.00003 11 2.40003 11 3.00003V14.4H13Z" fill="black" />
                    <path d="M5.7071 16.1071C5.07714 15.4771 5.52331 14.4 6.41421 14.4H17.5858C18.4767 14.4 18.9229 15.4771 18.2929 16.1071L12.7 21.7C12.3 22.1 11.7 22.1 11.3 21.7L5.7071 16.1071Z" fill="black" />
                  </svg>
                </span><?php $adetYuzdeFark = explode('.', $adetYuzdeFark) ?>
                <!--end::Svg Icon-->{{$adetYuzdeFark[0]}}%</span>
                @else

                @endif
                <!--end::Badge-->
              </div>
              <!--end::Info-->
              <!--begin::Subtitle-->
              <span class="text-gray-400 pt-1 fw-bold fs-6">Aylık Satış Adeti</span>
              <!--end::Subtitle-->
            </div>
            <!--end::Title-->
          </div>
          <!--end::Header-->

        </div>
        <!--end::Card widget 4-->
      </div>
      <!--begin::Col-->
      <div class="col-lg-12 col-xl-12 col-xxl-6 mb-5 mb-xl-0">
        @livewire('components.sales-owerview')
      </div>
      <!--end::Col-->
    </div>
    <!--end::Row-->
    <!--begin::Row-->
    <div class="row gy-5 g-xl-10">
      <!--begin::Col-->
      <div class="col-xl-12 mb-5 mb-xl-10">
        @livewire('components.product-owerview')
      </div>
      <!--end::Col-->
    </div>
    <!--end::Row-->
    <!--begin::Row-->
    <div class="row gy-5 g-xl-10">
      <!--begin::Col-->
      <div class="col-xl-12">
        @livewire('components.stock-owerviews')
      </div>
      <!--end::Col-->
    </div>
    <!--end::Row-->
  </div>
  <!--end::Container-->
</div>
<!--end::Content-->
