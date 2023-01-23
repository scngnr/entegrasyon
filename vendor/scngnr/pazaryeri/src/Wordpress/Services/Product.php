<?php

namespace Scngnr\Pazaryeri\Wordpress\Services;

use Scngnr\Pazaryeri\Wordpress\exception;

Class Claim {

      /**
      *
      *
      *
      *  @version Master -- BetaTest
      *  @author Sercan güngör
      */

    public function index()
    {

    }

    /**
    *
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function create()
    {
      $urunler = Urunler::find();

      for ($i=0; $i < count($urunler); $i++) {
        $woocommerce = new Client(
            'http://scngnrtest.infinityfreeapp.com/',
            'ck_3890365a7b810a9e26a02b4ffd7757da53cb49e9',
            'cs_bcc21877f10b1f25b59fce1446674b02f75b020a',
            [
              'version' => 'wc/v3',
            ]
        );
        $data = [
            'name' => $urunler[$i]->adi,
            'type' => 'simple',
            'regular_price' => $urunler[$i]->fiyati,
            'description' => $urunler[$i]->aciklama,
            'short_description' => $urunler[$i]->aciklma,
            'stock_quantity' => $urunler[$i]->stok,
            'manage_stock' => true,
            'categories' => [
                [
                    'id' => 9
                ],
                [
                    'id' => 14
                ]
            ],
            'images' => [
                [
                    'src' => $urunler[$i]->resim
                ]
            ]
        ];
 
      }
    }

    /**
    *
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function update()
    {

    }

    /**
    *
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function delete()
    {

    }
}
