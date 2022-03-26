<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Compra;
use App\Models\Factura;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        if ($user->admin == true) {
            $usuarios = User::with('compras')->has('compras','>' ,0)->get();

        }else{
            return redirect('miscompras');

        }

        return view('compras',['usuarios'=>$usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function comprar(Request $request)
    {

        $compra = new Compra;
        $compra->producto_id = $request['producto_id'];
        $compra->user_id = Auth::id();
        $compra->cantidad = $request['cantidad'];
        $compra->save();

        return redirect('miscompras');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generarFactura(Request $request)
    {
        $compras = Compra::with('user','producto')->where('user_id',$request['user_id'])->get();
        $total_productos = 0;
        $total_impuestos = 0;
        $total = 0;
        foreach ($compras as $c) {

            $total_producto = $c['cantidad']*$c['producto']['precio'];
            $total_productos = $total_productos + $total_producto;

            $impuesto_producto = ($total_producto*$c['producto']['impuesto'])/100;
            $total_impuestos = $total_impuestos + $impuesto_producto;

            $total_1 = $total_producto+$impuesto_producto;

            $total = $total + $total_1;



        }

        $factura = new Factura;
        $factura->user_id = $request['user_id'];
        $factura->total_productos = round($total_productos);
        $factura->total_impuestos = round($total_impuestos);
        $factura->total = $total;
        $factura->save();


        foreach ($compras as $cf) {
            $compra_facturada = Compra::find($cf['id']);
            $compra_facturada->factura_id = $factura->id;
            $compra_facturada->facturada = 1;
            $compra_facturada->save();
        }
        return redirect('miscompras');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function compras_usuarios($id)
    {
        $compras = Compra::with('user','producto')->where('user_id',$id)->get();
        return view('compras-usuarios',['compras'=>$compras,'user_id'=>$id]);
    }

    public function miscompras()
    {
        $user = auth()->user();
        $compras = Compra::with('user','producto')->where('user_id',$user->id)->get();
        return view('miscompras',['compras'=>$compras,'user_id'=>$user->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
