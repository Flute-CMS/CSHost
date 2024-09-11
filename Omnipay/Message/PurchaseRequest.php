<?php

namespace Omnipay\CSHost\Message;

use Omnipay\Common\Message\AbstractRequest as OmnipayRequest;

class PurchaseRequest extends OmnipayRequest
{
    public function getEndpoint()
    {
        return 'https://cshost.com.ua/cassa';
    }

    public function getData()
    {
        $this->validate('amount', 'idcassa', 'secretKey', 'transactionId');

        $data = [];
        $data['sum'] = (int) $this->getAmount();
        $data['idpay'] = $this->getTransactionId();
        $data['ps'] = 'p2p';
        $data['userdata'] = user()->id;
        $data['idcassa'] = $this->getIdCassa();
        $data['timer'] = substr(time(), -4);
        $data['sign'] = $this->generateSignature($data);

        return $data;
    }

    protected function generateSignature($data)
    {
        $hashStr = $data['userdata'] . '|' . $data['idcassa'] . '|' . $data['idpay'] . '|' . $this->getSecretKey();
        return hash('sha256', $hashStr);
    }

    public function sendData($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
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
