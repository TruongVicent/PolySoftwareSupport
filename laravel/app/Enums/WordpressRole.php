<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;


enum WordpressRole: string implements HasLabel
{
    case Theme = 'Theme';
    case Plugin = 'Plugin';


    public function getName(): string
    {
        return match ($this) {
            self::Theme => 'Theme',
            self::Plugin => 'Plugin',

        };
    }

    public function getLabel(): string
    {
        return $this->name;
    }

}
