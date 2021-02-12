<?php
$stores = file_get_contents("https://fakestoreapi.com/products?limit=6");
$item = json_decode($stores,true);
