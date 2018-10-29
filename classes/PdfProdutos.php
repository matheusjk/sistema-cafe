<?php
        define('MPDF_PATH', 'mpdf60/');
        //incluimos o arquivo
        include(MPDF_PATH.'mpdf.php');

class PdfProdutos extends mPDF{
    
     // Atributos da classe  
    private $pdo  = null;  
    private $titulo = null; 
    private $data;
    private $pdf = null;
    private $rodape = array();
   
    public function __construct($titulo) {  
      $this->pdo  = Conexao::pegarConexao();  
      $this->titulo = $titulo;   
      $this->data = new DateTime();
          
    }
       
    public function getHeader(){  
       $this->data->format('d-m-Y H:i:s');
       
       $retorno = "<table width=\"1000\">  
               <tr>  
                 <td align=\"center\" style=\"font-size:32\">RELATORIO DE PRODUTOS COM MDPF</td></hr>  
               </tr>  
             </table>";  
       return $retorno;  
     }  
 
   
     protected function getFooter(){ 
         $this->rodape = array(
           'odd' => array (
        'L' => array (
            'content' => '',
            'font-size' => 10,
            'font-style' => 'B',
            'font-family' => 'serif',
            'color'=>'#000000'
        ),
        'C' => array (
            'content' => '',
            'font-size' => 10,
            'font-style' => 'B',
            'font-family' => 'serif',
            'color'=>'#000000'
        ),
        'R' => array (
            'content' => 'My document',
            'font-size' => 10,
            'font-style' => 'B',
            'font-family' => 'serif',
            'color'=>'#000000'
        ),
        'line' => 1,
    ),
    'even' => array ()  
             
         );
       
     }  
 
   
    private function getTabela() : string{ 
     try {          
     $lista = Produto::listar();
     } catch (Exception $erro) {
     Erro::trataErro($erro);    
     }
       $fuso = new DateTimeZone('America/Sao_Paulo');
       $this->data->setTimezone($fuso);
      
      $retorno = "";  
      $retorno .= "<h2 style=\"text-align:center\">{$this->titulo}</h2>";  
      $retorno .= "<h5 style=\text-align:center\> {$this->data->format('d-m-Y H:i:s')} </h5>";
      $retorno .= "<table border='1' width='800' align='center'>  
          
            <tr class='header' style=\"background-color:#40E0D0\">  
             <th>ID</td>  
            <th>NOME</td>  
            <th>PRECO</td>  
             <th>QUANTIDADE</td>  
            <th>CATEGORIA</td>    
          </tr>
          
              ";
 
      
       foreach($lista as $vetor){
     
                   // $retorno .=  "<br>";
                    $retorno .= "<tr style=\"background-color:#FFD39B\">"; 
                    $retorno .= "<td> {$vetor['id']} </td>";
                    $retorno .= "<td> {$vetor['nome']} </td>";
                    $retorno .= "<td>R$ {$vetor['preco']} </td>";
                    $retorno .= "<td> {$vetor['quantidade']} </td>";
                    $retorno .= "<td> {$vetor['cat_nome']} </td>";
                    $retorno .= "<br>";
                  //  $retorno .= "</tr>";
       
      
       }
       $retorno .= " 
                
               </table>
          ";
     return $retorno; 
    } 
 
   
    public function BuildPDF(){  
     $this->pdf = new mPDF();   
     //$this->pdf->SetHTMLHeader($this->getHeader());  
    
    $this->pdf->AddPage();
   // $this->pdf->SetHTMLHeader($this->getHeader(), 1, '', array(420,420));
    //$this->pdf->SetFooter($this->getFooter());
     // $this->pdf->SetFooter($this->getFooter()); 
   //  $this->pdf->SetWatermarkImage('pr.png');
   // $this->pdf->showWatermarkImage = true;
 //  $this->SetFooter("<footer> {$this->data->format('d-m-Y H:i:s')} </footer>");
     $this->pdf->WriteHTML($this->getTabela());  
    
    $this->pdf->showWatermarkText = true;
    $this->pdf->SetWatermarkText('PRODUTOS 2018');
    $this->pdf->SetDisplayMode('fullpage');
    }   
 
   
    public function Exibir($name = null) {  
     $this->pdf->Output($name, 'I');  
    }  
  /* $retorno = "<table class=\"tbl_footer\" width=\"1000\">  
               <tr>   
                 <td align=\"right\">Página: {PAGENO}</td>  
               </tr>  
             </table>";  
       return $retorno; */
    
 }   
    
