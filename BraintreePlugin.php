<?php
/**
 * Braintree plugin for Craft CMS
 *
 * Omnipay Braintree Gateway for Craft Commerce
 *
 * @author    Samuel Birch
 * @copyright Copyright (c) 2016 samuelbirch
 * @link      https://madebyjam.com
 * @package   Braintree
 * @since     1.0.0
 */

namespace Craft;

class BraintreePlugin extends BasePlugin
{
	private $commerceInstalled = false;
	
    /**
     * @return mixed
     */
    public function init()
    {
	    $commerce = craft()->db->createCommand()
            ->select('id')
            ->from('plugins')
            ->where("class = 'Commerce'")
            ->queryScalar();
        if($commerce){
            $this->commerceInstalled = true;
        }
    }

    /**
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('Braintree Commerce Gateway');
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return Craft::t('Omnipay Braintree Gateway for Craft Commerce');
    }

    /**
     * @return string
     */
    public function getDocumentationUrl()
    {
        return 'https://github.com/samuelbirch/craftcommerce-braintree/blob/master/README.md';
    }

    /**
     * @return string
     */
    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/samuelbirch/craftcommerce-braintree/master/releases.json';
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getDeveloper()
    {
        return 'madebyjam';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'https://madebyjam.com';
    }

    /**
     * @return bool
     */
    public function hasCpSection()
    {
        return false;
    }

    /**
     */
    public function commerce_registerGatewayAdapters()
    {
        if($this->commerceInstalled) {
            require __DIR__ . '/vendor/autoload.php';
            require_once __DIR__.'/Braintree_GatewayAdapter.php';
            require_once __DIR__.'/BraintreePaymentFormModel.php';
            return ['\Commerce\Gateways\Omnipay\Braintree_GatewayAdapter'];
        }
        return [];
    }
}
