<?php

declare(strict_types=1);

namespace Yatzy;

final class Yatzy
{
    /** @var list<int> */
    private array $dices;

    public function __construct(int ...$dices)
    {
        assert(count($dices) === 5);
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

    public function smallStraight(): int
    {
        $unique = array_unique($this->dices);

        if (count($unique) !== 5) {
            return 0;
        }

        $reduce = array_reduce($unique, static fn(int $carry, int $dice) => $carry + $dice, 0);

        return ($reduce === 15) ? 15 : 0;
    }

    public function largeStraight(): int
    {
        $unique = array_unique($this->dices);

        if (count($unique) !== 5) {
            return 0;
        }

        $reduce = array_reduce($unique, static fn(int $carry, int $dice) => $carry + $dice, 0);

        return ($reduce === 20) ? 20 : 0;
    }

    public function fullHouse(): int
    {
        $uniquePair = array_filter(
            array_count_values($this->dices),
            static fn($countValues) => $countValues === 2
        );

        $uniqueThrice = array_filter(
            array_count_values($this->dices),
            static fn($countValues) => $countValues === 3
        );

        if (count($uniquePair) !== 1 || count($uniqueThrice) !== 1) {
            return 0;
        }

        return array_key_first($uniquePair) * 2 + array_key_first($uniqueThrice) * 3;
    }

    private function calculateSumOfDuplicatedNumber(int $value): int
    {
        return array_reduce(
            array_filter($this->dices, static fn(int $dice) => $value === $dice),
            static fn(int $carry, int $dice) => $carry + $dice,
            0
        );
    }
}
