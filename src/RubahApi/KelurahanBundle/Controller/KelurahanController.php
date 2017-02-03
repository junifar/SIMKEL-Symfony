<?php

namespace RubahApi\KelurahanBundle\Controller;

use RubahApi\KelurahanBundle\Entity\Kelurahan;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Kelurahan controller.
 *
 * @Route("kelurahan")
 */
class KelurahanController extends Controller
{
    /**
     * Lists all kelurahan entities.
     *
     * @Route("/", name="kelurahan_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $kelurahans = $em->getRepository('RubahApiKelurahanBundle:Kelurahan')->findAll();

        return $this->render('kelurahan/index.html.twig', array(
            'kelurahans' => $kelurahans,
        ));
    }

    /**
     * Creates a new kelurahan entity.
     *
     * @Route("/new", name="kelurahan_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $kelurahan = new Kelurahan();
        $form = $this->createForm('RubahApi\KelurahanBundle\Form\KelurahanType', $kelurahan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($kelurahan);
            $em->flush($kelurahan);

            return $this->redirectToRoute('kelurahan_show', array('id' => $kelurahan->getId()));
        }

        return $this->render('kelurahan/new.html.twig', array(
            'kelurahan' => $kelurahan,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a kelurahan entity.
     *
     * @Route("/{id}", name="kelurahan_show")
     * @Method("GET")
     */
    public function showAction(Kelurahan $kelurahan)
    {
        $deleteForm = $this->createDeleteForm($kelurahan);

        return $this->render('kelurahan/show.html.twig', array(
            'kelurahan' => $kelurahan,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing kelurahan entity.
     *
     * @Route("/{id}/edit", name="kelurahan_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Kelurahan $kelurahan)
    {
        $deleteForm = $this->createDeleteForm($kelurahan);
        $editForm = $this->createForm('RubahApi\KelurahanBundle\Form\KelurahanType', $kelurahan);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('kelurahan_edit', array('id' => $kelurahan->getId()));
        }

        return $this->render('kelurahan/edit.html.twig', array(
            'kelurahan' => $kelurahan,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a kelurahan entity.
     *
     * @Route("/{id}", name="kelurahan_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Kelurahan $kelurahan)
    {
        $form = $this->createDeleteForm($kelurahan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($kelurahan);
            $em->flush($kelurahan);
        }

        return $this->redirectToRoute('kelurahan_index');
    }

    /**
     * Creates a form to delete a kelurahan entity.
     *
     * @param Kelurahan $kelurahan The kelurahan entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Kelurahan $kelurahan)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('kelurahan_delete', array('id' => $kelurahan->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
