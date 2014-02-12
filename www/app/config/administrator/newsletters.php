<?php

return array(

	/**
	 * Model title
	 *
	 * @type string
	 */
	'title' => 'Newsletters',

	/**
	 * The singular name of your model
	 *
	 * @type string
	 */
	'single' => 'newsletters',

	/**
	 * The class name of the Eloquent model that this config represents
	 *
	 * @type string
	 */
	'model' => 'Newsletter',

	/**
	 * The columns array
	 *
	 * @type array
	 */
	'columns' => array(
		'id' => array(
			'title' => 'ID'
		),
		'created_at' => array(
			'title' => 'Created'
		),
		'send_at' => array(
			'title' => 'Sent'
		),
	),

	/**
	 * The edit fields array
	 *
	 * @type array
	 */
	'edit_fields' => array(
		'subject' => array(
			'title' => 'Subject Line',
			'type' => 'text',
		),
		'intro' => array(
			'title' => 'Newsletter Intro',
			'type' => 'textarea',
		),
		'conclusion' => array(
			'title' => 'Newsletter Conclusion',
			'type' => 'textarea',
		),
		'send_at' => array(
			'title' => 'Send At',
			'type' => 'datetime',
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