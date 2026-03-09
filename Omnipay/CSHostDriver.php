<?php

namespace Flute\Modules\CSHost\Omnipay;

use Flute\Core\Modules\Payments\Drivers\AbstractOmnipayDriver;

class CSHostDriver extends AbstractOmnipayDriver
{
    public ?string $adapter = 'CSHost';
    public ?string $name = 'CSHost';
    public ?string $settingsView = 'flute-cshost::settings';

    public function getValidationRules(): array
    {
        return [
            'settings__idcassa'  => ['required', 'string', 'max-str-len:255'],
            'settings__secretKey'=> ['required', 'string', 'max-str-len:255'],
        ];
    }
} 