<?php

namespace App\Category\Service;

use App\Category\CategoryMapper;
use App\Category\CategoryModel;
use App\Category\Collection;
use App\Category\Repository\CategoryRepositoryInterface;
use App\Exception\EntityNotFoundException;

final class CategoryPresentationService implements CategoryPresentationServiceInterface
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function findBySlug(string $slug): CategoryModel
    {
        $category = $this->categoryRepository->findBySlug($slug);

        if (null === $category) {
            throw new EntityNotFoundException(\sprintf('Categoy with slug "%s" not found', $slug));
        }

        return CategoryMapper::entityToModel($category);
    }

    public function getAll(): Collection
    {
        $categories = $this->categoryRepository->findAll();
        $collection = new Collection();

        foreach ($categories as $category) {
            $collection->addCategory(
                CategoryMapper::entityToModel($category)
            );
        }

        return $collection;
    }
}
