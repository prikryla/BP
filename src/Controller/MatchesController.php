<?php

namespace App\Controller;

use App\Entity\Matches;
use App\Form\AddMatchFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Test\Constraint\EmailTextBodyContains;
use Symfony\Component\Routing\Annotation\Route;

class MatchesController extends AbstractController {

    /**
     * @Route("/matches", name="show-matches")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function showMatches(Request $request, EntityManagerInterface $entityManager): Response
    {
        $matches = $entityManager->getRepository(Matches::class)->findAll();
        $user = $this->getUser();
        $allMatches = [];

        foreach ($matches as $match){
            $allMatches[] = $match;
        }

        return $this->render('showMatches.html.twig',[
            'matches' => $allMatches,
            'user' => $user
        ]);
    }

    /**
     * @Route("/matches/U12", name="show-matches-u12")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */

    public function showMatchesU12(Request $request, EntityManagerInterface $entityManager): Response
    {
        $matches = $entityManager->getRepository(Matches::class)->findBy(array('category_id' => 2));
        $allMatches = [];

        foreach ($matches as $match){
            $allMatches[] = $match;
        }

        return $this->render('showMatchesU12.html.twig',[
            'matches' => $allMatches,
        ]);
    }

    /**
     * @Route("/matches/U15", name="show-matches-u15")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */

    public function showMatchesU15(Request $request, EntityManagerInterface $entityManager): Response
    {
        $matches = $entityManager->getRepository(Matches::class)->findBy(array('category_id' => 3));
        $allMatches = [];

        foreach ($matches as $match){
            $allMatches[] = $match;
        }

        return $this->render('showMatchesU15.html.twig',[
            'matches' => $allMatches,
        ]);
    }

    /**
     * @Route("/matches/U17", name="show-matches-u17")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */

    public function showMatchesU17(Request $request, EntityManagerInterface $entityManager): Response
    {
        $matches = $entityManager->getRepository(Matches::class)->findBy(array('category_id' => 4));
        $allMatches = [];

        foreach ($matches as $match){
            $allMatches[] = $match;
        }

        return $this->render('showMatchesU17.html.twig',[
            'matches' => $allMatches,
        ]);
    }

    /**
     * @Route("/matches/U19-U20", name="show-matches-u19/u20")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */

    public function showMatchesU19(Request $request, EntityManagerInterface $entityManager): Response
    {
        $matches = $entityManager->getRepository(Matches::class)->findBy(array('category_id' => 5));
        $allMatches = [];

        foreach ($matches as $match){
            $allMatches[] = $match;
        }

        return $this->render('showMatchesU19U20.html.twig',[
            'matches' => $allMatches,
        ]);
    }

    /**
     * @Route("/matches/away", name="show-away-matches")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function showAwayMatches(Request $request, EntityManagerInterface $entityManager): Response
    {
        $matches = $entityManager->getRepository(Matches::class)->findAll();
        $awayMatches = [];

        foreach ($matches as $match){
            if ($match->getHomeTeam() != 'BBK Blansko')
            $awayMatches[] = $match;
        }

        return $this->render('showAwayMatches.html.twig',[
            'matches' => $awayMatches,
        ]);
    }

    /**
     * @Route("/matches/add", name="add-match")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function addMatches(Request $request, EntityManagerInterface $entityManager): Response
    {
        $match = new Matches();
        $form = $this->createForm(AddMatchFormType::class, $match);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $entityManager->persist($match);
            $entityManager->flush();

            $this->addFlash(
                'notice',
                'Byl přidán nový zápas!'
            );

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
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function showMatchesDetail(Request $request, $matchId, EntityManagerInterface $entityManager): Response
    {
        $match = $entityManager->getRepository(Matches::class)->findOneBy(array('id' => $matchId));

        return $this->render('showMatchDetail.html.twig',[
            'match' => $match
        ]);
    }

    /**
     * @Route("/matches/{matchId}/edit", name="edit-match")
     * @param Request $request
     * @param $matchId
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function editMatches(Request $request, $matchId, EntityManagerInterface $entityManager): Response
    {

        $match = $entityManager->getRepository(Matches::class)->findOneBy(array('id'=> $matchId));
        $form = $this->createForm(AddMatchFormType::class, $match);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $match = $form->getData();

            $entityManager->persist($match);
            $entityManager->flush();

            $this->addFlash(
                'notice',
                'Změny byly uloženy!'
            );

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
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function deleteMatches(Request $request, $matchId, EntityManagerInterface $entityManager): Response
    {
        $match = $entityManager->getRepository(Matches::class)->find($matchId);

        $this->addFlash(
            'warning',
            'Zápas byl odstraněn!'
        );

        $entityManager->remove($match);
        $entityManager->flush();

        return $this->redirectToRoute('show-matches');
    }
}
