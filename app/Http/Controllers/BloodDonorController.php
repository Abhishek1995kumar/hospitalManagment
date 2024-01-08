<?php

namespace App\Http\Controllers;

use App\Exports\BloodDonorExport;
use App\Http\Requests\CreateBloodDonorRequest;
use App\Http\Requests\UpdateBloodDonorRequest;
use App\Models\BloodDonor;
use App\Queries\BloodDonorDataTable;
use App\Repositories\BloodDonorRepository;
use DataTables;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class BloodDonorController extends AppBaseController
{
    /** @var BloodDonorRepository */
    private $bloodDonorRepository;

    public function __construct(BloodDonorRepository $bloodDonorRepo) {
        $this->bloodDonorRepository = $bloodDonorRepo;
    }

    
    public function index(Request $request) {
        if ($request->ajax()) {
            return Datatables::of((new BloodDonorDataTable())->get())->make(true);
        }
        $bloodGroup = getBloodGroups();

        return view('blood_donors.index', compact('bloodGroup'));
    }

    
    public function store(CreateBloodDonorRequest $request) {
        $input = $request->all();
        $this->bloodDonorRepository->create($input);

        return $this->sendSuccess('Blood Donor saved successfully.');
    }

    
    
    public function edit(BloodDonor $bloodDonor)
    {
        return $this->sendResponse($bloodDonor, 'Blood Donor retrieved successfully.');
    }

   
    
    public function update(BloodDonor $bloodDonor, UpdateBloodDonorRequest $request) {
        $input = $request->all();
        $this->bloodDonorRepository->update($input, $bloodDonor->id);

        return $this->sendSuccess('Blood Donor updated successfully.');
    }

    
    
    public function destroy(BloodDonor $bloodDonor)
    {
        $bloodDonor->delete($bloodDonor->id);

        return $this->sendSuccess('Blood Donor deleted successfully.');
    }

    
    
    public function bloodDonorExport()
    {
        return Excel::download(new BloodDonorExport, 'blood-donor-'.time().'.xlsx');
    }
}
