<?php
/***************************************************************************
 *   Copyright (C) 2009 by Solomatin Alexandr                              *
 *                                                                         *
 ***************************************************************************/
/* $Id: WebAppControllerHandler.class.php 283 2009-12-01 07:51:46Z lom $ */

class WebAppControllerHandlerProject extends WebAppControllerHandler {
	/**
	 * @return WebAppControllerHandlerProject
	 */
	public static function create()
	{
		return new self();
	}

	/**
	 * @param InterceptingChain $chain
	 * @param string $controllerName
	 * @param Model $model
	 * @return WebAppControllerHandler
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
	 * @return WebAppControllerHandler
	 */
	protected function prepairController(InterceptingChain $chain, Controller $controller)
	{
		return $this;
	}
}
?>