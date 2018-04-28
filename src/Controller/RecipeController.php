<?php

namespace App\Controller;

use App\Entity\Recipe;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\RecipeRepository;

class RecipeController extends Controller
{
    /**
     * @Route("/recipe/{recipeId}", name="recipe_show")
     */
    public function showAction($recipeId)
    {
        $recipeRepository = new RecipeRepository();
        $recipe = $recipeRepository->find($recipeId);

        $template = 'recipe/show.html.twig';
        $args = [ 'recipe' => $recipe ];

        if (!$recipe) {
            $template = 'error/404.html.twig';
        }

        return $this->render($template, $args);
    }

    /**
     * @Route("/recipe", name="recipe_list")
     */
    public function listAction()
    {
        $recipeRepository = new RecipeRepository();
        $recipes = $recipeRepository->findAll();

        $template = 'recipe/list.html.twig';
        $args = ['recipes' => $recipes];

        return $this->render($template, $args);
    }
}
