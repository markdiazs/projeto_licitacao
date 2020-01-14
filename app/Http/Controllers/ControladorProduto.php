<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorias;
use App\Produtos;

class ControladorProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Categorias::all();
        $products = Produtos::all();
        return view('produtos',['products'=>$products,'cats'=>$cats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $cats = Categorias::all();
        return view('novoproduto',compact('cats',$cats));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Produtos();
        $product->nome = $request->input('nomeProduto');
        $product->estoque = $request->input('estoqueProduto');
        $product->preco = $request->input('precoProduto');
        $product->categoria_id = $request->input('categoriaProduto');
        $product->save();
        return redirect('/produtos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $p = Produtos::find($id);
        $cats = Categorias::all();
        if(isset($p)){
            return view('editarproduto',['p'=>$p,'cats'=> $cats]);
        }
        return redirect('produtos');
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
        $p = Produtos::find($id);
        if(isset($p)){
            $p->nome = $request->input('nomeProduto');
            $p->estoque = $request->input('estoqueProduto');
            $p->preco = $request->input('precoProduto');
            $p->categoria_id = $request->input('categoriaProduto');
            $p->save();
            return redirect('produtos');
        }
        return redirect('produtos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Produtos::find($id);
        if(isset($p)){
            $p->delete();
            return redirect('produtos');
        }
        return redirect('produtos');
    }
}
