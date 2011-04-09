<?php
/*****************************************************************************
 *   Copyright (C) 2006-2009, onPHP's MetaConfiguration Builder.             *
 *   Generated by onPHP-1.0.10.99 at 2011-02-05 19:10:36                     *
 *   This file will never be generated again - feel free to edit.            *
 *****************************************************************************/

	class FbUser extends AutoFbUser implements Prototyped, DAOConnected
	{
		const SALT = 'eir^$u+hakc\'we+f$)(uu3789^_33dvj89^&$faxnuq+_e2382376xa+svjh+23876x';
		
		/**
		 * @return FbUser
		**/
		public static function create()
		{
			return new self;
		}
		
		/**
		 * @return FbUserDAO
		**/
		public static function dao()
		{
			return Singleton::getInstance('FbUserDAO');
		}
		
		/**
		 * @return ProtoFbUser
		**/
		public static function proto()
		{
			return Singleton::getInstance('ProtoFbUser');
		}
		
		// your brilliant stuff goes here
		
		/**
		 * @return FbUser
		**/
		public function storePassword($password)
		{
			Assert::isString($password, 'password must be string');
			$this->setPassword(md5(self::SALT.$password.self::SALT));
			return $this;
		}
	}
?>