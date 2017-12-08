<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller
{
    /**
     * Matches /post exactly
     *
     * @Route("/post", name="post_list")
     */
    public function indexAction()
    {
        $product = true;
        if (!$product) {
            throw $this->createNotFoundException('The product does not exist');

            // the above is just a shortcut for:
            // throw new NotFoundHttpException('The product does not exist');
        }
    }
    public function list($page)
    {
        return new Response(
            '<h1>'.$page.'</h1>'
        );
    }

    /**
     * Matches /post/*
     *
     * @Route("/post/{slug}", name="post_show")
     */
    public function show($slug)
    {
        $url = $this->generateUrl(
            'post_list',
            array('slug' => 'my-blog-post')
        );
        return new Response($url);
    }
}