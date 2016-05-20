<?php
   //特殊字元置換
	function _replaceChar($value)
	{
		$search_list = array('%2d', '%5f', '%2e', '%21', '%2a', '%28', '%29');
		$replace_list = array('-', '_', '.', '!', '*', '(', ')');
		$value = str_replace($search_list, $replace_list ,$value);
		
		return $value;
	}
	//產生檢查碼
	function _getMacValue($hash_key, $hash_iv, $form_array)
	{
		$encode_str = "HashKey=" . $hash_key;
		foreach ($form_array as $key => $value)
		{
			$encode_str .= "&" . $key . "=" . $value;
		}
		$encode_str .= "&HashIV=" . $hash_iv;
		$encode_str = strtolower(urlencode($encode_str));
		$encode_str = _replaceChar($encode_str);
		return md5($encode_str);
	}
    //仿自然排序法
    function merchantSort($a,$b)
	{
		return strcasecmp($a, $b);
	}
//------------------------------------------交易輸入參數------------------------------------------------------
//訂單編號
$trade_no = "StageTest".time();
//交易金額
$total_amt = "100";
//交易描述
$trade_desc = "交易測試(測試)";
//如果商品名稱有多筆，需在金流選擇頁一行一行顯示商品名稱的話，商品名稱請以井號分隔(#)
$item_name = "交易測試(測試)";
//交易返回頁面
$return_url = "http://www.allpay.com.tw/receive.php";
//交易通知網址
$client_back_url = "http://www.allpay.com.tw/receive.php";
//選擇預設付款方式
$choose_payment = "ALL";
//是否需要額外的付款資訊
$needExtraPaidInfo = "Y";
//Alipay 必要參數
$alipay_item_name = $item_name;
$alipay_item_counts = 1;
$alipay_item_price = $total_amt;
$alipay_email = 'stage_test@allpay.com.tw';
$alipay_phone_no = '0911222333';
$alipay_user_name = 'Stage Test';
/***************以下為測試環境資訊(若轉換為正式環境,請修改以下參數值)**********************/
//交易網址(測試環境)
$gateway_url = "http://payment-stage.allpay.com.tw/Cashier/AioCheckOut";
//商店代號
$merchant_id = "2000132";
//HashKey
$hash_key = "5294y06JbISpM5x9";
//HashIV
$hash_iv = "v77hoKGq4kWxNNIS";
/********************************************************************************************/
$form_array = array(
    "MerchantID" => $merchant_id,
    "MerchantTradeNo" => $trade_no,
    "MerchantTradeDate" => date("Y/m/d H:i:s"),
    "PaymentType" => "aio",
    "TotalAmount" => $total_amt,
    "TradeDesc" => $trade_desc,
    "ItemName" => $item_name,
    "ReturnURL" => $return_url,
    "ChoosePayment" => $choose_payment,
   "ClientBackURL" => $client_back_url,
	"NeedExtraPaidInfo" => $needExtraPaidInfo,
  );
  
     # 調整ksort排序規則--依自然排序法(大小寫不敏感)
     uksort($form_array, 'merchantSort');
     # 取得 Mac Value
	$form_array['CheckMacValue'] = _getMacValue($hash_key, $hash_iv, $form_array);
	
$html_code = '<form target="_blank" method=post action="' . $gateway_url . '">';
foreach ($form_array as $key => $val) {
    $html_code .= "<input type='text' name='" . $key . "' value='" . $val . "'><BR>";
}
$html_code .= "<input  class='button04' type='submit' value='送出'>";
$html_code .= "</form>";
echo $html_code;
?>