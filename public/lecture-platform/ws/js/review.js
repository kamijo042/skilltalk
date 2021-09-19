$(function() {
    $(".stars").mousemove(function(e) {
        const review_atr = document.getElementById("review");
        const gLeft = $(".stars .stars-ghost").offset().left,
            pX = e.pageX;
        if (pX - gLeft > 150) {
           wid = 180;
           review_atr.value = 5;
        } else if (pX - gLeft > 120) {
           wid = 145;
           review_atr.value = 4;
        } else if (pX - gLeft > 90) {
           wid = 110;
           review_atr.value = 3;
        } else if (pX - gLeft > 60) {
           wid = 85;
           review_atr.value = 2;
        } else if (pX - gLeft > 30) {
           wid = 50;
           review_atr.value = 1;
        }
        $(".stars .stars-ghost").width(wid);
    });

    $('#reviewUpdateModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        const rank = button.data('rank');
        if (rank === 5) {
           wid = 180;
        } else if (rank === 4) {
           wid = 145;
        } else if (rank === 3) {
           wid = 110;
        } else if (rank === 2) {
           wid = 85;
        } else if (rank === 1) {
           wid = 50;
        }
        $(".stars .stars-ghost").width(wid);
    });

});
