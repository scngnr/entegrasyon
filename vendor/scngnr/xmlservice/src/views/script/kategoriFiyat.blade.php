<?php $allCategory =  Scngnr\Xmlservice\Models\XmlKategori::paginate(75); ?>
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
  <!--begin::Container-->
  <div class="container-xxl" id="kt_content_container">
    <!--begin::Category-->
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
            <input type="text" data-kt-ecommerce-category-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Category" />
          </div>
          <!--end::Search-->
        </div>
        <!--end::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
          <!--begin::Add customer-->
          <a href="../../demo3/dist/apps/ecommerce/catalog/add-category.html" class="btn btn-primary">Add Category</a>
          <!--end::Add customer-->
        </div>
        <!--end::Card toolbar-->
      </div>
      <!--end::Card header-->
      <!--begin::Card body-->
      <div class="card-body pt-0">
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5">
          <!--begin::Table head-->
          <thead>
            <!--begin::Table row-->
            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
              <th class="w-10px pe-2">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                  <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_category_table .form-check-input" value="1" />
                </div>
              </th>
              <th class="min-w-250px">kategori </th>
              <th class="min-w-150px">ürün sayısı</th>
              <th class="text-end min-w-70px">Actions</th>
            </tr>
            <!--end::Table row-->
          </thead>
          <!--end::Table head-->
          <!--begin::Table body-->
          <tbody class="fw-bold text-gray-600">
            @foreach($allCategory as $category)
            <!--begin::Table row-->
                                <?php $thumbnail = Scngnr\Product\Models\en_product::where('category', 'LIKE',  '%' . $category->categoryAdi . '%')->first(); ?>
                                <?php $thumbnail2 = Scngnr\Product\Models\en_product::where('category', 'LIKE',  '%' . $category->categoryAdi . '%')->get(); ?>

            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Category=-->
              <td>
                <div class="d-flex">
                  <!--begin::Thumbnail-->
                  <a href="../../demo3/dist/apps/ecommerce/catalog/edit-category.html" class="symbol symbol-50px">



                  </a>
                  <!--end::Thumbnail-->
                  <div class="ms-5">
                    <!--begin::Title-->
                    <a href="" class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1" data-kt-ecommerce-category-filter="category_name">{{$category->categoryAdi}}</a>
                    <!--end::Title-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7 fw-bolder">{{$category->categoryName}}</div>
                    <!--end::Description-->
                  </div>
                </div>
              </td>
              <!--end::Category=-->
              <!--begin::Type=-->
              <td>
                <!--begin::Badges-->
                <div class="badge badge-light-success">{{count($thumbnail2)}}</div>
                <!--end::Badges-->
              </td>
              <!--end::Type=-->
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
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-200px py-4" data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="../../demo3/dist/apps/ecommerce/catalog/add-category.html" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a type="button" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer" onclick="formAction('{{$product->id}}')">Pazaryeri Fiyat Ekle</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-ecommerce-category-filter="delete_row">Delete</a>
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
        {{$allCategory->links()}}
      </div>
      <!--end::Card body-->
    </div>
    <!--end::Category-->
  </div>
  <!--end::Container-->
</div>
<!--end::Content-->

@include('view::script.kategoriFiyatModal')
<script type="text/javascript">

function addProductId(id){
    data.push(id);
    localStorage.setItem('productCheckboxList', JSON.stringify(data));
}

</script>
