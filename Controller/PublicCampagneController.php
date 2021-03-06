<?php

namespace Walva\AdSiteBundle\Controller;

use Doctrine\DBAL\Query\QueryBuilder;
use Symfony\Component\HttpFoundation\Request;
use \Walva\CrudAdminBundle\Controller\CrudController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Walva\AdSiteBundle\Entity\Campagne;
use Walva\AdSiteBundle\Form\CampagneType;

/*
 *             // création de l'ACL
            $aclProvider = $this->get('security.acl.provider');
            $objectIdentity = ObjectIdentity::fromDomainObject($entity);
            $acl = $aclProvider->createAcl($objectIdentity);

            // retrouve l'identifiant de sécurité de l'utilisateur actuellement connecté
            $securityContext = $this->get('security.context');
            $user = $securityContext->getToken()->getUser();
            $securityIdentity = UserSecurityIdentity::fromAccount($user);

            // donne accès au propriétaire
            $acl->insertObjectAce($securityIdentity, MaskBuilder::MASK_OWNER);
            $aclProvider->updateAcl($acl);

 */

/**
 *
 * Campagne controller.
 *
 * @Route("/campagne")
 */
class PublicCampagneController extends Controller
{

    function __construct() {
        $this->setRoutes(array(
                self::$ROUTE_INDEX_ADD => 'advertiser_campagne_new',
                self::$ROUTE_INDEX_INDEX => 'advertiser_campagne',
                self::$ROUTE_INDEX_DELETE => 'advertiser_campagne_show',
                self::$ROUTE_INDEX_EDIT => 'advertiser_campagne_edit',
                self::$ROUTE_INDEX_SHOW => 'advertiser_campagne_show',
            ));

        $this->setLayoutPath('WalvaAdSiteBundle:Public/Campagne:layout.html.twig');
        $this->setIndexPath("WalvaAdSiteBundle:Public/Campagne:index.html.twig");
        $this->setShowPath("WalvaAdSiteBundle:Public/Campagne:show.html.twig");
        $this->setEditPath("WalvaAdSiteBundle:Public/Campagne:edit.html.twig");
        $this->setNewPath("WalvaAdSiteBundle:Public/Campagne:new.html.twig");

        $this->setColumnsHeader(array(
                "Id",
            ));
    }

    public function createEntity() {
        return new Campagne();
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    public function getRepository() {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('WalvaAdSiteBundle:Campagne');
    }

    /**
     *
     * @param Campagne $campagne
     * @Route("/{campagne}/select-spaces", name="adsite_public_select_spaces")
     * @Method({"GET", "POST"})
     *
     *
     */
    public function selectSpacesAction(Request $request, Campagne $campagne){

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('WalvaAdSiteBundle:Space');
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = $repository->createQueryBuilder('s')
            ->where('s.format = :format')
            ->setParameter('format', $campagne->getFormat());
//            ->getQuery();
        $form = $this->createFormBuilder();
        $form->add('spaces', 'entity', array(
            'class' => "Walva\AdSiteBundle\Entity\Space",
            'label' => 'form.campagne.labels.format',
            'query_builder' => $queryBuilder,
            'expanded' => true,
            'multiple' => true,
            'label' => "Espaces Publicitaires"
        ));
        $form->add('submit', 'submit', array('label' => 'Selectionner les espaces'));
        $form->setAction($this->generateUrl('adsite_public_select_spaces', array('campagne' => $campagne->getId())));
        $form->setMethod("POST");
        $form = $form->getForm();
        $form->handleRequest($request);

        if($form->isValid()){
            $selectedSpaces = $form->get('spaces')->getData();
            foreach($selectedSpaces as $space){
                $campagne->addSpace($space);
                $em->persist($space);
            }
            $em->persist($campagne);
            $em->flush();
            return $this->redirect($this->generateUrl('advertiser_campagne_show', array('id' => $campagne->getId())));
        }

        return $this->render('@WalvaAdSite/Public/Campagne/selectSpaces.html.twig', array(
            'form' => $form->createView(),
            'spaces' => $repository->findByFormat($campagne->getFormat())
        ));

    }

    /**
     * Lists all Campagne entities.
     *
     * @Route("/", name="advertiser_campagne")
     * @Method("GET")
     * @Template("WalvaAdSiteBundle:Public/Campagne:index.html.twig")
     */
    public function indexAction()
    {
        return parent::indexAction();

    }
    /**
     * Creates a new Campagne entity.
     *
     * @Route("/", name="advertiser_campagne_create")
     * @Method("POST")
     * @Template("WalvaAdSiteBundle:Public/Campagne:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = $this->createEntity();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        /* @var $form \Symfony\Component\Form\Form */

        if ($form->isValid()) {
            $entity->setOwner($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl(
                'walva_adsite_publiccampagne_selectspaces', array('campagne' => $entity->getId())));
        }

        return $this->redirect($this->generateUrl(
            $this->getRouteAdd(), array('id' => $entity->getId())));

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
                'action' => $this->generateUrl('advertiser_campagne_create'),
                'method' => 'POST',
            ));

        $form->remove("creationDate");
        $form->remove("editionDate");
        $form->remove("owner");

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Campagne entity.
     *
     * @Route("/new", name="advertiser_campagne_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = $this->createEntity();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $entity->setOwner($user);
        $form = $this->createCreateForm($entity);
        $params = $this->getRenderParams();
        $params['form'] = $form->createView();
        $params['entity'] = $entity;

        return $this->renderNewAction($params);

    }

    /**
     * Finds and displays a Campagne entity.
     *
     * @Route("/{id}", name="advertiser_campagne_show")
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
     * @Route("/{id}/edit", name="advertiser_campagne_edit")
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
                'action' => $this->generateUrl('advertiser_campagne_update', array('id' => $entity->getId())),
                'method' => 'PUT',
            ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Campagne entity.
     *
     * @Route("/{id}", name="advertiser_campagne_update")
     * @Method("PUT")
     * @Template("WalvaAdSiteBundle:Public/Campagne:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);

    }
    /**
     * Deletes a Campagne entity.
     *
     * @Route("/{id}", name="advertiser_campagne_delete")
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
            ->setAction($this->generateUrl('advertiser_campagne_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
            ;
    }
}
