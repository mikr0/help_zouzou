<?php


namespace App\Controller;


use App\Entity\Purpose;
use App\Entity\User;
use App\Form\UserType;
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
     * @return RedirectResponse|Response
     */

    public function formSeekFriends(Request $request)
    {
        $user = new User();
/*        $purpose = new Purpose();*/

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            /*$test = $user->getPurpose();
            $purpose->setAccommodation($test["accommodation"]);
            $purpose->setSupport($test["support"]);
            $purpose->setVehicle($test["vehicle"]);
            $user->addPurpose($purpose);*/
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
