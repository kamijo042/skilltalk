$(function(){ 
  const checkEmpty = () => {
      url = document.sendPlace.webLink.value;
      place = document.sendPlace.lecturePlace.value
      time_ = document.sendPlace.lectureTime.value
  
      // どちらも値がないとdisabled
      document.sendPlace.button1.disabled
        = !(url || place || time_);
  
      // 開催場所に値がなく、urlがhttpから始まらなかったら、disabled
      if (url != '') {
          if (!url.match(/(http|https):\/\/.+/)) {
              document.sendPlace.button1.disabled = true;
          }
      }
  
  }
  
  checkEmpty();

  const selectDiscountType = () => {
      type = document.querySelector('[name="discount_rate"]');
      console.log(type);
  }

  selectDiscountType();
});
