<?php

namespace Walva\AdSiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use \Walva\CrudAdminBundle\Controller\CrudController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Walva\AdSiteBundle\Entity\Ads;
use Walva\AdSiteBundle\Form\AdsType;

/**
 * Ads controller.
 *
 * @Route("/ads")
 */
class AdsController extends Controller
{

function __construct() {
    $this->setRoutes(array(
        self::$ROUTE_INDEX_ADD => 'adsite_ads_new',
        self::$ROUTE_INDEX_INDEX => 'adsite_ads',
        self::$ROUTE_INDEX_DELETE => 'adsite_ads_show',
        self::$ROUTE_INDEX_EDIT => 'adsite_ads_edit',
        self::$ROUTE_INDEX_SHOW => 'adsite_ads_show',
    ));

    $this->setLayoutPath('WalvaAdSiteBundle:Ads:layout.html.twig');
    $this->setIndexPath("WalvaAdSiteBundle:Ads:index.html.twig");
    $this->setShowPath("WalvaAdSiteBundle:Ads:show.html.twig");
    $this->setEditPath("WalvaAdSiteBundle:Ads:edit.html.twig");

    $this->setColumnsHeader(array(
        "Id",
        ));
}

public function createEntity() {
        return new Ads();
    }

public function getRepository() {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('WalvaAdSiteBundle:Ads');
    }

    /**
     * Lists all Ads entities.
     *
     * @Route("/", name="adsite_ads")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return parent::indexAction();

    }
    /**
     * Creates a new Ads entity.
     *
     * @Route("/", name="adsite_ads_create")
     * @Method("POST")
     * @Template("WalvaAdSiteBundle:Ads:new.html.twig")
     */
    public function createAction(Request $request)
    {
        return parent::createAction($request);

    }

    /**
    * Creates a form to create a Ads entity.
    *
    * @param Ads $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createCreateForm(Ads $entity)
    {
        $form = $this->createForm(new AdsType(), $entity, array(
            'action' => $this->generateUrl('adsite_ads_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Ads entity.
     *
     * @Route("/new", name="adsite_ads_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        return parent::newAction();

    }

    /**
     * Finds and displays a Ads entity.
     *
     * @Route("/{id}", name="adsite_ads_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing Ads entity.
     *
     * @Route("/{id}/edit", name="adsite_ads_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        return parent::editAction($id);

    }

    /**
    * Creates a form to edit a Ads entity.
    *
    * @param Ads $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createEditForm(Ads $entity)
    {
        $form = $this->createForm(new AdsType(), $entity, array(
            'action' => $this->generateUrl('adsite_ads_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Ads entity.
     *
     * @Route("/{id}", name="adsite_ads_update")
     * @Method("PUT")
     * @Template("WalvaAdSiteBundle:Ads:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);

    }
    /**
     * Deletes a Ads entity.
     *
     * @Route("/{id}", name="adsite_ads_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
return parent::deleteAction($request, $id);

    }

    /**
     * Creates a form to delete a Ads entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adsite_ads_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
