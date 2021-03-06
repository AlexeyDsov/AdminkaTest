<?php
/***************************************************************************
 *   Copyright (C) 2011 by Alexey Denisov                                  *
 *   alexeydsov@gmail.com                                                  *
 *                                                                         *
 *   This program is free software; you can redistribute it and/or modify  *
 *   it under the terms of the GNU Lesser General Public License as        *
 *   published by the Free Software Foundation; either version 3 of the    *
 *   License, or (at your option) any later version.                       *
 *                                                                         *
 ***************************************************************************/

	class AccessDeniedController extends AdminBaseController
	{
		/**
		 * @return ModelAndView
		**/
		public function handleRequest(HttpRequest $request)
		{
			$this->model->set('errorMsg', 'Access Denied');
			HeaderUtils::sendHttpStatus(new HttpStatus(HttpStatus::CODE_403));
			return $this->getMav('index', 'NotFound');
		}
	}
?>