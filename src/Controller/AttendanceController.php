<?php


namespace App\Controller;


use App\Entity\Attendance;
use App\Form\AddAttendanceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AttendanceController extends AbstractController{

    /**
     * @Route("/attendance", name="show-attendance")
     * @param Request $request
     * @return Response
     */
    public function showAction(Request $request): Response
    {
        $usr = $this->getUser();
        $users = $this->getDoctrine()->getRepository('App:Users')->findAll();

        $team = [];

        foreach ($users as $user){
            if ($usr->getCategoryId() == $user->getCategoryId()){
                array_push($team, $user);
            }
        }

        return $this->render('showAttendance.html.twig', [
            'members' => $team
        ]);
    }

    /**
     * @Route("/attendance/{userId}", name="show-attendance-user")
     * @param Request $request
     * @param $userId
     * @return Response
     */
    public function showUserAction(Request $request, $userId): Response
    {
        $attendance = $this->getDoctrine()->getRepository('App:Attendance')->findBy(array('usersId' => $userId));

        return $this->render('showAttendanceUser.html.twig', [
            'attendance' => $attendance
        ]);
    }

    /**
     * @Route("/attendance/add/{userId}", name="add-attendance")
     * @param Request $request
     * @param $userId
     * @return Response
     */
    public function addAction(Request $request, $userId): Response
    {
        $attendance = new Attendance();

        $form = $this->createForm(AddAttendanceType::class, $attendance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $user = $this->getDoctrine()->getRepository('App:Users')->findOneBy(array('id' => $userId));
            $attendance->setUsers($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($attendance);
            $em->flush();

            $this->addFlash(
                'notice',
                'Docházka byla uložena!'
            );

            return $this->redirectToRoute('show-attendance');
        }

        return $this->render('addAttendance.html.twig',[
            'form' => $form->createView()
        ]);
    }

}