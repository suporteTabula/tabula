<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Star;
use Auth;

class StarController extends Controller
{
	public function ratingStar(Request $request)
	{

		$user= Auth::user();
		$course = Course::find($request->idCourse);
		$rating = Star::where('id_course', $request->idCourse)->where('id_user', $user->id)->count();
		$dados['vote'] = $request->voto;
		$hasCourse = false;
		if($user && $user->courses()->find($request->idCourse))
			$hasCourse = true;
		if ($hasCourse && $rating == 0) {
			Star::create([
				'id_course' => $course->id,
				'id_user' => $user->id,
				'point'	=> $dados['vote'],
			]);
		}
		return json_encode($dados);
	}   
}
