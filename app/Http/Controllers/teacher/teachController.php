<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Matrial;
use App\Models\Room;
use App\Models\User;
use App\Models\Lecture;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

use App\Exports\StudentsExport;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class teachController extends Controller
{
    public function index()
    {
        $matrials = Auth::user()->matrials;
        $lectures = Auth::user()->lectures;
        //dd($lectures);
        //dd($matrials);
        $book = Booking::where('user_id', Auth::id())->get();
        // dd($book->lecture);
        $arr = [];
        for ($i = 1; $i < 6; $i++) {
            for ($j = 1; $j < 6; $j++) {

                $arr[$i][$j] = null;
            }
        }


        foreach ($book as $item) {
            // dd($item);
            $day = $item->day;
            $lec = $item->lecture;
            $arr[$day][$lec] = $item;
        }
        $days[1] = 'الاحد';
        $days[2] = 'الاثنين';
        $days[3] = 'الثلاثاء';
        $days[4] = 'الاربعاء';
        $days[5] = 'الخميس';

        //  dd($arr);
        return view('teacher.main', ['bookings' => $arr, 'days' => $days, 'matrials' => $matrials, 'lectures' => $lectures]);
    }
    public function test(Request $request)
    {
        //dd('test');
        $matrial = Matrial::find($request->section);

        $category = Category::where('catId', $matrial->cat_name)->get('id');
        $cat_id = [];
        foreach ($category as $item) {
            $cat_id[] = $item->id;
        }

        //   dd($cat_id);
        $book = Booking::whereIn('category_id', $cat_id)->where('lecture', $request->day)->where('day', $request->lecture)->get();

        $bookRoom = Booking::where('lecture', $request->day)->where('day', $request->lecture)->get();
        $class = [];

        foreach ($bookRoom as $item) {
            $class[] = $item->room_id;
        }

        $room = Room::whereNotIn('id', $class)->get(['id', 'name']);





        $section = [];
        foreach ($book as $item) {
            $section[] = $item->category_id;
        }
        $test = array_diff($cat_id, $section);
        $test = array_values($test);
        $cat = Category::whereIn('id', $test)->get(['section', 'id']);
        $cat_id = [];
        foreach ($cat as $item) {
            $cat_id[] = $item->section;
        }
        //  $secc = [];
        //  for ($i = 0; $i < count($cat_id); $i++) {
        //     $secc['id'] = $section[$i];
        //     $secc['section'] = $cat_id[$i];
        //  }


        return response()->json(['section' => $cat, 'room' => $room], 200);
    }

    public function store(Request $request)
    {
        switch ($request->input('action')) {
            case 'create':
                //  dd($request->day);
                $bookCheck  = Booking::where('lecture', $request->lecture)->where('day', $request->day)->where('user_id', Auth::id())->first();
                if ($bookCheck) {
                    $bookCheck->update([
                        'user_id' => Auth::id(),
                        'category_id' => $request->category,
                        'room_id' => $request->room,
                        'matrial_id' => $request->matrial,
                        'lecture' => $request->lecture,
                        'day' => $request->day,
                    ]);
                    return redirect()->back();
                    break;
                }
                Booking::create([
                    'user_id' => Auth::id(),
                    'category_id' => $request->category,
                    'room_id' => $request->room,
                    'matrial_id' => $request->matrial,
                    'lecture' => $request->lecture,
                    'day' => $request->day,
                ]);
                return redirect()->back();
                break;

            case 'delete':
                $booking = Booking::where('user_id', Auth::id())->where('day', $request->day)->where('lecture', $request->lecture)->first();
                if (!is_null($booking)) {
                    $booking->delete();
                }
                return redirect()->back();

                break;
        }
    }
    public function storeLecture(Request $request)
    {
        Lecture::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'links' => $request->links,
            'matrial_id' => $request->matrial,
        ]);
        return redirect()->back();
    }
    public function deleteLecture($id)
    {
        Lecture::findOrFail($id)->delete();
        return redirect()->back();
    }
    public function projectAdver($category, $matrial)
    {
        //dd($matrial);
        $advertisments = Advertisment::where('user_id', Auth::id())->where('slice', $category)->get();
        $projects = Project::where('user_id', Auth::id())->where('matrial_id', $matrial)->get();


        // dd(Auth::id());
        return view('teacher.project_adver', ['matrial' => $matrial, 'category' => $category, 'advertisments' => $advertisments, 'projects' => $projects]);
    }
    public function advertismentAdd(Request $request, $category)
    {
        Advertisment::create([
            'user_id' => Auth::id(),
            'slice' => $category,
            'title' => $request->title,
            'content' => $request->content,
            'period' => Carbon::now()->addDays(7),

        ]);
        return redirect()->back();
    }
    public function deleteAdver($id)
    {
        Advertisment::findOrFail($id)->delete();
        return redirect()->back();
    }
    public function advertismentEdit(Request $request)
    {
        Advertisment::find($request->id)->update($request->all());
        return redirect()->back();
    }
    public function projectAdd(Request $request)
    {
        Project::create(
            [
                'date' => $request->date, 'content' => $request->content, 'title' => $request->title, 'matrial_id' => $request->matrial_id,
                'user_id' => Auth::id()
            ]
        );
        // dd($request->all(['date','content','title','matrial_id']));
        return redirect()->back();
    }
    public function deleteProject($id)
    {
        Project::findOrFail($id)->delete();
        return redirect()->back();
    }
    public function projectEdit(Request $request)
    {
        Project::find($request->id)->update($request->all());
        return redirect()->back();
    }
    public function getStudent($category)
    {
        return Excel::download(new StudentsExport($category), 'students.xlsx');
    }
    public function projectDownload($id)
    {
        $project = Project::find($id);

        $zip_file = 'project.zip'; // Name of our archive to download
        // dd(storage_path('app/public/projects_files'));
        // Initializing PHP class
        $zip = new \ZipArchive();

        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);


        foreach ($project->users as $user) {
            $zip->addFile(storage_path('app/public/project_files' . '/' . $user->pivot->path), 'project/' . $user->pivot->path);

            // dd(storage_path('app/public/projects_files'.'/'.$user->pivot->path));
        }

        // Adding file: second parameter is what will the path inside of the archive
        // So it will create another folder called "storage/" inside ZIP, and put the file there.

        $zip->close();
        if ($zip->lastId == -1) {
            return redirect()->back();
        }
        // We return the file immediately after download
        return response()->download($zip_file);
    }

    public function searchTeacher(Request $request)
    {
        $book = Booking::where('user_id', $request->id)->get();
        $user = User::where('id', $request->id)->first();
        // dd($book->lecture);
        $arr = [];
        for ($i = 1; $i < 6; $i++) {
            for ($j = 1; $j < 6; $j++) {

                $arr[$i][$j] = null;
            }
        }


        foreach ($book as $item) {
            // dd($item);
            $day = $item->day;
            $lec = $item->lecture;
            $arr[$day][$lec] = $item;
        }
        $days[1] = 'الاحد';
        $days[2] = 'الاثنين';
        $days[3] = 'الثلاثاء';
        $days[4] = 'الاربعاء';
        $days[5] = 'الخميس';

        // dd(Auth::id());
        $teachers = User::where('role_id', 'doctor')->get();
        return view('teacher.searchByteacher', ['teachers' => $teachers, 'bookings' => $arr, 'days' => $days, 'user' => $user]);
    }

    public function searchTeacherIndex()
    {
        $teachers = User::where('role_id', 'doctor')->get();

        return view('teacher.searchByteacher', ['teachers' => $teachers]);
    }


    public function searchRoom(Request $request)
    {
        $book = Booking::where('room_id', $request->id)->get();
        $user = Room::where('id', $request->id)->first();
        // dd($book->lecture);
        $arr = [];
        for ($i = 1; $i < 6; $i++) {
            for ($j = 1; $j < 6; $j++) {

                $arr[$i][$j] = null;
            }
        }


        foreach ($book as $item) {
            // dd($item);
            $day = $item->day;
            $lec = $item->lecture;
            $arr[$day][$lec] = $item;
        }
        $days[1] = 'الاحد';
        $days[2] = 'الاثنين';
        $days[3] = 'الثلاثاء';
        $days[4] = 'الاربعاء';
        $days[5] = 'الخميس';

        // dd(Auth::id());
        $rooms = Room::all();
        return view('teacher.searchByroom', ['rooms' => $rooms, 'bookings' => $arr, 'days' => $days, 'user' => $user]);
    }

    public function searchRoomIndex()
    {
        $rooms = Room::all();

        return view('teacher.searchByroom', ['rooms' => $rooms]);
    }
}
