<?php

namespace Class;

class MosquitoLarva extends Mosquitos
{
    public function __construct(int $position)
    {
        parent::__construct(60, 30, 'Larve', $position);
    }
}
