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

	class WebAppControllerHandlerIndex extends WebAppControllerHandler
	{
		/**
		 * @return WebAppControllerHandlerIndex
		 */
		public static function create()
		{
			return new self();
		}

		/**
		 * @param InterceptingChain $chain
		 * @param string $controllerName
		 * @param Model $model
		 * @return WebAppControllerHandlerIndex
		 */
		protected function prepairNonRedirectModel(InterceptingChain $chain, $controllerName, Model $model) {
			$model->
				set('baseUrl', $chain->getPathWeb())->
				set('controllerName', $controllerName)->
				set('serviceLocator', $chain->getServiceLocator())->
				set('isAjax', $chain->hasVar('isAjax') ? $chain->getVar('isAjax') : false);

			// не перезаписывать
			if (!$model->has('selfUrl')) {
				$model->set('selfUrl', $chain->getPathWeb().'?area='.$controllerName);
			}
			return $this;
		}

		/**
		 * @param InterceptingChain $chain
		 * @param Controller $controller
		 * @return WebAppControllerHandlerIndex
		 */
		protected function prepairController(InterceptingChain $chain, Controller $controller)
		{
			return $this;
		}
	}
?>