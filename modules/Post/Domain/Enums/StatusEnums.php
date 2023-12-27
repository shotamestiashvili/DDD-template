<?php

namespace Post\Domain\Enums;

enum StatusEnums: string
{
    case APPROVED = 'APPROVED';
    case REJECTED = 'REJECTED';
    case SUSPENDED = 'SUSPENDED';

}
