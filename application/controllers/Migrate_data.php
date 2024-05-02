<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migrate_data extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->insert_menu();
		$this->insert_function();
		$this->insert_menu_function();
		// $this->insert_users();
		// $this->insert_users_roles();
		// $this->insert_group();
		// $this->insert_roles();
		redirect("/");
	}

	function insert_menu()
	{
		$table = 'menu';
		$this->db->truncate($table);

		$data = array(
            array('id'=>1,'module_id'=>1, 'name'=>'root', 'url'=>'#', 'parent_id'=>0, 'icon'=>" ", 'sequence'	=>0),
            array('id'=>2,'module_id'=>1, 'name'=>'Dashboard', 'url'=>'dashboard', 'parent_id'=>1, 'icon'=>"fa-tachometer-alt", 'sequence'=>1),

			// UI Kelola Akun
            array('id'=>3,'module_id'=>1, 'name'=>'System Access', 'url'=>'#', 'parent_id'=>1, 'icon'=>"fa-cog", 'sequence'=>2), 
            array('id'=>4,'module_id'=>1, 'name'=>'Manage Role', 'url'=>'role', 'parent_id'=>3, 'icon'=>"fa-user", 'sequence'=>2),
            array('id'=>5,'module_id'=>1, 'name'=>'Manage Privileges', 'url'=>'privileges', 'parent_id'=>3, 'icon'=>"fa-universal-access", 'sequence'=>3),
            array('id'=>7,'module_id'=>1, 'name'=>'Manage Account User', 'url'=>'user', 'parent_id'=>3, 'icon'=>"fa-users", 'sequence'=>4), 
			
			// UI Input data
			array('id'=>8,'module_id'=>1, 'name'=>'Input Barang', 'url'=>'#', 'parent_id'=>1, 'icon'=>'fa-pen-square', 'sequence'=>4),
			array('id'=>9,'module_id'=>1, 'name'=>'Input Data Barang', 'url'=>'inputbarang', 'parent_id'=>8, 'icon'=>'fa-circle', 'sequence'=>1),
			array('id'=>10,'module_id'=>1, 'name'=>'Input Data Barang Satuan', 'url'=>'inputbarangsatuan', 'parent_id'=>8, 'icon'=>'fa-circle', 'sequence'=>2),

			// UI Table
			array('id'=>11,'module_id'=>1, 'name'=>'Tabel Barang', 'url'=>'#', 'parent_id'=>1, 'icon'=>'fa-table', 'sequence'=>5),
			array('id'=>12,'module_id'=>1, 'name'=>'Tabel Barang Masuk', 'url'=>'tabelbarangmasuk', 'parent_id'=>11, 'icon'=>'fa-circle', 'sequence'=>1),
			array('id'=>13,'module_id'=>1, 'name'=>'Tabel Barang Keluar', 'url'=>'tabelbarangkeluar', 'parent_id'=>11, 'icon'=>'fa fa-circle', 'sequence'=>2),

			// UI Table Kurir
			array('id'=>14,'module_id'=>1, 'name'=>'Data Kurir', 'url'=>'#', 'parent_id'=>1, 'icon'=>'fa-truck', 'sequence'=>6),
			array('id'=>15,'module_id'=>1, 'name'=>'Input Data Kurir', 'url'=>'tabelkurir', 'parent_id'=>14, 'icon'=>'fa-circle', 'sequence'=>1),

			// UI Profile
			array('id'=>16,'module_id'=>1, 'name'=>'Profile', 'url'=>'profile', 'parent_id'=>1, 'icon'=>'fa-user-circle', 'sequence'=>7),
		);
		// var_dump($data);
		// exit;
		// foreach ($data as $value) {
		// 	$this->db->insert($table, $value);
		// }
		$this->db->insert_batch($table, $data);
	}

	function insert_function()
	{
		$table = 'function';
		$this->db->truncate($table);

		$data = array(
            array('name'=> 'Create','description' => 'Create'),
            array('name'=> 'Read','description' => 'Read'),
            array('name'=> 'Update','description' => 'Update'),
            array('name'=> 'Delete','description' => 'Delete'),
            array('name'=> 'Search','description' => 'Search')
        );
		$this->db->insert_batch($table, $data);
	}

	function insert_menu_function()
	{
		for($j=1;$j<=31;$j++){
            for($i=1;$i<=5;$i++){
                $data_menu_function = array(
                    'menu_id' => $j, 
                    'function_id' => $i, 
                );
                $this->db->insert('menu_function', $data_menu_function);
            }       
        } 
	}

	function insert_users()
	{
		$table = 'users';
		$this->db->truncate($table);

		$data = array(
			array('ip_address' => '127.0.0.1', 'username' => 'shirobyte', 'password' => '$2y$08$LE4H5hSpdxI5Lnfgt/CjzufLr9x33ZvDTOUA46Q4ZwbKCNQTa6/va', 'salt' => '', 'email' => 'admin@shirobyte.com', 'activation_code' => '', 'forgotten_password_code' => NULL, 'created_on' => '1268889823', 'last_login' => '1268889823', 'active' => '1', 'first_name' => 'super admin', 'last_name' => '', 'phone' => '0', 'kode' => 'S-0000000000000'),
			array('ip_address' => '127.0.0.1', 'username' => 'admin', 'password' => '$2y$08$/si6dWGM/UiZAWuBzvv42enviLKOL4FnO5fOT0ygnjQfAYdioo5iu', 'salt' => '', 'email' => 'admin@palangkaraya.go.id', 'activation_code' => '', 'forgotten_password_code' => NULL, 'created_on' => '1268889823', 'last_login' => '1268889823', 'active' => '1', 'first_name' => 'admin apps', 'last_name' => '', 'phone' => '0', 'kode' => 'S-1111111111111'),
		);
		$this->db->insert_batch($table, $data);
	}

	function insert_users_roles()
	{
		$table = 'users_roles';
		$this->db->truncate($table);

		$data = array(
			array('id' => 1, 'user_id' => '1', 'role_id' => '1'),
			array('id' => 2, 'user_id' => '2', 'role_id' => '1'),
		);
		$this->db->insert_batch($table, $data);
	}

	function insert_group()
	{
		$table = 'group';
		$this->db->truncate($table);

		$data = array(
			array('id' => 1, 'name' => 'admin'),
		);
		$this->db->insert_batch($table, $data);
	}

	function insert_roles()
	{
		$table = 'roles';
		$this->db->truncate($table);

		$data = array(
			array('id' => 1, 'name' => 'superadmin', 'group_id' => 1),
			array('id' => 2, 'name' => 'admin', 'group_id' => 1),
		);
		$this->db->insert_batch($table, $data);
	}
}
