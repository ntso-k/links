<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_user extends CI_Migration {

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
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
				'unique' => TRUE,
				'null' => FALSE,
				'default' => '',
            ),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
				'default' => '',

			),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
				'null' => FALSE,
				'default' => '',

            ),
			'active' => array(
				'type' => 'SMALLINT',
				'constraint' => 1,
				'unsigned' => TRUE,
				'null' => FALSE,
				'default' => 0,
			),
			'last_ip' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
				'default' => '',
			),
			'last_login_time' => array(
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
        $this->dbforge->create_table('user');
    }

    public function down()
    {
        $this->dbforge->drop_table('user');
    }
}