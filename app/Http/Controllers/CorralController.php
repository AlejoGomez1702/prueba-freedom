<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Corral;
use App\Models\Animal;
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
        $corrals = Corral::with('animals')->withCount('animals')->get();

        return response()->json([
            'corrals' => $corrals
        ], 200);
    }

    /**
     * Obtiene la edad promedio de los animales en un corral dado
     * @param id Identificador del corral del cual se desea sacar el promedio de edades de los animales. 
     */
    public function getAnimalsAvg($id)
    {
        $corral = Corral::findOrFail( $id );
        // Saqueme el promedio de edades de los animales cuyo id de corral es "$id":
        $avgAges = Animal::where('corral_id', $id)->avg('age');

        return response()->json([
            'corral_id' => $id,
            'avg' => $avgAges
        ], 200);
    }
}
