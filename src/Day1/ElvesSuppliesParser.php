<?php

declare(strict_types=1);

namespace TBoileau\Kata\AdventOfCode2022\Day1;

use TBoileau\Kata\AdventOfCode2022\Day1\Entity\Elf;
use TBoileau\Kata\AdventOfCode2022\Day1\Entity\Food;

final class ElvesSuppliesParser
{
    /**
     * @return iterable<array-key, Elf>
     */
    public function __invoke(string $inputPath): iterable
    {
        $lines = file($inputPath, FILE_IGNORE_NEW_LINES);

        $elf = new Elf();

        foreach ($lines as $line) {
            if (trim($line) === "") {
                yield $elf;
                $elf = new Elf();
                continue;
            }

            $elf->add(new Food((int) $line));
        }

        yield $elf;
    }
}
