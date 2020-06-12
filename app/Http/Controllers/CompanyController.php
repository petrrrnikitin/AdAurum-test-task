<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Resources\Company as CompanyResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompanyController extends Controller
{

    public function index()
    {
        return CompanyResource::collection(Company::all());

    }

    public function store()
    {
        $company = request()->user()->company()->create($this->validateData());
        return (new CompanyResource($company))->response()->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Company $company)
    {
        return new CompanyResource($company);
    }

    public function update(Company $company)
    {
        $this->authorize('update', $company);

        $company->update($this->validateData());
    }


    private function validateData()
    {
        return request()->validate([
            'title' => 'required',
            'tax_id_number' => 'required|integer',
            'description' => 'required',
            'owner' => 'required',
            'address' => 'required',
            'phone' => 'required|integer',
        ]);
    }


}
