<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Repositories\ClientRepository;
use Illuminate\Http\Request;

use CodeProject\Http\Requests;
use Illuminate\Support\Facades\Input;

class ClientController extends Controller
{

    /*
     * @var ClientRepository
     */
    protected $repository;

    /**
     * ClientController constructor.
     */
    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return $this->repository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //dd(Input::all());
        $client = $this->repository->create( $request->all() );
        return $client;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $client = $this->repository->find($id);
        if (isset($client)){
            $client->update($request->all());
            return $client;
        }
        return 0;

        //return $this->repository->find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $client = $this->repository->find($id);
        if (isset($client)){
            $client->delete();
            return 1;
        }
        return 0;
    }
}
