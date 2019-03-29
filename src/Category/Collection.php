<?php

namespace App\Category;

final class Collection implements \IteratorAggregate
{
    private $categories;

    public function __construct(CategoryModel ...$categories)
    {
        $this->categories = $categories;
    }

    public function addCategory(CategoryModel $category): void
    {
        $this->categories[] = $category;
    }

    public function getIterator(): iterable
    {
        return new \ArrayIterator($this->categories);
    }
}
