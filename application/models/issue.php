<?php

	class Issue extends MY_Model {

		const DB_TABLE = 'issues';
		const DB_TABLE_PK = 'issue_id';
		
		// @var int
		// issue unique identifier
		public $issue_id;

		// @var int
		//publication unifying record
		public $publication_id;

		// @var int
		// publisher assigned issue number
		public $issue_number;

		// @var string
		// date that the issue was published
		public $issue_date_publication; 

		// @var string
		// path to the file cover image
		public $issue_cover;
	}