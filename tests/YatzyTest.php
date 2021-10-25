<?php

declare(strict_types=1);

namespace Yatzy\Tests;

use PHPUnit\Framework\TestCase;
use Yatzy\Dice;
use Yatzy\Yatzy;

final class YatzyTest extends TestCase
{
    public function test_chance_scores_sum_of_all_dice(): void
    {
        self::assertSame(
            15,
            (new Yatzy(
                Dice::createFromInt(2),
                Dice::createFromInt(3),
                Dice::createFromInt(4),
                Dice::createFromInt(5),
                Dice::createFromInt(1),
            ))->chance()
        );

        self::assertSame(
            16,
            (new Yatzy(
                Dice::createFromInt(3),
                Dice::createFromInt(3),
                Dice::createFromInt(4),
                Dice::createFromInt(5),
                Dice::createFromInt(1),
            ))->chance()
        );
    }

    public function test_yatzy_scores_50(): void
    {
        self::assertSame(
            50,
            (new Yatzy(
                Dice::createFromInt(4),
                Dice::createFromInt(4),
                Dice::createFromInt(4),
                Dice::createFromInt(4),
                Dice::createFromInt(4),
            ))->yatzyScore()
        );

        self::assertSame(
            50,
            (new Yatzy(
                Dice::createFromInt(6),
                Dice::createFromInt(6),
                Dice::createFromInt(6),
                Dice::createFromInt(6),
                Dice::createFromInt(6),
            ))->yatzyScore()
        );

        self::assertSame(
            0,
            (new Yatzy(
                Dice::createFromInt(6),
                Dice::createFromInt(6),
                Dice::createFromInt(6),
                Dice::createFromInt(6),
                Dice::createFromInt(3),
            ))->yatzyScore()
        );
    }

    public function test_ones(): void
    {
        self::assertSame(
            1,
            (new Yatzy(
                Dice::createFromInt(1),
                Dice::createFromInt(2),
                Dice::createFromInt(3),
                Dice::createFromInt(4),
                Dice::createFromInt(5),
            ))->ones()
        );

        self::assertSame(
            2,
            (new Yatzy(
                Dice::createFromInt(1),
                Dice::createFromInt(2),
                Dice::createFromInt(1),
                Dice::createFromInt(4),
                Dice::createFromInt(5),
            ))->ones()
        );

        self::assertSame(
            0,
            (new Yatzy(
                Dice::createFromInt(6),
                Dice::createFromInt(2),
                Dice::createFromInt(2),
                Dice::createFromInt(4),
                Dice::createFromInt(5),
            ))->ones()
        );

        self::assertSame(
            4,
            (new Yatzy(
                Dice::createFromInt(1),
                Dice::createFromInt(2),
                Dice::createFromInt(1),
                Dice::createFromInt(1),
                Dice::createFromInt(1),
            ))->ones()
        );
    }

    public function test_twos(): void
    {
        self::assertSame(
            4,
            (new Yatzy(
                Dice::createFromInt(1),
                Dice::createFromInt(2),
                Dice::createFromInt(3),
                Dice::createFromInt(2),
                Dice::createFromInt(6),
            ))->twos()
        );

        self::assertSame(
            10,
            (new Yatzy(
                Dice::createFromInt(2),
                Dice::createFromInt(2),
                Dice::createFromInt(2),
                Dice::createFromInt(2),
                Dice::createFromInt(2),
            ))->twos()
        );
    }

    public function test_threes(): void
    {
        self::assertSame(
            6,
            (new Yatzy(
                Dice::createFromInt(1),
                Dice::createFromInt(2),
                Dice::createFromInt(3),
                Dice::createFromInt(2),
                Dice::createFromInt(3),
            ))->threes()
        );

        self::assertSame(
            12,
            (new Yatzy(
                Dice::createFromInt(2),
                Dice::createFromInt(3),
                Dice::createFromInt(3),
                Dice::createFromInt(3),
                Dice::createFromInt(3),
            ))->threes()
        );
    }

