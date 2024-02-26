<?php

namespace Class;

class MosquitoQueen extends Mosquitos
{
    public function __construct(int $position)
    {
        parent::__construct(200, 30, 'Reine', $position);
    }
}
