<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $level   = $session->get('level');

        if ($arguments) {
            $allowed = array_map('intval', $arguments);
            if (!in_array($level, $allowed)) {

                // Ambil halaman sebelumnya
                $previous = $_SERVER['HTTP_REFERER'] ?? base_url('/');

                // Redirect ke halaman access denied, bisa juga ke previous
                return redirect()->to(base_url('access-denied'));
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // tidak perlu untuk saat ini
    }
}
