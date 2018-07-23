<?php

//    require_once '../../entity/EntidadeDominio';

interface IDAO{
    
    public function consultar(EntidadeDominio $entidadeDominio);
    public function inserir(EntidadeDominio $entidadeDominio);
    public function alterar(EntidadeDominio $entidadeDominio);
    public function excluir(EntidadeDominio $entidadeDominio);
    
}