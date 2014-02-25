<?php

return array(

	/**
	 * Model title
	 *
	 * @type string
	 */
	'title' => 'Articles',

	/**
	 * The singular name of your model
	 *
	 * @type string
	 */
	'single' => 'articles',

	/**
	 * The class name of the Eloquent model that this config represents
	 *
	 * @type string
	 */
	'model' => 'Article',

	/**
	 * The columns array
	 *
	 * @type array
	 */
	'columns' => array(
		'title' => array(
			'title' => 'Title'
		),
		'group' => array(
			'title' => 'Group'
		),
		'newsletter' => array(
			'title' => 'Newsletter',
			'relationship' => 'newsletter',
			'select' => "LEFT((:table).send_at, 10)",
		),
	),

	/**
	 * The edit fields array
	 *
	 * @type array
	 */
	'edit_fields' => array(
		'title' => array(
			'title' => 'Article Title',
			'type' => 'text',
		),
		'url' => array(
			'title' => 'Article URL',
			'type' => 'text',
		),
		'group' => array(
			'title' => 'Group',
			'type' => 'text',
		),
		'description' => array(
			'title' => 'Description',
			'type' => 'textarea',
		),
		'newsletter' => array(
			'type' => 'relationship',
			'title' => 'Newsletter',
			'name_field' => 'send_at',
		),
	),

	/**
	 * The filter fields
	 *
	 * @type array
	 */
	'filters' => array(
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