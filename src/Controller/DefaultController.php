<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * action for homepage
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $template = 'default/homepage.html.twig';
        $args = [];
        return $this->render($template, $args);
    }
}
