<?php
namespace Aliyun\Common\Communication;
interface ServiceClientInterface
{
	public function sendRequest(HttpRequest $request, ExecutionContext $context);
} 