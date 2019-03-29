<?php

namespace App\Category;

final class CategoryModel
{
    private $id;
    private $slug;
    private $name;
    private $description;

    public function __construct(int $id, string $slug, string $name)
    {
        $this->id = $id;
        $this->slug = $slug;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}
