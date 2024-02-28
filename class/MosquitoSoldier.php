<?php

namespace Class;

class MosquitoSoldier extends Mosquitos
{
    public function __construct(int $position)
    {
        parent::__construct(50, 20, 'Soldat', $position);
    }
}
