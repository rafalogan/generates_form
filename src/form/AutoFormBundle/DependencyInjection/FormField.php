<?php
/**
 * Created by PhpStorm.
 * User: rafaelcandeira
 * Date: 22/09/16
 * Time: 12:36
 */

namespace form\AutoFormBundle\DependencyInjection;


class FormField{
    private $Type;
    private $Fields;

    public function FieldResult($Fileds = array(), $Type = null){
        $this->Type     = $Type;
        $this->Fields   = $Fileds;


    }


}