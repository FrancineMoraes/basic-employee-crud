<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceRepository
{

    /**
     * Display a listing of the resource.
     *
     */
    public function index($employee_id)
    {
        return Experience::with('employees')
            ->whereHas('employees', function($query) use ($employee_id) {
                $query->where('employees_id', $employee_id);
            })->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $experience = Experience::create($request->all());
        \DB::table('employees_has_experiences')->insert(['employees_id' => $request->employee_id, 'experiences_id' => $experience->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Experience::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $experience = Experience::findOrFail($id);
        }
        catch (\Exception $ex)
        {
            return redirect()->back()->with('status', 'danger')->with('message', 'Não foi possível editar a experiência, atualize a página e tente novamente.');
        }

        return $experience;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeEditRequest $request, $id)
    {

        try
        {
            $experience = Experience::findOrFail($id);
            $experience->update($request->all());

            return redirect()->route('experiences.index')->with('status', 'success')->with('message', 'Experiência alterada com sucesso.');
        }
        catch (\Exception $ex)
        {
            return redirect()->back()->with('status', 'danger')->with('message', 'Não foi possível alterar a experiência, atualize a página e tente novamente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $experience = Experience::findOrFail($id);
            $experience->image()->delete();
            $experience->address()->delete();
            $experience->delete();
        }
        catch (\Exception $ex)
        {
            return redirect()->back()->with('status', 'danger')->with('message', 'Não foi possível excluir a experiência, atualize a página e tente novamente.');
        }

        return redirect()->back()->with('status', 'success')->with('message', 'Experiência deletada com sucesso.');
    }
}
