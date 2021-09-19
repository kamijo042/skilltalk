$(function(){ 
  $('#discount_type1').click(function(){
    $("#price_unit").text('円');
  });
  $('#discount_type2').click(function(){
    $("#price_unit").text('％');
  });

  $('#coupon-btn').click(function(){
    var from = $('#discount_from').val();
    var to = $('#discount_to').val();

    from_date = Date.parse(from);
    to_date = Date.parse(to);

    if (from > to) {
        alert('有効期間(to)は、有効期間(from)の後の日付を選択してください。');
        return false;
    }

  });
});
