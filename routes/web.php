<?php

use Illuminate\Support\Facades\Route;
use IS\PazarYeri\N11\N11Client;
use Scngnr\Pazaryeri\N11\Models\n11subcategory;
use Scngnr\Pazaryeri\N11\Models\n11ToplevelCategories;
use Scngnr\Pazaryeri\N11\Models\n11getCategoryAttributes;
use Scngnr\Pazaryeri\N11\Models\n11getCategoryAttributeValue;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', App\Http\Livewire\Admin\dashboard::class)->name('dashboard');
});

//top level Kategoriler
Route::get('n11/category/parent/', function(){

  $client = new N11Client();
  $client->setApiKey('159dec2a-4b09-46df-8287-c3fa228904a0');
  $client->setApiPassword('TncaxGtCdMm6ypRm');

  $categories = $client->category->getTopLevelCategories();

  for ($i=0; $i < count($categories->categoryList->category); $i++) {

    if(! n11ToplevelCategories::where('categoryId', $categories->categoryList->category[$i]->id)->first()){
      $category = new n11ToplevelCategories;
      $category->categoryId = $categories->categoryList->category[$i]->id;
      $category->name = $categories->categoryList->category[$i]->name;
      $category->save();
    }
  }
});

//top level kategorilerin alt kategorileri
Route::get('n11/category/subcatetegories/', function(){

  $client = new N11Client();
  $client->setApiKey('159dec2a-4b09-46df-8287-c3fa228904a0');
  $client->setApiPassword('TncaxGtCdMm6ypRm');

  // $categories = json_decode(json_encode($client->category->getSubCategories(1002964)), 1);

  $n11ToplevelCategories = n11ToplevelCategories::all();

  for ($j=0; $j < count($n11ToplevelCategories); $j++) {

    $categories = json_decode(json_encode($client->category->getSubCategories($n11ToplevelCategories[$j]->categoryId)), 1);
    // $categories = json_decode(json_encode($client->category->getSubCategories(1002465)), 1);
    // dd(count($categories));
    echo $n11ToplevelCategories[$j]->categoryId . '-';

    //İşlem Başarılı mı ?
    if($categories['result']['status'] == 'success' ){
      //Gelen Data içerisinde subCategory Var mı ?
      if(array_key_exists('subCategoryList', $categories['category'])){
        //subCategory Array mı ?
        if(array_key_exists(0, $categories['category']['subCategoryList']['subCategory'])){
          for ($i=0; $i < count($categories['category']['subCategoryList']['subCategory']); $i++) {

            if(! n11subcategory::where('categoryId', $categories['category']['subCategoryList']['subCategory'][$i]['id'])->first()){
              //Kayıtlı Değil, Kayıt Et
              $category = new n11subcategory;
              $category->parentCategoryId   = $n11ToplevelCategories[$j]->categoryId;
              $category->categoryId         = $categories['category']['subCategoryList']['subCategory'][$i]['id'];
              $category->name               = $categories['category']['subCategoryList']['subCategory'][$i]['name'];
              $category->save();
            }else {
              //Kayıtlı Güncelle
            }
          }
        }else {
          //array değil
          if(! n11subcategory::where('categoryId', $categories['category']['subCategoryList']['subCategory']['id'])->first()){
            //Kayıtlı Değil, Kayıt Et
            $category = new n11subcategory;
            $category->parentCategoryId   = $n11ToplevelCategories[$j]->categoryId;
            $category->categoryId         = $categories['category']['subCategoryList']['subCategory']['id'];
            $category->name               = $categories['category']['subCategoryList']['subCategory']['name'];
            $category->save();
          }else {
            //Kayıtlı Güncelle
          }
        }
      }
    }else {
      //Hata Alındı
      dd($categories);
    }
    sleep(1.2);
  }

});

