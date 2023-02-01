<?php

namespace Scngnr\Parasut\Services;

use Scngnr\Parasut\Exception;
use Scngnr\Parasut\Request;


class salesInvoice extends Request
{
  public $baseEndPoint = "https://api.parasut.com/v4/38340";
  public $apiurl = "salesInvoice" ;

  $this->baseEndPoint = "{$this->baseEndPoint}/{$this->apiurl}";
  /**
  *
  *  @version Master -- BetaTest
  *  @author Sercan güngör
  */

  public function index(){

    $this->getResponse($access_token, 'GET', $this->baseEndPoint);
  }

  // {
  //   "data": {
  //       "id": "string",
  //       "type": "sales_invoices",
  //       "attributes": {
  //           "archived": true,
  //           "invoice_no": "string",
  //           "net_total": 0,
  //           "gross_total": 0,
  //           "withholding": 0,
  //           "total_excise_duty": 0,
  //           "total_communications_tax": 0,
  //           "total_vat": 0,
  //           "vat_withholding": 0,
  //           "total_discount": 0,
  //           "total_invoice_discount": 0,
  //           "before_taxes_total": 0,
  //           "remaining": 0,
  //           "remaining_in_trl": 0,
  //           "payment_status": "paid",
  //           "created_at": "2023-02-01",
  //           "updated_at": "2023-02-01",
  //           "item_type": "invoice",
  //           "description": "string",
  //           "issue_date": "2023-02-01",
  //           "due_date": "2023-02-01",
  //           "invoice_series": "string",
  //           "invoice_id": 0,
  //           "currency": "TRL",
  //           "exchange_rate": 0,
  //           "withholding_rate": 0,
  //           "vat_withholding_rate": 0,
  //           "invoice_discount_type": "percentage",
  //           "invoice_discount": 0,
  //           "billing_address": "string",
  //           "billing_phone": "string",
  //           "billing_fax": "string",
  //           "tax_office": "string",
  //           "tax_number": "string",
  //           "country": "string",
  //           "city": "string",
  //           "district": "string",
  //           "is_abroad": true,
  //           "order_no": "string",
  //           "order_date": "2023-02-01",
  //           "shipment_addres": "string",
  //           "shipment_included": true,
  //           "cash_sale": true
  //       },
  //     "relationships": {
  //       "category": {
  //         "data": {
  //           "id": "string",
  //           "type": "item_categories"
  //         }
  //       },
  //       "contact": {
  //       "data": {
  //         "id": "string",
  //         "type": "contacts"
  //         }
  //       },
  //       "details": {
  //       "data": [
  //           {
  //           "id": "string",
  //           "type": "sales_invoice_details"
  //           }
  //         ]
  //       },
  //       "payments": {
  //       "data": [
  //             {
  //             "id": "string",
  //             "type": "payments"
  //             }
  //           ]
  //       },
  //       "tags": {
  //         "data": [
  //           {
  //           "id": "string",
  //           "type": "tags"
  //           }
  //         ]
  //       },
  //       "sales_offer": {
  //         "data": {
  //           "id": "string",
  //           "type": "sales_offers"
  //         }
  //       },
  //       "sharings": {
  //         "data": [
  //           {
  //             "id": "string",
  //             "type": "sharings"
  //           }
  //         ]
  //       },
  //       "recurrence_plan": {
  //         "data": {
  //           "id": "string",
  //           "type": "recurrence_plans"
  //         }
  //       },
  //       "active_e_document": {
  //         "data": {
  //           "id": "string",
  //           "type": "e_archives"
  //         }
  //       }
  //     }
  // },
  //   "included": [
  //     {
  //       "id": "string",
  //       "type": "item_categories",
  //       "attributes": { },
  //       "relationships": { }
  //     }
  //   ]
  // }

  /**
  *
  *  @version Master -- BetaTest
  *  @author Sercan güngör
  */

  public function create($array){

    $this->getResponse($access_token, 'POST', $this->baseEndPoint, $array);
  }

  /**
  *
  *  @version Master -- BetaTest
  *  @author Sercan güngör
  */

  public function Show($id){

    $this->getResponse($access_token, 'GET', $this->baseEndPoint. '/'. $id);
  }

  /**
  *
  *  @version Master -- BetaTest
  *  @author Sercan güngör
  */

  public function edit($id, $array){

    $this->getResponse($access_token, 'PUT', $this->baseEndPoint. '/'. $id, $array);
  }

    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function delete($id){

      $this->getResponse($access_token, 'DELETE', $this->baseEndPoint. '/'. $id);
    }

    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function pay($id, $array){

      $this->getResponse($access_token, 'POST', $this->baseEndPoint. '/'. $id. '/' . 'payments', $array);
    }

    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function cancel($id){

      $this->getResponse($access_token, 'DELETE', $this->baseEndPoint. '/'. $id. '/' . 'cancel');
    }

    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function recover($id){

      $this->getResponse($access_token, 'PATCH', $this->baseEndPoint. '/'. $id. '/' . 'recover');
    }

    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function archive($id){

      $this->getResponse($access_token, 'PATCH', $this->baseEndPoint. '/'. $id. '/' . 'archive');
    }

    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function unArchive($id){

      $this->getResponse($access_token, 'PATCH', $this->baseEndPoint. '/'. $id. '/' . 'unarchive');
    }

    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function convertToInvoice($id, $array){

      $this->getResponse($access_token, 'PATCH', $this->baseEndPoint. '/'. $id. '/' . 'convert_to_invoice');
    }
}
