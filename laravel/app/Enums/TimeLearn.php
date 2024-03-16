<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum TimeLearn: string implements HasLabel
{
    case Ca1 = '07:15';
    case Ca2 = '09:25';
    case Ca3 = '12:00';
    case Ca4 = '14:10';
    case Ca5 = '16:20';
    case Ca6 = '18:30';
    case Ca7 = '20:30';

    public function getName(): string
    {
        return match ($this) {
            self::Ca1 => '07:15',
            self::Ca2 => '09:25',
            self::Ca3 => '12:00',
            self::Ca4 => '14:10',
            self::Ca5 => '16:20',
            self::Ca6 => '18:30',
            self::Ca7 => '20:30',

        };
    }

    public function getLabel(): string
    {
        return $this->name;
    }

}
