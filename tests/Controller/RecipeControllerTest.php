<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class RecipeControllerTest extends WebTestCase
{
    public function testFormSubmitsWithValidData()
    {
        // arrange
        $url = '/recipe/';
        $httpMethod = 'GET';
        $client = static::createClient();
        $client->request($httpMethod, $url);

        // act- fill in data and submit
        $title = 'abc';
        $summary = 'def';
        $ingredient1 = 'ghi';
        $ingredient2 = 'jkl';
        $ingredient3 = 'mno';
        $ingredient4 = 'pqr';
        $step1 = 'stu';
        $step2 = 'vwx';
        $step3 = 'yza';
        $step4 = 'bcd';
        $author = 'efg';
        $comments = 'hij';
        $expectedResultText = 'Recipe SHOW page';
        $expectedResultTextLowercase = strtolower($expectedResultText);
        $buttonName = 'recipe_submit';

        // act
        $client->submit($client->request($httpMethod, $url)->selectButton($buttonName)->form([
            'title' => $title,
            'summary' => $summary,
            'ingredient1' => $ingredient1,
            'ingredient2' => $ingredient2,
            'ingredient3' => $ingredient3,
            'ingredient4' => $ingredient4,
            'step1'=> $step1,
            'step2' => $step2,
            'step3' => $step3,
            'step4'=> $step4,
            'author' => $author,
            'comments' => $comments
        ]));

        $content = $client->getResponse()->getContent();
        $contentLowercase = strtolower($content);

        // assert
        $this->assertContains($expectedResultTextLowercase, $contentLowercase);
    }

    public function testFormSubmitsWithINVALIDData()
    {
        // arrange
        $url = '/recipe/';
        $httpMethod = 'GET';
        $client = static::createClient();
        $client->request($httpMethod, $url);

        // act- fill in data and submit with the title text box left empty
        $title = '';
        $summary = 'def';
        $ingredient1 = 'ghi';
        $ingredient2 = 'jkl';
        $ingredient3 = 'mno';
        $ingredient4 = 'pqr';
        $step1 = 'stu';
        $step2 = 'vwx';
        $step3 = 'yza';
        $step4 = 'bcd';
        $author = 'efg';
        $comments = 'hij';
        $expectedResultText = 'Recipe must have a title';
        $expectedResultTextLowercase = strtolower($expectedResultText);
        $buttonName = 'recipe_submit';

        // act
        $client->submit($client->request($httpMethod, $url)->selectButton($buttonName)->form([
            'title' => $title,
            'summary' => $summary,
            'ingredient1' => $ingredient1,
            'ingredient2' => $ingredient2,
            'ingredient3' => $ingredient3,
            'ingredient4' => $ingredient4,
            'step1'=> $step1,
            'step2' => $step2,
            'step3' => $step3,
            'step4'=> $step4,
            'author' => $author,
            'comments' => $comments
        ]));

        $content = $client->getResponse()->getContent();
        $contentLowercase = strtolower($content);

        // assert
        $this->assertContains($expectedResultTextLowercase, $contentLowercase);
    }


}