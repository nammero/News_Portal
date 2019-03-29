<?php

namespace App\Category\Service;

use App\Category\CategoryModel;
use App\Category\Collection;

interface CategoryPresentationServiceInterface
{
    public function findBySlug(string $slug): CategoryModel;

    public function getAll(): Collection;
}