    public function test_fours(): void
    {
        self::assertSame(
            12,
            (new Yatzy(
                Dice::createFromInt(4),
                Dice::createFromInt(4),
                Dice::createFromInt(4),
                Dice::createFromInt(5),
                Dice::createFromInt(5),
            ))->fours()
        );
        self::assertSame(
            8,
            (new Yatzy(
                Dice::createFromInt(4),
                Dice::createFromInt(4),
                Dice::createFromInt(5),
                Dice::createFromInt(5),
                Dice::createFromInt(5),
            ))->fours()
        );
        self::assertSame(
            4,
            (new Yatzy(
                Dice::createFromInt(4),
                Dice::createFromInt(5),
                Dice::createFromInt(5),
                Dice::createFromInt(5),
                Dice::createFromInt(5),
            ))->fours()
        );
    }

    public function test_fives(): void
    {
        self::assertSame(
            10,
            (new Yatzy(
                Dice::createFromInt(4),
                Dice::createFromInt(4),
                Dice::createFromInt(4),
                Dice::createFromInt(5),
                Dice::createFromInt(5),
            ))->fives()
        );

        self::assertSame(
            15,
            (new Yatzy(
                Dice::createFromInt(4),
                Dice::createFromInt(4),
                Dice::createFromInt(5),
                Dice::createFromInt(5),
                Dice::createFromInt(5),
            ))->fives()
        );

        self::assertSame(
            20,
            (new Yatzy(
                Dice::createFromInt(4),
                Dice::createFromInt(5),
                Dice::createFromInt(5),
                Dice::createFromInt(5),
                Dice::createFromInt(5),
            ))->fives()
        );
    }

    public function test_sixes(): void
    {
        self::assertSame(
            0,
            (new Yatzy(
                Dice::createFromInt(4),
                Dice::createFromInt(4),
                Dice::createFromInt(4),
                Dice::createFromInt(5),
                Dice::createFromInt(5),
            ))->sixes()
        );

        self::assertSame(
            6,
            (new Yatzy(
                Dice::createFromInt(4),
                Dice::createFromInt(4),
                Dice::createFromInt(6),
                Dice::createFromInt(5),
                Dice::createFromInt(5),
            ))->sixes()
        );

        self::assertSame(
            18,
            (new Yatzy(
                Dice::createFromInt(6),
                Dice::createFromInt(5),
                Dice::createFromInt(6),
                Dice::createFromInt(6),
                Dice::createFromInt(5),
            ))->sixes()
        );
    }

    public function test_one_pair(): void
    {
        self::assertSame(
            6,
            (new Yatzy(
                Dice::createFromInt(3),
                Dice::createFromInt(4),
                Dice::createFromInt(3),
                Dice::createFromInt(5),
                Dice::createFromInt(6),
            ))->scorePair()
        );

        self::assertSame(
            10,
            (new Yatzy(
                Dice::createFromInt(5),
                Dice::createFromInt(3),
                Dice::createFromInt(3),
                Dice::createFromInt(3),
                Dice::createFromInt(5),
            ))->scorePair()
        );

        self::assertSame(
            12,
            (new Yatzy(
                Dice::createFromInt(5),
                Dice::createFromInt(3),
                Dice::createFromInt(6),
                Dice::createFromInt(6),
                Dice::createFromInt(5),
            ))->scorePair()
        );
    }

    public function test_two_pair(): void
    {
        self::assertSame(
            16,
            (new Yatzy(
                Dice::createFromInt(3),
                Dice::createFromInt(3),
                Dice::createFromInt(5),
                Dice::createFromInt(4),
                Dice::createFromInt(5),
            ))->twoPair()
        );

        self::assertSame(
            18,
            (new Yatzy(
                Dice::createFromInt(3),
                Dice::createFromInt(3),
                Dice::createFromInt(6),
                Dice::createFromInt(6),
                Dice::createFromInt(6),
            ))->twoPair()
        );

        self::assertSame(
            0,
            (new Yatzy(
                Dice::createFromInt(3),
                Dice::createFromInt(3),
                Dice::createFromInt(6),
                Dice::createFromInt(5),
                Dice::createFromInt(4),
            ))->twoPair()
        );
    }

