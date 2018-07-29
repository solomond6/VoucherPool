<?php

Class Offers_model extends CI_Model{
	
	//checking if the offer already exist 
	function validateOffer(){
        $this->db->where('name', $this->input->post('name'));
        $query = $this->db->get('offers');
        if ($query->num_rows() == 1){
            return true;
        }
    }

    //adding new offer in the database
	function addoffer() {		
		$insert_new_offer = array(
			'name'=> $this->input->post('name'),
			'discount'=> $this->input->post('discount'),
			'description'=> $this->input->post('description'),
			'status'=> '1'
		);
		$insert = $this->db->insert('offers', $insert_new_offer);
		return $insert;
	}

	function generateVoucher($expiry_date = null){
		$insert_new_voucher = array(
			'code'=> uniqid(),
			'expiry_date'=> $expiry_date,
			'status'=> '1',
		);
	
		$insert = $this->db->insert('vouchers', $insert_new_voucher);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	function offerVoucher($offerId = null, $voucherId = null){
		$insert_new_voucher_offer = array(
			'offers_id'=> $offerId,
			'vouchers_id'=> $voucherId
		);
	
		$insert = $this->db->insert('voucher_offer', $insert_new_voucher_offer);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}


	function offerUserVoucher($offerId = null, $voucherId = null, $userId = null){
		$insert_new_voucher_offer_recipient = array(
			'offers_id'=> $offerId,
			'vouchers_id'=> $voucherId,
			'users_id'=> $userId
		);
	
		$insert = $this->db->insert('voucher_offer_recipient', $insert_new_voucher_offer_recipient);
		return $insert;
	}

	function validateOfferUserVoucher($offerId, $userId){
        $this->db->where('offers_id', $offerId);
        $this->db->where('users_id', $userId);
        $query = $this->db->get('voucher_offer_recipient');
        if ($query->num_rows() == 1){
            return true;
        }
    }

    function myoffers($userId){
    	$this->db->select('*');
		$this->db->from('voucher_offer_recipient');
		$this->db->join('vouchers', 'vouchers.id = voucher_offer_recipient.vouchers_id');
		$this->db->join('offers', 'offers.id = voucher_offer_recipient.offers_id');
		$this->db->where('voucher_offer_recipient.users_id', $userId);
		$query = $this->db->get();
		return $query->result();
    }

    function used_voucher(){
    	$this->db->select('vouchers.id, vouchers.date_created, vouchers.code, vouchers.expiry_date, users.name');
		$this->db->from('voucher_offer_recipient');
		$this->db->join('vouchers', 'vouchers.id = voucher_offer_recipient.vouchers_id');
		$this->db->join('offers', 'offers.id = voucher_offer_recipient.offers_id');
		$this->db->join('users', 'users.id = voucher_offer_recipient.users_id');
		$query = $this->db->get();
		return $query->result();
    }

    function all_recipients(){
    	$this->db->select('vouchers.id, vouchers.date_created, vouchers.code, vouchers.expiry_date, users.name');
		$this->db->from('voucher_offer_recipient');
		$this->db->join('vouchers', 'vouchers.id = voucher_offer_recipient.vouchers_id');
		$this->db->join('offers', 'offers.id = voucher_offer_recipient.offers_id');
		$this->db->join('users', 'users.id = voucher_offer_recipient.users_id');
		$query = $this->db->get();
		return $query->result();
    }
}