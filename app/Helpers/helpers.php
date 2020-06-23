<?php

use Illuminate\Support\Facades\Auth;

function getRoles() {
    return app(\App\Services\General\RoleService::class)->all();
}

function getAuthUser() {
    return Auth::user();
}
