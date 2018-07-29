<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Voucher extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        //loading the voucher model
        $this->load->model('Vouchers_model');
    }

    public function vouchers_post()
    {
        $numberOfdays = 4;
        $newTime = strtotime('+'.$numberOfdays.' days', strtotime(date('Y-m-d')));
        
        //get voucher expiry date
        $expiry_date = date('Y-m-d',$newTime);
        //generate voucher
        $voucherId = $this->Vouchers_model->generateVoucher($expiry_date);

        $this->set_response($voucherId, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }

    public function verifyVoucher_post(){
        $voucher = $this->Vouchers_model->verifyVoucher($this->post('voucher_code'));

        // Check if the voucher data store contains voucher code (in case the database result returns NULL)
        if ($voucher)
        {
            // Set the response and exit
            $this->response([
                'status' => True,
                'message' => 'Voucher found'], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No Voucher found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }
}