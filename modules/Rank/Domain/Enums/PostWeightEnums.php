<?php

namespace Rank\Domain\Enums;

enum PostWeightEnums: int
{
    case LIKE = 3;
    case DISLIKE = -1;
}
