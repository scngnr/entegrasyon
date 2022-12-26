@extends('layouts.mainLayout', ['slot' => ''])

@section('pageContent')


<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid " id="kt_content" >
  <!--begin::Container-->
  <div class="container-xxl" id="kt_content_container" >
    <!--begin::Products-->
    <div class="card card-flush " >
      <!--begin::Card header-->
      <div class="card-header align-items-center py-5 gap-2 gap-md-5"   >

      </div>
      <!--end::Card header-->
      <!--begin::Card body-->
      <div class="card-body pt-0 overflow-auto" style="max-height:350px">

        <form class="form" action="/productPriceUpdate/{{$urunId}}" method="post">
          @csrf
          <!--begin::Input group-->
          <div class="input-group mb-5">
            <select class="form-select" data-control="select2" data-placeholder="Select an option">
              <option selected>Orjinal Fiyat baz alınır</option>
          </select>
          </div>
          <!--end::Input group-->
          <!--begin::Input group-->
          <div class="input-group mb-5">
            <select class="form-select" data-control="select2" name="platform"data-placeholder="Fiyat uygulanacak pazaryer seçiniz.">
              <option value="woocommercefiyati" >   WooCommerce</option>
              <option value="ideasoftFiyati" >      ideasoftFiyati</option>
              <option value="platinSoftFiyati" >    platinSoftFiyati</option>
              <option value="	shopifyFiyati" >     	shopifyFiyati</option>
              <option value="tsoftFiyati" >         tsoftFiyati</option>
              <option value="ticimaxFiyati">        ticimaxFiyati</option>
              <option value="csFiyati">  	          csFiyati</option>
              <option value="epttAvmFiyati">  	    epttAvmFiyati</option>
              <option value="ggFiyati">  		        ggFiyati</option>
              <option value="	hepsiBuradaFiyati">  	hepsiBuradaFiyati</option>
              <option value="	n11Fiyati">  	        n11Fiyati</option>
              <option value="	trendyolFiyati">  		trendyolFiyati</option>
              <option value="	opencartFiyati">  	  opencartFiyati</option>
          </select>
          </div>
          <!--end::Input group-->
          <!--begin::Input group-->
          <div class="input-group mb-5">
              <input type="text" class="form-control" name="carpan" placeholder="işlem giriniz.. Örneğin +15" aria-describedby="basic-addon2"/>
          </div>
          <!--end::Input group-->

          <!--begin::Input group-->
          <div class="input-group mb-5">
            <button type="submit" class="btn btn-primary" name="button">Kaydet</button>
          </div>
          <!--end::Input group-->
        </form>

      </div>
      <!--end::Card body-->
    </div>
    <!--end::Products-->
  </div>
  <!--end::Container-->
</div>
<!--end::Content-->
@endsection
