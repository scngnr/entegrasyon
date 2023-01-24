<div>

  <div class="modal-content col-12">
    <!--begin::Modal body-->
    <div class="modal-body scroll-y m-5">
      <!--begin::Stepper-->
      <div class="stepper stepper-links d-flex flex-column" id="kt_create_account_stepper">
        <!--begin::Nav-->
        <div class="stepper-nav py-5">
          <!--begin::Step 1-->
          <div class="stepper-item current" data-kt-stepper-element="nav">
            <h3 class="stepper-title">Pazaryeri ve Mağaza Seçimi</h3>
          </div>
          <!--end::Step 1-->
          <!--begin::Step 2-->
          <div class="stepper-item" data-kt-stepper-element="nav">
            <h3 class="stepper-title">Kategori Seçimi</h3>
          </div>
          <!--end::Step 2-->
          <!--begin::Step 3-->
          <div class="stepper-item" data-kt-stepper-element="nav">
            <h3 class="stepper-title">Özellik Seçimi</h3>
          </div>
          <!--end::Step 3-->
          <!--begin::Step 4-->
          <div class="stepper-item" data-kt-stepper-element="nav">
            <h3 class="stepper-title">Sonuç</h3>
          </div>
          <!--end::Step 4-->
        </div>
        <!--end::Nav-->
        <!--begin::Form-->
        <form class="mx-auto mw-600px w-100 py-10" novalidate="novalidate" id="kt_create_account_form" action="/product/category/eslestir" method="post">
          <!--begin::Step 1-->
          <div class="current" data-kt-stepper-element="content">
            <!--begin::Wrapper-->
            <div class="w-100">
              <!--begin::Heading-->
              <div class="pb-10 pb-lg-15">
                <!--begin::Title-->
                <h2 class="fw-bolder d-flex align-items-center text-dark">Pazaryeri ve mağaza seçimi
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Eşleştirmek istediğiniz ürün için mağaza seçimi yapınız"></i></h2>
                <!--end::Title-->
                <!--begin::Notice-->
                <div class="text-muted fw-bold fs-6">Daha fazla bilgi için yardım sayfasını inceleyin
                <a href="#" class="link-primary fw-bolder">Yardım sayfası</a>.</div>
                <!--end::Notice-->
              </div>
              <!--end::Heading-->
              <!--begin::Input group-->
              <div class="fv-row mb-0">
                <!--begin::Scroll-->
                <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
                  <!--begin::Input group-->
                  <div class="d-flex flex-column mb-7 fv-row">
                    <!--begin::Label-->
                    <label class="fs-6 fw-bold mb-2">
                      <span class="required">Pazaryeri seçimi</span>
                      <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select wire:model="searchValue" wire:change="pazaryeriSearch()"data-control="select2" data-placeholder="Bir seçim yapın..." data-dropdown-parent="#kt_modal_create_account" class="form-select form-select-solid fw-bolder">
                      <option value="">Bir Seçim yapın...</option>
                      <option value="woocommerce">WooCommerce</option>
                      <option value="opencart">OpenCart</option>
                      <option value="magento">Magento</option>
                      <option value="ideasoft">İdeasoft</option>
                      <option value="n11">N11</option>
                      <option value="trendyol">Trendyol</option>
                      <option value="hepsiburada">Hepsiburada</option>
                      <option value="ciceksepeti">Çiçesepeti</option>
                      <option value="lazimbana">Lazımbana</option>
                    </select>


                    <!--end::Input-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  <div class="d-flex flex-column mb-7 fv-row">
                    <!--begin::Label-->
                    <label class="fs-6 fw-bold mb-2">
                      <span class="required">Magaza seçimi</span>
                      <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->

                    <select id="PazaryeriModalmagza" name="urunEslestirModalmagza" aria-label="Select a Country" data-control="select2" data-placeholder="Bir seçim yapın..." data-dropdown-parent="#kt_modal_create_account" class="form-select form-select-solid fw-bolder">
                      <option value="" selected>Bir Seçim yapın...</option>
                      @foreach($pazaryeri as $magza)
                        <option value="{{$magza->id}}">{{$magza->magazaAdi}}</option>
                      @endforeach
                    </select>
                    <!--end::Input-->
                  </div>
                  <!--end::Input group-->
                </div>
                <!--end::Scroll-->
              </div>
              <!--end::Input group-->
            </div>
            <!--end::Wrapper-->
          </div>
          <!--end::Step 1-->
          <!--begin::Step 2-->
          <div data-kt-stepper-element="content">
            <!--begin::Wrapper-->
            <div class="w-100">
              <!--begin::Heading-->
              <div class="pb-10 pb-lg-15">
                <!--begin::Title-->
                <h2 class="fw-bolder text-dark">Kategori Seçimi</h2>
                <!--end::Title-->
              </div>
              <!--end::Heading-->
              <!--begin::Input group-->
              <div class="mb-10 fv-row">
                <!--begin::Label-->
                <label class="form-label mb-3">Kategori Adı Giriniz</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" id="category_name" class="form-control form-control-lg form-control-solid" name="account_name" placeholder="" />
                <!--end::Input-->
              </div>
              <!--end::Input group-->

              <!--begin::Input group-->
              <div class="mb-0 fv-row">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" >
                  <!--begin::Table head-->
                  <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                      <th class="min-w-70px">Kategori Adı</th>
                      <th class="text-center min-w-70px">Actions</th>
                    </tr>
                    <!--end::Table row-->
                  </thead>
                  <!--end::Table head-->
                  <tbody id="tbody"class="fw-bold text-gray-600">

                  </tbody>
                </table>
                <!--end::Table-->
              </div>
              <!--end::Input group-->
            </div>
            <!--end::Wrapper-->
          </div>
          <!--end::Step 2-->
          <!--begin::Step 3-->
          <div data-kt-stepper-element="content">
            <!--begin::Wrapper-->
            <div class="w-100">
              <!--begin::Heading-->
              <div class="pb-10 pb-lg-12">
                <!--begin::Title-->
                <h2 class="fw-bolder text-dark">Kategori Özellik Seçimi</h2>
                <!--end::Title-->
              </div>
              <!--end::Heading-->
              <!--begin::Input group-->
              <div id="spect" class="fv-row mb-10">

              </div>
              <!--end::Input group-->
            </div>
            <!--end::Wrapper-->
          </div>
          <!--end::Step 3-->
          <!--begin::Step 5-->
          <div data-kt-stepper-element="content">
            <!--begin::Wrapper-->
            <div class="w-100">
              <!--begin::Heading-->
              <div class="pb-8 pb-lg-10">
                <!--begin::Title-->
                <h2 class="fw-bolder text-dark">Your Are Done!</h2>
                <!--end::Title-->
                <!--begin::Notice-->
                <div class="text-muted fw-bold fs-6">If you need more info, please
                <a href="../../demo3/dist/authentication/sign-in/basic.html" class="link-primary fw-bolder">Sign In</a>.</div>
                <!--end::Notice-->
              </div>
              <!--end::Heading-->
              <!--begin::Body-->
              <div class="mb-0">
                <!--begin::Text-->
                <div class="fs-6 text-gray-600 mb-5">Writing headlines for blog posts is as much an art as it is a science and probably warrants its own post, but for all advise is with what works for your great &amp; amazing audience.</div>
                <!--end::Text-->
                <!--begin::Alert-->
                <!--begin::Notice-->
                <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                  <!--begin::Icon-->
                  <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                  <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                      <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black" />
                      <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black" />
                    </svg>
                  </span>
                  <!--end::Svg Icon-->
                  <!--end::Icon-->
                  <!--begin::Wrapper-->
                  <div class="d-flex flex-stack flex-grow-1">
                    <!--begin::Content-->
                    <div class="fw-bold">
                      <h4 class="text-gray-900 fw-bolder">We need your attention!</h4>
                      <div class="fs-6 text-gray-700">To start using great tools, please, please
                      <a href="#" class="fw-bolder">Create Team Platform</a></div>
                    </div>
                    <!--end::Content-->
                  </div>
                  <!--end::Wrapper-->
                </div>
                <!--end::Notice-->
                <!--end::Alert-->
              </div>
              <!--end::Body-->
            </div>
            <!--end::Wrapper-->
          </div>
          <!--end::Step 5-->
          <!--begin::Actions-->
          <div class="d-flex flex-stack pt-15">
            <!--begin::Wrapper-->
            <div class="mr-2">
              <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
              <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
              <span class="svg-icon svg-icon-4 me-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="black" />
                  <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="black" />
                </svg>
              </span>
              <!--end::Svg Icon-->Geri</button>
            </div>
            <!--end::Wrapper-->
            <!--begin::Wrapper-->
            <div>
              <button type="submit" class="btn btn-lg btn-primary me-3" data-kt-stepper-action="submit">
                <span class="indicator-label">Gönder
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                <span class="svg-icon svg-icon-3 ms-2 me-0">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
                    <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
                  </svg>
                </span>
                <!--end::Svg Icon--></span>
                <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
              </button>
              <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">İleri
              <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
              <span class="svg-icon svg-icon-4 ms-1 me-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
                  <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
                </svg>
              </span>
              <!--end::Svg Icon--></button>
            </div>
            <!--end::Wrapper-->
          </div>
          <!--end::Actions-->
        </form>
        <!--end::Form-->
      </div>
      <!--end::Stepper-->
    </div>
    <!--end::Modal body-->
  </div></div>
