<?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return static function (RouteBuilder $routes) {
    $routes->setRouteClass(DashedRoute::class);

    // API routes
    $routes->prefix("api", function (RouteBuilder $builder) {

        $builder->setExtensions(["json", "xml"]);

        $builder->connect("/add-employee", ["controller" => "Employee", "action" => "addEmployee"]);

        $builder->connect("/list-employees", ["controller" => "Employee", "action" => "listEmployees"]);

        $builder->connect("/update-employee/{id}", ["controller" => "Employee", "action" => "updateEmployee"])->setPass(["id"]);

        $builder->connect("/delete-employee/{id}", ["controller" => "Employee", "action" => "deleteEmployee"])->setPass(["id"]);
    });
};
