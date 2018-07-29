<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

// You can find dbforge usage examples here: http://ellislab.com/codeigniter/user-guide/database/forge.html


class Migration_Create_vouchers_table extends CI_Migration
{
    public function __construct()
	{
	    parent::__construct();
		$this->load->dbforge();
	}
	
	public function up()
	{
	    $fields = array(
            'id' => array(
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>TRUE,
                'auto_increment' => TRUE
            )
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('vouchers', TRUE);
    }
    
	public function down()
	{
	    $this->dbforge->drop_table('vouchers', TRUE);
    }
}
/* End of file '20180214085313_create_vouchers_table' */
/* Location: ./C:\wamp64\www\Voucher_pool\application\migrations/20180214085313_create_vouchers_table.php */
