<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResellerclubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function apikey(){
        $api_key = env('RESELLERCLUB_APIKEY');
        return $api_key;
    }
    public function userid(){
        $partnerid = env('RESELLERCLUB_USERID');
        return $partnerid;
    }
    public function index()
    {
        return view('client.globaldomain');
    }
    public function check(Request $request){
        $domain = $request->input('domain');
        $tlds = $request->input('tlds');
        $fulldomain = $domain.'.'.$tlds;

        $url = 'https://httpapi.com/api/domains/available.json?auth-userid='.$this->userid().'&api-key='.$this->apikey().'&domain-name='.$domain.'&tlds='.$tlds;



        //if ($data) $url = sprintf("%s?%s", $url, http_build_query($data));

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $apidata = curl_exec($curl);

        $apidata_json = json_decode($apidata, TRUE);
       return view('client.globaldomain')->with(array('apidata_json'=>$apidata_json , 'domain'=>$domain ,'fulldomain'=>$fulldomain ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
