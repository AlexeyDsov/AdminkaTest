<?php
/***************************************************************************
 *   Copyright (C) 2009 by Solomatin Alexandr                              *
 *                                                                         *
 ***************************************************************************/
/* $Id: WebAppControllerHandler.class.php 283 2009-12-01 07:51:46Z lom $ */

class WebAppControllerHandlerIndex extends WebAppControllerHandler {
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