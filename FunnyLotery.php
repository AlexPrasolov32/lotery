<?php
function generateRandomWord() 
{
    $alphabet = [
        'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 
        'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т',
        'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь',
        'э', 'ю', 'я'
    ];
    $length = rand(7, 20);
    $word = '';
    for ($i = 0; $i < $length; $i++) {
        $randomLetter = $alphabet[array_rand($alphabet)];
        $word .= $randomLetter;
    }
    return $word;
}
function easyLotery(string $inputWord)
{
	mb_regex_encoding('UTF-8');
	mb_internal_encoding("UTF-8");
	$firstHalf = [0 => 'б', 1 => 'в', 2 => 'г', 3 => 'д', 4 => 'ж', 5 => 'з', 6 => 'к', 7 => 'л', 8 => 'м', 9 => 'н'];
	$secondHalf = [0 => 'щ', 1 => 'ш', 2 => 'ч', 3 => 'ц', 4 => 'х', 5 => 'ф', 6 => 'т', 7 => 'с', 8 => 'р', 9 => 'п',];
	$inputArray = preg_split('/(?<!^)(?!$)/u', $inputWord);
	$outputWord = '';
	
	
	foreach ($inputArray as $sim)
	{
		if (in_array($sim, $firstHalf))
		{
			$outputWord .= $secondHalf[array_search($sim, $firstHalf)];
		}
		else
		{
			if (in_array($sim, $secondHalf))
			{
				$outputWord .= $firstHalf[array_search($sim, $secondHalf)];
			}
			else
			{
				$outputWord .= $sim;
			}
		}
	}
	return($outputWord);
}

$originalWord = generateRandomWord();
$codedWord = easyLotery($originalWord);
$decodedWord = easyLotery($codedWord);
var_dump($originalWord);
var_dump($codedWord);
var_dump($decodedWord);
?>