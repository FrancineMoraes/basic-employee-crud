<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Employee;
use App\Models\Address;
use App\Models\Image;

class EmployeeRepository
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::get();

        return $employees;
    }    
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $employee = Employee::create($request->all());
            $employee->address()->create($request->all());
        
            if($request->hasFile('image'))
            {
                $path = Storage::put('employees', $request->file('image'));
                $employee->image()->create([
                    'path' => $path
                ]);
            }
        } 
        catch (\Exception $ex)
        {
            return redirect()->back()->with('status', 'danger')->with('message', 'Não foi possível cadastrar o funcionário, preencha os campos e tente novamente.');
        }
        return view('employees.index')->with('status', 'success')->with('message', 'Funcionário cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
            $employee = Employee::findOrFail($id);
            $employee->image()->delete();
            $employee->address()->delete();
            $employee->delete();       
        } 
        catch (\Exception $ex)
        {
            return redirect()->back()->with('status', 'danger')->with('message', 'Não foi possível excluir o funcionário, atualize a página e tente novamente.');
        }
        
        return redirect()->back()->with('status', 'success')->with('message', 'Funcionário deletado com sucesso.');
    }
}
