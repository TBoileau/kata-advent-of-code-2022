<?php

declare(strict_types=1);

namespace TBoileau\Kata\AdventOfCode2022\Day1\Entity;

final class Elf
{
    /**
     * @param array<array-key, Food> $supplies
     */
    public function __construct(public array $supplies = [])
    {
    }

    public function add(Food $food): self
    {
        $this->supplies[] = $food;
        return $this;
    }

    public function getCalories(): int
    {
        return array_reduce(
            $this->supplies,
            static fn (int $carry, Food $food) => $carry + $food->calories,
            0
        );
    }
}
