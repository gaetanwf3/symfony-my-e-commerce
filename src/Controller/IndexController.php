<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(ProductRepository $productRepository)
    {

        $products = $productRepository->findByLastPhones();
        $favoriteProduct = $productRepository->findOneByFavorite();

        return $this->render('index/home.html.twig', [
            'products' => $products,
            'favorite_product' => $favoriteProduct,
        ]);
    }


}
