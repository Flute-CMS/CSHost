<?php

namespace Omnipay\CSHost\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    public function isSuccessful()
    {
        return false;
    }

    public function isRedirect()
    {
        return true;
    }

    public function getRedirectMethod()
    {
        return 'POST';
    }

    public function getRedirectUrl()
    {
        return 'https://cshost.com.ua/cassa';
    }

    public function getRedirectData()
    {
        return $this->data;
    }

    public function getMessage()
    {
        return $this->data;
    }
}
