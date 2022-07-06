<?php
include_once ('Main.php');

class Functions{
    private $AUTH_ID = "2946C572-982B-4353-B5A6-1F99A33A7551";
    private $AUTH_PWD = "w@84!LnfJsmS";

    public function get_deep_link(){
        $main = new Main();
        $url = "https://api.aerocrs.com/v5/getDeepLink?from=WIL&to=MBA&start=2022%2F08%2F10&end=2022%2F08%2F14&adults=1&child=0&infant=0";

        $curl = curl_init($url);
        $main->init_get_curl($curl,$url);
        $headers = array(
            "Accept: application/json",
            "auth_id: $this->AUTH_ID",
            "auth_password: $this->AUTH_PWD",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
        $main->debug_curl($curl);
        $main->display_results($curl);
    }

    public function get_flight($trip_type, $from, $to, $flight_id,$fare_id, $flight_id2,$fare_id2){
        $main = new Main();
        $url = "https://api.aerocrs.com/v5/getFlight";

        $curl = curl_init($url);
        $main->init_post_curl($curl,$url);
        $headers = array(
            "Accept: application/json",
            "Content-Type: application/json",
            "auth_id: $this->AUTH_ID",
            "auth_password: $this->AUTH_PWD",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $data = <<<DATA

{
     "aerocrs": {
          "parms": {
               "triptype": "$trip_type",
               "fromcode": "$from",
               "tocode": "$to",
               "adults": 2,
               "child": 2,
               "infant": 1,
               "flightid1": $flight_id,
               "fareid1": $fare_id,
               "flightid2": $flight_id2,
               "fareid2": $fare_id2
        
          }
     }
}

DATA;

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
        $main->debug_curl($curl);

        $main->display_results($curl);

    }

    public function create_booking($trip_type, $from, $to, $flight_id,$fare_id, $flight_id2,$fare_id2){
        $url = "https://api.aerocrs.com/v5/createBooking";
        $main = new Main();

        $curl = curl_init($url);
        $main->init_post_curl($curl,$url);

        $headers = array(
            "Accept: application/json",
            "Content-Type: application/json",
            "auth_id: $this->AUTH_ID",
            "auth_password: $this->AUTH_PWD",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $data = <<<DATA

{
     "aerocrs": {
          "parms": {
               "triptype": "$trip_type",
               "adults": 1,
               "child": 0,
               "infant": 0,
               "bookflight": [
                    {
                         "fromcode": "$from",
                         "tocode": "$to",
                         "flightid": $flight_id,
                         "fareid": $fare_id
                    },
                    {
                         "fromcode": "$to",
                         "tocode": "$from",
                         "flightid": $flight_id2,
                         "fareid": $fare_id2
                    }
               ]
          }
     }
}

DATA;

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
        $main->debug_curl($curl);

        $main->display_results($curl);


    }
    public function confirm_booking($booking_id){

        $main = new Main();
        $url = "https://api.aerocrs.com/v5/confirmBooking";

        $curl = curl_init($url);
        $main->init_post_curl($curl, $url);


        $headers = array(
            "Accept: application/json",
            "Content-Type: application/json",
            "auth_id: $this->AUTH_ID",
            "auth_password: $this->AUTH_PWD",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $data = <<<DATA

{
     "aerocrs": {
          "parms": {
               "bookingid": $booking_id,
               "agentconfirmation": "apiconnector",
               "confirmationemail": "test@test.com",
               "passenger": [
                    {
                         "paxtitle": "Mr.",
                         "firstname": "Brian",
                         "lastname": "Barasa",
                         "paxage": null,
                         "paxnationailty": "KE",
                         "paxdoctype": "PP",
                         "paxdocnumber": "9919239123",
                         "paxdocissuer": "KE",
                         "paxdocexpiry": "2022/12/31",
                         "paxbirthdate": "2000/09/03",
                         "paxphone": "939383838383",
                         "paxemail": "info@aerocrs.com"
                    }
               ]
          }
     }
}

DATA;

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
        $main->debug_curl($curl);

        $main->display_results($curl);


    }

    public function ticket_booking($booking_id){
        $main = New Main();

        $url = "https://api.aerocrs.com/v5/ticketBooking";

        $curl = curl_init($url);
        $main->init_post_curl($curl, $url);

        $headers = array(
            "Accept: application/json",
            "Content-Type: application/json",
            "auth_id: $this->AUTH_ID",
            "auth_password: $this->AUTH_PWD",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $data = <<<DATA

{
     "aerocrs": {
          "parms": {
               "bookingid": $booking_id
          }
     }
}

DATA;

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
        $main->debug_curl($curl);

        $main->display_results($curl);

    }
}
