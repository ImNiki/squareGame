<?php

namespace App\Controller;

use App\Entity\SGParty;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OPatouEntranceController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        return $this->render('o_patou_entrance/index.html.twig', [
            'controller_name' => 'OPatouEntranceController',
        ]);
    }

    /**
     * @Route("/square-game", name="squaregame_home")
     */
    public function squareGameHome()
    {
        return $this->render('o_patou_squaregame/squaregame_index.html.twig', [
            'controller_name' => 'OPatouEntranceController',
        ]);

    }


    /**
     * @Route("/square-game/new-party", name="squaregame_new_party")
     *
     */
    public function createSquareGameParty(Request $request)
    {
        $party = new SGParty();
        $party->setCreated(new \DateTime('now'));

        $form = $this->createFormBuilder($party)
            ->add('name', TextType::class)
            ->add('save', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $party = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($party);
            $entityManager->flush();

            return $this->redirectToRoute('squaregame_home');
        }


        return $this->render('o_patou_squaregame/squaregame_create.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/square-game/previous-parties", name="square_game_parties")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function allSquareGameparties()
    {
        $repository = $this->getDoctrine()->getRepository(SGParty::class);
        $parties = $repository->findAll();

        return $this->render('o_patou_squaregame/squaregame_parties.html.twig', ['controller_name' => 'OPatouEntranceController', 'parties' => $parties]);
    }

}
