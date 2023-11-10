<?php 

namespace App\Utils;

class View {
    /**
     * Variáveis padrões da View
     * @var array 
     */
    private static $vars;

    /**
     * Método Responsável por definir os dados iniciais da class
     * @param array $vars
     */
    public static function init($vars = []) {
        self::$vars = $vars;
    } 

    /**
     * Método Responsável por retornar o conteúdo de uma view
     * @param string $view
     * @return string
     */
    public static function getContentView($view) {
        // Vai ap encontro do Arquivo da View
        $file = __DIR__."/../../resorces/view/".$view.".html";

        return file_exists($file) ? file_get_contents($file) : "";
    }

    /**
     * Método Responsável por retornar o conteúdo renderizado da view
     * @param string $view
     * @param array $data
     * @return string
     */
    public static function render($view, $data = []) {
        // Conteúdo da View
        $contentView = self::getContentView($view);

        //Merge de variáveis da View
        $data = array_merge(self::$vars, $data);

        //Encontra as chaves dos arrays
        $keys = array_keys($data);
        $keys = array_map(function($item) {
            return '{{'.$item.'}}';
        }, $keys);

        return str_replace($keys, array_values($data), $contentView);
    }
}