<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlayerStatisticsController extends AbstractController{

    /**
     * @Route("/statistics", name="show-statistics")
     * @param Request $request
     * @param integer $userId
     * @return Response
     */
    public function showAction(Request $request, int $userId): Response
    {
        $statistics = $this->getDoctrine()->getRepository('App:Player_statistics')->findAll();

        return $this->render('showStatistics.html.twig',[
            'statistics' => $statistics
        ]);
    }

}