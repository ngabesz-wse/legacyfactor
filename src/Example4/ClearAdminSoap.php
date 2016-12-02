<?php

/**
 * Created by PhpStorm.
 * User: gabornagy
 * Date: 2016. 12. 01.
 * Time: 10:56
 */
class ClearAdminSoap
{

    /** @var String */
    protected $url = 'http://soaptest.example.com/reseller.wsdl';

    /** @var Array */
    protected $errors = array();

    /**
     * Constructor
     */
    public function __construct()
    {
            $this->client = new SoapClient($this->url, array(
                'encoding' => 'UTF-8'
            ));
    }

    public function addOssze($a, $b)
    {
        // convert data to the right format
        $params = array(
            "values"=>array(
                'a'=>intval($a),
                'b'=>intval($b)
            )
        );

        return $this->client->__soapCall('AddOssze', $params);
    }
}