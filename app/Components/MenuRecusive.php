<?php

namespace App\Components;

use App\Models\MenuModel;

class MenuRecusive {

    private $html;

    public function __construct()
    {
        $this->html = '';
        
    }

    public function menuRecusiveAdd($parent_id =0 , $subMak = ''){

        $data = MenuModel::where('parent_id',$parent_id)->get();

        foreach ($data as $dataItem ){
            $this->html .= "<option value='".$dataItem->id."'>". $subMak. $dataItem->name ."</option>";
            $this->menuRecusiveAdd($dataItem->id ,$subMak.'--' );
        }

        return $this->html;
    }

    public function menuRecusiveEdit($parentIdMenuEdit ,$parent_id =0 , $subMak = ''){

        $data = MenuModel::where('parent_id',$parent_id)->get();

        foreach ($data as $dataItem ){

            if($parentIdMenuEdit == $dataItem->id){
                $this->html .= "<option selected value='".$dataItem->id."'>". $subMak. $dataItem->name ."</option>";

            }else{
                $this->html .= "<option value='".$dataItem->id."'>". $subMak. $dataItem->name ."</option>";
            }


          
            $this->menuRecusiveEdit(  $parentIdMenuEdit ,$dataItem->id ,$subMak.'--' );
        }

        return $this->html;
    }


}