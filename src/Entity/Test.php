<?php

namespace App\Entity;

class Test
{
    private ?AnotherTest $anotherTest = null;
    private ?string $test = null;

    public function getTest(): ?string
    {
        return $this->test;
    }

    public function setTest(?string $test): void
    {
        $this->test = $test;
    }

    public function getAnotherTest(): ?AnotherTest
    {
        return $this->anotherTest;
    }

    public function setAnotherTest(?AnotherTest $anotherTest): void
    {
        $this->anotherTest = $anotherTest;
    }
}
