<?php

namespace Class;

class MosquitoLarva extends Mosquitos
{
    public function __construct(int $position)
    {
        parent::__construct(30, 15, 'Larve', $position);
    }
}
