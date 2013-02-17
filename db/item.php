<?php
/**
 * Copyright (c) 2013 Klaas Freitag
 * Copyright (c) 2013 Georg Ehrke
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCA\Kraft\Db;


class Item {

	private $id;
	private $name;
	private $path;
	private $user;

	public function __construct($fromRow=null){
		if($fromRow){
			$this->fromRow($fromRow);
		}
	}

	public function fromRow($row){
		$this->id = $row['id'];
		$this->name = $row['name'];
		$this->path = $row['path'];
		$this->user = $row['user'];
	}


	public function getId(){
		return $this->id;
	}

	public function getName(){
		return $this->name;
	}

	public function getUser(){
		return $this->user;
	}

	public function getPath(){
		return $this->path;
	}


	public function setId($id){
		$this->id = $id;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function setUser($user){
		$this->user = $user;
	}

	public function setPath($path){
		$this->path = $path;
	}

}