<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\package;
use App\Helpers\api_formatter;
use App\Http\Requests\package_store_request;
use App\Http\Requests\package_update_request;
use Exception;

class PackageController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/package",
     *      operationId="getPackage",
     *      summary="Get package record",
     *      @OA\Response(response=200, description="OK"),
     *      @OA\Response(response=400, description="Data not found")
     * )
     */
    public function index() {
        $package = package::all();

        if($package) return api_formatter::create_api(200, 'Succsess', $package);
        else return api_formatter::create_api(400, 'Data not found');
    }

    /**
     * @OA\Get(
     *      path="/api/package/",
     *      operationId="getPackagebyId",
     *      summary="Get package record by ID",
     *      @OA\Parameter(name="transaction_id", in="path", @OA\Schema(type="string")),
     *      @OA\Response(response=200, description="OK"),
     *      @OA\Response(response=400, description="Data not found")
     * )
     */
    public function show($transaction_id) {
        $package = package::where('transaction_id', $transaction_id)->get();

        if ($package) return api_formatter::create_api(200, 'Success', $package);
        else return api_formatter::create_api(400, 'Data not found');
    }

    /**
     * @OA\Post(
     *      path="/api/package",
     *      operationId="createPackage",
     *      summary="Create new package record",
     *      @OA\Parameter(name="data", in="path", @OA\Schema(type="json")),
     *      @OA\Response(response=200, description="OK"),
     *      @OA\Response(response=400, description="Data not saved")
     * )
     */
    public function store(package_store_request $request) {
        try {
            $package = new package;

            $package->transaction_id = $request->transaction_id;
            $package->customer_name = $request->customer_name;
            $package->customer_code = $request->customer_code;
            $package->transaction_amount = $request->transaction_amount;
            $package->transaction_discount = $request->transaction_discount;
            $package->transaction_additional_field = $request->transaction_additional_field;
            $package->transaction_payment_type = $request->transaction_payment_type;
            $package->transaction_state = $request->transaction_state;
            $package->transaction_code = $request->transaction_code;
            $package->transaction_order = $request->transaction_order;
            $package->location_id = $request->location_id;
            $package->organization_id = $request->organization_id;
            $package->created_at = $request->created_at;
            $package->updated_at = $request->updated_at;
            $package->transaction_payment_type_name = $request->transaction_payment_type_name;
            $package->transaction_cash_amount = $request->transaction_cash_amount;
            $package->transaction_cash_change = $request->transaction_cash_change;
            $package->customer_attribute = $request->customer_attribute;
            $package->connote = $request->connote;
            $package->connote_id = $request->connote_id;
            $package->origin_data = $request->origin_data;
            $package->destination_data = $request->destination_data;
            $package->koli_data = $request->koli_data;
            $package->custom_field = $request->custom_field;
            $package->currentLocation = $request->currentLocation;

            $package->save();

            // show the inserted data
            $new_package = package::find($package->id);

            if ($new_package) return api_formatter::create_api(200, 'Success', $new_package);
            else return api_formatter::create_api(400, 'Data not inserted');

        } catch (Exception $error) {
            return api_formatter::create_api(400, 'Failed '.$error);
        }
    }

    /**
     * @OA\Put(
     *      path="/api/package",
     *      operationId="updatePackage",
     *      summary="Update all data from a record",
     *      @OA\Parameter(name="transaction_id", in="path", @OA\Schema(type="string")),
     *      @OA\Parameter(name="data", in="path", @OA\Schema(type="json")),
     *      @OA\Response(response=200, description="OK"),
     *      @OA\Response(response=400, description="Data not saved")
     * )
     */
    /**
     * @OA\Patch(
     *      path="/api/package",
     *      operationId="updatePackage",
     *      summary="Update partial or all data from a record",
     *      @OA\Parameter(name="transaction_id", in="path", @OA\Schema(type="string")),
     *      @OA\Parameter(name="data", in="path", @OA\Schema(type="json")),
     *      @OA\Response(response=200, description="OK"),
     *      @OA\Response(response=400, description="Data not saved")
     * )
     */
    public function update(package_update_request $request, string $transaction_id) {
        try {
            $package = package::where('transaction_id', $transaction_id);

            if ($package->get()->isEmpty()) return api_formatter::create_api(400, 'No data found');

            $update = $package->update($request->all());

            // show the updated data
            $updated_package = package::where('transaction_id', $transaction_id)->get();

            if ($updated_package) return api_formatter::create_api(200, 'Success', $updated_package);
            else return api_formatter::create_api(400, 'Data not updated');

        } catch (Exception $error) {
            return api_formatter::create_api(400, 'Failed');
        }
    }

    /**
     * @OA\Delete(
     *      path="/api/package",
     *      operationId="deletePackage",
     *      summary="Delete a record",
     *      @OA\Parameter(name="transaction_id", in="path", @OA\Schema(type="string")),
     *      @OA\Response(response=200, description="OK"),
     *      @OA\Response(response=400, description="Data not saved")
     * )
     */
    public function destroy($transaction_id) {
        $package = package::where('transaction_id', $transaction_id);

        if ($package->get()->isEmpty()) return api_formatter::create_api(400, 'No data found');

        $deleted_package = $package->delete();

        if ($deleted_package) return api_formatter::create_api(200, 'Success');
        else return api_formatter::create_api(400, 'Failed to delete data');
    }
}
