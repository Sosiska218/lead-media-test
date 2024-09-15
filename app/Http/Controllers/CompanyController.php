<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\StoreRequest;
use App\Http\Requests\Company\UpdateRequest;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CompanyController extends Controller
{
    public function index(): View
    {
        $companies = Company::query()->latest()->paginate(10);

        return view('pages.company.index', compact(['companies']));
    }

    public function create(): View
    {
        return view('pages.company.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $requestData = $request->validated();

        $company = Company::query()->create([
            'name' => $requestData['name'],
            'email' => $requestData['email'],
            'site_url' => $requestData['site_url'],
        ]);

        return redirect()->route('company.edit', $company);
    }

    public function edit(Company $company): View
    {
        return view('pages.company.edit', compact(['company']));
    }

    public function update(UpdateRequest $request, Company $company): RedirectResponse
    {
        $requestData = $request->validated();
        $request->validateUnique($company, $requestData);

        $uniqueErrors = $request->getUniqueErrors();
        if (!empty($uniqueErrors)) {
            return redirect()->back()->withInput()->withErrors($uniqueErrors);
        }

        $company->update([
            'name' => $requestData['name'],
            'email' => $requestData['email'],
            'site_url' => $requestData['site_url'],
        ]);

        return redirect()->back()->with('success', 'Company has been updated');
    }

    public function delete(Company $company): RedirectResponse
    {
        $company->delete();

        return redirect()->route('company.index');
    }
}
