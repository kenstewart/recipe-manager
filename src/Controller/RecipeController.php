<?php

namespace App\Controller;

use App\Entity\Recipe;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\RecipeRepository;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class RecipeController extends Controller
{
    /**
     * @Route("/recipe/new", name="recipe_new" methods={"POST", "GET"})
     */
    public function newAction(Request $request)
    {
        //extract name values from POST data
        $title = $request->request->get('title');
        $summary = $request->request->get('summary');
        $ingredient1 = $request->request->get('ingredient1');
        $ingredient2 = $request->request->get('ingredient2');
        $ingredient3 = $request->request->get('ingredient3');
        $ingredient4 = $request->request->get('ingredient4');
        $step1 = $request->request->get('step1');
        $step2 = $request->request->get('step2');
        $step3 = $request->request->get('step3');
        $step4 = $request->request->get('step4');
        $author = $request->request->get('author');
        $comments = $request->request->get('comments');

        //valid if required values are entered
        //must have a title, summary, at least 2 ingredients, at least 2 steps and an author
        $isValid = !empty($title) && !empty($summary) && !empty($ingredient1) && !empty($ingredient2) && !empty($step1)
            && !empty($step2) && !empty($author);

        //was form submitted with Post method?
        $isSubmitted = $request->isMethod('POST');

        //is submitted and valid- create new object
        if ($isSubmitted && $isValid) {
            return $this->createAction($title, $summary, $ingredient1, $ingredient2, $ingredient3, $ingredient4, $step1,
                $step2, $step3, $step4, $author, $comments);
        }

        if (!$isValid){
            $this->addFlash(
                'error',
                'Recipe must have a title, summary, at least 2 ingredients, at least 2 steps and an author'
            );
        }

        //render the form for the user with sticky values
        $template = 'recipe/new.html.twig';
        $argsArray = [
            'title' => $title,
            'summary' => $summary,
            'ingredient1' => $ingredient1,
            'ingredient2' => $ingredient2,
            'ingredient3' => $ingredient3,
            'ingredient4' => $ingredient4,
            'step1' => $step1,
            'step2' => $step2,
            'step3' => $step3,
            'step4' => $step4,
            'author' => $author,
            'comments' => $comments
        ];

        return $this->render($template, $argsArray);
    }

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

    /**
     * @Route("/recipe/create/{title}/{summary}/{ingredient1}/{ingredient2}/{ingredient3}/{ingredient4}/
     *     {step1}/{step2}/{step3}/{step4}/{authpr}/{comments}")
     */
    public function createAction($title, $summary, $ingredient1, $ingrediant2, $ingredient3, $ingredient4,
            $step1, $step2, $step3, $step4, $author, $comments)
    {
        $recipe = new Recipe();
        $recipe->setTitle($title);
        $recipe->setSummary($summary);
        $recipe->setIngredient1($ingredient1);
        $recipe->setIngredient2($ingrediant2);
        $recipe->setIngredient3($ingredient3);
        $recipe->setIngredient4($ingredient4);
        $recipe->setStep1($step1);
        $recipe->setStep2($step2);
        $recipe->setStep3($step3);
        $recipe->setStep4($step4);
        $recipe->setAuthor($author);
        $recipe->setComments($comments);

        //entity manager
        $em = $this->getDoctrine()->getManager();

        //tell Doctrine you want to eventually save the project
        $em->persist($recipe);

        //execute the queries
        $em->flush();

    }
}
