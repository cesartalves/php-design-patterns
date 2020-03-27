<?php 

class Product1 {

  public function sendToMarketplace(){
    if ($this->marketplace == 'Amazon') {
      //huge code block
    } elseif ($this->marketplace == 'Via Varejo') {
      //huge code block
    } elseif ($this->marketplace == 'Magalu') {
      //do I need to say it again? :0
    }

    // this code expands to infinity. Every time a new marketplace is added
    // you need to change this :( (SRP violation, OCP violation)

  }
}

interface ProductContract {
  // this is what the product shows to the external world
}

interface MarketplaceDeliveryStrategy {
  public function sendToMarketplace(ProductContract $product);
}

class AmazonDeliveryStrategy implements MarketplaceDeliveryStrategy {
  // invert any dependencies, like http libraries, here
  public function __construct($dependencies = null){

  }

  public function sendToMarketplace(ProductContract $product){
    // succient code to execute delivery
  }
}

class MarketplaceDeliveryStrategyFactory {

  public function getStrategy($marketplace){
    //determine which strategy should be used

    return new AmazonDeliveryStrategy();
  }
}

class Product {

  public function __construct(MarketplaceDeliveryStrategyFactory $strategyFactory){
    $this->deliveryStrategy = $strategyFactory->getStrategy($this->marketplace);
  }

  public function sendToMarketplace(){
    $this->deliveryStrategy->sendToMarketplace($this);
  }

}
