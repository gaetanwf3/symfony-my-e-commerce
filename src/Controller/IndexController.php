<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('index/home.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    /**
     * @Route("/product", name="product")
     */
    public function list()
    {
        return $this->render('product/list.html.twig');
    }
}
