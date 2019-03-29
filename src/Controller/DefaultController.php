<?php

namespace App\Controller;

use App\Post\Service\HomePageServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    /**
     * Renders site home page.
     *
     * @return Response
     */
    public function index(HomePageServiceInterface $homePageService): Response
    {
        $posts = $homePageService->getPosts();

        return $this->render('default/index.html.twig', [
            'posts' => $posts,
        ]);
    }
}
