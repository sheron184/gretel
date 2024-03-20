<?php

namespace System;

trait HttpResponse
{
	public function json($data): void
	{
		http_response_code(200);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function view($view): void
	{
		$dir = __DIR__;
		http_response_code(200);
		header("Content-Type: text/html");
		$html = file_get_contents(__DIR__ . '/../app/Views/'.$view.'.php');	
		echo $html;	
	}
}
