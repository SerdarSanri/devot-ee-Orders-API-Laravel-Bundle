## devot:ee Orders API Bundle, by Benjamin Kohl

The devot:ee Orders API bundle allows ExpressionEngine add-on developers that sell their add-ons on devot:ee to access their sales data.

## Installation

Install using Artisan CLI:

	php artisan bundle:install devotee_orders

## Loading the Bundle

You can autoload the bundle by adding the follow code to the array in application/bundles.php :

	return array(
		// ...other bundles...
		'devotee_orders' => array('auto' => true)
	);

If you choose not to autoload the bundle, you may start it with the following code :

	Bundle::start('devotee_orders');

## Usage

	// Initialize the devotee_orders object by passing your API key and your secret key
	$orders_api = new devotee_orders('your_api_key', 'your_secret_key');
		
	// POST parameters (optional)
	$options = array(
		'start_dt' => '2012-08-01',
		'end_dt' => '2012-09-05'
	);
		
	// Retrieve sales data in array format
	$sales_array = $orders_api->sales_array($options);
		
	// Retrieve sales data as a JSON string
	$sales_json = $orders_api->sales_json($options);

## Links

- devot:ee Orders API : http://devot-ee.com/sell/orders-api
