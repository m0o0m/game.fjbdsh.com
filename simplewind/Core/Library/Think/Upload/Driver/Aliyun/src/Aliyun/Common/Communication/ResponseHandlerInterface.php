<?php
namespace Aliyun\Common\Communication;
interface ResponseHandlerInterface
{
	public function handle(HttpResponse $response);
} 