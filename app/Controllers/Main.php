<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bundesland;
use App\Models\Data;
use App\Models\Station;
use CodeIgniter\HTTP\ResponseInterface;

class Main extends BaseController
{
    var $boundesLand;
    var $data;
    var $station;

    public function __construct(){       //konstruktor
        $this->boundesLand = new Bundesland();
        $this->data = new Data();
        $this->station = new Station();
    }

    

    public function index()
    {
        echo view("index");
    }

    public function tabulka()
    {
        $zeme = $this->boundesLand->findAll();
        $data["zeme"] = $zeme;
        echo view("tabulka", $data);
    }

    public function stranka($idZeme)
    {
        $nazev = $this->boundesLand->find($idZeme);
        $data["nazev"] = $nazev;
        $stanice = $this->station->where("bundesland", $idZeme)->findAll();
        $data["stanice"] = $stanice;
        //var_dump($stanice);

        
     echo view("stranka", $data);
    }

    public function stanice($station_id)
    {
       $stanice = $this->station->find($station_id);
       $data["stanice"] = $stanice;
       $tabulka = $this->data->where("Stations_ID",$station_id)->orderBy("date", "asc")->findAll();
       $data["tabulka"] = $tabulka;
       $obrazky["cesta"] = $this->boundesLand->findAll();
       $data["obrazky"] = $obrazky;
      


       echo view("stanice", $data);
    }

    public function allCountries() {
        $karta = $this->boundesLand->join("station", "bundesland.id=station.bundesland", "inner")->orderBy("place", "asc")->findAll();       //nacitani dat ze dvou tabulek
        $data["karta"] = $karta;

        //var_dump($karta);
        echo view("karta", $data);
    }



    //Dodelavka ve 4. rocniku
    public function new()
    {
        return view('station_form', ['station' => null]);
    }

    public function create()
    {
        $data = [
            'bundesland' => $this->request->getPost('bundesland'),
            'place'      => $this->request->getPost('place'),
        ];

        $this->station->insert($data);

        return redirect()->to('/tabulka')->with('success', 'Stanice vytvořena.');
    }

    public function edit($id)
    {
        $station = $this->station->find($id);

        return view('station_form', ['station' => $station]);
    }

    public function update($id)
    {
        $data = [
            'bundesland' => $this->request->getPost('bundesland'),
            'place'      => $this->request->getPost('place'),
        ];

        $this->station->update($id, $data);

        return redirect()->to('/tabulka')->with('success', 'Stanice upravena.');
    }

    public function delete($id)
    {
        $this->station->delete($id);

        return redirect()->to('/tabulka')->with('success', 'Stanice smazána.');
    }

    public function editData($id)
    {
        $row = $this->data->find($id);

        if (! $row) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Záznam nebyl nalezen.');
        }

        return view('data_form', ['row' => $row]);
    }

    public function updateData($id)
    {
        $data = [
            'Stations_ID'       => (int) $this->request->getPost('Stations_ID'),
            'date'              => $this->request->getPost('date'),
            'humidity'          => $this->request->getPost('humidity'),
            'sun_length'        => $this->request->getPost('sun_length'),
            'mid_air_pressure'  => $this->request->getPost('mid_air_pressure'),
            'max_wind'          => $this->request->getPost('max_wind'),
        ];

        $this->data->update($id, $data);

        return redirect()->to('/stanice/' . $data['Stations_ID'])->with('success', 'Záznam byl upraven.');
    }

    public function deleteData($id)
    {
        $row = $this->data->find($id);

        if ($row) {
            $stationId = $row->Stations_ID;
            $this->data->delete($id);

            return redirect()->to('/stanice/' . $stationId)->with('success', 'Záznam byl smazán.');
        }

        return redirect()->to('/tabulka')->with('success', 'Záznam byl smazán.');
    }

    public function newData($stationId)
    {
        $station = $this->station->find($stationId);

        if (! $station) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Stanice nebyla nalezena.');
        }

        return view('data_form', [
            'row' => (object) [
                'Stations_ID' => $stationId,
                'date' => date('Y-m-d'),
                'humidity' => null,
                'sun_length' => null,
                'mid_air_pressure' => null,
                'max_wind' => null,
            ],
            'isCreate' => true,
        ]);
    }

    public function createData()
    {
        $data = [
            'Stations_ID'      => (int) $this->request->getPost('Stations_ID'),
            'date'             => $this->request->getPost('date'),
            'quality'          => $this->request->getPost('quality'),
            'min_5cm'          => $this->request->getPost('min_5cm'),
            'min_2m'           => $this->request->getPost('min_2m'),
            'mid_2m'           => $this->request->getPost('mid_2m'),
            'max_2m'           => $this->request->getPost('max_2m'),
            'humidity'         => $this->request->getPost('humidity'),
            'mid_wind'         => $this->request->getPost('mid_wind'),
            'max_wind'         => $this->request->getPost('max_wind'),
            'sun_length'       => $this->request->getPost('sun_length'),
            'mid_cloud'        => $this->request->getPost('mid_cloud'),
            'precipitation'    => $this->request->getPost('precipitation'),
            'mid_air_pressure' => $this->request->getPost('mid_air_pressure'),
        ];

        $this->data->insert($data);

        return redirect()->to('/stanice/' . $data['Stations_ID'])->with('success', 'Záznam byl vytvořen.');
    }
}
