<?php
/**
 * Copyright (c) 2013 Klaas Freitag
 * Copyright (c) 2013 Georg Ehrke
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCA\Kraft\Db;

use \OCA\AppFramework\Core\API;
use \OCA\AppFramework\Db\Mapper;
use \OCA\AppFramework\Db\DoesNotExistException;


class ItemMapper extends Mapper {


	private $tableName;

	/**
	 * @param API $api: Instance of the API abstraction layer
	 */
	public function __construct($api){
		parent::__construct($api);
		$this->tableName = '*PREFIX*kraft_nc';
	}


	/**
	 * Finds an item by id
	 * @throws DoesNotExistException: if the item does not exist
	 * @return the item
	 */
	public function find($id){
		$row = $this->findQuery($this->tableName, $id);
		return new Item($row);
	}


	/**
	 * Finds an item by user id
	 * @param string $userId: the id of the user that we want to find
	 * @throws DoesNotExistException: if the item does not exist
	 * @return the item
	 */
	public function findByUserId($userId){
		$sql = 'SELECT * FROM `' . $this->tableName . '` WHERE `user` = ? ';
		$params = array($userId);

		$result = $this->execute($sql, $params)->fetchRow();
		if($result){
			return new Item($result);
		} else {
			throw new DoesNotExistException('Item with user id ' . $userId . ' does not exist!');
		}
	}


	/**
	 * Finds all Items
	 * @return array containing all items
	 */
	public function findAll(){
		$result = $this->findAllQuery($this->tableName);

		$entityList = array();
		while($row = $result->fetchRow()){
			$entity = new Item($row);
			array_push($entityList, $row);
		}

		return $entityList;
	}


	/**
	 * Saves an item into the database
	 * @param Item $item: the item to be saved
	 * @return the item with the filled in id
	 */
	public function save($item){
		$sql = 'INSERT INTO `'. $this->tableName . '`(`user`, `name`, `value`, `template`)'.
				' VALUES(?, ?, ?, ?)';

		$params = array(
			$item->getUser(),
			$item->getName(),
			$item->getValue(),
			$item->getTemplate()
		);

		$this->execute($sql, $params);

		$item->setId($this->api->getInsertId($this->tableName));
	}


	/**
	 * Updates an item
	 * @param Item $item: the item to be updated
	 */
	public function update($item){
		$sql = 'UPDATE `'. $this->tableName . '` SET
				`user` = ?,
				`name` = ?,
				`value` = ?,
				`template` = ?
				WHERE `id` = ?';

		$params = array(
			$item->getUser(),
			$item->getName(),
			$item->getValue(),
			$item->getTemplate(),
			$item->getId()
		);

		$this->execute($sql, $params);
	}


	/**
	 * Deletes an item
	 * @param int $id: the id of the item
	 */
	public function delete($id){
		$this->deleteQuery($this->tableName, $id);
	}

	public function incValue($item){
		$value = $item->getValue();
		$value++;
		$item->setValue($value);
		
		$this->update($item);
	}
}