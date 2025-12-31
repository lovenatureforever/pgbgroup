<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Project;
use App\Models\Blog;

class HomeController extends Controller
{
    public function __construct()
    {
        // Share Terms of Use and Privacy Policy URLs with all views
        $terms = \App\Models\Document::where('type', 'Terms of Use')->orderByDesc('created_at')->first();
        $privacy = \App\Models\Document::where('type', 'Privacy Policy')->orderByDesc('created_at')->first();
        \View::share('termsUrl', $terms ? $terms->url : '#');
        \View::share('privacyUrl', $privacy ? $privacy->url : '#');
    }

    // Show detail page for a single Employee Engagement
    public function employee_engagement_detail(Request $request)
    {
        $id = $request->route('id');
        $item = \App\Models\EmployeeEngagement::with('images')->findOrFail($id);
        $slides = Slide::where('is_published', 1)->where('category', 'employee_engagement')->orderBy('position', 'asc')->get();
        return view('sustainability.employee-engagement-detail', compact('item', 'slides'));
    }
    // Show detail page for a single Green Initiative
    public function green_initiatives_detail($id)
    {
    $item = \App\Models\GreenInitiative::with('images')->findOrFail($id);
    $slides = Slide::where('is_published', 1)->where('category', 'green_initiatives')->orderBy('position', 'asc')->get();
    return view('sustainability.green-initiatives-detail', compact('item', 'slides'));
    }
    // AJAX: Green Initiatives list with year filter and pagination
    public function greenInitiativesAjax(Request $request)
    {
        $year = $request->input('year');
        $offset = (int) $request->input('offset', 0);
        $limit = (int) $request->input('limit', 6);
        $query = \App\Models\GreenInitiative::with('images');
        if ($year && $year !== 'all') {
            $query->whereYear('date', $year);
        }
        $total = $query->count();
        $items = $query->orderByDesc('date')->skip($offset)->take($limit)->get();
        $items = $items->map(function($item) {
            $itemArr = $item->toArray();
            $itemArr['images'] = collect($item->images)->map(function($img) {
                return [
                    'url' => $img->url,
                    'path' => $img->url, // fallback, since 'url' is the field in DB
                ];
            })->toArray();
            return $itemArr;
        });
        return response()->json(['items' => $items, 'total' => $total]);
    }

    // AJAX: Community Impact list with year filter and pagination
    public function communityImpactAjax(Request $request)
    {
        $year = $request->input('year');
        $offset = (int) $request->input('offset', 0);
        $limit = (int) $request->input('limit', 6);
        $query = \App\Models\CommunityImpact::with('images');
        if ($year && $year !== 'all') {
            $query->whereYear('date', $year);
        }
        $total = $query->count();
        $items = $query->orderByDesc('date')->skip($offset)->take($limit)->get();
        $items = $items->map(function($item) {
            $itemArr = $item->toArray();
            $itemArr['images'] = collect($item->images)->map(function($img) {
                return [
                    'url' => $img->url,
                    'path' => $img->url,
                ];
            })->toArray();
            return $itemArr;
        });
        return response()->json(['items' => $items, 'total' => $total]);
    }

    // AJAX: Employee Engagement list with year filter and pagination
    public function employeeEngagementAjax(Request $request)
    {
        $year = $request->input('year');
        $offset = (int) $request->input('offset', 0);
        $limit = (int) $request->input('limit', 6);
        $query = \App\Models\EmployeeEngagement::with('images');
        if ($year && $year !== 'all') {
            $query->whereYear('date', $year);
        }
        $total = $query->count();
        $items = $query->orderByDesc('date')->skip($offset)->take($limit)->get();
        $items = $items->map(function($item) {
            $itemArr = $item->toArray();
            $itemArr['images'] = collect($item->images)->map(function($img) {
                return [
                    'url' => $img->url,
                    'path' => $img->url,
                ];
            })->toArray();
            return $itemArr;
        });
        return response()->json(['items' => $items, 'total' => $total]);
    }

    // AJAX endpoint for news with images, filtered by year and paginated
    public function newsWithImages(Request $request)
    {
        $year = $request->input('year');
        $offset = (int) $request->input('offset', 0);
        $limit = (int) $request->input('limit', 6);
        $query = \App\Models\News::with(['images' => function($q) { $q->orderBy('position'); }]);
        if ($year && $year !== 'all') {
            $query->whereYear('news_date', $year);
        }
        $total = $query->count();
        $news = $query->orderByDesc('news_date')->skip($offset)->take($limit)->get();
        return response()->json(['news' => $news, 'total' => $total]);
    }

