<?php
/**
 * Created by PhpStorm.
 * User: rafaelcandeira
 * Date: 27/09/16
 * Time: 16:27
 */

namespace form\AutoFormBundle\DependencyInjection\fields;


use form\AutoFormBundle\DependencyInjection\FormField;

class LabelField extends FormField{
    static $RequireDefault              = ['attr', 'name',];
    static $RequireMaterializeDefault   = ['for'];

    static function setDefaults($label){
        foreach (self::$RequireDefault as $require) if(empty($label[$require])) $label[$require] = "";
        return $label;
    }

    static function setMaterializeAttr($Label, $Field = null){
        self::setDefaults($Label);

        if(empty($Field)) foreach (self::$RequireMaterializeDefault as $require) $Label['attr'][$require] = "";
        if(!empty($Field)):
            if(empty($Field['attr'][['id']]))   foreach (self::$RequireMaterializeDefault as $require) $Label['attr'][$require] = "";
            if(!empty($Field['attr'][['id']]))  $Label['attr']['for'] = $Field['attr'][['id']];
        endif;

        return $Label;
    }
}