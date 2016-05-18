<?php
namespace Modules\LibraryModule;

use Modules\LibraryModule\Entity\EntityMapper;
use SoapFault;

abstract class AbstractService {

    /**
     * Authenticates the SOAP request. (This one is the key to the authentication, it will be called upon the server request)
     *
     * @param string $accessToken
     * @param string $secretKey
     * @return boolean
     * @throws \SoapFault
     */
    public function Header($accessToken, $secretKey)
    {
        if(!empty($accessToken) && !empty($secretKey)) {
            $this->getMapper()->setAccessToken($accessToken)->setSecretKey($secretKey);
        } else {
            throw new \SoapFault("401", EntityMapper::INVALID_CREDENTIALS);
        }
    }

    /**
     * @return \Modules\LibraryModule\Entity\EntityMapper
     */
    abstract protected function getMapper();

}