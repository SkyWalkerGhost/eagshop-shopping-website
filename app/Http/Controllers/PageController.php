<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Repositories\FrontRepository;

class PageController extends Controller
{
   private $frontRepository;

   public function __construct(FrontRepository $frontRepository)
   {
      $this->frontRepository = $frontRepository;
   }

   public function index()
   {
      return view('front.index')->with([
         'categories'               => $this->frontRepository->getCategory(),
      ]);
   }

   public function show($product_id, $name)
   {
      return view('front.show.index')->with([
         'productView'              => $this->frontRepository->productView(),
         'productReviews'           => $this->frontRepository->productReviews(),
         'suggestCategory'          => $this->frontRepository->suggestProductCategory(),
         'getProductView'           => $this->frontRepository->getProductView(),
      ]);
   }

   public function category(Request $request, $name)
   {
      return view('front.category.index')->with([
         'getProductByPercent'      => $this->frontRepository->getProductByPercent(),
         'categories'               => $this->frontRepository->getCategory(),
         'suggestProductCategory'   => $this->frontRepository->suggestCategory(),
      ]);
   }

   public function search()
   {
      return view('front.search.index')->with([
         'searchResults'            => $this->frontRepository->searchProduct(),
      ]);
   }

}
