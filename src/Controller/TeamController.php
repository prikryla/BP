<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Players;
use App\Entity\Users;
use App\Form\AddTeamMemberType;
use App\Form\FinePlayerType;
use App\Form\UserEditType;
use App\Form\UserRegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class TeamController extends AbstractController {

    /**
     * @Route("/team", name="show-club")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function showAllAction(Request $request, EntityManagerInterface $entityManager): Response
    {
        $users = $entityManager->getRepository(Players::class)->findAll();

        return $this->render('showAllClub.html.twig', [
            'members' => $users
        ]);
    }

    /**
     * @Route("/team/{userId}", name="show-team")
     * @param Request $request
     * @param $userId
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function showAction(Request $request, $userId, EntityManagerInterface $entityManager): Response
    {
        $usr = $entityManager->getRepository(Users::class)->findOneBy(array('id' => $userId));
        $users = $entityManager->getRepository(Users::class)->findAll();
        $team = [];

        foreach ($users as $user){
            if ($usr->getCategoryId() == $user->getCategoryId()){
                $team[] = $user;
            }
        }

        return $this->render('showTeam.html.twig', [
            'members' => $team
        ]);
    }

    /**
     * @Route("/team/{userId}/user/create", name="add-user-team")
     * @param Request $request
     * @param UserPasswordHasher $passwordHasher
     * @param $userId
     * @return Response
     * @throws \Exception
     */
    public function createAction(Request $request, UserPasswordHasher $passwordHasher, $userId, EntityManagerInterface $entityManager): Response{

        $user = new Users();
        $form = $this->createForm(AddTeamMemberType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $randomBytes = random_bytes(32);
            $user->setSalt(bin2hex($randomBytes));

            $password = $passwordHasher->hashPassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            $user->setAuthRole('ROLE_PLAYER');

            $entityManager->persist($user);
            $entityManager->flush();

            $session = new Session();
            $session->getFlashBag()->add('notice', 'Profil vytvořen.');

            $this->addFlash(
                'notice',
                'Nový hráč byl přidán do týmu!'
            );

            return $this->redirectToRoute('show-team', array(
                'userId' => $userId
            ));
        }

        return $this->render(
            'addTeamMember.html.twig', array(
                'form' => $form->createView(),
            )
        );
    }

    /**
     * @Route("/team/player/{userId}", name="user-detail-team")
     * @param Request $request
     * @param $userId
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function detailAction(Request $request, $userId, EntityManagerInterface $entityManager): Response
    {

        $user = $entityManager->getRepository(Users::class)->findOneBy(array('id' => $userId));

        return $this->render('showUserTeam.html.twig', [
            'user' => $user
        ]);
    }

    /**
     * @Route("/team/player/{userId}/edit", name="team-user-edit")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param $userId
     * @return Response
     */
    public function detailEditAction(Request $request, EntityManagerInterface $entityManager, $userId): Response
    {
        $user = $entityManager->getRepository(Users::class)->findOneBy(array('id' => $userId));
        $form = $this->createForm(UserEditType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash(
                'notice',
                'Změny byly uloženy!'
            );

            return $this->redirectToRoute('user-detail-team');
        }
        return $this->render('userEdit.html.twig', [
            'user' => $user,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/team/player/{userId}/fine", name="fine-user-team")
     * @param Request $request
     * @param $userId
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function fineAction(Request $request, $userId, EntityManagerInterface $entityManager): Response
    {

        $user = $entityManager->getRepository(Users::class)->findOneBy(array('id' => $userId));
        $form = $this->createForm(FinePlayerType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash(
                'notice',
                'Hráč byl pokutován!'
            );

            return $this->redirectToRoute('user-detail-team', array(
                'userId' => $userId
            ));
        }
        return $this->render('finePlayer.html.twig', [
            'userId' => $userId,
            'user' => $user,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/fines", name="show-all-fines")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function showAllFinesAction(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $entityManager->getRepository(Users::class)->findAll();
        $users = [];

        foreach ($user as $usr){
            if ($usr->getFines() > 0)
            $users[] = $usr;
        }

        return $this->render('showAllFines.html.twig', [
            'users' => $users
        ]);
    }

    /**
     * @Route ("/team/delete/{usersId}/{userId}", name="delete-user-team")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param $userId
     * @param $usersId
     * @return RedirectResponse
     */
    public function deleteAction(Request $request, EntityManagerInterface $entityManager, $userId): RedirectResponse
    {
        $user = $entityManager->getRepository(Users::class)->find($userId);

        $entityManager->remove($user);
        $entityManager->flush();

        $this->addFlash(
            'warning',
            'Hráč byl odstraněn z týmu!'
        );

        return $this->redirectToRoute('show-team', array(
            'userId' => $userId
        ));
    }
}