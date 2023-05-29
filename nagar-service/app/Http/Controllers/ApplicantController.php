<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function applicantIndex()
    {
        $app_datas = Applicant::all();
        return view('app_index', [
            'app_datas' => $app_datas
        ]);

    }
    public function applicantStore(Request $request)
    {
        $request->validate(
            [
                'app_name'  => 'required',
                'app_email' => 'required|email|max:255|unique:applicants',
                'app_image' => 'mimes:jpg,png|max:2048'
            ],
            [
                'app_name.required'     => 'Name is Required.',
                'app_email.required'    => 'Email is Required.',
                'app_email.email'       => 'Email Must be type of Email.',
                'app_email.max'         => 'Email length must be in 255 Letter.',
                'app_email.unique'      => 'This email is Already Exists',
                'app_image.required'    => 'Image is required.',
                'app_image.mimes'       => 'Only Jpg and Png can be uploaded',
                'app_image.max'         => 'Maximum File Upload Size is 2MB'
            ]
        );
        Applicant::newApplicants($request);
        $notification = array(
            'message'       => 'Form Submit Successfully!',
            'alert-type'    => 'success'
        );
        $app_datas = Applicant::all();
        return view('app_index', [
            'app_datas' => $app_datas
        ]);
//        return redirect('/');
    }

    public function applicantEdit($id)
    {
        $e_data = Applicant::findOrFail($id);
        return view('app_edit', [
            'e_data' => $e_data
        ]);
    }
    public function applicantUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'app_name'  => 'required',
                'app_email' => 'required|email|max:255|unique:user',
                'app_image' => 'mimes:jpg,png|max:2048'
            ],
            [
                'app_name.required'     => 'Name is Required.',
                'app_email.required'    => 'Email is Required.',
                'app_email.email'       => 'Email Must be type of Email.',
                'app_email.max'         => 'Email length must be in 255 Letter.',
                'app_email.unique'      => 'This email is Already Exists',
                'app_image.required'    => 'Image is required.',
                'app_image.mimes'       => 'Only Jpg and Png can be uploaded',
                'app_image.max'         => 'Maximum File Upload Size is 2MB'
            ]
        );
        Applicant::updateApplicant($request, $id);
        $notification = array(
            'message'       => 'Form Submit Successfully!',
            'alert-type'    => 'success'
        );

    }
    public function applicantDelete($id)
    {
        if (Applicant::applicantsDelete($id))
        {
            $data['success'] = true;
            $data['message'] = 'Section Deleted Successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Success Can not be Deleted !';
            return response()->json($data, 200);
        }
    }
}
