<?php

namespace App\Controller;

use App\Category\Service\CategoryPresentationServiceInterface;
use App\Entity\Category;
use App\Entity\Post;
use App\Exception\EntityNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class CategoryController extends AbstractController
{
    private $categoryPresentation;

    public function __construct(CategoryPresentationServiceInterface $categoryPresentation)
    {
        $this->categoryPresentation = $categoryPresentation;
    }

    /**
     * @Route("/category/{slug}", name="category_show", requirements={"slug"="^[A-Za-z0-9-_]+$"})
     * @param string $slug
     * @return Response
     */
    public function show(string $slug): Response
    {
        try {
//            $category = $this->categoryPresentation->findBySlug($slug);
            $em = $this->getDoctrine()->getManager();
            $category = $em->getRepository(Category::class)->findBySlug($slug);
            $post = $em->getRepository(Post::class)->findPostByCategorySlug($slug);
        } catch (EntityNotFoundException $e) {
            throw $this->createNotFoundException('Category not found', $e);
        }

        return $this->render('category/show.html.twig', [
            'category' => $category,
            'posts' => $post
        ]);
    }

    public function list(string $active): Response
    {
        $categories = $this->categoryPresentation->getAll();

        return $this->render('category/list.html.twig', [
            'active' => $active,
            'categories' => $categories,
        ]);
    }
}