    public function test_three_of_a_kind(): void
    {
        self::assertSame(
            9,
            (new Yatzy(
                Dice::createFromInt(3),
                Dice::createFromInt(3),
                Dice::createFromInt(3),
                Dice::createFromInt(4),
                Dice::createFromInt(5),
            ))->threeOfAKind()
        );

        self::assertSame(
            15,
            (new Yatzy(
                Dice::createFromInt(5),
                Dice::createFromInt(3),
                Dice::createFromInt(5),
                Dice::createFromInt(4),
                Dice::createFromInt(5),
            ))->threeOfAKind()
        );

        self::assertSame(
            9,
            (new Yatzy(
                Dice::createFromInt(3),
                Dice::createFromInt(3),
                Dice::createFromInt(3),
                Dice::createFromInt(2),
                Dice::createFromInt(1),
            ))->threeOfAKind()
        );
    }

    public function test_small_straight(): void
    {
        self::assertSame(
            15,
            (new Yatzy(
                Dice::createFromInt(1),
                Dice::createFromInt(2),
                Dice::createFromInt(3),
                Dice::createFromInt(4),
                Dice::createFromInt(5),
            ))->smallStraight()
        );

        self::assertSame(
            15,
            (new Yatzy(
                Dice::createFromInt(2),
                Dice::createFromInt(3),
                Dice::createFromInt(4),
                Dice::createFromInt(5),
                Dice::createFromInt(1),
            ))->smallStraight()
        );

        self::assertSame(
            0,
            (new Yatzy(
                Dice::createFromInt(1),
                Dice::createFromInt(2),
                Dice::createFromInt(2),
                Dice::createFromInt(4),
                Dice::createFromInt(5),
            ))->smallStraight()
        );
    }

    public function test_large_Straight(): void
    {
        self::assertSame(
            20,
            (new Yatzy(
                Dice::createFromInt(6),
                Dice::createFromInt(2),
                Dice::createFromInt(3),
                Dice::createFromInt(4),
                Dice::createFromInt(5),
            ))->largeStraight()
        );

        self::assertSame(
            20,
            (new Yatzy(
                Dice::createFromInt(2),
                Dice::createFromInt(3),
                Dice::createFromInt(4),
                Dice::createFromInt(5),
                Dice::createFromInt(6),
            ))->largeStraight()
        );

        self::assertSame(
            0,
            (new Yatzy(
                Dice::createFromInt(1),
                Dice::createFromInt(2),
                Dice::createFromInt(2),
                Dice::createFromInt(4),
                Dice::createFromInt(5),
            ))->largeStraight()
        );
    }

    public function test_full_house(): void
    {
        self::assertSame(
            18,
            (new Yatzy(
                Dice::createFromInt(6),
                Dice::createFromInt(2),
                Dice::createFromInt(2),
                Dice::createFromInt(2),
                Dice::createFromInt(6),
            ))->fullHouse()
        );

        self::assertSame(
            0,
            (new Yatzy(
                Dice::createFromInt(2),
                Dice::createFromInt(3),
                Dice::createFromInt(4),
                Dice::createFromInt(5),
                Dice::createFromInt(6),
            ))->fullHouse()
        );

        self::assertSame(
            22,
            (new Yatzy(
                Dice::createFromInt(2),
                Dice::createFromInt(6),
                Dice::createFromInt(6),
                Dice::createFromInt(6),
                Dice::createFromInt(2),
            ))->fullHouse()
        );

    }
}
