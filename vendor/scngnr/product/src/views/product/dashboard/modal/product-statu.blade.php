<div class="modal-content">
  <!--begin::Form-->
  <form class="form" id="durumModal" method="POST">
    @csrf
    <!--begin::Modal header-->
    <div class="modal-header" id="kt_modal_add_customer_header">
      <!--begin::Modal title-->
      <h2 class="fw-bolder">Ürün Durum Değiştir</h2>
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
            <span class="required">Ürün Durum Değiştir</span>
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
          </label>
          <!--end::Label-->
          <!--begin::Input-->
          <select id="durum" wire:model="statu" name="durum"   data-control="select2" data-dropdown-parent="#productStatusModal" class="form-select form-select-solid fw-bolder">
            <option value="">Seçim Yapınız</option>
            <option value="0">Pasif</option>
            <option value="1">Taslak</option>
            <option value="2">Stok Yok</option>
            <option value="3">Satışta</option>
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
      <button type="button" class="btn btn-primary" wire:click="update()">
        <span class="indicator-label">Submit</span>
      </button>
      <!--end::Button-->
    </div>
    <!--end::Modal footer-->
  </form>
  <!--end::Form-->
</div>
