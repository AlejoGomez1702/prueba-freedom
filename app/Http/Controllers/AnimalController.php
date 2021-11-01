<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAnimalRequest;
use App\Models\Animal;

class AnimalController extends Controller
{
    /**
     * Crea un animal en la base de datos del sistema.
     */
    public function createAnimal(StoreAnimalRequest $request)
    {
        $animal = new Animal();
        $animal->name = $request->name;
        $animal->dangerousness = $request->dangerousness;
        $animal->age = $request->age;
        $animal->corral_id = $request->corral_id;
        $animal->save();

        return response()->json([
            'animal' => $animal
        ], 200);
    }
}
