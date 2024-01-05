<?php

namespace App\Command;

use App\Entity\AnotherTest;
use App\Entity\AnotherTestPublic;
use App\Entity\Test;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

#[AsCommand(
    name: 'app:test',
    description: 'Add a short description for your command',
)]
class TestCommand extends Command
{
    public function __construct(
        private DenormalizerInterface $denormalizer
    )
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $res = $this->denormalizer->denormalize([
            'test' => 'i am test',
            'anotherTest' => [
                'nickname' => 'sdf'
            ]
        ], Test::class);
        
        $initializedTest = new AnotherTest();
        $initializedTest->setNickname('sdf');

        $res1 = $this->denormalizer->denormalize([
            'test' => 'i am test',
            'anotherTest' => $initializedTest
        ], Test::class);

        $initializedTest = new AnotherTestPublic();
        $initializedTest->setNickname('public test');

        $res2 = $this->denormalizer->denormalize([
            'test' => 'i am test',
            'anotherTest' => $initializedTest
        ], Test::class);

        dd($res, $res1, $res2);

        return Command::SUCCESS;
    }
}
