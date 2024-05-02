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
class Migration_create_table_input_barang extends CI_Migration
{
	public function up()
	{
		$table = "input_barang";
		$fields = array(
			'id' => [
				'type' => 'INT(11)',
				'auto_increment' => TRUE,
				'unsigned' => TRUE,
			],
			'id_transaksi' => [
				'type' => 'VARCHAR(100)',
			],
			'tanggal_input' => [
				'type' => 'VARCHAR(100)',
			],
			'lokasi' => [
				'type' => 'VARCHAR(100)',
			],
			'kode_barang' => [
				'type' => 'VARCHAR(100)',
			],
			'nama_barang' => [
				'type' => 'VARCHAR(100)',
			],
			'id_satuan_barang' => [
				'type' => 'INT(11)',
				'unsigned' => TRUE,
			],
			'jumlah_barang' => [
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
		$table = "input_barang";
		if ($this->db->table_exists($table)) {
			$this->db->query(drop_foreign_key($table, 'api_key'));
			$this->dbforge->drop_table($table);
		}
	}

}