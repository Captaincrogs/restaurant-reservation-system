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
                    <a href="/">Home</a></li>
                    <li role="presentation"><a href="/login">login</a></li>
                    <li role="presentation"><a href="/register">Register</a></li>
                    <li role="presentation"><a href="/products">Products</a></li>
                    <li class="active" role="presentation"><a href="/reservations">Kitchen admin panel</a></li>
                    <li role="presentation"><a href="/order">Waiter admin panel</a></li>
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
        <h1>Edit & add Reservations</h1>
        <p>??</p><p>??</p>
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default panel-table">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col col-xs-6">
                        <h3 class="panel-title">Products</h3>
                      </div>
                      <div class="col col-xs-6 text-right">
                      </div>
                    </div>
                  </div>
                  <div class="panel-body">
                    <table class="table table-striped table-bordered table-list">
                      <thead>
                        <tr>
                            <th><em class="fa fa-cog"></em></th>
                            <th class="hidden-xs">people</th>
                            <th>Name</th>
                            <th>user_message</th>
                            <th>date</th>
                            <th>time</th>
                            <th>status</th>
                        </tr> 
                      </thead>
                      <tbody>
                        @foreach($reservations as $reservation)
                              <tr>
                                <td align="center">
                                  <form action="reservations/destroy" enctype="multipart/form-data" method="post">
                                    @csrf
                                  <input type="hidden" name="id" value="{{$reservation->id}}">
                                  <input type="submit" onclick="return confirm('Are you sure?')" name="Destroy" value="delete" class="btn btn-danger">
                                  </form>
                                  <form action="reservations/update" enctype="multipart/form-data" method="post">
                                    @csrf
                                  <input type="hidden" name="id" value="{{$reservation->id}}">
                                  <input type="submit" name="attended" value="attended?" class="btn btn-info">
                                  </form>
                                </td>
                                {{-- <td class="hidden-xs"></td> --}}
                                <td>{{$reservation->people}}</td>
                                <td>{{$reservation->user->name}}</td>
                                <td>{{$reservation->message}}</td>
                                <td>{{$reservation->date}}</td>
                                <td>{{$reservation->time}}</td>
                                <td>
                                  @if($reservation->status == 'attended')
                                    <button type="button" class="btn btn-success">{{$reservation->status}}</button>
                                  @else
                                    <button type="button" class="btn btn-danger">{{$reservation->status}}</button>
                                  @endif
                              </tr>
                             </form>
                             @endforeach
                            </tbody>
                    </table>
                  </div>
                  <div class="panel-footer">
                    <div class="row">
                      <div class="col col-xs-4">Page 1 of 5
                      </div>
                      <div class="col col-xs-8">
                        <ul class="pagination hidden-xs pull-right">
                          <li><a href="#">1</a></li>
                          <li><a href="#">2</a></li>
                          <li><a href="#">3</a></li>
                          <li><a href="#">4</a></li>
                          <li><a href="#">5</a></li>
                        </ul>
                        <ul class="pagination visible-xs pull-right">
                            <li><a href="#">??</a></li>
                            <li><a href="#">??</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
    </div></div></div>
<div class="container">
	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form action="reservations/store" enctype="multipart/form-data" method="post">
            @csrf
          <fieldset>
            <legend class="text-center">New reservation</legend>
            <div class="col-md-6"> 
              <label for="product_quantity">Date</label> 
              <input type="date" name="date" class="bg-light form-control" placeholder="29-11-1997"> </div>
            <div class="col-md-6"> 
              <label for="time">time</label> 
              <input type="text" name="time" class="bg-light form-control" placeholder="10:00"> </div>
                <div class="col-md-6"> 
                  <label for="product_quantity">Message</label> 
                  <input type="text" name="message" class="bg-light form-control" placeholder="client message"> </div>
                  <div class="col-md-6"> 
                    <label for="people">Amount of people</label> 
                    <input type="number" name="people" class="bg-light form-control" placeholder="amount"> </div>
            <div class="col-md-6 pt-md-0 pt-3">
            <div class="form-group">
              <label for="product_quantity">Select client</label> 
              <select name="user_id" class="form-control">
                @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
              </select>
            </option>
              </fieldset>
          <div class="py-3 pb-4 border-bottom"> 
            <button class="btn btn-primary mr-3" type="submit">Save Changes</button> 
        </form>
          </form>
          
        </div>
      </div>
	</div>
</div>
</body>


