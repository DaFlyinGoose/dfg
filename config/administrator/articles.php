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
	'model' => '\Models\Article',

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
			'title' => 'Group',
            'relationship' => 'group',
            'select' => '`group`',
		),
		'newsletter' => array(
			'title' => 'Newsletter',
			'relationship' => 'newsletter',
			'select' => "LEFT((:table).send_at, 10)",
		),
		'views' => array(
			'title' => 'Views',
			'select' => 'id',
			'output' => function($value)
			{
				return count(with(new \Services\Forwards())->getForwardsByArticle($value));
			}
		),
		'options' => array(
			'title' => 'Options',
			'select' => 'url',
			'output' => function($value) 
			{
				return "<a href='" . $value . "' target='_blank'>View</a>";
			}
		)
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
            'type' => 'relationship',
            'title' => 'Group',
			'name_field' => 'group',
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
        'title' => array(
            'type' => 'text',
            'title' => 'Search Articles'
        )
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