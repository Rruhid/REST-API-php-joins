<?php
class Post {
	
	//db stuff
	private $conn;
	private $table = 'posts';

   // post properties  
	public $id;
	public $category_id;
	public $category_name;
	public $title;
	public $body;
	public $author;
	public $created_at;


	// constructor with db

	public function __construct($db){
		$this->conn = $db;
	}


// Get Posts 
	public function read(){

		//create query
		$query = 'SELECT 

			c.name as category_name,
			p.id,
			p.category_id,
			p.title,
			p.body,
			p.author,
			p.created_at
			FROM '.$this->table.' p

			LEFT JOIN 
			categories c ON p.category_id = c.id
			ORDER BY 
				P.created_at DESC';


	// PREPARE

		$stmt = $this->conn->prepare($query);
		 

		$stmt ->execute();
		return $stmt;


		
	}

}