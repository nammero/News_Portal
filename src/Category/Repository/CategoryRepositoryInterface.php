<?php

namespace App\Category\Repository;

use App\Entity\Category;

interface CategoryRepositoryInterface
{
    public function findBySlug(string $slug): ?Category;

    public function findAll();
}
