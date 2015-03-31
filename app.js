/**
 * Created by Rhoda on 2/2/15.
 */

$(document).ready(function(){
    var url,array;
    $('.item').click(function(){
        var product_id = $(this).find('.itemId').html();

        var imageLocation = $(this).find('img').attr('src');
        $("#details").find('img').attr('src',imageLocation);
        $('#details .product_id').html(product_id);
        $.get('ajax.php',{product_id:product_id},function(data){
            $('#details .product_name').html(data.product_name);
            $('#details .description').html(data.description);
            $('#details .category_name').html(data.category_name);
            $('#details .quantity').html(data.quantity>0?"In stock":"Out of stock");
            $('#details .color_name').html(data.color_name);
            $('#details .price').html('GHC '+data.price);
        },"json");

    });

    $(".check_out").on('click', function() {

       window.location.href = "login.php?cart_data="+JSON.stringify(cart);
    });

    $("#details .button").on('click', function() {
        $(".reveal-modal").foundation('reveal','close');
    });
    //
    //$("#cart .button").on('click', function(){
    //    var product_id = $(this).find('.itemId').html();
    //    $.get('ajax.php',{addOrder:order_id},function(data){
    //
    //    }
    //});

});
var cart = [], count = 0;
function addtoCart(caller){
    var product_id = '';
    var price = '';
    var name = '';
    var quantity = 1;
    caller = caller.parentNode;
    console.log($(caller).attr('class'));
    if($(caller).attr('class')=='item'){
        product_id = $(caller).find('.itemId').html();
        price = $(caller).find('.price').html();
        name = $(caller).find('.product').html();
    }else{
        product_id = $(caller).find('.product_id').html();
        price = $(caller).find('.price').html();
        name = $(caller).find('.product_name').html();
    }

    var updateQty = false, updkey = -1;
    $.each(cart,function(key,object){
        console.log("PID:"+product_id);
        console.log("OPID:"+object.pid);
        updateQty = (product_id == object.pid);
        if(updateQty){ updkey = key; return false;}
    });
    console.log("updqty"+updateQty);
    if(updateQty){
        cart[updkey].qty++;
    }else{
        console.log('adding');
        cart[cart.length] = {pid:product_id,price:price,pname:name,qty:quantity};
    }
    updateCart();
}

function updateCart(){
    console.log(cart);
    var cartList =  $('#cart');
    cartList.find('.items').find('ul').html("");
    var cost = 0, count = 0;
    $.each(cart,function(key,object){
        console.log(object);
        var str = '<li><div class="small-7 columns">'+object.pname+'</div> ' +
                '<div class="small-3 columns">' +object.price +'</div>' +
                '<div class="small-2 columns">' + object.qty +'</div></li>';
        cost += parseFloat(object.price.replace('GHC','').trim()) * object.qty;
        count += object.qty;
        cartList.find('.items').find('ul').append(str);
    });
    cartList.find('.item_count').html(count);
    cartList.find('.cost').html(cost);

}

function removefromCart(){
    $('.item').remove();
    alert("You have no items in your cart");
}
//function add_details($fk_customer_id,$fk_order_id,$fk_product_id){
//    $sql_query="INSERT INTO order_details (fk_customer_id,fk_order_id,fk_product_id) VALUES ($fk_customer_id,
//    $fk_order_id,$fk_product_id)";
//    if (!$this->query($sql_query)){
//        return false;
//    }
//    return true;
//}
//function buy(){
//    $.ajax(url:'cart_functions.php?')
//}