<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Stocks extends Application {
 
 
    function __construct()
    {
        parent::__construct();
    }
 
    public function index()
    {
        $this->data['stocks'] = $this->Stock->getStocks(BSX_SERVER.'data/stocks');
        $this->data['pagebody'] = 'stocks_view';
        $this->render();
    }
   
   
   function getStockDetail($name)
    {
        $this->data['stockDetail'] = $this->Stock->getStockInfo($name);
        $this->data['stocktransactions']  = $this->stock->getStockTrans($name);
        $this->data['stockMovements'] = $this->Stock->getStockMovement($name);
        $this->data['pagebody'] = 'stocks_detail';
        $this->render();
    }
   
   
}