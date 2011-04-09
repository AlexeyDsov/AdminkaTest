<?php
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