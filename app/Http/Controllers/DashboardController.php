<?php

namespace CodeDelivery\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $titulo = "Área Administrativa";

        $subtitulo = "Página Principal";
        
        return view('admin.dashboard.index', compact('titulo', 'subtitulo'));
    }
}
