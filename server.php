<?php
use Swoole\WebSocket\Server;
use Swoole\Http\Request;
use Swoole\WebSocket\Frame;

// if you have some php functions to declare do it here


$server = new Server("127.0.0.1", 9502);
$server->on("Start", function (Server $server) {
    echo "Swoole WebSocket Server START\n";
});
$server->on('Open', function (Server $server, $request) {
    echo "connection open: {$request->fd}\n";
$server->tick(1000, function () use ($server, $request) {
    
// db connect
        $dbserver = "server";
        $dbuser = "user";
        $dbpass = "password";
        $dbname = "db name";

// connection
        $con = new mysqli($dbserver, $dbuser, $dbpass, $dbname);
// Check connection
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        
// do query here - query result -> 
        $server->push($request->fd, $queryResult);
    });
});

$server->on('Close', function (Server $server, int $fd) {
    echo "connection close: {$fd}\n";
});

$server->on('Disconnect', function (Server $server, int $fd) {
    echo "connection disconnect: {$fd}\n";
});

$server->start();
