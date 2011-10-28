<?
class WildfireFormNotify extends WaxEmail {
  public $from = "";
  public $from_name = "";
  public $dev_emails = array("dev@oneblackbear.com");
  

  public function contact($record, $config){
    $this->setup($record, $config);
  }
  public function callback($record, $config){
    $this->setup($record, $config);
  }
  public function subscribe($record, $config){
    $this->setup($record, $config);
  }

  protected function setup($data, $config){
    foreach($config as $k=>$v) if($k != "class" && $k != "action") $this->$k = $v;  
    foreach($this->dev_emails as $e) $this->add_bcc_address($e);
    $this->data = $data->row;
  }

}?>