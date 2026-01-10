<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\{About, Contact, Event, Gallery, PrivacyPolicy, Review, Slider, Team, TermsCondition, TrainingPackage};
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $about = About::first();
        $events = Event::all();
        $gallery = Gallery::all();
        $review = Review::all();

        $popular = TrainingPackage::where('is_popular', true)->first();
        $others = TrainingPackage::where('is_popular', false)
                    ->where('status', '1')
                    ->limit(2)
                    ->get();
        $trainings = collect([$popular])->merge($others)->filter();
        return Inertia::render('HomePage', [
            'sliders' => $sliders,
            'about' => $about,
            'events' => $events,
            'packages' => $trainings,
            'galleryImages' => $gallery,
            'reviews' => $review
        ]);
    }
    public function training()
    {
        $trainings = TrainingPackage::all();
        return Inertia::render('TrainingPakagePage',[
            'packages' => $trainings
        ]);
    }

        public function trainingDetails($id)
    {
        $training = TrainingPackage::findOrFail($id);
        return Inertia::render('TrainingPackagesDetails', [
            'training_package' => [$training]
        ]);
    }

    public function about()
    {
        $about = About::first();
        $teamMembers = Team::all();
        return Inertia::render('AboutPage', [
            'about' => $about,
            'teamMembers' => $teamMembers,
        ]);
    }

     public function event()
    {
        $events = Event::all();;
        return Inertia::render('EventPage', [
            'events' => $events,
        ]);
    }

      public function eventDetails($id)
    {
        $event = Event::findOrFail($id);;
        return Inertia::render('EventDetailsPage', [
            'event' => $event,
        ]);
    }

         public function gallery()
    {
        $gallery = Gallery::all();
        return Inertia::render('GalleryPage', [
            'gallery' => $gallery,
        ]);
    }
            public function contact()
    {
        $contact = Contact::first();
        return Inertia::render('ContactPage', [
            'contact' => $contact,
        ]);
    }

    public function terms()
    {
        $terms = TermsCondition::first();
        return Inertia::render('TermsAndConditions',[
                'terms' => $terms,
        ]);
    }

        public function privacy()
    {
        $policy = PrivacyPolicy::first();
        return Inertia::render('PrivacyPolicy',[
            'policy' => $policy,
        ]);
    }
}
