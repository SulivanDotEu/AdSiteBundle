<?php

namespace Walva\AdSiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use \Walva\CrudAdminBundle\Controller\CrudController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Walva\AdSiteBundle\Entity\Campagne;
use Walva\AdSiteBundle\Form\CampagneType;

/**
 * Campagne controller.
 *
 * @Route("/adsite_campagne")
 */
class CampagneController extends Controller
{

function __construct() {
    $this->setRoutes(array(
        self::$ROUTE_INDEX_ADD => 'adsite_campagne_new',
        self::$ROUTE_INDEX_INDEX => 'adsite_campagne',
        self::$ROUTE_INDEX_DELETE => 'adsite_campagne_show',
        self::$ROUTE_INDEX_EDIT => 'adsite_campagne_edit',
        self::$ROUTE_INDEX_SHOW => 'adsite_campagne_show',
    ));

    $this->setLayoutPath('WalvaAdSiteBundle:Campagne:layout.html.twig');
    $this->setIndexPath("WalvaAdSiteBundle:Campagne:index.html.twig");
    $this->setShowPath("WalvaAdSiteBundle:Campagne:show.html.twig");
    $this->setEditPath("WalvaAdSiteBundle:Campagne:edit.html.twig");
    $this->setNewPath("WalvaAdSiteBundle:Campagne:new.html.twig");

    $this->setColumnsHeader(array(
        "Id",
        ));
}

public function createEntity() {
        return new Campagne();
    }

public function getRepository() {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('WalvaAdSiteBundle:Campagne');
    }

    /**
     * Lists all Campagne entities.
     *
     * @Route("/", name="adsite_campagne")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return parent::indexAction();

    }
    /**
     * Creates a new Campagne entity.
     *
     * @Route("/", name="adsite_campagne_create")
     * @Method("POST")
     * @Template("WalvaAdSiteBundle:Campagne:new.html.twig")
     */
    public function createAction(Request $request)
    {
        return parent::createAction($request);

    }

    /**
    * Creates a form to create a Campagne entity.
    *
    * @param Campagne $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createCreateForm(Campagne $entity)
    {
        $form = $this->createForm(new CampagneType(), $entity, array(
            'action' => $this->generateUrl('adsite_campagne_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Campagne entity.
     *
     * @Route("/new", name="adsite_campagne_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        return parent::newAction();

    }

    /**
     * Finds and displays a Campagne entity.
     *
     * @Route("/{id}", name="adsite_campagne_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing Campagne entity.
     *
     * @Route("/{id}/edit", name="adsite_campagne_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        return parent::editAction($id);

    }

    /**
    * Creates a form to edit a Campagne entity.
    *
    * @param Campagne $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createEditForm(Campagne $entity)
    {
        $form = $this->createForm(new CampagneType(), $entity, array(
            'action' => $this->generateUrl('adsite_campagne_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Campagne entity.
     *
     * @Route("/{id}", name="adsite_campagne_update")
     * @Method("PUT")
     * @Template("WalvaAdSiteBundle:Campagne:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);

    }
    /**
     * Deletes a Campagne entity.
     *
     * @Route("/{id}", name="adsite_campagne_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
return parent::deleteAction($request, $id);

    }

    /**
     * Creates a form to delete a Campagne entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adsite_campagne_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
