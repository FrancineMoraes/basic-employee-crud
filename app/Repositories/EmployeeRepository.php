<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeEditRequest;
use App\Http\Requests\EmployeeRequest;
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
    public function store(EmployeeRequest $request)
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
        return redirect()->route('employees.index')->with('status', 'success')->with('message', 'Funcionário cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try
        {
            $employee = Employee::findOrFail($id);
        }
        catch (\Exception $ex)
        {
            return redirect()->route('employees.index')->with('status', 'danger')->with('message', 'Não foi possível visualizar o funcionário, atualize a página e tente novamente.');
        }

        return $employee;
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
            $employee = Employee::with('experiences')->findOrFail($id);
        }
        catch (\Exception $ex)
        {
            return redirect()->back()->with('status', 'danger')->with('message', 'Não foi possível editar o funcionário, atualize a página e tente novamente.');
        }

        return $employee;
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
            $employee = Employee::findOrFail($id);
            $employee->update($request->all());

            $employee->address()->update([
                'cep' => $request->cep,
                'street' => $request->street,
                'number' => $request->number,
                'district' => $request->district,
                'city' => $request->city,
                'state' => $request->state,
            ]);

            if($request->hasFile('image'))
            {
                Storage::delete($employee->image->path);

                $path = Storage::put('employees', $request->file('image'));
                $employee->image()->update([
                    'path' => $path
                ]);
            }
        }
        catch (\Exception $ex)
        {
            return redirect()->back()->with('status', 'danger')->with('message', 'Não foi possível alterar o funcionário, atualize a página e tente novamente.');
        }

        return redirect()->route('employees.index')->with('status', 'success')->with('message', 'Funcionário alterado com sucesso.');
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

    /**
     * Search the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        try
        {
            $search = $request->search;

            $employees = Employee::Orwhere('name', 'like', '%'.$search.'%')->get();

            return $employees;
        }
        catch (\Exception $ex)
        {
            return redirect()->back()->with('status', 'danger')->with('message', 'Não há resultados para a sua pesquisa.');
        }

    }
}
