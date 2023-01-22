<div>
  <!--end::Header-->
  <!--begin::Content-->
  <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
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
              <input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Order" />
            </div>
            <!--end::Search-->
          </div>
          <!--end::Card title-->
          <!--begin::Card toolbar-->
          <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
            <!--begin::Flatpickr-->
            <div class="input-group w-250px">
              <input class="form-control form-control-solid rounded rounded-end-0" placeholder="Pick date range" id="kt_ecommerce_sales_flatpickr" />
              <button class="btn btn-icon btn-light" id="kt_ecommerce_sales_flatpickr_clear">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                <span class="svg-icon svg-icon-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="black" />
                    <rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="black" />
                  </svg>
                </span>
                <!--end::Svg Icon-->
              </button>

            </div>
            <!--end::Flatpickr-->
            <div class="w-100 mw-150px">
              <!--begin::Select2-->
              <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-order-filter="status">
                <option></option>
                <option value="all">All</option>
                <option value="Cancelled" >Cancelled</option>
                <option value="Completed">Completed</option>
                <option value="Denied">Denied</option>
                <option value="Expired">Expired</option>
                <option value="Failed">Failed</option>
                <option value="Pending">Pending</option>
                <option value="Processing">Processing</option>
                <option value="Refunded">Refunded</option>
                <option value="Delivered">Delivered</option>
                <option value="Delivering">Delivering</option>
              </select>
              <!--end::Select2-->
            </div>
            <!--begin::Add product-->
            <a href="../../demo3/dist/apps/ecommerce/catalog/add-product.html" class="btn btn-primary">Add Order</a>
            <!--end::Add product-->
          </div>
          <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0 overflow-auto" style="max-height:350px">
          <!--begin::Table-->
          <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_sales_table">
            <!--begin::Table head-->
            <thead>
              <!--begin::Table row-->
              <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                <th class="w-10px pe-2">
                  <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_sales_table .form-check-input" value="1" />
                  </div>
                </th>
                <th class="min-w-100px">Sipariş No</th>
                <th class="min-w-175px">Müşteri Adı</th>
                <th class="text-end min-w-70px">Sipariş Durumu</th>
                <th class="text-end min-w-70px">Sipariş Kanalı</th>
                <th class="text-end min-w-100px">Paket Tutarı</th>
                <th class="text-end min-w-150px">Eklenme Tarihi</th>
                <th class="text-end min-w-100px">Actions</th>
              </tr>
              <!--end::Table row-->
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody class="fw-bold text-gray-600">
              @foreach($orders as $order)
              <!--begin::Table row-->
              <?php $arrayOrder = json_decode($order->faturaBilgi, true);  ?>
              <?php //print_r($arrayOrder) ?>
              <tr>
                <!--begin::Checkbox-->
                <td>
                  <div class="form-check form-check-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" value="1" />
                  </div>
                </td>
                <!--end::Checkbox-->
                <!--begin::Order ID=-->
                <td data-kt-ecommerce-order-filter="order_id">
                  <a href="/orders/orderdetail/{{$order->id}}" class="text-gray-800 text-hover-primary fw-bolder">

                    <?php switch ($order->pazaryeri) {
                      case 'N11': echo $arrayOrder['orderDetail']['orderNumber']; break;
                      case 'trendyol': echo $arrayOrder['orderNumber']; break;
                      case 'Hepsiburada': echo $order->siparisNo; break;
                    } ?>                    
                  </a>
                </td>
                <!--end::Order ID=-->
                <!--begin::Customer=-->
                <td>
                  <div class="d-flex align-items-center">
                    <!--begin:: Avatar -->
                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                      <a href="#">
                        <div class="symbol-label fs-3 bg-light-info text-info"><?php   switch ($order->pazaryeri) {
                          case 'N11': echo substr($order->customerName, 0, 1); break;
                          case 'trendyol': echo substr($order->customerName, 0, 1); break;
                          case 'Hepsiburada': echo substr($order->customerName, 0, 1); break;
                        } ?></div>
                      </a>
                    </div>
                    <!--end::Avatar-->
                    <div class="ms-5">
                      <!--begin::Title-->
                      <a href="/orders/orderdetail/{{$order->id}}" class="text-gray-800 text-hover-primary fs-5 fw-bolder">
                        {{$order->customerName}}

                      </a>
                      <!--end::Title-->
                    </div>
                  </div>
                </td>
                <!--end::Customer=-->
                <!--begin::Status=-->
                <td class="text-end pe-0" data-order="Refunded">
                  <!--begin::Badges-->
                  <div class="badge badge-light-info">
                    @if($order->pazaryeri == 'N11')
                      @if(array_key_exists(0, $arrayOrder['orderDetail']['itemList']['item'] ))
                          <?php
                          switch ($arrayOrder['orderDetail']['itemList']['item'][0]['status']) {
                            case 1: echo "İşlem Bekliyor";break;
                            case 2: echo "Yeni Sipariş";break;
                            case 3: echo "Geçersiz İşlem";break;
                            case 4: echo "İptal edilmiş";break;
                            case 5: echo "Kargo bekliyor";break;
                            case 6: echo "Kargoda";break;
                            case 7: echo "Teslim edilmiş";break;
                            case 8: echo "Red edilmiş";break;
                            case 9: echo "İade edilmiş";break;
                            case 10:echo 'Tamamlandı';break;
                          }
                          ?>
                        @else
                        <?php
                        switch ($arrayOrder['orderDetail']['itemList']['item']['status']) {
                          case 1: echo "İşlem Bekliyor";break;
                          case 2: echo "Yeni Sipariş";break;
                          case 3: echo "Geçersiz İşlem";break;
                          case 4: echo "İptal edilmiş";break;
                          case 5: echo "Kargo bekliyor";break;
                          case 6: echo "Kargoda";break;
                          case 7: echo "Teslim edilmiş";break;
                          case 8: echo "Red edilmiş";break;
                          case 9: echo "İade edilmiş";break;
                          case 10:echo 'Tamamlandı';break;
                        }
                        ?>
                      @endif
                    @elseif($order->pazaryeri == 'trendyol')
                      <?php $historiesCount = count($arrayOrder['packageHistories']); ?>
                      <?php //print_r($arrayOrder['packageHistories']) ?>
                      <?php
                      switch ($arrayOrder['packageHistories'][$historiesCount-1]['status']) {
                        case 1: echo "İşlem Bekliyor";break;
                        case 'Created': echo "Yeni Sipariş";break;
                        case 3: echo "Geçersiz İşlem";break;
                        case 4: echo "İptal edilmiş";break;
                        case 'Picking': echo "Kargo bekliyor";break;
                        case 'Shipped': echo "Kargoda";break;
                        case 'Delivered': echo "Teslim edilmiş";break;
                        case 8: echo "Red edilmiş";break;
                        case 9: echo "İade edilmiş";break;
                        case 10:echo 'Tamamlandı';break;
                      }
                      ?>
                      @elseif($order->pazaryeri == 'Hepsiburada')
                      Databaseden alınıcak
                    @endif
                  </div>
                  <!--end::Badges-->
                </td>
                <!--end::Status=-->
                <!--begin::Date Added=-->
                <td class="text-end text-align-center" data-order="2021-12-25">
                  @if($order->pazaryeri == 'N11') <span class="badge badge-light-danger">{{$order->pazaryeri}}</span> @elseif($order->pazaryeri == 'trendyol') <span class="badge badge-light-warning">{{$order->pazaryeri}} @elseif($order->pazaryeri == 'Hepsiburada') <span class="badge badge-light-warning">{{$order->pazaryeri}} @endif
                </td>
                <!--end::Date Added=-->
                <!--begin::Total=-->
                <td class="text-end pe-0">
                  <span class="fw-bolder">₺
                    @if($order->pazaryeri == 'N11')
                      {{$arrayOrder['orderDetail']['billingTemplate']['originalPrice']}}
                    @elseif($order->pazaryeri == 'trendyol')
                      {{$arrayOrder['totalPrice']}}
                      @elseif($order->pazaryeri == 'Hepsiburada')
                      {{--dd(json_decode($order->faturaBilgi))--}}
                    @endif</span>
                </td>
                <!--end::Total=-->
                <!--begin::Date Modified=-->
                <td class="text-end" data-order="2021-12-30">
                  <span class="fw-bolder">
                  @if($order->pazaryeri == 'N11')
                    {{$arrayOrder['orderDetail']['createDate']}}
                  @elseif($order->pazaryeri == 'trendyol')
                    {{ \Carbon\Carbon::createFromTimestampMsUTC($arrayOrder['orderDate'])->format('Y-m-d H:i:s')  }}
                  @endif</span>
                </td>
                <!--end::Date Modified=-->
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
                      <a href="../../demo3/dist/apps/ecommerce/sales/details.html" class="menu-link px-3">View</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                      <a href="../../demo3/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">Edit</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                      <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                    </div>
                    <!--end::Menu item-->
                  </div>
                  <!--end::Menu-->
                </td>
                <!--end::Action=-->
              </tr>
              <!--begin::Table row-->
              @endforeach
            </tbody>
            <!--end::Table body-->
          </table>
          <!--end::Table-->
          {{$orders->links()}}
        </div>
        <!--end::Card body-->
      </div>
      <!--end::Products-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::Content-->
</div>
