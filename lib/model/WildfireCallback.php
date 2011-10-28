<?
class WildfireCallback extends WildfireSubscribe{
  
  public function setup(){
    parent::setup();
    $this->define("telephone", "CharField", array('scaffold'=>true));
  }
}
?>