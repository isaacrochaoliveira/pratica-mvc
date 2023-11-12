<?php 

namespace App\Controllers\Page;

class Page {
    /**
     * Método Responsável por verificar a view
     * @param string $view
     * @return string
     */
    public static function getContentView($view) {
        $content = file_get_contents("../../resouces/Viw". $view .".html");

        return $content;
    }

    /**
     * Método Responsável por renderizar a view
     * @param string $view
     * @param array $data
     * @return string
     */
    public static function render($view, $data = []) {
        $content = self::getContentView($view);

        return $content;
    }

}