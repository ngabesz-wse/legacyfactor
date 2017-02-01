<?php

namespace Example4;
/**
 * Example4
 *
 * In this example we are facing with a dependency of an external service.
 * The first step is to locate what should we cover with test.
 * We chan rely on PHP's SoapClient class so this dont need to be tested.
 * The only thing we can test is the logic in addOssze method
 * to ensure that SoapClient's __soapCall method will be called with the right parameters.
 * To achieve this, first you have to create a mock of the SoapClient object.
 * There is a problem with this because the class is created in the ClearAdminSoap's
 * constructor so there is no way to replace it with a mock.
 * One possible solution is to create a setter method to SoapClient what can override
 * the object which was created by the constructor.
 * This works fine but not the cleanest solution because you will modify the interface of the class.
 * A much more cleaner way if you use the new method technique like in Example1 and Example2
 * and move the instantiation of SoapClient to a new method.
 * In this way you can test that your mock will be called with the expected parameters.
 *
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
        $this->client = $this->getClient();
    }

    public function addOssze($a, $b)
    {
        // convert data to the right format
        $params = array(
            "values" => array(
                'a' => intval($a),
                'b' => intval($b)
            )
        );

        return $this->client->__soapCall('AddOssze', $params);
    }

    protected function getClient()
    {
        return new \SoapClient($this->url, array(
            'encoding' => 'UTF-8'
        ));
    }
}