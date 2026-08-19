php



deixar positivo
	abs($valorNegativo);

separar valores e ja colocar em uma variável
	[$ladoA, $ladoB] = explode(":", $string);

converter string para int
	$numero = (int) $string;

max()
	encontrar e retornar o maior valor numérico em uma lista de argumentos ou dentro de um array
	$maior = max(10, 50, 42, 18);
	echo $maior; // Saída: 50


ceil()
	arrendonda para cima
	$numero = 4.2;
	$resultado = ceil($numero); // Retorna 5


is_float()
	is_float() - verifica se é um número decimal


round()
	round($numero, 2); - arredonda para 2 casas decimais


floor()
	floor($num);   - arredondar para baixo


is_numeric()
	is_numeric($nume)   - verifica se e numero

is_string()
	is_string($word)   - verifica se é string


**********************************************

string

str_split()
	$texto = "PHP";
	$letras = str_split($texto); // Cria um array com cada caractere

   -    Tirar o último valor da string
	$resultado = substr($string, 0, -1);

   -    Retorna o tamanho da string
	strlen($texto)

   -    localizar e substituir partes de uma string por um novo texto
	str_replace($busca, $substituicao, $string_original)

   -    buscar e substituir partes de uma string com base em Expressões Regulares (Regex)
	Remover caracteres especiais de CPFs, números de telefone ou CEPs
	$resultado = preg_replace($padrao, $substituicao, $sua_string);

	
	número para string
   -    $numero = 125.50;
		$texto = sprintf("%f", $numero); 
			- 2 casas decimais sprintf("%.2f", $numero)
		$texto = (string) $numero;
		$texto = strval($numero);
		$texto = $numero . "";


   -    str_replace($busca, $substituto, $texto_original);
	 $texto = "Eu amo programar em Python.";
	 $novo_texto = str_replace("Python", "PHP", $texto);
	 $novo_texto = str_replace(" ", "", $texto);  - tirar espaço


   -    Dividir uma string em pedaços menores
   -    explode($delimitador, $string)
		$frutaString = "maçã banana laranja";
		$frutaArray = explode(" ", $frutaString);


    -    strrev - frase de trás para frente 
		$frase = "Olá mundo!";
		$invertida = strrev($frase);


    -    Converter para maiúsculas e minúsculas
		strtoupper()
		strtolower()


    -    Repetir um texto (string) um número específico de vezes
		str_repeat(string, times);
		echo str_repeat("-", 5);
		// Saída: -----


   -    preg_match_all($padrao, $texto, $resultados);
		encontrar todas as ocorrências de uma expressão regular (regex) em uma strin

		return preg_match_all('/[aeiou]/i', $str);


   -    substr_count
		contar quantas vezes uma palavra ou caractere (substring) aparece

		$texto = "Aprender PHP é bom. PHP é legal.";
		$quantidade = substr_count($texto, "PHP");
		echo $quantidade; // Exibe 2


**********************************************

array

	$dados = [];

	// Adicionando valores
	$dados[] = "Primeiro valor";
	$dados[] = "Segundo valor";


   -    count($arr);

		 remover, substituir ou inserir 
   -    remover  -  array_splice($arr, $indice, 1);

   -    Acessar o primeiro e ultimo valor 
	$beast[0] 	|	$beast[-1]

   -    Retirar o valor anterior e captura
	$itemRemovido = array_shift($frutas);	

   -    array_map
		 aplicar uma função de retorno (callback) a cada elemento de um ou mais arrays, retornando um novo array com os valores modificados. ARRAY ORIGINAL NÃO É MODIFICADO
	$numeros = [1, 2, 3, 4, 5];

	$dobro = array_map(function($n) {
    		return $n * 2;
	}, $numeros);

	--> $dobro[2, 4, 6, 8, 10]


   -    isset() ou array_key_exists()
	isset($nums[$i + 1]) retorna false se o índice não existir ou se o valor for null

	
   -    inverter array  -  array_reverse


   -    Remover um item de um array em PHP e reorganizar os índices 
	    Remove o item pelo índice (ex: banana, que está na posição 1)
	unset($array[1]);

            Reorganiza os índices sequencialmente
	$array = array_values($array);


   -    Junta os valores usando uma vírgula e um espaço
	$resultado = implode(', ', $frutas);


   -    Ordem Crescente 
	- não coloca em uma variável, porque ele retorna true ou false
		$numeros = [4, 2, 8, 6];
		sort($numeros);

   -    Ordem Decrescente
	- não coloca em uma variável, porque ele retorna true ou false
		$numeros = [4, 2, 8, 6];
		rsort($numeros);


   -    contar quantas vezes um item igual aparece
		array_count_values()

		$frutas = ['maçã', 'pera', 'maçã', 'maçã'];

		$contador = array_count_values($frutas);

		echo $contador['maçã']; // Exibe: 3


   -    remove todos os valores duplicados e deixa apenas o primeiro valor encontrado para cada item repetido

		$unicos = array_unique($numeros);


   -    in_array()
		$frutas = ["maçã", "banana", "laranja"];

		if (in_array("banana", $frutas)) {
    			echo "O valor está no array!";
		}


   -    array_search()
		serve para procurar um valor específico dentro de um array e retornar a chave (ou índice)

		$frutas = ["maçã", "banana", "uva"];

		$chave = array_search("laranja", $frutas);
		echo $chave; // Exibe 2


**********************************************

Array Associativo

	const usuario = {
    		nome: "Ana",
    		idade: 28,
    		cidade: "São Paulo"
	};

	// Usando for...in
	for (const chave in usuario) {
    		console.log(`${chave}: ${usuario[chave]}`);
	}


		acessar o primeiro no nome
   -    $usuario[0]["nome"];


	$usuario = [
    		"nome" => "Ana",
    		"idade" => 28,
    		"ativo" => true
	];

	// Acessando um valor específico
	echo $usuario["nome"];	

**********************************************

console log  --  echo "Hello World!\n";

**********************************************

if
	if (condition) {

	} elseif (another_condition) {

	} else {

	}

**********************************************

for
	for ($i = 1; $i <= 5; $i++) {
    		echo "The number is: $i <br>";
	}

	foreach ($array as $value) {
    		// Use $value
	}

**********************************************

while
	$i = 1;
	while ($i <= 5) {
    		echo "The number is: $i <br>";
    		$i++; // Crucial for preventing an infinite loop
	}



