<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandsController extends Controller
{
    private $bands;

    public function __construct()
    {
        $this->bands = [
            [
                'id'=> 1,
                'name' => 'CPM 22',
                'gender' => 'Rock'
            ],
            [
                'id' => 2,
                'name' => 'Charlie Brown Jr',
                'gender' => 'Rock'
            ],
            [
                'id' => 3,
                'name' => 'Marcelo D2',
                'gender' => 'MPB'
            ]
        ];

    }

    public function getBands(): array
    { 
        return $this->bands;
    }

    public function setBand($band)
    { 
        $this->bands[] = $band;
    }

    public function getBandById($id): array
    {
        if (!is_numeric($id)) {
            return [];
        }

        foreach ($this->bands as $key => $value) {
            if($value['id'] == $id) {
                return $value;
            }
        }

        return [];
    }

    public function store(Request $request):array
    {
        $validate = $request->validate([
            'id'=> 'numeric',
            'name' => 'required|min:3'
        ]);

        if($validate) {

            $band = $request->all();

            $this->setBand($band);

            return $this->bands;

        }

        return [];
    }

    public function delete($id):array
    {
        if(!is_numeric($id)){
            return [];
        }

        foreach($this->bands as $key => $band) {
            if($band['id']  == $id) {
                unset($this->bands[$key]);
                return $this->bands;
            }
        }

        return [];
    }
}
