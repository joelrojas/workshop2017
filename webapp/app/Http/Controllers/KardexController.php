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

        public function storeBuy(Request $request)
        {
            $sells=DB::table('sells')->insertGetId([
                'date'          =>$request->date,
                'total'         =>$request->price,
                'quantitySell'      =>$request->quantity,
                'reservations_id' =>$request->idreservation
            ]);
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
            //$products=DB::table('suppliers_')

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
                ->select('products.*','suppliers.*','suppliers_products')
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
                ->join('suppliers','suppliers.id','=','orders.suppliers_id')
                ->select('orders.*','products.*','suppliers.*','CAT_ORDERSTATUS')
                ->get();
            return view('order.index',['orders'=>$query,'details_orders'=>$details_orders,'suppliers'=>$suppliers]);
        }



        public function createOrder(Request $request)
        {
            $product=$request->productName;
            //if()
            //$state=$request->state;
            //$state_cat=DB::table('catalogs')->where('name',$state)->value('description');
                $product_id=DB::table('products')->insertGetId([
                   'name'          =>$request->productName,
                   'price'         =>$request->orderPrice,
                   'quantity'      =>$request->orderQuantity,
                   'productType'   =>$request->productType
                ]);



               $order_id=DB::table('orders')->insertGetId([
                   'total'         =>$request->orderPrice,
                   'quantityOrder' =>$request->orderQuantity,
                   'suppliers_id'  =>$request->supplier_id,
                   'dateorder'     =>date("Y-m-d H:i:s")
                ]);

                DB::table('details_orders')->insert([
                   'subtotal'      =>$request->orderPrice,
                   'quantity'      =>$request->orderQuantity,
                   'orders_id'     =>$order_id,
                   'products_id'   =>$product_id,
                   'date'          =>date("Y-m-d H:i:s"),
                   'quantityReceived' => $request->quantityReceived,
                   'CAT_ORDERSTATUS'=>$request->state
                ]);

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