    // Save registration form input from contact_us/registration.blade.php
    public function saveRegisterInterest(Request $request)
    {
        $validated = $request->validate([
            'widget-contact-form-phone' => 'required|string|max:50',
            'project_id' => 'required|integer|exists:projects,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
        $data = [
            'phone' => $validated['widget-contact-form-phone'],
            'project_id' => $validated['project_id'],
            'name' => $validated['name'],
            'email' => $validated['email'],
        ];
        \App\Models\RegisterInterest::create($data);
        return redirect()->route('contact_us.registration')->with('success', 'Thank you for registering your interest!');
    }

    // AJAX: Load more projects for our-businesses page
    public function our_businesses_load_more(Request $request)
    {
        $offset = (int) $request->input('offset', 0);
        $limit = (int) $request->input('limit', 6);
        $category = $request->input('category');
        $type = $request->input('type');
        $query = Project::where('is_published', 1);

        if ($category && $category !== 'All') {
            $query->where('category', $category);
        }
        if ($type) {
            $query->where('type', $type);
        }
        $projects = $query->skip($offset)->take($limit)->get();
        // Render each project as HTML using a Blade partial
        $html = '';
        foreach ($projects as $project) {
            $html .= view('our_business.project_card', compact('project'))->render();
        }
        return response()->json(['html' => $html, 'count' => $projects->count()]);
    }
    public function welcome(Request $request)
    {
        $slides = Slide::where('is_published', 1)
                        ->where('category', 'Business')
                        ->orderBy('position', 'asc')->get();
        $projects = Project::where('is_published', 1)->orderBy('created_at', 'desc')->take(3)->get();

        // Default limit = 3
        $limit = $request->input('limit', 3);
        $blogs = Blog::where('is_published', 1)->latest('published_at')->take($limit)->get();
        $totalCount = Blog::count();
        return view('welcome', compact(['slides', 'projects', 'blogs', 'totalCount', 'limit']));
    }

    public function corporate_profile(Request $request)
    {
        $slides = Slide::where('is_published', 1)
                        ->where('category', 'whoweare')
                        ->orderBy('position', 'asc')->get();
        $projects = Project::where('is_published', 1)->get();

        // Default limit = 3
        $limit = $request->input('limit', 3);
        $blogs = Blog::where('is_published', 1)->latest('published_at')->take($limit)->get();
        $totalCount = Blog::count();
        return view('aboutus.corporate-profile', compact(['slides', 'projects', 'blogs', 'totalCount', 'limit']));
    }

    public function leadership_team(Request $request)
    {
        $slides = Slide::where('is_published', 1)
                        ->where('category', 'leadership_team')
                        ->orderBy('position', 'asc')
                        ->get();
        $projects = Project::where('is_published', 1)->get();

        // Default limit = 3
        $limit = $request->input('limit', 3);
        $blogs = Blog::where('is_published', 1)->latest('published_at')->take($limit)->get();
        $totalCount = Blog::count();
        return view('aboutus.leadership-team', compact(['slides', 'projects', 'blogs', 'totalCount', 'limit']));
    }

    public function our_businesses(Request $request)
    {
        $slides = Slide::where('is_published', 1)
                        ->where('category', 'our_businesses')
                        ->orderBy('position', 'asc')->get();

        return view('our_business.index', compact(['slides']));
    }

    public function our_businesses_detail($id)
    {
        $project = \App\Models\Project::with(['images' => function($q) { $q->orderBy('position'); }])->findOrFail($id);
        $buildingInfo = [];
        if (!empty($project->information)) {
            $buildingInfo = json_decode($project->information, true);
        }

        $projects = Project::where('is_published', 1)->get();

        // Group projects by type and category for dropdowns
        $projectOptions = [];
        foreach ($projects as $projectItem) {
            $type = $projectItem->type ?? 'Other';
            $category = $projectItem->category ?? 'Other';
            $projectOptions[$type][$category][] = [
                'id' => $projectItem->id,
                'title' => $projectItem->title
            ];
        }

        // Fetch slides for the topslider partial (category: our_businesses)
        $slides = \App\Models\Slide::where('is_published', 1)
            ->where('category', 'our_businesses')
            ->orderBy('position', 'asc')->get();
        return view('our_business.our-business-detail', compact('project', 'buildingInfo', 'projectOptions', 'slides'));
    }

    public function media_press(Request $request)
    {
    $slides = Slide::where('is_published', 1)->where('category', 'media_press')->orderBy('position', 'asc')->get();
    $projects = Project::where('is_published', 1)->get();

    // Fetch press releases
    $pressReleases = \App\Models\PressRelease::orderByDesc('release_data')->get();

    // Default limit = 3
    $limit = $request->input('limit', 3);
    $blogs = Blog::where('is_published', 1)->latest('published_at')->take($limit)->get();
    $totalCount = Blog::count();
    return view('aboutus.mediacenter.press-releases', compact(['slides', 'projects', 'blogs', 'totalCount', 'limit', 'pressReleases']));
    }

    public function media_news(Request $request)
    {
        $slides = Slide::where('is_published', 1)->where('category', 'media_news')->orderBy('position', 'asc')->get();
        $projects = Project::where('is_published', 1)->get();

        // Default limit = 3
        $limit = $request->input('limit', 3);
        $blogs = Blog::where('is_published', 1)->latest('published_at')->take($limit)->get();
        $totalCount = Blog::count();
        return view('aboutus.mediacenter.news', compact(['slides', 'projects', 'blogs', 'totalCount', 'limit']));
    }

    public function accolades(Request $request)
    {
        $slides = Slide::where('is_published', 1)->where('category', 'accolades')->orderBy('position', 'asc')->get();
        $projects = Project::where('is_published', 1)->get();

        // Default limit = 3
        $limit = $request->input('limit', 3);
        $blogs = Blog::where('is_published', 1)->latest('published_at')->take($limit)->get();
        $totalCount = Blog::count();
        return view('aboutus.accolades', compact(['slides', 'projects', 'blogs', 'totalCount', 'limit']));
    }

    public function awards(Request $request)
    {
        $slides = Slide::where('is_published', 1)->where('category', 'awards')->orderBy('position', 'asc')->get();
        $projects = Project::where('is_published', 1)->get();

        // Default limit = 3
        $limit = $request->input('limit', 3);
        $blogs = Blog::where('is_published', 1)->latest('published_at')->take($limit)->get();
        $totalCount = Blog::count();
        return view('aboutus.awards', compact(['slides', 'projects', 'blogs', 'totalCount', 'limit']));
    }

    public function contact_information(Request $request)
    {
        $slides = Slide::where('is_published', 1)->where('category', 'contact_information')->orderBy('position', 'asc')->get();
        $projects = Project::where('is_published', 1)->get();

        // Default limit = 3
        $limit = $request->input('limit', 3);
        $blogs = Blog::where('is_published', 1)->latest('published_at')->take($limit)->get();
        $totalCount = Blog::count();
        return view('contact_us.contact-information', compact(['slides', 'projects', 'blogs', 'totalCount', 'limit']));
    }

    public function career(Request $request)
    {
        $slides = Slide::where('is_published', 1)->where('category', 'career')->orderBy('position', 'asc')->get();
        $projects = Project::where('is_published', 1)->get();

        // Default limit = 3
        $limit = $request->input('limit', 3);
        $blogs = Blog::where('is_published', 1)->latest('published_at')->take($limit)->get();
        $totalCount = Blog::count();
        return view('contact_us.career', compact(['slides', 'projects', 'blogs', 'totalCount', 'limit']));
    }

    public function registration(Request $request)
    {
        $slides = Slide::where('is_published', 1)->where('category', 'registration')->orderBy('position', 'asc')->get();
        $projects = Project::where('is_published', 1)->get();

        // Group projects by type and category for dropdowns
        $projectOptions = [];
        foreach ($projects as $project) {
            $type = $project->type ?? 'Other';
            $category = $project->category ?? 'Other';
            $projectOptions[$type][$category][] = [
                'id' => $project->id,
                'title' => $project->title
            ];
        }

        // Default limit = 3
        $limit = $request->input('limit', 3);
        $blogs = Blog::where('is_published', 1)->latest('published_at')->take($limit)->get();
        $totalCount = Blog::count();
        return view('contact_us.registration', compact(['slides', 'projects', 'blogs', 'totalCount', 'limit', 'projectOptions']));
    }

    public function corporate_information(Request $request)
    {
        $slides = Slide::where('is_published', 1)->where('category', 'corporate_information')->orderBy('position', 'asc')->get();
        $projects = Project::where('is_published', 1)->get();

        // Default limit = 3
        $limit = $request->input('limit', 3);
        $blogs = Blog::where('is_published', 1)->latest('published_at')->take($limit)->get();
        $totalCount = Blog::count();
        return view('investor.corporate-information', compact(['slides', 'projects', 'blogs', 'totalCount', 'limit']));
    }

    public function bursa_announcements(Request $request)
    {
        $slides = Slide::where('is_published', 1)->where('category', 'bursa_announcements')->orderBy('position', 'asc')->get();
        $projects = Project::where('is_published', 1)->get();

        // Default limit = 3
        $limit = $request->input('limit', 3);
        $blogs = Blog::where('is_published', 1)->latest('published_at')->take($limit)->get();
        $totalCount = Blog::count();
        return view('investor.bursa-announcements', compact(['slides', 'projects', 'blogs', 'totalCount', 'limit']));
    }

    public function shareholders_documents(Request $request)
    {
        $slides = Slide::where('is_published', 1)->where('category', 'shareholders_documents')->orderBy('position', 'asc')->get();
        $projects = Project::where('is_published', 1)->get();
        $documents = \App\Models\Document::where('type', 'shareholder')->orderByDesc('created_at')->get();
        // Default limit = 3
        $limit = $request->input('limit', 3);
        $blogs = Blog::where('is_published', 1)->latest('published_at')->take($limit)->get();
        $totalCount = Blog::count();
        return view('investor.shareholders-documents', compact(['slides', 'projects', 'blogs', 'totalCount', 'limit', 'documents']));
    }

    public function corporate_governance(Request $request)
    {
        $slides = Slide::where('is_published', 1)->where('category', 'corporate_governance')->orderBy('position', 'asc')->get();
        $projects = Project::where('is_published', 1)->get();
        $documents = \App\Models\Document::where('type', 'corporate governance')->orderByDesc('created_at')->get();
        // Default limit = 3
        $limit = $request->input('limit', 3);
        $blogs = Blog::where('is_published', 1)->latest('published_at')->take($limit)->get();
        $totalCount = Blog::count();
        return view('investor.corporate-governance', compact(['slides', 'projects', 'blogs', 'totalCount', 'limit', 'documents']));
    }

    public function sustainability_journey(Request $request)
    {
        $slides = Slide::where('is_published', 1)->where('category', 'sustainability_journey')->orderBy('position', 'asc')->get();
        $projects = Project::where('is_published', 1)->get();

        // Default limit = 3
        $limit = $request->input('limit', 3);
        $blogs = Blog::where('is_published', 1)->latest('published_at')->take($limit)->get();
        $totalCount = Blog::count();
        return view('sustainability.sustainability-journey', compact(['slides', 'projects', 'blogs', 'totalCount', 'limit']));
    }

    public function green_initiatives(Request $request)
    {
    $slides = Slide::where('is_published', 1)->where('category', 'green_initiatives')->orderBy('position', 'asc')->get();
    $projects = \App\Models\GreenInitiative::with('images')->orderByDesc('date')->get();
    return view('sustainability.green-initiatives', compact(['slides', 'projects']));
    }

    public function community_impact(Request $request)
    {
    $slides = Slide::where('is_published', 1)->where('category', 'community_impact')->orderBy('position', 'asc')->get();
    $projects = \App\Models\CommunityImpact::with('images')->orderByDesc('date')->get();
    return view('sustainability.community-impact', compact(['slides', 'projects']));
    }

    public function community_impact_detail(Request $request)
    {
    $id = $request->route('id');
    $item = \App\Models\CommunityImpact::with('images')->findOrFail($id);
    $slides = Slide::where('is_published', 1)->where('category', 'community_impact')->orderBy('position', 'asc')->get();
    return view('sustainability.community-impact-detail', compact('item', 'slides'));
    }

    public function employee_engagement(Request $request)
    {
    $slides = Slide::where('is_published', 1)->where('category', 'employee_engagement')->orderBy('position', 'asc')->get();
    $projects = \App\Models\EmployeeEngagement::with('images')->orderByDesc('date')->get();
    return view('sustainability.employee-engagement', compact(['slides', 'projects']));
    }

    // AJAX endpoint for awards with images, filtered by year
    public function awardsWithImages(Request $request)
    {
        $year = $request->input('year');
        $query = \App\Models\Award::with(['images' => function($q) { $q->orderBy('position'); }]);
        if ($year && $year !== 'all') {
            $query->whereYear('receive_date', $year);
        }
        $awards = $query->orderByDesc('receive_date')->get();
        return response()->json($awards);
    }

    public function newsDetail($id) {
        $news = \App\Models\News::with(['images' => function($q) { $q->orderBy('position'); }])->findOrFail($id);
        $slides = Slide::where('is_published', 1)
                ->where('category', 'news_detail')
                ->orderBy('position', 'asc')->get();
        return view('aboutus.mediacenter.news_detail', compact('news', 'slides'));
    }

    public function performance_highlight_detail(Request $request)
    {
        $slides = Slide::where('is_published', 1)
                ->where('category', 'sustainability_journey')
                ->orderBy('position', 'asc')->get();
        return view('sustainability.performance-highlight-detail', compact('slides'));
    }

    public function sustainability_governance_detail(Request $request)
    {
        $slug = $request->query('slug');
        $governance = \App\Models\SustainabilityGovernance::where('slug', $slug)->firstOrFail();
        $slides = Slide::where('is_published', 1)
                ->where('category', 'sustainability_journey')
                ->orderBy('position', 'asc')->get();
        return view('sustainability.sustainability-governance-detail', compact('governance', 'slides'));
    }
    
    
    public function documents_by_type($type)
    {
        $documents = \App\Models\Document::where('type', $type)->orderByDesc('created_at')->get();
        $slides = Slide::where('is_published', 1)->where('category', 'shareholders_documents')->orderBy('position', 'asc')->get();
        return view('investor.documents-by-type', compact('documents', 'type', 'slides'));
    }
}
