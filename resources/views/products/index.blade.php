@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Produkty</div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($products as $product)
                          <div class="col-sm-6 col-md-3">
                            <div class="thumbnail centered">
                                
                                <a href=""><img img-thumbnail src="{{ $product->image }}" alt="..."></a>
                                <div class="caption">
                                    <h3>{{ $product->name }}</h3>
                                    <h4>{{ $product->price }} zł</h4>
                            
                                    <div class="clearfix">
                                        <p><a href="{{ Route('getCartAdd', $product->id) }}" class="btn btn-success" role="button">Do koszyka</a></p>
                                    </div>
                              </div>
                            </div>
                          </div>
                        @endforeach
                    </div> 
                    <div class="centered">
                    {{ $products->links() }} 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  
@endsection