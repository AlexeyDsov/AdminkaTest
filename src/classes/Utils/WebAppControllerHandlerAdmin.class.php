<?php
/***************************************************************************
 *   Copyright (C) 2009 by Solomatin Alexandr                              *
 *                                                                         *
 ***************************************************************************/
/* $Id: WebAppControllerHandler.class.php 283 2009-12-01 07:51:46Z lom $ */

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