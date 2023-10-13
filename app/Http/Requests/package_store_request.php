<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class package_store_request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'transaction_id' => 'required|string',
            'customer_name' => 'required|string',
            'customer_code' => 'required|string',
            'transaction_amount' => 'required|string',
            'transaction_discount' => 'required|string',
            'transaction_additional_field' => 'nullable|string',
            'transaction_payment_type' => 'required|string',
            'transaction_state' => 'required|string',
            'transaction_code' => 'required|string',
            'transaction_order' => 'required|integer|min:1',
            'location_id' => 'required|string',
            'organization_id' => 'required|integer',
            'created_at' => 'required|date',
            'updated_at' => 'required|date',
            'transaction_payment_type_name' => 'required|string',
            'transaction_cash_amount' => 'required|integer',
            'transaction_cash_change' => 'required|integer',
            'customer_attribute.Nama_Sales' => 'required|string',
            'customer_attribute.TOP' => 'required|string',
            'customer_attribute.Jenis_Pelanggan' => 'required|string',
            'connote.connote_id' => 'required|string|same:connote_id',
            'connote.connote_number' => 'required|integer',
            'connote.connote_service' => 'required|string',
            'connote.connote_service_price' => 'required|integer',
            'connote.connote_amount' => 'required|integer',
            'connote.connote_code' => 'required|string',
            'connote.connote_booking_code' => 'nullable|string',
            'connote.connote_order' => 'required|integer',
            'connote.connote_state' => 'required|string',
            'connote.connote_state_id' => 'required|integer',
            'connote.zone_code_from' => 'required|string|same:origin_data.zone_code',
            'connote.zone_code_to' => 'required|string|same:destination_data.zone_code',
            'connote.surcharge_amount' => 'nullable',
            'connote.transaction_id' => 'required|string',
            'connote.actual_weight' => 'required|integer|min:0',
            'connote.volume_weight' => 'required|integer|min:0',
            'connote.chargeable_weight' => 'required|integer|min:0',
            'connote.created_at' => 'required|date',
            'connote.updated_at' => 'required|date',
            'connote.organization_id' => 'required|integer',
            'connote.location_id' => 'required|string|same:location_id',
            'connote.connote_total_package' => 'required|string',
            'connote.connote_surcharge_amount' => 'required|string',
            'connote.connote_sla_day' => 'required|string',
            'connote.location_name' => 'required|string',
            'connote.location_type' => 'required|string',
            'connote.source_tariff_db' => 'required|string',
            'connote.id_source_tariff' => 'required|string',
            'connote.pod' => 'nullable',
            'connote.history' => 'nullable',
            'connote_id' => 'required|string',
            'origin_data.customer_name' => 'required|string',
            'origin_data.customer_address' => 'required|string',
            'origin_data.customer_email' => 'nullable|email',
            'origin_data.customer_phone' => 'required|string',
            'origin_data.customer_address_detail' => 'nullable|string',
            'origin_data.customer_zip_code' => 'required|string|size:5',
            'origin_data.zone_code' => 'required|string',
            'origin_data.organization_id' => 'required|integer',
            'origin_data.location_id' => 'required|string',
            'destination_data.customer_name' => 'required|string',
            'destination_data.customer_address' => 'required|string',
            'destination_data.customer_email' => 'nullable|email',
            'destination_data.customer_phone' => 'required|string',
            'destination_data.customer_address_detail' => 'nullable|string',
            'destination_data.customer_zip_code' => 'required|string|size:5',
            'destination_data.zone_code' => 'required|string',
            'destination_data.organization_id' => 'required|integer',
            'destination_data.location_id' => 'required|string',
            'koli_data.*.koli_length' => 'nullable|integer',
            'koli_data.*.awb_url' => 'required|string',
            'koli_data.*.created_at' => 'required|date',
            'koli_data.*.koli_chargeable_weight' => 'required|integer',
            'koli_data.*.koli_width' => 'nullable|integer',
            'koli_data.*.koli_surcharge' => 'nullable',
            'koli_data.*.koli_height' => 'nullable|integer',
            'koli_data.*.updated_at' => 'required|date',
            'koli_data.*.koli_description' => 'required',
            'koli_data.*.koli_formula_id' => 'nullable',
            'koli_data.*.connote_id' => 'required|string|same:connote_id',
            'koli_data.*.koli_volume' => 'nullable|integer',
            'koli_data.*.koli_weight' => 'required|integer|min:0',
            'koli_data.*.koli_id' => 'required|string',
            'koli_data.*.koli_custom_field.awb_sicepat' => 'nullable|string',
            'koli_data.*.koli_custom_field.harga_barang' => 'nullable',
            'koli_data.*.koli_code' => 'required|string',
            'custom_field.catatan_tambahan' => 'nullable|string',
            'currentLocation.name' => 'required|string',
            'currentLocation.code' => 'required|string',
            'currentLocation.type' => 'required|string'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'The :attribute field is required.',
        ];
    }
}
