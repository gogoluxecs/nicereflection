<?php
class nicereflection_lib_DocCommentProperty
extends nicereflection_lib_AbstractDocComment
{
	private $docComments = array();

	public function parse()
	{
		$r = $this->r;

		$replace = array(
			'*',
			'/',
			"\r",
			"\r\n",
			"\n",
			"\t",
			' '
		);

		$properties = $this->r->getProperties(ReflectionProperty::IS_PRIVATE);

		$docComments = array();
		foreach($properties as $property)
		{
			$docComment = str_replace($replace, '', $property->getDocComment());
			$docComment = array_filter(explode('@', trim($docComment)));
			$docComments[$property->getName()] = $docComment;
		}

		return $docComments;
	}
}

