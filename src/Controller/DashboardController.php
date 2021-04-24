<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/dashboard", name="dashboard_home", methods={"GET"})
 */
class DashboardController extends AbstractController
{
    /**
     * @Route("/", name="dashboard_home", methods={"GET"})
     */
    public function home(): Response
    {
        return $this->render('dashboard/home.twig', array(
            "controller_name" => "HomeController"
        ));
    }
}