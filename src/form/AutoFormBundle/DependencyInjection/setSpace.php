<?php
/**
 * Created by PhpStorm.
 * User: rafaelcandeira
 * Date: 30/09/16
 * Time: 12:24
 */

namespace form\AutoFormBundle\DependencyInjection;


class setSpace extends FormField {
    static $MaterialDefaultsRow = [
        'class' => "row"
    ];

    static $MaterialDefaultsCol = [
        'class' => 'input-field'
    ];

    static function setDefault($Dft, $Row){
        foreach ($Dft as $key => $value):
            if(empty($Row[$key])) $Row[$key] = $value;
            if(!empty($Row[$key])) $Row[$key] = $value . $Row[$key];
        endforeach;

        return $Row;
    }
}