<?php

declare(strict_types=1);

namespace TBoileau\Kata\AdventOfCode2022\Day1;

use TBoileau\Kata\AdventOfCode2022\Day1\Entity\Elf;

final class CalorieCounting
{
    /**
     * @param array<array-key, Elf> $elves
     */
    public function findElfCarryingTheMostCalories(array $elves): int
    {
        return count($elves) === 0 ? 0 : max(
            array_map(
                static fn (Elf $elf) => $elf->getCalories(),
                $elves
            )
        );
    }

    /**
     * @param array<array-key, Elf> $elves
     */
    public function findTopThreeElvesCarryingTheMostCalories(array $elves): int
    {
        if (count($elves) === 0) {
            return 0;
        }

        if (count($elves) <= 3) {
            return array_reduce(
                $elves,
                static fn (int $carry, Elf $elf) => $carry + $elf->getCalories(),
                0
            );
        }

        usort($elves, static fn (Elf $a, Elf $b) => $b->getCalories() <=> $a->getCalories());

        return $this->findTopThreeElvesCarryingTheMostCalories(array_slice($elves, 0, 3));
    }
}
