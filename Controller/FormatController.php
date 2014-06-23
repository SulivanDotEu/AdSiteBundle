<?php

namespace Walva\AdSiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use \Walva\CrudAdminBundle\Controller\CrudController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Walva\AdSiteBundle\Entity\Format;
use Walva\AdSiteBundle\Form\FormatType;

/**
 * Format controller.
 *
 * @Route("/format")
 */
class FormatController extends Controller
{

    function __construct()
    {
        $this->setRoutes(
            array(
                self::$ROUTE_INDEX_ADD => 'format_new',
                self::$ROUTE_INDEX_INDEX => 'format',
                self::$ROUTE_INDEX_DELETE => 'format_show',
                self::$ROUTE_INDEX_EDIT => 'format_edit',
                self::$ROUTE_INDEX_SHOW => 'format_show',
            )
        );

        $this->setLayoutPath('WalvaAdSiteBundle:Format:layout.html.twig');
        $this->setIndexPath("WalvaAdSiteBundle:Format:index.html.twig");
        $this->setShowPath("WalvaAdSiteBundle:Format:show.html.twig");
        $this->setEditPath("WalvaAdSiteBundle:Format:edit.html.twig");

        $this->setColumnsHeader(
            array(
                "Id",
                'Nom',
                'Hauteur',
                'Largeur',
            )
        );
    }

    public function createEntity()
    {
        return new Format();
    }

    public function getRepository()
    {
        $em = $this->getDoctrine()->getManager();

        return $em->getRepository('WalvaAdSiteBundle:Format');
    }

    /**
     * Lists all Format entities.
     *
     * @Route("/", name="format")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return parent::indexAction();

    }

    /**
     * Creates a new Format entity.
     *
     * @Route("/", name="format_create")
     * @Method("POST")
     * @Template("WalvaAdSiteBundle:Format:new.html.twig")
     */
    public function createAction(Request $request)
    {
        return parent::createAction($request);

    }

    /**
     * Creates a form to create a Format entity.
     *
     * @param Format $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createCreateForm(Format $entity)
    {
        $form = $this->createForm(
            new FormatType(),
            $entity,
            array(
                'action' => $this->generateUrl('format_create'),
                'method' => 'POST',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Format entity.
     *
     * @Route("/new", name="format_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        return parent::newAction();

    }

    /**
     * Finds and displays a Format entity.
     *
     * @Route("/{id}", name="format_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing Format entity.
     *
     * @Route("/{id}/edit", name="format_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        return parent::editAction($id);

    }

    /**
     * Creates a form to edit a Format entity.
     *
     * @param Format $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createEditForm(Format $entity)
    {
        $form = $this->createForm(
            new FormatType(),
            $entity,
            array(
                'action' => $this->generateUrl('format_update', array('id' => $entity->getId())),
                'method' => 'PUT',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Format entity.
     *
     * @Route("/{id}", name="format_update")
     * @Method("PUT")
     * @Template("WalvaAdSiteBundle:Format:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);

    }

    /**
     * Deletes a Format entity.
     *
     * @Route("/{id}", name="format_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        return parent::deleteAction($request, $id);

    }

    /**
     * Creates a form to delete a Format entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('format_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
