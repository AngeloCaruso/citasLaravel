<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Medico;
use App\User;
use Illuminate\Http\Request;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['citas'] = Cita::select('citas.id', 'citas.fecha', 'users.name as usuario', 'medicos.nombre as medico', 'medicos.especialidad', 'medicos.ciudad')
            ->join('users', 'users.id', '=', 'citas.user_id')
            ->join('medicos', 'medicos.id', '=', 'citas.medico_id')
            ->where('estado', 1)
            ->get();
        $data['medicos'] = Medico::get();
        return view('citas.viewCitas', $data);
    }

    public function fetch()
    {
        $data['citas'] = Cita::select('citas.id', 'citas.fecha', 'users.name as usuario', 'medicos.nombre as medico', 'medicos.especialidad', 'medicos.ciudad')
            ->join('users', 'users.id', '=', 'citas.user_id')
            ->join('medicos', 'medicos.id', '=', 'citas.medico_id')
            ->where('estado', 1)
            ->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function agendar($id)
    {
        $data['usuarios'] = User::get();
        $data['medico'] = Medico::findOrFail($id);
        return view('citas.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->except('_token');
        Cita::insert($data);
        return redirect('citas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show(Cita $cita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function edit($cita)
    {
        $data['cita'] = Cita::select('citas.id', 'citas.fecha', 'user_id', 'users.name as usuario', 'medicos.id as medico_id', 'medicos.nombre as medico', 'medicos.especialidad', 'medicos.ciudad')
            ->join('users', 'users.id', '=', 'citas.user_id')
            ->join('medicos', 'medicos.id', '=', 'citas.medico_id')
            ->where('citas.id', $cita)
            ->where('estado', 1)
            ->get()
            ->first();
        $data['usuarios'] = User::get();
        $data['medicos'] = Medico::get();
        return view('citas.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cita)
    {
        $data = request()->except(['_token', '_method']);
        Cita::where('id', $cita)->update($data);
        $cita = Cita::findOrFail($cita);
        return redirect('citas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy($cita)
    {
        Cita::where('id', $cita)->update(['estado' => 0]);
        return redirect('citas');
    }
}
