<?php 

namespace App\Controllers\Page;
use App\Utils\View;

class Home extends Page {

    public static function getHome() {

        // View da Home
        $content = View::render('pages/home/', [
            "name" => 'Olá, Mundo'
        ]);

        return parent::getPage('Home - PMVC', $content);
    }
}