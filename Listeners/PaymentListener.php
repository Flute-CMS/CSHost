<?php

namespace Flute\Modules\CSHost\Listeners;

class PaymentListener
{
    public static function registerCSHost()
    {
        app()->getLoader()->addPsr4('Omnipay\\CSHost\\', module_path('CSHost', 'Omnipay/'));
        app()->getLoader()->register();
    }
}