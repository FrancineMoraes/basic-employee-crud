<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EmployeeRepository;
use App\Http\Requests\EmployeeEditRequest;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    private $employee;

    public function  __construct()
    {
        $this->employee = new EmployeeRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = $this->employee->index();

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        return $this->employee->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $employee = $this->employee->show($id);
            return view('employees.show', compact('employee'));
        }
        catch (\Exception $ex)
        {
        return redirect()->route('employees.index')->with('status', 'danger')->with('message', 'Não foi possível visualizar o funcionário, atualize a página e tente novamente.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = $this->employee->edit($id);

        return view('employees.edit', compact('employee'));
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
        return $this->employee->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->employee->destroy($id);
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $employees = $this->employee->search($request);

        if($employees instanceof Request)
        {
            return $employees;
        }
        else
        {
            return view('employees.index', compact('employees'));
        }
    }

    public function searchByFilters(Request $request) {
        return $this->employee->searchByFilters($request);
    }

    public function getCities(Request $request) {
        return $this->employee->getCities($request->state);
    }

    public function getStates() {
        return $this->employee->getStates();
    }

    public function showEmployee($id) {
        return $this->employee->show($id);
    }
}
