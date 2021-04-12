<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MatchesController extends AbstractController{

    /**
     * @Route("/matches", name="show-matches")
     * @param Request $request
     * @return Response
     */
    public function showAction(Request $request): Response
    {
        $matches = $this->getDoctrine()->getRepository('App:Matches')->findAll();

        $allMatches = [];

        foreach ($matches as $match){
            array_push($allMatches, $match);
        }

        return $this->render('showMatches.html.twig',[
            'matches' => $allMatches
        ]);
    }
}
