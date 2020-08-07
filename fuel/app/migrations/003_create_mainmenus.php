<?php

namespace Fuel\Migrations;

class Create_mainmenus
{
	public function up()
	{
		\DBUtil::create_table('mainmenus', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'name' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'url' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'position' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'aligned' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'visble' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'icon' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('mainmenus');
	}
}