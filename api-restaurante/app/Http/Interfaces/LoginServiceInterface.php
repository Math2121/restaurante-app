<?php


namespace App\Http\Interfaces;

use App\Models\User;

interface LoginServiceInterface
{
	public function geraToken();
}
