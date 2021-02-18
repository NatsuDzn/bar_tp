<?php

namespace App\Controller;

use App\Entity\Beer;
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category/{id}", name="category")
     * @param int $id
     * @return Response
     */
    public function category(int $id): Response
    {
        $beerRepo = $this->getDoctrine()->getRepository(Beer::class);
        $categoryRepo = $this->getDoctrine()->getRepository(Category::class);

        $beersFromCategory = $beerRepo->getByCategoryId($id);
        $category = $categoryRepo->find($id);
        return $this->render('category/category.html.twig', [
            'beersFromCategory' => $beersFromCategory,
            'category' => $category,
        ]);
    }
}
