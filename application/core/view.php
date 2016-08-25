<?php
class View
{
	//public $template_view; // common default view can be specified here
	
	function generate($content_view, $template_view, $data = null)
	{
		/*
		if(is_array($data)) {
			extract($data);
		}
		*/
		
		include 'application/views/'.$template_view;
	}
}

