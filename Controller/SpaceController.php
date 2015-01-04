<?php

namespace Walva\AdSiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use \Walva\CrudAdminBundle\Controller\CrudController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Walva\AdSiteBundle\Entity\Space;
use Walva\AdSiteBundle\Form\SpaceType;

/**
 * Space controller.
 *
 * @Route("/space")
 */
class SpaceController extends Controller
{


    function __construct()
    {
        $this->setRoutes(array(
            self::$ROUTE_INDEX_ADD => 'space_new',
            self::$ROUTE_INDEX_INDEX => 'space',
            self::$ROUTE_INDEX_DELETE => 'space_show',
            self::$ROUTE_INDEX_EDIT => 'space_edit',
            self::$ROUTE_INDEX_SHOW => 'space_show',
        ));

        $this->setLayoutPath('WalvaAdSiteBundle:Space:layout.html.twig');
        $this->setIndexPath("WalvaAdSiteBundle:Space:index.html.twig");
        $this->setShowPath("WalvaAdSiteBundle:Space:show.html.twig");
        $this->setEditPath("WalvaAdSiteBundle:Space:edit.html.twig");

        $this->setColumnsHeader(array(
            "Id",
            "Name",
            "Website",
            "Format",

        ));
    }

    public function createEntity()
    {
        return new Space();
    }

    public function getRepository()
    {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('WalvaAdSiteBundle:Space');
    }

    /**
     * Lists all Space entities.
     *
     * @Route("/", name="space")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return parent::indexAction();

    }

    /**
     * Creates a new Space entity.
     *
     * @Route("/", name="space_create")
     * @Method("POST")
     * @Template("WalvaAdSiteBundle:Space:new.html.twig")
     */
    public function createAction(Request $request)
    {
        return parent::createAction($request);

    }

    /**
     * Creates a form to create a Space entity.
     *
     * @param Space $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createCreateForm(Space $entity)
    {
        $form = $this->createForm(new SpaceType(), $entity, array(
            'action' => $this->generateUrl('space_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Space entity.
     *
     * @Route("/new", name="space_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        return parent::newAction();

    }

    /**
     * Finds and displays a Space entity.
     *
     * @Route("/{id}", name="space_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing Space entity.
     *
     * @Route("/{id}/edit", name="space_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        return parent::editAction($id);

    }

    /**
     * Creates a form to edit a Space entity.
     *
     * @param Space $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createEditForm(Space $entity)
    {
        $form = $this->createForm(new SpaceType(), $entity, array(
            'action' => $this->generateUrl('space_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Space entity.
     *
     * @Route("/{id}", name="space_update")
     * @Method("PUT")
     * @Template("WalvaAdSiteBundle:Space:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);

    }

    /**
     * Deletes a Space entity.
     *
     * @Route("/{id}", name="space_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        return parent::deleteAction($request, $id);

    }

    /**
     * Creates a form to delete a Space entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('space_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
