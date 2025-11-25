<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    public function index() {
        return view('dashboard.clients.index');
    }

    public function store(Request $request) {
        try {

            // Validación de datos
            $validated = $request->validate([
                'type' => ['required', Rule::in(['PERSON', 'COMPANY'])],
                'document_type' => ['nullable', Rule::in(['DNI', 'CE', 'RUC', 'PASSPORT'])],
                'document_number' => ['required', 'max:20', 'unique:clients,document_number'],
                'name' => ['nullable', 'string'],
                'lastname' => ['nullable', 'string'],
                'business_name' => ['nullable', 'string'],
                'email' => ['nullable', 'email'],
                'phone' => ['nullable', 'string', 'max:20'],
                'address' => ['nullable', 'string'],
                'district' => ['nullable', 'string'],
                'province' => ['nullable', 'string'],
                'status' => ['nullable', Rule::in(['ACTIVE', 'INACTIVE'])],
            ]);

            // Crear cliente
            $client = Client::create($validated);

            return response()->json([
                'message' => 'Cliente registrado correctamente',
                'data' => $client
            ], 201);

        } catch (ValidationException $e) {

            // 🔥 Registrar los errores de validación
            Log::error("Error de validación al registrar cliente", [
                'errors' => $e->errors(),
                'input' => $request->all()
            ]);

            return response()->json([
                'message' => 'Errores de validación',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {

            // 🔥 Registrar cualquier error inesperado
            Log::error("Error inesperado en ClientController@store", [
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'input' => $request->all()
            ]);

            return response()->json([
                'message' => 'Ocurrió un error interno del servidor'
            ], 500);
        }
    }

    public function buscar($tipo, $numero) {
        try {
            $client = Client::where('document_type', strtoupper($tipo))
                            ->where('document_number', $numero)
                            ->first();

            if (!$client) {
                return response()->json([
                    'found' => false,
                    'message' => 'Cliente no encontrado'
                ], 404);
            }

            return response()->json([
                'found' => true,
                'data' => $client
            ]);

        } catch (\Exception $e) {
            Log::error("Error en búsqueda de cliente", [
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'message' => 'Error interno del servidor'
            ], 500);
        }
    }



}
