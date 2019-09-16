<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = "ABC Inc.";
        return view('pages.index')->with('title', $title);
        // return view('index', compact('title'));
        // return view('index');
    }

    public function about(){
        return view("pages.about");
    }

    public function hello(){
        return view('pages.hello');
    }

    public function services(){
        $price = $this->calculate();
        $data = array(
            'title' => "Services",
            'content' => ["Audit", "Invoice", "Quotation"],
            'price' => $price
        );
        return view('pages.service')->with($data);
    }

    public function mainInput(){
        $data = array(
            'username' => "Zul",
            'name' => "Mohamad Zul Ikmal",
            'dept' => "International Sale",
            'stat' => 'Active',
            'tData' => [
                    'tabl1' => 'ass',
                    'tabl2' => 'dsdas',
                    'tabl3' => 'asdasd'
                ]
        );
        return view('pages.mainInputScreen')->with($data);
    }

    public function calculate(){
        $itemSale = "Pencil";
        $profitRate = ".15";
        $itemPrice = "15.0";
        $itemCount = "3";

    return ($itemPrice * $itemCount) * $profitRate;
    }
}
