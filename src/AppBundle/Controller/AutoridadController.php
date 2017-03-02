<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Autoridad;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Autoridad controller.
 *
 */
class AutoridadController extends Controller
{
    /**
     * Lists all autoridad entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $autoridads = $em->getRepository('AppBundle:Autoridad')->findAll();

        return $this->render('autoridad/index.html.twig', array(
            'autoridads' => $autoridads,
        ));
    }

    /**
     * Creates a new autoridad entity.
     *
     */
    public function newAction(Request $request)
    {
        $autoridad = new Autoridad();
        $form = $this->createForm('AppBundle\Form\AutoridadType', $autoridad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($autoridad);
            $em->flush($autoridad);

            return $this->redirectToRoute('autoridad_show', array('id' => $autoridad->getId()));
        }

        return $this->render('autoridad/new.html.twig', array(
            'autoridad' => $autoridad,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a autoridad entity.
     *
     */
    public function showAction(Autoridad $autoridad)
    {
        $deleteForm = $this->createDeleteForm($autoridad);

        return $this->render('autoridad/show.html.twig', array(
            'autoridad' => $autoridad,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing autoridad entity.
     *
     */
    public function editAction(Request $request, Autoridad $autoridad)
    {
        $deleteForm = $this->createDeleteForm($autoridad);
        $editForm = $this->createForm('AppBundle\Form\AutoridadType', $autoridad);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('autoridad_edit', array('id' => $autoridad->getId()));
        }

        return $this->render('autoridad/edit.html.twig', array(
            'autoridad' => $autoridad,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a autoridad entity.
     *
     */
    public function deleteAction(Request $request, Autoridad $autoridad)
    {
        $form = $this->createDeleteForm($autoridad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($autoridad);
            $em->flush($autoridad);
        }

        return $this->redirectToRoute('autoridad_index');
    }

    /**
     * Creates a form to delete a autoridad entity.
     *
     * @param Autoridad $autoridad The autoridad entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Autoridad $autoridad)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('autoridad_delete', array('id' => $autoridad->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
