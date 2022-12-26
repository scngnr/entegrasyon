<?php


use Illuminate\Support\Facades\Route;
use Automattic\WooCommerce\Client;


Route::get('invoice/create', [Scngnr\Mdent\FaturaEnt\InvoiceService\Http\Controllers\N11Invoice::class, 'create'] );
