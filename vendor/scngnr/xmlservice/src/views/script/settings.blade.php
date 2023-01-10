<!--begin::Kategori Düzenlemeleri Tablosu-->
<div class="card card-flush mt-6 mt-xl-9">
  <!--begin::Card header-->
  <div class="card-header mt-5">
    <!--begin::Card title-->
    <div class="card-title flex-column">
      <h3 class="fs-6 text-gray-400">Kategori Düzenlemeleri</h3>
    </div>
    <div class="card-title flex-column">
      <a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">Ekle</a>
    </div>
    <!--begin::Card title-->
  </div>
  <!--end::Card header-->
  <!--begin::Card body-->
  <div class="card-body pt-0">
    <!--begin::Table container-->
    <div class="table-responsive">
      <!--begin::Table-->
      <table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
        <!--begin::Head-->
        <thead class="fs-7 text-gray-400 text-uppercase">
          <tr>
            <th class="min-w-250px">Düzenleme Açıklaması</th>
            <th class="min-w-150px">Tarih</th>
            <th class="min-w-90px">Status</th>
            <th class="min-w-50px text-end">Düzenle</th>
          </tr>
        </thead>
        <!--end::Head-->
        <!--begin::Body-->
        <tbody class="fs-6">
          <tr>
            <td>
              <!--begin::User-->
              <div class="d-flex align-items-center">
                <!--begin::Info-->
                <div class="d-flex flex-column justify-content-center">
                  <a href="" class="fs-6 text-gray-800 text-hover-primary">Emma Smith</a>
                  <div class="fw-bold text-gray-400">e.smith@kpmg.com.au</div>
                </div>
                <!--end::Info-->
              </div>
              <!--end::User-->
            </td>
            <td>Jun 20, 2021</td>
            <td>
              <span class="badge badge-light-info fw-bolder px-4 py-3">In progress</span>
            </td>
            <td class="text-end">
              <a href="#" class="btn btn-light btn-sm">View</a>
            </td>
          </tr>
        </tbody>
        <!--end::Body-->
      </table>
      <!--end::Table-->
    </div>
    <!--end::Table container-->
  </div>
  <!--end::Card body-->
</div>
<!--end::Card-->

<!-- Ürün Düzenlemeleri Tablosu-->
<div class="card card-flush mt-6 mt-xl-9">
  <!--begin::Card header-->
  <div class="card-header mt-5">
    <!--begin::Card title-->
    <div class="card-title flex-column">
      <h3 class="fs-6 text-gray-400">Ürün Düzenlemeleri</h3>
    </div>
    <div class="card-title flex-column">
      <a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">Ekle</a>
    </div>
    <!--begin::Card title-->
  </div>
  <!--end::Card header-->
  <!--begin::Card body-->
  <div class="card-body pt-0">
    <!--begin::Table container-->
    <div class="table-responsive">
      <!--begin::Table-->
      <table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
        <!--begin::Head-->
        <thead class="fs-7 text-gray-400 text-uppercase">
          <tr>
            <th class="min-w-250px">Düzenleme Açıklaması</th>
            <th class="min-w-150px">Tarih</th>
            <th class="min-w-90px">Status</th>
            <th class="min-w-50px text-end">Düzenle</th>
          </tr>
        </thead>
        <!--end::Head-->
        <!--begin::Body-->
        <tbody class="fs-6">
          <tr>
            <td>
              <!--begin::User-->
              <div class="d-flex align-items-center">
                <!--begin::Info-->
                <div class="d-flex flex-column justify-content-center">
                  <a href="" class="fs-6 text-gray-800 text-hover-primary">Emma Smith</a>
                  <div class="fw-bold text-gray-400">e.smith@kpmg.com.au</div>
                </div>
                <!--end::Info-->
              </div>
              <!--end::User-->
            </td>
            <td>Jun 20, 2021</td>
            <td>
              <span class="badge badge-light-info fw-bolder px-4 py-3">In progress</span>
            </td>
            <td class="text-end">
              <a href="#" class="btn btn-light btn-sm">View</a>
            </td>
          </tr>
        </tbody>
        <!--end::Body-->
      </table>
      <!--end::Table-->
    </div>
    <!--end::Table container-->
  </div>
  <!--end::Card body-->
</div>
<!--end::Card-->

@include('view::modal.kategoriDuzenlemeModal')
