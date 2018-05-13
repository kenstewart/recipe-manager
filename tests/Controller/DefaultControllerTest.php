<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class DefaultControllerTest extends WebTestCase
{
    public function testHomePage()
    {
        // arrange
        $url = '/';
        $httpMethod = 'GET';
        $client = static::createClient();
        $expectedResult = Response::HTTP_OK;

        // assert
        $client->request($httpMethod, $url);
        $resultStatusCode = $client->getResponse()->getStatusCode();

        // act
        $this->assertEquals($expectedResult, $resultStatusCode);
    }

    public function testHomePageHasLinkToRecipeListPage()
    {
        // arrange
        $url = '/';
        $httpMethod = 'GET';
        $client = static::createClient();
        $expectedContent = '1st ingredient'; // one of the headings from the recipe list page
        $expectedContentLowercase = strtolower($expectedContent);

        // request homepage
        $crawler = $client->request($httpMethod, $url);

        // find and click link
        $linkText = 'Show Recipes';
        $link = $crawler->selectLink($linkText)->link();

        $client->click($link);

        // assert
        $resultContent = $client->getResponse()->getContent();
        $resultContentLowercase = strtolower($resultContent);

        // act
        $this->assertContains($expectedContentLowercase, $resultContentLowercase);
    }

    public function testHomePageHasLinkToNewRecipeFormPage()
    {
        // arrange
        $url = '/';
        $httpMethod = 'GET';
        $client = static::createClient();
        $expectedContent = 'Add new recipe';
        $expectedContentLowercase = strtolower($expectedContent);

        // request homepage
        $crawler = $client->request($httpMethod, $url);

        // find and click link
        $linkText = 'Create NEW Recipe';
        $link = $crawler->selectLink($linkText)->link();

        $client->click($link);

        // assert
        $resultContent = $client->getResponse()->getContent();
        $resultContentLowercase = strtolower($resultContent);

        // act
        $this->assertContains($expectedContentLowercase, $resultContentLowercase);
    }
}