<?php


class Router
{


    public function __construct()
    {
    }

    public function handleRequest(): void
    {
        if (!isset($_GET['route']) || $_GET['route'] === 'espace_perso') {
            $homePage = new pageControllers();
            $homePage->home();
        } else if (isset($_GET['route']) && $_GET['route'] === 'connexion') {
            $connexionPage = new pageControllers();
            $connexionPage->connexion();
        } else if (isset($_GET['route']) && $_GET['route'] === 'inscription') {
            $inscriptionPage = new pageControllers();
            $inscriptionPage->inscription();
        } else if (isset($_GET['route']) && $_GET['route'] === 'login') {
            $checkConnectionPage = new AuthController();
            $checkConnectionPage->login();
        } else if (isset($_GET['route']) && $_GET['route'] === 'register') {
            $checkInscriptionPage = new AuthController();
            $checkInscriptionPage->register();
        } else if (isset($_GET['route']) && $_GET['route'] === 'check-login') {
            $checkInscriptionPage = new AuthController();
            $checkInscriptionPage->checkLogin();
        } else if (isset($_GET['route']) && $_GET['route'] === 'check-register') {
            $checkInscriptionPage = new AuthController();
            $checkInscriptionPage->checkRegister();
        } else {
            $errorPage = new pageControllers();
            $errorPage->error();
        }
    }
}
