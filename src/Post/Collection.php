<?php

namespace App\Post;

final class Collection implements \IteratorAggregate
{
    private $posts;

    public function __construct(PostModel ...$posts)
    {
        $this->posts = $posts;
    }

    public function addPost(PostModel $post)
    {
        $this->posts[] = $post;
    }

    public function getOneFromTop(): ?PostModel
    {
        return \array_shift($this->posts);
    }

    public function getFromTop(int $quantity = 1): iterable
    {
        for ($i = 0; $i < $quantity; $i++) {
            yield \array_shift($this->posts);
        }
    }

    public function getIterator(): iterable
    {
        return new \ArrayIterator($this->posts);
    }
}
