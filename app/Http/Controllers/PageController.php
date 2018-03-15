<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Photo;
use App\Destination;
use App\Tour;
use App\TourImage;
//use DB;

class PageController extends Controller
{
    public function index()
    {
		$popular_tours = Tour::with('tourimages')
				->get()
				->random(7);
				//return $popular_tours;exit;
		$deal_and_discounts = Tour::with('tourimages')
				->where('offer','!=',null)
				->limit(3)
				->get();
		
		$count = $deal_and_discounts->count();
				
		if ($count >=3)
		{
			$random = $deal_and_discounts->random(3);
		}
		
		/*$tours = DB::table('tours')
            ->join('tour_images', 'tours.id', '=', 'tour_images.tour_id')
            ->select('tours.*', 'tour_images.file')
            ->get();
			//$players = players::paginate(6);*/
			
		$destinations = Destination::with('photo')
					->get()
					->random(7);
					
        return view('pages.home')
		->with('destinations', $destinations)
		->with('popular_tours', $popular_tours)
		->with('deal_and_discounts', $deal_and_discounts);
    }
	
	public function contact()
    {
        return view('pages.contact');
    }
	
	public function traveltips()
    {
        return view('pages.traveltips');
    }
	
	public function tours()
    {
		$tours = Tour::with('tourimages')
				->paginate(8);
		/*$tours = DB::table('tours')
            ->join('tour_images', 'tours.id', '=', 'tour_images.tour_id')
            ->select('tours.*', 'tour_images.file')
			->groupBy('id')
			->get();*/
		//return $tours;exit;
        return view('pages.tours', compact('tours'));
    }
	
	public function holidays()
    {
		/*$tours = Tour::with('tourimages')
				->join('categories', 'tours.category_id', '=', 'categories.id')
				->where('categories.name','HOLIDAYS')
				->paginate(8);*/
		$tours = Tour::with('tourimages')
				->where('category_id',2)
				->paginate(8);
		/*$tours = DB::table('tours')
            ->join('tour_images', 'tours.id', '=', 'tour_images.tour_id')
            ->select('tours.*', 'tour_images.file')
			->groupBy('id')
			->get();*/
		//return $tours;exit;
        return view('pages.holidays', compact('tours'));
    }
	
	public function citybreaks()
    {
		$tours = Tour::with('tourimages')
				->where('category_id',1)
				->paginate(8);
		/*$tours = DB::table('tours')
            ->join('tour_images', 'tours.id', '=', 'tour_images.tour_id')
            ->select('tours.*', 'tour_images.file')
			->groupBy('id')
			->get();*/
		//return $tours;exit;
        return view('pages.citybreaks', compact('tours'));
    }
	
	public function specialoffers()
    {
		$tours = Tour::with('tourimages')
				->where('category_id',3)
				->orWhere('offer','!=',null)
				->paginate(8);
		/*$tours = DB::table('tours')
            ->join('tour_images', 'tours.id', '=', 'tour_images.tour_id')
            ->select('tours.*', 'tour_images.file')
			->groupBy('id')
			->get();*/
		//return $tours;exit;
        return view('pages.specialoffers', compact('tours'));
    }
}
