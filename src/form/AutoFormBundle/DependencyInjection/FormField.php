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
    private $DefaulRequired     = [ 'row', 'cols'];
    private $DefaulRequiredCol  = [ 'col', 'fields'];
    private $DefaulFields       = [ 'input', 'label', 'select', 'textarea'];
    private $Fields;
    private $Type;


    public function setfields($Fields, $Type = null){
        if(empty($Fields)) $Fields = "";

        if(!empty($Fields)):
            if(empty($Type))            $Fields = $this->setDefaultCols($Fields);
            if($Type == "materialize")  $Fields = $this->setMaterialRequired($Fields);
        endif;

        return $Fields;
    }

    public function getFields(){
        return $this->Fields;
    }

    private function setMaterialRequired($Feld){
        $this->setRequired($this->DefaulRequired,$Feld);

        if(!empty($Feld[$this->DefaulRequired['0']]))  $Feld[$this->DefaulRequired['0']] = setSpace::setDefault(setSpace::$MaterialDefaultsRow, $Feld[$this->DefaulRequired['0']]);
        if(!empty($Feld[$this->DefaulRequired['1']])):
            foreach ($Feld[$this->DefaulRequired['1']] as $col):
                if(empty($col['col']))  $col['col']  = "";
                if(!empty($col['col'])) $col['col']  = setSpace::setDefault(setSpace::$MaterialDefaultsCol, $col['col']);
            endforeach;
        endif;

        return $Feld;
    }

    private function setRequired($where, $Field){
        foreach ($where as $require) if(empty($Field[$require])) $Field[$require] = "";
        return $Field;
    }

    private function setDefaultCols($Fields){
        if(!empty($Fields))             $Fields = $this->setRequired($this->DefaulRequired, $Fields);
        if(!empty($Fields['cols']))     $Fields['cols'] = $this->setRequired($this->DefaulRequiredCol, $Fields['col']);
    }

    private function setFields(){
        if(!empty($this->Fields['cols'])):
            foreach ($this->Fields['cols'] as $col):
                if(!empty($col['fileds'])):
                    foreach ()
                endif;
            endforeach;
        endif;
    }
}