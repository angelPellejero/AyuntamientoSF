<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Patrocinador;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Patrocinador controller.
 *
 */
class PatrocinadorController extends Controller
{
    /**
     * Lists all patrocinador entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $patrocinadors = $em->getRepository('AppBundle:Patrocinador')->findAll();

        return $this->render('patrocinador/index.html.twig', array(
            'patrocinadors' => $patrocinadors,
        ));
    }

    /**
     * Creates a new patrocinador entity.
     *
     */
    public function newAction(Request $request)
    {
        $patrocinador = new Patrocinador();
        $form = $this->createForm('AppBundle\Form\PatrocinadorType', $patrocinador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($patrocinador);
            $em->flush($patrocinador);

            return $this->redirectToRoute('patrocinador_show', array('id' => $patrocinador->getId()));
        }

        return $this->render('patrocinador/new.html.twig', array(
            'patrocinador' => $patrocinador,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a patrocinador entity.
     *
     */
    public function showAction(Patrocinador $patrocinador)
    {
        $deleteForm = $this->createDeleteForm($patrocinador);

        return $this->render('patrocinador/show.html.twig', array(
            'patrocinador' => $patrocinador,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing patrocinador entity.
     *
     */
    public function editAction(Request $request, Patrocinador $patrocinador)
    {
        $deleteForm = $this->createDeleteForm($patrocinador);
        $editForm = $this->createForm('AppBundle\Form\PatrocinadorType', $patrocinador);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('patrocinador_edit', array('id' => $patrocinador->getId()));
        }

        return $this->render('patrocinador/edit.html.twig', array(
            'patrocinador' => $patrocinador,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a patrocinador entity.
     *
     */
    public function deleteAction(Request $request, Patrocinador $patrocinador)
    {
        $form = $this->createDeleteForm($patrocinador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($patrocinador);
            $em->flush($patrocinador);
        }

        return $this->redirectToRoute('patrocinador_index');
    }

    /**
     * Creates a form to delete a patrocinador entity.
     *
     * @param Patrocinador $patrocinador The patrocinador entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Patrocinador $patrocinador)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('patrocinador_delete', array('id' => $patrocinador->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
