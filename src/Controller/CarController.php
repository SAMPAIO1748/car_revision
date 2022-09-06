<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CarController extends AbstractController
{
    /**
     * @Route("/car", name="app_car")
     */
    public function index(): Response
    {
        return $this->render('car/index.html.twig', [
            'controller_name' => 'CarController',
        ]);
    }

    /**
     * @Route("cars", name="car_list")
     */
    public function carList(CarRepository $carRepository)
    {
        $cars = $carRepository->findAll();

        return $this->render("car_list.html.twig", ['cars' => $cars]);
    }

    /**
     * @Route("car/{id}", name="car_show")
     */
    public function carShow($id, CarRepository $carRepository)
    {
        $car = $carRepository->find($id);

        return $this->render("car_show.html.twig", ['car' => $car]);
    }

    /**
     * @Route("create/car", name="create_car")
     */
    public function createCar(EntityManagerInterface $entityManagerInterface, Request $request)
    {
        $car = new Car();

        $carForm = $this->createForm(CarType::class, $car);

        $carForm->handleRequest($request);

        if ($carForm->isSubmitted() && $carForm->isValid()) {

            $entityManagerInterface->persist($car);
            $entityManagerInterface->flush();

            return $this->redirectToRoute('car_list');
        }


        return $this->render("car_form.html.twig", ['carForm' => $carForm->createView()]);
    }

    /**
     * @Route("reservation/car/{id}", name="reservation_car")
     */
    public function reservationCar(
        Request $request,
        CarRepository $carRepository,
        EntityManagerInterface $entityManagerInterface,
        $id
    ) {
        $car = $carRepository->find($id);

        $text = $request->request->get('reservation');

        $car->setReservation($text);

        $entityManagerInterface->persist($car);
        $entityManagerInterface->flush();

        return $this->redirectToRoute('car_list');
    }
}
