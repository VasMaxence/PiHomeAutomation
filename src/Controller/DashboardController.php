<?php

namespace App\Controller;

use App\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * @Route("/dashboard", name="dashboard_controller::", methods={"GET"})
 */
class DashboardController extends Controller
{
    private $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator) {
        $this->urlGenerator = $urlGenerator;
        parent::__construct("Dashboard", ["dylab" => "bo"]);
    }

    /**
     * @Route("/home", name="dashboard_home", methods={"GET"})
     * @param Request $request
     * @return Response
     */
    public function home(Request $request): Response
    {
        if (!$this->getUser())
            return new RedirectResponse($this->urlGenerator->generate('security_controller::security_login'));
        $this->initController();
        $this->addRender('dashboard/home.twig', array(
            "controller_name" => "DashboardController::Home"
        ));
        return $this->response();
    }
}