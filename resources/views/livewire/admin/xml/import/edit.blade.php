<div>

  <div class="content">
    <form class="" action="/ayarlar/xml/import/{{$xmlArray->id}}/add" method="POST">
      @csrf
      <div class="block">
          <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
              <li class="nav-item">
                  <a class="nav-link active" href="#xml-spect">Xml Bilgileri</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#xml-product-spect">Ayrıntılar</a>
              </li>
              <li class="nav-item ml-auto">
                  <a class="nav-link" href="#btabs-animated-slideleft-settings"><i class="si si-settings"></i></a>
              </li>
          </ul>
          <div class="block-content tab-content overflow-hidden">
              <div class="tab-pane fade fade-left show active" id="xml-spect" role="tabpanel">
                <div class="container">
                  <div class="row">
                    <div class="col-sm">
                      <div class="form-group">
                        <label for="xmlAdi" class="col-form-label">Xml Adı:</label>
                        <input type="text" class="form-control" name="xmlAdi" id="xmlAdi" value="{{$xmlArray->xmlAdi}}">
                      </div>

                    </div>
                    <div class="col-sm">
                      <div class="form-group">
                        <label for="xmlLinki" class="col-form-label">Xml Linki:</label>
                        <input type="text" class="form-control" name="xmlLinki" id="xmlLinki" value="{{$xmlArray->xmlLinki}}">
                      </div>
                    </div>
                    <div class="col-sm">
                      <div class="form-group">
                        <label for="xmlDurumu" class="col-form-label">Xml Durumu:</label>
                        <select class="form-control" name="urunDurum">
                          <option value="">Seçiniz</option>
                          <option value="aktif degil" @if($xmlArray->xmlDurum == 'aktif degil') selected @endif >  Aktif degil </option>
                          <option value="aktif" @if($xmlArray->xmlDurum == 'aktif') selected @endif> Aktif</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  </div>
              </div>
              <div class="tab-pane fade fade-left" id="xml-product-spect" role="tabpanel">
                <div class="container">
                  <div class="row">
                    <div class="col-sm">
                      <div class="form-group">
                        <label for="adi" class="col-form-label">Urun Adı: </label>
                        <select class="form-control" name="adi" id="adi" >
                          <option value="">Seçiniz</option>
                          <?php
                                  $xmlKeyName = array_keys($xmlBilgileri);
                                  for ($j=0; $j < count($xmlBilgileri); $j++) {
                                    $xmlKeyNameId = $xmlKeyName[$j];
                            ?>
                            <option value="<?php  if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}  ?>" ><?php if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}?> </option>
                          <?php
                        }?>
                        </select>
                      </div>
                        <div class="form-group">
                          <label for="markasi" class="col-form-label">Urun Markası: </label>
                          <select class="form-control" name="markasi" id="markasi" >
                            <option value="">Seçiniz</option>
                            <?php
                                    $xmlKeyName = array_keys($xmlBilgileri);
                                    for ($j=0; $j < count($xmlBilgileri); $j++) {
                                      $xmlKeyNameId = $xmlKeyName[$j]
                              ?>
                              <option value="<?php  if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}  ?>"><?php if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}?> </option>
                            <?php
                            }?>
                          </select>
                        </div>
                          <div class="form-group">
                            <label for="fiyati" class="col-form-label">Urun fiyatı: </label>
                            <select class="form-control" name="fiyati" id="fiyati" >
                              <option value="">Seçiniz</option>
                              <?php
                                      $xmlKeyName = array_keys($xmlBilgileri);
                                      for ($j=0; $j < count($xmlBilgileri); $j++) {
                                        $xmlKeyNameId = $xmlKeyName[$j]
                                ?>
                                <option value="<?php  if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}  ?>"><?php if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}?> </option>
                              <?php
                              }?>
                            </select>
                          </div>
                            <div class="form-group">
                              <label for="katagorisi" class="col-form-label">Urun Kategorisi: </label>
                              <select class="form-control" name="katagorisi" id="katagorisi" >
                                <option value="">Seçiniz</option>
                                <?php
                                        $xmlKeyName = array_keys($xmlBilgileri);
                                        for ($j=0; $j < count($xmlBilgileri); $j++) {
                                          $xmlKeyNameId = $xmlKeyName[$j]
                                  ?>
                                  <option value="<?php  if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}  ?>"><?php if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}?> </option>
                                <?php
                                }?>
                              </select>
                            </div>
                              <div class="form-group">
                                <label for="kdv" class="col-form-label">Urun Kdv: </label>
                                <select class="form-control" name="kdv" id="kdv" >
                                  <option value="">Seçiniz</option>
                                  <?php
                                          $xmlKeyName = array_keys($xmlBilgileri);
                                          for ($j=0; $j < count($xmlBilgileri); $j++) {
                                            $xmlKeyNameId = $xmlKeyName[$j]
                                    ?>
                                    <option value="<?php  if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}  ?>"><?php if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}?> </option>
                                  <?php
                                  }?>
                                </select>
                              </div>
                                <div class="form-group">
                                  <label for="paraBirimi" class="col-form-label">Urun Para Birimi: </label>
                                  <select class="form-control" name="paraBirimi" id="paraBirimiparaBirimi" >
                                    <option value="">Seçiniz</option>
                                    <?php
                                            $xmlKeyName = array_keys($xmlBilgileri);
                                            for ($j=0; $j < count($xmlBilgileri); $j++) {
                                              $xmlKeyNameId = $xmlKeyName[$j]
                                      ?>
                                      <option value="<?php  if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}  ?>"><?php if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}?> </option>
                                    <?php
                                    }?>
                                  </select>
                                </div>
                                  <div class="form-group">
                                    <label for="aciklama" class="col-form-label">Urun Açıklaması: </label>
                                    <select class="form-control" name="aciklama" id="aciklama" >
                                      <option value="">Seçiniz</option>
                                      <?php
                                              $xmlKeyName = array_keys($xmlBilgileri);
                                              for ($j=0; $j < count($xmlBilgileri); $j++) {
                                                $xmlKeyNameId = $xmlKeyName[$j]
                                        ?>
                                        <option value="<?php  if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}  ?>"><?php if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}?> </option>
                                      <?php
                                      }?>
                                    </select>
                                  </div>
                                    <div class="form-group">
                                      <label for="stokCode" class="col-form-label">Urun Stok Kodu: </label>
                                      <select class="form-control" name="stokCode" id="stokCode" >
                                        <option value="">Seçiniz</option>
                                        <?php
                                                $xmlKeyName = array_keys($xmlBilgileri);
                                                for ($j=0; $j < count($xmlBilgileri); $j++) {
                                                  $xmlKeyNameId = $xmlKeyName[$j]
                                          ?>
                                          <option value="<?php  if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}  ?>"><?php if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}?> </option>
                                        <?php
                                        }?>
                                      </select>
                                    </div>
                                      <div class="form-group">
                                        <label for="barcode" class="col-form-label">Urun Gtin: </label>
                                        <select class="form-control" name="barcode" id="barcode" >
                                          <option value="">Seçiniz</option>
                                          <?php
                                                  $xmlKeyName = array_keys($xmlBilgileri);
                                                  for ($j=0; $j < count($xmlBilgileri); $j++) {
                                                    $xmlKeyNameId = $xmlKeyName[$j]
                                            ?>
                                            <option value="<?php  if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}  ?>"><?php if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}?> </option>
                                          <?php
                                          }?>
                                        </select>
                                      </div>
                                        <div class="form-group">
                                          <label for="deci" class="col-form-label">Urun Desi: </label>
                                          <select class="form-control" name="deci" id="deci" >
                                            <option value="">Seçiniz</option>
                                            <?php
                                                    $xmlKeyName = array_keys($xmlBilgileri);
                                                    for ($j=0; $j < count($xmlBilgileri); $j++) {
                                                      $xmlKeyNameId = $xmlKeyName[$j]
                                              ?>
                                              <option value="<?php  if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}  ?>"><?php if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}?> </option>
                                            <?php
                                            }?>
                                          </select>
                                        </div>
                    </div>
                    <div class="col-sm">
                      <div class="form-group">
                        <label for="resim1" class="col-form-label">Urun Resim 1: </label>
                        <select class="form-control" name="resim" id="resim" >
                          <option value="">Seçiniz</option>
                          <?php
                                  $xmlKeyName = array_keys($xmlBilgileri);
                                  for ($j=0; $j < count($xmlBilgileri); $j++) {
                                    $xmlKeyNameId = $xmlKeyName[$j]
                            ?>
                            <option value="<?php  if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}  ?>"><?php if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}?> </option>
                          <?php
                          }?>
                        </select>
                      </div>
                        <div class="form-group">
                          <label for="resim2" class="col-form-label">Urun Resim 2 : </label>
                          <select class="form-control" name="resim2" id="resim" >
                            <option value="">Seçiniz</option>
                            <?php
                                    $xmlKeyName = array_keys($xmlBilgileri);
                                    for ($j=0; $j < count($xmlBilgileri); $j++) {
                                      $xmlKeyNameId = $xmlKeyName[$j]
                              ?>
                              <option value="<?php  if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}  ?>"><?php if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}?> </option>
                            <?php
                            }?>
                          </select>
                        </div>
                          <div class="form-group">
                            <label for="resim3" class="col-form-label">Urun Resim 3: </label>
                            <select class="form-control" name="" id="resim3" >
                              <option value="">Seçiniz</option>
                              <?php
                                      $xmlKeyName = array_keys($xmlBilgileri);
                                      for ($j=0; $j < count($xmlBilgileri); $j++) {
                                        $xmlKeyNameId = $xmlKeyName[$j]
                                ?>
                                <option value="<?php  if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}  ?>"><?php if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}?> </option>
                              <?php
                              }?>
                            </select>
                          </div>
                            <div class="form-group">
                              <label for="resim4" class="col-form-label">Urun Resim 4: </label>
                              <select class="form-control" name="resim4" id="resim4" >
                                <option value="">Seçiniz</option>
                                <?php
                                        $xmlKeyName = array_keys($xmlBilgileri);
                                        for ($j=0; $j < count($xmlBilgileri); $j++) {
                                          $xmlKeyNameId = $xmlKeyName[$j]
                                  ?>
                                  <option value="<?php  if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}  ?>"><?php if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}?> </option>
                                <?php
                                }?>
                              </select>
                            </div>
                              <div class="form-group">
                                <label for="resim5" class="col-form-label">Urun Rsim 5: </label>
                                <select class="form-control" name="resim5" id="resim5" >
                                  <option value="">Seçiniz</option>
                                  <?php
                                          $xmlKeyName = array_keys($xmlBilgileri);
                                          for ($j=0; $j < count($xmlBilgileri); $j++) {
                                            $xmlKeyNameId = $xmlKeyName[$j]
                                    ?>
                                    <option value="<?php  if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}  ?>"><?php if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}?> </option>
                                  <?php
                                  }?>
                                </select>
                              </div>
                    </div>
                    <div class="col-sm">
                      <div class="form-group">
                        <label for="hbUrunKodu" class="col-form-label">Urun HepsiBurada Urun Kodu: </label>
                        <select class="form-control" name="hbUrunKodu" id="hbUrunKodu" >
                          <option value="">Seçiniz</option>
                          <?php
                                  $xmlKeyName = array_keys($xmlBilgileri);
                                  for ($j=0; $j < count($xmlBilgileri); $j++) {
                                    $xmlKeyNameId = $xmlKeyName[$j]
                            ?>
                            <option value="<?php  if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}  ?>"><?php if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}?> </option>
                          <?php
                          }?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm">
                      <div class="form-group">
                        <label for="stokSifirla" class="col-form-label">Adet altını Sıfırla: </label>
                        <input type="number" class="form-control" id="stokSifirla" name="stokSifirla" placeholder="Stok Sfırılanmasını İstediğiniz Adet" min="0">
                      </div>
                        <div class="form-group">
                          <label for="stok" class="col-form-label">Stok : </label>
                          <select class="form-control" name="stok" id="stok" >
                            <option value="">Seçiniz</option>
                            <?php
                                    $xmlKeyName = array_keys($xmlBilgileri);
                                    for ($j=0; $j < count($xmlBilgileri); $j++) {
                                      $xmlKeyNameId = $xmlKeyName[$j]
                              ?>
                              <option value="<?php  if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}  ?>"><?php if(array_key_exists($xmlKeyName[$j], $xmlBilgileri)){ echo $xmlBilgileri[$xmlKeyNameId];}?> </option>
                            <?php
                            }?>
                          </select>
                        </div>
                    </div>
                  </div>
                  </div>
              </div>
              <div class="tab-pane fade fade-left" id="btabs-animated-slideleft-settings" role="tabpanel">
                <div class="container">
                  <div class="row">
                    <div class="col-sm">
                      One of three columns
                    </div>
                    <div class="col-sm">
                      One of three columns
                    </div>
                    <div class="col-sm">
                      One of three columns
                    </div>
                  </div>
                  </div>
              </div><button type="submit"class="btn btn-primary float-right" name="button"> Güncelle </button>
          </div>

      </div>

    </form>
  </div>
</div>
