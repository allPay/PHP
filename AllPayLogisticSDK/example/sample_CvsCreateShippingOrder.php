<?php
    // 超商取貨物流訂單幕前建立
    define('HOME_URL', 'http://www.sample.com.tw/logistics_dev');
    require('AllPay.Logistics.Integration.php');
    try {
        $AL = new AllpayLogistics();
        $AL->HashKey = '5294y06JbISpM5x9';
        $AL->HashIV = 'v77hoKGq4kWxNNIS';
        $AL->Send = array(
            'MerchantID' => '2000132',
            'MerchantTradeNo' => 'no' . date('YmdHis'),
            'MerchantTradeDate' => date('Y/m/d H:i:s'),
            'LogisticsType' => LogisticsType::CVS,
            'LogisticsSubType' => LogisticsSubType::UNIMART,
            'GoodsAmount' => 1500,
            'CollectionAmount' => 10,
            'IsCollection' => IsCollection::YES,
            'GoodsName' => '測試商品A#測試商品B',
            'SenderName' => '歐付寶(寄)',
            'SenderPhone' => '0226550115',
            'SenderCellPhone' => '0911222333',
            'ReceiverName' => '歐付寶(收)',
            'ReceiverPhone' => '0226550115',
            'ReceiverCellPhone' => '0933222111',
            'ReceiverEmail' => 'test_emjhdAJr@allpay.com.tw',
            'TradeDesc' => '測試交易敘述',
            'ServerReplyURL' => HOME_URL . '/ServerReplyURL.php',
            'ClientReplyURL' => HOME_URL . '/ClientReplyURL.php',
            'LogisticsC2CReplyURL' => HOME_URL . '/LogisticsC2CReplyURL.php',
            'Remark' => '測試備註',
            'PlatformID' => '',
        );

        $AL->SendExtend = array(
            'ReceiverStoreID' => '991182',
            'ReturnStoreID' => '991182'
        );
        // CreateShippingOrder(Button名稱, Form target)
        $html = $AL->CreateShippingOrder('超商取貨物流訂單建立');
        echo $html;
    } catch(Exception $e) {
        echo $e->getMessage();
    }
?>
