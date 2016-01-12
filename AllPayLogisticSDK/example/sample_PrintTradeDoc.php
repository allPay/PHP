<?php
    // 產生托運單(宅配)/一段標(超商取貨)
    require('AllPay.Logistics.Integration.php');
    try {
        $AL = new AllpayLogistics();
        $AL->HashKey = '5294y06JbISpM5x9';
        $AL->HashIV = 'v77hoKGq4kWxNNIS';
        $AL->Send = array(
            'MerchantID' => '2000132',
            'AllPayLogisticsID' => '14559',
            'PlatformID' => ''
        );
        // PrintTradeDoc(Button名稱, Form target)
        $html = $AL->PrintTradeDoc('產生托運單/一段標');
        echo $html;
    } catch(Exception $e) {
        echo $e->getMessage();
    }
?>