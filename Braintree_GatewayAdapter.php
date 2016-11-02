<?php
/**
 * Braintree plugin for Craft CMS
 *
 * Omnipay Braintree Gateway for Craft Commerce
 *
 * @author    Samuel Birch
 * @copyright Copyright (c) 2016 samuelbirch
 * @link      https://madebyjam.com
 * @package   Commerce\Gateways\Omnipay
 * @since     1.0.0
 */
 
namespace Commerce\Gateways\Omnipay;

use Commerce\Gateways\PaymentFormModels\BraintreePaymentFormModel;

class Braintree_GatewayAdapter extends \Commerce\Gateways\CreditCardGatewayAdapter
{
    public function handle()
    {
        return "Braintree";
    }
    
    public function getPaymentFormModel()
	{
		return new BraintreePaymentFormModel();
	}
}
