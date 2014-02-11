<?php

return array(

	/**
	 * Model title
	 *
	 * @type string
	 */
	'title' => 'Email Groups',

	/**
	 * The singular name of your model
	 *
	 * @type string
	 */
	'single' => 'groups',

	/**
	 * The class name of the Eloquent model that this config represents
	 *
	 * @type string
	 */
	'model' => 'EmailGroups',

	/**
	 * The columns array
	 *
	 * @type array
	 */
	'columns' => array(
		'name' => array(
			'title' => 'Name'
		),
		'members' => array(
			'title' => 'Members',
			'relationship' => 'emails',
			'select' => "COUNT((:table).id)",
		),
		'id' => array(
			'title' => 'Settings',
			'output' => "<form method=POST action='/admin/emails/results'>" . Form::token() . "<input type='hidden' name='filters[0][field_name]' value='group_id'><input type='hidden' name='filters[0][field_value]' value='(:value)'><input type='submit'></form>",
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