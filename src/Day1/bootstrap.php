<?php

declare(strict_types=1);

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use TBoileau\Kata\AdventOfCode2022\Day1\CalorieCounting;
use TBoileau\Kata\AdventOfCode2022\Day1\ElvesSuppliesParser;
use TBoileau\Kata\AdventOfCode2022\Day1\Entity\Elf;

return function (InputInterface $input, OutputInterface $output): void {
    /** @var array<array-key, Elf> $elves */
    $elves = iterator_to_array((new ElvesSuppliesParser())(__DIR__ . "/Fixtures/input"));

    $calorieCounting = new CalorieCounting();

    $part = (int) $input->getArgument("part");

    match($part) {
        1 => $output->writeln((string) $calorieCounting->findElfCarryingTheMostCalories($elves)),
        2 => $output->writeln((string) $calorieCounting->findTopThreeElvesCarryingTheMostCalories($elves))
    };
};

