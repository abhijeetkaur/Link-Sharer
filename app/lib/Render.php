<?php

namespace php_hackernews\app\lib;

class Render
{
	public static function _render($template, $args = null)
	{
		if(!($args === null))
		{
			foreach($args as $key => $value) // $key = "all_links"; $value = $all_links
			{
				${$key} = $value;
			}
		}
		require($template);
	}
}


