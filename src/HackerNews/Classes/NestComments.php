<?php

namespace HackerNews\Classes;

class NestComments
{

	public function __construct()
	{

	}

	function makeList($list)
	{
	    $html .= '<ul>';
	    foreach ($list as $item)
	    {
	        $html .= '<li>';
	        $html .= '<p class="comment-meta"><strong>' . $item['user'] . '</strong>' . $item['time_ago'] . '</p>';
	        $html .= '<p>' . $item['content'] . '</p>';
	        if (isset($item['comments']))
	        {   
	            $html .= self::makeList($item['comments']);
	        }
	        $html .= '</li>';
	    }
	    $html .= '</ul>';

	    return $html;

	}

}