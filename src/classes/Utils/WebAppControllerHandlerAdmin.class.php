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

	class WebAppControllerHandlerAdmin extends WebAppControllerHandler
	{
		/**
		 * @return WebAppControllerHandlerAdmin
		 */
		public static function create()
		{
			return new self();
		}

		/**
		 * @param InterceptingChain $chain
		 * @return string
		 */
		protected function getController(InterceptingChain $chain) {
			$controllerName = $chain->getControllerName();

			$adminAuthorisator = $chain->getServiceLocator()->get('admin');
			/* @var $adminAuthorisator Authorisator */

			if (!$adminAuthorisator->getUser()) {
				$allowedControllers = array(
					'AccessDeniedController',
					'ErrorController',
					'LoginController',
				);
				if (!in_array($controllerName, $allowedControllers)) {
					$controllerName = 'AccessDeniedController';
				}
			}

			return $chain->getServiceLocator()->spawn($controllerName);
		}
	}
?>