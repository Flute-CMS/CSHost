<?php

namespace Flute\Modules\CSHost\ServiceProviders;

use Flute\Core\Modules\Payments\Events\RegisterPaymentFactoriesEvent;
use Flute\Core\Support\ModuleServiceProvider;
use Flute\Modules\CSHost\Listeners\PaymentListener;
use Flute\Core\Modules\Payments\Factories\PaymentDriverFactory;
use Flute\Modules\CSHost\Omnipay\CSHostDriver;

class CSHostServiceProvider extends ModuleServiceProvider
{
    public array $extensions = [];

    public function boot(\DI\Container $container): void
    {
        $this->bootstrapModule();
        $this->loadViews('Resources/views', 'flute-cshost');
        app(PaymentDriverFactory::class)->register('CSHost', CSHostDriver::class);
        events()->addDeferredListener(RegisterPaymentFactoriesEvent::NAME, [PaymentListener::class, 'registerCSHost']);
    }

    public function register(\DI\Container $container): void
    {
    }
}