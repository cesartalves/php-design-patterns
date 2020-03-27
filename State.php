<?php

class Order {

  public function sendToEcommerce(){
    switch($this->status){
        case 'created':
          $params["access_token"] = "### Chave de Acesso ###";

          $data["Order"]["status_id"] = $this->status_id;
          $data["Order"]["taxes"] = $this->taxes;
          $data["Order"]["shipment_value"] = $this->shipment_value;
          $data["Order"]["discount"] = $this->discount;
          $data["Order"]["sending_date"] = $this->getSendingDate;
          $data["Order"]["store_note"] = $this->store_note;
          $data["Order"]["customer_note"] = $this->customerNote;
          $data["Order"]["partner_id"] = $this->partnerId;

          $url = "https://{api_address}/orders/123?".http_build_query($params);

          ob_start();

          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen(json_encode($data)))
          );
          curl_exec($ch);

          $resposta = json_decode(ob_get_contents());
          $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

          ob_end_clean();
          curl_close($ch);

          if($code == "200"){
              $this->status = 'sent';
          }
          else {
              $this->status = 'errorOnSending';
          }
          break;
        case 'sent':
          // huge code block
          break;
        case 'approved':
          // huge code block
          break;
        case 'rejected':
          // huge code block
          break;
        case 'delivered':
          // huge code block
          break;
        case 'errorOnSending':
          // hude code block
          break;

        // add infinitum
        default:
          break;
    }
  }
}

class Order {

  public function setStatus(OrderStatus $status){
    $this->status = $status;
  }

  public function sendToEcommerce() {
    $this->status->sendToEcommerce($this);
  }
}

interface OrderStatus {

  public function sendToEcommerce(Order $order);
}

class OrderCreated implements OrderStatus {

  public function __construct($next, ECommerceService $service){
    $this->nextStatus = $next;
    $this->ecommerceService = $service;
  }

  public function sendToEcommerce(Order $order){
    try {
      $this->ecommerceService->updateOrder($order);
      $this->$order->setStatus($this->$nextStatus);
    }
    catch(EcommerceCommunicationException $e){
      $this->order->setStatus($e->errorStatus);
    }
  }
}
