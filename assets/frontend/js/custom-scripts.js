
//Buy-Sell List Ajax filter
function product_filter_buy_sell_list(url = null){
    var quality  = [];
    var size   = [];
    var subcat = [];
    var city   = [];
    var cat    = [];
    var ad     = [];
    $(".quality_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       quality.push($(this).children('input').val());
     }
   })
    quality = quality.join(","); 

    $(".subcat_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       subcat.push($(this).children('input').val());
     }
   })
    subcat = subcat.join(","); 

    $(".cat_filter").each(function(){
      if ($(this).children('input').prop('checked') == true) {
        cat.push($(this).children('input').val());
      }
    })
    cat = cat.join(","); 

    $(".city_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       city.push($(this).children('input').val());
     }
   })
    city = city.join(","); 

    $(".ad_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       ad.push($(this).children('input').val());
     }
   })
    ad = ad.join(","); 

    $(".size_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       size.push($(this).children('input').val());
     }
   })
    size = size.join(",");

    var price = $("#amount").val();
    if(url){
      var url = url;
    }else{
      if($(".main_pagi_buy_sell_list li.active").data('url')){
       var url = $(".main_pagi_buy_sell_list li.active").data('url');
     }else{
      var url  = $("#myTabContent-buy_sell_list").data('url');
    }
  }

  var sort_by     = $(".sort_by").val();
  var sort_by_chk = $(".sort_by_chk").val();
  $("#preloader").show();
  $.post(url, {quality : quality, cat : cat, ad : ad, subcat : subcat, city : city, size : size, price : price, sort_by : sort_by, sort_by_chk : sort_by_chk}, function(res){
    $("#preloader").hide();
    $(".err_rmv_buy_sell_list").remove();
    $("#myTabContent-buy_sell_list").html(res.content_wrapper);
    $("#myTabContent-buy_sell_list").after(res.content_wrapper_pagination);
  })
}
$(document).on('click', '.main_pagi_buy_sell_list li a', function(e){
  e.preventDefault();
  var url = $(this).attr('href');
  product_filter_buy_sell_list(url);
})
product_filter_buy_sell_list();
$(document).on('change', '.quality_filter', function(){
  product_filter_buy_sell_list();
})
$(document).on('change', '.sort_by', function(){
  product_filter_buy_sell_list();
})
$(document).on('change', '.sort_by_chk', function(){
  product_filter_buy_sell_list();
})
$(document).on('change', '.subcat_filter', function(){
  product_filter_buy_sell_list();
})
$(document).on('change', '.size_filter', function(){
  product_filter_buy_sell_list();
})
$(document).on('change', '.city_filter', function(){
  product_filter_buy_sell_list();
})
$(document).on('change', '.cat_filter', function(){
  product_filter_buy_sell_list();
})
$(document).on('change', '.ad_filter', function(){
  product_filter_buy_sell_list();
});

