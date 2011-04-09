<?php
/***************************************************************************
 *   Copyright (C) 2009 by Solomatin Alexandr                              *
 *                                                                         *
 ***************************************************************************/
/* $Id: WebAppControllerHandler.class.php 283 2009-12-01 07:51:46Z lom $ */

class WebAppControllerHandlerAdmin extends WebAppControllerHandler {
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
	protected function getControllerName(InterceptingChain $chain) {
		$controllerName = parent::getControllerName($chain);
		$adminAuthorisator = $chain->getServiceLocator()->get('admin');
		/* @var $adminAuthorisator Authorisator */
		if ($adminAuthorisator->getUser()) {
			return $controllerName;
		}

		switch ($controllerName) {
			case 'AccessDeniedController':
			case 'ErrorController':
			case 'LoginController':
				return $controllerName;
			default:
				return 'AccessDeniedController';
		}
	}

	/**
	 * @param InterceptingChain $chain
	 * @param string $controllerName
	 * @param Model $model
	 * @return WebAppControllerHandlerAdmin
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
	 * @return WebAppControllerHandlerAdmin
	 */
	protected function prepairController(InterceptingChain $chain, Controller $controller)
	{
		return $this;
	}
}
?>