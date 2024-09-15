<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employee\StoreRequest;
use App\Http\Requests\Employee\UpdateRequest;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index(): View
    {
        $employees = Employee::query()->latest()->paginate(10);

        return view('pages.employee.index', compact(['employees']));
    }

    public function create(): View
    {
        return view('pages.employee.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $requestData = $request->validated();

        $employee = Employee::query()->create([
            'first_name' => $requestData['first_name'],
            'last_name' => $requestData['last_name'],
            'email' => $requestData['email'],
            'phone' => $requestData['phone'],
            'company_id' => $requestData['company_id'],
        ]);

        return redirect()->route('employee.edit', $employee)->with('success', 'Employee has been created');
    }

    public function edit(Employee $employee): View
    {
        return view('pages.employee.edit', compact(['employee']));
    }

    public function update(UpdateRequest $request, Employee $employee): RedirectResponse
    {
        $requestData = $request->validated();
        $request->validateUnique($employee, $requestData);

        $uniqueErrors = $request->getUniqueErrors();
        if (!empty($uniqueErrors)) {
            return redirect()->back()->withInput()->withErrors($uniqueErrors);
        }

        $employee->update([
            'first_name' => $requestData['first_name'],
            'last_name' => $requestData['last_name'],
            'email' => $requestData['email'],
            'phone' => $requestData['phone'],
            'company_id' => $requestData['company_id'],
        ]);

        return redirect()->back()->with('success', 'Employee has been updated');
    }

    public function delete(Employee $employee): RedirectResponse
    {
        $employee->delete();

        return redirect()->route('employee.index');
    }
}
