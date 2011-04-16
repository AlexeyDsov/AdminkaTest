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

	abstract class AdminBaseController extends BaseController
	{
		protected function setupMeta()
		{
			parent::setupMeta();
			$this->meta->setTitle('Adminka (管理者向けの使用)');
			return $this;
		}
	}
?>