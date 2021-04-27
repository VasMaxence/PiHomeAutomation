<?php

namespace App\Controller;

use App\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/dashboard", name="dashboard_controller", methods={"GET"})
 */
class DashboardController extends Controller
{
    public function __construct() {
        parent::__construct("Dashboard", ["dylab" => "bo"]);
    }

    /**
     * @Route("/home", name="dashboard_home", methods={"GET"})
     * @param Request $request
     * @return Response
     */
    public function home(Request $request): Response
    {
        $this->initController();
        $this->addRender('dashboard/home.twig', array(
            "controller_name" => "DashboardController::Home"
        ));
        return $this->response();
    }
}