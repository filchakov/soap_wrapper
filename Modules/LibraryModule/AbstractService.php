<?php
namespace Modules\LibraryModule;

use Modules\LibraryModule\Entity\EntityMapper;
use SoapFault;

abstract class AbstractService {

    /**
     * Authenticates the SOAP request. (This one is the key to the authentication, it will be called upon the server request)
     * @param string $accessToken
     * @return boolean
     */

    /*public function Header($accessToken)
    {
        $this->getMapper()->setAccessToken($accessToken);
    }*/

    /**
     * @return \Modules\LibraryModule\Entity\EntityMapper
     */
    abstract protected function getMapper();

}