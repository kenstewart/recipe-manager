<?php

namespace App\Repository;

use App\Entity\Recipe;

class RecipeRepository
{
    private $recipes = [];

    public function __construct()
    {
        $recipeId = 1;
        $r1 = new Recipe($recipeId, 'scrambled eggs',
            'scrambled eggs is an easy to make dish where eggs are stirred or beaten together in a pan while being gently heated',
            '4 eggs', '1/4 cup of milk', '2 tsp. of butter', 'salt and pepper as desired',
            'beat eggs milk salt and pepper in a bowl until blended',
            'heat butter in a pan and pour in the egg mixture',
            'gently stir the mixture until it thickens and no liquid remains',
            'remove from heat and serve', 'Ken', '');
        $this->recipes[$recipeId] = $r1;

        $recipeId = 2;
        $r2 = new Recipe($recipeId, 'bruschetta',
            'light Italian dish which is great as a snack or a starter',
            '4 thick slices of wholegrain bread', '1 clove of garlic cut in half', '2 tsp. of olive oil', '2 medium tomatoes',
            'lightly cover each slice of bread with olive oil and place under the grill until crispy',
            'lightly rub the cut side of the garlic over the bread',
            'chop the tomatoes and mix with the rest of the olive oil',
            'place the tomatoes loosely on top of the bruschetta and enjoy', 'Ken', '');
        $this->recipes[$recipeId] = $r2;
    }

    public function findAll()
    {
        return $this->recipes;
    }

    public function find($recipeId)
    {
        if (array_key_exists($recipeId, $this->recipes)) {
            return $this->recipes[$recipeId];
        } else {
            return null;
        }
    }

}