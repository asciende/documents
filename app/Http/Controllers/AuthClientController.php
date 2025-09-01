<?php 

namespace App\Http\Controllers;

use App\Http\Resources\ClientResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class AuthClientController extends Controller
{
    public function login(Request $request): JsonResponse
    {
     
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $client = Client::where('email', $request->email)->first();

        if (! $client || ! Hash::check($request->password, $client->password)) {
            return response()->json(['message' => 'Credenciales inválidas'], 401);
        }

        $token = $client->createToken('client_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'client' => $client,
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Sesión de cliente cerrada.']);
    }

    public function profile(Request $request): JsonResponse
    {
         //dd($request);
    //     //$client = Client::find($request->user()->id());
    //     return response()->json(new ClientResource($request));
        //return response()->json($request->user());
        return response()->json(new ClientResource($request->user()));
    }
}
