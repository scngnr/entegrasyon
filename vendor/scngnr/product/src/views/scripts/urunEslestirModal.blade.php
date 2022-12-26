<script type="text/javascript">

</script>

<!--begin::Modal - Customers - Add-->
<div class="modal fade" id="urunEslestirModal" tabindex="-1" aria-hidden="true" >
  <!--begin::Modal dialog-->
  <div class="modal-dialog modal-dialog-centered mw-650px">
    <!--begin::Modal content-->
    <div class="modal-content">
      <!--begin::Form-->
      <form class="form" id="urunEslestirModalForm" method="POST">
        @csrf
        <!--begin::Modal header-->
        <div class="modal-header" id="kt_modal_add_customer_header">
          <!--begin::Modal title-->
          <h2 class="fw-bolder">Fiyat Değiştir</h2>
          <!--end::Modal title-->
          <!--begin::Close-->
          <div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
        <!--end::Modal header-->
        <!--begin::Modal body-->
        <div class="modal-body py-10 px-lg-17">
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
              <select id="UrunEslestirModal" name="urunEslestirModalpazaryeri"  onchange="selects('UrunEslestir')"data-control="select2" data-placeholder="Bir seçim yapın..." data-dropdown-parent="#urunEslestirModal" class="form-select form-select-solid fw-bolder">
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

              <select id="UrunEslestirModalmagza" onchange="selectMazga('UrunEslestir')" name="urunEslestirModalmagza" aria-label="Select a Country" data-control="select2" data-placeholder="Bir seçim yapın..." data-dropdown-parent="#urunEslestirModal" class="form-select form-select-solid fw-bolder">
                <option value="">Bir Seçim yapın...</option>

              </select>
              <!--end::Input-->
            </div>
            <!--end::Input group-->
          </div>
          <!--end::Scroll-->
        </div>
        <!--end::Modal body-->
        <!--begin::Modal footer-->
        <div class="modal-footer flex-center">
          <!--begin::Button-->
          <button type="reset" id="kt_modal_add_customer_cancel" class="btn btn-light me-3">Discard</button>
          <!--end::Button-->
          <!--begin::Button-->
          <button type="button" onclick="ajaxPost(1)" id="kt_modal_add_customer_submit" class="btn btn-primary">
            <span class="indicator-label">Submit</span>
            <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
          </button>
          <!--end::Button-->
        </div>
        <!--end::Modal footer-->
      </form>
      <!--end::Form-->
    </div>
  </div>
</div>
<!--end::Modal - Customers - Add-->
