<?

class WildfireFormsController extends ApplicationController{
  /*subscribe config*/
  public $subscribe = array(
                        "form_var" => "subscribe_form", //the variable name used on $this
                        "model_class" => "WildfireSubscribe",
                        "form_class" => "WaxForm",
                        "email"=>array(
                                  "class" => "WildfireFormNotify",
                                  "action"=>"subscribe",
                                  "to"=>"x",
                                  "from"=>"x",
                                  "subject"=>"Subscription"
                                  ),                      
                        "redirect_to" => "/thanks/subscribe/",
                        "spam" => "surname" //checks for a field in $_REQUEST with this name, if filled in, auto redirects
                        );
  /*callback config*/
  public $callback = array(
                        "form_var" => "callback_form",
                        "model_class" => "WildfireCallback",
                        "form_class" => "WaxForm",
                        "email"=>array(
                                  "class" => "WildfireFormNotify",
                                  "action"=>"callback",
                                  "to"=>"x",
                                  "from"=>"x",
                                  "subject"=>"Callback Request"
                                  ),
                        "redirect_to" => "/thanks/callback/",
                        "spam" => "surname"
                        );
  /*callback config*/
  public $contact = array(
                        "form_var" => "contact_form",
                        "model_class" => "WildfireContact",
                        "form_class" => "WaxForm",
                        "email"=>array(
                                  "class" => "WildfireFormNotify",
                                  "action"=>"contact",
                                  "to"=>"x",
                                  "from"=>"x",
                                  "subject"=>"Contact Request"
                                  ),
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
      if(($email = $config['email']) && ($notify_class = $email['class']) && ($action = $email['action'])){
        $notify = new $notify_class;
        $notify->{"send_".$action}($saved, $email);
      }
      $this->redirect_to($config['redirect_to']);
    }
  }

}

?>