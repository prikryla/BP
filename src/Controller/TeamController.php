<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeamController extends AbstractController{

    /**
     * @Route("/team/{userId}", name="show-team")
     * @param Request $request
     * @param $userId
     * @return Response
     */
    public function showAction(Request $request, $userId): Response
    {
        $usr = $this->getDoctrine()->getRepository('App:Users')->findOneBy(array('id' => $userId));
        $users = $this->getDoctrine()->getRepository('App:Users')->findAll();

        $team = [];

        foreach ($users as $user){
            if ($usr->getCategoryId() == $user->getCategoryId()){
                array_push($team, $user);
            }
        }

        return $this->render('showTeam.html.twig', [
            'members' => $team
        ]);
    }

}