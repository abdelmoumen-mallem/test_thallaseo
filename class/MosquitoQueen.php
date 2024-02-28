<?php

namespace Class;

class MosquitoQueen extends Mosquitos
{
    public function __construct(int $position)
    {
        parent::__construct(100, 15, 'Reine', $position);
    }
}
