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

	class ActorListController extends AdminBaseController {

		protected $methodMap = array(
			'show' => 'showProcess',
			'list' => 'listProcess',
		);
		protected $defaultAction = 'show';

		/**
		 * @return ModelAndView
		**/
		public function handleRequest(HttpRequest $request)
		{
			return $this->resolveAction($request);
			$properties = $this->getPropertyList();

			return $this->getMav();
		}

		/**
		 * @return ModelAndView
		**/
		public function showProcess(HttpRequest $request)
		{
			$propertyList = $this->getPropertyList();
			$proto = FbActor::proto();

			$form = ListMakerFormBuilder::create($proto, $propertyList)->buildForm();
			$this->model->set('form', $form)->set('propertyList', $propertyList);

			return $this->getMav();
		}

		/**
		 * @return ModelAndView
		**/
		public function listProcess(HttpRequest $request)
		{
			$propertyList = $this->getPropertyList();
			$proto = FbActor::proto();

			$form = ListMakerFormBuilder::create($proto, $propertyList)->buildForm();
			$form->import($request->getGet());

			$this->model->set('form', $form)->set('propertyList', $propertyList);
			if ($form->getErrors()) {
				return $this->getMav();
			}

			$queryResult = ListMakerConstructor::create($proto, $propertyList)->getResult($form);
			$this->model->set('queryResult', $queryResult);

			return $this->getMav();
		}

		protected function prepairData(HttpRequest $request) {
			parent::prepairData($request);
			$this->model->set('currentMenu', 'Actor.List');
		}

		protected function getPropertyList() {
			return array(
				'id' => array(
					ListMakerProperties::OPTION_ORDERING => ListMakerProperties::ORDER_ASC,
					ListMakerProperties::OPTION_FILTERABLE => array(
						ListMakerProperties::OPTION_FILTERABLE_EQ,
						ListMakerProperties::OPTION_FILTERABLE_GT,
						ListMakerProperties::OPTION_FILTERABLE_GTEQ,
						ListMakerProperties::OPTION_FILTERABLE_LT,
						ListMakerProperties::OPTION_FILTERABLE_LTEQ,
					)
				),
				'name' => array(
					ListMakerProperties::OPTION_ORDERING => ListMakerProperties::ORDER_ASC,
					ListMakerProperties::OPTION_FILTERABLE => array(
						ListMakerProperties::OPTION_FILTERABLE_EQ,
						ListMakerProperties::OPTION_FILTERABLE_ILIKE,
					)
				),
				'description' => array(
					ListMakerProperties::OPTION_ORDERING => ListMakerProperties::ORDER_ASC,
					ListMakerProperties::OPTION_FILTERABLE => array(
						ListMakerProperties::OPTION_FILTERABLE_ILIKE,
						ListMakerProperties::OPTION_FILTERABLE_IS_NULL,
						ListMakerProperties::OPTION_FILTERABLE_IS_NOT_NULL,
					)
				),
			);
		}
	}
?>