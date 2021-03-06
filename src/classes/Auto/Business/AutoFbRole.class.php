<?php
/*****************************************************************************
 *   Copyright (C) 2006-2009, onPHP's MetaConfiguration Builder.             *
 *   Generated by onPHP-1.0.10.99 at 2011-04-17 18:59:53                     *
 *   This file is autogenerated - do not edit.                               *
 *****************************************************************************/

	abstract class AutoFbRole extends IdentifiableObject
	{
		protected $film = null;
		protected $filmId = null;
		protected $actor = null;
		protected $actorId = null;
		protected $description = null;
		
		/**
		 * @return FbFilm
		**/
		public function getFilm()
		{
			if (!$this->film && $this->filmId) {
				$this->film = FbFilm::dao()->getById($this->filmId);
			}
			
			return $this->film;
		}
		
		public function getFilmId()
		{
			return $this->filmId;
		}
		
		/**
		 * @return FbRole
		**/
		public function setFilm(FbFilm $film)
		{
			$this->film = $film;
			$this->filmId = $film->getId();
			
			return $this;
		}
		
		/**
		 * @return FbRole
		**/
		public function setFilmId($id)
		{
			$this->film = null;
			$this->filmId = $id;
			
			return $this;
		}
		
		/**
		 * @return FbRole
		**/
		public function dropFilm()
		{
			$this->film = null;
			$this->filmId = null;
			
			return $this;
		}
		
		/**
		 * @return FbActor
		**/
		public function getActor()
		{
			if (!$this->actor && $this->actorId) {
				$this->actor = FbActor::dao()->getById($this->actorId);
			}
			
			return $this->actor;
		}
		
		public function getActorId()
		{
			return $this->actorId;
		}
		
		/**
		 * @return FbRole
		**/
		public function setActor(FbActor $actor)
		{
			$this->actor = $actor;
			$this->actorId = $actor->getId();
			
			return $this;
		}
		
		/**
		 * @return FbRole
		**/
		public function setActorId($id)
		{
			$this->actor = null;
			$this->actorId = $id;
			
			return $this;
		}
		
		/**
		 * @return FbRole
		**/
		public function dropActor()
		{
			$this->actor = null;
			$this->actorId = null;
			
			return $this;
		}
		
		public function getDescription()
		{
			return $this->description;
		}
		
		/**
		 * @return FbRole
		**/
		public function setDescription($description)
		{
			$this->description = $description;
			
			return $this;
		}
	}
?>