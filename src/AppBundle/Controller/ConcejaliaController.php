<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Concejalia;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Concejalium controller.
 *
 */
class ConcejaliaController extends Controller
{
    /**
     * Lists all concejalium entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $concejalias = $em->getRepository('AppBundle:Concejalia')->findAll();

        return $this->render('concejalia/index.html.twig', array(
            'concejalias' => $concejalias,
        ));
    }

    /**
     * Creates a new concejalium entity.
     *
     */
    public function newAction(Request $request)
    {
        $concejalium = new Concejalium();
        $form = $this->createForm('AppBundle\Form\ConcejaliaType', $concejalium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($concejalium);
            $em->flush($concejalium);

            return $this->redirectToRoute('concejalia_show', array('id' => $concejalium->getId()));
        }

        return $this->render('concejalia/new.html.twig', array(
            'concejalium' => $concejalium,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a concejalium entity.
     *
     */
    public function showAction(Concejalia $concejalium)
    {
        $deleteForm = $this->createDeleteForm($concejalium);

        return $this->render('concejalia/show.html.twig', array(
            'concejalium' => $concejalium,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing concejalium entity.
     *
     */
    public function editAction(Request $request, Concejalia $concejalium)
    {
        $deleteForm = $this->createDeleteForm($concejalium);
        $editForm = $this->createForm('AppBundle\Form\ConcejaliaType', $concejalium);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('concejalia_edit', array('id' => $concejalium->getId()));
        }

        return $this->render('concejalia/edit.html.twig', array(
            'concejalium' => $concejalium,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a concejalium entity.
     *
     */
    public function deleteAction(Request $request, Concejalia $concejalium)
    {
        $form = $this->createDeleteForm($concejalium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($concejalium);
            $em->flush($concejalium);
        }

        return $this->redirectToRoute('concejalia_index');
    }

    /**
     * Creates a form to delete a concejalium entity.
     *
     * @param Concejalia $concejalium The concejalium entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Concejalia $concejalium)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('concejalia_delete', array('id' => $concejalium->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
