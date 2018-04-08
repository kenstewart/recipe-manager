<?php

namespace App\Controller;

use App\Entity\Recipe;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RecipeController extends Controller
{
    /**
     * @Route("/recipe", name="recipe_show")
     */
    public function showAction()
    {
        $recipe = new Recipe(1, 'scrambled eggs',
            'scrambled eggs is an easy to make dish where eggs are stirred or beaten together in a pan while being gently heated',
            '4 eggs', '1/4 cup of milk', '2 tsp. of butter', 'salt and pepper as desired',
            'beat eggs milk salt and pepper in a bowl until blended',
            'heat butter in a pan and pour in the egg mixture',
            'gently stir the mixture until it thickens and no liquid remains',
            'remove from heat and serve', 'Ken', '');

        $template = 'recipe/show.html.twig';

        $args = [ 'recipe' => $recipe ];

        return $this->render($template, $args);
    }
}
