<?
class WildfireCallback extends WaxModel{
  
  public function setup(){
    $this->define("name", "CharField", array('scaffold'=>true));
    $this->define("telephone", "EmailField", array('scaffold'=>true, 'required'=>true));
    $this->define("from_page", "CharField", array('editable'=>false));
    $this->define("ip", "CharField", array('editable'=>false));
    $this->define("occurred", "CharField", array('editable'=>false, 'scaffold'=>true));
  }
  
  public function before_save(){
    if(!$this->ip) $this->ip = $_SERVER['REMOTE_ADDR'];
    if(!$this->occurred) $this->ip = $_SERVER['REMOTE_ADDR'];
  }
}
?>