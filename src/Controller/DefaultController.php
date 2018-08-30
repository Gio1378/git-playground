<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/index/{page}", name="index",
     *     defaults={"page" : 1},
     *     requirements={"page" : "\d+"})
     */
    public function index($page)
    {
        $nbOfElementPerPage = 10;

        $recipeRepository = $this
            ->getDoctrine()
            ->getRepository("App:Recipes");

        $nbOfRecipes = $recipeRepository->
        getRecipeCount();

        $nbOfPages = ceil($nbOfRecipes / $nbOfElementPerPage); //(ceil) entier le plus proche superieur

        $recipesPerPage = $recipeRepository->getRecipesPaginated($page,$nbOfElementPerPage);

        $params['recettesList'] = $recipesPerPage;
        $params['currentPage'] = $page;
        $params['totalPage'] = $nbOfPages;

        $response = $this->render('index.html.twig', $params);
        return $response;
    }
}
