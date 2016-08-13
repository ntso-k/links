<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_board extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
				'null' => FALSE,
                'auto_increment' => TRUE,
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
				'unique' => TRUE,
				'null' => FALSE,
				'default' => '',
            ),
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE,
				'null' => FALSE,
				'default' => '',
			),
			'status' => array(
				'type' => 'SMALLINT',
				'constraint' => 1,
				'unsigned' => TRUE,
				'null' => FALSE,
				'default' => 0,
			),
			'index' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'null' => FALSE,
				'default' => 0,
			),
			'user_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'null' => FALSE,
				'default' => 0,
			),
            'create_time' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
				'null' => FALSE,
				'default' => 0,
            ),
            'update_time' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
				'null' => FALSE,
				'default' => 0,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('board');
    }

    public function down()
    {
        $this->dbforge->drop_table('board');
    }
}