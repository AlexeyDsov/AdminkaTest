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
		protected function getViewResolver(InterceptingChain $chain, Model $model)
		{
			return PhpViewResolverParametrized::create($chain->getPathTemplate(), EXT_TPL)
				->set('isAjax', $chain->hasVar('isAjax') ? $chain->getVar('isAjax') : false)
				->set('serviceLocator', $chain->getServiceLocator());
		}
	}
?>