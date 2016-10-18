<?php

class DTOAbstract {

  protected $data = [
    'url' => "http://google.com",
    'target' => ""
  ];

  public function __call ( $a , $b ) {

    $key = strtolower(substr($a,3));

    if ( isset ( $this->data[$key] ) ) {
      return "Chave: [$key] Valor: [" . $this->data[$key] . "]";
    } else {
      return "Chave [$key] nao existe, valor retornado = []";
    }

    // echo "metodo invocado: " . $a . "\n";
    // echo "parametros: " .
    // var_dump($b);

  }

  public function get ( $param ) {
    if ( isset ( $this->data[$param] ) ) {
      return "Chave: [$param] Valor: [" . $this->data[$param] . "]";
    } else {
      return "Chave [$param] nao existe, valor retornado = []";
    }
  }


}
