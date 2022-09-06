<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
}
