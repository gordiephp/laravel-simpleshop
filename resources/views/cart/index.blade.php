@extends('layouts.app')

@section('content')

@if(Session::has('cart'))
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Koszyk</h4></div>
                <div class="panel-body">
                    <div class="row">
                          <div class="table-responsive">
                               <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="col-md-1 text-center">Zdjęcie</th>
                                            <th class="col-md-3 text-center ">Przedmiot</th>
                                            <th class="col-md-2 text-center">Cena</th>
                                            <th class="col-md-1 text-center">Ilość</th>
                                            <th class="col-md-1 text-center"></th>
                                            <th class="col-md-4 text-center"></th>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        @foreach($products as $product)
                                        <tr>
                                            <td>
                                                <img class="img-responsive img-thumbnail " src="{{ $product['item']['image'] }}">
                                            </td>
                                            <td class="text-center">
                                                <strong>{{ $product['item']['name'] }}</strong>
                                            </td>
                                            
                                            <td class="text-center"><span class="label label-success">{{ $product['price'] }} zł</span> 
                                            </td> 
                                            
                                            <td class="text-center">  
                                                <input form="form{{ $product['item']['id'] }}" class="form-control input-sm" type="text" value="{{ $product['quantity'] }}" name="item_quantity">
                                            </td>
                                            
                                            <td>
                                            
                                                 <form id="form{{ $product['item']['id'] }}" action="{{ Route('CartUpdate', $product['item']['id']) }}" method="post">
                      
                                                     <button  type="submit" class="btn btn-primary">Aktualizuj ilość</button>
                                                    {{ method_field('PATCH') }}
                                                    {{ csrf_field() }}
                                                </form>
                                                
                                            </td>
                                            <td>
                                              
                                                <form action="{{ Route('CartDelete', $product['item']['id']) }}" method="post">
                                                    <button type="submit" class="btn btn-danger">Usuń</button>
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                </form>
                                             
                                            </td>
                                            
                                            
                                           
                                            
                                            
                                        </tr>
                                          @endforeach
                                 </tbody>
                                </table>
                          </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-6 col-md-offset-0">
                            <h3>Suma: {{ $totalPrice }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="row">
         <div class="col-md-12 col-md-offset-0">
             <div class="panel panel-default">
                <div class="panel-heading">Koszyk</div>
                  <div class="panel-body">
                    <p>Brak przedmiotów</p>
                 </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

   
                        
                                  
                                   
                            
                 