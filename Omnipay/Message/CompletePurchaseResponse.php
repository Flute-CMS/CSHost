<?php

namespace Omnipay\CSHost\Message;

use Omnipay\Common\Message\AbstractResponse;

class CompletePurchaseResponse extends AbstractResponse
{
    public function isSuccessful()
    {
        return isset($this->data['status']) && $this->data['status'] == '1';
    }

    public function getTransactionId()
    {
        return isset($this->data['idpay']) ? $this->data['idpay'] : null;
    }

    public function getMessage()
    {
        // ??
        return isset($this->data['error']) ? $this->data['error'] : null;
    }
}
