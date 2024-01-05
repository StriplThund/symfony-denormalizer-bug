<?php

namespace App\Entity;

class AnotherTest
{
    private ?string $nickname = null;

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(?string $nickname): static
    {
        $this->nickname = $nickname;

        return $this;
    }
}