//Ve varsa alt kategorilerin alt kategorileri
Route::get('n11/category/subcatetegories/subCategory', function(){

  ini_set('max_execution_time', '-1');
  $client = new N11Client();
  $client->setApiKey('159dec2a-4b09-46df-8287-c3fa228904a0');
  $client->setApiPassword('TncaxGtCdMm6ypRm');

  // $categories = json_decode(json_encode($client->category->getSubCategories(1002964)), 1);

  $n11SubCategoriesSubCategory = n11subcategory::all();

  for ($j=0; $j < count($n11SubCategoriesSubCategory); $j++) {

    $categories = json_decode(json_encode($client->category->getSubCategories($n11SubCategoriesSubCategory[$j]->categoryId)), 1);
    // $categories = json_decode(json_encode($client->category->getSubCategories(1002685)), 1);
    // dd(($categories));
    // echo $n11SubCategoriesSubCategory[$j]->categoryId . '-';
    echo $j . '-';

    //İşlem Başarılı mı ?
    if($categories['result']['status'] == 'success' ){
      //Gelen Data içerisinde subCategory Var mı ?
      if(array_key_exists('subCategoryList', $categories['category'])){
        //subCategory Array mı ?
        if(array_key_exists(0, $categories['category']['subCategoryList']['subCategory'])){
          for ($i=0; $i < count($categories['category']['subCategoryList']['subCategory']); $i++) {

            if(! n11subcategory::where('categoryId', $categories['category']['subCategoryList']['subCategory'][$i]['id'])->first()){
              //Kayıtlı Değil, Kayıt Et
              $category = new n11subcategory;
              $category->parentCategoryId   = $n11SubCategoriesSubCategory[$j]->categoryId;
              $category->categoryId         = $categories['category']['subCategoryList']['subCategory'][$i]['id'];
              $category->name               = $categories['category']['subCategoryList']['subCategory'][$i]['name'];
              $category->save();
            }else {
              //Kayıtlı Güncelle
            }
          }
        }else {
          //array değil
          if(! n11subcategory::where('categoryId', $categories['category']['subCategoryList']['subCategory']['id'])->first()){
            //Kayıtlı Değil, Kayıt Et
            $category = new n11subcategory;
            $category->parentCategoryId   = $n11SubCategoriesSubCategory[$j]->categoryId;
            $category->categoryId         = $categories['category']['subCategoryList']['subCategory']['id'];
            $category->name               = $categories['category']['subCategoryList']['subCategory']['name'];
            $category->save();
          }else {
            //Kayıtlı Güncelle
          }
        }
      }
    }else {
      //Hata Alındı Mesajı Kategori hata bilgisine yaz
      $category = n11subcategory::where('categoryId', $n11SubCategoriesSubCategory[$j]->categoryId)->first();
      $subCategory = n11subcategory::find($category->id);
      $subCategory->hata = $categories['result']['errorMessage'];
      $subCategory->update();
    }
    sleep(1.2);
  }

});

Route::get('n11/category/attributes', function(){

    ini_set('max_execution_time', '-1');
    $client = new N11Client();
    $client->setApiKey('159dec2a-4b09-46df-8287-c3fa228904a0');
    $client->setApiPassword('TncaxGtCdMm6ypRm');

    $subCategory = n11subcategory::all();
    for ($i=0; $i < count($subCategory) ; $i++) {
      $attributes = json_decode(json_encode($client->category->getCategoryAttributesId($subCategory[$i]->categoryId)) ,1 );
      echo ( 'i = ' . $i . '-');
      if($attributes['result']['status'] == 'success'){
        if(array_key_exists('categoryProductAttributeList', $attributes)){
          if(array_key_exists('categoryProductAttribute', $attributes['categoryProductAttributeList'])){
            //işlem başarılı ve Category arrayı bulunuyor
            if(array_key_exists(0, $attributes['categoryProductAttributeList']['categoryProductAttribute'])){
              //işlem başarılı ve Category arrayı bulunuyor
              for ($j=0; $j < count($attributes['categoryProductAttributeList']['categoryProductAttribute']); $j++) {
                // Liste array ve for-j döngüsüyle tara
                echo ( 'j = ' . $j . '-');

                if(! n11getCategoryAttributes::where('attributeId', $attributes['categoryProductAttributeList']['categoryProductAttribute'][$j]['id'])->first()){
                  //Kayıtlı Değil, Kayıt Et
                  $attribute = new n11getCategoryAttributes;
                  $attribute->attributeId     = $attributes['categoryProductAttributeList']['categoryProductAttribute'][$j]['id'];
                  $attribute->name            = $attributes['categoryProductAttributeList']['categoryProductAttribute'][$j]['name'];
                  $attribute->mandatory       = $attributes['categoryProductAttributeList']['categoryProductAttribute'][$j]['mandatory'];
                  $attribute->save();
                }else {
                  //Kayıtlı Güncelle
                }
              }
            }else {
              //Array değil

              if(! n11getCategoryAttributes::where('attributeId', $attributes['categoryProductAttributeList']['categoryProductAttribute']['id'])->first()){
                //Kayıtlı Değil, Kayıt Et
                $attribute = new n11getCategoryAttributes;
                $attribute->attributeId     = $attributes['categoryProductAttributeList']['categoryProductAttribute']['id'];
                $attribute->name            = $attributes['categoryProductAttributeList']['categoryProductAttribute']['name'];
                $attribute->mandatory       = $attributes['categoryProductAttributeList']['categoryProductAttribute']['mandatory'];
                $attribute->save();
              }else {
                //Kayıtlı Güncelle
              }
            }
          }
        }
      }else {
        //Hata Alındı Mesajı Kategori hata bilgisine yaz
        $category = n11subcategory::where('categoryId', $subCategory[$j]->categoryId)->first();
        $subCategorys = n11subcategory::find($category->id);
        $subCategorys->hata = $attributes['result']['errorMessage'];
        $subCategorys->update();
      }
      sleep(1.2);
    }
});


