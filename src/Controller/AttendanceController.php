<?php


namespace App\Controller;


use App\Entity\Attendance;
use App\Entity\Users;
use App\Form\AddAttendanceType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AttendanceController extends AbstractController {

    /**
     * @Route("/attendance", name="show-attendance")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function showAttendance(Request $request, EntityManagerInterface $entityManager): Response
    {
        $usr = $this->getUser();
        $users = $entityManager->getRepository(Users::class)->findAll();
        $team = [];

        foreach ($users as $user){
            if ($usr->getCategoryId() == $user->getCategoryId()){
                $team[] = $user;
            }
        }

        return $this->render('showAttendance.html.twig', [
            'members' => $team
        ]);
    }

    /**
     * @Route("/attendance/all", name="show-all-attendance")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function showAllAttendance(Request $request, EntityManagerInterface $entityManager): Response
    {
        $attendance = $entityManager->getRepository(Attendance::class)->findAll();

        return $this->render('showAllAttendance.html.twig', [
            'attendance' => $attendance
        ]);
    }

    /**
     * @Route("/attendance/{userId}", name="show-attendance-user")
     * @param Request $request
     * @param $userId
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function showUserAttendance(Request $request, $userId, EntityManagerInterface $entityManager): Response
    {
        $attendance = $entityManager->getRepository(Attendance::class)->findBy(array('usersId' => $userId));

        return $this->render('showAttendanceUser.html.twig', [
            'attendance' => $attendance
        ]);
    }

    /**
     * @Route("/attendance/add/{userId}", name="add-attendance")
     * @param Request $request
     * @param $userId
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function addAttendance(Request $request, $userId, EntityManagerInterface $entityManager): Response
    {
        $attendance = new Attendance();

        $form = $this->createForm(AddAttendanceType::class, $attendance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $user = $entityManager->getRepository(Users::class)->findOneBy(array('id' => $userId));
            $attendance->setUsers($user);

            $entityManager->persist($attendance);
            $entityManager->flush();

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