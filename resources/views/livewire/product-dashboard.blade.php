
<div >
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <div class="content d-flex flex-column flex-column-fluid" >
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
              <input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Ürün Ara" wire:model="searchProduct"/>
            </div>
            <!--end::Search-->
          </div>
          <!--end::Card title-->
          <!--begin::Card toolbar-->
          <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
            <div class="w-100 mw-150px">
              <!--begin::Select2-->
              <select class="form-select form-select-solid" >
                <option></option>
                <option value="25" >All</option>
                <option value="41" wire:model="paginate">41</option>
                <option value="37" wire:model="paginate">Scheduled</option>
                <option value="55" wire:model="paginate">Inactive</option>
              </select>
              <!--end::Select2-->
            </div>
            <!--begin::Add product-->
            <a href="/product/add" class="btn btn-primary">Yeni Ürün Ekle</a>
            <!--end::Add product-->
          </div>
          <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
          <!--begin::Table-->
          <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
            <!--begin::Table head-->
            <thead>
              <!--begin::Table row-->
              <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                <th class="w-10px pe-2">
                  <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_products_table .form-check-input" value="1" id="a1" />
                  </div>
                </th>
                <th class="min-w-70px">durum</th>
                <th class=" min-w-300px">ürün</th>
                <th class="text-center min-w-70px">sku</th>
                <th class="text-center min-w-70px">qty</th>
                <th class="text-center min-w-70px">fiyatı</th>
                <th class="text-center min-w-70px">Pazaryeri Fiyatı</th>
                <th class="text-center min-w-70px">Actions</th>
              </tr>
              <!--end::Table row-->
            </thead>
            <!--end::Table head-->
            <tbody class="fw-bold text-gray-600">
              <!--begin::Table row-->
              @foreach($allProduct as $product)
                  <tr>
                    <!--begin::Checkbox-->
                    <td>
                      <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" onchange="val('{{$product->id}}')" value="1" name="product[]" id="{{$product->id}}"/>
                      </div>
                    </td>
                    <!--end::Checkbox-->
                    <!--begin::Status=-->
                    <td class="text-center pe-0" data-order="Scheduled">
                        @if($product->status == 'Satışta')
                          <div class="badge badge-light-primary">
                            {{$product->status}}
                          </div>
                          @elseif($product->status == 'Taslak')
                            <div class="badge badge-light-warning">
                              {{$product->status}}
                            </div>
                            @elseif($product->status == 'Pasif')
                              <div class="badge badge-light-danger">
                                {{$product->status}}
                              </div>
                        @endif
                    </td>
                    <!--end::Status=-->
                    <!--begin::Category=-->
                    <td><div class="d-flex align-items-center"><a href="/product/{{$product->id}}" class="symbol symbol-50px"><span class="symbol-label" style="background-image:url({{$product->pictures}});"></span></a><div class="ms-5"><a href="/product/edit/{{$product->id}}" class="text-gray-800 text-hover-primary fs-5 fw-bolder" data-kt-ecommerce-product-filter="product_name">{{$product->name}}</a></div></div></td>
                    <!--end::Category=-->
                    <!--begin::SKU=-->
                    <td class="text-center pe-0"><span class="fw-bolder">{{$product->stockCode}}</span></td>
                    <!--end::SKU=-->
                    <!--begin::Qty=-->
                    <td class="text-center pe-0" data-order="{{$product->stock}}"><span class="badge badge-light-warning">Low stock</span><span class="fw-bolder text-warning ms-3">{{$product->stock}}</span></td>
                    <!--end::Qty=-->
                    <!--begin::Price=-->
                    <td class="text-center pe-0"><span class="fw-bolder text-dark">{{$product->price}}</span></td>
                    <!--end::Price=-->
                    <!--begin::Rating-->
                    <td class="text-end pe-0 overflow-auto" data-order="rating-5">
                      <div class="d-flex gap-2 mb-2">
                        @include('view::scripts.newproductTablePazaryeriDropDownFiyatList')
                      </div>
                    </td>
                    <!--end::Rating-->
                    <!--begin::Action=-->
                    <td class="text-center">
                      <a href="" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <i class="bi bi-three-dots fs-3"></i>
                      </a>
                      <!--begin::Menu-->
                      <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-200px py-4" data-kt-menu="true">


                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                          <a type="button" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer" onclick="price('{{$product->id}}')">Ürünleri Eşleştir</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                          <a type="button" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer" onclick="price('{{$product->id}}')">Kategori Eşleştir</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                          <a type="button" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer" onclick="price('{{$product->id}}')">Pazaryeri Fiyat Ekle</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                          <a type="button" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#productStatusModal" onclick="productDurumModal('{{$product->id}}', '{{$product->status}}')">Ürün Durum Değiştir</a>

                        </div>
                        <!--end::Menu item-->
                        <hr>
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                          <a href="/product/edit/{{$product->id}}" class="menu-link px-3">Düzenle</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                          <a href="/xmlservice" class="menu-link px-3 m-auto" data-kt-ecommerce-product-filter="delete_row" disabled>Sil</a>
                        </div>
                        <!--end::Menu item-->
                      </div>
                      <!--end::Menu-->
                    </td>
                    <!--end::Action=-->
                  </tr>

              @endforeach
              <!--end::Table row-->
            </tbody>
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

@include('view::scripts.fiyatModal')
@include('view::scripts.durumModal')
<script type="text/javascript">
function val(vals){
  if($('#'+vals).prop('checked')){
    console.log('checkbox '+ vals + 'true');
  }else {
    console.log('checkbox '+ vals + 'false');

  }

}
</script>
</div>
