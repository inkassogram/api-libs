<?php 
namespace Includes\Inkassogram;
class InkassogramUtils {
	
	private static $instance = NULL;
	private $soap_client = NULL;
	public $ip_address;
	public $api_key;
	public $customer_number;
	
	public static function get_instance() {
		if (self::$instance == NULL) {
			self::$instance = new Inkassogram_OSTicket_Invoice_Soap_Client();
		}
		return self::$instance;
	}
	
	private function get_client() {
		if ($this->soap_client == NULL) {
			$options = array( 
				'trace' => true, 
				'encoding' => 'utf-8', 
				'connection_timeout' => 0, 
				'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
				'cache_wsdl' => WSDL_CACHE_MEMORY,
				'compression' => 0,
				'profile_agent' => 'PHP-SOAP/'. phpversion() . ', gzip'
			);
			$this->soap_client = new \SoapClient("https://api.inkassogram.se/soap/invoice_v2.0?wsdl", $options);
		}
		return $this->soap_client;
	}
	
	public function get_last_request_debug() {
		return $this->get_client()->__getLastRequest();
	}
	
	public function get_last_response_debug() {
		return $this->get_client()->__getLastResponse();
	}
	
	public function invoice_status($ocr) {
		$request = array('request' => array(
			'key' => $this->api_key,
			'customerno' => $this->customer_number,
			'ocr' => (int) $ocr
		));
		return $this->get_client()->InvoiceStatus($request)->response;
	}
	
	public function invoice_details($ocr) {
		$request = array('request' => array(
			'key' => $this->api_key,
			'customerno' => $this->customer_number,
			'ocr' => (int) $ocr
		));
		$retval = $this->get_client()->InvoiceDetails($request)->response;
		return $retval;
	}
	
	public function pause_invoice(
		$ocr, 
		$skip_reminder = false, 
		$skip_debt_collection = false, 
		$invoice_due_date = NULL, 
		$reminder_due_date = NULL, 
		$debt_collection_due_date = NULL
	) {
		$request = array('request' => array(
			'key' => $this->api_key,
			'customerno' => $this->customer_number,
			'ocr' => (int) $ocr,
			'pause' => false,
			'skip_reminder' => $skip_reminder,
			'skip_debt_collection' => $skip_debt_collection,
			'invoice_due_date' => $invoice_due_date,
			'reminder_due_date' => $reminder_due_date,
			'debt_collection_due_date' => $debt_collection_due_date
		));
		$retval = $this->get_client()->PauseInvoice($request)->response;
		return $retval;
	}
	
	public function resend_invoice(
		$ocr, 
		$print_setup, 
		$invoice_state, 
		$email = NULL,
		$mobile = NULL,
		$co_address1 = NULL, 
		$co_address2 = NULL, 
		$co_address3 = NULL, 
		$co_address4 = NULL, 
		$co_address5 = NULL, 
		$clear_co_address = FALSE,
		$invoice_reference = NULL, 
		$invoice_order_no = NULL, 
		$our_reference = NULL, 
		$your_reference = NULL
	) {
		$request = array('request' => array(
			'key' => $this->api_key,
			'customerno' => $this->customer_number,
			'ocr' => (int) $ocr,
			'print_setup' => $print_setup,
			'invoice_state' => (int) $invoice_state,
			'email' => $email,
			'mobile' => $mobile,
			'co_address1' => $co_address1,
			'co_address2' => $co_address2,
			'co_address3' => $co_address3,
			'co_address4' => $co_address4,
			'co_address5' => $co_address5,
			'clear_co_address' => $clear_co_address,
			'invoice_reference' => $invoice_reference,
			'invoice_order_no' => $invoice_order_no,
			'our_reference' => $our_reference,
			'your_reference' => $your_reference
		));
		return $this->get_client()->ResendInvoice($request)->response;
	}
	
	public function get_invoice_rows($ocr) {
		$request = array('request' => array(
			'key' => $this->api_key,
			'customerno' => $this->customer_number,
			'ocr' => $ocr,
			'fetch_rows_remain_to_credit' => true
		));
		$retval = $this->get_client()->FetchInvoiceRows($request)->response->invoice_rows;
		return $retval;
	}

	public function activate_invoice($ocr) {
		$request = array('request' => array(
			'key' => $this->api_key,
			'customerno' => $this->customer_number,
			'ocr' => $ocr,
                        'send_invoice_date' => NULL,
                        'invoice_due_date' => NULL
		));
		$retval = $this->get_client()->ActivateInvoice($request)->response;
		return $retval;
	}
	
	public function credit_rows($array) {
		$credit_rows = '';
		foreach($array['creditRows'] as $credit_row) {
                    $credit_row['price'] = round($credit_row['price'] / $credit_row['quantity']);
			$credit_rows .= sprintf('<creditRow>
				<articleNo>%s</articleNo>
				<vat>%s</vat>
				<quantity>%s</quantity>
				<price>%s</price>
			</creditRow>', $credit_row['articleNo'], $credit_row['vat'], $credit_row['quantity'], $credit_row['price']);
		}
		$xml = sprintf('<methodName>creditInvoice</methodName>
            <request>
				<printSetup>%s</printSetup>
				<includingVat>1</includingVat>
                <ocr>%s</ocr>
				%s
				<creditRows>%s</creditRows>
            </request>', $array['print_setup'], $array['ocr'], (isset($array['email']) && $array['email'] != NULL)? '<email>'.$array['email'].'</email>' : '', $credit_rows);
		return $this->do_send($xml);
	}

	public function credit_all_rows($array) {
		$credit_rows = '';
		foreach($array['creditRows'] as $credit_row) {
                    $credit_row['price'] = round($credit_row['price'] / $credit_row['quantity']);
			$credit_rows .= sprintf('<creditRow>
				<articleNo>%s</articleNo>
				<vat>%s</vat>
				<quantity>%s</quantity>
				<price>%s</price>
			</creditRow>', $credit_row['articleNo'], $credit_row['vat'], $credit_row['quantity'], $credit_row['price']);
		}
		$xml = sprintf('<methodName>creditInvoice</methodName>
            <request>
				<printSetup>%s</printSetup>
				<includingVat>1</includingVat>
                <ocr>%s</ocr>
                                %s
				<creditAllRows>1</creditAllRows>
            </request>', $array['print_setup'], $array['ocr'], (isset($array['email']) && $array['email'] != NULL)? '<email>'.$array['email'].'</email>' : '');
		return $this->do_send($xml);
	}
	
	private function do_send($xml) {
		$request = sprintf('<?xml version="1.0" encoding="UTF-8"?>
				<methodCall xmlns="https://api.inkassogram.se/API/creditInvoice" 
					xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
					xsi:schemaLocation="https://api.inkassogram.se/API/creditInvoice https://api.inkassogram.se/API/creditInvoiceSchema1.0.xsd">%s</methodCall>', $xml);
		$headers = array(
			'Content-Type: text/xml', 
			sprintf('customerNo: %s', $this->customer_number), 
			sprintf('key: %s', md5($this->ip_address . date('Ymd') . $this->api_key)), 
			sprintf('Content-length: %s', strlen($request))
		);
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://10.99.196.64/inkassogram.se/api.inkassogram.se/API/creditInvoice');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 9); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = @curl_exec($ch);
        $retval = array('status' => 0, 'message' => 'An error occured');
		if (!curl_errno($ch)) {
			$parsed = simplexml_load_string($result);
			$retval['status'] = $parsed->response->statusCode;
			if ($retval['status'] == '0') {
				$retval['message'] = $parsed->response->description;
			}
		}
		curl_close($ch);
		return (object) $retval;
	}

}

?>
