<?php

namespace Emag\ScmFaqBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('EmagScmFaqBundle:Default:index.html.twig');
    }
}
