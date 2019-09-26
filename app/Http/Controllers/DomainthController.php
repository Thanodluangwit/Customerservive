<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DomainthController extends Controller
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

    public function index()
    {
        return view('client.domainthch');
    }

   public function checkdomain(Request $request){
        $domain = $request->input('domain');
       $url = "https://www.thnic.co.th/domain_avail_api.php";
           $url .= "?domain=".$domain;


       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_HEADER, 0);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
       curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);


           curl_setopt($ch, CURLOPT_POST, true);
           curl_setopt($ch, CURLOPT_POSTFIELDS, "domain=".$_POST["domain"]);


       /* $returndata[0] = 0 or 1
        * return 0 (false) is domainname is not available
        * return 1 (true) is domainname is available
        * */
       $returndata = curl_exec($ch);
       curl_close($ch);

       /* you can echo data by this command */
     //  dd($returndata);
       return view('client.domainthch')->with(array('returndata'=>$returndata , 'domain'=>$domain));
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
    function lnwdomain_GetContactDetails($params) {
        $params["action"] = "GetContactDetails";
        $values = $this->lnwdomain_api($params);
        return $values;
    }

    function lnwdomain_SaveContactDetails($params) {
        $params["action"] = "SaveContactDetails";
        $values = $this->lnwdomain_api($params);
        return $values;
    }

    public function getdnsrecord(){

        $params = array();
        $params['E-mail'] = env('PATHOST_EMAIL');
        $params['API_Key'] =  env('PATHOST_API_KEY');
        $params['Password'] =  env('PATHOST_PASSWORD');

        $domain_name = 'tsms.in.th';

        $exploded = explode('.', $domain_name);
        $params['sld'] = $exploded[0];
        $params['tld'] = implode('.', array_slice($exploded, 1));




        dd($this->lnwdomain_GetContactDetails($params));

    }
}
