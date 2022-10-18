<?php

$nome  =  $_POST['nome'];

//transformando data de nascimento para inteiro
$nascimento  =  explode('-',$_POST['nascimento']);
$timeNascimento = strtotime($_POST['nascimento']);

echo "<h1> Signo </h1>";

$xml = simplexml_load_file("signo.xml");

// ITERANDO O XML
foreach($xml->signo as $row) {
    //transformando data de inicio para inteiro
    $dataInicio = explode('/',$row->dataInicio);
    $timeInicio = strtotime($nascimento[0].'-'.$dataInicio[1].'-'.$dataInicio[0]);

    //transformando data de fim para inteiro
    $dataFim = explode('/',$row->dataFim);
    $timeFim = strtotime($nascimento[0].'-'.$dataFim[1].'-'.$dataFim[0]);

    // realizando condição, comparando inteiros pra ver se o nascimento está no range do signo
    if ($timeNascimento >= $timeInicio && $timeNascimento <= $timeFim) {
        echo "ME FALE O SIGNO!!<br>";
        echo "Parabens $nome você é do signo!!<br>";
        echo "<h1>".$row->signoNome."</h1>";
        echo "<h3>".$row->descricao."</h3>";
    }
}









