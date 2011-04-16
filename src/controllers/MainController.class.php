<?php
	class MainController extends BaseController
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