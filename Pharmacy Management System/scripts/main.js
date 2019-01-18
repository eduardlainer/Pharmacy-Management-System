/* Global vars */
var cartProductsList = [];
if (localStorage.getItem("cart-product-list")) {
    cartProductsList = localStorage.getItem("cart-product-list");
    cartProductsList = JSON.parse(cartProductsList);
}

/* Hide checkout form */
$(".cart-checkout-form").hide();
var numberOfProductsInCart = 1;

/* Show products in cart number and total sum */
if (localStorage.getItem("cart-product-number")) {
    $("#shop-cart-product-number").text(localStorage.getItem("cart-product-number"));
    $("#shop-cart-total-sum").text(localStorage.getItem("cart-total-sum"));
} else {
    localStorage.setItem("cart-product-number", 0);
    localStorage.setItem("cart-total-sum", 0);
}

/* Add product in cart */
$(".add-cart").each(function () {
    $(this).click(function (e) {
        e.preventDefault();

        var productExists = true;
        var productsInCart = localStorage.getItem("cart-product-number");
        var totalCartSum = localStorage.getItem("cart-total-sum");

        productsInCart++;
        totalCartSum = parseInt(totalCartSum);
        totalCartSum += $(this).data("price");

        localStorage.setItem("cart-total-sum", totalCartSum);
        localStorage.setItem("cart-product-number", productsInCart);

        $("#shop-cart-product-number").text(productsInCart);
        $("#shop-cart-total-sum").text(totalCartSum);
        var productName = $(this).data("name");

        if (cartProductsList.length < 1) {
            cartProductsList.push({
                "id": $(this).data("id"),
                "productName": productName,
                "price": $(this).data("price"),
                "amount": 1,
                "total": $(this).data("price")
            });
            numberOfProductsInCart++;
            localStorage.setItem("cart-product-list", JSON.stringify(cartProductsList));
        } else {
            for (var i = 0; i < cartProductsList.length; i++) {
                if (cartProductsList[i].productName.includes(productName)) {
                    cartProductsList[i].total += $(this).data("price");
                    cartProductsList[i].amount += 1;
                    productExists = true;
                    localStorage.setItem("cart-product-list", JSON.stringify(cartProductsList));
                    break;
                } else {
                    productExists = false;
                }
            }
            if (productExists === false) {
                cartProductsList.push({
                    "id": $(this).data("id"),
                    "productName": productName,
                    "price": $(this).data("price"),
                    "amount": 1,
                    "total": $(this).data("price")
                });
                numberOfProductsInCart++;
                localStorage.setItem("cart-product-list", JSON.stringify(cartProductsList));
            }
        }
    });
});

/*  Empty cart */
$(".empty-cart-button").click(function () {
    localStorage.setItem("cart-product-number", 0);
    localStorage.setItem("cart-total-sum", 0);

    $("#shop-cart-product-number").text(localStorage.getItem("cart-product-number"));
    $("#shop-cart-total-sum").text(localStorage.getItem("cart-total-sum"));

    cartProductsList = [];
    localStorage.setItem("cart-product-list", JSON.stringify(cartProductsList));
    $(".cart-checkout-form").hide();
    $("#show-cart-total-cost").empty();
    renderCartProductsList("alert-info", "Nu exista produse in cos.");
});

/* Render product list from cart */
function renderCartProductsList(typeAlert, message) {
    cartProductsList = localStorage.getItem("cart-product-list");
    cartProductsList = JSON.parse(cartProductsList);

    var costTotal = 0;
    if (cartProductsList.length > 0) {
        cartProductsList.forEach(function (product) {
            costTotal += product.total;
            $(".table").append("<tr class=\"cart-products-list bg-white\"   data-id=" + product.id + ">" + "<th>" + product.id + "</th>" + "<td>"
                + product.productName + "</td>" + "<td>" + product.amount + "</td>" + "<td>" + product.price + " RON</td>"
                + "<td>" + product.total + " RON</td>" + "</tr>");
        });
        $("#show-cart-total-cost").append("<p class=\"cart-total-cost\"><i class=\"fas fa-dollar-sign\"></i> Total cos: " + costTotal + " RON</p>");
    } else {
        $(".table").hide();
        $(".empty-cart-button").hide();
        $(".cart-checkout-button").hide();
        $(".shop-cart-products").append("<div class=\"alert " + typeAlert + " text-center\" role=\"alert\">" + message + "</div>");
    }


}

/* Show checkout form */
$(".cart-checkout-button").click(function () {
    $(".cart-checkout-form").show();
});

if (window.location.pathname === "/~edward/Pharmacy%20Management%20System/php/cart.php") {
    renderCartProductsList("alert-info", "Nu exista produse in cos.");
}
if (window.location.search === "?order=sent") {
    $(".shop-cart-products").empty();
    renderCartProductsList("alert-success", "Felicitări! Comanda dvs a fost finalizată cu succes. În cel mai scurt timp veţi fi contactat telefonic de unul dintre colegii noştri pentru confirmare.");
}


/* Send order */
$("#send-order").click(function () {
    localStorage.setItem("cart-product-number", 0);
    localStorage.setItem("cart-total-sum", 0);

    $("#shop-cart-product-number").text(localStorage.getItem("cart-product-number"));
    $("#shop-cart-total-sum").text(localStorage.getItem("cart-total-sum"));

    cartProductsList = [];
    localStorage.setItem("cart-product-list", JSON.stringify(cartProductsList));
    $(".cart-checkout-form").hide();
    $("#show-cart-total-cost").empty();
    $(".table").hide();
    $(".empty-cart-button").hide();
    $(".cart-checkout-button").hide();
});


/* Populate edit modal */
$('.buton-editare').each(function () {
    $(this).click(function () {
        $("#idedit").attr("value", $(this).data("id"));
        $("#denumireedit").attr("value", $(this).data("produs"));
        $("#producatoredit").attr("value", $(this).data("producator"));
        $("#categoriedit").attr("value", $(this).data("categorie"));
        $("#pretedit").attr("value", $(this).data("pret"));
        $("#stocedit").attr("value", $(this).data("stoc"));
        $("#dataedit").attr("value", $(this).data("dataexpirare"));
    });
});

/* Hide ID field */
$("#idedit").hide();