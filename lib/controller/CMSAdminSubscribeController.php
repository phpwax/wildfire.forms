<?php
/**
 * admin section for categories - inherits methods from admin component
 */

class CMSAdminSubscribeController extends AdminComponent {

  public $module_name = "subscribe";
  public $model_class = 'WildfireSubscribe';
	public $display_name = "Subscriptions";
  public $dashboard = false;

}

?>