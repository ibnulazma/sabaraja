<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\ModelMaintenance;

class Maintenance implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $settingsModel = new ModelMaintenance();
        $maintenance = $settingsModel->getMaintenance();

        $isMaintenance = $maintenance['value'] == '1';
        $isAdmin = session()->get('level') == '1';

        if ($isMaintenance && !$isAdmin) {
            echo view('maintenance');
            exit;
        }
    }




    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // kosong
    }
}
