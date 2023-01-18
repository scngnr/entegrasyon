<div   tabindex="-1" aria-hidden="true">
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
        <form id="kt_modal_new_target_form" class="form" action="#">
          <!--begin::Heading-->
          <div class="mb-13 text-center">
            <!--begin::Title-->
            <h1 class="mb-3">Yeni Kural Ekleme</h1>
            <!--end::Title-->
            <!--begin::Description-->
            <div class="text-muted fw-bold fs-5">Daha fazla bilgi için
            <a href="#" class="fw-bolder link-primary">Yardım Sayfasına bakabilirsiniz</a>.</div>
            <!--end::Description-->
          </div>
          <!--end::Heading-->
          <!--begin::Input group-->
          <div class="d-flex flex-column mb-8 fv-row">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
              <span class="required">Kural Açıklaması</span>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid" placeholder="Kural Açıklaması Giriniz" name="ruleDesc" />
          </div>
          <!--end::Input group-->
          <!--begin::Input group-->
          <div class="row g-9 mb-8">
            <!--begin::Col-->
            <div class="col-md-6 fv-row">
              <label class="required fs-6 fw-bold mb-2">Kullanılacak Fonksiyon</label>
              <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Fonksiyon Seçiniz" name="target_assign">
                <option value="">Fonksiyon Seçiniz</option>
                <option value="1">Explode() </option>
                <option value="2">Ltrim()</option>
                <option value="3">Rtrim()</option>
                <option value="4">Trim()</option>
                <option value="5">Strtolower()</option>
                <option value="6">Strtoupper()</option>
                <option value="7">Ucfirst()</option>
                <option value="8">Ucwords</option>
                <option value="9">str_replace()</option>
              </select>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-6 fv-row">
              <label class="required fs-6 fw-bold mb-2">Karakter Seçici</label>
              <input type="text" class="form-control form-control-solid" placeholder="Seçici Karakter Giriniz" name="fonkParam" />
            </div>
            <!--end::Col-->
          </div>
          <!--end::Input group-->
          <!--begin::Input group-->
          <div class="mb-15 fv-row">
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack">
              <!--begin::Label-->
              <div class="fw-bold me-5">
                <label class="fs-6">Notifications</label>
                <div class="fs-7 text-muted">Allow Notifications by Phone or Email</div>
              </div>
              <!--end::Label-->
              <!--begin::Checkboxes-->
              <div class="d-flex align-items-center">
                <!--begin::Checkbox-->
                <label class="form-check form-check-custom form-check-solid me-10">
                  <input class="form-check-input h-20px w-20px" type="checkbox" name="communication[]" value="email" checked="checked" />
                  <span class="form-check-label fw-bold">Email</span>
                </label>
                <!--end::Checkbox-->
                <!--begin::Checkbox-->
                <label class="form-check form-check-custom form-check-solid">
                  <input class="form-check-input h-20px w-20px" type="checkbox" name="communication[]" value="phone" />
                  <span class="form-check-label fw-bold">Phone</span>
                </label>
                <!--end::Checkbox-->
              </div>
              <!--end::Checkboxes-->
            </div>
            <!--end::Wrapper-->
          </div>
          <!--end::Input group-->
          <!--begin::Actions-->
          <div class="text-center">
            <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button>
            <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
              <span class="indicator-label">Submit</span>
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
