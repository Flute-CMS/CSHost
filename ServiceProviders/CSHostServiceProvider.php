<?php

namespace Flute\Modules\CSHost\ServiceProviders;

use Flute\Core\Payments\Events\RegisterPaymentFactoriesEvent;
use Flute\Core\Support\ModuleServiceProvider;
use Flute\Modules\CSHost\Listeners\PaymentListener;

class CSHostServiceProvider extends ModuleServiceProvider
{
    public array $extensions = [];

    public function boot(\DI\Container $container): void
    {
        events()->addDeferredListener(RegisterPaymentFactoriesEvent::NAME, [PaymentListener::class, 'registerCSHost']);
    }

    public function register(\DI\Container $container): void
    {
    }
}