
<!--end::Input group-->

<!--begin::Input group-->
<form class="" action="/xmlservice/xmlEditInfo/{{$xmlInfo->id}}" method="post">

<div class="input-group mb-5">
    <input type="text" class="form-control" name="adi" placeholder="Xml Adi" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{$xmlInfo->xmlAdi}}"/ >
    <span class="input-group-text" id="basic-addon2">
        <span class="iconify" data-icon="emojione-monotone:name-badge" data-width="21"></span>
    </span>
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="input-group mb-5">
    <span class="input-group-text" id="basic-addon3">
        <span class="iconify" data-icon="gridicons:my-sites" data-width="21"></span>
    </span>
    <input type="text" class="form-control" id="basic-url"  name="url" placeholder="Website URL" aria-describedby="basic-addon3" value="{{$xmlInfo->xmlLinki}}"/>
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="input-group mb-5">
  <span class="input-group-text" id="basic-addon3">
    <span class="iconify" data-icon="ant-design:field-time-outlined" data-width="21"></span>
  </span>
    <select class="form-select" aria-label="Select example" name="renew">
        <option>Lütfen Yenileme Sıklığını Seçiniz</option>
        <option value="30m">30 dakika</option>
        <option value="1">1 Saat</option>
        <option value="2">2 Saat</option>
        <option value="3">3 Saat</option>
    </select></div>
<!--end::Input group-->
<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
<button type="submit" class="btn btn-primary" >Kaydet</button>
</form>
