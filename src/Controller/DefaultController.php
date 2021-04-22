<?php

namespace App\Controller;


use App\Form\UserChangePasswordType;
use App\Form\UserEditType;
use App\Form\UserRegisterType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Entity\Users;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Validator\Constraints\DateTime;

class DefaultController extends AbstractController{

    /**
     * @Route("/", name="default")
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request): Response
    {
        return $this->redirectToRoute('homepage');
    }

    /**
     * @Route("/home", name="homepage")
     * @param Request $request
     * @return Response
     */
    public function showAction(Request $request): Response
    {
        return $this->render('homepage.html.twig');
    }

    /**
     * @Route("/register", name="user_registration")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return RedirectResponse|Response
     * @throws Exception
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {

// 1) build the form
        $user = new Users();
        $form = $this->createForm(UserRegisterType::class, $user);

// 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);

        // dump($form);

        if ($form->isSubmitted() && $form->isValid()) {


            $randomBytes = random_bytes(32);
            $user->setSalt(bin2hex($randomBytes));

// 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            //      $user->setUsername($user->getEmail());
            //$user->setUsername($user->getEmail());
            $user->setDateOfBirth($form['dateOfBirth']->getData());
            $user->setAuthRole('ROLE_PLAYER');
            $user->setUsers($user);

// 4) save the Users!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // dump($user);


// ... do any other work - like sending them an email, etc
// maybe set a "flash" success message for the user
            $session = new Session();
            $session->getFlashBag()->add('notice', 'Profil vytvořen.');
            //$session->set('user', $user);

// autologin https://stackoverflow.com/questions/5886713/automatic-post-registration-user-authentication
//            $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
//            $this->get('security.token_storage')->setToken($token);
//            $this->get('session')->set('_security_main', serialize($token));
//
//            $this->get('session')->set('player_id', $user->getId());

            return $this->redirectToRoute('login');
        }

        return $this->render(
            'registration.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/profil", name="user-detail")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return Response
     */
    public function detailAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
//        if(!$user = $this->getUser()) {
//            return $this->redirectToRoute('login');
//        }

        $user = $this->getUser();

        return $this->render('userProfile.html.twig', [
            'user' => $user
        ]);
    }

    /**
     * @Route("/profil/edit/{userId}", name="user-edit")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param $userId
     * @return Response
     */
    public function detailEditAction(Request $request, EntityManagerInterface $em, $userId)
    {
        $user = $this->getDoctrine()->getRepository('App:Users')->findOneBy(array('id' => $userId));

        $form = $this->createForm(UserEditType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();
            $user->setUsers($this->getUser());

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('user-detail');
        }
        return $this->render('userEdit.html.twig', [
            'user' => $user,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route ("/profil/changePassword/{userId}", name="user-changePassword")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param $userId
     * @return Response
     * @throws Exception
     */
    public function changePasswordAction(Request $request, EntityManagerInterface $em, UserPasswordEncoderInterface $passwordEncoder, $userId){
        $user = $this->getDoctrine()->getRepository('App:Users')->findOneBy(array('id' => $userId));

        $form = $this->createForm(UserChangePasswordType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();
            if ($user->getPlainPassword()) {
                $randomBytes = random_bytes(32);
                $user->setSalt(bin2hex($randomBytes));
                $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
                $user->setPassword($password);
            }
            $user->setUsers($this->getUser());

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('user-detail');
        }
        return $this->render('userChangePassword.html.twig', [
            'user' => $user,
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route ("/user/delete/{usersId}/{userId}", name="delete-user")
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Doctrine\ORM\EntityManagerInterface $em
     * @param $userId
     * @param $usersId
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, EntityManagerInterface $em, $userId, $usersId){

            $em = $this->getDoctrine()->getManager();

            $user = $em->getRepository('App:Users')->find($userId);

            $currentUser = $usersId;
            $em->remove($user);
            $em->flush();

            return $this->redirectToRoute('show-team', [
                'userId' => $currentUser
            ]);
    }


}
