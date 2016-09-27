<?php
/**
 * Created by PhpStorm.
 * User: rafaelcandeira
 * Date: 26/09/16
 * Time: 13:49
 */

namespace form\AutoFormBundle\DependencyInjection\fields;


use form\AutoFormBundle\DependencyInjection\FormField;

class SelectField extends FormField {
        static $RequiredDefault = ['attr', 'optgroups',];
        static $RequiredGroup = ['label', 'options'];
        static $RequiredOption = [ 'attr' ];

        static function setDefaults($Select , $Required){
            if(!empty($Select)):
                $Select =  InputField::setAttrDefaults($Select);
                $Select =  self::setSelectDefaults($Select, $Required);
            endif;

            return $Select;
        }

        static function setValidateSelect($Select){

            if(empty($Select)) $Select = "";
            if(!empty($Select)) $Select = self::setDefaults($Select, self::$RequiredDefault);
            if (!empty($Select[self::$RequiredDefault[1]])) $Select[self::$RequiredDefault[1]] = self::setSelectDefaults( $Select[self::$RequiredDefault[1]], self::$RequiredGroup);
            if (!empty($Select[self::$RequiredDefault[1][self::$RequiredGroup[1]]])) $Select[self::$RequiredDefault[1][self::$RequiredGroup[1]]] = self::setDefaults( $Select[self::$RequiredDefault['1'][self::$RequiredGroup[1]]], self::$RequiredOption);
            return $Select;
        }

        static function setSelectDefaults($Default, $Require){
            foreach ($Require as $require)     if(empty($Default[$require])) $Default[$require] = "";
            return $Default;
        }
}