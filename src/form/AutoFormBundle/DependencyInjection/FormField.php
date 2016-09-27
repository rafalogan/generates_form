<?php
/**
 * Created by PhpStorm.
 * User: rafaelcandeira
 * Date: 22/09/16
 * Time: 12:36
 */

namespace form\AutoFormBundle\DependencyInjection;


use form\AutoFormBundle\DependencyInjection\fields\InputField;

class FormField extends MkForm {
    private $DefaulRequired = [ 'row', 'col'];

    private $DefaultMaterializeAttrRow = [
        'class' => "row",
    ];
    private $DefaultMaterializeAttrCol = [
        'class' => "input-field"
    ];
    
}