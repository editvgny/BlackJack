<?php


class PointCounter {
    /**
     * @param $deck
     * @return float|int|mixed
     */
    public static function bestPointCounter($deck) {
        $point = 0;
        foreach ($deck as $card) {
            $point += $card->getPoint();
        }
        if ($point > 21) {
            if (self::getNumberOFAce($deck) == 1) {
                $point -= 10;
                return $point;
            } elseif (self::getNumberOFAce($deck) > 1) {
                $point -= (self::getNumberOFAce($deck) - 1) * 10;
                if ($point < 22) {
                    return $point;
                }
                return $point - 10;
            }
        }
        return $point;
    }

    /**
     * @param $deck
     * @return int
     */
    public static function getNumberOFAce($deck): int {
        $counter = 0;
        foreach ($deck as $card) {
            if ($card->getValue() == "A") {
                $counter += 1;
            }
        }
        return $counter;
    }
}