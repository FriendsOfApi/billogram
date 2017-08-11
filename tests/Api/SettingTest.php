<?php

declare(strict_types=1);

namespace Billogram\Tests\Api;

use Billogram\BillogramClient;
use Billogram\HttpClientConfigurator;
use Billogram\Model\Setting\BookkeepingSetting;
use Billogram\Model\Setting\BusinessAddress;
use Billogram\Model\Setting\Contact;
use Billogram\Model\Setting\InvoiceAddress;
use Billogram\Model\Setting\InvoiceDefaults;
use Billogram\Model\Setting\PaymentSetting;
use Billogram\Model\Setting\Setting;
use Billogram\Model\Setting\TaxSetting;
use Billogram\Model\Setting\VisitingAddress;
use Billogram\Tests\BaseTestCase;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class SettingTest extends BaseTestCase
{
    public function testFetch()
    {
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = BillogramClient::configure($httpClientConfigurator);
        $settingFinal = $apiClient->settings()->fetch();
        $this->assertInstanceOf(Setting::class, $settingFinal);
    }

    public function testUpdate()
    {
        $setting = new Setting();
        $contact = Contact::createFromArray(['name' => 'Ib92', 'phone' => '0712345678', 'email' => 'tarafder.saptad@pig.pp.ua', 'www' => 'https://www.youtube.com/']);
        $address = BusinessAddress::createFromArray(['street_address' => 'Finlandsgatan 36', 'careof' => 'Microsoft', 'zipcode' => '164 74', 'city' => 'Kista', 'country' => 'Sweden']);
        $invoiceAddress = InvoiceAddress::createFromArray(['street_address' => 'Finlandsgatan 36', 'careof' => 'Microsoft', 'zipcode' => '164 74', 'city' => 'Kista', 'country' => 'Sweden', 'email' => 'tarafder.saptad@pig.pp.ua']);
        $visitingAddress = VisitingAddress::createFromArray(['street_address' => 'Finlandsgatan 36', 'careof' => 'Microsoft', 'zipcode' => '164 74', 'city' => 'Kista', 'country' => 'Sweden']);
        $payment = PaymentSetting::createFromArray(['bankgiro' => '', 'plusgiro' => '', 'domestic_bank_account' => ['account_no' => '', 'clearing_no' => ''], 'international_bank_account' => ['bank' => '', 'iban' => '', 'bic' => '', 'swift' => '']]);
        $tax = TaxSetting::createFromArray(['is_vat_registered' => '', 'has_fskatt' => '', 'vat_no' => '']);
        $bookkeeping = BookkeepingSetting::createFromArray(['income_account_for_vat_25' => '', 'income_account_for_vat_12' => '', 'income_account_for_vat_6' => '', 'income_account_for_vat_0' => '', 'reversed_vat_account' => '', 'vat_account_for_vat_25' => '',
                                                            'vat_account_for_vat_12' => '', 'vat_account_for_vat_6' => '', 'account_receivable_account' => '', 'client_funds_account' => '', 'banking_account' => '', 'interest_fee_account' => '', 'reminder_fee_account' => '',
                                                            'rounding_account' => '', 'factoring_receivable_account' => '', 'non_allocated_account' => '', 'income_payout_account' => '', 'written_down_receivables_account' => '', 'expected_loss_account' => '',
                                                            'regional_sweden' => ['rotavdrag_account' => ''], ]);
        $invoices = InvoiceDefaults::createFromArray(['default_message' => 'hey hey', 'default_messagedefault_message' => 8.5, 'default_reminder_fee' => 10, 'default_invoice_fee' => 30,
                                                            'automatic_reminders' => ['delay_days' => 5, 'message' => 'HEY'],
                                                            'automatic_writeoff' => ['settings' => 'all_fees', 'amount' => 100],
                                                            'automatic_collection' => ['delay_days' => 5, 'amount' => 100], ]);
        $setting = $setting->withName('debg');
        $setting = $setting->withOrgNo('556667-0591');
        $setting = $setting->withContact($contact);
        $setting = $setting->withBusinessAddress($address);
        $setting = $setting->withVisitingAddress($visitingAddress);
        $setting = $setting->withInvoiceAddress($invoiceAddress);
        $setting = $setting->withPayment($payment);
        $setting = $setting->withTax($tax);
        $setting = $setting->withBookkeeping($bookkeeping);
        $setting = $setting->withInvoices($invoices);
        $cacheClient = $this->getHttpClient();
        $httpClientConfigurator = new HttpClientConfigurator($cacheClient);
        $httpClientConfigurator->setAuth('20561-3vhGtAxH', '4eddc2ab063bdd53dc64836ff3a0c7bc');
        $apiClient = BillogramClient::configure($httpClientConfigurator);
        $settingFinal = $apiClient->settings()->update($setting);
        $this->assertInstanceOf(Setting::class, $settingFinal);
    }

    /**
     * @return string|null the directory where cached responses are stored
     */
    protected function getCacheDir()
    {
        return dirname(__DIR__).'/.cache';
    }
}
