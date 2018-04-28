<?php

namespace App\Entity;

use App\Repository\RecipeRepository;

class Recipe
{
    private $recipeId;
    private $title;
    private $summary;
    private $ingredient1;
    private $ingredient2;
    private $ingredient3;
    private $ingredient4;
    private $step1;
    private $step2;
    private $step3;
    private $step4;
    private $author;
    private $comments;

    /**
     * @return mixed
     */
    public function getRecipeId()
    {
        return $this->recipeId;
    }

    /**
     * @param mixed $recipeId
     */
    public function setRecipeId($recipeId): void
    {
        $this->recipeId = $recipeId;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param mixed $summary
     */
    public function setSummary($summary): void
    {
        $this->summary = $summary;
    }

    /**
     * @return mixed
     */
    public function getIngredient1()
    {
        return $this->ingredient1;
    }

    /**
     * @param mixed $ingredient1
     */
    public function setIngredient1($ingredient1): void
    {
        $this->ingredient1 = $ingredient1;
    }

    /**
     * @return mixed
     */
    public function getIngredient2()
    {
        return $this->ingredient2;
    }

    /**
     * @param mixed $ingredient2
     */
    public function setIngredient2($ingredient2): void
    {
        $this->ingredient2 = $ingredient2;
    }

    /**
     * @return mixed
     */
    public function getIngredient3()
    {
        return $this->ingredient3;
    }

    /**
     * @param mixed $ingredient3
     */
    public function setIngredient3($ingredient3): void
    {
        $this->ingredient3 = $ingredient3;
    }

    /**
     * @return mixed
     */
    public function getIngredient4()
    {
        return $this->ingredient4;
    }

    /**
     * @param mixed $ingredient4
     */
    public function setIngredient4($ingredient4): void
    {
        $this->ingredient4 = $ingredient4;
    }

    /**
     * @return mixed
     */
    public function getStep1()
    {
        return $this->step1;
    }

    /**
     * @param mixed $step1
     */
    public function setStep1($step1): void
    {
        $this->step1 = $step1;
    }

    /**
     * @return mixed
     */
    public function getStep2()
    {
        return $this->step2;
    }

    /**
     * @param mixed $step2
     */
    public function setStep2($step2): void
    {
        $this->step2 = $step2;
    }

    /**
     * @return mixed
     */
    public function getStep3()
    {
        return $this->step3;
    }

    /**
     * @param mixed $step3
     */
    public function setStep3($step3): void
    {
        $this->step3 = $step3;
    }

    /**
     * @return mixed
     */
    public function getStep4()
    {
        return $this->step4;
    }

    /**
     * @param mixed $step4
     */
    public function setStep4($step4): void
    {
        $this->step4 = $step4;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */

    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments): void
    {
        $this->comments = $comments;
    }
}