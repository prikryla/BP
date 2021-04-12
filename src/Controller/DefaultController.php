<?php

namespace App\Controller;


use App\Form\UserRegisterType;
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

            return $this->redirectToRoute('homepage');
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
     * @return RedirectResponse|Response
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
     * @Route("/profil/edit", name="user-edit")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return RedirectResponse|Response
     */
    public function detailEditAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
//        if(!$user = $this->getUser()) {
//            return $this->redirectToRoute('login');
//        }

        $user = $this->getUser();

        return $this->render('userEdit.html.twig', [
            'user' => $user
        ]);
    }



}
