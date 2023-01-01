<div>


  <div class="content d-flex flex-column flex-column-fluid" id="kt_content" wire:loading.class="overlay overlay-block" >
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container" >
      <!--begin::Tables Widget 9-->
      <div class="card mb-5 mb-xl-10" wire:loading.class=" bg-dark bg-opacity-5" >
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
          <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">N11 Kategori Eşleştirme</span>
          </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div  class="card-body py-3 overflow-auto"  style="height:450px;"  >
          <!-- Basic Info -->
          <div class="col-md-12" >
                  <div class="block block-rounded block-themed">
                      <div class="block-content block-content-full">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Kategori adı giriniz. Aramak için enter'a basınız..."  wire:model="kategori" wire:keydown.enter="kategoriFunction" >
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-secondary" wire:click="kategoriFunction">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
          </div>
          <!-- END Basic Info -->

          <!--begin::Accordion-->
          <div class="accordion mt-10" id="kt_accordion_1">
              <div class="accordion-item">
                  <h2 class="accordion-header" id="kt_accordion_1_header_1">
                      <button class="accordion-button fs-4 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_1" aria-expanded="true" aria-controls="kt_accordion_1_body_1">
                          Ürün Kategorileri
                      </button>
                  </h2>
                  <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
                      <div class="accordion-body">

                        <!--begin::Table container-->
                        <div class="table-responsive">
                          <!--begin::Table-->
                          <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4 table-hover">
                            <!--begin::Table head-->
                            <thead>
                              <tr class="fw-bolder text-muted">
                                <th class="w-25px">
                                  <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-9-check" />
                                  </div>
                                </th>
                                <th class="min-w-25px">Kategori</th>
                              </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                              @foreach($kategoriBul as $kategori)

                                <tr>
                                  <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                      <input class="form-check-input widget-9-check" type="checkbox" value="1" />
                                    </div>
                                  </td>
                                  <td class="text-dark fw-bolder text-hover-primary d-block fs-6" wire:click="secilmisKategori({{$kategori->categoryId}})" wire:click=resetPage>{{$kategori->categoryName}}
                                    <span class="text-muted fw-bold text-muted d-block fs-7" >Tam kategori adi alınıcak</span>
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                            <!--end::Table body-->
                          </table>
                          <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                      </div>
                  </div>
              </div>

              <div class="accordion-item">
                  <h2 class="accordion-header" id="kt_accordion_1_header_2">
                      <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_2" aria-expanded="false" aria-controls="kt_accordion_1_body_2">
                      Ürün Kategori Özellikleri
                      </button>
                  </h2>

                  <div id="kt_accordion_1_body_2" class="accordion-collapse collapse" aria-labelledby="kt_accordion_1_header_2" data-bs-parent="#kt_accordion_1">
                      <div class="accordion-body">
    										<div class="card-body pt-0">
    											<div class="d-flex flex-column gap-5 gap-md-7">
    											<form class="form-control" action="/pazaryeri/n11/databaseattributesave" method="post">
                            @csrf
                            @if(is_array($secilmisKategoriAttribute))
                              @if(array_key_exists(0, $secilmisKategoriAttribute))
                                @for($i = 0; $i < count($secilmisKategoriAttribute); $i++)
                                <?php $currentAttributeId = $secilmisKategoriAttribute[$i]['id']; ?>
                                  <div class="input-group col-3 mb-5">
                                    <span class="input-group-text" id="basic-addon1">{{$secilmisKategoriAttribute[$i]['name']}} @if($secilmisKategoriAttribute[$i]['mandatory']) (*) @endif</span>
                                    <select class="form-control text-dark fw-bolder text-hover-primary "  name="{{$secilmisKategoriAttribute[$i]['id']}}" id="{{$secilmisKategoriAttribute[$i]['id'].\Carbon\Carbon::now()->timestamp }}" placeholder="Pick a state...">
                                      @for($j = 0; $j < count($secilmisKategoriAttributeValueLists[$currentAttributeId]); $j++)
                                        @for($k = 0; $k < count($secilmisKategoriAttributeValueLists[$currentAttributeId][$j]); $k++ )
                                          <option value="{{$secilmisKategoriAttributeValueLists[$currentAttributeId][$j][$k]['name']}}">{{$secilmisKategoriAttributeValueLists[$currentAttributeId][$j][$k]['name']}}</option>
                                        @endfor
                                      @endfor
                                    </select>
                                    <script type="text/javascript">
                                    $('#{{$secilmisKategoriAttribute[$i]['id'].\Carbon\Carbon::now()->timestamp}}').select2();
                                    </script>
                                  </div>
                                @endfor
                                @else
                                1
                              @endif
                            @endif

                            <button class="btn btn-light-primary"type="submit" value ="{{$secilmisKategori}}.{{$frontEndUrunId}}"name="button">Gönder</button>
                          </form>
    											</div>
    										</div>
                      </div>
                  </div>
              </div>
          </div>
          <!--end::Accordion-->



        </div>
        <!--begin::Body-->
      </div>
      <!--end::Tables Widget 9-->
      <!--end::Row-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::Content-->
</div>
