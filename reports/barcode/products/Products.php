<?php
require_once "../../../common.php";

use \koolreport\processes\Filter;

class Products extends koolreport\KoolReport
{
    function settings()
    {
        return array(
            "dataSources"=>array(
                "products"=>array(
                'filePath' => '../../../data/products.csv',
                'fieldSeparator' => '|',
                'class' => "\koolreport\datasources\CSVDataSource"      
                ),
            )
        );
    }
    
    function setup()
    {
        $node = $this->src('products')
        ->pipe(new Filter(array(
            array('productLine', '=', 'Ships'),
        )))
        ->pipe($this->dataStore('products'));  
    }
}
