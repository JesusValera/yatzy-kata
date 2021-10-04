<?php

declare(strict_types=1);

namespace Yatzy;

class Yatzy
{
    /** @var list<int> */
    private array $dice;

    public function __construct(int $dice1, int $dice2, int $dice3, int $dice4, int $dice5)
    {
        $this->dice = array_fill(0, 6, 0);
        $this->dice[0] = $dice1;
        $this->dice[1] = $dice2;
        $this->dice[2] = $dice3;
        $this->dice[3] = $dice4;
        $this->dice[4] = $dice5;
    }

    public static function chance(int $dice1, int $dice2, int $dice3, int $dice4, int $dice5): int
    {
        $total = 0;
        $total += $dice1;
        $total += $dice2;
        $total += $dice3;
        $total += $dice4;
        $total += $dice5;

        return $total;
    }

    /**
     * @param list<int> $diceScore
     */
    public static function yatzyScore(array $diceScore): int
    {
        $counts = array_fill(0, count($diceScore) + 1, 0);
        foreach ($diceScore as $dice) {
            $counts[$dice - 1] += 1;
        }
        foreach (range(0, count($counts) - 1) as $i) {
            if ($counts[$i] == 5) {
                return 50;
            }
        }

        return 0;
    }

    public static function ones(int $dice1, int $dice2, int $dice3, int $dice4, int $dice5): int
    {
        $sum = 0;
        if ($dice1 == 1) {
            $sum += 1;
        }
        if ($dice2 == 1) {
            $sum += 1;
        }
        if ($dice3 == 1) {
            $sum += 1;
        }
        if ($dice4 == 1) {
            $sum += 1;
        }
        if ($dice5 == 1) {
            $sum += 1;
        }

        return $sum;
    }

    public static function twos(int $dice1, int $dice2, int $dice3, int $dice4, int $dice5): int
    {
        $sum = 0;
        if ($dice1 == 2) {
            $sum += 2;
        }
        if ($dice2 == 2) {
            $sum += 2;
        }
        if ($dice3 == 2) {
            $sum += 2;
        }
        if ($dice4 == 2) {
            $sum += 2;
        }
        if ($dice5 == 2) {
            $sum += 2;
        }

        return $sum;
    }

    public static function threes(int $dice1, int $dice2, int $dice3, int $dice4, int $dice5): int
    {
        $s = 0;
        if ($dice1 == 3) {
            $s += 3;
        }
        if ($dice2 == 3) {
            $s += 3;
        }
        if ($dice3 == 3) {
            $s += 3;
        }
        if ($dice4 == 3) {
            $s += 3;
        }
        if ($dice5 == 3) {
            $s += 3;
        }

        return $s;
    }

    public function fours(): int
    {
        $sum = 0;
        for ($at = 0; $at != 5; $at++) {
            if ($this->dice[$at] == 4) {
                $sum += 4;
            }
        }
        return $sum;
    }

    public function Fives(): int
    {
        $s = 0;
        $i = 0;
        for ($i = 0; $i < 5; $i++) {
            if ($this->dice[$i] == 5) {
                $s = $s + 5;
            }
        }

        return $s;
    }

    public function sixes(): int
    {
        $sum = 0;
        for ($at = 0; $at < 5; $at++) {
            if ($this->dice[$at] == 6) {
                $sum = $sum + 6;
            }
        }

        return $sum;
    }

    public static function score_pair(int $dice1, int $dice2, int $dice3, int $dice4, int $dice5): int
    {
        $counts = array_fill(0, 6, 0);
        $counts[$dice1 - 1] += 1;
        $counts[$dice2 - 1] += 1;
        $counts[$dice3 - 1] += 1;
        $counts[$dice4 - 1] += 1;
        $counts[$dice5 - 1] += 1;
        for ($at = 0; $at != 6; $at++) {
            if ($counts[6 - $at - 1] == 2) {
                return (6 - $at) * 2;
            }
        }

        return 0;
    }

    public static function two_pair(int $dice1, int $dice2, int $dice3, int $dice4, int $dice5): int
    {
        $counts = array_fill(0, 6, 0);
        $counts[$dice1 - 1] += 1;
        $counts[$dice2 - 1] += 1;
        $counts[$dice3 - 1] += 1;
        $counts[$dice4 - 1] += 1;
        $counts[$dice5 - 1] += 1;
        $n = 0;
        $score = 0;
        for ($i = 0; $i != 6; $i++) {
            if ($counts[6 - $i - 1] >= 2) {
                $n = $n + 1;
                $score += (6 - $i);
            }
        }

        if ($n == 2) {
            return $score * 2;
        }

        return 0;
    }

    public static function three_of_a_kind(int $dice1, int $dice2, int $dice3, int $dice4, int $dice5): int
    {
        $t = array_fill(0, 6, 0);
        $t[$dice1 - 1] += 1;
        $t[$dice2 - 1] += 1;
        $t[$dice3 - 1] += 1;
        $t[$dice4 - 1] += 1;
        $t[$dice5 - 1] += 1;
        for ($i = 0; $i != 6; $i++) {
            if ($t[$i] >= 3) {
                return ($i + 1) * 3;
            }
        }

        return 0;
    }

    public static function smallStraight(int $dice1, int $dice2, int $dice3, int $dice4, int $dice5): int
    {
        $tallies = array_fill(0, 6, 0);
        $tallies[$dice1 - 1] += 1;
        $tallies[$dice2 - 1] += 1;
        $tallies[$dice3 - 1] += 1;
        $tallies[$dice4 - 1] += 1;
        $tallies[$dice5 - 1] += 1;
        if ($tallies[0] == 1 &&
            $tallies[1] == 1 &&
            $tallies[2] == 1 &&
            $tallies[3] == 1 &&
            $tallies[4] == 1) {
            return 15;
        }

        return 0;
    }

    public static function largeStraight(int $dice1, int $dice2, int $dice3, int $dice4, int $dice5): int
    {
        $tallies = array_fill(0, 6, 0);
        $tallies[$dice1 - 1] += 1;
        $tallies[$dice2 - 1] += 1;
        $tallies[$dice3 - 1] += 1;
        $tallies[$dice4 - 1] += 1;
        $tallies[$dice5 - 1] += 1;
        if ($tallies[1] == 1 &&
            $tallies[2] == 1 &&
            $tallies[3] == 1 &&
            $tallies[4] == 1 &&
            $tallies[5] == 1) {
            return 20;
        }

        return 0;
    }

    public static function fullHouse(int $dice1, int $dice2, int $dice3, int $dice4, int $dice5): int
    {
        $tallies = [];
        $_2 = false;
        $i = 0;
        $_2_at = 0;
        $_3 = false;
        $_3_at = 0;

        $tallies = array_fill(0, 6, 0);
        $tallies[$dice1 - 1] += 1;
        $tallies[$dice2 - 1] += 1;
        $tallies[$dice3 - 1] += 1;
        $tallies[$dice4 - 1] += 1;
        $tallies[$dice5 - 1] += 1;

        foreach (range(0, 5) as $i) {
            if ($tallies[$i] == 2) {
                $_2 = true;
                $_2_at = $i + 1;
            }
        }

        foreach (range(0, 5) as $i) {
            if ($tallies[$i] == 3) {
                $_3 = true;
                $_3_at = $i + 1;
            }
        }

        if ($_2 && $_3) {
            return $_2_at * 2 + $_3_at * 3;
        }

        return 0;
    }
}
