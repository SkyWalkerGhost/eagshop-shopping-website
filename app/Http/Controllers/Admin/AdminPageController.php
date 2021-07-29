<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Repositories\AdminPageRepository;

class AdminPageController extends Controller
{
    private $adminPageRepository;

    public function __construct(AdminPageRepository $adminPageRepository)
    {
        $this->adminPageRepository = $adminPageRepository;
    }

    public function index()
    {
        return view('admin.index')->with([
            'productCount'      => $this->adminPageRepository->productCount(), 
            'totalPrice'        => $this->adminPageRepository->totalPrice(), 
            'totalProduction'   => $this->adminPageRepository->totalProductionQuantity(),
            'numberOfShopUser'  => $this->adminPageRepository->numberOfShopUser(),
            'numberOfCategory'  => $this->adminPageRepository->numberOfCategory(),
            'visitorCount'      => $this->adminPageRepository->visitorCount(),
        ]);
    }

    public function createProduct()
    {
        return view('admin.pages.product.create')->with([
            'categories'        => $this->adminPageRepository->getCategory(),
        ]);
    }

    public function addCategory()
    {
        return view('admin.pages.category.index');
    }

    public function productTable()
    {
        return view('admin.pages.product.index')->with([
            'products'          => $this->adminPageRepository->productTable(), 
            'productCount'      => $this->adminPageRepository->productCount(), 
            'categories'        => $this->adminPageRepository->getCategory(),
        ]);
    }

    public function visitor()
    {
        return view('admin.pages.visitor.index')->with([
            'visitorCount'      => $this->adminPageRepository->visitorCount(),
            'visitorData'       => $this->adminPageRepository->visitorData(),
        ]);
    }

    public function deleteVisitor()
    {
        $this->adminPageRepository->deleteVisitorRow();
        return back()->with('success', 'ჩანაწერი წაშლილია');
    }
}
