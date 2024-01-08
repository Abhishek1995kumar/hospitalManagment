<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEnquiryRequest;
use App\Models\Enquiry;
use App\Models\FrontSetting;
use App\Queries\EnquiryDataTable;
use App\Repositories\EnquiryRepository;
use DataTables;
use Exception;
use Flash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Route;
use DB;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class EnquiryController extends AppBaseController
{
    /** @var EnquiryRepository */
    private $enquiryRepository;

    public function __construct(EnquiryRepository $enqRepo)
    {
        $this->enquiryRepository = $enqRepo;
    }


    public function index(Request $request)
    {
        DB::enableQueryLog();
        if ($request->ajax()) {
            return Datatables::of((new EnquiryDataTable())->get($request->only(['status'])))->make(true);
        }
        // echo "<pre>";
        // print_r(DB::getQueryLog());
        // die();
        $data['statusArr'] = Enquiry::STATUS_ARR;

        return view('enquiries.index', $data);
    }

    public function store(CreateEnquiryRequest $request)
    {
        try {
            $input = $request->all();
            $input['contact_no'] = preparePhoneNumber($input, 'contact_no');
            $this->enquiryRepository->store($input);
            
        return $this->sendSuccess('Enquiry send successfully.');
        } catch (Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

   
    public function show(Enquiry $enquiry)
    {
        if ($enquiry->status == 0) {
            $enquiry->update([' y' => getLoggedInUserId()]);
            $enquiry->update(['status' => 1]);
        }

        return view('enquiries.show', compact('enquiry'));
    }

 
    public function activeDeactiveStatus($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $status = ! $enquiry->status;
        $viewedStatus = ($status == 1) ? getLoggedInUserId() : null;
        $enquiry->update(['viewed_by' => $viewedStatus]);
        $enquiry->update(['status' => $status]);

        return $this->sendSuccess('Status updated successfully.');
    }

 
    public function contactUs()
    {
        return view('web.home.contact_us');
    }
}
