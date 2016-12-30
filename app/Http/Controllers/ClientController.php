<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Client;
use Storage;

class ClientController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth', ['except' => 'create']);
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //create a variable and store all the blog posts in it from the database
      $clients = Client::orderBy('id','desc')->paginate(4);
      //return a view and pass in the above variable
      return view('clients.index')->with('clients', $clients);


      //$search = \Request::get('search');
      //$clients = Client::where('title','like','%'.$search.'%')->orderBy('id','desc')->paginate(2);
      //$clients = Client::where('email','like','%'.$search.'%')->orderBy('id','desc')->paginate(2);
      //$clients = Client::where('city','like','%'.$search.'%')->orderBy('id','desc')->paginate(2);
      //return view('clients.index')->with('clients', $clients);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //dd($request); test and see the sent data
       //validate the data
      $this->validate($request, array(
               'name'            => 'required|max:255',
               'title'           => 'required|max:255',
               'email'           => 'required|min:5|max:50|email',
               'phone'           => 'required',
               'address'         => 'required|max:255',
               'city'            => 'required|max:255',
               'website'         => 'max:255',
               'body'            => 'required'
           ));
      //store in the database
       $client = new client;

       $client->name = $request->name;
       $client->title = $request->title;
       $client->email = $request->email;
       $client->phone = $request->phone;
       $client->address = $request->address;
       $client->city = $request->city;
       $client->website = $request->website;
       $client->body = $request->body;

       $client->save();

       //session message
       Session::flash('success','The client message was successfully added !');

      //redirect to another page
       return redirect()->route('client.show',$client->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $client = Client::find($id);
      return view('clients.show')->with('client', $client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //find the post in the database and save as a variable
      $client = Client::find($id);
      //return the view and pass in the variable we previously created
      return view('clients.edit')->with('client', $client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //validate the data
      $client = Client::find($id);

      $this->validate($request, array(
        'name'            => 'required|max:255',
        'title'           => 'required|max:255',
        'email'           => 'required|min:5|max:50|email',
        'phone'           => 'required',
        'address'         => 'required|max:255',
        'city'            => 'required|max:255',
        'website'         => 'max:255',
        'body'            => 'required'

          ));

      //save the data to the database
      $client = Client::find($id);

      $client->name = $request->name;
      $client->title = $request->title;
      $client->email = $request->email;
      $client->phone = $request->phone;
      $client->address = $request->address;
      $client->city = $request->city;
      $client->website = $request->website;
      $client->body = $request->body;

      $client->save();
      //set flash data with success message
      Session::flash('success','This client was successfully saved !');

      //rediredct with flash data to posts.show
      return redirect()->route('client.show', $client->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //find the item which will be deleted
      $client = Client::find($id);

      //detete the item
      $client->delete();

      //create a session flash
      Session::flash('success','This client was successfully deleted !');


      //redirect to the index page
      return redirect()->route('client.index');
    }
}
