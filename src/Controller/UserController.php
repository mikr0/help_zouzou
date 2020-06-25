<?php


namespace App\Controller;


use App\Entity\Clinic;
use App\Repository\ClinicRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/match", name="match")
     * @param UserRepository $userRepository
     * @return Response
     */
    public function match(UserRepository $userRepository): Response
    {

        $users = $userRepository->findAll();


        return $this->render('match/matching.html.twig',[
            'users'=> $users,


        ]);
    }

}
