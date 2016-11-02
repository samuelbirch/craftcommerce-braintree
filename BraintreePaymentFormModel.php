<?php
/**
 * Braintree plugin for Craft CMS
 *
 * Omnipay Braintree Gateway for Craft Commerce
 *
 * @author    Samuel Birch
 * @copyright Copyright (c) 2016 samuelbirch
 * @link      https://madebyjam.com
 * @package   Commerce\Gateways\PaymentFormModels
 * @since     1.0.0
 */	

namespace Commerce\Gateways\PaymentFormModels;

class BraintreePaymentFormModel extends CreditCardPaymentFormModel
{
	public function populateModelFromPost($post)
	{
		parent::populateModelFromPost($post);
		if (isset($post['payment_method_nonce']))
		{
			$this->token = $post['payment_method_nonce'];
		}
	}

	public function rules()
	{
		if (empty($this->token))
		{
			return parent::rules();
		}
		else
		{
			return [];
		}
	}
}