<div >
  <!--begin::Content-->
  <div class="content d-flex flex-column flex-column-fluid " id="kt_content" >
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container" >
      <!--begin::Products-->
      <div class="card card-flush " >
        <!--begin::Card header-->
        <div class="card-header align-items-center py-5 gap-2 gap-md-5"   >
          <!--begin::Card title-->
          <div class="card-title" wire:loading.class="overlay overlay-block">
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
              <input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-150px ps-14" placeholder="Ürün arama" wire:model=searchProduct>


            </div>
            <!--end::Search-->

          </div>
          <!--end::Card title-->
          <!--begin::Trigger-->
          <button type="button" class="btn btn-primary"
              data-kt-menu-trigger="click"
              data-kt-menu-placement="bottom-start">
              kategoriler
          </button>
          <!--end::Trigger-->

          <!--begin::Menu-->
          <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-200px py-4" data-kt-menu="true">
              <!--begin::Menu item-->


              @for($i = 0; $i< count($parentkategoriler); $i++)
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-link px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                        {{$parentkategoriler[$i]->categoryAdi}}
                        <span class="svg-icon svg-icon-5 rotate-180 ms-auto me-0">...</span>
                    </div>

                    <!--begin::Menu-->

                      <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-200px py-4"
                          data-kt-menu="true">
                          <div class="menu-item px-3">
                              <div class="menu-link px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                  {{$parentkategoriler[$i]->categoryAdi}}
                                  <span class="svg-icon svg-icon-5 rotate-180 ms-auto me-0">...</span>
                              </div>

                              <!--begin::Menu-->

                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-200px py-4"
                                    data-kt-menu="true">
                                    @for($j = 0; $j < count($kategoriler); $j++ )
                                      @if($parentkategoriler[$i]->categoryAdi == $kategoriler[$j]->parentCategory)
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-link px-3">

                                              {{$kategoriler[$j]->categoryAdi}}
                                        </div>
                                    </div>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-200px py-4"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
              1
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                                  @endfor


                                </div>
                              <!--end::Menu-->
                          </div>


                      </div>
                    <!--end::Menu-->
                </div>
                <!--end::Menu item-->
              @endfor
              <!--end::Menu item-->

          </div>
          <!--end::Menu-->
          <!--begin::Card toolbar-->
          <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
            <div class="w-50 mw-100px  mr-20">
              <!--begin::Select2-->
              <select class="form-select form-select-solid form-control" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-product-filter="status">
                <option value="all" selected>Tümü</option>
                <option value="published">Published</option>
                <option value="scheduled">Scheduled</option>
                <option value="inactive">Inactive</option>
              </select>
              <!--end::Select2-->
            </div>

            <div class="dropdown">
              <button class="btn btn-light-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Sayfalama
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a class="dropdown-item" wire:click=paginates(25)>25</a>
                <a class="dropdown-item" wire:click=paginates(50)>50</a>
                <a class="dropdown-item" wire:click=paginates(75)>75</a>
                <a class="dropdown-item" wire:click=paginates(100)>100</a>
              </div>
            </div>
            <!--begin::select toplu işlem-->
            <div class="dropdown">
              <button class="btn btn-light-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" @if(!$selectedCheckBox) disabled @endif>
                Toplu İşlemler
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a class="dropdown-item" href="product/kategorieslestirme/{{base64_encode(base64_encode(json_encode($selectedCheckBox)))}}" wire:submit >N11 Kategori Eşleştir</a>
                <a class="dropdown-item" href="tests/{{base64_encode(base64_encode(json_encode($selectedCheckBox)))}}" wire:submit >Fiyat Değiştir</a>
              </div>
            </div>
            <!--end::Add product-->
            <!--begin::Add product-->
            <button class="btn btn-light-primary" >Yeni Ürün Ekle</button>
            <!--end::Add product-->
          </div>

          <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0 overflow-auto" style="max-height:350px">
          <!--begin::Table-->
          <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table" wire:loading.class="overlay-layer bg-dark bg-opacity-5">
            <!--begin::Table head-->
            <thead>
              <!--begin::Table row-->
              <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0 ">
                <th class="w-10px pe-2">
                  <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_products_table .form-check-input" wire:click=allSelect() />
                  </div>
                </th>
                <th class="min-w-100">ÜRÜN ADI</th>
                <th class="text-end min-w-100px">SKU</th>
                <th class="text-end min-w-50px">ADET</th>
                <th class="text-end min-w-100px">FIYAT</th>
                <th class="text-end min-w-100px">DURUM</th>
                <th class="text-end min-w-70px">İŞLEMLER</th>
              </tr>
              <!--end::Table row-->
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody class="fw-bold text-gray-600 ">
              @foreach($allProduct as $product)
                  <!--begin::Table row-->
                  <tr>
                    <!--begin::Checkbox-->
                    <td><div class="form-check form-check-sm form-check-custom form-check-solid"><input class="form-check-input" type="checkbox" value="{{$product->id}}" wire:model=selectedCheckBox /></div></td>
                    <td>
                      <div class="d-flex align-items-center">
                        <!--begin::Thumbnail-->
                        <a href="#" class="symbol symbol-50px">
                          <span class="symbol-label" style="background-image:url({{$product->resim}});"></span>
                        </a>
                        <!--end::Thumbnail-->
                        <div class="ms-5">
                          <!--begin::Title-->
                          <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bolder" data-kt-ecommerce-product-filter="product_name">{{$product->adi}}</a>
                          <!--end::Title-->
                        </div>
                      </div>
                    </td>
                    <!--end::Category=-->
                    <!--begin::SKU=-->
                    <td class="text-end pe-0">
                      <span class="fw-bolder">{{$product->stokCode}}</span>
                    </td>
                    <!--end::SKU=-->
                    <!--begin::Qty=-->
                    <td class="text-end pe-0" data-order="1">
                    @if($product->stok > 10 )
                      <span class="fw-bolder ms-3">{{$product->stok}}</span>                <!-- Stok 10 üzerinde ise normal göster-->
                    @elseif(($product->stok > 5) && $product->stok < 10)
                      <span class="fw-bolder text-warning ms-3">{{$product->stok}}</span>   <!-- Stok 10'dan küçük 5'in üzerinde ise sarı uyarıda göster-->
                      @elseif(($product->stok < 5))
                        <span class="fw-bolder text-danger ms-3">{{$product->stok}}</span>  <!-- Stok 5 altında ise danger ile göster-->
                    @endif
                    </td>
                    <!--end::Qty=-->
                    <!--begin::Price=-->
                    <td class="text-end pe-0">
                      <span class="fw-bolder text-dark">${{$product->fiyati}}</span>
                    </td>
                    <!--end::Price=-->
                    <!--begin::Status=-->
                    <td class="text-end pe-0" data-order="Scheduled">
                      <!--begin::Badges-->
                      <div class="badge badge-light-success">Aktif</div>
                      <!--end::Badges-->
                    </td>
                    <!--end::Status=-->
                    <!--begin::Action=-->
                    <td class="text-end">
                      <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">işlem Seç
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
          {{$allProduct->links()}}
          <!--end::Table-->
        </div>
        <!--end::Card body-->
      </div>
      <!--end::Products-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::Content-->
</div>
