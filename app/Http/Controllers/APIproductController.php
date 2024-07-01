<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;

class APIproductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $productList = [
            'iphone' => Products::where('category_id', 1)->where('hidden', 1)->orderBy('views', 'desc')->limit(4)->get(),
            'ipad' => Products::where('category_id', 2)->where('hidden', 1)->orderBy('views', 'desc')->limit(4)->get(),
            'mac' => Products::where('category_id', 3)->where('hidden', 1)->orderBy('views', 'desc')->limit(4)->get(),
            'watch' => Products::where('category_id', 4)->where('hidden', 1)->orderBy('views', 'desc')->limit(4)->get(),
        ];
        $data = [
            'status' => true,
            'message' => 'Success',
            'data' => $productList
        ];
        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function testOrder()
    {
        $random = 'ĐH' . rand(0, 99999);

        $order = [
            "products" => [
                [
                    "name" => "bút",
                    "weight" => 0.1,
                    "quantity" => 1,
                    "product_code" => "23304A3MHLMVMXX625"
                ],
                [
                    "name" => "tẩy",
                    "weight" => 0.2,
                    "quantity" => 1,
                    "product_code" => "abc"
                ]
            ],
            "order" => [
                "id" => $random,
                "pick_name" => "HCM-nội thành",
                "pick_address" => "590 CMT8 P.11",
                "pick_province" => "TP. Hồ Chí Minh",
                "pick_district" => "Quận 3",
                "pick_ward" => "Phường 1",
                "pick_tel" => "0353605901",
                "tel" => "0911222333",
                "name" => "GHTK - HCM - Noi Thanh",
                "address" => "123 nguyễn chí thanh",
                "province" => "TP. Hồ Chí Minh",
                "district" => "Quận 1",
                "ward" => "Phường Bến Nghé",
                "hamlet" => "Khác",
                "is_freeship" => 1,
                "pick_date" => "2024-05-25",
                "pick_money" => 0,
                "value" => 3000000,
                "transport" => "fly",
                "pick_session" => 2,
                "tags" => [1]
            ]
        ];

        $jsonOrder = json_encode($order);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/order",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $jsonOrder,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Token: fb71dfceab53db26cb2406e24025261368caca75",
                "Content-Length: " . strlen($jsonOrder),
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return response()->json(json_decode($response));
    }

    public function testxt()
    {
        $curl = curl_init();
        $madon = 'SGP39-M31.1611072439';
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/v2/$madon",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPHEADER => array(
                "Token: fb71dfceab53db26cb2406e24025261368caca75",
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return response()->json(json_decode($response));
    }
}
