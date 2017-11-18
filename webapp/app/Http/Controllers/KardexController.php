<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use DB;
    class KardexController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            //
            return view('kardex.index');
        }

        public function indexOrders()
        {
            $suppliers=DB::table('suppliers')->get();
            return view('order.index',['suppliers'=>$suppliers]);
        }

        public function getKardex()
        {
            $suppliers=DB::table('suppliers')->get();
            $details_orders=DB::table('details_orders')->get();
            $query = DB::table('details_orders')
                ->join('orders','orders.id','=','details_orders.orders_id')
                ->join('products','products.id','=','details_orders.products_id')
                ->join('suppliers_products','orders.suppliers_products_id','=','suppliers_products.id')
                ->join('suppliers','suppliers.id','=','suppliers_products.suppliers_id')
                ->select('orders.*','products.*','suppliers.*','CAT_ORDERSTATUS')
                ->get();
            return view('order.index',['orders'=>$query,'details_orders'=>$details_orders,'suppliers'=>$suppliers]);

        }

        public function storeBuy(Request $request)
        {
             $sells=DB::table('sells')->insertGetId([
                    'date'          =>$request->date,
                    'total'         =>0,
                    'quantitySell'    =>0,
                    'reservations_id' =>$request->idreservation
                ]);


            $sell_q=$request->quantity;
            $suppliers_products=DB::table('suppliers_products')
                ->join('products','products.id','=','suppliers_products.products_id')
                ->select('suppliers_products.id')
                ->where('products.id',$request->idproduct)
                ->get();
            foreach($suppliers_products as $supplier)
            {
                $data=$supplier->id;
            }

            $orders=DB::table('details_orders')
                ->where('products_id',$request->idproduct)
                ->get();
            //dd('<script type="text/javascript">'.'alert("yay")'.'<script>');
            $rest=0;
            $cont=0;
            foreach($orders as $order)
            {
                $cont++;
                //$rest=$sell_q-$order->quantity;
                $sell_q=$sell_q-$order->quantity;
                $rest=$sell_q;
               /*
                if($rest<0)
                {
                    $rest=$rest*-1;
                }
                */
                if($rest>=0)
               //if($rest>=0)
                {
                    $total=$rest-$order->quantity;
                    if($total<0)
                    {
                        $total=$total*-1;
                    }
                    DB::table('details')->insert([
                        'subtotal'      =>$order->subtotal,
                        'quantity'      =>$order->quantity,
                        'sells_id'      =>$sells,
                        'suppliers_products_id'=>$data
                    ]);

                }else{

                    break;
                }

            }
           /*
            $price_b=DB::table('details_orders')
                ->where('')
                */
            //echo "<script>console.log( 'Debug Objects: " . $val . "' );</script>";










            /*
            if($request->flag)
            {


            $sells=DB::table('sells')->insertGetId([
                'date'          =>$request->date,
                'total'         =>0,
                'quantitySell'    =>0,
                'reservations_id' =>$request->idreservation
            ]);

            }
            $suppliers_products=DB::table('suppliers_products')
                ->join('products','products.id','=','suppliers_products.products_id')
                ->select('suppliers_products.id')
                ->where('products.id',$request->idproduct)
                ->get();
                foreach($suppliers_products as $supplier)
                {
                    $data=$supplier->id;
                }

            //echo "<script>console.log( 'Debug Objects: " . $val . "' );</script>";
            DB::table('details')->insert([
                'subtotal'       =>$request->price,
                'quantity'      =>$request->quantity,
                'sells_id'      =>$sells,
                'nit'           =>'10900667',
                'name'          =>'Ricardo',
                'lastname'      =>'Mollinedo',
                'suppliers_products_id'=>$data
            ]);
            */
        }
        public function indexSells()
        {
            return view('sell.index');
        }

        public function bySupplier($id)
        {
            $products=DB::table('suppliers')
                ->join('suppliers_products','suppliers_products.suppliers_id','=','suppliers.id')
                ->join('products','products.id','=','suppliers_products.products_id')
                ->select('products.*','suppliers.*','suppliers_products.*','products.id as idproduct','suppliers_products.id as sup_pro_id')
                ->where('suppliers.id',$id)
                ->get();
            return response()->json($products);
        }
        public function listOrders()
        {
            $products=DB::table('products')->get();
            return response()->json($products);
        }

        public function getOrders()
        {
            $suppliers=DB::table('suppliers')->get();
            $details_orders=DB::table('details_orders')->get();
            $query = DB::table('details_orders')
                ->join('orders','orders.id','=','details_orders.orders_id')
                ->join('products','products.id','=','details_orders.products_id')
                ->join('suppliers_products','orders.suppliers_products_id','=','suppliers_products.id')
                ->join('suppliers','suppliers.id','=','suppliers_products.suppliers_id')
                ->select('orders.*','products.*','suppliers.*','CAT_ORDERSTATUS')
                ->get();
            return view('order.index',['orders'=>$query,'details_orders'=>$details_orders,'suppliers'=>$suppliers]);
        }



        public function createOrder(Request $request)
        {
            $suppliers_products=DB::table('suppliers_products')
                ->join('products','products.id','=','suppliers_products.products_id')
                ->where('products_id','=',$request->products_id)
                ->where('suppliers_id','=',$request->supplier_id)
                ->select('suppliers_products.id','products.quantity as quant')
                ->get();
            foreach($suppliers_products as $suppro)
            {
                $idsuppro=$suppro->id;
                $quantity=$suppro->quant;
            }

            DB::table('products')
                ->where('id', $request->products_id)
                ->update([
                    'quantity' => $request->orderQuantity + $quantity,
            ]);


            $orders=DB::table('orders')->insertGetId([
                'total' => 0,
                'dateorder' => '17-02-2017',
                'quantityOrder' => 0,
                'suppliers_products_id' =>$idsuppro
            ]);

            DB::table('details_orders')->insert([
                 'subtotal'=>$request->orderPrice,
                 'quantity'=>$request->orderQuantity,
                 'products_id'=>$request->products_id,
                 'orders_id'=>$orders,
                 'date'=>'07-07-2017',
                 'quantityReceived'=>$request->quantityReceived,
                 'CAT_ORDERSTATUS'=>'recibido'
            ]);
            /*
            $product=$request->productName;
            $idprod=DB::table('products')
                ->select('id')
                ->where('name',$product)
                ->get();

            $product_supplier=
            DB::table('products')
                ->where('id',$idprod);



            /*
            $product=$request->productName;
            //if()
            //$state=$request->state;
            //$state_cat=DB::table('catalogs')->where('name',$state)->value('description');

                $idprod=DB::table('products')
                    ->where('name',$product)
                    ->get();

                $product_id=DB::table('products')
                    ->where('name',$product)
                    ->update([
                   'price'         =>$request->orderPrice,
                   'quantity'      =>$request->orderQuantity,
                    ]);




               $order_id=DB::table('orders')->insertGetId([
                   'total'         =>$request->orderPrice,
                   'quantityOrder' =>$request->orderQuantity,
                   'suppliers_id'  =>$request->supplier_id,
                   'dateorder'     =>date("Y-m-d H:i:s")
                ]);
            foreach($idprod as $prod)
            {
                $nodata=$prod->id;
            }
                DB::table('details_orders')->insert([
                   'subtotal'      =>$request->orderPrice,
                   'quantity'      =>$request->orderQuantity,
                   'orders_id'     =>$order_id,
                   'products_id'   =>$nodata,
                   'date'          =>date("Y-m-d H:i:s"),
                   'quantityReceived' => $request->quantityReceived,
                   'CAT_ORDERSTATUS'=>$request->state
                ]);
            */
        }


        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            //
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
            //
            $supplier = Supplier::find($id);
            return $supplier;
        }

        public function OrderState($id)
        {
            $user = DB::table('details_orders')->where('id', $id)->first();
            return response()->json($user);
        }
        public function StateUpdate(Request $request)
        {
            $state=DB::table('details_orders')
                     ->where('id', $request->id)
                     ->update(['CAT_ORDERSTATUS' => $request->state,]);
            $statedata=DB::table('details_orders')
                     ->where('id',$request->id)->get();
            return response()->json($statedata);
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

        public function destroySell(Request $request)
        {
            DB::table('details')->where('id','=',$request->id)->delete();
        }
    }
