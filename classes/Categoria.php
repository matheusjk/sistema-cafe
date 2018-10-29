<?php


class Categoria {
   
    private $id;
    private $nome;
    private $descricao;
    
    public function __construct($id = false) {
        if($id){
            $this->setid($id);
            $this->carregarId();
        }
    }

        public function setid($id){
        $this->id = $id;
    }
    
    public function getid(){
        return $this->id;
    }

    public function setnome($nome){
        $this->nome = $nome;
    }
    
    public function getnome(){
        return $this->nome;
    }

    public function  setdescricao($produto){
        $this->produtos = $produto;
    }
    
    public function  getdescricao(){
        return $this->produtos;
    }

        public static function listar(){
     
        $query = "select id,nome,descricao from categoria order by nome";
        $conexao = Conexao::pegarConexao();
        $r = $conexao->query($query);
        $lista = $r->fetchAll();
        return json_encode($lista, true);
    }
    
      
        public function inserir(){
        
        $query = "INSERT INTO categoria(id,nome,descricao) values(:id,:nome,:descricao)";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->getid());    
        $stmt->bindValue(':nome', $this->getnome());
        $stmt->bindValue(':descricao', $this->getdescricao());    
        $stmt->execute();
        return true;    
       // return $stmt->lastInsertId();
        
    }
    
    public function atualizar(){
        
        $query = "update categoria set nome = :nome,descricao = :descricao where id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->getnome());
        $stmt->bindValue(':descricao', $this->getdescricao());
        $stmt->bindValue(':id', $this->getid());
        $stmt->execute();
    }
    
    public function carregarId(){
          // throw new Exception("ERRO AO LISTAR TUDO MANE");
         $query = "select id,nome,descricao from categoria where id = :id ";
         $conexao = Conexao::pegarConexao();
         $stmt = $conexao->prepare($query);
         $stmt->bindValue(':id', $this->getid());
         $stmt->execute();
         $linha = $stmt->fetch();
         $this->setnome($linha["nome"]);
         $this->setdescricao($linha["descricao"]);
         if($stmt->rowCount() == 0){ // CONTA O NUMERO DE LINHAS AFETADAS DEPOIS DA EXECUÇÃO DA QUERY EQUIVALE AO RESULTSET NEXT() DO JAVA 
             $this->setid(0);   // SE NENHUMA LINHA FOR RETORNADA OU ALTERADA ELE RETORNA 0 E PREENCHE  1 EM $this->setId(1);
         }
         
    }
    
    public static function buscaPorId($id){
        $query = "select * from categoria where id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $linha = $stmt->fetchAll();
        return json_encode($linha,true);
         if($stmt->rowCount() == 0){ // CONTA O NUMERO DE LINHAS AFETADAS DEPOIS DA EXECUÇÃO DA QUERY EQUIVALE AO RESULTSET NEXT() DO JAVA 
             $this->setid(0);   // SE NENHUMA LINHA FOR RETORNADA OU ALTERADA ELE RETORNA 0 E PREENCHE  1 EM $this->setId(1);
         }
    }
    
    public function excluir(){
        
        $query = "delete from categorias where id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id',  $this->getId());
        $stmt->execute();
    }
    
  
}
