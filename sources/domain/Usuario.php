<?php

class Usuario extends EntidadeDominio{
    
    private $email;
    private $senha;
    private $apelido;    
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setEmail($valor){
        $this->email = $valor;
    }
    
    public function  getSenha(){
        return $this->senha;        
    }
    
    public function setSenha($valor){
        $this->senha = $valor;
    }
    
    public function getApelido(){
        return $this->apelido;
    }
    
    public function setApelido($valor){
        $this->apelido = $valor;
    }
    
}
