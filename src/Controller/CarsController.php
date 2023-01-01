<?php

namespace App\Controller;

use App\Entity\Cars;
use App\Form\CarsAddType;
use App\Form\CarsEditType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarsController extends AbstractController {

    /**
     * @Route("/cars", name="show-cars")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function showCars(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cars = $entityManager->getRepository('App:Cars')->findAll();

        $allCars = [];

        foreach ($cars as $car){
            $allCars[] = $car;
        }

        return $this->render('showCars.html.twig',[
            'cars' => $allCars,
        ]);
    }

    /**
     * @Route("/cars/create", name="create-cars")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function addCars(Request $request, EntityManagerInterface $entityManager): Response
    {
        $car = new Cars();
        $form = $this->createForm(CarsAddType::class, $car);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $car = $form->getData();
            $entityManager->persist($car);
            $entityManager->flush();

            $this->addFlash(
                'notice',
                'Nové auto bylo úspěšně přidáno!'
            );

            return $this->redirectToRoute('show-cars');
        }

        return $this->render('addCars.html.twig', [
            'car' => $car,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/cars/edit/{carsId}", name="edit-cars")
     * @param Request $request
     * @param $carsId
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function editCars(Request $request, $carsId, EntityManagerInterface $entityManager): Response
    {
        $car = $entityManager->getRepository('App:Cars')->findOneBy(array('id' => $carsId));
        $form = $this->createForm(CarsEditType::class, $car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $car = $form->getData();
            $entityManager->persist($car);
            $entityManager->flush();

            $this->addFlash(
                'notice',
                'Změny byly uloženy!'
            );

            return $this->redirectToRoute('show-cars');
        }

        return $this->render('editCar.html.twig',[
           'car' => $car,
           'form' => $form->createView()
        ]);
    }
}