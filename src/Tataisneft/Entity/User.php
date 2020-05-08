<?php

class User {

	private $user = null;
	
	public function __construct($db) {
		$this->db = $db;
	}
	
	public function findByToken($token) {
		$adapter = new UserAdapter($this->db);
		$user = $adapter->findByToken($token);
		if(isset($user) && isset($user["id"] && $user["id"] > 0) {
			$this->user = $user;
		}
		return true;
	}
	
	public function getUser() {
		return $this->user;
	}
	
	public function getUsername() {
		return $this->user["username"];
	}
	
	public function getEmail() {
		return $this->user["email"];
	}
	
	public function getUserId() {
		return $this->user["id"];
	}
	
	public function create($email, $username, $password) {
		$adapter = new UserAdapter($this->db);
		$status = $adapter->createUser($email, $username, $password);
		if($status) {
			$this->user = $adapter->findByEmail($email);
			return true;
		} else {
			return false;
		}
	}
}