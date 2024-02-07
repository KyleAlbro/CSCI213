<?php 
class MenuItem{
    private $item;
    private $desc;
    private $price;

    public function getName(){
        return $this->item;
    }

    public function setName($item){
        return $this->item = $item;
    }

    public function getDesc(){
        return $this->desc;
    }

    public function setDesc($desc) {
        $this->desc = $desc;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }
}
?>