<?php

namespace App\Controller;

use phpDocumentor\Reflection\Types\String_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class Controller extends AbstractController
{
    protected $rep = "";
    protected $controllerName = "";

    protected function __construct(string $controllerName = "", array $arg = []) {
        $this->controllerName = $controllerName;
    }

    protected function initController(string $header = null, array $arg = []) {
        $this->addRender(isset($header) ? $header : "commun/header.twig", $arg);
    }

    protected function addRender(string $view, array $array = []) {
        $this->rep .= $this->renderView($view, $array);
    }

    public function response(array $array = []) {
        $this->rep .= $this->renderView("commun/footer.twig");
        return new Response($this->rep);
    }
}