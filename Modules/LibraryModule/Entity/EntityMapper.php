<?php

namespace Modules\LibraryModule\Entity;

use Psr\Http\Message\ResponseInterface;
use SoapFault;
use \SimpleXMLElement;

abstract class EntityMapper implements IEntityAPI{

    private $client = null;
    const INVALID_CREDENTIALS = 'Invalid access token or secret key';

    /**
     * @var null
     */
    private $url = null;

    /**
     * @var null
     */
    private $queryParams = null;

    /**
     * @var string
     */
    private $accessToken = '';

    /**
     * EntityMapper constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this
            ->setClient()
            ->setUrl($url);
    }

    /**
     * Show all entity
     * @return mixed|ResponseInterface
     */
    function show()
    {
        return $this->sendRequest('GET');
    }


    /**
     * Show a single entity
     * @param $id
     * @return mixed|ResponseInterface
     * @throws SoapFault
     */
    function get($id)
    {
        return $this->sendRequest('GET', ['id' => $id]);
    }

    /**
     * Insert new entity
     * @param $options
     * @return mixed|ResponseInterface
     */
    function insert($options)
    {
        return $this->sendRequest('POST', $options);
    }

    /**
     * Update single entity
     * @param $id
     * @param $options
     * @return array
     */
    function update($id, $options)
    {
        $options['id'] = $id;
        return $this->sendRequest('PUT', $options);
    }


    /**
     * Delete entity
     * @param $id
     * @return mixed|ResponseInterface
     */
    function delete($id)
    {
        return $this->sendRequest('DELETE', ['id' => $id]);
    }

    /**
     * @param $type
     * @param array $options
     * @return mixed|ResponseInterface
     */
    private function sendRequest($type, $options = []){

        $this->checkToken();

        if(isset($options['id']) && $options['id'] === 0){
            unset($options['id']);
        }

        $url = $this->getUrlForRequest($options);

        $result = $this->sendRequestToAPI($type, $options, $url);

        return $result;
    }

    /**
     * @return resource a cURL handle on success, false on errors.
     */
    private function getClient()
    {
        return $this->client;
    }

    /**
     * @return $this
     */
    private function setClient()
    {
        $this->client = curl_init();
        return $this;
    }

    /**
     * @return null
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param null $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }


    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     * @return $this
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    /**
     * @return null
     */
    public function getQueryParams()
    {
        return $this->queryParams;
    }

    /**
     * @param null $queryParams
     * @return $this
     */
    public function setQueryParams($queryParams)
    {
        $queryParams = array_filter($queryParams);
        $this->queryParams = $queryParams;
        return $this;
    }

    /**
     * @param array $objectData
     * @return mixed
     */
    abstract protected function buildObject(array $objectData);

    /**
     * @param $type
     * @param $options
     * @param $url
     * @return mixed
     */
    private function sendRequestToAPI($type, $options, $url)
    {
        $curl = $this->getClient();
        $options = json_decode(json_encode($options), 1);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_URL, REST_SERVER . $url);

        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->getHeaders());

        switch ($type) {
            case "GET":
                curl_setopt($curl, CURLOPT_HTTPGET, 1);
                curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 15);

                break;
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($options));
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($options));
                break;
            case "DELETE":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
                break;
        }

        $result = json_decode(curl_exec($curl), 1);

        /*var_dump(REST_SERVER . $url);
        echo 'options';
        var_dump($options);

        echo 'results';
        var_dump($result);


        var_dump($curl);

        die;*/

        $this->handlerException($result, curl_getinfo($curl));

        curl_close($curl);

        if(empty($result) && $type == 'DELETE'){
            $result = true;
        }

        return $result;
    }

    /**
     * @return array
     */
    private function getHeaders()
    {
        return array(
            'Content-Type: application/json; charset=utf-8',
            'X-Authorization: ' . $this->getAccessToken()
        );
    }

    /**
     * @param $result
     * @param $curl
     * @throws SoapFault
     */
    private function handlerException($result, $curl)
    {
        $code = 500;

        if($curl['http_code'] != 200){
            throw new SoapFault((string)$curl['http_code'], json_encode($result['result']));
        }

        if (isset($result['error'])) {

            switch ($result['error']) {
                case 'not found':
                    $code = 404;
                    break;
                case 'You are unauthorized to make this request.':
                    $code = 401;
                    $result['error'] = self::INVALID_CREDENTIALS;
                    break;
            }

            throw new SoapFault((string)$code, $result['error']);

        } elseif ($result['result'] == 'Server error') {
            throw new SoapFault((string)$code, $result['result']);
        }
    }

    /**
     * @throws SoapFault
     */
    private function checkToken()
    {
        if(empty($this->getAccessToken())) {
            throw new \SoapFault("401", EntityMapper::INVALID_CREDENTIALS);
        }
    }

    /**
     * @param $options
     * @return string
     */
    private function getUrlForRequest($options)
    {
        $result = $this->getUrl() . (!empty($options['id']) ? '/' . $options['id'] : '');

        if(!is_null($this->getQueryParams()) && !empty($this->getQueryParams())){
            $result .= '?' . http_build_query($this->getQueryParams());
        }

        return $result;
    }

    protected function array_to_xml($array, &$xml_user_info) {
        foreach($array as $key => $value) {
            if(is_array($value)) {
                if(!is_numeric($key)){
                    $subnode = $xml_user_info->addChild("$key");
                    $this->array_to_xml($value, $subnode);
                }else{
                    $subnode = $xml_user_info->addChild("item");
                    $this->array_to_xml($value, $subnode);
                }
            }else {
                $xml_user_info->addChild("$key",htmlspecialchars("$value"));
            }
        }
    }


    protected function __encode($t) {
        $xml_user_info = new SimpleXMLElement("<root/>");
        $this->array_to_xml($t, $xml_user_info);
        return $xml_user_info->asXML();
    }

}