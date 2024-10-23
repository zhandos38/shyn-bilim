<div style="text-align: center; padding-top: 50px; padding-bottom: 50px">
    <h2>
        Ожидания оплаты...
    </h2>
    <img style="width: 120px" src="/img/loading-gif.gif" alt="loading">
</div>
<?php
use yii\web\View;

/** @var string $orderId */

$js =<<<JS
setInterval(() => {
        $.get({
            url: 'check-payment',
            format: 'JSON',
            data: {id: "$orderId"},
            success: () => {
                location.reload();
            },
            error: function (err) {
                console.log('Check payment failed', err);
            }
        })
    }, 1000)
JS;
$this->registerJs($js, View::POS_END);
?>