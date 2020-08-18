<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Is a triangle valid ?</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-sm bg-light navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item active">
                <a class="nav-link" href="#">Check for valid triangle</a>
                </li>
            </ul>
        </nav>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset('solutions-asset/question-image.png')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Is a triangle valid ?</h5>
                        <small id="emailHelp" class="form-text text-muted">
                            Check wether all side lengths will be less than the combined length of the other 2 sides.
                        </small>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h5 class="card-title">Enter sides of a triangle.</h5>
                <form>
                    <div class="form-group">
                        <label for="side_1"> Side 1</label>
                        <input class="form-control" type="number" name="side_1" id="side_1" required>
                    </div>
                    <div class="form-group">
                        <label for="side_2"> Side 2</label>
                        <input class="form-control" type="number" name="side_2" id="side_2" required>
                    </div>
                    <div class="form-group">
                        <label for="side_3"> Side 3</label>
                        <input class="form-control" type="number" name="side_3" id="side_3" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="check-validity">Check Triangle Validity</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function(){
            jQuery("form").submit(function(e){
                e.preventDefault(); 
                let a = parseInt($('#side_1').val());
                let b = parseInt($('#side_2').val());
                let c = parseInt($('#side_3').val());
                if(
                    a < (b + c) &&
                    b < (a + c) &&
                    c < (b + a) 
                ){
                    swal("It is a valid Triangle !");
                }else{
                    swal("It is not a valid Triangle !");
                }
            });
        });
    </script>
</html>