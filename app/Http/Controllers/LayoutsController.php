<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Course;
use App\Models\News;
use App\Models\NormativeDocument;
use App\Models\Question;
use App\Models\Slider;
use App\Models\SoftwareProduct;
use App\Models\StartUp;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class LayoutsController extends Controller
{
    public function about(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $about = About::first();
        return view('pages.about',compact('about'));
    }

    public function news(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $news = News::paginate(9);
        return view('pages.news',compact('news'));
    }

    public function start_up(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $start_ups = StartUp::paginate(9);
        return view('pages.start_up',compact('start_ups'));
    }

    public function software(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $softwares = SoftwareProduct::paginate(9);
        return view('pages.software',compact('softwares'));
    }

    public function course(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $courses = Course::all();
        return view('pages.course',compact('courses'));
    }

    public function document(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $document = NormativeDocument::first();
        return view('pages.document',compact('document'));
    }


    public function welcome(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $faqs = Question::all();
        $sliders = Slider::all();
        $about = About::first();
        $online = Course::where('type','online')->get();
        $offline = Course::where('type','offline')->get();
        $news = News::orderBy('id', 'desc')->skip(0)->take(4)->get();
        return view('welcome',compact('sliders','about','news','online','offline','faqs'));
    }

    public function lang($lang)
    {
        $lang = strtolower($lang);
        if ($lang == 'ru' || $lang == 'uz' || $lang == 'en')
        {
            session([
                'locale' => $lang
            ]);
        }
        return redirect()->back();
    }
}
