<?php

    /**
     * Iniciando a sessão
     */
    session_start();

    /**
     * Atualizando o id da sessão
     */
    session_regenerate_id(true);

    /**
     * Definindo a data local
     */
    date_default_timezone_set('America/Sao_Paulo');

    /**
     * Arquivo de autoload
     */
    require_once __DIR__ . '/../vendor/autoload.php';

    /**
     * Arquivo de configuração e conexão
     */
    require_once __DIR__ . '/../src/Bootstrap/Settings.php';

    /**
     * Arquivo de Rotas
     */
    require_once __DIR__ . '/../app/Routes/Route.php';