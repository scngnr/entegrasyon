
<?php  $pazaryeriFiyatlar = \Scngnr\Product\Models\pazaryeri_fiyat::where('productId', $product->id)->get(); ; ?>
<?php $olusturulanMagzalar = []; $olusturulanPazaryeri = []; ?>


@for($i = 0; $i < count($pazaryeriFiyatlar); $i++)
<?php
        array_push($olusturulanMagzalar, $pazaryeriFiyatlar[$i]->magaza);
        $olusturulanMagzalar = array_unique($olusturulanMagzalar);
       ?>
@endfor

@for($i = 0; $i < count($olusturulanMagzalar); $i++)

  <div>
    <?php $findMagza = \Scngnr\Product\Models\pazaryeri_fiyat::where('magaza', $olusturulanMagzalar[$i])->get() ?>



        <i data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
          <?php
          try {
                switch ($findMagza[0]->pazaryeri) {
                  case 'woocommerce': echo "<span class=\"iconify\" data-icon=\"logos:woocommerce-icon\"></span>"; break;
                  case 'opencart': echo "<span class=\"iconify\" data-icon=\"la:opencart\"></span>"; break;
                  case 'magento': echo "<span class=\"iconify\" data-icon=\"simple-icons:magento\"></span>"; break;
                  case 'n11': echo "<span class=\"iconify\" data-icon=\"gridicons:product-downloadable\"></span>"; break;
                  case 'trendyol': echo "<span class=\"iconify\" data-icon=\"gridicons:product-external\"></span>"; break;
                  case 'hepsiburada': echo "<span class=\"iconify\" data-icon=\"gridicons:product-virtual\"></span>"; break;
                  case 'ciceksepeti': echo "<span class=\"iconify\" data-icon=\"icon-park:ad-product\"></span>"; break;
                  case 'lazimbana': echo "<span class=\"iconify\" data-icon=\"la:product-hunt\"></span>"; break;
                  case 'ideasoft': echo "<span class=\"iconify\" data-icon=\"ri:product-hunt-fill\"></span>"; break;
                  case 'instagram': echo "<span class=\"iconify\" data-icon=\"akar-icons:instagram-fill\"></span>"; break;
                }
              } catch (\Exception $e) {

              }
           ?>

        <!--end::Svg Icon--></i>

        <!--begin::Menu-->
      <!--begin::Menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-500px py-4 overflow-auto" data-kt-menu="true">

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
                      <!--begin::Card body-->
                      <div class="card-body pt-0">
                      <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5 overflow-auto" id="kt_ecommerce_products_table">
                          <!--begin::Table head-->
                          <thead>
                          <!--begin::Table row-->
                          <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th class="text-center w-200px">Pazaryeri Fiyatı</th>
                            <th class="text-center w-200px">Fiyat</th>
                            <th class="text-center w-200px">Durum</th>
                          </tr>
                          <!--end::Table row-->
                        </thead>
                          <!--end::Table head-->
                          <!--begin::Table body-->
                          <tbody class="fw-bold text-gray-600">
                          @foreach($findMagza as $pF)
                              @if($product->id == $pF->productId)
                                  <!--begin::Table row-->
                                  <tr>
                                    <!--begin::Category=-->
                                    <td>
                                      <div class="d-flex align-items-center">
                                        <div class="ms-5">
                                          <!--begin::Title-->
                                          <a href="" class="text-gray-800 text-hover-primary fs-5 fw-bolder" data-kt-ecommerce-product-filter="product_name">{{$pF->magaza}}</a>
                                          <!--end::Title-->
                                        </div>
                                      </div>
                                    </td>
                                    <!--end::Category=-->
                                    <!--begin::SKU=-->
                                    <td class="text-center pe-0">
                                      <span class="fw-bolder">{{$pF->fiyat}}</span>
                                    </td>
                                    <!--end::SKU=-->
                                    <!--begin::SKU=-->
                                    <td class="form-check form-switch form-check-custom form-check-solid pe-0">
                                      <!--begin::Switch-->
                                        <input id="{{$pF->id}}" class="form-check-input" type="checkbox" value="1" {{$pF->status}} />
                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

                                        <script type="text/javascript">
                                        $("#{{$pF->id}}").change(function() {
                                          if(this.checked) {

                                            $.ajax({
                                              type: "get",
                                              url: "product/check/status/{{$pF->id}}/checked",
                                              success: function(data){

                                              for (var i = 0; i < data.length; i++) {
                                                selector = "#"+ data[i]['id'];
                                                if(data[i]['status'] == 'checked'){
                                                  $(selector).prop('checked', true);
                                                }else {
                                                  $(selector).prop('checked', false);
                                                }
                                              }
                                           }
                                            });
                                          }else {
                                            $.ajax({
                                              type: "get",
                                              url: "product/check/status/{{$pF->id}}/NULL",
                                              success: function(data){

                                              for (var i = 0; i < data.length; i++) {
                                                selector = "#"+ data[i]['id'];
                                                if(data[i]['status'] == 'checked'){
                                                  $(selector).prop('checked', true);
                                                }else {
                                                  $(selector).prop('checked', false);
                                                }
                                              }
                                              console.log(data);
                                           }
                                            });
                                          }
                                        });
                                        </script>
                                    </td>
                                    <!--end::SKU=-->
                                  </tr>
                                  <!--end::Table row-->
                              @endif
                          @endforeach
                        </tbody>
                          <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!--end::Menu-->
  </div>

@endfor
