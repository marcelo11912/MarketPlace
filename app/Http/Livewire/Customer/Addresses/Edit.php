<?php

namespace App\Http\Livewire\Customer\Addresses;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Edit extends Component
{
    public $data,$token,$countries, $town_city;
    public  $states,$state, $cities,$country_region;
    public function mount($data)
    {
        $this->data = $data;
        $response = Http::withHeaders([
            "Accept" => "application/json",
            "api-token" => "oVeDpCw2mkc9p2QRQl_BE6wQjJHJBGDqVaSqeSqGT1ZTILGHu6rl_CTXAgMgXL5MUk8",
            "user-email" => "marcelo15052000@gmail.com"
        ])->get('https://www.universal-tutorial.com/api/getaccesstoken');

        $this->token = $response->json('auth_token');

        $countries = Http::withHeaders([
            "Authorization" => "Bearer " . $this->token,
            "Accept" => "application/json"
        ])->get('https://www.universal-tutorial.com/api/countries/');
        $this->countries = $countries->json();

        $this->states = [];
        $this->cities = [];
        
    }


    public function render()
    {
        return view('livewire.customer.addresses.edit');
    }

    public function getStates()
    {
        $states = Http::withHeaders([
            "Authorization" => "Bearer " . $this->token,
            "Accept" => "application/json"
        ])->get('https://www.universal-tutorial.com/api/states/' . $this->country_region);
     
        $this->states = $states->json();
 
    }
   

    public function getCities()
    {
        $cities = Http::withHeaders([
            "Authorization" => "Bearer " . $this->token,
            "Accept" => "application/json"
        ])->get('https://www.universal-tutorial.com/api/cities/' . $this->state);
        $this->cities = $cities->json();
       
    }
}
