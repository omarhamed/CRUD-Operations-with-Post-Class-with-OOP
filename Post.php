<?php

require_once('Database.php');

class Post{
	private $db;

	function __construct(){
		$this->db = new Database();
	}


	// Get all Posts
	public function getPosts(){
		$query = 'SELECT *FROM tbl_oop_posts';
		$this->db->query($query);
		return $this->db->setResults();
	}

	// Get one post 
	public function getPostById($id){
		$query = 'SELECT *FROM tbl_oop_posts WHERE id = :id';
		$this->db->query($query);
		$this->db->bind(':id',$id);
		return $this->db->single();
	}

	// Insert Records
	public function addPost($data){
		$this->db->query('INSERT INTO `tbl_oop_posts`(`title`, `content`) VALUES (:title,:content)');

		$this->db->bind(':title',$data['title']);
		$this->db->bind(':content',$data['content']);

		if ($this->db->execute()) {
			return true;
		}else{
			return false;
		}
		
	}

	// Update Records
	public function updatePost($data){
		$this->db->query('UPDATE `tbl_oop_posts` SET `title`=:title,`content`=:content WHERE id = :id');


		$this->db->bind(':title',$data['title']);
		$this->db->bind(':content',$data['content']);
		$this->db->bind(':id',$data['id']);

		if ($this->db->execute()) {
			return true;
		}else{
			return false;
		}
	}

	// Delete Post
	public function deletePost($id){
		$this->db->query('DELETE FROM `tbl_oop_posts` WHERE id = :id');

		$this->db->bind(':id',$id);
		if ($this->db->execute()) {
			return true;
		}else{
			return false;
		}
	}
}