<?php
/*****************************************************************************
 *   Copyright (C) 2006-2009, onPHP's MetaConfiguration Builder.             *
 *   Generated by onPHP-1.0.10.99 at 2011-04-17 18:59:53                     *
 *   This file is autogenerated - do not edit.                               *
 *****************************************************************************/

	abstract class AutoFbActor extends IdentifiableObject
	{
		protected $name = null;
		protected $imdbId = null;
		protected $description = null;
		protected $roles = null;
		
		public function getName()
		{
			return $this->name;
		}
		
		/**
		 * @return FbActor
		**/
		public function setName($name)
		{
			$this->name = $name;
			
			return $this;
		}
		
		public function getImdbId()
		{
			return $this->imdbId;
		}
		
		/**
		 * @return FbActor
		**/
		public function setImdbId($imdbId)
		{
			$this->imdbId = $imdbId;
			
			return $this;
		}
		
		public function getDescription()
		{
			return $this->description;
		}
		
		/**
		 * @return FbActor
		**/
		public function setDescription($description)
		{
			$this->description = $description;
			
			return $this;
		}
		
		/**
		 * @return FbActorRolesDAO
		**/
		public function getRoles($lazy = false)
		{
			if (!$this->roles || ($this->roles->isLazy() != $lazy)) {
				$this->roles = new FbActorRolesDAO($this, $lazy);
			}
			
			return $this->roles;
		}
		
		/**
		 * @return FbActor
		**/
		public function fillRoles($collection, $lazy = false)
		{
			$this->roles = new FbActorRolesDAO($this, $lazy);
			
			if (!$this->id) {
				throw new WrongStateException(
					'i do not know which object i belong to'
				);
			}
			
			$this->roles->mergeList($collection);
			
			return $this;
		}
	}
?>