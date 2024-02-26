<?php

namespace Class;

class MosquitoSoldier extends Mosquitos
{
    public function __construct(int $position)
    {
        parent::__construct(100, 40, 'Soldat', $position);
    }
}
