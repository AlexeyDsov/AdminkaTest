<?php
	class AdminMenuConstructor
	{
		/**
		 * @return AdminMenuConstructor
		 */
		public static function create() {
			return new self;
		}

		public function getMenuList()
		{
			return array(
				$this->makeActorMenu(),
				$this->makeFilmMenu(),
			);
		}

		/**
		 * @return stdClass
		 */
		protected function  makeActorMenu() {
			$class = new stdClass();
			$class->name = 'Actor';
			$class->title = 'Актеры';
			$class->url = PATH_WEB_URL . 'area=ActorList';

			$class->submenu = array(
				$this->makeActorListMenu(),
				$this->makeActorEditMenu(),
			);
			return $class;
		}

		/**
		 * @return stdClass
		 */
		protected function  makeActorListMenu() {
			$class = new stdClass();
			$class->name = 'List';
			$class->title = 'Список актеров';
			$class->url = PATH_WEB_URL . 'area=ActorList';
			return $class;
		}

		/**
		 * @return stdClass
		 */
		protected function  makeActorEditMenu() {
			$class = new stdClass();
			$class->name = 'Edit';
			$class->title = 'Редактирование актера';
			$class->url = PATH_WEB_URL . 'area=ActorEdit';
			return $class;
		}

		/**
		 * @return stdClass
		 */
		protected function  makeFilmMenu() {
			$class = new stdClass();
			$class->name = 'Films';
			$class->title = 'Фильмы';
			$class->url = PATH_WEB_URL . 'area=FilmList';
			return $class;
		}
	}
?>