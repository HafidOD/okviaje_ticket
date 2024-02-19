<?php
//leer .env
$ENV = parse_ini_file('.env');

require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;

$url = $ENV['URL_SITE'];
$consumer_key = $ENV['WOO_CONSUMER_KEY'];
$consumer_secret = $ENV['WOO_CONSUMER__SECRET_KEY'];
$options = $ENV['WOO_CONSUMER__SECRET_KEY'];
$options = [
  'version' => 'wc/v3',
];

$woocommerce = new Client($url, $consumer_key, $consumer_secret, $options);

print_r($woocommerce->get('orders'));
// print_r($woocommerce->get('products'));
$data = [
  'payment_method' => 'bacs',
  'payment_method_title' => 'Direct Bank Transfer',
  'set_paid' => true,
  'billing' => [
    'first_name' => 'John',
    'last_name' => 'Doe',
    'address_1' => '969 Market',
    'address_2' => '',
    'city' => 'San Francisco',
    'state' => 'CA',
    'postcode' => '94103',
    'country' => 'US',
    'email' => 'hafido1403@gmail.com',
    'phone' => '(555) 555-5555'
  ],
  // 'shipping' => [
  //   'first_name' => 'John',
  //   'last_name' => 'Doe',
  //   'address_1' => '969 Market',
  //   'address_2' => '',
  //   'city' => 'San Francisco',
  //   'state' => 'CA',
  //   'postcode' => '94103',
  //   'country' => 'US'
  // ],
  'line_items' => [
    [
      'product_id' => 208,
      'quantity' => 2
    ],
  ],
];

// print_r($woocommerce->post('orders', $data));
