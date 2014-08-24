<?php

namespace Walva\AdSiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use \Walva\CrudAdminBundle\Controller\CrudController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Walva\AdSiteBundle\Entity\SpaceExample;
use Walva\AdSiteBundle\Form\SpaceExampleType;

/**
 * SpaceExample controller.
 *
 * @Route("/spaces/example")
 */
class SpaceExampleController extends Controller
{

function __construct() {
    $this->setRoutes(array(
        self::$ROUTE_INDEX_ADD => 'spaces_example_new',
        self::$ROUTE_INDEX_INDEX => 'spaces_example',
        self::$ROUTE_INDEX_DELETE => 'spaces_example_show',
        self::$ROUTE_INDEX_EDIT => 'spaces_example_edit',
        self::$ROUTE_INDEX_SHOW => 'spaces_example_show',
    ));

    $this->setLayoutPath('WalvaAdSiteBundle:SpaceExample:layout.html.twig');
    $this->setIndexPath("WalvaAdSiteBundle:SpaceExample:index.html.twig");
    $this->setShowPath("WalvaAdSiteBundle:SpaceExample:show.html.twig");
    $this->setEditPath("WalvaAdSiteBundle:SpaceExample:edit.html.twig");

    $this->setColumnsHeader(array(
        "Id",
        ));
}

public function createEntity() {
        return new SpaceExample();
    }

public function getRepository() {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('WalvaAdSiteBundle:SpaceExample');
    }

    /**
     * Lists all SpaceExample entities.
     *
     * @Route("/", name="spaces_example")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return parent::indexAction();

    }
    /**
     * Creates a new SpaceExample entity.
     *
     * @Route("/", name="spaces_example_create")
     * @Method("POST")
     * @Template("WalvaAdSiteBundle:SpaceExample:new.html.twig")
     */
    public function createAction(Request $request)
    {
        return parent::createAction($request);

    }

    /**
    * Creates a form to create a SpaceExample entity.
    *
    * @param SpaceExample $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createCreateForm(SpaceExample $entity)
    {
        $form = $this->createForm(new SpaceExampleType(), $entity, array(
            'action' => $this->generateUrl('spaces_example_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new SpaceExample entity.
     *
     * @Route("/new", name="spaces_example_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        return parent::newAction();

    }

    /**
     * Finds and displays a SpaceExample entity.
     *
     * @Route("/{id}", name="spaces_example_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing SpaceExample entity.
     *
     * @Route("/{id}/edit", name="spaces_example_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        return parent::editAction($id);

    }

    /**
    * Creates a form to edit a SpaceExample entity.
    *
    * @param SpaceExample $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createEditForm(SpaceExample $entity)
    {
        $form = $this->createForm(new SpaceExampleType(), $entity, array(
            'action' => $this->generateUrl('spaces_example_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing SpaceExample entity.
     *
     * @Route("/{id}", name="spaces_example_update")
     * @Method("PUT")
     * @Template("WalvaAdSiteBundle:SpaceExample:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);

    }
    /**
     * Deletes a SpaceExample entity.
     *
     * @Route("/{id}", name="spaces_example_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
return parent::deleteAction($request, $id);

    }

    /**
     * Creates a form to delete a SpaceExample entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('spaces_example_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
