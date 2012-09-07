<?php
/**
 * @package devot:ee Orders API
 * @author Benjamin Kohl
 * 
 */

class devotee_orders
{
	public $api_key    = '';
	public $secret_key = '';
	
	// -------------------------------------------------------
	
	public function __construct($api_key='', $secret_key='')
	{
		$this->api_key    = $api_key;
		$this->secret_key = $secret_key;
		
		return $this;
	}
	
	// -------------------------------------------------------
	
	/**
	 * sales_json
	 * 
	 * @param Array options
	 * @return String
	 * 
	 */
	public function sales_json($options=array())
	{
		return $this->_orders_api_request($options);
	}
	
	// -------------------------------------------------------
	
	/**
	 * sales_array
	 * 
	 * @param Array options
	 * @return Array
	 * 
	 */
	public function sales_array($options=array())
	{
		$response = $this->_orders_api_request($options);
		return json_decode($response, TRUE);
	}
	
	// -------------------------------------------------------
	
	/**
	 * _orders_api_request
	 * 
	 * This method returns a JSON string of order data or a
	 * JSON string containing an error status.
	 * 
	 * @param Array options
	 * @return String
	 * 
	 */
	protected function _orders_api_request($options=array())
	{
		$options['api_key']    = $this->api_key;
		$options['secret_key'] = $this->secret_key;
		
		$cc = curl_init("https://devot-ee.com/api/orders");
		if ($cc)
		{
			curl_setopt($cc, CURLOPT_HEADER, 0);
			curl_setopt($cc, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
			curl_setopt($cc, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($cc, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($cc, CURLOPT_POST, 1);
			curl_setopt($cc, CURLOPT_POSTFIELDS, $options);
			$response = urldecode(curl_exec($cc));
			curl_close($cc);
		}
		else
			$response = '{"error" : ""}';
		
		return $response;
	}
	
	
}
