<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/indexstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <title>Pharmacy Shop</title>
</head>
<body>
<div class="baranavigatie">
    <a href="store.php"><img src="../images/logo.png" width="55px" height="70" id="logo"></a>
</div>
<div class="container">
    <ul class="nav mt-3 shadow-sm p-3 mb-5 bg-white rounded">
        <li class="nav-item">
            <a class="nav-link active" href="store.php"><i class="fas fa-home"></i> ACASA</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i> COS</a>
        </li>
    </ul>

    <h3 id="magazin-produse-title" class="mt-5 mb-4"><i class="fas fa-shopping-cart"></i> Cos</h3>

    <div class="shop-cart-products">
        <table class="table">
            <tr class="bg-white">
                <th scope="col">ID</th>
                <th scope="col">Produs</th>
                <th scope="col">Cantitate</th>
                <th scope="col">Pret Unitar</th>
                <th scope="col">Pret total</th>
            </tr>
        </table>
        <div id="show-cart-total-cost"></div>
        <button class="btn btn-danger ml-0 empty-cart-button">Golire cos</button>
        <button class="btn cart-checkout-button ml-1">Comanda</button>
        <div class="container cart-checkout-form mt-5">
            <h4 class="checkout-title text-center mb-3">Detalii livrare comanda</h4>
            <form class="checkout-form mx-auto" method="post" action="checkout.php" style="width: 500px">
                <div class="form-check form-check-inline mt-3">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                           value="Fizica">
                    <label class="form-check-label" for="inlineRadio1">Persoana Fizica</label>
                </div>
                <div class="form-check form-check-inline mb-2">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                           value="Juridica">
                    <label class="form-check-label" for="inlineRadio2">Persoana Juridica</label>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputName" placeholder="Nume prenume" name="name"
                           required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail" placeholder="Email" name="email"
                           required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputPhone" placeholder="Telefon" name="phone"
                           required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputCounty" placeholder="Judet" name="county"
                           required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputCity" placeholder="Oras" name="city"
                           required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputAddress" placeholder="Adresa" name="address"
                           required>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="inlineRadioOptionss" id="inlineRadio1"
                           value="option1">
                    <label class="form-check-label" for="inlineRadio1">Ramburs</label>
                </div>
                <div class="form-check form-check-inline mb-3">
                    <input class="form-check-input" type="radio" name="inlineRadioOptionss" id="inlineRadio2"
                           value="option2">
                    <label class="form-check-label" for="inlineRadio2">Card de credit</label>
                </div>
                <br/>
                <button type="submit" class="btn btn-primary mx-auto" id="send-order">Lanseaza comanda <i
                            class="fas fa-share-square"></i></button>
            </form>

        </div>
    </div>


</div>


<!-- Optional JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../scripts/main.js"></script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
