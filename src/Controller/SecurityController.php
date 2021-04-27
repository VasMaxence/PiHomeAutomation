<?php

namespace App\Controller;

use App\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/security", name="security_controller", methods={"GET", "POST", "PUT", "DELETE"})
 */
class SecurityController extends Controller
{
    public function __construct() {
        parent::__construct("Dashboard");
    }

    /**
     * @Route("/login", name="security_login", methods={"GET"})
     * @param Request $request
     * @return Response
     */
    public function login(Request $request): Response
    {
        return $this->render("dashboard/home.twig", array(
            "controller_name"=>"SecurityController::Login"
        ));
    }
}