<?php


namespace App\Controller;


use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/match", name="match")
     * @param UserRepository $repository
     * @return Response
     */
    public function match(UserRepository $repository): Response
    {
        $user = $repository->findAll();

        return $this->render('match/matching.html.twig',[
            'user'=> $user,
        ]);
    }

}
