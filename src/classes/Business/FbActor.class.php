<?php
/*****************************************************************************
 *   Copyright (C) 2006-2009, onPHP's MetaConfiguration Builder.             *
 *   Generated by onPHP-1.0.10.99 at 2011-02-05 19:10:36                     *
 *   This file will never be generated again - feel free to edit.            *
 *****************************************************************************/

	class FbActor extends AutoFbActor implements Prototyped, DAOConnected
	{
		/**
		 * @return FbActor
		**/
		public static function create()
		{
			return new self;
		}
		
		/**
		 * @return FbActorDAO
		**/
		public static function dao()
		{
			return Singleton::getInstance('FbActorDAO');
		}
		
		/**
		 * @return ProtoFbActor
		**/
		public static function proto()
		{
			return Singleton::getInstance('ProtoFbActor');
		}
		
		// your brilliant stuff goes here
	}
?>