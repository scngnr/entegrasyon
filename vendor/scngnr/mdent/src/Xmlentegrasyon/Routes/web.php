<?php


use Illuminate\Support\Facades\Route;


Route::get('xmlKategorileriBul', [Scngnr\Mdent\Xmlentegrasyon\Http\Controllers\XmlKategoriController::class, 'xmlKategorileBul'] );
