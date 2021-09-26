$(function() { 
    $('#bookStatusCancelModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var book_id = button.data('book_id');
        var modal = $(this);
    
        var modal_book_id_atr = document.getElementById("modal_book_id");
        modal_book_id_atr.value = book_id;
    });

    $('#showPayoutDetailModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        const payout = button.data('payout');
        const modal = $(this);

        const total = payout['system_fee'] + payout['transaction_fee'] + payout['payout']
        $('#apply_date').text(payout['apply_date'].split(' ')[0]);
        $('#payout_date').text(payout['payout_date'].split(' ')[0]);
        $('#total_transfer').text(total.toLocaleString() + '円');
        $('#system_fee').text(payout['system_fee'].toLocaleString() + '円');
        $('#transaction_fee').text(payout['transaction_fee'].toLocaleString() + '円');
        $('#payout').text(payout['payout'].toLocaleString() + '円');


        var firstExists = document.getElementById('transaction').firstElementChild;
        console.log(firstExists);

        if (firstExists === null) {

           // テーブル作成
           // ヘッダー作成
           var tr = document.createElement('tr');
           var th1 = document.createElement('th');
           var th2 = document.createElement('th');
           var th3 = document.createElement('th');
           var th4 = document.createElement('th');
           th1.innerHTML = "取引番号";
           th2.innerHTML = "講義名";
           th3.innerHTML = "講習料";
           th4.innerHTML = "システム手数料";
    
           tr.appendChild(th1);
           tr.appendChild(th2);
           tr.appendChild(th3);
           tr.appendChild(th4);
           
           document.getElementById('transaction').appendChild(tr);
    
           // 取引詳細
           payout['transactions'].forEach(transaction => {
               var tr = document.createElement('tr');
               var td1 = document.createElement('td');
               var td2 = document.createElement('td');
               var td3 = document.createElement('td');
               var td4 = document.createElement('td');
               const system_fee = transaction['fixed_price'] * 0.2;
               td1.innerHTML = transaction['id'];
               td2.innerHTML = transaction['title'];
               td3.innerHTML = transaction['fixed_price'].toLocaleString() + '円';
               td4.innerHTML = system_fee.toLocaleString() + '円';
    
               tr.appendChild(td1);
               tr.appendChild(td2);
               tr.appendChild(td3);
               tr.appendChild(td4);
               document.getElementById('transaction').appendChild(tr);
               
           });
        }

    });
});
