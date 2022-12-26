

<!--begin::Modal - Customers - Add-->
<div class="modal fade" id="productStatusModal" tabindex="-1" aria-hidden="true" >
  <!--begin::Modal dialog-->
  <div class="modal-dialog modal-dialog-centered mw-650px">
    <!--begin::Modal content-->
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
              <select id="durum" name="durum"   data-control="select2" onchange="selectdurum()" data-dropdown-parent="#productStatusModal" class="form-select form-select-solid fw-bolder">
                <option value=""></option>
                <option value="Satışta">Satışta</option>
                <option value="Taslak">Taslak</option>
                <option value="Pasif">Pasif</option>
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
          <button type="button"  onclick="ajaxPost(2)" class="btn btn-primary">
            <span class="indicator-label">Submit</span>
          </button>
          <!--end::Button-->
        </div>
        <!--end::Modal footer-->
      </form>
      <!--end::Form-->
    </div>
  </div>
</div>

<script type="text/javascript">
function selectdurum(){
  var e = document.getElementById("durum");
  var value = e.value;
  var text = e.options[e.selectedIndex].text;

  data[1] = value;    //pazaryeri Seçimi
    localStorage.setItem('modal', JSON.stringify(data));
}
function addProductId(id){
  data.push(id);    
    localStorage.setItem('productCheckboxList', JSON.stringify(data));
}
</script>
