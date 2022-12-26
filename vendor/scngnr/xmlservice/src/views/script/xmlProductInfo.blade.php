<!--begin::Input group-->
<!-- Ürün servisinden aldığımız dizi keylerini okuyoruz -->
<?php $productSpectKeys = array_keys($productSpect); ?>
<form class="form-control" action="/xmlservice/add/keylist/{{$xmlInfo->id}}" method="post">
   @csrf

@for($i= 0; $i < count($productSpect); $i++)
  <?php $keyName = $productSpectKeys[$i]; ?>
  @if($keyName == 'varyation' || $keyName == 'source' )
  @else
    <!--begin::Input group-->
    <div class="input-group mb-5">
      <span class="input-group-text" id="basic-addon3">
        <?php
          switch ($keyName) {
            case 'category':        echo " <span class=\"iconify\" data-icon=\"bx:category\" data-width=\"21\"></span>"; break;
            case 'pictures':        echo " <span class=\"iconify\" data-icon=\"et:pictures\" data-width=\"21\"></span>"; break;
            case 'pictures2':       echo " <span class=\"iconify\" data-icon=\"et:pictures\" data-width=\"21\"></span>"; break;
            case 'pictures3':       echo " <span class=\"iconify\" data-icon=\"et:pictures\" data-width=\"21\"></span>"; break;
            case 'pictures4':       echo " <span class=\"iconify\" data-icon=\"et:pictures\" data-width=\"21\"></span>"; break;
            case 'pictures5':       echo " <span class=\"iconify\" data-icon=\"et:pictures\" data-width=\"21\"></span>"; break;
            case 'regularPrice':    echo " <span class=\"iconify\" data-icon=\"entypo:price-tag\" data-width=\"21\"></span>"; break;
            case 'tax':             echo " <span class=\"iconify\" data-icon=\"tabler:receipt-tax\" data-width=\"21\"></span>"; break;
            case 'deci':            echo " <span class=\"iconify\" data-icon=\"mdi:weight-kilogram\" data-width=\"21\"></span>"; break;
            case 'price':           echo " <span class=\"iconify\" data-icon=\"icomoon-free:price-tags\" data-width=\"21\"></span>"; break;
            case 'description':     echo " <span class=\"iconify\" data-icon=\"tabler:file-description\" data-width=\"21\"></span>"; break;
            case 'gtin':            echo " <span class=\"iconify\" data-icon=\"fontisto:shopping-barcode\" data-width=\"21\"></span>"; break;
            case 'status':          echo " <span class=\"iconify\" data-icon=\"clarity:unknown-status-line\" data-width=\"21\"></span>"; break;
            case 'stockCode':       echo " <span class=\"iconify\" data-icon=\"ant-design:barcode-outlined\" data-width=\"21\"></span>"; break;
            case 'name':            echo " <span class=\"iconify\" data-icon=\"openmoji:european-name-badge\" data-width=\"21\"></span>"; break;
            case 'currency':        echo " <span class=\"iconify\" data-icon=\"ic:baseline-currency-exchange\" data-width=\"21\"></span>"; break;
            case 'varyation':       echo " <span class=\"iconify\" data-icon=\"fluent:copy-arrow-right-24-regular\" data-width=\"21\"></span>"; break;
            case 'stock':           echo " <span class=\"iconify\" data-icon=\"healthicons:rdt-result-out-stock-outline\" data-width=\"21\"></span>"; break;
          }
         ?>
         <!-- Select ksımında kullanıcılak olan xml Key isimleri -->
      </span>
      <?php
         //ÜRÜn kategori bilgileri
         $xmlKeys              = json_decode($xmlInfo->urunBilgileri, 1);
         $xmlProductSpectKeys  = array_keys($xmlKeys[0]);
         //Ürün xml key ve veritabanı yapısı eşleştirmesi
         $xmlProductSpectKeys2  = array_keys($xmlKeys[1]);
       ?>
          <select class="form-select" aria-label="Select example" name={{$keyName}}>
              <option>{{$productSpect[$keyName]}}</option>
              @for($j=0; $j < count($xmlKeys[0]) ; $j++)
                <?php $xmlKeyName = $xmlProductSpectKeys[$j]; ?>
                <option value="{{$xmlKeys[0][$xmlKeyName]}}"   {{$labelName = $xmlProductSpectKeys2[$i]}} @if($xmlKeys[0][$xmlKeyName] == $xmlKeys[1][$labelName] ) selected @endif > {{$xmlKeys[0][$xmlKeyName]}}</option>
              @endfor
          </select>
          <span class="input-group-text" id="basic-addon2" style="width:140px; text-align:center">
            {{$productSpect[$keyName]}}
        </span>
      </div>
    <!--end::Input group-->
  @endif
@endfor
<!--end::Input group-->
<button type="submit" class="btn btn-primary" name="button">Kaydet</button>
</form>
