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
            'matches' => $allMatches,
        ]);
    }

    /**
     * @Route("/matches/U11", name="show-matches-u11")
     * @param Request $request
     * @return Response
     */

    public function showU11Action(Request $request): Response
    {
        $matches = $this->getDoctrine()->getRepository('App:Matches')->findBy(array('category_id' => 1));

        $allMatches = [];

        foreach ($matches as $match){
            array_push($allMatches, $match);
        }

        return $this->render('showMatchesU11.html.twig',[
            'matches' => $allMatches,
        ]);
    }

    /**
     * @Route("/matches/U13", name="show-matches-u13")
     * @param Request $request
     * @return Response
     */

    public function showU13Action(Request $request): Response
    {
        $matches = $this->getDoctrine()->getRepository('App:Matches')->findBy(array('category_id' => 2));

        $allMatches = [];

        foreach ($matches as $match){
            array_push($allMatches, $match);
        }

        return $this->render('showMatchesU13.html.twig',[
            'matches' => $allMatches,
        ]);
    }

    /**
     * @Route("/matches/U15", name="show-matches-u15")
     * @param Request $request
     * @return Response
     */

    public function showU15Action(Request $request): Response
    {
        $matches = $this->getDoctrine()->getRepository('App:Matches')->findBy(array('category_id' => 3));

        $allMatches = [];

        foreach ($matches as $match){
            array_push($allMatches, $match);
        }

        return $this->render('showMatchesU15.html.twig',[
            'matches' => $allMatches,
        ]);
    }

    /**
     * @Route("/matches/U19", name="show-matches-u19")
     * @param Request $request
     * @return Response
     */

    public function showU19Action(Request $request): Response
    {
        $matches = $this->getDoctrine()->getRepository('App:Matches')->findBy(array('category_id' => 4));

        $allMatches = [];

        foreach ($matches as $match){
            array_push($allMatches, $match);
        }

        return $this->render('showMatchesU19.html.twig',[
            'matches' => $allMatches,
        ]);
    }


}
