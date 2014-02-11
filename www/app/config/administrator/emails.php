<?php

return array(

	/**
	 * Model title
	 *
	 * @type string
	 */
	'title' => 'Email Addresses',

	/**
	 * The singular name of your model
	 *
	 * @type string
	 */
	'single' => 'emails',

	/**
	 * The class name of the Eloquent model that this config represents
	 *
	 * @type string
	 */
	'model' => 'Email',

	/**
	 * The columns array
	 *
	 * @type array
	 */
	'columns' => array(
		'name' => array(
			'title' => 'Name'
		),
		'email' => array(
			'title' => 'Email'
		),
		'group' => array(
			'title' => 'Email Group',
			'relationship' => 'group',
			'select' => "(:table).name",
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
		'email' => array(
			'title' => 'Email',
			'type' => 'text',
		),
		'group' => array(
			'type' => 'relationship',
			'title' => 'Email Group',
			'name_field' => 'name',
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
		'email' => array(
			'title' => 'Email',
		),
		'group_id' => array(
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
		'email' => 'required|max:255',
	),

	/**
	 * The sort options for a model
	 *
	 * @type array
	 */
	'sort' => array(
		'field' => 'updated_at',
		'direction' => 'desc',
	),

);