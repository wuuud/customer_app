<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Request;
use App\Http\Requests\CustomerRequest;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index')->with(compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $method = 'GET';
        $zipcode = $request->postcode;
        $url = config('customer.url') . '/api/search?zipcode=' . $zipcode;
        $client = new Client();
        try {
             // データを取得し、JSON形式からPHPの変数に変換
            $response = $client->request($method, $url);
            $body = $response->getBody();
            $zipcloud = json_decode($body, false);
            $results = $zipcloud->results[0];
            // (都道府県名、市区町村名、町域名)を取得
            $address = $results->address1 . $results->address2 . $results->address3;
            $postcode = $results->zipcode;
            return view('customers.create')->with(compact('address', 'postcode'));
        } catch (\Throwable $th) {
            return back()->withErrors(['error' => '郵便番号が正しくありません！']);
            // returnしているので、下記のコードは不要
            // $address = null;
            // $postcode = null;
        }
        
    }

    public function check()
    {
        return view('customers.check');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {

        $customer = new Customer();

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->postcode = $request->postcode;
        $customer->address = $request->address;
        $customer->tel = $request->tel;

        $customer->save();

        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customers.show')->with(compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit')->with(compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->postcode = $request->postcode;
        $customer->address = $request->address;
        $customer->tel = $request->tel;

        $customer->save();

        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index');
    }
}
