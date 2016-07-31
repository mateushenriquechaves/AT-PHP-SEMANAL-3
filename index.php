<html>
    <head>
        <title>
        Atividade Semanal - 3
        </title>
        <meta http-equiv='Content-type' content='text/html; charset=UTF-8'> 
        <style>

            .select-word{
                text-decoration:none;
                text-align:center;
                color:black;
                font-family: "Trebuchet MS";
                font-size: 15pt;
            }
            a{
                text-decoration:none;
                color:black;
                font-family: "Trebuchet MS";
                font-size: 15pt;
            }
            a:hover{
                background-color:grey;
            }

            .form{
                    text-align: center;
                    width: 20%;
                    margin-left: 40%;
                    margin-right: 40%;

            }

            .impares{
                    text-align:center;
                    font-family: "Trebuchet MS";
                    width: 20%;
                    margin-left: 20%;
                    float:left;

            }
            .pares{
                   text-align:center;
                   font-family: "Trebuchet MS";
                   width: 20%;
                   margin-left:15%;
            }
            table, td, tr {
    border: 1px solid #ddd;
    text-align: left;
}

table {
    text-align:center;
    border-collapse: collapse;
}

tr, td {
     text-align:center;
    padding: 15px;
}
tr:hover {background-color: #f5f5f5}
        </style>
    </head>

    <body>
            <?php

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
            <input id="palavra"type="text" name="palavra" /> <br><br>
            <input type="submit" value="Ver" />
            </form>


            <?php

               echo"<table class='impares' border=1>";
               echo"<tr>";
               echo"<td>";
               echo"Ímpares";
               echo"</td>";
               echo"</tr>";
               
                foreach ($valores as $percorrer) {
                    
                    if(mb_strlen($percorrer) % 2 != 0){
                        echo"<tr>";
                        echo"<td>" . $percorrer . "</td>";
                        echo"<td>" . mb_strlen($percorrer). "</td>";
                        echo"</tr>";
                    }
                }
              
              echo"</table>";

               echo"<table class='impares' border=1>";
               echo"<tr>";
               echo"<td>";
               echo"Pares";
               echo"</td>";
               echo"</tr>";
               
                foreach ($valores as $percorrer) {
                    
                    if(mb_strlen($percorrer) % 2 == 0){
                        echo"<tr>";
                        echo"<td>" . $percorrer . "</td>";
                        echo"<td>" . mb_strlen($percorrer). "</td>";
                        echo"</tr>";
                    }
                }
              
              echo"</table>";

            ?>
    </body>