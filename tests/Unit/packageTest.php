<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\package;

class packageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // to check if the API can't process uncomplete data for post method
    public function test_post_missing_data() {
        $response = $this->post('/api/package',[
            'transaction_id' => 'd0090c40-539f-479a-8274-899b9970aaaa',
            'customer_name' => 'PT. Bahagia Sentosa'
        ],[
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(422);
        $response->assertSeeText('The given data was invalid.');
        $response->assertSeeText('field is required');
    }

    // to check if the API can't accept the wrong data type
    public function test_wrong_data_type() {
        $response = $this->post('/api/package',[
            "transaction_id" => "d0090c40-539f-479a-8274-899b9970bddc",
            "customer_name" => "PT. AMARA PRIMATIGA",
            "customer_code" => "1678593",
            "transaction_amount" => "70700",
            "transaction_discount" => 0,
            "transaction_additional_field" => "",
            "transaction_payment_type" => 29,
            "transaction_state" => "PAID",
            "transaction_code" => "CGKFT20200715121",
            "transaction_order" => 121,
            "location_id" => "5cecb20b6c49615b174c3e74",
            "organization_id" => "6",
            "created_at" => "2020-07-15T11:11:12+0700",
            "updated_at" => "2020-07-15T11:11:22+0700",
            "transaction_payment_type_name" => "Invoice",
            "transaction_cash_amount" => 0,
            "transaction_cash_change" => 0,
            "customer_attribute" => [
                "Nama_Sales" => "Radit Fitrawikarsa",
                "TOP" => "14 Hari",
                "Jenis_Pelanggan" => "B2B"
            ],
            "connote" => [
                "connote_id" => "f70670b1-c3ef-4caf-bc4f-eefa702092ed",
                "connote_number" => 1,
                "connote_service" => "ECO",
                "connote_service_price" => 70700,
                "connote_amount" => 70700,
                "connote_code" => "AWB00100209082020",
                "connote_booking_code" => "",
                "connote_order" => 326931,
                "connote_state" => "PAID",
                "connote_state_id" => 2,
                "zone_code_from" => "CGKFT",
                "zone_code_to" => "SMG",
                "surcharge_amount" => null,
                "transaction_id" => "d0090c40-539f-479a-8274-899b9970bddc",
                "actual_weight" => 20,
                "volume_weight" => 0,
                "chargeable_weight" => 20,
                "created_at" => "2020-07-15T11:11:12+0700",
                "updated_at" => "2020-07-15T11:11:22+0700",
                "organization_id" => 6,
                "location_id" => "5cecb20b6c49615b174c3e74",
                "connote_total_package" => "3",
                "connote_surcharge_amount" => "0",
                "connote_sla_day" => "4",
                "location_name" => "Hub Jakarta Selatan",
                "location_type" => "HUB",
                "source_tariff_db" => "tariff_customers",
                "id_source_tariff" => "1576868",
                "pod" => null,
                "history" => []
            ],
            "connote_id" => "f70670b1-c3ef-4caf-bc4f-eefa702092ed",
            "origin_data" => [
                "customer_name" => "PT. NARA OKA PRAKARSA",
                "customer_address" => "JL. KH. AHMAD DAHLAN NO. 100, SEMARANG TENGAH 12420",
                "customer_email" => "info@naraoka.co.id",
                "customer_phone" => "024-1234567",
                "customer_address_detail" => null,
                "customer_zip_code" => "12420",
                "zone_code" => "CGKFT",
                "organization_id" => 6,
                "location_id" => "5cecb20b6c49615b174c3e74"
            ],
            "destination_data" => [
                "customer_name" => "PT AMARIS HOTEL SIMPANG LIMA",
                "customer_address" => "JL. KH. AHMAD DAHLAN NO. 01, SEMARANG TENGAH",
                "customer_email" => null,
                "customer_phone" => "0248453499",
                "customer_address_detail" => "KOTA SEMARANG SEMARANG TENGAH KARANGKIDUL",
                "customer_zip_code" => "50241",
                "zone_code" => "SMG",
                "organization_id" => 6,
                "location_id" => "5cecb20b6c49615b174c3e74"
            ],
            "koli_data" => [
                [
                    "koli_length" => 0,
                    "awb_url" => "https:\/\/tracking.mile.app\/label\/AWB00100209082020.1",
                    "created_at" => "2020-07-15 11:11:13",
                    "koli_chargeable_weight" => 9,
                    "koli_width" => 0,
                    "koli_surcharge" => [],
                    "koli_height" => 0,
                    "updated_at" => "2020-07-15 11:11:13",
                    "koli_description" => "V WARP",
                    "koli_formula_id" => null,
                    "connote_id" => "f70670b1-c3ef-4caf-bc4f-eefa702092ed",
                    "koli_volume" => 0,
                    "koli_weight" => 9,
                    "koli_id" => "e2cb6d86-0bb9-409b-a1f0-389ed4f2df2d",
                    "koli_custom_field" => [
                        "awb_sicepat" => null,
                        "harga_barang" => null
                    ],
                    "koli_code" => "AWB00100209082020.1"
                ],
            ],
            "custom_field" => [
                "catatan_tambahan" => "JANGAN DI BANTING \/ DI TINDIH"
            ],
            "currentLocation" => [
                "name" => "Hub Jakarta Selatan",
                "code" => "JKTS01",
                "type" => "Agent"
            ]
        ],[
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(422);
        $response->assertSeeText('The given data was invalid.');
        $response->assertSeeText('must be a string.');
    }

    public function test_wrong_same_data() {
        $response = $this->post('/api/package',[
            "transaction_id" => "b0090c40-539f-479a-8274-899b9970bddc",
            "customer_name" => "PT. AMARA PRIMATIGA",
            "customer_code" => "1678593",
            "transaction_amount" => "70700",
            "transaction_discount" => "0",
            "transaction_additional_field" => "",
            "transaction_payment_type" => "29",
            "transaction_state" => "PAID",
            "transaction_code" => "CGKFT20200715121",
            "transaction_order" => 121,
            "location_id" => "5cecb20b6c49615b174c3e74",
            "organization_id" => 6,
            "created_at" => "2020-07-15T11:11:12+0700",
            "updated_at" => "2020-07-15T11:11:22+0700",
            "transaction_payment_type_name" => "Invoice",
            "transaction_cash_amount" => 0,
            "transaction_cash_change" => 0,
            "customer_attribute" => [
                "Nama_Sales" => "Radit Fitrawikarsa",
                "TOP" => "14 Hari",
                "Jenis_Pelanggan" => "B2B"
            ],
            "connote" => [
                "connote_id" => "f70670b1-c3ef-4caf-bc4f-eefa702092ee",
                "connote_number" => 1,
                "connote_service" => "ECO",
                "connote_service_price" => 70700,
                "connote_amount" => 70700,
                "connote_code" => "AWB00100209082020",
                "connote_booking_code" => "",
                "connote_order" => 326931,
                "connote_state" => "PAID",
                "connote_state_id" => 2,
                "zone_code_from" => "CGKFT",
                "zone_code_to" => "SMG",
                "surcharge_amount" => null,
                "transaction_id" => "d0090c40-539f-479a-8274-899b9970bddc",
                "actual_weight" => 20,
                "volume_weight" => 0,
                "chargeable_weight" => 20,
                "created_at" => "2020-07-15T11:11:12+0700",
                "updated_at" => "2020-07-15T11:11:22+0700",
                "organization_id" => 6,
                "location_id" => "5cecb20b6c49615b174c3e74",
                "connote_total_package" => "3",
                "connote_surcharge_amount" => "0",
                "connote_sla_day" => "4",
                "location_name" => "Hub Jakarta Selatan",
                "location_type" => "HUB",
                "source_tariff_db" => "tariff_customers",
                "id_source_tariff" => "1576868",
                "pod" => null,
                "history" => []
            ],
            "connote_id" => "f70670b1-c3ef-4caf-bc4f-eefa702092ed",
            "origin_data" => [
                "customer_name" => "PT. NARA OKA PRAKARSA",
                "customer_address" => "JL. KH. AHMAD DAHLAN NO. 100, SEMARANG TENGAH 12420",
                "customer_email" => "info@naraoka.co.id",
                "customer_phone" => "024-1234567",
                "customer_address_detail" => null,
                "customer_zip_code" => "12420",
                "zone_code" => "CGKFT",
                "organization_id" => 6,
                "location_id" => "5cecb20b6c49615b174c3e74"
            ],
            "destination_data" => [
                "customer_name" => "PT AMARIS HOTEL SIMPANG LIMA",
                "customer_address" => "JL. KH. AHMAD DAHLAN NO. 01, SEMARANG TENGAH",
                "customer_email" => null,
                "customer_phone" => "0248453499",
                "customer_address_detail" => "KOTA SEMARANG SEMARANG TENGAH KARANGKIDUL",
                "customer_zip_code" => "50241",
                "zone_code" => "SMG",
                "organization_id" => 6,
                "location_id" => "5cecb20b6c49615b174c3e74"
            ],
            "koli_data" => [
                [
                    "koli_length" => 0,
                    "awb_url" => "https:\/\/tracking.mile.app\/label\/AWB00100209082020.1",
                    "created_at" => "2020-07-15 11:11:13",
                    "koli_chargeable_weight" => 9,
                    "koli_width" => 0,
                    "koli_surcharge" => [],
                    "koli_height" => 0,
                    "updated_at" => "2020-07-15 11:11:13",
                    "koli_description" => "V WARP",
                    "koli_formula_id" => null,
                    "connote_id" => "f70670b1-c3ef-4caf-bc4f-eefa702092ed",
                    "koli_volume" => 0,
                    "koli_weight" => 9,
                    "koli_id" => "e2cb6d86-0bb9-409b-a1f0-389ed4f2df2d",
                    "koli_custom_field" => [
                        "awb_sicepat" => null,
                        "harga_barang" => null
                    ],
                    "koli_code" => "AWB00100209082020.1"
                ],
            ],
            "custom_field" => [
                "catatan_tambahan" => "JANGAN DI BANTING \/ DI TINDIH"
            ],
            "currentLocation" => [
                "name" => "Hub Jakarta Selatan",
                "code" => "JKTS01",
                "type" => "Agent"
            ]
        ],[
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(422);
        $response->assertSeeText('The given data was invalid.');
        $response->assertSeeText('must match.');
    }

    public function test_wrong_min_data() {
        $response = $this->post('/api/package',[
            "transaction_id" => "b0090c40-539f-479a-8274-899b9970bddc",
            "customer_name" => "PT. AMARA PRIMATIGA",
            "customer_code" => "1678593",
            "transaction_amount" => "70700",
            "transaction_discount" => "0",
            "transaction_additional_field" => "",
            "transaction_payment_type" => "29",
            "transaction_state" => "PAID",
            "transaction_code" => "CGKFT20200715121",
            "transaction_order" => 121,
            "location_id" => "5cecb20b6c49615b174c3e74",
            "organization_id" => 6,
            "created_at" => "2020-07-15T11:11:12+0700",
            "updated_at" => "2020-07-15T11:11:22+0700",
            "transaction_payment_type_name" => "Invoice",
            "transaction_cash_amount" => 0,
            "transaction_cash_change" => 0,
            "customer_attribute" => [
                "Nama_Sales" => "Radit Fitrawikarsa",
                "TOP" => "14 Hari",
                "Jenis_Pelanggan" => "B2B"
            ],
            "connote" => [
                "connote_id" => "f70670b1-c3ef-4caf-bc4f-eefa702092ed",
                "connote_number" => 1,
                "connote_service" => "ECO",
                "connote_service_price" => 70700,
                "connote_amount" => 70700,
                "connote_code" => "AWB00100209082020",
                "connote_booking_code" => "",
                "connote_order" => 326931,
                "connote_state" => "PAID",
                "connote_state_id" => 2,
                "zone_code_from" => "CGKFT",
                "zone_code_to" => "SMG",
                "surcharge_amount" => null,
                "transaction_id" => "d0090c40-539f-479a-8274-899b9970bddc",
                "actual_weight" => -20,
                "volume_weight" => 0,
                "chargeable_weight" => -20,
                "created_at" => "2020-07-15T11:11:12+0700",
                "updated_at" => "2020-07-15T11:11:22+0700",
                "organization_id" => 6,
                "location_id" => "5cecb20b6c49615b174c3e74",
                "connote_total_package" => "3",
                "connote_surcharge_amount" => "0",
                "connote_sla_day" => "4",
                "location_name" => "Hub Jakarta Selatan",
                "location_type" => "HUB",
                "source_tariff_db" => "tariff_customers",
                "id_source_tariff" => "1576868",
                "pod" => null,
                "history" => []
            ],
            "connote_id" => "f70670b1-c3ef-4caf-bc4f-eefa702092ed",
            "origin_data" => [
                "customer_name" => "PT. NARA OKA PRAKARSA",
                "customer_address" => "JL. KH. AHMAD DAHLAN NO. 100, SEMARANG TENGAH 12420",
                "customer_email" => "info@naraoka.co.id",
                "customer_phone" => "024-1234567",
                "customer_address_detail" => null,
                "customer_zip_code" => "12420",
                "zone_code" => "CGKFT",
                "organization_id" => 6,
                "location_id" => "5cecb20b6c49615b174c3e74"
            ],
            "destination_data" => [
                "customer_name" => "PT AMARIS HOTEL SIMPANG LIMA",
                "customer_address" => "JL. KH. AHMAD DAHLAN NO. 01, SEMARANG TENGAH",
                "customer_email" => null,
                "customer_phone" => "0248453499",
                "customer_address_detail" => "KOTA SEMARANG SEMARANG TENGAH KARANGKIDUL",
                "customer_zip_code" => "50241",
                "zone_code" => "SMG",
                "organization_id" => 6,
                "location_id" => "5cecb20b6c49615b174c3e74"
            ],
            "koli_data" => [
                [
                    "koli_length" => 0,
                    "awb_url" => "https:\/\/tracking.mile.app\/label\/AWB00100209082020.1",
                    "created_at" => "2020-07-15 11:11:13",
                    "koli_chargeable_weight" => 9,
                    "koli_width" => 0,
                    "koli_surcharge" => [],
                    "koli_height" => 0,
                    "updated_at" => "2020-07-15 11:11:13",
                    "koli_description" => "V WARP",
                    "koli_formula_id" => null,
                    "connote_id" => "f70670b1-c3ef-4caf-bc4f-eefa702092ed",
                    "koli_volume" => 0,
                    "koli_weight" => 9,
                    "koli_id" => "e2cb6d86-0bb9-409b-a1f0-389ed4f2df2d",
                    "koli_custom_field" => [
                        "awb_sicepat" => null,
                        "harga_barang" => null
                    ],
                    "koli_code" => "AWB00100209082020.1"
                ],
            ],
            "custom_field" => [
                "catatan_tambahan" => "JANGAN DI BANTING \/ DI TINDIH"
            ],
            "currentLocation" => [
                "name" => "Hub Jakarta Selatan",
                "code" => "JKTS01",
                "type" => "Agent"
            ]
        ],[
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(422);
        $response->assertSeeText('The given data was invalid.');
        $response->assertSeeText('must be at least');
    }

    public function test_correct_post() {
        $response = $this->post('/api/package',[
            "transaction_id" => "b0090c40-539f-479a-8274-899b9970bddc",
            "customer_name" => "PT. AMARA PRIMATIGA",
            "customer_code" => "1678593",
            "transaction_amount" => "70700",
            "transaction_discount" => "0",
            "transaction_additional_field" => "",
            "transaction_payment_type" => "29",
            "transaction_state" => "PAID",
            "transaction_code" => "CGKFT20200715121",
            "transaction_order" => 121,
            "location_id" => "5cecb20b6c49615b174c3e74",
            "organization_id" => 6,
            "created_at" => "2020-07-15T11:11:12+0700",
            "updated_at" => "2020-07-15T11:11:22+0700",
            "transaction_payment_type_name" => "Invoice",
            "transaction_cash_amount" => 0,
            "transaction_cash_change" => 0,
            "customer_attribute" => [
                "Nama_Sales" => "Radit Fitrawikarsa",
                "TOP" => "14 Hari",
                "Jenis_Pelanggan" => "B2B"
            ],
            "connote" => [
                "connote_id" => "f70670b1-c3ef-4caf-bc4f-eefa702092ed",
                "connote_number" => 1,
                "connote_service" => "ECO",
                "connote_service_price" => 70700,
                "connote_amount" => 70700,
                "connote_code" => "AWB00100209082020",
                "connote_booking_code" => "",
                "connote_order" => 326931,
                "connote_state" => "PAID",
                "connote_state_id" => 2,
                "zone_code_from" => "CGKFT",
                "zone_code_to" => "SMG",
                "surcharge_amount" => null,
                "transaction_id" => "d0090c40-539f-479a-8274-899b9970bddc",
                "actual_weight" => 20,
                "volume_weight" => 0,
                "chargeable_weight" => 20,
                "created_at" => "2020-07-15T11:11:12+0700",
                "updated_at" => "2020-07-15T11:11:22+0700",
                "organization_id" => 6,
                "location_id" => "5cecb20b6c49615b174c3e74",
                "connote_total_package" => "3",
                "connote_surcharge_amount" => "0",
                "connote_sla_day" => "4",
                "location_name" => "Hub Jakarta Selatan",
                "location_type" => "HUB",
                "source_tariff_db" => "tariff_customers",
                "id_source_tariff" => "1576868",
                "pod" => null,
                "history" => []
            ],
            "connote_id" => "f70670b1-c3ef-4caf-bc4f-eefa702092ed",
            "origin_data" => [
                "customer_name" => "PT. NARA OKA PRAKARSA",
                "customer_address" => "JL. KH. AHMAD DAHLAN NO. 100, SEMARANG TENGAH 12420",
                "customer_email" => "info@naraoka.co.id",
                "customer_phone" => "024-1234567",
                "customer_address_detail" => null,
                "customer_zip_code" => "12420",
                "zone_code" => "CGKFT",
                "organization_id" => 6,
                "location_id" => "5cecb20b6c49615b174c3e74"
            ],
            "destination_data" => [
                "customer_name" => "PT AMARIS HOTEL SIMPANG LIMA",
                "customer_address" => "JL. KH. AHMAD DAHLAN NO. 01, SEMARANG TENGAH",
                "customer_email" => null,
                "customer_phone" => "0248453499",
                "customer_address_detail" => "KOTA SEMARANG SEMARANG TENGAH KARANGKIDUL",
                "customer_zip_code" => "50241",
                "zone_code" => "SMG",
                "organization_id" => 6,
                "location_id" => "5cecb20b6c49615b174c3e74"
            ],
            "koli_data" => [
                [
                    "koli_length" => 0,
                    "awb_url" => "https:\/\/tracking.mile.app\/label\/AWB00100209082020.1",
                    "created_at" => "2020-07-15 11:11:13",
                    "koli_chargeable_weight" => 9,
                    "koli_width" => 0,
                    "koli_surcharge" => [],
                    "koli_height" => 0,
                    "updated_at" => "2020-07-15 11:11:13",
                    "koli_description" => "V WARP",
                    "koli_formula_id" => null,
                    "connote_id" => "f70670b1-c3ef-4caf-bc4f-eefa702092ed",
                    "koli_volume" => 0,
                    "koli_weight" => 9,
                    "koli_id" => "e2cb6d86-0bb9-409b-a1f0-389ed4f2df2d",
                    "koli_custom_field" => [
                        "awb_sicepat" => null,
                        "harga_barang" => null
                    ],
                    "koli_code" => "AWB00100209082020.1"
                ],
            ],
            "custom_field" => [
                "catatan_tambahan" => "JANGAN DI BANTING \/ DI TINDIH"
            ],
            "currentLocation" => [
                "name" => "Hub Jakarta Selatan",
                "code" => "JKTS01",
                "type" => "Agent"
            ]
        ],[
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(200);
        $response->assertSeeText('Success');
    }

    // to check if the API can't process uncomplete data for put method
    public function test_put_missing_data() {
        $response = $this->put('/api/package/b0090c40-539f-479a-8274-899b9970bddc',[
            'transaction_id' => 'b0090c40-539f-479a-8274-899b9970bddc',
            'customer_name' => 'PT. Bahagia Sentosa'
        ],[
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(422);
        $response->assertSeeText('The given data was invalid.');
        $response->assertSeeText('field is required');
    }

    public function test_wrong_id_put() {
        $response = $this->put('/api/package/1',[
            "transaction_id" => "b0090c40-539f-479a-8274-899b9970bddc",
            "customer_name" => "PT. BAHAGIA SENTOSA",
            "customer_code" => "1678593",
            "transaction_amount" => "70700",
            "transaction_discount" => "0",
            "transaction_additional_field" => "",
            "transaction_payment_type" => "29",
            "transaction_state" => "PAID",
            "transaction_code" => "CGKFT20200715121",
            "transaction_order" => 121,
            "location_id" => "5cecb20b6c49615b174c3e74",
            "organization_id" => 6,
            "created_at" => "2020-07-15T11:11:12+0700",
            "updated_at" => "2020-07-15T11:11:22+0700",
            "transaction_payment_type_name" => "Invoice",
            "transaction_cash_amount" => 0,
            "transaction_cash_change" => 0,
            "customer_attribute" => [
                "Nama_Sales" => "Radit Fitrawikarsa",
                "TOP" => "14 Hari",
                "Jenis_Pelanggan" => "B2B"
            ],
            "connote" => [
                "connote_id" => "f70670b1-c3ef-4caf-bc4f-eefa702092ed",
                "connote_number" => 1,
                "connote_service" => "ECO",
                "connote_service_price" => 70700,
                "connote_amount" => 70700,
                "connote_code" => "AWB00100209082020",
                "connote_booking_code" => "",
                "connote_order" => 326931,
                "connote_state" => "PAID",
                "connote_state_id" => 2,
                "zone_code_from" => "CGKFT",
                "zone_code_to" => "SMG",
                "surcharge_amount" => null,
                "transaction_id" => "d0090c40-539f-479a-8274-899b9970bddc",
                "actual_weight" => 20,
                "volume_weight" => 0,
                "chargeable_weight" => 20,
                "created_at" => "2020-07-15T11:11:12+0700",
                "updated_at" => "2020-07-15T11:11:22+0700",
                "organization_id" => 6,
                "location_id" => "5cecb20b6c49615b174c3e74",
                "connote_total_package" => "3",
                "connote_surcharge_amount" => "0",
                "connote_sla_day" => "4",
                "location_name" => "Hub Jakarta Selatan",
                "location_type" => "HUB",
                "source_tariff_db" => "tariff_customers",
                "id_source_tariff" => "1576868",
                "pod" => null,
                "history" => []
            ],
            "connote_id" => "f70670b1-c3ef-4caf-bc4f-eefa702092ed",
            "origin_data" => [
                "customer_name" => "PT. NARA OKA PRAKARSA",
                "customer_address" => "JL. KH. AHMAD DAHLAN NO. 100, SEMARANG TENGAH 12420",
                "customer_email" => "info@naraoka.co.id",
                "customer_phone" => "024-1234567",
                "customer_address_detail" => null,
                "customer_zip_code" => "12420",
                "zone_code" => "CGKFT",
                "organization_id" => 6,
                "location_id" => "5cecb20b6c49615b174c3e74"
            ],
            "destination_data" => [
                "customer_name" => "PT AMARIS HOTEL SIMPANG LIMA",
                "customer_address" => "JL. KH. AHMAD DAHLAN NO. 01, SEMARANG TENGAH",
                "customer_email" => null,
                "customer_phone" => "0248453499",
                "customer_address_detail" => "KOTA SEMARANG SEMARANG TENGAH KARANGKIDUL",
                "customer_zip_code" => "50241",
                "zone_code" => "SMG",
                "organization_id" => 6,
                "location_id" => "5cecb20b6c49615b174c3e74"
            ],
            "koli_data" => [
                [
                    "koli_length" => 0,
                    "awb_url" => "https:\/\/tracking.mile.app\/label\/AWB00100209082020.1",
                    "created_at" => "2020-07-15 11:11:13",
                    "koli_chargeable_weight" => 9,
                    "koli_width" => 0,
                    "koli_surcharge" => [],
                    "koli_height" => 0,
                    "updated_at" => "2020-07-15 11:11:13",
                    "koli_description" => "V WARP",
                    "koli_formula_id" => null,
                    "connote_id" => "f70670b1-c3ef-4caf-bc4f-eefa702092ed",
                    "koli_volume" => 0,
                    "koli_weight" => 9,
                    "koli_id" => "e2cb6d86-0bb9-409b-a1f0-389ed4f2df2d",
                    "koli_custom_field" => [
                        "awb_sicepat" => null,
                        "harga_barang" => null
                    ],
                    "koli_code" => "AWB00100209082020.1"
                ],
            ],
            "custom_field" => [
                "catatan_tambahan" => "JANGAN DI BANTING \/ DI TINDIH"
            ],
            "currentLocation" => [
                "name" => "Hub Jakarta Selatan",
                "code" => "JKTS01",
                "type" => "Agent"
            ]
        ],[
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(400);
        $response->assertSeeText('No data found');
    }

    public function test_correct_put() {
        $response = $this->put('/api/package/b0090c40-539f-479a-8274-899b9970bddc',[
            "transaction_id" => "b0090c40-539f-479a-8274-899b9970bddc",
            "customer_name" => "PT. BAHAGIA SENTOSA",
            "customer_code" => "1678593",
            "transaction_amount" => "70700",
            "transaction_discount" => "0",
            "transaction_additional_field" => "",
            "transaction_payment_type" => "29",
            "transaction_state" => "PAID",
            "transaction_code" => "CGKFT20200715121",
            "transaction_order" => 121,
            "location_id" => "5cecb20b6c49615b174c3e74",
            "organization_id" => 6,
            "created_at" => "2020-07-15T11:11:12+0700",
            "updated_at" => "2020-07-15T11:11:22+0700",
            "transaction_payment_type_name" => "Invoice",
            "transaction_cash_amount" => 0,
            "transaction_cash_change" => 0,
            "customer_attribute" => [
                "Nama_Sales" => "Radit Fitrawikarsa",
                "TOP" => "14 Hari",
                "Jenis_Pelanggan" => "B2B"
            ],
            "connote" => [
                "connote_id" => "f70670b1-c3ef-4caf-bc4f-eefa702092ed",
                "connote_number" => 1,
                "connote_service" => "ECO",
                "connote_service_price" => 70700,
                "connote_amount" => 70700,
                "connote_code" => "AWB00100209082020",
                "connote_booking_code" => "",
                "connote_order" => 326931,
                "connote_state" => "PAID",
                "connote_state_id" => 2,
                "zone_code_from" => "CGKFT",
                "zone_code_to" => "SMG",
                "surcharge_amount" => null,
                "transaction_id" => "d0090c40-539f-479a-8274-899b9970bddc",
                "actual_weight" => 20,
                "volume_weight" => 0,
                "chargeable_weight" => 20,
                "created_at" => "2020-07-15T11:11:12+0700",
                "updated_at" => "2020-07-15T11:11:22+0700",
                "organization_id" => 6,
                "location_id" => "5cecb20b6c49615b174c3e74",
                "connote_total_package" => "3",
                "connote_surcharge_amount" => "0",
                "connote_sla_day" => "4",
                "location_name" => "Hub Jakarta Selatan",
                "location_type" => "HUB",
                "source_tariff_db" => "tariff_customers",
                "id_source_tariff" => "1576868",
                "pod" => null,
                "history" => []
            ],
            "connote_id" => "f70670b1-c3ef-4caf-bc4f-eefa702092ed",
            "origin_data" => [
                "customer_name" => "PT. NARA OKA PRAKARSA",
                "customer_address" => "JL. KH. AHMAD DAHLAN NO. 100, SEMARANG TENGAH 12420",
                "customer_email" => "info@naraoka.co.id",
                "customer_phone" => "024-1234567",
                "customer_address_detail" => null,
                "customer_zip_code" => "12420",
                "zone_code" => "CGKFT",
                "organization_id" => 6,
                "location_id" => "5cecb20b6c49615b174c3e74"
            ],
            "destination_data" => [
                "customer_name" => "PT AMARIS HOTEL SIMPANG LIMA",
                "customer_address" => "JL. KH. AHMAD DAHLAN NO. 01, SEMARANG TENGAH",
                "customer_email" => null,
                "customer_phone" => "0248453499",
                "customer_address_detail" => "KOTA SEMARANG SEMARANG TENGAH KARANGKIDUL",
                "customer_zip_code" => "50241",
                "zone_code" => "SMG",
                "organization_id" => 6,
                "location_id" => "5cecb20b6c49615b174c3e74"
            ],
            "koli_data" => [
                [
                    "koli_length" => 0,
                    "awb_url" => "https:\/\/tracking.mile.app\/label\/AWB00100209082020.1",
                    "created_at" => "2020-07-15 11:11:13",
                    "koli_chargeable_weight" => 9,
                    "koli_width" => 0,
                    "koli_surcharge" => [],
                    "koli_height" => 0,
                    "updated_at" => "2020-07-15 11:11:13",
                    "koli_description" => "V WARP",
                    "koli_formula_id" => null,
                    "connote_id" => "f70670b1-c3ef-4caf-bc4f-eefa702092ed",
                    "koli_volume" => 0,
                    "koli_weight" => 9,
                    "koli_id" => "e2cb6d86-0bb9-409b-a1f0-389ed4f2df2d",
                    "koli_custom_field" => [
                        "awb_sicepat" => null,
                        "harga_barang" => null
                    ],
                    "koli_code" => "AWB00100209082020.1"
                ],
            ],
            "custom_field" => [
                "catatan_tambahan" => "JANGAN DI BANTING \/ DI TINDIH"
            ],
            "currentLocation" => [
                "name" => "Hub Jakarta Selatan",
                "code" => "JKTS01",
                "type" => "Agent"
            ]
        ],[
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(200);
        $response->assertSeeText('Success');
    }

    public function test_wrong_id_patch() {
        $response = $this->patch('/api/package/1',[
            'transaction_id' => 'b0090c40-539f-479a-8274-899b9970bddc',
            'customer_name' => 'PT. BAHAGIA SELALU1'
        ],[
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(400);
        $response->assertSeeText('No data found');
    }

    public function test_correct_patch() {
        $response = $this->patch('/api/package/b0090c40-539f-479a-8274-899b9970bddc',[
            'transaction_id' => 'b0090c40-539f-479a-8274-899b9970bddc',
            'customer_name' => 'PT. BAHAGIA SELALU'
        ],[
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(200);
        $response->assertSeeText('Success');
    }

    public function test_wrong_id_delete() {
        $response = $this->delete('/api/package/1',[
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(400);
        $response->assertSeeText('No data found');
    }

    public function test_correct_delete() {
        $response = $this->delete('/api/package/b0090c40-539f-479a-8274-899b9970bddc',[
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(200);
        $response->assertSeeText('Success');
    }
}
