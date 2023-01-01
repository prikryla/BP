<?php

namespace App\Controller;

use App\Entity\Nomination;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Routing\Annotation\Route;

class NominationController extends AbstractController {

    /**
     * @Route("/matches/nomination/{matchId}", name="create-nomination")
     * @param Request $request
     * @param $matchId
     * @param UserInterface $user
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function createNomination(Request $request, $matchId, UserInterface $user, EntityManagerInterface $entityManager): Response
    {
        $match = $entityManager->getRepository('App:Matches')->findOneBy(array('id' => $matchId));
        $players = $entityManager->getRepository('App:Users')->findAll();
        $nomination = $entityManager->getRepository('App:Nomination')->findBy(array('matches_id' => $matchId));
        $get = $this->get('security.token_storage')->getToken()->getUser();
        $user = $get->getCategoryId();
        $team = [];

        foreach ($players as $player){
            if ($user == $player->getCategoryId())
                $team[] = $player;
        }

        return $this->render('createNomination.html.twig',[
            'team' => $team,
            'match' => $match,
            'nomination' => $nomination
        ]);
    }

    /**
     * @Route("/matches/nomination/{matchId}/{userId}", name="submit-nomination")
     * @param Request $request
     * @param $matchId
     * @param $userId
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function submitCreateNomination(Request $request, $matchId, $userId, EntityManagerInterface $entityManager): Response{

        $user = $entityManager->getRepository('App:Users')->findOneBy(array('id' => $userId));
        $match = $entityManager->getRepository('App:Matches')->findOneBy(array('id' => $matchId));

        $nomination = new Nomination();

        $nomination->setMatchesId($matchId);
        $nomination->setUsersId($userId);
        $nomination->setMatches($match);
        $nomination->setUsers($user);

        $entityManager->persist($nomination);
        $entityManager->flush();

        $this->addFlash(
            'notice',
            'Nominace byla potvrzena!'
        );

        return $this->redirectToRoute('create-nomination', array(
            'matchId' => $matchId
        ));
    }

    /**
     * @Route("/matches/nomination/{matchId}/{userId}/delete", name="delete-nomination")
     * @param Request $request
     * @param $matchId
     * @param $userId
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function deleteNomination(Request $request, $matchId, $userId, EntityManagerInterface $entityManager): Response{

        $nomination = $entityManager->getRepository('App:Nomination')->findOneBy(array(
            'matches_id' => $matchId,
            'users_id' => $userId
        ));

        $entityManager->remove($nomination);
        $entityManager->flush();

        $this->addFlash(
            'warning',
            'Nominace byla odstraněna!'
        );

        return $this->redirectToRoute('create-nomination', [
            'matchId' => $matchId
        ]);
    }
}