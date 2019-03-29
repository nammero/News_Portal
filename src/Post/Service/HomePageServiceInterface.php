<?php

namespace App\Post\Service;

use App\Post\Collection;

interface HomePageServiceInterface
{
    public function getPosts(): Collection;
}
