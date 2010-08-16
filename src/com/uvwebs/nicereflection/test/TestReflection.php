<?php
require_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'bootstrap.php';

$i = new nicereflection_test_ReflectionTest();
$i = get_class($i);

$r = nicereflection_lib_Parser::create(2, $i);

$result = $r->parse();

echo '<pre>';
$firstName = $result['first_name'];


foreach($firstName as $p)
{
	if(!is_object($i))
		$i = new $i;

	$s = explode('=', $p);

	if($s[0] == 'Validate')
	{
		if($s[1] == 'Require')
			call_user_func_array(array($i, 'validate' . ucfirst($s[1])), array('Georgi'));
	}
}


/** @TODO
	$p = nicereflection_lib_Parser::create(2);
	$p->setReflectionClass($i);
	$p->setCommentTypes(array('response', 'header'));
	$p->parse();
*/

