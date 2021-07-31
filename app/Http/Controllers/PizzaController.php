<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Pizza;


class PizzaController extends Controller
{
    public function index() {
        // $pizzas = Pizza::all();  
       // $pizzas = Pizza::orderBy('name', 'desc')->get();
      //$pizzas = Pizza::where('type', 'hawaiin')->get();
      $pizzas = Pizza::latest()->get();      

    return view('pizzas.index', [
      'pizzas' => $pizzas,
    ]);

      }
    
      public function show($id) {

        $pizza = Pizza::findOrFail($id);
        return view('pizzas.show', ['pizza' => $pizza]);
      }
      
      public function create() {
        return view('pizzas.create');
      }

      public function store() {


        // $pizza = new Pizza();
        // error_log(request('name'));
        // error_log(request('type'));
        // error_log(request('base'));

        $pizza = new Pizza();
        $pizza->name = request('name');
        $pizza->jinsi = request('jinsi');
        $pizza->type = request('type');
        $pizza->base = request('base');  
        $pizza->phone_number = request('phone_number');
        $pizza->toppings = request('toppings');
        $pizza->save();
        return redirect('/')->with('mssg', 'Thanks for your order!');
      }
        public function delete($id) {
          $pizza = Pizza::findOrFail($id);
          $pizza->delete();
          return redirect('/pizzas');
        
      }
}
