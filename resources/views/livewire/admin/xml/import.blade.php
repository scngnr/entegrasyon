<div>
  <!--begin::Content-->
  <div class="content d-flex flex-column flex-column-fluid " id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
      <!--begin::Products-->
      <div class="card card-flush">
        <!--begin::Card header-->
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
          <!--begin::Card title-->
          <div class="card-title">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
              <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
              <span class="svg-icon svg-icon-1 position-absolute ms-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                  <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                </svg>
              </span>
              <!--end::Svg Icon-->
              <input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Xml Ara" />
            </div>
            <!--end::Search-->
          </div>
          <!--end::Card title-->
          <!--begin::Card toolbar-->
          <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
            <div class="w-100 mw-150px">
              <!--begin::Select2-->
              <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Xml Durumu" data-kt-ecommerce-product-filter="status">
                <option></option>
                <option value="all">Tümü</option>
                <option value="published">Aktif</option>
                <option value="scheduled">Pasif</option>
              </select>
              <!--end::Select2-->
            </div>
            <!--begin::Add product-->
            <a href="../../demo3/dist/apps/ecommerce/catalog/add-product.html" class="btn btn-primary">Yeni Xml Ekle</a>
            <!--end::Add product-->
          </div>
          <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0 overflow-auto" style="max-height:450px">
          <!--begin::Table-->
          <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
            <!--begin::Table head-->
            <thead>
              <!--begin::Table row-->
              <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                <th class="w-10px pe-2">
                  <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_products_table .form-check-input" value="1" />
                  </div>
                </th>
                <th class="min-w-100">XML ADI</th>
                <th class="text-end min-w-150px">ÜRÜN ADETİ</th>
                <th class="text-end min-w-150px">DURUM</th>
                <th class="text-end min-w-150px">İŞLEMLER</th>
              </tr>
              <!--end::Table row-->
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody class="fw-bold text-gray-600">
              @foreach($allXml as $xml)
                  <!--begin::Table row-->
                  <tr>
                    <!--begin::Checkbox-->
                    <td><div class="form-check form-check-sm form-check-custom form-check-solid"><input class="form-check-input" type="checkbox" value="1" /></div></td>
                    <td><a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bolder" data-kt-ecommerce-product-filter="product_name">{{$xml->xmlAdi}}</a></td>
                    <!--end::Category=-->
                    <!--begin::Qty=-->
                    <td class="text-end pe-0" data-order="1"><span class="fw-bolder ms-3">{{$xml->xmlUrunAdet}}</span></td>
                    <!--end::Qty=-->
                    <!--begin::Status=-->
                    <td class="text-end pe-0" data-order="Scheduled"><div class="badge badge-light-success"></div>{{$xml->xmlDurum}}</td>
                    <!--end::Status=-->
                    <!--begin::Action=-->
                    <td class="text-end">
                      <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                      <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                      <span class="svg-icon svg-icon-5 m-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                          <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                        </svg>
                      </span>
                      <!--end::Svg Icon--></a>
                      <!--begin::Menu-->
                      <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                          <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                          <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                        </div>
                        <!--end::Menu item-->
                      </div>
                      <!--end::Menu-->
                    </td>
                    <!--end::Action=-->
                  </tr>
                  <!--end::Table row-->
              @endforeach
            </tbody>
            <!--end::Table body-->
          </table>
          <!--end::Table-->
        </div>
        <!--end::Card body-->
      </div>
      <!--end::Products-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::Content-->



  {{-- Xml Ekle Modal start--}}
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yeni Xml Ekle</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/ayarlar/xml/xmladd" method="post">
            @csrf
            <div class="form-group">
              <label for="xmlAdi" class="col-form-label">Xml Adı:</label>
              <input type="text" class="form-control" name="xmlAdi" id="xmlAdi">
            </div>
            <div class="form-group">
              <label for="xmlLinki" class="col-form-label">Xml Linki:</label>
              <input type="text" class="form-control" name="xmlLinki" id="xmlLinki">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Gönder</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
  {{-- Xml Ekle Modal end --}}


</div>
