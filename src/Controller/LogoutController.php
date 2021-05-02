<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class LogoutController extends AbstractController {
    private $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @Route("/logout", name="logout", methods={"GET"})
     * @param Request $request
     * @return Response
     */
    public function logout(Request $request): Response
    {
        return new RedirectResponse($this->urlGenerator->generate('dashboard_controller::dashboard_home'));
    }
}