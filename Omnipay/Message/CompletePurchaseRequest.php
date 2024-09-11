<?php

namespace Omnipay\CSHost\Message;

use Omnipay\Common\Message\AbstractRequest;

class CompletePurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $data = $this->httpRequest->request->all();

        if (!$this->isValidSignature($data)) {
            throw new \Exception('Invalid signature');
        }

        $this->setTransactionId($data['idpay']);

        return $data;
    }

    protected function isValidSignature($data)
    {
        $hashStr = $data['userdata'] . '|' . $data['idcassa'] . '|' . $data['idpay'] . '|' . $this->getSecretKey();
        $expectedSign = hash('sha256', $hashStr);

        return $data['sign'] === $expectedSign;
    }

    public function sendData($data)
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
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
}
