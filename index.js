$(document).ready(function(){
    // banner owl carousel
    $("#banner-area .owl-carousel").owlCarousel({
        dots:true,
        items: 1
    });

    // top sale carousel

    $("#top-sale .owl-carousel").owlCarousel({
        loop:true,
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });

    // isotope filter
    var $grid = $(".grid").isotope({
        itemSelector:".grid-item",
        layoutMode:"fitRows"
    });
    // filter item on button click
    $(".button-group").on("click","button",function(){
        var filterValue = $(this).attr("data-filter")
        $grid.isotope({
            filter: filterValue
        });
    });

    // new phones owl carousel
    $("#new-phones .owl-carousel").owlCarousel({
        loop:true,
        nav:false,
        dots:true,
        responsiv:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });

    // blog owl carousel
    $("#blogs .owl-carousel").owlCarousel({
        loop:true,
        nav:false,
        dots:true,
        responsiv:{
            0:{
                items:1
            },
            600:{
                items:3
            } 
        }
    });

    // qty section 
    let $qty_up = $('.qty .qty-up');
    let $qty_down = $('.qty .qty-down');
    let $deal_price = $('#deal_price');
    //let $input = $('.qty .qty_input');

    // up button 
    $qty_up.click(function(e){

        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id='${$(this).data("id")}']`);
        
        // change product price using ajax
        $.ajax 
        (
            {
                url: 'Templates/ajax.php',
                type: 'POST', 
                data:{
                item_id: $(this).data("id")},
                success:function(response){

                let obj = JSON.parse(response)

                let item_price = obj[0]['item_price'];
                let item_id = obj[0]['item_id'];

    
                    if($input.val() >= 1 && $input.val() <= 9){
                        $input.val(function(i, oldval){
                            return ++oldval; 
                        });
                       
                        // increase the price ot product 
                        $price.text(parseInt(item_price * $input.val()).toFixed(2));
                        // subtotal price increasing 
                        
                        let subtotal = parseInt($deal_price.text()) + parseInt(item_price);
                        $deal_price.text(subtotal.toFixed(2));
                         
                        $.ajax({
                            url: 'Templates/_cart.php',
                            type: 'POST',
                            data: {
                                qty: $input.val(),
                                item_id: item_id
                            },
                            success:function(response){
                                console.log(JSON.stringify($input.val()));
                            }
                        })
                    }
                }
            }
        );
        
    });

    // down button 
    $qty_down.click(function(e){
        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id='${$(this).data("id")}']`);
// change product price using ajax
$.ajax
(
    {
        url: 'Templates/ajax.php',
        type: 'POST', 
        data:{
        item_id: $(this).data("id")},
        success:function(response){

        let obj = JSON.parse(response)
            
        let item_price = obj[0]['item_price'];
        let item_id = obj[0]['id'];


            if($input.val() >= 2 && $input.val() <= 10){
                $input.val(function(i, oldval){
                    return --oldval;
                });
                 // increase the price ot product 
            $price.text(parseInt(item_price * $input.val()).toFixed(2));
            // subtotal price increasing 
            
            let subtotal = parseInt($deal_price.text()) - parseInt(item_price);
            $deal_price.text(subtotal.toFixed(2));

            $.ajax({
                url: 'Templates/_cart.php',
                type: 'POST',
                data: {
                    qty: $input.val(),
                    item_id: item_id
                },
                success:function(response){
                    console.log(JSON.stringify($input.val()));
                }
            })
            }
           
        }
    }
);      
});  
});