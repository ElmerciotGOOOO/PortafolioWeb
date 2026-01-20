<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class FirebaseConfigController extends Controller
{
    /**
     * Serve Firebase configuration from environment variables.
     * This keeps credentials out of the public JavaScript code.
     */
    public function getConfig(): JsonResponse
    {
        return response()->json([
            'apiKey' => env('FIREBASE_API_KEY'),
            'authDomain' => env('FIREBASE_AUTH_DOMAIN'),
            'databaseURL' => env('FIREBASE_DATABASE_URL', 'https://' . env('FIREBASE_PROJECT_ID') . '-default-rtdb.firebaseio.com'),
            'projectId' => env('FIREBASE_PROJECT_ID'),
            'storageBucket' => env('FIREBASE_STORAGE_BUCKET'),
            'messagingSenderId' => env('FIREBASE_MESSAGING_SENDER_ID'),
            'appId' => env('FIREBASE_APP_ID'),
            'adminEmail' => env('FIREBASE_ADMIN_EMAIL'),
        ]);
    }
}
