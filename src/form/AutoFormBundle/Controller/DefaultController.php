<?php

namespace form\AutoFormBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller{

    public function indexAction(){
        return $this->render('AutoFormBundle:Default:index.html.twig');
    }
}
