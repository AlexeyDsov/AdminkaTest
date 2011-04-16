<?php
/***************************************************************************
 *   Copyright (C) 2009 by Solomatin Alexandr                              *
 *                                                                         *
 *   This program is free software; you can redistribute it and/or modify  *
 *   it under the terms of the GNU Lesser General Public License as        *
 *   published by the Free Software Foundation; either version 3 of the    *
 *   License, or (at your option) any later version.                       *
 *                                                                         *
 ***************************************************************************/

	class WebAppViewHandlerProject extends WebAppViewHandler
	{
		/**
		 * @return WebAppViewHandlerProject
		 */
		public static function create()
		{
			return new self();
		}

		/**
		 * @param InterceptingChain $chain
		 * @param Model $model
		 * @return ViewResolver
		 */
		protected function getViewResolver(InterceptingChain $chain, Model $model) {
			return PhpViewResolver::create($chain->getPathTemplate(), EXT_TPL);
		}

		/**
		 * @param Model $model
		 * @return WebAppViewHandlerProject
		 */
		protected function updateNonRedirectModel(InterceptingChain $chain, Model $model) {
			$model->set('isAjax', $chain->hasVar('isAjax') ? $chain->getVar('isAjax') : false);
			$model->set('serviceLocator', $chain->getServiceLocator());

			return $this;
		}
	}
?>