<?php

return array(

	/**
	 * Model title
	 *
	 * @type string
	 */
	'title' => 'Cheat Sheets',

	/**
	 * The singular name of your model
	 *
	 * @type string
	 */
	'single' => 'cheatsheets',

	/**
	 * The class name of the Eloquent model that this config represents
	 *
	 * @type string
	 */
	'model' => '\Entities\CheatSheets',

	/**
	 * The columns array
	 *
	 * @type array
	 */
	'columns' => array(
		'id' => array(
			'title' => 'ID'
		),
		'name' => array(
			'title' => 'Title'
		),
		'url' => array(
			'title' => 'URL',
		),
		'hits' => array(
			'title' => 'Hits',
		),
		'created_at' => array(
			'title' => 'Created',
		),
	),

	/**
	 * The edit fields array
	 *
	 * @type array
	 */
	'edit_fields' => array(
		'name' => array(
			'title' => 'Name',
			'type' => 'text',
		),
		'url' => array(
			'title' => 'URL',
			'type' => 'text',
		),
		'description' => array(
			'title' => 'Description',
			'type' => 'wysiwyg',
		),
	),

	/**
	 * The filter fields
	 *
	 * @type array
	 */
	'filters' => array(
		'name' => array(
			'title' => 'Name',
		),
		'url' => array(
			'title' => 'URL',
		),
	),

	/**
	 * The width of the model's edit form
	 *
	 * @type int
	 */
	'form_width' => 500,

	/**
	 * The validation rules for the form, based on the Laravel validation class
	 *
	 * @type array
	 */
	'rules' => array(
		'name' => 'required|max:255',
		'url' => 'required',
	),

	/**
	 * The sort options for a model
	 *
	 * @type array
	 */
	'sort' => array(
		'field' => 'id',
		'direction' => 'desc',
	),

);