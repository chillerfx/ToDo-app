<?php
namespace Application\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Select;

class UsersTable extends AbstractTableGateway {
	protected $table = 'user';

	public function __construct(Adapter $adapter)
	{
		$this->adapter = $adapter;
        $this->initialize();
	}

	public function fetchAll() {
    $resultSet = $this->select(function (Select $select) {
    });
    $entities = array();
    foreach ($resultSet as $row) {
        	$entity = new Entity\Users();
            $entity ->setUsername($row->username);
        $entities[] = $entity;
    	}
    return $entities;
    }
    
	public function saveUser(Entity\User $user)
	{
		/* do smth */
	}
	public function removeUser($id)
	{
		return $this->delete(array('id' => (int) $id));
	}
}