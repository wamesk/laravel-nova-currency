<?php

namespace Wame\LaravelNovaCurrency\Enums;

enum DecimalSeparatorEnum: string
{
    case COMMA = '1';
    case DOT = '2';

    public function char()
    {
        return match ($this) {
            self::COMMA => ',',
            self::DOT => '.',
        };
    }
}
