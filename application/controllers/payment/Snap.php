<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class Snap extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-UTh6zIW7h0WTDQl3pXW2ViuQ', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');	
    }

    public function index()
    {
    	$this->load->view('payment/checkout_snap');
    }
    public function pembayaran()
    {
    	$this->load->view('backend/sikma/template/v_header');
        $this->load->view('backend/sikma/pembayaran/pembayaran');
        $this->load->view('backend/sikma/template/v_footer');
    }

    public function token()
    {

		$nim = $this->input->post('nim');
		$email = $this->input->post('email');
		$nama = $this->input->post('nama');
		$kode_pembayaran = $this->input->post('kode_pembayaran');
		$jenis_pembayaran = $this->input->post('jenis_pembayaran');
		$nominal = $this->input->post('nominal');
		$kategori = $this->input->post('kategori');
		
		// Required
		$transaction_details = array(
		  'order_id' => rand(),
		  'gross_amount' => $nominal, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
		  'id' => 'a1',
		  'price' => $nominal,
		  'quantity' => 1,
		  'name' => $jenis_pembayaran
		);


		// Optional
		$item_details = array ($item1_details);

		// Optional
		$customer_details = array(
		  'first_name'    => $nama,
		  'email'         => $email,
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'minute', 
            'duration'  => 60
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
    }

	public function finish()
	{
		
		$nim = $this->input->post('nim');
		$nominal = $this->input->post('nominal');
		$kode_pembayaran = $this->input->post('kode_pembayaran');
		$jenis_pembayaran = $this->input->post('jenis_pembayaran');
		$kategori = $this->input->post('kategori');
		$metode = $this->input->post('metode');
		$status_code = $this->input->post('status_code');
		
		$result = json_decode($this->input->post('result_data'), true);
		$data = [
			'nim' => $nim,
			'kode_pembayaran' => $kode_pembayaran,
			'jenis_pembayaran' => $jenis_pembayaran,
			'metode' => $metode,
			'kategori' => $kategori,
			'nominal' => $result['nominal'],
			'nominal' => $result['gross_amount'],
			'order_id' => $result['order_id'],
			'tgl_pembayaran' => $result['transaction_time'],
			'bank' => $result['va_numbers'][0]["bank"],
			'va_number' => $result['va_numbers'][0]["va_number"],
			'pdf_url' => $result['pdf_url'],
			'status' => $result['status_code']
		];

		$simpan = $this->db->insert('transaksi', $data);
		if ($simpan) {
			$this->session->set_flashdata('alert', '<div class="alert alert-primary">Data pembayaran berhasil di simpan !</div>');
			$this->session->set_flashdata('alert_timeout', 4000);
			redirect('tagihanmhs');
		} else {
			$this->session->set_flashdata('alert', '<div class="alert alert-primary">Data dosen berhasil di update !</div>');
			$this->session->set_flashdata('alert_timeout', 4000);
			redirect('tagihanmhs');
		}
	}

}
