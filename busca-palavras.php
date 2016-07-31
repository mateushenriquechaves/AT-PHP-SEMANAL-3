<?php
session_start();
// Aquivo usado para as NOTICE erros do PHP
require 'mostrarerros.php';
echo"<html>";
echo"<head>";
echo"<title>";
echo"Mostrando Resultado";
echo"</title>";
echo"<meta http-equiv='Content-type' content='text/html; charset=UTF-8'> ";
// Estilo da página 
echo"<style>";
echo".par-Tabela {
     top:0;
     float:left;
    margin-left: 25%;
    width: 20%;
    text-align:center;
}

.identificador-par{
         top: 0;
         margin-left:32%;
         font-family: 'Trebuchet MS';
         font-size: 30pt;
     }

     .identificador-impar{
         margin-top: -6%;
         margin-left:51%;
         font-family: 'Trebuchet MS';
         font-size: 30pt;
     }

     .impar-Tabela{
         top:0;
        margin-left: 50%;
        width: 20%;
        text-align:center;
     }

     
     .form{
         text-align:center;
         font-family: 'Trebuchet MS';
         font-size: 15pt;
     }
       a{
                text-decoration:none;
                color:black;
                font-family: 'Trebuchet MS';
                font-size: 15pt;
            }
            a:hover{
                background-color:grey;
            }

            .select-word{
                text-decoration:none;
                text-align:center;
                color:black;
                font-family: 'Trebuchet MS';
                font-size: 15pt;
            }

            table, td, tr {
    border: 1px solid #ddd;
    text-align: left;
}

table {
    border-collapse: collapse;
}

tr, td {
    padding: 15px;
}
tr:hover {background-color: #f5f5f5}
";
echo"</style>";
echo"</head>";
echo"<body>";

// Array com as palavras
            $valores = ['estudar', 'educação', 'esforço', 'persistência', 'dedicação', 'crescimento', 'evolução', 'sabedoria', 'trabalho', 'entusiasmo', 'alegria', 'vitoria', 'sucesso', 'profissão', 'conhecimento', 'vida'];

            // Descobrindo a quantidade de índices no array para necessidades futuras
            $quant_palavras = count($valores);
         
            
            // Usando a estrutura de repetição For para percorrer os índices do Array
            echo"<p class='select-word'>Selecione uma palavra =) </p>";
          for($i = 0; $i < $quant_palavras; $i++){
                
                    echo"<a href='busca-palavras.php?palavra=".$valores[$i]."'>" . $valores[$i] . "</a> -  ";

            }
?>
 <form class="form" method="post" action="busca-palavras.php">
            <label class="select-word" for="palavra"> Digite uma palavra </label>
            <input id="palavra"type="text" name="palavra" /> 
            <input type="submit" value="Ver" />
            </form>
<?php

    // Verificando se a variável foi iniciada
if(isset($_POST["palavra"])){
        $palavra = $_POST["palavra"];
}else if (isset($_GET["palavra"])){
         $palavra = $_GET["palavra"];
}else {
    $palavra = null;
}

// Função para montar a tabela de números ímpares
function montaTabelaImpar($nome, $quantidade){


    // Variável responsável por armazenar a tabela
        echo"<p class='identificador-impar'> Ímpar </p>";
     $tabelaimpar = 
        "<table class='impar-Tabela' border='1'>" .
         "<tr>" .
         "<td>" .
         $nome .
         "</td>" .
         "<td>" .
         $quantidade .
         "</td>" .
         "</tr>" .
        "</table>";
    if($nome != null && $quantidade != null){

      // Criando uma sessão para armazenar a variável com a tabela 
      $_SESSION["tabelaimpar"] =  $_SESSION["tabelaimpar"] . $tabelaimpar;

     // Retornando a tabela
     return $_SESSION["tabelaimpar"] ;

    }else {
         return $_SESSION["tabelaimpar"];
    }

     }



function montaTabelaPar($nome, $quantidade){

    // Função para montar a tabela de números ímpares
     echo"<table class='par-Tabela' border='1'>";
     echo"<p class='identificador-par'> Par </p>";
     // Variável responsável por armazenar a tabela
     $tabelapar = 
         "<tr>" .
         "<td>" .
         $nome .
         "</td>" .
         "<td>" .
         $quantidade .
         "</td>" .
         "</tr>";
          "</table>";
       

    if($nome != null && $quantidade != null) {
       // Criando uma sessão para armazenar a variável com a tabela
      $_SESSION["tabelapar"] =  $_SESSION["tabelapar"] . $tabelapar;

      // Retornando a tabela
     return $_SESSION["tabelapar"];

    }else {
                return $_SESSION["tabelapar"];
           }
    }
     


 // Contando a quantidade de letras na palavra inserida
 $quant_palavras =  mb_strlen($palavra);
 // Verificando se a quantidade de letras é ímpar
 if($quant_palavras % 2 != 0) {
     $palavra_par = null;
     $palavra_impar = $palavra;
     $quantidade_palavras_par = null;
     $quantidade_palavras_impar = $quant_palavras;
 }else{
     // Se for par
     $palavra_impar = null;
     $palavra_par =  $palavra;
      $quantidade_palavras_par = $quant_palavras;
     $quantidade_palavras_impar = null;
 }
 // Chamando as funções passando os devidos parâmetros
 echo montaTabelaPar($palavra_par, $quantidade_palavras_par);
 echo montaTabelaImpar($palavra_impar, $quantidade_palavras_impar);



echo"</body>";
echo"</html>";
?>