<?php


namespace App\Controller;


use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */

    public function index()
    {
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/formulaire", name="formulaire")
     * @param Request $request
     * @param EntityManager $entityManager
     * @return RedirectResponse|Response
     */

    public function formSeekFriends(Request $request)
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        $user = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('index');
        }

            return $this->render('formulaire.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
