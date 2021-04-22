<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;

class NominationController extends AbstractController{
    /**
     * @Route("/matches/nomination/create/{matchId}", name="show-away-matches")
     * @param Request $request
     * @param $matchId
     * @param UserInterface $user
     * @return Response
     */
    public function showAwayMatchesAction(Request $request, $matchId, UserInterface $user): Response
    {
        $match = $this->getDoctrine()->getRepository('App:Matches')->findOneBy(array('id' => $matchId));
        $players = $this->getDoctrine()->getRepository('App:Users')->findAll();
        $get = $this->get('security.token_storage')->getToken()->getUser();
        $user = $get->getCategoryId();

        $team = [];

        foreach ($players as $player){
            if ($user == $player->getCategoryId())
                array_push($team, $player);
        }

        return $this->render('showAwayMatches.html.twig',[
            'matches' => $team,
        ]);
    }
}