<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use test\Mockery\Stubs\Animal;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applicant extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'applicants';
    protected $dates = ['deleted_at'];
    protected $fillable = ['app_name', 'app_email', 'app_image', 'app_gender', 'app_skills'];

    public static $applicant, $image, $text, $imageName, $imageUrl, $directory;

    public static function getImageUrl($request)
    {
        self::$image        = $request->file('app_image');
        self::$text         = self::$image->getClientOriginalExtension();
        self::$imageName    = uniqid().'_'.time().'.'.self::$text;
        self::$directory    = storage_path('app/public/applicant_image/');
        self::$image->move(self::$directory, self::$imageName);
        return self::$imageName;

    }
    public static function newApplicants($request)
    {
        self::$applicant                = new Applicant();
        self::$applicant->app_name      = $request->app_name;
        self::$applicant->app_email     = $request->app_email;
        self::$applicant->app_image     = self::getImageUrl($request);
        self::$applicant->app_gender    = $request->app_gender;
        self::$applicant->app_skills    = json_encode($request->app_skills);
        self::$applicant->save();
    }

    public static function updateApplicant($request, $id)
    {
        self::$applicant = Applicant::findOrFail($id);
        if ($request->file('app_image'))
        {
            if (file_exists(self::$applicant->app_image))
            {
                unlink(self::$applicant->app_image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        self::$applicant->app_name      = $request->app_name;
        self::$applicant->app_email     = $request->app_email;
        self::$applicant->app_image     = self::$imageUrl;
        self::$applicant->app_gender    = $request->app_gender;
        self::$applicant->app_skills    = $request->app_skills;
        self::$applicant->update();
    }
    public static function applicantsDelete($id)
    {
        self::$applicant = Applicant::find($id);
        if (self::$applicant){
            if (file_exists(self::$applicant->app_image)){
                unlink(self::$applicant->app_image);
            }
            self::$applicant->delete();
            return true;
        }else{
            return false;
        }
    }
}
