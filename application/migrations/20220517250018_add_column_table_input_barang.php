<?php
/**
 * @author   Natan Felles <natanfelles@gmail.com>
 */
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Migration_create_table_api_limits
 *
 * @property CI_DB_forge         $dbforge
 * @property CI_DB_query_builder $db
 */
class Migration_add_column_table_input_barang extends CI_Migration
{
	public function up()
    {
        $data_kurir = array(

            'data_kurir' => array(
                'type' => 'VARCHAR(255)',
                'null' => TRUE,
            ),

        );
        $this->dbforge->add_column('input_barang', $data_kurir);
	}

	public function down()
	{

	}
}