<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Corral;
use App\Http\Requests\StoreCorralRequest;

class CorralController extends Controller
{
    /**
     * Crear un nuevo corral
     */
    public function createCorral(StoreCorralRequest $request)
    {
        $corral = new Corral();
        $corral->name = $request->name;
        $corral->capacity = $request->capacity;
        $corral->save();

        return response()->json([
            'corral' => $corral
        ], 200);
    }

    /**
     * Obtiene todos los corrales registrados actualmente con sus respectivos animales
     */
    public function getAllCorrals()
    {
        $corrals = Corral::with('animals')->get();

        return response()->json([
            'corrals' => $corrals
        ], 200);
    }
}
