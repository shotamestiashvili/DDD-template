<?php

namespace Rank\Domain\Enums;

enum RankEnums: int
{
    case Silver = 100;
    case Gold = 200;
    case Platinum = 300;
    case Diamond = 400;

    public static function getRank(int $value): string {
        return match (true) {
            $value <= RankEnums::Silver->value => RankEnums::Silver->name,
            $value <= RankEnums::Gold->value => RankEnums::Gold->name,
            $value <= RankEnums::Platinum->value => RankEnums::Platinum->name,
            $value <= RankEnums::Diamond->value => RankEnums::Diamond->name,
        };
    }
}
