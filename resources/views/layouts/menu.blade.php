
  <?php
    $ecommerce[0][0] = '';  $ecommerce[0][1] = '';
    switch (request()->path()) {
    case 'product': $ecommerce[0][0] = 'show';$ecommerce[0][1] = 'show'; break;
  } ?>

<div class="aside-logo flex-column-auto px-9 mb-9" id="kt_aside_logo">
  <!--begin::Logo-->
  <a href="../../demo3/dist/index.html">
    <img alt="Logo" src="{{asset('assets/media/logos/logo-demo3-default.svg')}}" class="h-20px logo" />
  </a>
  <!--end::Logo-->
</div>
<!--begin::Aside menu-->
<div class="aside-menu flex-column-fluid ps-5 pe-3 mb-9" id="kt_aside_menu">
  <!--begin::Aside Menu-->
  <div class="w-100 hover-scroll-overlay-y d-flex pe-2" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu, #kt_aside_menu_wrapper" data-kt-scroll-offset="100">
    <!--begin::Menu-->
    <div class="menu menu-column menu-rounded fw-bold my-auto" id="#kt_aside_menu" data-kt-menu="true">
      <div class="menu-item">
        <a class="menu-link" href="/dashboard">
          <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
            <span class="svg-icon svg-icon-5">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
                <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
              </svg>
            </span>
            <!--end::Svg Icon-->
          </span>
          <span class="menu-title">Anasayfa</span>
        </a>
      </div>
      <div data-kt-menu-trigger="click" class="menu-item here menu-accordion ">
        <span class="menu-link">
          <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
            <span class="svg-icon svg-icon-5">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
                <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
              </svg>
            </span>
            <!--end::Svg Icon-->
          </span>
          <span class="menu-title">Ayarlar</span>
          <span class="menu-arrow"></span>
        </span>
        <div class="menu-sub menu-sub-accordion">
          <div class="menu-item">
            <a class="menu-link" href="ayarlar/xml/import">
              <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
              </span>
              <span class="menu-title">Xml import</span>
            </a>
          </div>
        </div>
      </div>

      <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{$ecommerce[0][0]}}">
            <span class="menu-link">
              <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                <span class="svg-icon svg-icon-5">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
                    <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
                  </svg>
                </span>
                <!--end::Svg Icon-->
              </span>
              <span class="menu-title">eCommerce</span>
              <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion">
              <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{$ecommerce[0][1]}}">
                <span class="menu-link">
                  <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                  </span>
                  <span class="menu-title">Katalog</span>
                  <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion ">
                  <div class="menu-item">
                    <a class="menu-link" href="/product">
                      <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                      </span>
                      <span class="menu-title">Ürünler</span>
                    </a>
                  </div>
                  <div class="menu-item">
                    <a class="menu-link" href="/kategoriler">
                      <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                      </span>
                      <span class="menu-title">Kategoriler</span>
                    </a>
                  </div>
                  <div class="menu-item">
                    <a class="menu-link" href="/product/yeni-product">
                      <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                      </span>
                      <span class="menu-title">Yeni Ürün Ekle</span>
                    </a>
                  </div>
                  <div class="menu-item">
                    <a class="menu-link" href="/kategoriler/yeni-kategori">
                      <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                      </span>
                      <span class="menu-title">Yeni Kategori Ekle</span>
                    </a>
                  </div>
                </div>
              </div>
              <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <span class="menu-link">
                  <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                  </span>
                  <span class="menu-title">Satış işlemleri</span>
                  <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion">
                  <div class="menu-item">
                    <a class="menu-link" href="/orders">
                      <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                      </span>
                      <span class="menu-title">Sipariş Listeleme</span>
                    </a>
                  </div>
                  <div class="menu-item">
                    <a class="menu-link" href="/orders/manuel-orders-add">
                      <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                      </span>
                      <span class="menu-title">Manuel Sipariş Ekle</span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="menu-item">
                <a class="menu-link" href="/customers" title="Coming soon" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                  <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                  </span>
                  <span class="menu-title">Müşteriler</span>
                </a>
              </div>
              <div class="menu-item">
                <a class="menu-link" href="#" title="Coming soon" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                  <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                  </span>
                  <span class="menu-title">Raporlama</span>
                </a>
              </div>
              <div class="menu-item">
                <a class="menu-link" href="#" title="Coming soon" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                  <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                  </span>
                  <span class="menu-title">Ayarlar</span>
                </a>
              </div>
            </div>
      </div>
    </div>
    <!--end::Menu-->
  </div>
  <!--end::Aside Menu-->
</div>
<!--end::Aside menu-->
