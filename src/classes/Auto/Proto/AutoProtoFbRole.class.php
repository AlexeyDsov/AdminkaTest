<?php
/*****************************************************************************
 *   Copyright (C) 2006-2009, onPHP's MetaConfiguration Builder.             *
 *   Generated by onPHP-1.0.10.99 at 2011-04-17 19:03:29                     *
 *   This file is autogenerated - do not edit.                               *
 *****************************************************************************/

	abstract class AutoProtoFbRole extends AbstractProtoClass
	{
		protected function makePropertyList()
		{
			return array(
				'id' => LightMetaProperty::fill(new LightMetaProperty(), 'id', null, 'integerIdentifier', 'FbRole', 4, true, true, false, null, null),
				'film' => LightMetaProperty::fill(new LightMetaProperty(), 'film', 'film_id', 'identifier', 'FbFilm', null, false, false, false, 1, 3),
				'actor' => LightMetaProperty::fill(new LightMetaProperty(), 'actor', 'actor_id', 'identifier', 'FbActor', null, false, false, false, 1, 3),
				'description' => LightMetaProperty::fill(new LightMetaProperty(), 'description', null, 'string', null, null, false, true, false, null, null)
			);
		}
	}
?>