<?

class WildfireFormsController extends ApplicationController{
  /*subscribe config*/
  public $subscribe = array(
                        "form_var" => "subscribe_form", //the variable name used on $this
                        "model_class" => "WildfireSubscribe",
                        "form_class" => "WaxForm",
                        "email_class" => "WildfireFormNotify",
                        "email_action" => "subscribe",
                        "redirect_to" => "/thanks/subscribe/",
                        "spam" => "surname" //checks for a field in $_REQUEST with this name, if filled in, auto redirects
                        );
  /*callback config*/
  public $callback = array(
                        "form_var" => "callback_form",
                        "model_class" => "WildfireCallback",
                        "form_class" => "WaxForm",
                        "email_class" => "WildfireFormNotify",
                        "email_action" => "callback",
                        "redirect_to" => "/thanks/callback/",
                        "spam" => "surname"
                        );
  /*callback config*/
  public $contact = array(
                        "form_var" => "contact_form",
                        "model_class" => "WildfireContact",
                        "form_class" => "WaxForm",
                        "email_class" => "WildfireFormNotify",
                        "email_action" => "contact",
                        "redirect_to" => "/thanks/contact/",
                        "spam" => "surname"
                        );

  public function _subscribe(){
    $this->_handle_form($this->subscribe);
  }
  public function _callback(){
    $this->_handle_form($this->callback);
  }
  public function _contact(){
    $this->_handle_form($this->contact);
  }

  public function _handle_form($config){
    $form = $this->{$config['form_var']} = new $config['form_class']($this->form_model = new $config['model_class']);
    if(strlen($_REQUEST[$config['spam']])) $this->redirect_to($config['redirect_to']."?s");
    else if($saved = $form->save()){
      if(($notify_class = $config['email_class']) && ($action = $config['email_action'])){
        $notify = new $notify_class;
        $notify->{"send_".$action}($saved);
      }
      $this->redirect_to($config['redirect_to']);
    }
  }

}

?>