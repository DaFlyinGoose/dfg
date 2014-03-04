<?php

return array(

	/**
	 * Model title
	 *
	 * @type string
	 */
	'title' => 'Forwards',

	/**
	 * The singular name of your model
	 *
	 * @type string
	 */
	'single' => 'forwards',

	/**
	 * The class name of the Eloquent model that this config represents
	 *
	 * @type string
	 */
	'model' => '\Entities\Forward',

	/**
	 * The columns array
	 *
	 * @type array
	 */
	'columns' => array(
		'id' => array(
			'title' => 'ID'
		),
	),

	/**
	 * The edit fields array
	 *
	 * @type array
	 */
	'edit_fields' => array(
		'id' => array(
			'title' => 'ID',
			'type' => 'text',
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
	
	'action_permissions'=> array(
		'update' => function($model)
		{
			return false;
		}
	),
	

);