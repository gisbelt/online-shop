<?php

namespace content\component;

class headElement{

    static public function Heading(){
        echo (
            ' <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="author" content="Grupo 2">
            <meta name="description" content="Proyecto Uptaeb">

            <!-- Bootstrap CSS v5.0.2 -->
            <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
            <link rel="stylesheet" href="asset/fonts/bootstrap-icons.css">
            <link rel="stylesheet" href="asset/css/app.css">
            <link rel="stylesheet" href="asset/css/error.css">
            <link rel="stylesheet" href="asset/css/bootstrap-minty.min.css">
            <!-- Add the slick-theme.css if you want default styling -->
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
            <!-- Add the slick-theme.css if you want default styling -->
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
            '
        );
    }
}

?>