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

    public function setfields(){
        if ($this->Type == "materialize"):
            $fields = $this->Fields;
            foreach ($fields as $key => $value ):
                $value['div']       = self::setInputField($value['div']);
                $value['icon']      = self::setIcon($value['icon']);
                $value['attr']      = self::setAttr($value['attr']);
                $value['select']    = self::setAttr($value['select']);
            endforeach;

            $this->Fields = $fields;
        endif;
    }

     /** Validação interna dos campos */

    static function setInputField($Group){
        if(empty($Group['class']))  $Group['class'] = "input-field";
        if(!empty($Group['class'])) $Group['class'] = "input-field " . $Group['class'];
        return $Group;
    }

    static function setIcon($I){
        if (empty($I)) $I = "";

        if (!empty($I)):
            if(empty($I['class']))  $I['class'] = "";
            if(empty($I['name']))   $I['name'] = "";
        endif;

        return $I;
    }

    static function setAttr($Attr){
        if (empty($Attr)) $Attr = "";
        if (!empty($Attr) && $Attr['type'] != "switch"):
            if (empty($Attr['class']))  $Attr['class'] = "validate";
            if (!empty($Attr['class'])) $Attr['class'] = "validate" . $Attr['class'];
        endif;
        return $Attr;
    }

    static function setSelect($Select){
        return $Select;
    }
}