<?php

    require_once ('/../IDAO.php');
    require_once '/../../util/ConnectionMysql.php';
    
class UsuarioDAO implements IDAO{
    
    public function consultar(EntidadeDominio $usuario){
    
        $usuarios = array();
        $rs = null;
        
        $query = "select usu_id, usu_data_cadastro, usu_ativo, usu_email, usu_senha, usu_apelido from usuarios";
        
        
        $con = ConnectionMysql::getConnection();
        
        if($usuario->getId() != null){
            $query = $query." where usu_id = ?";
            $rs = $con->prepare($query);            
            $rs->bindValue (1, $usuario->getId());
            $rs->execute();
        }else{
            $rs = $con->query($query);
        }     
             
        while($row = $rs->fetch(PDO::FETCH_OBJ)){
        
            echo $row->usu_apelido;
            
            $usuario = new Usuario();
            $usuario->setId($row->usu_id);
            $usuario->setDataCadastro($row->usu_data_cadastro);
            $usuario->setAtivo($row->usu_ativo);
            $usuario->setEmail($row->usu_email);
            $usuario->setSenha($row->usu_senha);
            $usuario->setApelido($row->usu_apelido);
            
            array_push($usuarios, $usuario);
            
        }
        
        return $usuarios;
        
    }
    
    public function inserir(EntidadeDominio $usuario){
        
        $query = "insert into usuarios(usu_data_cadastro, usu_ativo, usu_email, usu_senha, usu_apelido) values(?, ?, ?, ?, ?)";
       
        $con = ConnectionMysql::getConnection();
        
        $statement = $con->prepare($query);
        
        $statement->bindValue(1, $usuario->getDataCadastro());
        $statement->bindValue(2, $usuario->isAtivo());
        $statement->bindValue(3, $usuario->getEmail());
        $statement->bindValue(4, $usuario->getSenha());
        $statement->bindValue(5, $usuario->getApelido());
        
        $statement->execute();
        
    }
    
    public function alterar(EntidadeDominio $usuario){
     
        $query = "update usuarios set usu_data_cadastro = ?, usu_ativo = ?, usu_email = ?, usu_senha = ?, usu_apelido = ? where usu_id = ?";        
    
        $con = ConnectionMysql::getConnection();
        
        $statement = $con->prepare($query);
        
        $statement->bindValue(1, $usuario->getDataCadastro());
        $statement->bindValue(2, $usuario->isAtivo());
        $statement->bindValue(3, $usuario->getEmail());
        $statement->bindValue(4, $usuario->getSenha());
        $statement->bindValue(5, $usuario->getApelido());
        $statement->bindValue(6, $usuario->getId());
        
        $statement->execute();
        
        
    }
    
    public function excluir(EntidadeDominio $usuario){
     
        $query = "update usuarios set usu_ativo = false where usu_id = ?";
        
        $con = ConnectionMysql::getConnection();
        
        $statement = $con->prepare($query);
        
        $statement->bindValue(1, $usuario->getId());
        
        $statement->execute();
                
    }

    
}