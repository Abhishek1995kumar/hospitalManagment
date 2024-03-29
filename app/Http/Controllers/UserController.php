<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Department;
use App\Models\DoctorDepartment;
use App\Models\User;
use App\Queries\UserDataTable;
use App\Repositories\UserRepository;
use Auth;
use Carbon\Carbon;
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
use DB;
use App\Models\Location;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Throwable;
use URL;


/**
 * Class UserController
 */
class UserController extends AppBaseController
{
    /** @var UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }


    /**
     * @param  ChangePasswordRequest  $request
     *
     * @return JsonResponse
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        $input = $request->all();

        try {
            $user = $this->userRepository->changePassword($input);

            return $this->sendSuccess('Password updated successfully.');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), 422);
        }
    }

    /**
     * @param  UpdateUserProfileRequest  $request
     *
     * @return JsonResponse
     */
    public function profileUpdate(UpdateUserProfileRequest $request)
    {
        $input = $request->all();

        try {
            $user = $this->userRepository->profileUpdate($input);

            return $this->sendResponse($user, 'Profile updated successfully.');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), 422);
        }
    }

    /**
     * Show the form for editing the specified User.
     *
     * @return JsonResponse
     */
    public function editProfile()
    {
        $user = getLoggedInUser()->append('image_url');

        return $this->sendResponse($user, 'User retrieved successfully.');
    }

    /**
     * @param  Request  $request
     *
     * @return JsonResponse
     */
    public function updateLanguage(Request $request)
    {
        $language = $request->get('language');

        /** @var User $user */
        $user = $request->user();
        $user->update(['language' => $language]);

        return $this->sendSuccess('Language updated successfully.');
    }

    /**
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of((new UserDataTable())->get($request->only(['department_id', 'status'])))
                ->addColumn(User::IMG_COLUMN, function (User $user) {
                    return $user->image_url;
                })->make(true);
        }

        $roles = Department::orderBy('name')->pluck('name', 'id')->toArray();
        $status = User::STATUS_ARR;

        return view('users.index', compact('roles', 'status'));
    }


    public function create() {
        $isEdit = false;
        $role = Department::orderBy('name')->pluck('name', 'id')->toArray();
        $doctorDepartments = DoctorDepartment::pluck('title', 'id')->toArray();
        // $location = $this->UserRepository->getLocation();
        $locationcateg = DB::table('location')->get();

        return view('users.create', compact('isEdit', 'role', 'doctorDepartments','locationcateg'));
    }

    
    
    public function store(CreateUserRequest $request) {
        try {
            DB::beginTransaction();
            $input = $request->all();
            $input['status'] = isset($input['status']) ? 1 : 0;
            $this->userRepository->store($input);
            Flash::success('User saved successfully.');
            DB::commit();

            return redirect(route('users.index'));
        } catch (Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    
    
    public function show($user)
    {
        $userData = $this->userRepository->getUserData($user);

        return view('users.show', compact('userData'));
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  User  $user
     *
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {   
        $locationcateg = DB::table('location')->get();
        $role = Department::pluck('name', 'id')->all();
        $isEdit = true;

        return view('users.edit', compact('isEdit', 'user', 'role','locationcateg'));
    }

    /**
     * Update the specified User in storage.
     *
     * @param  UpdateUserRequest  $request
     *
     * @param  User  $user
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $input = $request->all();
        $input['status'] = isset($input['status']) ? 1 : 0;
        $input['dob'] = (! empty($input['dob'])) ? $input['dob'] : null;
        $input['phone'] = preparePhoneNumber($input, 'phone');
        $this->userRepository->updateUser($input, $user->id);
        Flash::success('User updated successfully.');
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return JsonResponse
     */
    public function destroy(User $user)
    {
        $this->userRepository->deleteUser($user->id);

        return $this->sendSuccess('User deleted successfully.');
    }

    /**
     * @param  int  $id
     *
     * @return JsonResponse
     */
    public function activeDeactiveStatus($id)
    {
        $user = User::findOrFail($id);
        $status = ! $user->status;
        $user->update(['status' => $status]);

        return $this->sendSuccess('Status updated successfully.');
    }

    /**
     * @param $user
     * @return JsonResponse
     */
    public function showModal($user)
    {
        $userData = $this->userRepository->getUserData($user);

        return $this->sendResponse($userData, 'User Retrieved Successfully.');
    }

    /**
     * @param  int  $id
     *
     * @return JsonResponse
     */
    public function isVerified($id)
    {
        $user = User::findOrFail($id);
        //shubham sir  start code//
        $emailVerified = $user->email_verified_at == null ? '1234' : null;
        //shubhma sir end code//
        $user->update(['email_verified_at' => $emailVerified]);
        return $this->sendSuccess('Email Verified successfully.');
        // return redirect(route('users.index'));
       
    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function changeThemeMode()
    {
        $user = User::find(getLoggedInUser()->id);
        
        if($user->thememode == User::THEME_LIGHT_MODE)
        {
            $user['thememode'] = User::THEME_DARK_MODE;
        }
        else{
            $user['thememode'] = User::THEME_LIGHT_MODE;
        }
        
        $user->update();
        
        return redirect(URL::previous());
    }
}
