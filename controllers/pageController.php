<?php


class pageControllers
{


    public function __construct()
    {
    }

    public function home(): void
    {
        $route = 'espace_perso';
        require 'templates/layout.phtml';
    }

    public function connexion(): void
    {
        $route = 'connexion';
        require 'templates/layout.phtml';
    }

    public function inscription(): void
    {
        $route = 'inscription';
        require 'templates/layout.phtml';
    }

    public function checkConnexion(): void
    {
        $route = 'check-connexion';
        require 'templates/layout.phtml';
    }

    public function checkInscription(): void
    {
        $route = 'check-inscription';
        require 'templates/layout.phtml';
    }

    public function error(): void
    {
        $route = 'error';
        require 'templates/layout.phtml';
    }
}
