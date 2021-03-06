<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olson's Baking Company</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/readable/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.9.0/css/lightbox.min.css">
    <link rel="stylesheet" href="css/styles.min.css">
</head>
<header>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link <strong>#</strong> Excellent taste</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
              <ul class="nav navbar-nav navbar-right">
                <li role="presentation"><a href="/login">login</a></li>
                <li role="presentation"><a href="/register">Register</a></li>
                <li role="presentation"><a href="/products">Products</a></li>
                <li role="presentation"><a href="/reservations">Kitchen admin panel</a></li>
                <li class="active" role="presentation"><a href="/order">Waiter admin panel</a></li>
                <li role="presentation"><a href="#">Contact Us</a></li>
            </ul>
            </div>
        </div>
    </nav>
</header>
<body>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    
    <div class="container">
        <div class="row">
        
        <p></p>
        <br>
        <br>
        <br>
        <h1>Add new products for clients</h1>

        @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif

        <p>??</p><p>??</p>
            <div class="col-md-10 col-md-offset-1">
    
                <div class="panel panel-default panel-table">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col col-xs-6">
                        <h3 class="panel-title">Products</h3>
                      </div>
                      <div class="col col-xs-6 text-right">
                        <button type="button" class="btn btn-sm btn-primary btn-create">Insert new product</button>
                      </div>
                    </div>
                  </div>
                  <div class="panel-body">
                    <table class="table table-striped table-bordered table-list">
                      <thead>
                        <tr>
                            <th><em class="fa fa-cog"></em></th>
                            <th class="hidden-xs">ID</th>
                            <th>Client</th>
                            <th>Product</th>
                            <th>Decription</th>
                            <th>Price</th>
                            <th>category</th>
                            <th>total dishes</th>
                        </tr> 
                      </thead>
                      <tbody>
                        @foreach ($reservations as $reservation )
                        @if ($reservation->status == 'attended')
                        @foreach ($orders as $order )
                          <tr>
                            <td align="center">
                              <form action="order/remove" enctype="multipart/form-data" method="post">
                                @csrf
                              <input type="hidden" name="id" value="{{$reservation->id}}">
                              <input type="submit" value="Delete" class="btn btn-danger">
                            </td>
                            <td>{{$reservation->id}}</td>
                            <td>{{$reservation->user->name}}</td>
                            <td>{{$order->product->name}}</td>
                            <td>{{$order->product->description}}</td>
                            <td>???{{$order->product->price}}</td>
                            <td>{{$order->product->category}}</td>
                            <td>{{$order->product_count}}</td>
                          </tr>
                            <div class="form-group">
                      @endforeach
                      @elseif ($reservation->status == 'pending')
                      <h1>No attended reservations no orders can be placed</h1>
                      @endif
                      @endforeach
                              </form>
                            </tbody>
                    </table>
                
                  </div>
                  <div class="panel-footer">
                    <div class="row">
                      <div class="col col-xs-4">Page 1
                      </div>
                    
                    </div>
                  </div>
                </div>
    
    </div></div></div>
   

<div class="container">
	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form action="order/neworder" enctype="multipart/form-data" method="post">
            @csrf
          <fieldset>
            <legend class="text-center">Add new order</legend>

            <div class="col-md-6"> 
              <label for="user">attending client</label> 
              <select name="user_id" class="form-control">
                @foreach ($reservations as $reservation )
                <option value="{{$reservation->id}}">{{$reservation->user->name}}</option>
              @endforeach
              </select>
            </option>
             </div>
            <div class="col-md-6">
               <label for="product">Product</label>
               <select name="product_id" class="form-control">
                @foreach ($products as $product )
                <option value="{{$product->id}}">{{$product->name}}</option>
              @endforeach
              </select>
            </option>
            </div>
            <div class="col-md-6">
               <label for="quantity">Quantity</label>
                <input type="number" name="quantity" class="bg-light form-control" placeholder="qty">
               </div>
              
                <div class="col-md-6">
                  <div class="border-bottom"> 
                    <br>
                    <button class="btn btn-primary" type="submit">Save Changes</button> 
                  </div>
                 
            <div class="col-md-6 pt-md-0 pt-3">
            <div class="form-group">
              
          </fieldset>
         
        </form>
          </form>
          
        </div>
      </div>
	</div>
</div>
</body>
