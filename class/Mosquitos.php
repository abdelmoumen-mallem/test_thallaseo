<?php

namespace Class;

abstract class Mosquitos
{
    private int $life;
    private int $damage;
    private string $name;
    private int $position;

    public function __construct(int $life, int $damage, string $name, int $position)
    {
        $this->life = $life;
        $this->damage = $damage;
        $this->name = $name;
        $this->position = $position;
    }

    public function getLife(): int
    {
        return $this->life;
    }

    public function getDamage(): int
    {
        return $this->damage;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function attack(): int
    {
        return $this->life -= $this->damage;
    }

    public function getPosition(): int
    {
        return $this->position;
    }
}
