@extends('layouts.app')
@section('link')
<link rel="stylesheet" href="{{asset('style/admin/table/node_modules/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{asset('style/admin/table/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')}}">
<link rel="stylesheet" href="{{asset('style/admin/table/node_modules/rickshaw/rickshaw.min.css')}}" />
<link rel="stylesheet" href="{{asset('style/admin/table/bower_components/chartist/dist/chartist.min.css')}}" />

@endsection

@section('navigation')
<h3><i class="fas fa-tachometer-alt"></i> Dashboard<small> View Your Products</small></h3><hr>
<ol class="breadcrumb">
    <li><a class="active"><i class="fas fa-tachometer-alt"></i> dashboard</a></li>
    <li><a href="#">products</a></li>
</ol>
@endsection
@section('content')
    @include('admin.includes.message')
 
    
    <div class="content-wrapper">
        	
            <h3 class="page-title text-center">Products Table</h3><hr>
           
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <table id="order-listing" class="table table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Product #</th>
                            <th>Name</th>
                            <th>description</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>User</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($products as $product)
                        @if(!empty($product->user->id) and !empty($product->category->id))
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>@php echo str_limit($product->description,300) @endphp</td>
                            <td><img src="{{URL::to($product->image)}}" width="60px"></td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->user->name}}</td>
                            <td> <a href="{{route('products.show',$product->id)}}"><span style="color:green"><i class="far fa-eye"></i></span></a></td>
                            <td><a href="{{route('products.edit',$product->id)}}" ><span style=""><i class="fas fa-pencil-alt"></i></span></a></td>
                            <td><a href="{{route('products.delete',$product->id)}}" id="delete"><span style="color:#DD4F43"><i class="fas fa-trash-alt"></i></span></a></td>
                         </tr>
                         @endif
                        @empty
                        <tr>
                            <td><h4></h4></td>
                            <td><h4></h4></td>
                            <td><h4></h4></td>
                            <td><h4></h4></td>
                            <td><h4>No product</h4></td>
                            <td><h4></h4></td>
                            <td><h4></h4></td>
                            <td><h4></h4></td>     
                            <td><h4></h4></td>                                                                                                                              
                    </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
<hr>

          <h3 class="page-title text-center">Categoies Table</h3><hr>
          
            
        <div class="row">
            <div class="col-md-12">   
                    <ul class="nav navbar-nav">
                           <li><a href="#" class="navbr-rand">Categories =></a></li>
                      @forelse($categories as $category)
                       <li>
                          <a href="{{route('categories.show',$category->id)}}">{{$category->name}}</a>
                       </li>
                      @empty
                      <li><a href="#">No Category</a></li>    
                      @endforelse
                   </ul>
               </div>
         </div>     
        
        @if(!empty($category_products))
        <section>
            <div class="row">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Products</th> 
                    <th>Categories</th> 
                </tr>                 
                </thead>
                <tbody>
                @forelse($category_products as $category_product)
                @if(!empty($category_product->category->id))
                <tr>
                    <td>{{$category_product->id}}</td>  
                    <td>{{$category_product->name}}</td> 
                    <td>{{$category_product->category->name}}</td>        
        
                </tr>  
                @endif
                @empty
                <tr>
                    <td></td>
                    <td>No Product</td>  
                    <td></td>        
                    <td></td>
                </tr>  
                @endforelse                    
                </tbody>
            </table>
        </div>
        </section>
        @endif
        







@endsection
@section('js')
<!-- table js-->	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{asset('style/admin/table/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('style/admin/table/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('style/admin/table/js/data-table.js')}}"></script>
<!-- end table js -->
@endsection