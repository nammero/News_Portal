<?php

namespace App\Category;

use App\Entity\Category;

final class CategoryMapper
{
    public static function entityToModel(Category $entity): CategoryModel
    {
        $model = new CategoryModel(
            $entity->getId(),
            $entity->getSlug(),
            $entity->getTitle()
        );

        $model->setDescription($entity->getDescription());

        return $model;
    }
}
