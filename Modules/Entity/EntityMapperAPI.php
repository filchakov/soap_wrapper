<?php

namespace Modules\Entity;

use Psr\Http\Message\ResponseInterface;

abstract class EntityMapperAPI implements IEntityAPI{

    /**
     * @var \GuzzleHttp\Client
     */
    private $client = null;

    /**
     * @var null
     */
    private $url = null;

    /**
     * EntityMapperAPI constructor.
     */
    public function __construct($url)
    {
        $this
            ->setClient(new \GuzzleHttp\Client([
                'base_uri' => REST_SERVER
            ]))
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
        return $this->sendRequest('GET', $options);
    }

    /**
     * Update single entity
     * @param $id
     * @param $options
     * @return boolean
     */
    function update($id, $options)
    {
        return $this->sendRequest('DELETE', $this->buildParams($id, $options));
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

        $url = $this->getUrl() . (!empty($options['id'])? '/'.$options['id'] : '');

        return json_decode($this->getClient()->request($type, $url, $options)->getBody()->getContents(), 1);
    }

    /**
     * @return \GuzzleHttp\Client
     */
    private function getClient()
    {
        return $this->client;
    }

    /**
     * @param \GuzzleHttp\Client $client
     * @return $this
     */
    private function setClient(\GuzzleHttp\Client $client)
    {
        $this->client = $client;
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

}