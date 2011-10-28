<?php
/**
 * admin section for categories - inherits methods from admin component
 */

class CMSAdminCallbackController extends AdminComponent {

  public $module_name = "callback";
  public $model_class = 'WildfireCallback';
	public $display_name = "Callback Requests";
  public $dashboard = false;

}

?>