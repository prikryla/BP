<?php

namespace App\Controller;

use App\Entity\Matches;
use App\Form\AddMatchFormType;
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
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $allMatches = [];

        foreach ($matches as $match){
            array_push($allMatches, $match);
        }

        return $this->render('showMatches.html.twig',[
            'matches' => $allMatches,
            'user' => $user
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

    /**
     * @Route("/matches/away", name="show-away-matches")
     * @param Request $request
     * @return Response
     */
    public function showAwayMatchesAction(Request $request): Response
    {
        $matches = $this->getDoctrine()->getRepository('App:Matches')->findAll();

        $awayMatches = [];

        foreach ($matches as $match){
            if ($match->getHomeTeam() != 'BBK Blansko')
            array_push($awayMatches, $match);
        }

        return $this->render('showAwayMatches.html.twig',[
            'matches' => $awayMatches,
        ]);
    }

    /**
     * @Route("/matches/add", name="add-match")
     * @param Request $request
     * @return Response
     */
    public function addMatchesAction(Request $request): Response
    {
        $match = new Matches();
        $form = $this->createForm(AddMatchFormType::class, $match);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

//            $match->setMatchTime(new \DateTime());
            $em = $this->getDoctrine()->getManager();
            $em->persist($match);
            $em->flush();

            return $this->redirectToRoute('show-matches');
        }

        return $this->render('addMatch.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/matches/{matchId}/detail", name="show-detail-match")
     * @param Request $request
     * @param $matchId
     * @return Response
     */
    public function showDetailMatchesAction(Request $request, $matchId): Response
    {
        $match = $this->getDoctrine()->getRepository('App:Matches')->findOneBy(array('id' => $matchId));

        return $this->render('showMatchDetail.html.twig',[
            'match' => $match
        ]);
    }

    /**
     * @Route("/matches/{matchId}/edit", name="edit-match")
     * @param Request $request
     * @param $matchId
     * @return Response
     */
    public function editMatchesAction(Request $request, $matchId): Response
    {

        $match = $this->getDoctrine()->getRepository('App:Matches')->findOneBy(array('id'=> $matchId));
        $form = $this->createForm(AddMatchFormType::class, $match);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $match = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($match);
            $em->flush();

            return $this->redirectToRoute('show-matches');
        }

        return $this->render('editMatch.html.twig',[
            'match' => $match,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/matches/{matchId}/delete", name="delete-match")
     * @param Request $request
     * @param $matchId
     * @return Response
     */
    public function deleteMatchesAction(Request $request, $matchId): Response
    {

        $em = $this->getDoctrine()->getManager();

        $match = $em->getRepository('App:Matches')->find($matchId);

        $em->remove($match);
        $em->flush();

        return $this->redirectToRoute('show-matches');
    }





}
