<?php

namespace Omnipay\CSHost;

use Omnipay\Common\AbstractGateway;

class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'CSHost';
    }

    public function getDefaultParameters()
    {
        return [
            'idcassa' => '',
            'secretKey' => '',
        ];
    }

    public function getIdCassa()
    {
        return $this->getParameter('idcassa');
    }

    public function setIdCassa($value)
    {
        return $this->setParameter('idcassa', $value);
    }

    public function getSecretKey()
    {
        return $this->getParameter('secretKey');
    }

    public function setSecretKey($value)
    {
        return $this->setParameter('secretKey', $value);
    }

    public function purchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\CSHost\Message\PurchaseRequest', $parameters);
    }

    public function completePurchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\CSHost\Message\CompletePurchaseRequest', $parameters);
    }
}
