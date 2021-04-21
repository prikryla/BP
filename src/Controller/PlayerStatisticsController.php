<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlayerStatisticsController extends AbstractController{

    /**
     * @Route("/statistics/{userId}", name="show-statistics")
     * @param Request $request
     * @param integer $userId
     * @return Response
     */
    public function showAction(Request $request, int $userId): Response
    {
        $statistics = $this->getDoctrine()->getRepository('App:Player_statistics')->findAll();
        $allStatistics = [];

        foreach ($statistics as $stats){
            if ($stats->getUsersId() == 1){
                array_push($allStatistics, $stats);
            }
        }

        return $this->render('showStatistics.html.twig',[
            'statistics' => $allStatistics
        ]);
    }

}