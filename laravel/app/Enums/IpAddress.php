<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum IpAddress: string implements HasLabel
{
    case IpAddressOne = '192.168.1.1';

    // case IpAddressOne = '172.16.16.1';

    public function getName(): string
    {
        return match ($this) {
            self::IpAddressOne => 'Trường 1',
        };
    }

    public function getLabel(): string
    {
        return $this->name;
    }

}
