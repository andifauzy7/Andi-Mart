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
class Migration_create_table_user extends CI_Migration {

    public function up()
    {
        $fields = array(
            'id_user' => [
                'type' => 'INT(20)',
                'auto_increment' => TRUE,
                'unsigned' => TRUE,
            ],
            'email_user' => [
                'type' => 'VARCHAR(50)',
                'default' => null
            ],
            'password' => [
                'type' => 'VARCHAR(15)',
                'default' => null
            ],
            'nama_user' => [
                'type' => 'VARCHAR(20)',
                'default' => null
            ],
            'no_hp_user' => [
                'type' => 'INT(13)',
                'default' => null
            ],
            'alamat_user' => [
                'type' => 'VARCHAR(100)',
                'default' => null
            ],
            'kota_user' => [
                'type' => 'VARCHAR(50)',
                'default' => null
            ],
            'code' => [
                'type' => 'VARCHAR(15)',
                'default' => null
            ],
            'status' => [
                'type' => 'INT(8)',
                'default' => 0
            ]
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id_user', TRUE);
        $this->dbforge->create_table('user');
    }


    public function down()
    {
        if ($this->db->table_exists('user'))
        {
            $this->dbforge->drop_table('user');
        }
    }

}
