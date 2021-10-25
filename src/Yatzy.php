<?php

declare(strict_types=1);

namespace Yatzy;

final class Yatzy
{
    /** @var list<int> */
    private array $dices;

    public function __construct(int ...$dices)
    {
        $this->dices = [...$dices];
    }

    public function chance(): int
    {
        return array_sum($this->dices);
    }

    public function yatzyScore(): int
    {
        $unique = array_unique($this->dices, SORT_NUMERIC);
        if (1 === count($unique)) {
            return 50;
        }

        return 0;
    }

    public function ones(): int
    {
        return count(array_filter($this->dices, static fn(int $dice) => 1 === $dice));
    }

    public function twos(): int
    {
        return $this->calculateSumOfDuplicatedNumber(2);
    }

    public function threes(): int
    {
        return $this->calculateSumOfDuplicatedNumber(3);
    }

    public function fours(): int
    {
        return $this->calculateSumOfDuplicatedNumber(4);
    }

    public function fives(): int
    {
        return $this->calculateSumOfDuplicatedNumber(5);
    }

    public function sixes(): int
    {
        return $this->calculateSumOfDuplicatedNumber(6);
    }

    public function scorePair(): int
    {
        $unique = array_filter(
            array_count_values($this->dices),
            static fn($countValues) => $countValues >= 2
        );

        if (empty($unique)) {
            return 0;
        }

        krsort($unique);

        return 2 * (int)array_key_first($unique);
    }

    public function twoPair(): int
    {
        $unique = array_filter(
            array_count_values($this->dices),
            static fn($countValues) => $countValues >= 2
        );

        if (count($unique) < 2) {
            return 0;
        }

        krsort($unique);

        $keys = array_keys($unique);

        return $keys[0] * 2 + $keys[1] * 2;
    }

    public function threeOfAKind(): int
    {
        $unique = array_filter(
            array_count_values($this->dices),
            static fn($countValues) => $countValues >= 3
        );

        if (empty($unique)) {
            return 0;
        }

        krsort($unique);

        return 3 * (int)array_key_first($unique);
    }

    public function smallStraight(int $dice1, int $dice2, int $dice3, int $dice4, int $dice5): int
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

    public function largeStraight(int $dice1, int $dice2, int $dice3, int $dice4, int $dice5): int
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

    public function fullHouse(int $dice1, int $dice2, int $dice3, int $dice4, int $dice5): int
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

    private function calculateSumOfDuplicatedNumber(int $value): int
    {
        return array_reduce(
            array_filter($this->dices, static fn(int $dice) => $value === $dice),
            static fn(int $carry, int $number) => $carry + $number,
            0
        );
    }
}
