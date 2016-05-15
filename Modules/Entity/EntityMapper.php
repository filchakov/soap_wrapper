<?php

namespace Modules\Entity;

use Psr\Http\Message\ResponseInterface;

abstract class EntityMapper implements IEntityAPI{

    private $client = null;

    /**
     * @var null
     */
    private $url = null;

    /**
     * EntityMapper constructor.
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
     * @return boolean
     */
    function update($id, $options)
    {
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
        error_reporting(E_ALL);


        if(isset($options['id']) && $options['id'] == 0){
            unset($options['id']);
        }
        $url = $this->getUrl() . (!empty($options['id'])? '/'.$options['id'] : '');

        $response['body'] = $options;


        $resp = $this->buildOptions($type, $options, $url);

        $result = json_decode($resp, 1);

        if(isset($result['error'])){
            new \Exception($result['error']);
        }

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
     * @param $id
     * @param array $params
     * @return array
     */
    private function buildParams($id, $params = [])
    {
        $params['id'] = $id;
        return $params;
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
    private function buildOptions($type, $options, $url)
    {
        $curl = $this->getClient();
        $options = json_decode(json_encode($options), 1);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($curl, CURLOPT_URL, REST_SERVER . $url);

        switch ($type) {
            case "GET":
                curl_setopt($curl, CURLOPT_HTTPGET, 1);
                curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 15);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));

                break;
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($options));
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($options));
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
                break;
            case "DELETE":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
                break;
        }

        $resp = curl_exec($curl);

        curl_close($curl);

        return $resp;
    }

}