<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class package_update_request extends FormRequest
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
        $method = $this->method();

        if ($method == 'PUT') {
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
        } else if ($method == 'PATCH') {
            return [
                'transaction_id' => 'sometimes|required|string',
                'customer_name' => 'sometimes|required|string',
                'customer_code' => 'sometimes|required|string',
                'transaction_amount' => 'sometimes|required|string',
                'transaction_discount' => 'sometimes|required|string',
                'transaction_additional_field' => 'sometimes|nullable|string',
                'transaction_payment_type' => 'sometimes|required|string',
                'transaction_state' => 'sometimes|required|string',
                'transaction_code' => 'sometimes|required|string',
                'transaction_order' => 'sometimes|required|integer|min:1',
                'location_id' => 'sometimes|required|string',
                'organization_id' => 'sometimes|required|integer',
                'created_at' => 'sometimes|required|date',
                'updated_at' => 'sometimes|required|date',
                'transaction_payment_type_name' => 'sometimes|required|string',
                'transaction_cash_amount' => 'sometimes|required|integer',
                'transaction_cash_change' => 'sometimes|required|integer',
                'customer_attribute.Nama_Sales' => 'sometimes|required|string',
                'customer_attribute.TOP' => 'sometimes|required|string',
                'customer_attribute.Jenis_Pelanggan' => 'sometimes|required|string',
                'connote.connote_id' => 'sometimes|required|string|same:connote_id',
                'connote.connote_number' => 'sometimes|required|integer',
                'connote.connote_service' => 'sometimes|required|string',
                'connote.connote_service_price' => 'sometimes|required|integer',
                'connote.connote_amount' => 'sometimes|required|integer',
                'connote.connote_code' => 'sometimes|required|string',
                'connote.connote_booking_code' => 'sometimes|nullable|string',
                'connote.connote_order' => 'sometimes|required|integer',
                'connote.connote_state' => 'sometimes|required|string',
                'connote.connote_state_id' => 'sometimes|required|integer',
                'connote.zone_code_from' => 'sometimes|required|string|same:origin_data.zone_code',
                'connote.zone_code_to' => 'sometimes|required|string|same:destination_data.zone_code',
                'connote.surcharge_amount' => 'sometimes|nullable',
                'connote.transaction_id' => 'sometimes|required|string',
                'connote.actual_weight' => 'sometimes|required|integer|min:0',
                'connote.volume_weight' => 'sometimes|required|integer|min:0',
                'connote.chargeable_weight' => 'sometimes|required|integer|min:0',
                'connote.created_at' => 'sometimes|required|date',
                'connote.updated_at' => 'sometimes|required|date',
                'connote.organization_id' => 'sometimes|required|integer',
                'connote.location_id' => 'sometimes|required|string|same:location_id',
                'connote.connote_total_package' => 'sometimes|required|string',
                'connote.connote_surcharge_amount' => 'sometimes|required|string',
                'connote.connote_sla_day' => 'sometimes|required|string',
                'connote.location_name' => 'sometimes|required|string',
                'connote.location_type' => 'sometimes|required|string',
                'connote.source_tariff_db' => 'sometimes|required|string',
                'connote.id_source_tariff' => 'sometimes|required|string',
                'connote.pod' => 'sometimes|nullable',
                'connote.history' => 'sometimes|nullable',
                'connote_id' => 'sometimes|required|string',
                'origin_data.customer_name' => 'sometimes|required|string',
                'origin_data.customer_address' => 'sometimes|required|string',
                'origin_data.customer_email' => 'sometimes|nullable|email',
                'origin_data.customer_phone' => 'sometimes|required|string',
                'origin_data.customer_address_detail' => 'sometimes|nullable|string',
                'origin_data.customer_zip_code' => 'sometimes|required|string|size:5',
                'origin_data.zone_code' => 'sometimes|required|string',
                'origin_data.organization_id' => 'sometimes|required|integer',
                'origin_data.location_id' => 'sometimes|required|string',
                'destination_data.customer_name' => 'sometimes|required|string',
                'destination_data.customer_address' => 'sometimes|required|string',
                'destination_data.customer_email' => 'sometimes|nullable|email',
                'destination_data.customer_phone' => 'sometimes|required|string',
                'destination_data.customer_address_detail' => 'sometimes|nullable|string',
                'destination_data.customer_zip_code' => 'sometimes|required|string|size:5',
                'destination_data.zone_code' => 'sometimes|required|string',
                'destination_data.organization_id' => 'sometimes|required|integer',
                'destination_data.location_id' => 'sometimes|required|string',
                'koli_data.*.koli_length' => 'sometimes|nullable|integer',
                'koli_data.*.awb_url' => 'sometimes|required|string',
                'koli_data.*.created_at' => 'sometimes|required|date',
                'koli_data.*.koli_chargeable_weight' => 'sometimes|required|integer',
                'koli_data.*.koli_width' => 'sometimes|nullable|integer',
                'koli_data.*.koli_surcharge' => 'sometimes|nullable',
                'koli_data.*.koli_height' => 'sometimes|nullable|integer',
                'koli_data.*.updated_at' => 'sometimes|required|date',
                'koli_data.*.koli_description' => 'sometimes|required',
                'koli_data.*.koli_formula_id' => 'sometimes|nullable',
                'koli_data.*.connote_id' => 'sometimes|required|string|same:connote_id',
                'koli_data.*.koli_volume' => 'sometimes|nullable|integer',
                'koli_data.*.koli_weight' => 'sometimes|required|integer|min:0',
                'koli_data.*.koli_id' => 'sometimes|required|string',
                'koli_data.*.koli_custom_field.awb_sicepat' => 'sometimes|nullable|string',
                'koli_data.*.koli_custom_field.harga_barang' => 'sometimes|nullable',
                'koli_data.*.koli_code' => 'sometimes|required|string',
                'custom_field.catatan_tambahan' => 'sometimes|nullable|string',
                'currentLocation.name' => 'sometimes|required|string',
                'currentLocation.code' => 'sometimes|required|string',
                'currentLocation.type' => 'sometimes|required|string'
            ];
        }
        
    }
}