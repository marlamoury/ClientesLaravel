<?php
// routes/api.php
use App\Http\Controllers\ClienteController;

Route::apiResource('clientes', ClienteController::class);