//Buy-sell List Listing

  function product_filter(url = null){
    var quality= [];
    var size   = [];
    var subcat = [];
    var city   = [];
    var cat    = [];
    var ad     = [];
    $(".quality_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       quality.push($(this).children('input').val());
     }
   })
    quality = quality.join(","); 

    $(".subcat_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       subcat.push($(this).children('input').val());
     }
   })
    subcat = subcat.join(","); 

    $(".cat_filter").each(function(){
      if ($(this).children('input').prop('checked') == true) {
        cat.push($(this).children('input').val());
      }
    })
    cat = cat.join(","); 

    $(".city_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       city.push($(this).children('input').val());
     }
   })
    city = city.join(","); 

    $(".ad_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       ad.push($(this).children('input').val());
     }
   })
    ad = ad.join(","); 

    $(".size_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       size.push($(this).children('input').val());
     }
   })
    size = size.join(",");

    var price = $("#amount").val();
    if(url){
      var url = url;
    }else{
      if($(".main_pagi1 li.active").data('url')){
       var url = $(".main_pagi1 li.active").data('url');
     }else{
      var url  = $("#myTabContent1").data('url');
    }
  }
  var sort_by     = $(".sort_by").val();
  var sort_by_chk = $(".sort_by_chk").val();
  $("#preloader").show();
  $.post(url, {quality : quality, cat : cat, ad : ad, subcat : subcat, city : city, size : size, price : price, sort_by : sort_by, sort_by_chk : sort_by_chk}, function(res){
    $("#preloader").hide();
    $(".err_rmv1").remove();
    $("#myTabContent1").html(res.content_wrapper);
    $("#myTabContent1").after(res.content_wrapper_pagination);
  })
}
$(document).on('click', '.main_pagi1 li a', function(e){
  e.preventDefault();
  var url = $(this).attr('href');
  product_filter(url);
})
product_filter();
$(document).on('change', '.quality_filter', function(){
  product_filter();
})
$(document).on('change', '.sort_by', function(){
  product_filter();
})
$(document).on('change', '.sort_by_chk', function(){
  product_filter();
})
$(document).on('change', '.subcat_filter', function(){
  product_filter();
})
$(document).on('change', '.size_filter', function(){
  product_filter();
})
$(document).on('change', '.city_filter', function(){
  product_filter();
})
$(document).on('change', '.cat_filter', function(){
  product_filter();
})
$(document).on('change', '.ad_filter', function(){
  product_filter();
});


  function product_filter_auction(url = null){
    var quality  = [];
    var size   = [];
    var subcat = [];
    var city   = [];
    var cat    = [];
    var ad     = [];
    $(".quality_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       quality.push($(this).children('input').val());
     }
   })
    quality = quality.join(","); 

    $(".subcat_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       subcat.push($(this).children('input').val());
     }
   })
    subcat = subcat.join(","); 

    $(".cat_filter").each(function(){
      if ($(this).children('input').prop('checked') == true) {
        cat.push($(this).children('input').val());
      }
    })
    cat = cat.join(","); 

    $(".city_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       city.push($(this).children('input').val());
     }
   })
    city = city.join(","); 

    $(".ad_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       ad.push($(this).children('input').val());
     }
   })
    ad = ad.join(","); 

    $(".size_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       size.push($(this).children('input').val());
     }
   })
    size = size.join(",");

    var price = $("#amount").val();
    if(url){
      var url = url;
    }else{
      if($(".main_pagi_auction li.active").data('url')){
       var url = $(".main_pagi_auction li.active").data('url');
     }else{
      var url  = $("#myTabContent-auction").data('url');
    }
  }

  var sort_by     = $(".sort_by").val();
  var sort_by_chk = $(".sort_by_chk").val();
  $("#preloader").show();
  $.post(url, {quality : quality, cat : cat, ad : ad, subcat : subcat, city : city, size : size, price : price, sort_by : sort_by, sort_by_chk : sort_by_chk}, function(res){
    $("#preloader").hide();
    $(".err_rmv_auction").remove();
    $("#myTabContent-auction").html(res.content_wrapper);
    $("#myTabContent-auction").after(res.content_wrapper_pagination);
  })
}
$(document).on('click', '.main_pagi_auction li a', function(e){
  e.preventDefault();
  var url = $(this).attr('href');
  product_filter_auction(url);
})
product_filter_auction();
$(document).on('change', '.quality_filter', function(){
  product_filter_auction();
})
$(document).on('change', '.sort_by', function(){
  product_filter_auction();
})
$(document).on('change', '.sort_by_chk', function(){
  product_filter_auction();
})
$(document).on('change', '.subcat_filter', function(){
  product_filter_auction();
})
$(document).on('change', '.size_filter', function(){
  product_filter_auction();
})
$(document).on('change', '.city_filter', function(){
  product_filter_auction();
})
$(document).on('change', '.cat_filter', function(){
  product_filter_auction();
})
$(document).on('change', '.ad_filter', function(){
  product_filter_auction();
});

  function product_filter_auction_list(url = null){
    var quality  = [];
    var size   = [];
    var subcat = [];
    var city   = [];
    var cat    = [];
    var ad     = [];
    $(".quality_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       quality.push($(this).children('input').val());
     }
   })
    quality = quality.join(","); 

    $(".subcat_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       subcat.push($(this).children('input').val());
     }
   })
    subcat = subcat.join(","); 

    $(".cat_filter").each(function(){
      if ($(this).children('input').prop('checked') == true) {
        cat.push($(this).children('input').val());
      }
    })
    cat = cat.join(","); 

    $(".city_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       city.push($(this).children('input').val());
     }
   })
    city = city.join(","); 

    $(".ad_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       ad.push($(this).children('input').val());
     }
   })
    ad = ad.join(","); 

    $(".size_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       size.push($(this).children('input').val());
     }
   })
    size = size.join(",");

    var price = $("#amount").val();
    if(url){
      var url = url;
    }else{
      if($(".main_pagi_auction_list li.active").data('url')){
       var url = $(".main_pagi_auction_list li.active").data('url');
     }else{
      var url  = $("#myTabContent-auction_list").data('url');
    }
  }

  var sort_by     = $(".sort_by").val();
  var sort_by_chk = $(".sort_by_chk").val();
  $("#preloader").show();
  $.post(url, {quality : quality, cat : cat, ad : ad, subcat : subcat, city : city, size : size, price : price, sort_by : sort_by, sort_by_chk : sort_by_chk}, function(res){
    $("#preloader").hide();
    $(".err_rmv_auction_list").remove();
    $("#myTabContent-auction_list").html(res.content_wrapper);
    $("#myTabContent-auction_list").after(res.content_wrapper_pagination);
  })
}
$(document).on('click', '.main_pagi_auction_list li a', function(e){
  e.preventDefault();
  var url = $(this).attr('href');
  product_filter_auction_list(url);
})
product_filter_auction_list();
$(document).on('change', '.quality_filter', function(){
  product_filter_auction_list();
})
$(document).on('change', '.sort_by', function(){
  product_filter_auction_list();
})
$(document).on('change', '.sort_by_chk', function(){
  product_filter_auction_list();
})
$(document).on('change', '.subcat_filter', function(){
  product_filter_auction_list();
})
$(document).on('change', '.size_filter', function(){
  product_filter_auction_list();
})
$(document).on('change', '.city_filter', function(){
  product_filter_auction_list();
})
$(document).on('change', '.cat_filter', function(){
  product_filter_auction_list();
})
$(document).on('change', '.ad_filter', function(){
  product_filter_auction_list();
});

  function product_filter_marketplace(url = null){
    var color  = [];
    var size   = [];
    var subcat = [];
    var city   = [];
    var cat    = [];
    var ad     = [];
    $(".color_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       color.push($(this).children('input').val());
     }
   })
    color = color.join(","); 

    $(".subcat_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       subcat.push($(this).children('input').val());
     }
   })
    subcat = subcat.join(","); 

    $(".cat_filter").each(function(){
      if ($(this).children('input').prop('checked') == true) {
        cat.push($(this).children('input').val());
      }
    })
    cat = cat.join(","); 

    $(".city_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       city.push($(this).children('input').val());
     }
   })
    city = city.join(","); 

    $(".ad_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       ad.push($(this).children('input').val());
     }
   })
    ad = ad.join(","); 

    $(".size_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       size.push($(this).children('input').val());
     }
   })
    size = size.join(",");

    var price = $("#amount").val();
    if(url){
      var url = url;
    }else{
      if($(".main_pagi_marketplace li.active").data('url')){
       var url = $(".main_pagi_marketplace li.active").data('url');
     }else{
      var url  = $("#myTabContent-marketplace").data('url');
    }
  }

  var sort_by     = $(".sort_by").val();
  var sort_by_chk = $(".sort_by_chk").val();
  $("#preloader").show();
  $.post(url, {color : color, cat : cat, ad : ad, subcat : subcat, city : city, size : size, price : price, sort_by : sort_by, sort_by_chk : sort_by_chk}, function(res){
    $("#preloader").hide();
    $(".err_rmv_marketplace").remove();
    $("#myTabContent-marketplace").html(res.content_wrapper);
    $("#myTabContent-marketplace").after(res.content_wrapper_pagination);
  })
}
$(document).on('click', '.main_pagi_marketplace li a', function(e){
  e.preventDefault();
  var url = $(this).attr('href');
  product_filter_marketplace(url);
})
product_filter_marketplace();
$(document).on('change', '.color_filter', function(){
  product_filter_marketplace();
})
$(document).on('change', '.sort_by', function(){
  product_filter_marketplace();
})
$(document).on('change', '.sort_by_chk', function(){
  product_filter_marketplace();
})
$(document).on('change', '.subcat_filter', function(){
  product_filter_marketplace();
})
$(document).on('change', '.size_filter', function(){
  product_filter_marketplace();
})
$(document).on('change', '.city_filter', function(){
  product_filter_marketplace();
})
$(document).on('change', '.cat_filter', function(){
  product_filter_marketplace();
})
$(document).on('change', '.ad_filter', function(){
  product_filter_marketplace();
});

  function product_filter_marketplace_list(url = null){
    var quality= [];
    var size   = [];
    var subcat = [];
    var city   = [];
    var cat    = [];
    var ad     = [];
    $(".quality_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       quality.push($(this).children('input').val());
     }
   })
    quality = quality.join(","); 

    $(".subcat_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       subcat.push($(this).children('input').val());
     }
   })
    subcat = subcat.join(","); 

    $(".cat_filter").each(function(){
      if ($(this).children('input').prop('checked') == true) {
        cat.push($(this).children('input').val());
      }
    })
    cat = cat.join(","); 

    $(".city_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       city.push($(this).children('input').val());
     }
   })
    city = city.join(","); 

    $(".ad_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       ad.push($(this).children('input').val());
     }
   })
    ad = ad.join(","); 

    $(".size_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       size.push($(this).children('input').val());
     }
   })
    size = size.join(",");

    var price = $("#amount").val();
    if(url){
      var url = url;
    }else{
      if($(".main_pagi_marketplace_list li.active").data('url')){
       var url = $(".main_pagi_marketplace_list li.active").data('url');
     }else{
      var url  = $("#myTabContent-marketplace_list").data('url');
    }
  }

  var sort_by     = $(".sort_by").val();
  var sort_by_chk = $(".sort_by_chk").val();
  $("#preloader").show();
  $.post(url, {quality : quality, cat : cat, ad : ad, subcat : subcat, city : city, size : size, price : price, sort_by : sort_by, sort_by_chk : sort_by_chk}, function(res){
    $("#preloader").hide();
    $(".err_rmv_marketplace_list").remove();
    $("#myTabContent-marketplace_list").html(res.content_wrapper);
    $("#myTabContent-marketplace_list").after(res.content_wrapper_pagination);
  })
}
$(document).on('click', '.main_pagi_marketplace_list li a', function(e){
  e.preventDefault();
  var url = $(this).attr('href');
  product_filter_marketplace_list(url);
})
product_filter_marketplace_list();
$(document).on('change', '.color_filter', function(){
  product_filter_marketplace_list();
})
$(document).on('change', '.sort_by', function(){
  product_filter_marketplace_list();
})
$(document).on('change', '.sort_by_chk', function(){
  product_filter_marketplace_list();
})
$(document).on('change', '.subcat_filter', function(){
  product_filter_marketplace_list();
})
$(document).on('change', '.size_filter', function(){
  product_filter_marketplace_list();
})
$(document).on('change', '.city_filter', function(){
  product_filter_marketplace_list();
})
$(document).on('change', '.cat_filter', function(){
  product_filter_marketplace_list();
})
$(document).on('change', '.ad_filter', function(){
  product_filter_marketplace_list();
});


  //jour_dr_ledger_Details 
  $(document).ready(function(){
   $('.color').on('click', function() {
    var color = $(this).text();
    if (color.length > 0) {      
      $.ajax({
        url:'<?=base_url()?>index.php/Welcome/search_color',
        method: 'post',
        data: {color : color},      
        cache: false,
        success: function(data){
          $('#search_color').html(data); 
        }
      });
    }else{
      alert("Please Select A Color...");
      setTimeout(function(){
       window.location.reload(1);
     }, 1000);
    }
  });
 }); 


  function product_filter_list(url = null){
    var quality= [];
    var size   = [];
    var subcat = [];
    var city   = [];
    var cat    = [];
    var ad     = [];
    $(".quality_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       quality.push($(this).children('input').val());
     }
   })
    quality = quality.join(","); 

    $(".subcat_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       subcat.push($(this).children('input').val());
     }
   })
    subcat = subcat.join(","); 

    $(".cat_filter").each(function(){
      if ($(this).children('input').prop('checked') == true) {
        cat.push($(this).children('input').val());
      }
    })
    cat = cat.join(","); 

    $(".city_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       city.push($(this).children('input').val());
     }
   })
    city = city.join(","); 

    $(".ad_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       ad.push($(this).children('input').val());
     }
   })
    ad = ad.join(","); 

    $(".size_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       size.push($(this).children('input').val());
     }
   })
    size = size.join(",");

    var price = $("#amount").val();
    if(url){
      var url = url;
    }else{
      if($(".main_pagi2 li.active").data('url')){
       var url = $(".main_pagi2 li.active").data('url');
     }else{
      var url  = $("#myTabContent2").data('url');
    }
  }
  var sort_by     = $(".sort_by").val();
  var sort_by_chk = $(".sort_by_chk").val();
  $("#preloader").show();
  $.post(url, {quality : quality, cat : cat, ad : ad, subcat : subcat, city : city, size : size, price : price, sort_by : sort_by, sort_by_chk : sort_by_chk}, function(res){
    $("#preloader").hide();
    $(".err_rmv2").remove();
    $("#myTabContent2").html(res.content_wrapper);
    $("#myTabContent2").after(res.content_wrapper_pagination);
  })
}
$(document).on('click', '.main_pagi2 li a', function(e){
  e.preventDefault();
  var url = $(this).attr('href');
  product_filter_list(url);
})
product_filter_list();
$(document).on('change', '.quality_filter', function(){
  product_filter_list();
})
$(document).on('change', '.sort_by', function(){
  product_filter_list();
})
$(document).on('change', '.sort_by_chk', function(){
  product_filter_list();
})
$(document).on('change', '.subcat_filter', function(){
  product_filter_list();
})
$(document).on('change', '.size_filter', function(){
  product_filter_list();
})
$(document).on('change', '.city_filter', function(){
  product_filter_list();
})
$(document).on('change', '.cat_filter', function(){
  product_filter_list();
})
$(document).on('change', '.ad_filter', function(){
  product_filter_list();
});



  function table_filter(url = null){
    var color  = [];
    var size   = [];
    var subcat = [];
    var city   = [];
    var cat    = [];
    var ad     = [];
    $(".color_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       color.push($(this).children('input').val());
     }
   })
    color = color.join(","); 

    $(".subcat_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       subcat.push($(this).children('input').val());
     }
   })
    subcat = subcat.join(","); 

    $(".cat_filter").each(function(){
      if ($(this).children('input').prop('checked') == true) {
        cat.push($(this).children('input').val());
      }
    })
    cat = cat.join(","); 

    $(".city_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       city.push($(this).children('input').val());
     }
   })
    city = city.join(","); 

    $(".ad_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       ad.push($(this).children('input').val());
     }
   })
    ad = ad.join(","); 

    $(".size_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       size.push($(this).children('input').val());
     }
   })
    size = size.join(",");

    var price = $("#amount").val();
    if(url){
      var url = url;
    }else{
      if($(".main_pagi3 li.active").data('url')){
       var url = $(".main_pagi3 li.active").data('url');
     }else{
      var url  = $("#myTabContent3").data('url');
    }
  }
  var sort_by     = $(".sort_by").val();
  var sort_by_chk = $(".sort_by_chk").val();
  $("#preloader").show();
  $.post(url, {color : color, cat : cat, ad : ad, subcat : subcat, city : city, size : size, price : price, sort_by : sort_by, sort_by_chk : sort_by_chk}, function(res){
    $("#preloader").hide();
    $(".err_rmv3").remove();
    $("#myTabContent3").html(res.content_wrapper);
    $("#myTabContent3").after(res.content_wrapper_pagination);
  })
}
$(document).on('click', '.main_pagi3 li a', function(e){
  e.preventDefault();
  var url = $(this).attr('href');
  table_filter(url);
})
table_filter();
$(document).on('change', '.color_filter', function(){
  table_filter();
})
$(document).on('change', '.sort_by', function(){
  table_filter();
})
$(document).on('change', '.sort_by_chk', function(){
  table_filter();
})
$(document).on('change', '.subcat_filter', function(){
  table_filter();
})
$(document).on('change', '.size_filter', function(){
  table_filter();
})
$(document).on('change', '.city_filter', function(){
  table_filter();
})
$(document).on('change', '.cat_filter', function(){
  table_filter();
})
$(document).on('change', '.ad_filter', function(){
  table_filter();
});

  function table_filter_recentaly_view(url = null){
    var color  = [];
    var size   = [];
    var subcat = [];
    var city   = [];
    var cat    = [];
    var ad     = [];
    $(".color_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       color.push($(this).children('input').val());
     }
   })
    color = color.join(","); 

    $(".subcat_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       subcat.push($(this).children('input').val());
     }
   })
    subcat = subcat.join(","); 

    $(".cat_filter").each(function(){
      if ($(this).children('input').prop('checked') == true) {
        cat.push($(this).children('input').val());
      }
    })
    cat = cat.join(","); 

    $(".city_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       city.push($(this).children('input').val());
     }
   })
    city = city.join(","); 

    $(".ad_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       ad.push($(this).children('input').val());
     }
   })
    ad = ad.join(","); 

    $(".size_filter").each(function(){
      if($(this).children('input').prop('checked') == true){
       size.push($(this).children('input').val());
     }
   })
    size = size.join(",");

    var price = $("#amount").val();
    if(url){
      var url = url;
    }else{
      if($(".main_pagi4 li.active").data('url')){
       var url = $(".main_pagi4 li.active").data('url');
     }else{
      var url  = $("#myTabContent4").data('url');
    }
  }
  var sort_by     = $(".sort_by").val();
  var sort_by_chk = $(".sort_by_chk").val();
  $("#preloader").show();
  $.post(url, {color : color, cat : cat, ad : ad, subcat : subcat, city : city, size : size, price : price, sort_by : sort_by, sort_by_chk : sort_by_chk}, function(res){
    $("#preloader").hide();
    $(".err_rmv4").remove();
    $("#myTabContent4").html(res.content_wrapper);
    $("#myTabContent4").after(res.content_wrapper_pagination);
  })
}
$(document).on('click', '.main_pagi4 li a', function(e){
  e.preventDefault();
  var url = $(this).attr('href');
  table_filter_recentaly_view(url);
})
table_filter_recentaly_view();
$(document).on('change', '.color_filter', function(){
  table_filter_recentaly_view();
})
$(document).on('change', '.sort_by', function(){
  table_filter_recentaly_view();
})
$(document).on('change', '.sort_by_chk', function(){
  table_filter_recentaly_view();
})
$(document).on('change', '.subcat_filter', function(){
  table_filter_recentaly_view();
})
$(document).on('change', '.size_filter', function(){
  table_filter_recentaly_view();
})
$(document).on('change', '.city_filter', function(){
  table_filter_recentaly_view();
})
$(document).on('change', '.cat_filter', function(){
  table_filter_recentaly_view();
})
$(document).on('change', '.ad_filter', function(){
  table_filter_recentaly_view();
});

  function table_filter_favorite(url = null){ 
    if(url){
      var url = url;
    }else{
      if($(".main_pagi5 li.active").data('url')){
       var url = $(".main_pagi5 li.active").data('url');
     }else{
      var url  = $("#myTabContent5").data('url');
    }
  } 
  $("#preloader").show();
  $.post(url, function(res){
    $("#preloader").hide();
    $(".err_rmv5").remove();
    $("#myTabContent5").html(res.content_wrapper);
    $("#myTabContent5").after(res.content_wrapper_pagination);
  })
}
$(document).on('click', '.main_pagi5 li a', function(e){
  e.preventDefault();
  var url = $(this).attr('href');
  table_filter_favorite(url);
})
table_filter_favorite();

  function table_filter_bids(url = null){ 
    if(url){
      var url = url;
    }else{
      if($(".main_pagi_bids li.active").data('url')){
       var url = $(".main_pagi_bids li.active").data('url');
     }else{
      var url  = $("#myTabContent_bids").data('url');
    }
  } 
  $("#preloader").show();
  $.post(url, function(res){
    $("#preloader").hide();
    $(".err_rmv_bids").remove();
    $("#myTabContent_bids").html(res.content_wrapper);
    $("#myTabContent_bids").after(res.content_wrapper_pagination);
  })
}
$(document).on('click', '.main_pagi_bids li a', function(e){
  e.preventDefault();
  var url = $(this).attr('href');
  table_filter_bids(url);
})
table_filter_bids();


  function table_filter_purchase_history(url = null){ 
    if(url){
      var url = url;
    }else{
      if($(".main_pagi7 li.active").data('url')){
       var url = $(".main_pagi7 li.active").data('url');
     }else{
      var url  = $("#myTabContent7").data('url');
    }
  } 
  $("#preloader").show();
  $.post(url, function(res){
    $("#preloader").hide();
    $(".err_rmv7").remove();
    $("#myTabContent7").html(res.content_wrapper);
    $("#myTabContent7").after(res.content_wrapper_pagination);
  })
}
$(document).on('click', '.main_pagi7 li a', function(e){
  e.preventDefault();
  var url = $(this).attr('href');
  table_filter_purchase_history(url);
})
table_filter_purchase_history();

  function table_filter_selling(url = null){ 
    if(url){
      var url = url;
    }else{
      if($(".main_pagi_selling li.active").data('url')){
       var url = $(".main_pagi_selling li.active").data('url');
     }else{
      var url  = $("#myTabContent_selling").data('url');
    }
  } 
  $("#preloader").show();
  $.post(url, function(res){
    $("#preloader").hide();
    $(".err_rmv_selling").remove();
    $("#myTabContent_selling").html(res.content_wrapper);
    $("#myTabContent_selling").after(res.content_wrapper_pagination);
  })
}
$(document).on('click', '.main_pagi_selling li a', function(e){
  e.preventDefault();
  var url = $(this).attr('href');
  table_filter_selling(url);
})
table_filter_selling();

  function table_filter_saved_seller(url = null){ 
    if(url){
      var url = url;
    }else{
      if($(".main_pagi6 li.active").data('url')){
       var url = $(".main_pagi6 li.active").data('url');
     }else{
      var url  = $("#myTabContent6").data('url');
    }
  } 
  $("#preloader").show();
  $.post(url, function(res){
    $("#preloader").hide();
    $(".err_rmv6").remove();
    $("#myTabContent6").html(res.content_wrapper);
    $("#myTabContent6").after(res.content_wrapper_pagination);
  })
}
$(document).on('click', '.main_pagi6 li a', function(e){
  e.preventDefault();
  var url = $(this).attr('href');
  table_filter_saved_seller(url);
})
table_filter_saved_seller();

  //save to favorites
  $(document).on('click', '.favorite', function(e){
    e.preventDefault();
    var data = [],
    newclass = 'btn-danger',
    oldcalss = 'btn-primary',
    fav = $(this);
    proId = fav.attr('id'),
    base_url = fav.data('url'),
    // proId = fav.data('id'),

    $.ajax({
      type: "POST",
      url: base_url + '/' + proId,
      success: function(result){           
        fav.removeClass(oldcalss).addClass(newclass); 
        swal("Done!","It was succesfully add to favorite!","success");
      }        
    });
  });

  $(document).ready(function(){
    $("#contact-us").click(function(){
      var name      = $("#name").val();
      var email     = $("#email").val();
      var phone     = $("#phone").val();
      var subject   = $("#subject").val();
      var message   = $("#message").val();
            //pass object in post
          var dataString  = {'name': name , 'email': email , 'phone': phone ,'subject':subject, 'message': message};
          if(name==''||email==''||phone=='' ||subject=='' ||message=='')
          {
            swal("ERROR!","Please Fill All Fields!","error");
          }
          else
          {
              // AJAX Code To Submit Form.
              $.ajax({
                type: "POST",
                url: "<?php echo base_url('welcome/addContact'); ?>",
                data: dataString,
                dataType: 'json',
                cache: false,
                success: function(result){
                      // alert(result.msg);
                      if (result.msg == 'Success') {
                        swal("SUCCESS","Your query submitted succesfully !","success");
                        setTimeout(function () { location.reload(1); }, 3000);
                      }else{
                        swal("ERROR","Something went wrong !","error");
                      }
                    }
                  });
            }            
            return false;
          });
  });

  // save to favorites

  $(document).on('click', '.save-seller', function(e){
    e.preventDefault();
    var data = [],
    newclass = 'btn-warning',
    oldcalss = 'btn-primary',
    fav = $(this);
    sellerId = fav.attr('id'),
    base_url = fav.data('url'),
    // proId = fav.data('id'),

    $.ajax({
      type: "POST",
      url: base_url + '/' + sellerId,
      success: function(result){           
        fav.removeClass(oldcalss).addClass(newclass); 
        swal("Done!","It was succesfully added to saved seller!","success");
      }        
    });
  });
 

 