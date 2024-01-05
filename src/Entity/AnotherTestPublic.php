<?php

namespace App\Entity;

class AnotherTestPublic
{
    public ?string $nickname = null;

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