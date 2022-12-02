<?php

declare(strict_types=1);

namespace TBoileau\Kata\AdventOfCode2022\Day1;

use PHPUnit\Framework\TestCase;
use TBoileau\Kata\AdventOfCode2022\Day1\Entity\Elf;
use TBoileau\Kata\AdventOfCode2022\Day1\Entity\Food;

final class CalorieCountingTest extends TestCase
{
    private CalorieCounting $calorieCounting;

    protected function setUp(): void
    {
        $this->calorieCounting = new CalorieCounting();
        $this->elvesSuppliesParser = new ElvesSuppliesParser();
    }

    public function testFindElfCarryingTheMostCalories(): void
    {
        self::assertSame(0, $this->calorieCounting->findElfCarryingTheMostCalories([new Elf([])]));
        self::assertSame(10, $this->calorieCounting->findElfCarryingTheMostCalories([
            new Elf([new Food(5), new Food(5)]),
            new Elf([new Food(5)]),
        ]));
        self::assertSame(
            24000,
            $this->calorieCounting->findElfCarryingTheMostCalories(
                iterator_to_array(
                    $this->elvesSuppliesParser->__invoke(__DIR__ . "/Fixtures/sample")
                )
            )
        );
    }

    public function testFindTopThreeElvesCarryingTheMostCalories(): void
    {
        self::assertSame(0, $this->calorieCounting->findTopThreeElvesCarryingTheMostCalories([new Elf([])]));
        self::assertSame(15, $this->calorieCounting->findTopThreeElvesCarryingTheMostCalories([
            new Elf([new Food(5), new Food(5)]),
            new Elf([new Food(5)]),
        ]));
        self::assertSame(
            45000,
            $this->calorieCounting->findTopThreeElvesCarryingTheMostCalories(
                iterator_to_array(
                    $this->elvesSuppliesParser->__invoke(__DIR__ . "/Fixtures/sample")
                )
            )
        );
    }
}
