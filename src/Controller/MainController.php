<?php

namespace App\Controller;

use App\Entity\Test;
use App\Form\TestType;
use App\Repository\TestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request, TestRepository $testRepository)
    {

        $tests = $testRepository->findAll();

        $test = new Test();
        $form = $this->createForm(TestType::class, $test);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($test);
            $em->flush();
            $this->addFlash('success', 'Enregistrement réalisé avec succès');
            return $this->redirectToRoute('homepage',['_fragment' => 'data']);
        }

        return $this->render('main/index.html.twig', [
            'form' => $form->createView(),
            'tests' => $tests
        ]);
    }

    /**
     * Deletes a Post entity.
     *
     * @Route("/{id}/delete", methods={"POST"}, name="admin_post_delete")
     */
    public function delete(Request $request, Test $test): Response
    {
        if (!$this->isCsrfTokenValid('delete', $request->request->get('token'))) {
            return $this->redirectToRoute('homepage',['_fragment' => 'data']);
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($test);
        $em->flush();
        $this->addFlash('success', 'Suppression réalisée avec succès');
        return $this->redirectToRoute('homepage',['_fragment' => 'data']);
    }
}
