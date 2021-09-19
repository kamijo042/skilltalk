$(function(){

    // Initialize datepicker with it
    $('#discount_from').datepicker({
        language: {
            days: ['日', '月', '火', '水', '木', '金', '土'],
            daysShort: ['日', '月', '火', '水', '木', '金', '土'],
            daysMin: ['日', '月', '火', '水', '木', '金', '土'],
            months: ['1月','2月','3月','4月','5月','6月', '7月','8月','9月','10月','11月','12月'],
            monthsShort: ['1月','2月','3月','4月','5月','6月', '7月','8月','9月','10月','11月','12月'],
            today: '今日',
            clear: 'Clear',
            dateFormat: 'yyyy/mm/dd',
            timeFormat: 'hh:ii',
            firstDay: 0
        },
        minDate: new Date()
    })

    // Initialize datepicker with it
    $('#discount_to').datepicker({
        language: {
            days: ['日', '月', '火', '水', '木', '金', '土'],
            daysShort: ['日', '月', '火', '水', '木', '金', '土'],
            daysMin: ['日', '月', '火', '水', '木', '金', '土'],
            months: ['1月','2月','3月','4月','5月','6月', '7月','8月','9月','10月','11月','12月'],
            monthsShort: ['1月','2月','3月','4月','5月','6月', '7月','8月','9月','10月','11月','12月'],
            today: '今日',
            clear: 'Clear',
            dateFormat: 'yyyy/mm/dd',
            timeFormat: 'hh:ii',
            firstDay: 0
        },
        minDate: new Date()
    })

    // Initialize datepicker with it
    $('#lectureTime').datepicker({
        language: {
            days: ['日', '月', '火', '水', '木', '金', '土'],
            daysShort: ['日', '月', '火', '水', '木', '金', '土'],
            daysMin: ['日', '月', '火', '水', '木', '金', '土'],
            months: ['1月','2月','3月','4月','5月','6月', '7月','8月','9月','10月','11月','12月'],
            monthsShort: ['1月','2月','3月','4月','5月','6月', '7月','8月','9月','10月','11月','12月'],
            today: '今日',
            clear: 'Clear',
            dateFormat: 'yyyy/mm/dd',
            timeFormat: 'hh:ii',
            firstDay: 0
        },
        minDate: new Date()
    })

    const lectureTime = document.querySelector('#lectureTime');

    const checkTime = (evt) => {
        lectureTimeValue = lectureTime.value
        const current = new Date();
        const target_date = Date.parse(lectureTimeValue);
        if (target_date - current < 0) {
            alert('現在時刻より後を指定してください');
            document.querySelector('#lectureTime').value = '';
        }
    ;}

    // カーソルから離れた時に日付チェック
    lectureTime.addEventListener("blur", checkTime);

});
