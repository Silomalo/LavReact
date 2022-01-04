<?php
namespace App\Http\Controllers\API;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:190',
            'email' => 'required|email|unique:students',
            'phone' => 'required|max:10|min:10',
            'course' => 'required|max:190',
        ]);
        if($validator->fails()){
            return response()->json(['validate_err' => $validator->errors(),]);
        }else{
            $student = new Student();
            $student->name = $request->input('name');
            $student->course = $request->input('course');
            $student->email = $request->input('email');
            $student->phone = $request->input('phone');
            $student->save();

        return response()->json([
            'status' => 200,
            'message' => 'Student created successfully',
        ]);
        }


    }
    public function index()
    {
        $students = Student::all();
        return response()->json([
            'status' => 200,
            'students' => $students,
        ]);
    }
    public function edit($id)
    {
        $student = Student::find($id);
        return response()->json([
            'status' => 200,
            'student' => $student,
        ]);
    }
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->course = $request->input('course');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->update();

        return response()->json([
            'status' => 200,
            'message' => 'Student updated successfully',
        ]);
    }
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Student deleted successfully',
        ]);
    }
}
