<?php

namespace App\Controller;

use App\Controller\Controller;
use App\Entity\MainMenu;
use App\Repository\MainMenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * @Route("/dashboard", name="dashboard_controller::", methods={"GET"})
 */
class DashboardController extends AbstractController
{
    private $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator) {
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @Route("/home", name="dashboard_home", methods={"GET"})
     * @param Request $request
     * @return Response
     */
    public function home(Request $request): Response
    {
        $menu = MainMenuRepository::getMenuJson($this->getDoctrine());
        if (!$this->getUser())
            return new RedirectResponse($this->urlGenerator->generate('security_controller::security_login'));
        if (!$menu || !count($menu))
            return new RedirectResponse($this->urlGenerator->generate('error::not_found'));
        $menu = MainMenuRepository::setMenuActive($menu, "dashboard");
        $this->get('session')->set("_lang", $this->getUser()->getLanguage());
        return $this->render('dashboard/home.twig', array(
            "dashboard" => true,
            "controller_name" => "DashboardController::Home",
            "lang" => $this->get('session')->get("_lang"),
            "menu" => $menu
        ));
    }
}