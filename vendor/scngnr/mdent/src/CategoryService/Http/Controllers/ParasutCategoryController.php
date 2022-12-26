<?php

namespace Scngnr\Mdent\CategoryService\Http\Controllers;

use Scngnr\Mdent\Xmlentegrasyon\Models\XmlKategori;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class ParasutCategoryController extends Controller
{

  // Parasut sisteminde kayıtlı tüm kategorileri döndürür.

  /**
  *Parasüt kategori ekleme için gerekli olanlar
  *
  * @param array $array['name'] Kategori adı
  * @param array $array['bg_color'] Category Background Rengi
  * @param array $array['text_color'] Category Yazı rengi
  * @param array $array['category_type'] Category tipi Alabileceği değerler aşağıdadır
  *                     1.Product => Ürün
  *                      2.Contact  => Müşteri/Tedarikçi
  *                        3.Employee => Çalışan
  *                          4. SalesInvoice => Satış Faturası
  *                            5. Expenditure => Harcamalar
  *
  * @param array $array['parent_id'] Category Parent Id
  *
  *
  * Categpry ekleme başarılı ise json veri döndürülecektir.
  */
  public function parasutCategoyCreateOrUpdate(){

    $xmlKategori = XmlKategori::all();

    for ($i=0; $i < count($xmlKategori); $i++) {

      if($xmlKategori[$i]->batchId == NULL){

        $newXmlKategori = new XmlKategori;
        //Parasut fatura entegrasyon category service controlleri çağırılıyor.
        $Category = new \Scngnr\Mdent\FaturaEnt\Parasut\Http\Controllers\Category;
        //Kategori adı
        $array['name'] = $xmlKategori[$i]->categoryAdi;
        //Kategori tipi
        $array['category_type'] = 'Product';
        //Category Parent Id
        $array['parent_id'] = 1;
        //Güncellemek üzere kategori bilgilerini al
        $newXmlKategori = XmlKategori::find($xmlKategori[$i]->id);
        //Parasut category controller servisini çalıştır
        $response = $Category->create($array);
        //Parasut response database kaydet
        $newXmlKategori->batchId = json_encode($response['data']);
        //Kategori bilgisini güncelle
        $newXmlKategori->update();
        sleep(2);
      }
    }
  }
}
