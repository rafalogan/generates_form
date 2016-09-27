<?php

/**
 * Created by PhpStorm.
 * User: rafaelcandeira
 * Date: 26/09/16
 * Time: 12:21
 */

namespace form\AutoFormBundle\DependencyInjection\fields;

use form\AutoFormBundle\DependencyInjection\FormField;



class InputField extends FormField {
    static $RequiredFiekds = "validate";
    static $AttrDefault = [
        'Disabled',
        'Multiple',
    ];
    static function setInputMaterialize($Input){
        if (!empty($Input)) self::setAttrDefaults($Input);
        if (empty($Input['attr']['class']))     $Input['attr']['class'] = self::$RequiredFiekds;
        if (!empty($Input['attr']['class']))    $Input['attr']['class'] = self::$RequiredFiekds . $Input['attr']['class'];
    }

    static function setAttrDefaults($Input){
        foreach (self::$AttrDefault as $value):
            if ($Input['flg'.$value]) $Input['flg'.$value] = "";
        endforeach;
    }
}