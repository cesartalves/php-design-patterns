<?php

interface MarketplaceFacadeFactory {

    public function getFacade(Product $product);

}

class AmazonFacadeFactory implements MarketplaceFacadeFactory {

}

# encapsulates complex operations
interface MarketplaceFacade {
    public function sendProduct();
}

class AmazonFacade implements MarketplaceFacade {

}

class SkyhubFacade implements MarketplaceFacade {

} 

# usage example

class MarketplaceMiddleware implements MiddlewareContract {

  public function dispatch(Request $request, $next){
    if $request->path->include('amazon'){
      $dependencyContainer->attach('MarketplaceFacadeFactory', new AmazonFacadeFactory());
    }

    # logic per marketplace

    return $next->dispatch($request);
  }
}

class ProductsController {

    public function __construct(MarketplaceFacadeFactory $facadeFactory, ProductRepository $repository){
        $this->facadeFactory = $facadeFactory;
        $this->repository = $repository;
    }

    public function send(Request $request, int $productId){

        $product = $this->repository->findByID($productId);

        $facade = $this->facadeFactory->getFacade($product);
    }
}




