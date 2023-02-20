
  <div class="w-100">
    <!--begin::Heading-->
    <div class="pb-10 pb-lg-15">
      <!--begin::Title-->
      <h2 class="fw-bolder text-dark">Kategori Seçimi</h2>
      <!--end::Title-->
    </div>
    <!--end::Heading-->
    <!--begin::Input group-->
    <div class="mb-10 fv-row">
      <!--begin::Label-->
      <label class="form-label mb-3">Kategori Adı Giriniz</label>
      <!--end::Label-->
      <!--begin::Input-->
      <input wire:model="searchValues" type="text" class="form-control form-control-lg form-control-solid" placeholder="" />
      <!--end::Input-->
    </div>
    <!--end::Input group-->
    {{$selectedCategory}}
    <!--begin::Input group-->
    <div class="mb-0 fv-row">
      <!--begin::Table-->
      <table class="table align-middle table-row-dashed fs-6 gy-5" >
        <!--begin::Table head-->
        <thead>
          <!--begin::Table row-->
          <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
            <th class="min-w-70px">Kategori Id</th>
            <th class="min-w-70px">Kategori Adı</th>
          </tr>
          <!--end::Table row-->
        </thead>
        <!--end::Table head-->
        <tbody id="tbody"class="fw-bold text-gray-600">

          @foreach($allKategori as $category)
            <tr>
              <td wire:click="kategori({{$category->categoryId}})"> {{$category->categoryId}}</td>
              <td> {{$category->categoryName}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <!--end::Table-->
    </div>
    <!--end::Input group-->
  </div>
  <!--end::Wrapper-->
