<?php
/**
 * @author   Natan Felles <natanfelles@gmail.com>
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Migration_create_table_api_limits
 *
 * @property CI_DB_forge         $dbforge
 * @property CI_DB_query_builder $db
 */
class Migration_update_table_user extends CI_Migration {

    public function up()
    {
        $fields = array(
	        'password' => array(
	                'name' => 'password',
	                'type' => 'varchar(65)',
	        ),
	        'no_hp_user' => array(
	                'name' => 'no_hp_user',
	                'type' => 'varchar(13)',
	        ),
		);
		$this->dbforge->modify_column('user', $fields);
    }


    public function down()
    {
        if ($this->db->table_exists('user'))
        {
            $this->dbforge->drop_table('user');
        }
    }

}

