<?php
/**
 * Created by PhpStorm.
 * User: rafaelcandeira
 * Date: 26/09/16
 * Time: 13:50
 */

namespace form\AutoFormBundle\DependencyInjection\fields;


use form\AutoFormBundle\DependencyInjection\FormField;

class TextareaField extends FormField {
    static $RequiredDefauts         = ['attr'];
    static $RequiredMaterialize     = ['class' => "materialize-textarea",];

    static function setDefault($Textarea){
        foreach (self::$RequiredDefauts as $require) if(empty($Textarea[$require])) $Textarea[$require] = "";
        return $Textarea;
    }

    static function setMaterializeDefaul($Textarea){
        if(empty($Textarea))       $Textarea  = self::setDefault($Textarea);
        if(!empty($Textarea['attr'])):
            foreach (self::$RequiredMaterialize as $attr => $value):
                if(empty($Textarea['attr'][$attr])) $Textarea['attr'][$attr] = $value ;
                if(!empty($Textarea['attr'][$attr])) $Textarea['attr'][$attr] = $value . $Textarea['attr'][$attr] ;
            endforeach;
        endif;
        return $Textarea;
    }
}