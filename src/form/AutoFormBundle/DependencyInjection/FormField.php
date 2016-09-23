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
                self::setInputField($value['div']);
            endforeach;

            $this->Fields = $fields;
        endif;
    }

    static function setInputField($Group){
        if(empty($Group['class'])) $Group['class'] = "input-field";
        if(!empty($Group['class'])) $Group['class'] = "input-field " . $Group['class'];
    }
}