<?php

// 1) Crie um array
$array = [];

// 2) Popule este array com 7 números
for ($i = 0; $i < 7; $i++) {
    $array[] = $i;
}
// ou
$array = range(0, 7, 1);

// 3) Imprima o número da posição 3 do array
echo $array[3];
print_r($array[3]);
var_dump($array[3]);

// 4) Crie uma variável com todas as posições do array no formato de string separado por vírgula
$implodedArray = implode(',', $array);

// 5) Crie um novo array a partir da variável no formato de string que foi criada e destrua o array anterior
$implodedArrayCopy = explode(',', $implodedArray);
// O explode vai recriar o array tendo os números como strings. convertemos de volta pra int aqui.
array_walk($implodedArrayCopy, fn (string &$number, int $key) => $number = (int) $number);
unset($implodedArray);

// 6) Crie uma condição para verificar se existe o valor 14 no array
if (in_array(14, $implodedArrayCopy, true)) {
    echo 'Existe o valor 14 sim, pô';
}

// 7) Faça uma busca em cada posição. Se o número da posição atual for menor que o da posição anterior (valor anterior que não foi excluído do array ainda), exclua esta posição
// Uncomment line below to test this
//$implodedArrayCopy[5] = 99;
$implodedArrayCopy = array_map(
    fn ($key) => $key !== 0 && $implodedArrayCopy[$key] < $implodedArrayCopy[$key - 1] ? null : $implodedArrayCopy[$key],
    array_keys($implodedArrayCopy)
);
// Filter null values
$implodedArrayCopy = array_filter($implodedArrayCopy);
// Reindex
$implodedArrayCopy = array_values($implodedArrayCopy);

// 8) Remova a última posição deste array
array_pop($implodedArrayCopy);

// 9) Conte quantos elementos tem neste array
count($implodedArrayCopy);

// 10) Inverta as posições deste array
$implodedArrayCopy = array_reverse($implodedArrayCopy);
