<?php

namespace Rank\Domain\Enums;

enum CommentWeightEnums: int
{
    case LIKE = 2;
    case DISLIKE = -1;
}
