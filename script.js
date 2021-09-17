// Special Page Working Code

$(".dish").hide();
$(".d1").show();

//Special Items controls

$(".special-item").click(function() {
  var itemId = "#" + this.id;
  var dishClass = ".d" + this.id[1];

 $(".special-item").removeClass("special-item-bg");
 $(itemId).addClass("special-item-bg");

 $(".dish").hide();
 $(dishClass).show();

});
