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
		'subject' => array(
			'title' => 'Subject',
		),
		'created_at' => array(
			'title' => 'Created'
		),
		'send_at' => array(
			'title' => 'Sent'
		),
		'articles' => array(
			'title' => 'Articles',
			'relationship' => 'articles',
			'select' => "COUNT((:table).id)",
		),		
		'emailCount' => array(
			'title' => 'Going To',
			'select' => 'id', 
			'output' => function($value)
			{
				return 0;
				$count = 0;
				$groups = Newsletter::find($value)
					->emailGroups();
				if($value == 2)
				dd($groups);
				foreach ($groups as $group)
				{
					foreach($group->emails() as $email)
					{
						$count++;
					}
				}
				
				return $count;
			},
		),	
		'views' => array(
			'title' => 'Article Views',
			'select' => 'id',
			'output' => function($value)
			{
				return count(with(new \Services\Forwards())->getForwardsByNewsletter($value));
			}
		)
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
		'emailGroups' => array(
			'title' => 'Email Groups',
			'type' => 'relationship',
			'name_field' => 'name',
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
	
	'actions' => array(
		//Clearing the site cache
		'test' => array(
            'title' => 'Test Newsletter',
            'messages' => array(
                'active' => 'Sending Newsletter to you...',
                'success' => 'Newsletter sent!',
                'error' => 'There was an error whilst sending the newsletter',
            ),
            //the settings data is passed to the function and saved if a truthy response is returned
            'action' => function($data)
            {
                //dd($data);
                with(new \Services\Newsletter())->emailNewsletter($data, $data->groupArticles(), Auth::user());

                return true;
            }
        ),
        'send' => array(
			'title' => 'Send Newsletter',
			'messages' => array(
				'active' => 'Sending Newsletter...',
				'success' => 'Newsletter sent!',
				'error' => 'There was an error whilst sending the newsletter',
			),
			//the settings data is passed to the function and saved if a truthy response is returned
			'action' => function($data)
			{
                //dd($data);
				with(new \Services\Newsletter())->sendNewsletter($data);

				return true;
			}
		),
	),

);