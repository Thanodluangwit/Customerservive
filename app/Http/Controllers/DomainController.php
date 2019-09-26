<?php

namespace App\Http\Controllers;

use App\{Domain,Country};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Alert;

class DomainController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function lnwdomain_MetaData ()
    {
        return array(
            'DisplayName' => 'LnwDomain Module for WHMCS',
            'APIVersion' => '1.3',
        );
    }

    function lnwdomain_api($params) {
        $url = "https://www.pathosting.co.th/whmcs/includes/api.php"; # URL to P&T API file

        $params["pat_email"]	= $params["E-mail"];
        $params["pat_api_key"]	= $params["API_Key"];
        $params["pat_password"]	= $params["Password"];
        unset($params["E-mail"]);
        unset($params["Password"]);
        unset($params["API Key"]);

        $params = array('params' => json_encode($params));

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 100);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        $data = curl_exec($ch);
        curl_close($ch);

        $results = json_decode($data, true);

        return $results;
    }

    function lnwdomain_getConfigArray() {
        $configarray = array(
            "E-mail"	=> array( "Type" => "text", "Size" => "40", "Description" => "Enter your P&T e-mail here", ),
            "API_Key"	=> array( "Type" => "text", "Size" => "40", "Description" => "Enter your P&T API KEY here", ),
            "Password"	=> array( "Type" => "password", "Size" => "40", "Description" => "Leave it blank, Recommend to use API KEY instead", ),
            "TestMode"	=> array( "Type" => "yesno", ),
        );
        return $configarray;
    }

    function lnwdomain_GetNameservers($params) {
        $params["action"] = "GetNameservers";
        $values = $this->lnwdomain_api($params);
        return $values;
    }

    function lnwdomain_SaveNameservers($params) {
        $params["action"] = "SaveNameservers";
        $values = $this->lnwdomain_api($params);
        return $values;
    }

    function lnwdomain_GetDNS ($params)
    {
        $params["action"] = "GetDNS";
        $values = $this->lnwdomain_api($params);
        return $values;
    }


    function lnwdomain_SaveDNS($params) {
        $params["action"] = "SaveDNS";
        $values = $this->lnwdomain_api($params);
        return $values;
    }

    function lnwdomain_GetContactDetails($params) {
        $params["action"] = "GetContactDetails";
        $values =  $this->lnwdomain_api($params);
        return $values;
    }

    function lnwdomain_SaveContactDetails($params) {
        $params["action"] = "SaveContactDetails";
        $values =  $this->lnwdomain_api($params);
        return $values;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domain = Domain::where('customet_id' , '=' , Auth::user()->id)->get();
        return view('client.domainthlist')->with(array('domain'=>$domain));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getdns($domain)
    {

        $params = array();
        $params['E-mail'] = env('PATHOST_EMAIL');
        $params['API_Key'] =  env('PATHOST_API_KEY');
        $params['Password'] =  env('PATHOST_PASSWORD');

        $domain_name = $domain;
        $exploded = explode('.', $domain_name);
        $params['sld'] = $exploded[0];
        $params['tld'] = implode('.', array_slice($exploded, 1));

       $getdns = $this->lnwdomain_GetNameservers($params);

       $ns1 = $getdns['ns1'];
       $ns2 = $getdns['ns2'];
       $ns3 = $getdns['ns3'];
       $ns4 = $getdns['ns4'];

        return view('client.changedns')->with(array('domain_name'=>$domain_name , 'ns1'=>$ns1, 'ns2'=>$ns2, 'ns3'=>$ns3, 'ns4'=>$ns4));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatedns(Request $request)
    {
        $params = array();
        $params['E-mail'] = env('PATHOST_EMAIL');
        $params['API_Key'] =  env('PATHOST_API_KEY');
        $params['Password'] =  env('PATHOST_PASSWORD');

        $domain_name = $request->input('domain');
        $exploded = explode('.', $domain_name);
        $params['sld'] = $exploded[0];
        $params['tld'] = implode('.', array_slice($exploded, 1));

        $params['ns1'] = $request->input('ns_1');
        $params['ns2'] = $request->input('ns_2');
        $params['ns3'] = $request->input('ns_3');
        $params['ns4'] = $request->input('ns_4');

        $savedns = $this->lnwdomain_SaveNameservers($params);
        if($savedns == 'ok'){
            alert()->success( __('messages.updatefinish') , __('messages.updatefinish'));
            return back();
        }

      //  return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function dnsrecord($domain)
    {
        $params = array();
        $params['E-mail'] = env('PATHOST_EMAIL');
        $params['API_Key'] =  env('PATHOST_API_KEY');
        $params['Password'] =  env('PATHOST_PASSWORD');

        $domain_name = $domain;
        $exploded = explode('.', $domain_name);
        $params['sld'] = $exploded[0];
        $params['tld'] = implode('.', array_slice($exploded, 1));



        $getdns = $this->lnwdomain_GetDNS($params);
        //dd($getdns);
        return view('client.dnsrecord')->with(array('getdns'=>$getdns, 'domain'=>$domain));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function domaincontact($domain)
    {
        $params = array();
        $params['E-mail'] = env('PATHOST_EMAIL');
        $params['API_Key'] =  env('PATHOST_API_KEY');
        $params['Password'] =  env('PATHOST_PASSWORD');

        $domain_name = $domain;
        $exploded = explode('.', $domain_name);
        $params['sld'] = $exploded[0];
        $params['tld'] = implode('.', array_slice($exploded, 1));

        $getcontact = $this->lnwdomain_GetContactDetails($params);
        $country = Country::all();
        return view('client.domaincontact')->with(array('getcontact'=>$getcontact,'domain'=>$domain,'country'=>$country));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function updatecontact(Request $request)
    {
        $params = array();
        $params['E-mail'] = env('PATHOST_EMAIL');
        $params['API_Key'] =  env('PATHOST_API_KEY');
        $params['Password'] =  env('PATHOST_PASSWORD');

        $domain_name = $request->input('domain');
        $exploded = explode('.', $domain_name);
        $params['sld'] = $exploded[0];
        $params['tld'] = implode('.', array_slice($exploded, 1));

        $params['contact_person'] = $request->input('contact_person');
        $params['company_street_addr'] = $request->input('company_street_addr');
        $params['company_zip_code'] = $request->input('company_zip_code');
        $params['company_phone'] = $request->input('company_phone');
        $params['company_fax'] = $request->input('company_fax');
        $params['company_country_code'] = $request->input('company_country_code');
        $params['contact_email'] = $request->input('contact_email');

        $savedns = $this->lnwdomain_SaveContactDetails($params);
        dd($savedns);
     //   if($savedns == 'ok'){
        //    alert()->success( __('messages.updatefinish') , __('messages.updatefinish'));
     //       return back();
     //   }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domain $domain)
    {
        //
    }
}
