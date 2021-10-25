<?php

declare(strict_types=1);

namespace Yatzy;

final class Dice
{
    private int $number;

    private function __construct(int $number)
    {
        $this->number = $number;
    }

    public static function createFromInt(int $number): self
    {
        return new self($number);
    }

    public function value(): int
    {
        return $this->number;
    }
}
