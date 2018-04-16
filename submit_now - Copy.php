<?php

//--------------------------Edit anything below.--------------------------



$subject = 'Contact IRIS Company';                // website request.
$emailadd = 'ahmedeabbas@yahoo.com';        // Your email address. This is where the form information will be sent.
$url = 'result.html';               // Where to redirect after form is processed.
$req = '0';                                  // Makes all fields required. If set to '1' no field can not be empty. If set to '0' any or all fields can be empty.

// --------------------------Do not edit below this line--------------------------
$text = "Results from form:\n\n";       
$space = '  ';
$line = '
';
foreach ($_POST as $key => $value)
{
	if ($req == '1')
	{
		if ($value == '')
		{echo "$key is empty";die;}
	}
	$j = strlen($key);
		if ($j >= 99)
		{echo "Name of form element $key cannot be longer than 99 characters";die;}
	$j = 99 - $j;
		for ($i = 1; $i <= $j; $i++)
		{$space .= ' ';}
	$value = str_replace('\n', "$line", $value);
	$conc = "{$key}:$space{$value}$line";
	$text .= $conc;
	$space = '  ';
}
mail($emailadd, $subject, $text, 'From: '.$emailadd.'');
echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
?>