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
class Migration_create_table_tabelkurir extends CI_Migration
{
	public function up()
	{
		$table = "tabelkurir";
		$fields = array(
			'id' => [
				'type' => 'INT(11)',
				'auto_increment' => TRUE,
				'unsigned' => TRUE,
			],
			'nama_kurir' => [
				'type' => 'VARCHAR(100)',
			],
			'alamat_kurir' => [
				'type' => 'VARCHAR(100)',
			],
			'jekel_kurir' => [
				'type' => 'VARCHAR(100)',
			],
			'usia_kurir' => [
				'type' => 'VARCHAR(100)',
			],
			'jeken_kurir' => [
				'type' => 'VARCHAR(100)',
			],
			'hobi_kurir' => [
				'type' => 'VARCHAR(100)',
			],
			'created_at  timestamp DEFAULT CURRENT_TIMESTAMP',
			'created_by' => array(
				'type' => 'INT',
				'constraint' => 11,
				'NULL' => TRUE,
			),
			'updated_by' => array(
				'type' => 'INT',
				'constraint' => 11,
				'NULL' => TRUE,
			),
			'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
			'is_deleted' => [
				'type' => 'TINYINT(1)',
				'default' => 0,
			],

		);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table($table);

	}


	public function down()
	{
		$table = "tabelkurir";
		if ($this->db->table_exists($table)) {
			$this->db->query(drop_foreign_key($table, 'api_key'));
			$this->dbforge->drop_table($table);
		}
	}

}