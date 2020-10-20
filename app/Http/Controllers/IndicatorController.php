<?php

namespace App\Http\Controllers;

use App\Helpers\GeneratorHelper;
use App\Models\Indicator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IndicatorController extends Controller
{
    public function generate(Request $request)
    {
        $type = !is_null($request->input("type")) ? $request->input("type") : "string";
        $length = !is_null($request->input("length")) ? $request->input("length") : 15;

        $generated = GeneratorHelper::generate($type, $length);

        if (is_array($generated)) {
            return new JsonResponse([
                'success' => false,
                'error' => $generated['error']
            ]);
        }

        $indicator = new Indicator([
            'type' => $type,
            'value' => $generated
        ]);

        if ($indicator->save()) {
            return new JsonResponse([
                'success' => true,
                'data' => [
                    'id' => $indicator->id
                ]
            ]);
        }
        else {
            return new JsonResponse([
                'success' => false,
                'error' => "Ошибка при сохранении данных!"
            ]);
        }
    }

    public function get(Request $request, $id)
    {

    }
}
