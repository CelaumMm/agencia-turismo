<?php

$this->group(['prefix' => 'panel', 'namespace' => 'Panel'], function(){
    
    $this->post('brands/search', 'BrandController@search')->name('brands.search');

    $this->resource('brands', 'BrandController');
    
    $this->get('/', 'PanelController@index')->name('panel');

});


$this->group(['namespace' => 'Site'], function(){

    $this->get('promocoes', 'SiteController@promotions')->name('promotions');
    $this->get('/', 'SiteController@index');

});


Auth::routes();