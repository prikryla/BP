<?php


namespace App\Controller;


use App\Entity\Category;
use App\Entity\Users;
use App\Form\AddTeamMemberType;
use App\Form\UserRegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}