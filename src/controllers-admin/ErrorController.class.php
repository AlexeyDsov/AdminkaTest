<?php
class ErrorController extends AdminBaseController
{
	/**
	 * @return ModelAndView
	**/
	public function handleRequest(HttpRequest $request)
	{
		return $this->getMav();
	}
}
?>