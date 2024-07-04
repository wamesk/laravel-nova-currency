<?php

namespace Wame\LaravelNovaCurrency\Enums;

enum ThousandsSeparatorEnum: string
{
    case SPACE = '1';
    case DOT = '2';

    public function char()
    {
        return match ($this) {
            self::SPACE => ' ',
            self::DOT => '.',
        };
    }
}
