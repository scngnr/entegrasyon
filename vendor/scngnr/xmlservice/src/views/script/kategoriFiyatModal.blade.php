<script type="text/javascript">
  function formAction(id)
  {

    document.getElementById("priceForm").action = "/product/price/" + id;
  }

</script>

<!--begin::Modal - Customers - Add-->
<div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true" >
  <!--begin::Modal dialog-->
  <div class="modal-dialog modal-dialog-centered mw-650px">
    <!--begin::Modal content-->
    <div class="modal-content">
      <!--begin::Form-->
      <form class="form" id="priceForm" method="POST">
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
              <select id="pazaryeri"  name="pazaryeri" aria-label="Select a Country" onchange="fiyatScripts()"data-control="select2" data-placeholder="Bir seçim yapın..." data-dropdown-parent="#kt_modal_add_customer" class="form-select form-select-solid fw-bolder">
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

              <select id="magza"  onchange="fiyatModals(4)" name="magza" aria-label="Select a Country" data-control="select2" data-placeholder="Bir seçim yapın..." data-dropdown-parent="#kt_modal_add_customer" class="form-select form-select-solid fw-bolder">
                <option value="">Bir Seçim yapın...</option>

              </select>
              <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="d-flex flex-column mb-7 fv-row">
              <!--begin::Label-->
              <label class="fs-6 fw-bold mb-2">
                <span class="required">Fiyat Seçimi</span>
                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
              </label>
              <!--end::Label-->
              <!--begin::Input-->
              <select id="fiyat" name="fiyat"  onchange="fiyatModals(5)" aria-label="Select a Country" data-control="select2" data-placeholder="Bir seçim yapın..." data-dropdown-parent="#kt_modal_add_customer" class="form-select form-select-solid fw-bolder">
                <option value="">Bir Seçim yapın...</option>
                <option value="SF">Sabit Fiyat</option>
                <option value="BF">Base Fiyat</option>
              </select>
              <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="d-flex flex-column mb-7 fv-row">
              <!--begin::Label-->
              <label class="fs-6 fw-bold mb-2">
                <span class="required">işlem seçimi</span>
                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
              </label>
              <!--end::Label-->
              <!--begin::Input-->
              <select id="islem"name="islem"  onchange="fiyatModals(6)" aria-label="Select a Country" data-control="select2" data-placeholder="Bir seçim yapın..." data-dropdown-parent="#kt_modal_add_customer" class="form-select form-select-solid fw-bolder">
                <option value="">Bir Seçim yapın...</option>
                <option value="toplama">Topla</option>
                <option value="cikarma">Çıkar</option>
                <option value="bolme">Böl</option>
                <option value="carpma">Çarp</option>
              </select>
              <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-7">
              <!--begin::Label-->
              <label class="required fs-6 fw-bold mb-2">işlem formülü</label>
              <!--end::Label-->
              <!--begin::Input-->
              <input id="formul" onchange="fiyatModals(7)"  type="text" class="form-control form-control-solid" placeholder="" name="deger"  />
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
          <button type="button"  onclick="ajaxPost(4)"  class="btn btn-primary">
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
