<?php

class EntidadeDominio{
    
    private $id;
    private $dataCadastro;
    private $ativo;
    
    public function getId(){
        return $this->id;
    }
        
    public function setId($valor){
        $this->id = $valor;        
    }
    
    public function getDataCadastro(){
        return $this->dataCadastro;                
    }
    
    public function setDataCadastro($valor){
        $this->dataCadastro = $valor;
    }
    
    public function isAtivo(){
        return $this->ativo;
    }
    
    public function setAtivo($valor){
        $this->ativo = $valor;
    }
    
}
