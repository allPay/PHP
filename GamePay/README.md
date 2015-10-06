# GamePay遊戲寶介接範例 #

### Version ###
1.0
### How To Use ###
以下提供C#及PHP範例
### Usage ###

### C# ###
設定交易參數
```sh
SortedDictionary<string, string> testStr = new SortedDictionary<string, string>();
testStr.Add("MerchantID", "2000132"); //商店代號
testStr.Add("MerchantTradeNo", "TEST" + new Random().Next(0, 99999).ToString()); //訂單編號
testStr.Add("MerchantTradeDate", DateTime.Now.ToString("yyyy/MM/dd HH:mm:ss")); //交易日期
testStr.Add("PaymentType", "aio"); //交易型態
testStr.Add("TotalAmount", "100"); //交易金額
testStr.Add("TradeDesc", "遊戲寶交易測試(測試)"); //交易描述
testStr.Add("ItemName", "遊戲寶全家立即儲100元(測試)"); //商品名稱
testStr.Add("ReturnURL", "http://www.allpay.com.tw/receive.php"); //交易返回頁面
testStr.Add("ChoosePayment", "APPBARCODE"); //選擇預設付款方式
```
組成Query String，並在Query String前後加上HashKey及HashIV
```sh
string str = string.Empty;
string str_pre = string.Empty;
foreach (var test in testStr)
{
    str += string.Format("&{0}={1}", test.Key, test.Value);
}
str_pre += "HashKey=5294y06JbISpM5x9" + str + "&HashIV=v77hoKGq4kWxNNIS";
```
將Query String做UrlEncode，並將字串全部轉成小寫字母
```sh
string urlEncodeStrPost = HttpUtility.UrlEncode(str_pre);
string ToLower = urlEncodeStrPost.ToLower();
```
計算CheckMacValue參數數值
```sh
MD5 md5Hasher = MD5.Create();
byte[] data = md5Hasher.ComputeHash(Encoding.Default.GetBytes(ToLower));
StringBuilder sBuilder = new StringBuilder();
for (int i = 0; i < data.Length; i++)
{
sBuilder.Append(data[i].ToString("X2"));//MD5碼 大小寫
}
string sCheckMacValue = sBuilder.ToString();
testStr.Add("CheckMacValue", sCheckMacValue);
``` 
將參數以Post方式傳送至交易網址
```sh
System.Text.StringBuilder sb = new System.Text.StringBuilder();

sb.Append("<html><body>").AppendLine();
sb.Append("<form name='allpayTradeTest'  id='allpayTradeTest' action='" + AllpayUrl + "' method='POST'>").AppendLine();
foreach (var aa in testStr)
{
    sb.Append("<input type='hidden' name='" + aa.Key + "' value='" + aa.Value + "'>").AppendLine();
}
sb.Append("</form>").AppendLine();
sb.Append("<script> var theForm = document.forms['allpayTradeTest'];  if (!theForm) { theForm = document.allpayTradeTest; } theForm.submit(); </script>").AppendLine();
sb.Append("<html><body>").AppendLine();

Response.Write(sb.ToString());
Response.End();
``` 
### PHP ###
設定交易參數
```sh
$gateway_url = "http://payment-stage.allpay.com.tw/Cashier/AioCheckOut"; //交易網址(測試環境)
$merchant_id = "2000132"; //商店代號
$hash_key = "5294y06JbISpM5x9"; //HashKey
$hash_iv = "v77hoKGq4kWxNNIS"; //HashIV
$trade_no = "StageTest".time(); //訂單編號
$total_amt = "100"; //交易金額
$trade_desc = "遊戲寶交易測試(測試)"; //交易描述
$item_name = "遊戲寶全家立即儲100元(測試)";  //商品名稱
$return_url = "http://www.allpay.com.tw/receive.php"; //交易返回頁面
$client_back_url = "http://www.allpay.com.tw/receive.php"; //交易通知網址
$choose_payment = "APPBARCODE"; //選擇預設付款方式
$needExtraPaidInfo = "N"; //是否需要額外的付款資訊
```
將參數存入array
```sh
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
	"NeedExtraPaidInfo" => $needExtraPaidInfo
  );
```
array依自然排序法排序(大小寫不敏感)
```sh
ksort($form_array, SORT_NATURAL |SORT_FLAG_CASE);
``` 
計算CheckMacValue，並存入array
```sh
$form_array['CheckMacValue'] = _getMacValue($hash_key, $hash_iv, $form_array);

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

//特殊字元置換
function _replaceChar($value)
{
	$search_list = array('%2d', '%5f', '%2e', '%21', '%2a', '%28', '%29');
	$replace_list = array('-', '_', '.', '!', '*', '(', ')');
	$value = str_replace($search_list, $replace_list ,$value);
	
	return $value;
}
``` 
將array參數以Post方式傳送至交易網址
```sh
$html_code = '<form target="_blank" method=post action="' . $gateway_url . '">';
foreach ($form_array as $key => $val) {
    $html_code .= "<input type='text' name='" . $key . "' value='" . $val . "'><BR>";
}
$html_code .= "<input  class='button04' type='submit' value='送出'>";
$html_code .= "</form>";
echo $html_code;
``` 
### ChangeLog ###
1.0 GamePay介接範例
### License ###
MIT
