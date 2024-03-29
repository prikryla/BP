<?php


namespace App\Controller;


use App\Entity\Player_statistics;
use App\Entity\Users;
use App\Form\CreateStatisticsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlayerStatisticsController extends AbstractController {

    /**
     * @Route ("/statistics", name="show-statistics")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function showStatistics(Request $request, EntityManagerInterface $entityManager): Response
    {
        $statistics = $entityManager->getRepository(Player_statistics::class)->findAll();

        return $this->render('showStatistics.html.twig',[
            'statistics' => $statistics
        ]);
    }

    /**
     * @Route ("/statistics/create", name="create-statistics")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function createStatistics(Request $request, EntityManagerInterface $entityManager): Response
    {
        $users = $entityManager->getRepository(Users::class)->findAll();

        return $this->render('createStatistics.html.twig',[
            'users' => $users
        ]);
    }

    /**
     * @Route ("/statistics/create/{userId}", name="create-statistics-user")
     * @param Request $request
     * @param $userId
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function createUsersStatistics(Request $request, $userId, EntityManagerInterface $entityManager): Response
    {
        $statistic = new Player_statistics();
        $form = $this->createForm(CreateStatisticsType::class, $statistic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $user = $entityManager->getRepository(Users::class)->findOneBy(array('id' => $userId));
            $statistic->setUsers($user);

            $entityManager->persist($statistic);
            $entityManager->flush();

            $this->addFlash(
                'notice',
                'Statistika byla uložena!'
            );

            return $this->redirectToRoute('show-statistics');
        }

        return $this->render('createStatisticsUser.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route ("/statistics/show/{userId}", name="show-statistics-user")
     * @param Request $request
     * @param $userId
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function showUsersStatistics(Request $request, $userId, EntityManagerInterface $entityManager): Response
    {
        $statistics = $entityManager->getRepository(Player_statistics::class)->findBy(array('users_id' => $userId));

        return $this->render('showUsersStatistics.html.twig',[
            'statistics' => $statistics
        ]);
    }
}