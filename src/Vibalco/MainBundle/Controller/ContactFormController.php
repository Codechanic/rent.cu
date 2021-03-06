<?php

namespace Vibalco\MainBundle\Controller;
;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Vibalco\MainBundle\Entity\ContactForm;
use Vibalco\MainBundle\Form\ContactFormType;
use Vibalco\AdminBundle\Manager\AdminManager;

/**
 * ContactForm controller.
 *
 * @Route("/admin/{_locale}/contactform" , defaults={"_locale" = "en"})
 */
class ContactFormController extends AdminManager {

    /**
     * @return \Vibalco\DatatableBundle\Util\Datatable datatable
     */
    function __construct() {
        parent::__construct(new ContactForm(), new ContactFormType(), "MainBundle:ContactForm");
    }

    private function _datatable() {
        return parent::datatable();
    }

    /**
     * Lists all ContactForm entities.
     *
     * @Route("/", name="admin_contactform")
     * @Template()
     */
    public function indexAction() {
        $this->_datatable();
        return array('data' => $this->_datatable()->getColumns());
    }

    /**
     * @Route("/grid", name="admin_contactform_grid")
     */
    public function gridAction() {
        return $this->_datatable()->execute();
    }

    /**
     * Lists all ContactForm entities.
     *
     * @Route("/list", name="admin_contactform_list")
     * @Template()
     */
    public function listAction() {
        $this->_datatable();
        return array('data' => $this->_datatable()->getColumns());
    }

    /**
     * Finds and displays a ContactForm entity.
     *
     * @Route("/{id}/show", name="admin_contactform_show")
     * @Template()
     */
    public function showAction($id) {
        return parent::showObject($id);
    }

    /**
     * Displays a form to create a new ContactForm entity.
     *
     * @Route("/new", name="admin_contactform_new")
     * @Template()
     */
    public function newAction() {
        return parent::NewForm();
    }

    /**
     * Creates a new ContactForm entity.
     *
     * @Route("/create", name="admin_contactform_create")
     * @Method("POST")
     */
    public function createAction(Request $request) {
        parent::createObject($request);
    }

    /**
     * Displays a form to edit an existing ContactForm entity.
     *
     * @Route("/{id}/edit", name="admin_contactform_edit")     *
     * @Template()
     */
    public function editAction($id) {
        return parent::editObject($id);
    }

    /**
     * Edits an existing ContactForm entity.
     *
     * @Route("/{id}", name="admin_contactform_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id) {
        return parent::updateObject($request, $id);
    }

    /**
     * Deletes a ContactForm entity.
     *
     * @Route("/{id}", name="admin_contactform_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id) {
        parent::deleteObject($request, $id);
    }

    /**
     * Uncomment This if you have attribute enabled
     * Change ContactForm status
     *
     * @Route("/{id}/status", name="admin_contactform_status")
     * @Method("POST")
     */
    /* public function statusAction(Request $request, $id) {
      return parent::statusObject($request, $id);
      } */

    /**
     * Deletes a Navegadores entity multiple.
     *
     * @Route("/delete_multiple", name="admin_contactform_delete_multiple")
     * @Method("POST")
     */
    public function deletemultipleAction() {
        $data = $this->getRequest()->get('dataTables');
        $ids = $data['actions'];
        parent::delteObjects($this->getRequest(), $ids);
    }

}
