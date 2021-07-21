<?php

namespace App\Controller;

use App\Entity\Test;
use App\Form\TestType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request, EntityManagerInterface $em)
    {

        $tests = $em->getRepository(Test::class)->findAll();

        $test = $tests[0];
        $form = $this->createForm(TestType::class, $test);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($test);
            $em->flush();
            $this->addFlash('success', 'Successfully added');
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
    public function delete(Request $request, Test $test, EntityManagerInterface $em): Response
    {
        if (!$this->isCsrfTokenValid('delete', $request->request->get('token'))) {
            return $this->redirectToRoute('homepage',['_fragment' => 'data']);
        }

        $em->remove($test);
        $em->flush();

        $this->addFlash('success', 'Successfully deleted');
        return $this->redirectToRoute('homepage',['_fragment' => 'data']);
    }
}
