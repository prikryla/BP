<?php


namespace App\Controller;


use App\Entity\Category;
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
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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

    /**
     * @Route("/team/{userId}/user/create", name="add-user-team")
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface $passwordEncoder
     * @param $userId
     * @return Response
     * @throws \Exception
     */
    public function createAction(Request $request, UserPasswordEncoderInterface $passwordEncoder, $userId): Response{

        $user = new Users();
        $form = $this->createForm(AddTeamMemberType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $randomBytes = random_bytes(32);
            $user->setSalt(bin2hex($randomBytes));

            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

//            $user->setDateOfBirth($form['dateOfBirth']->getData());
            $user->setAuthRole('ROLE_PLAYER');
            $user->setUsers($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $session = new Session();
            $session->getFlashBag()->add('notice', 'Profil vytvořen.');
            //$session->set('user', $user);

//            return $this->redirectToRoute('show-team');
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
     * @return Response
     */
    public function detailAction(Request $request, $userId)
    {

        $user = $this->getDoctrine()->getRepository('App:Users')->findOneBy(array('id' => $userId));

        return $this->render('showUserTeam.html.twig', [
            'user' => $user
        ]);
    }

    /**
     * @Route("/team/player/{userId}/fine", name="fine-user-team")
     * @param Request $request
     * @param $userId
     * @param \Doctrine\ORM\EntityManagerInterface $em
     * @return Response
     */
    public function fineAction(Request $request, $userId, EntityManagerInterface $em)
    {

        $user = $this->getDoctrine()->getRepository('App:Users')->findOneBy(array('id' => $userId));

        $form = $this->createForm(FinePlayerType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();
            $user->setUsers($this->getUser());

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('user-detail-team', array(
                'userId' => $userId
            ));
        }
        return $this->render('finePlayer.html.twig', [
            'userId' => $userId,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/fines", name="show-all-fines")
     * @param Request $request
     * @return Response
     */
    public function showAllFinesAction(Request $request): Response
    {
        $user = $this->getDoctrine()->getRepository('App:Users')->findAll();

        $users = [];

        foreach ($user as $usr){
            if ($usr->getFines() > 0)
            array_push($users, $usr);
        }

        return $this->render('showAllFines.html.twig', [
            'users' => $users
        ]);
    }

}