<?php

declare(strict_types=1);

namespace App\Collector\Currency\Filter\Enum;

enum FilterType
{
    case WHITELIST;
    case BLACKLIST;
}
