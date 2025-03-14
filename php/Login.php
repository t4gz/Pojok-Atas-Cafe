<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</head>
<body>
    <!-- navbar -->
    <nav class="navbar bg-dark ">
        <div class="container ">
        <div class="row">
            <div class="col-sm-6">
                <a class="navbar-brand" href="#page-top"><img src="../images/icon_pjk.svg" alt="..."  width="150px"/></a>        </div>
            </div>
            <div class="col-sm-6 text-end">
                <a href="../Pages/Admin_Dashboard.php" class="btn btn-warning text-black">LOGIN TEMP</a>
            </div>
        </div>
    </nav>
    
    
    <div class="container mt-1 pt-3">
        <form>
        <!-- Email input -->
        <div data-mdb-input-init class="form-outline mb-4  fs-3">
            <label class="form-label fs-5 fw-normal col-4" for="user">Username</label>
            <input type="text" id="user" class="form-control fw-light" placeholder="Masukkan username anda" />

        </div>

        <!-- Password input -->
        <div data-mdb-input-init class="form-outline mb-4  fs-3">
            <label class="form-label  fs-5 fw-normal  col-4" for="pasw">Password</label>
            <input type="password" id="pasw" class="form-control fw-light" placeholder="Masukkan password anda" />

        </div>
        
        <hr>

        <div class="text-center">
            <!-- Submit button -->
            <button type="submit" class="btn btn-dark fw-normal  text-warning mb-4 col-3 btn-sm rounded-3" >Log in</button>
            <br>
            
        </div>


        </form>
    </div>
</body>
</html>
