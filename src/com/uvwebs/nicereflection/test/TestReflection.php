<?php
require_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'bootstrap.php';

$i = new nicereflection_test_ReflectionTest();
$i = get_class($i);

var_dump(nicereflection_lib_Parser::create(2, $i)->parse());

/** @TODO
	$p = nicereflection_lib_Parser::create(2);
	$p->setReflectionClass($i);
	$p->setCommentTypes(array('response', 'header'));
	$p->parse();
*/

