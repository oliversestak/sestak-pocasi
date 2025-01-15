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

    public function stanice()
    {
       $stanice = $this->station->findAll();
       $data["stanice"] = $stanice;
      //  echo view("stanice", $)

    }
}
