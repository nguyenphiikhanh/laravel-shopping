<?php 
namespace App\Components;

class Recusive {
        //
        private $data;
        private $htmlSelect = '';

        public function __construct($data)
        {
            $this->data = $data;
        }

        public function categoryRecusive($parent_id,$id=0, $text = '')
        {
    
            foreach ($this->data as $value) {
                if ($value['parent_id'] == $id) {
                    if(!empty($parent_id) && $parent_id == $value['id']){
                        $this->htmlSelect.= "<option selected value='".$value['id']."'>" . $text . $value['name'] . "</option>";
                    } else {
                        $this->htmlSelect.= "<option value='".$value['id']."'>" . $text . $value['name'] . "</option>";
                    }
                    
                    $this->categoryRecusive($parent_id,$value['id'], $text . '--');
                }
            }
    
            return $this->htmlSelect;
        }
}