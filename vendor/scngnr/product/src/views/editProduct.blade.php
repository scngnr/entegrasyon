
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
  <!--begin::Container-->
  <div class="container-xxl" id="kt_content_container">
    <!--begin::Form-->
    <form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="/product">
      <!--begin::Aside column-->
      <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
        <!--begin::Thumbnail settings-->
        <div class="card card-flush py-4">
          <!--begin::Card header-->
          <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title">
              <h2>Ürün Resmi</h2>
            </div>
            <!--end::Card title-->
          </div>
          <!--end::Card header-->
          <!--begin::Card body-->
          <div class="card-body text-center pt-0">
            <!--begin::Image input-->
            <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true" style="">
              <!--begin::Preview existing avatar-->
              <div class="image-input-wrapper w-150px h-150px" style="background-image: url({{$product->pictures}})"></div>
              <!--end::Preview existing avatar-->
              <!--begin::Label-->
              <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                <i class="bi bi-pencil-fill fs-7"></i>
                <!--begin::Inputs-->
                <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                <input type="hidden" name="avatar_remove" />
                <!--end::Inputs-->
              </label>
              <!--end::Label-->
              <!--begin::Cancel-->
              <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                <i class="bi bi-x fs-2"></i>
              </span>
              <!--end::Cancel-->
              <!--begin::Remove-->
              <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                <i class="bi bi-x fs-2"></i>
              </span>
              <!--end::Remove-->
            </div>
            <!--end::Image input-->
            <!--begin::Description-->
            <div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
            <!--end::Description-->
          </div>
          <!--end::Card body-->
        </div>
        <!--end::Thumbnail settings-->
        <!--begin::Status-->
        <div class="card card-flush py-4">
          <!--begin::Card header-->
          <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title">
              <h2>Ürün Durumu</h2>
            </div>
            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
              <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
            </div>
            <!--begin::Card toolbar-->
          </div>
          <!--end::Card header-->
          <!--begin::Card body-->
          <div class="card-body pt-0">
            <!--begin::Select2-->
            <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="kt_ecommerce_add_product_status_select">
              <option></option>
              <option value="published" selected="selected">Satışta</option>
              <option value="draft">Taslak</option>
              <option value="inactive">Pasif</option>
            </select>
            <!--end::Select2-->
            <!--begin::Description-->
            <div class="text-muted fs-7">Ürün durumunu belirleyin.</div>
            <!--end::Description-->
          </div>
          <!--end::Card body-->
        </div>
        <!--end::Status-->
        <!--begin::Category & tags-->
        <div class="card card-flush py-4">
          <!--begin::Card header-->
          <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title">
              <h2>Ürün Deatyları</h2>
            </div>
            <!--end::Card title-->
          </div>
          <!--end::Card header-->
          <!--begin::Card body-->
          <div class="card-body pt-0">
            <!--begin::Input group-->
            <!--begin::Label-->
            <label class="form-label">Kategori seçin</label>
            <!--end::Label-->
            <!--begin::Select2-->
            <select class="form-select mb-2" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
              <option></option>
              @foreach($kategoriler as $kategori)
              <option value="{{$kategori->categoryAdi}}">{{$kategori->categoryAdi}}</option>
              @endforeach
            </select>
            <!--end::Select2-->
            <!--begin::Description-->
            <div class="text-muted fs-7 mb-7">Ürününüze bir kategori belirleyin.</div>
            <!--end::Description-->
            <!--end::Input group-->
            <!--begin::Button-->
            <a href="/product/category/add" class="btn btn-light-primary btn-sm mb-10">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
            <span class="svg-icon svg-icon-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
                <rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
              </svg>
            </span>
            <!--end::Svg Icon-->Yeni kategori oluştur</a>
            <!--end::Button-->
            <!--begin::Input group-->
            <!--begin::Label-->
            <label class="form-label d-block">Etiketler</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input id="kt_ecommerce_add_product_tags" name="kt_ecommerce_add_product_tags" class="form-control mb-2" value="" />
            <!--end::Input-->
            <!--begin::Description-->
            <div class="text-muted fs-7">Ürününüze bir etiket ekleyin</div>
            <!--end::Description-->
            <!--end::Input group-->
          </div>
          <!--end::Card body-->
        </div>
        <!--end::Category & tags-->
        <!--begin::Card widget 6-->
        <div class="card card-flush">
          <!--begin::Header-->
          <div class="card-header pt-5">
            <!--begin::Title-->
            <div class="card-title d-flex flex-column">
              <!--begin::Info-->
              <div class="d-flex align-items-center">
                <!--begin::Currency-->
                <span class="fs-4 fw-bold text-gray-400 me-1 align-self-start">$</span>
                <!--end::Currency-->
                <!--begin::Amount-->
                <span class="fs-2hx fw-bolder text-dark me-2 lh-1">2,420</span>
                <!--end::Amount-->
                <!--begin::Badge-->
                <span class="badge badge-success fs-6 lh-1 py-1 px-2 d-flex flex-center" style="height: 22px">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr067.svg-->
                <span class="svg-icon svg-icon-7 svg-icon-white ms-n1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.5" d="M13 9.59998V21C13 21.6 12.6 22 12 22C11.4 22 11 21.6 11 21V9.59998H13Z" fill="black" />
                    <path d="M5.7071 7.89291C5.07714 8.52288 5.52331 9.60002 6.41421 9.60002H17.5858C18.4767 9.60002 18.9229 8.52288 18.2929 7.89291L12.7 2.3C12.3 1.9 11.7 1.9 11.3 2.3L5.7071 7.89291Z" fill="black" />
                  </svg>
                </span>
                <!--end::Svg Icon-->2.6%</span>
                <!--end::Badge-->
              </div>
              <!--end::Info-->
              <!--begin::Subtitle-->
              <span class="text-gray-400 pt-1 fw-bold fs-6">Average Daily Sales</span>
              <!--end::Subtitle-->
            </div>
            <!--end::Title-->
          </div>
          <!--end::Header-->
          <!--begin::Card body-->
          <div class="card-body d-flex align-items-end px-0 pb-0">
            <!--begin::Chart-->
            <div id="kt_card_widget_6_chart" class="w-100" style="height: 80px"></div>
            <!--end::Chart-->
          </div>
          <!--end::Card body-->
        </div>
        <!--end::Card widget 6-->
        <!--begin::Template settings-->
        <div class="card card-flush py-4">
          <!--begin::Card header-->
          <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title">
              <h2>Product Template</h2>
            </div>
            <!--end::Card title-->
          </div>
          <!--end::Card header-->
          <!--begin::Card body-->
          <div class="card-body pt-0">
            <!--begin::Select store template-->
            <label for="kt_ecommerce_add_product_store_template" class="form-label">Select a product template</label>
            <!--end::Select store template-->
            <!--begin::Select2-->
            <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="kt_ecommerce_add_product_store_template">
              <option></option>
              <option value="default" selected="selected">Default template</option>
              <option value="electronics">Electronics</option>
              <option value="office">Office stationary</option>
              <option value="fashion">Fashion</option>
            </select>
            <!--end::Select2-->
            <!--begin::Description-->
            <div class="text-muted fs-7">Assign a template from your current theme to define how a single product is displayed.</div>
            <!--end::Description-->
          </div>
          <!--end::Card body-->
        </div>
        <!--end::Template settings-->
      </div>
      <!--end::Aside column-->
      <!--begin::Main column-->
      <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
        <!--begin:::Tabs-->
        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
          <!--begin:::Tab item-->
          <li class="nav-item">
            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_add_product_general">General</a>
          </li>
          <!--end:::Tab item-->
          <!--begin:::Tab item-->
          <li class="nav-item">
            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_advanced">Advanced</a>
          </li>
          <!--end:::Tab item-->
        </ul>
        <!--end:::Tabs-->
        <!--begin::Tab content-->
        <div class="tab-content">
          <!--begin::Tab pane-->
          <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
            <div class="d-flex flex-column gap-7 gap-lg-10">
              <!--begin::General options-->
              <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                  <div class="card-title">
                    <h2>General</h2>
                  </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                  <!--begin::Input group-->
                  <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="required form-label">Ürün Adı</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="product_name" class="form-control mb-2" placeholder="Ürün Adı" value="{{$product->name}}" />
                    <!--end::Input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Bir ürün adı gereklidir ve benzersiz olması önerilir.</div>
                    <!--end::Description-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  <div>
                    <!--begin::Label-->
                    <label class="form-label">Ürün Açıklama</label>
                    <!--end::Label-->
                    <!--begin::Editor-->
                    <div id="kt_ecommerce_add_product_description" name="kt_ecommerce_add_product_description" class="min-h-200px mb-2">{{$product->description}}</div>
                    <!--end::Editor-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Daha iyi görünürlük için ürün açıklamsı girin</div>
                    <!--end::Description-->
                  </div>
                  <!--end::Input group-->
                </div>
                <!--end::Card header-->
              </div>
              <!--end::General options-->
              <!--begin::Media-->
              <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                  <div class="card-title">
                    <h2>Media</h2>
                  </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                  <!--begin::Input group-->
                  <div class="fv-row mb-2">
                    <!--begin::Dropzone-->
                    @if($product->pictures)
                    @else
                    <div class="dropzone" id="kt_ecommerce_add_product_media">
                      <!--begin::Message-->
                      <div class="dz-message needsclick">
                        <!--begin::Icon-->
                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                        <!--end::Icon-->
                        <!--begin::Info-->
                        <div class="ms-4">
                          <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload. </h3>
                          <span class="fs-7 fw-bold text-gray-400">Upload up to 10 files</span>
                        </div>
                        <!--end::Info-->
                      </div>
                    </div>
                    @endif
                    <!--end::Dropzone-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Description-->
                  <div class="text-muted fs-7">Set the product media gallery.</div>
                  <!--end::Description-->
                </div>
                <!--end::Card header-->
              </div>
              <!--end::Media-->
              <!--begin::Pricing-->
              <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                  <div class="card-title">
                    <h2>Fiyatlandırma</h2>
                  </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                  <!--begin::Input group-->
                  <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="required form-label">Base fiyat</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="price" class="form-control mb-2" placeholder="Product price" value="{{$product->price}}" />
                    <!--end::Input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Ürün için bir fiyat girin.</div>
                    <!--end::Description-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Tax-->
                  <div class="d-flex flex-wrap gap-5">
                    <!--begin::Input group-->
                    <div class="fv-row w-100 flex-md-root">
                      <!--begin::Label-->
                      <label class="required form-label">Vergi sınıfı</label>
                      <!--end::Label-->
                      <!--begin::Select2-->
                      <select class="form-select mb-2" name="tax" data-control="select2" data-hide-search="true" data-placeholder="Select an option">
                        <option></option>
                        <option value="0">KDV YOK</option>
                        <option value="1" selected="selected">VERGİYE TABİ ÜRÜN</option>
                        <option value="2">DİJİTAL ÜRÜN</option>
                      </select>
                      <!--end::Select2-->
                      <!--begin::Description-->
                      <div class="text-muted fs-7">Ürün vergi sınıfını belirleyin.</div>
                      <!--end::Description-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row w-100 flex-md-root">
                      <!--begin::Label-->
                      <label class="form-label">KDV Oranı (%)</label>
                      <!--end::Label-->
                      <!--begin::Input-->
                      <input type="text" class="form-control mb-2" value="35" />
                      <!--end::Input-->
                      <!--begin::Description-->
                      <div class="text-muted fs-7">Ürün için Kdv Oranı belirleyin.</div>
                      <!--end::Description-->
                    </div>
                    <!--end::Input group-->
                  </div>
                  <!--end:Tax-->
                </div>
                <!--end::Card header-->
              </div>
              <!--end::Pricing-->
            </div>
          </div>
          <!--end::Tab pane-->
          <!--begin::Tab pane-->
          <div class="tab-pane fade" id="kt_ecommerce_add_product_advanced" role="tab-panel">
            <div class="d-flex flex-column gap-7 gap-lg-10">
              <!--begin::Inventory-->
              <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                  <div class="card-title">
                    <h2>Envanter</h2>
                  </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                  <!--begin::Input group-->
                  <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="required form-label">SKU</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="sku" class="form-control mb-2" placeholder="SKU Number" value="{{$product->stockCode}}" />
                    <!--end::Input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Ürün SKU'sunu girin.</div>
                    <!--end::Description-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="required form-label">Barcode</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="sku" class="form-control mb-2" placeholder="Barcode Number" value="{{$product->gtin}}" />
                    <!--end::Input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Ürün barkod numarasını girin.</div>
                    <!--end::Description-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="required form-label">Miktar</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <div class="d-flex gap-3">
                      <input type="number" name="shelf" class="form-control mb-2" placeholder="On shelf" value="24" />
                      <input type="number" name="warehouse" class="form-control mb-2" placeholder="Depodaki Miktar" />
                    </div>
                    <!--end::Input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Ürün miktarını girin.</div>
                    <!--end::Description-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  <div class="fv-row">
                    <!--begin::Label-->
                    <label class="form-label">Ön Siparişlere İzin Ver</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <div class="form-check form-check-custom form-check-solid mb-2">
                      <input class="form-check-input" type="checkbox" value="" />
                      <label class="form-check-label">EVET</label>
                    </div>
                    <!--end::Input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Müşterilerin stokta olmayan ürünleri satın almasına izin verin.</div>
                    <!--end::Description-->
                  </div>
                  <!--end::Input group-->
                </div>
                <!--end::Card header-->
              </div>
              <!--end::Inventory-->
              <!--begin::Shipping-->
              <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                  <div class="card-title">
                    <h2>Gönderim</h2>
                  </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                  <!--begin::Input group-->
                  <div class="fv-row">
                    <!--begin::Input-->
                    <div class="form-check form-check-custom form-check-solid mb-2">
                      <input class="form-check-input" type="checkbox" id="kt_ecommerce_add_product_shipping_checkbox" value="1" checked="checked" />
                      <label class="form-check-label">Bu fiziksel bir üründür.</label>
                    </div>
                    <!--end::Input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Ürünün fiziksel mi yoksa dijital bir öğe mi olduğunu ayarlayın. Fiziksel ürünler nakliye gerektirebilir.</div>
                    <!--end::Description-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Shipping form-->
                  <div id="kt_ecommerce_add_product_shipping" class="mt-10">
                    <!--begin::Input group-->
                    <div class="mb-10 fv-row">
                      <!--begin::Label-->
                      <label class="form-label">Ağırlık</label>
                      <!--end::Label-->
                      <!--begin::Editor-->
                      <input type="text" name="weight" class="form-control mb-2" placeholder="Product weight" value="4.3" />
                      <!--end::Editor-->
                      <!--begin::Description-->
                      <div class="text-muted fs-7">Ürün ağırlığını kilogram (kg) olarak ayarlayın.</div>
                      <!--end::Description-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row">
                      <!--begin::Label-->
                      <label class="form-label">Boyut</label>
                      <!--end::Label-->
                      <!--begin::Input-->
                      <div class="d-flex flex-wrap flex-sm-nowrap gap-3">
                        <input type="number" name="width" class="form-control mb-2" placeholder="Width (w)" value="12" />
                        <input type="number" name="height" class="form-control mb-2" placeholder="Height (h)" value="4" />
                        <input type="number" name="length" class="form-control mb-2" placeholder="Lengtn (l)" value="8.5" />
                      </div>
                      <!--end::Input-->
                      <!--begin::Description-->
                      <div class="text-muted fs-7">Ürün boyutlarını santimetre (cm) olarak girin.</div>
                      <!--end::Description-->
                    </div>
                    <!--end::Input group-->
                  </div>
                  <!--end::Shipping form-->
                </div>
                <!--end::Card header-->
              </div>
              <!--end::Shipping-->
              <!--begin::Meta options-->
              <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                  <div class="card-title">
                    <h2>Meta Seçenekleri</h2>
                  </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                  <!--begin::Input group-->
                  <div class="mb-10">
                    <!--begin::Label-->
                    <label class="form-label">Meta Etiket Başlığı</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control mb-2" name="meta_title" placeholder="Meta Etiket Adı" />
                    <!--end::Input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Bir meta etiket başlığı ayarlayın. Basit ve kesin anahtar kelimeler olması önerilir.</div>
                    <!--end::Description-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  <div class="mb-10">
                    <!--begin::Label-->
                    <label class="form-label">Meta Tag Açıklama</label>
                    <!--end::Label-->
                    <!--begin::Editor-->
                    <div id="kt_ecommerce_add_product_meta_description" name="kt_ecommerce_add_product_meta_description" class="min-h-100px mb-2"></div>
                    <!--end::Editor-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Artan SEO sıralaması için ürüne bir meta etiket açıklaması ayarlayın.</div>
                    <!--end::Description-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  <div>
                    <!--begin::Label-->
                    <label class="form-label">Meta Etiket Anahtar Kelimeleri</label>
                    <!--end::Label-->
                    <!--begin::Editor-->
                    <input id="kt_ecommerce_add_product_meta_keywords" name="kt_ecommerce_add_product_meta_keywords" class="form-control mb-2" />
                    <!--end::Editor-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Ürünün ilgili olduğu anahtar kelimelerin bir listesini ayarlayın.
                    Her bir anahtar kelimenin arasına virgül  <code>,</code> koyarak anahtar kelimeleri ayırın. </div>
                    <!--end::Description-->
                  </div>
                  <!--end::Input group-->
                </div>
                <!--end::Card header-->
              </div>
              <!--end::Meta options-->
            </div>
          </div>
          <!--end::Tab pane-->

        </div>
        <!--end::Tab content-->
        <div class="d-flex justify-content-end">
          <!--begin::Button-->
          <a href="/product" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
          <!--end::Button-->
          <!--begin::Button-->
          <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
            <span class="indicator-label">Save Changes</span>
            <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
          </button>
          <!--end::Button-->
        </div>
      </div>
      <!--end::Main column-->
    </form>
    <!--end::Form-->
  </div>
  <!--end::Container-->
</div>
<!--end::Content-->
