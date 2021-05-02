<?php

namespace App\Controller;

use App\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * @Route("/security",
 *     name="security_controller::",
 *     methods={"GET", "POST", "PUT", "DELETE"})
 */
class SecurityController extends AbstractController
{
    private $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @Route("/login", name="security_login", methods={"GET"})
     * @param Request $request
     * @return Response
     */
    public function login(Request $request): Response
    {
        if ($this->get('session') && !$this->get('session')->get("_lang") || !strlen($this->get('session')->get("_lang")))
            $this->get('session')->set("_lang", "en");
        if ($this->getUser())
            return new RedirectResponse($this->urlGenerator->generate('dashboard_controller::dashboard_home'));
        return $this->render("security/login.twig", array(
            "lang" => $this->get('session')->get("_lang")
        ));
    }
}