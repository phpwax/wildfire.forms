<?php
/**
 * admin section for categories - inherits methods from admin component
 */

class CMSAdminContactController extends AdminComponent {

  public $module_name = "contact";
  public $model_class = 'WildfireContact';
	public $display_name = "Contact Requests";
  public $dashboard = false;

}

?>