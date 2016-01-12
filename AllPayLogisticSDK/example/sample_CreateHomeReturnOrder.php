<?php
    // 宅配逆物流訂單建立
    define('HOME_URL', 'http://www.sample.com.tw/logistics_dev');
    require('AllPay.Logistics.Integration.php');
    try {
        $AL = new AllpayLogistics();
        $AL->HashKey = '5294y06JbISpM5x9';
        $AL->HashIV = 'v77hoKGq4kWxNNIS';
        $AL->Send = array(
            'MerchantID' => '2000132',
            'AllPayLogisticsID' => '15609',
            'SenderName' => '歐付寶(寄)',
            'SenderPhone' => '0226550115',
            'SenderCellPhone' => '0933222111',
            'SenderZipCode' => '11560',
            'SenderAddress' => '台北市南港區三重路19-2號5樓D棟',
            'ReceiverName' => '歐付寶(收)',
            'ReceiverPhone' => '0226550116',
            'ReceiverCellPhone' => '0911222333',
            'ReceiverEmail' => 'test_emjhdAJr@allpay.com.tw',
            'ReceiverZipCode' => '11560',
            'ReceiverAddress' => '台北市南港區三重路19-2號5樓D棟',
            'ServerReplyURL' => HOME_URL . '/ServerReplyURL.php',
            'PlatformID' => '',
        );
        // CreateHomeReturnOrder()
        $Result = $AL->CreateHomeReturnOrder();
        echo '<pre>' . print_r($Result, true) . '</pre>';
    } catch(Exception $e) {
        echo $e->getMessage();
    }
?>