<?php
	class AccessDeniedController extends AdminBaseController
	{
		/**
		 * @return ModelAndView
		**/
		public function handleRequest(HttpRequest $request)
		{
			$this->model->set('errorMsg', 'Access Denied');
			HeaderUtils::sendHttpStatus(new HttpStatus(HttpStatus::CODE_403));
			return $this->getMav('index', 'Error');
		}
	}
?>