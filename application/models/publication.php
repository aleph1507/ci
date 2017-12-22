<?php

	class Publication extends MY_Model {

		const DB_TABLE = 'publications';
		const DB_TABLE_PK = 'publication_id';

		// @ var int
		// publication unique identifier
		public $publication_id;
		// @ var string
		// publication name
		public $publication_name;

	}