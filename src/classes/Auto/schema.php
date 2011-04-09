<?php
/*****************************************************************************
 *   Copyright (C) 2006-2009, onPHP's MetaConfiguration Builder.             *
 *   Generated by onPHP-1.0.10.99 at 2011-02-06 15:44:57                     *
 *   This file is autogenerated - do not edit.                               *
 *****************************************************************************/

	$schema = new DBSchema();
	
	$schema->
		addTable(
			DBTable::create('fb_user')->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::INTEGER)->
					setNull(false),
					'id'
				)->
				setPrimaryKey(true)->
				setAutoincrement(true)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::VARCHAR)->
					setNull(false)->
					setSize(128),
					'email'
				)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::VARCHAR)->
					setNull(false)->
					setSize(64),
					'name'
				)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::VARCHAR)->
					setNull(false)->
					setSize(32),
					'password'
				)
			)
		);
	
	$schema->
		addTable(
			DBTable::create('fb_actor')->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::INTEGER)->
					setNull(false),
					'id'
				)->
				setPrimaryKey(true)->
				setAutoincrement(true)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::VARCHAR)->
					setNull(false)->
					setSize(128),
					'name'
				)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::INTEGER),
					'imdb_id'
				)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::TEXT),
					'description'
				)
			)
		);
	
	$schema->
		addTable(
			DBTable::create('fb_film')->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::INTEGER)->
					setNull(false),
					'id'
				)->
				setPrimaryKey(true)->
				setAutoincrement(true)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::VARCHAR)->
					setNull(false)->
					setSize(128),
					'name'
				)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::INTEGER),
					'imdb_id'
				)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::DATE),
					'release_date'
				)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::TEXT),
					'description'
				)
			)
		);
	
	$schema->
		addTable(
			DBTable::create('fb_role')->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::INTEGER)->
					setNull(false),
					'id'
				)->
				setPrimaryKey(true)->
				setAutoincrement(true)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::INTEGER),
					'film_id'
				)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::INTEGER),
					'actor_id'
				)
			)->
			addColumn(
				DBColumn::create(
					DataType::create(DataType::TEXT),
					'description'
				)
			)
		);
	
	// fb_role.film_id -> fb_film.id
	$schema->
		getTableByName('fb_role')->
		getColumnByName('film_id')->
		setReference(
			$schema->
				getTableByName('fb_film')->
				getColumnByName('id'),
				ForeignChangeAction::restrict(),
				ForeignChangeAction::cascade()
			);
	
	// fb_role.actor_id -> fb_actor.id
	$schema->
		getTableByName('fb_role')->
		getColumnByName('actor_id')->
		setReference(
			$schema->
				getTableByName('fb_actor')->
				getColumnByName('id'),
				ForeignChangeAction::restrict(),
				ForeignChangeAction::cascade()
			);
	
?>