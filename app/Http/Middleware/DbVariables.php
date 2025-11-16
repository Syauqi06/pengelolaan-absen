<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class DbVariables
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Koneksi ke database
        if(DB::connection()->getPdo()){ // Pastikan koneksi database berhasil, PDO tidak null
            $userId = Auth::check() ? Auth::id() : 0; // Gunakan 0 jika tidak ada user yang terautentikasi atau null
            $ipAddress = $request->ip() ?: '127.0.0.1'; // Gunakan IP default jika tidak tersedia
            $userAgent = $request->userAgent() ?: 'Artisan Console/Undefined'; // Gunakan User-Agent default jika tidak tersedia

            // Set variabel log_user_id, log_ip_address, dan log_user_agent
            DB::statement("SET @log_user_id = ?", [$userId]); // Gunakan prepared statement untuk menghindari SQL injection
            DB::statement("SET @log_ip_address = ?", [$ipAddress]);
            DB::statement("SET @log_user_agent = ?", [$userAgent]);
        }

        return $next($request);
    }
}
