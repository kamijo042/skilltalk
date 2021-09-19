$('#bookStatusCancelModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var book_id = button.data('book_id');
    var modal = $(this);

    var modal_book_id_atr = document.getElementById("modal_book_id");
    modal_book_id_atr.value = book_id;
});
