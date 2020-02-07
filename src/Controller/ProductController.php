<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{

    /**
     * @Route("/product", name="product")
     */
    public function list(ProductRepository $productRepository)
    {
        $lastProduct = $productRepository->findOneByLastPhone();
        $products = $productRepository->findAll();

        return $this->render('product/list.html.twig', [
            'products' => $products,
            'lastphone' => $lastProduct,
        ]);
    }

    /**
     * @Route("/product/{slug}", name="product_show")
     */
    public function show($slug)
    {
        $productRepository = $this->getDoctrine()->getRepository(Product::class);
        /** @var Product $product */
        $product = $productRepository->findOneBySlug($slug);


        return $this->render('product/show.html.twig', [
            'product' => $product,
        ]);
    }
}