Route::get('n11/category/attributes/value', function(){

      ini_set('max_execution_time', '-1');
      $client = new N11Client();
      $client->setApiKey('159dec2a-4b09-46df-8287-c3fa228904a0');
      $client->setApiPassword('TncaxGtCdMm6ypRm');

      $attributesValues = n11getCategoryAttributes::all();
      for ($i=49; $i < 50 ; $i++) {
        $attributesValue = json_decode(json_encode($client->category->getCategoryAttributeValue($attributesValues[$i]->attributeId, array('currentPage' => 0, 'pageSize' => 200))) ,1 );
        // dd($attributesValue);
        echo ( 'i = ' . $i . '-');
        if($attributesValue['result']['status'] == 'success'){
          if(array_key_exists('categoryProductAttributeValueList', $attributesValue)){
            if(array_key_exists('categoryProductAttributeValue', $attributesValue['categoryProductAttributeValueList'])){
              if(array_key_exists(0, $attributesValue['categoryProductAttributeValueList']['categoryProductAttributeValue'])){
                if($attributesValue['pagingData']['totalCount'] > 100){
                  for ($j=1775; $j < $attributesValue['pagingData']['pageCount']; $j++) {

                    $attributesValue = json_decode(json_encode($client->category->getCategoryAttributeValue($attributesValues[$i]->attributeId, array('currentPage' => $j, 'pageSize' => 100))) ,1 );
                    if($attributesValue['result']['status'] == 'success'){
                      echo ( 'j = ' . $j . '-');

                        if(array_key_exists('categoryProductAttributeValueList', $attributesValue)){
                          if(array_key_exists('categoryProductAttributeValue', $attributesValue['categoryProductAttributeValueList'])){
                            for ($k=0; $k < $attributesValue['pagingData']['pageSize']  + 1; $k++) {
                              if(array_key_exists($k, $attributesValue['categoryProductAttributeValueList']['categoryProductAttributeValue'])){

                                if(! n11getCategoryAttributeValue::where('attributesValueId', $attributesValue['categoryProductAttributeValueList']['categoryProductAttributeValue'][$k]['id'])->first()){
                                  $attribute = new n11getCategoryAttributeValue;
                                  $attribute->attributesId      = $attributesValues[$i]->attributeId;
                                  $attribute->attributesValueId = $attributesValue['categoryProductAttributeValueList']['categoryProductAttributeValue'][$k]['id'];
                                  $attribute->name              = $attributesValue['categoryProductAttributeValueList']['categoryProductAttributeValue'][$k]['name'];
                                  $attribute->save();
                                }
                              }
                            }
                          }
                        }
                    }else {
                      //Hata Alındı Mesajı Kategori hata bilgisine yaz
                      $attributesValues = n11getCategoryAttributes::where('attributesValueId', $attributesValues[$j]->attributeId)->first();
                      $subCategorys = n11getCategoryAttributes::find($attributesValues->id);
                      $subCategorys->hata = $i . $attributesValue['result']['errorMessage'];
                      $subCategorys->update();
                    }
                    // sleep(1.3);
                  }
                }
              }else {
                if(! n11getCategoryAttributeValue::where('attributesValueId', $attributesValue['categoryProductAttributeValueList']['categoryProductAttributeValue']['id'])->first()){
                  $attribute = new n11getCategoryAttributeValue;
                  $attribute->attributesId      = $attributesValues[$i]->attributeId;
                  $attribute->attributesValueId = $attributesValue['categoryProductAttributeValueList']['categoryProductAttributeValue']['id'];
                  $attribute->name              = $attributesValue['categoryProductAttributeValueList']['categoryProductAttributeValue']['name'];
                  $attribute->save();
                }
              }
            }
          }
        }else {
          //Hata Alındı Mesajı Kategori hata bilgisine yaz
          $attributesValues = n11getCategoryAttributes::where('categoryId', $attributesValues[$j]->attributeId)->first();
          $subCategorys = n11getCategoryAttributes::find($attributesValues->id);
          $subCategorys->hata = $attributesValue['result']['errorMessage'];
          $subCategorys->update();
        }
        sleep(1.3);
      }
 });


Route::get('schedule/run', function(){

   Artisan::call("schedule:run");
});
