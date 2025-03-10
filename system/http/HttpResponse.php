<?php

namespace System\Http;

trait HttpResponse
{
	public function json($data): void
	{
		http_response_code(200);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function view($view, $data = []): void
	{
		extract($data);
		http_response_code(200);
		header("Content-Type: text/html");
		$html = file_get_contents(__DIR__ . '/../../app/Views/'.$view.'.php');
		eval('?>' . $html);
	}
}
