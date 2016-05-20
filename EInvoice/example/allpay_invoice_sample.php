<?php

/*
電子發票測試介面
串接電子發票SDK
版本:1.0.3
@author Wesley
2016-01-11 範例程式建立
2016-05-19 增加安全檢查filtervar函式
*/

// 傳入參數安全檢查
foreach ($_POST as $key => $value)
{
	$VAR_POST[$key] = filtervar($value);
}

$Invoice_Method		= isset($VAR_POST['Invoice_Method'])	? $VAR_POST['Invoice_Method']		: 'INVOICE';
$Invoice_Url		= '' ;
$sAllpay_Merchant_Id	= isset($VAR_POST['allpay_merchant_id'])? $VAR_POST['allpay_merchant_id']	: '2000132';
$sAllpay_Hash_Key	= isset($VAR_POST['allpay_hash_key'])	? $VAR_POST['allpay_hash_key']		: 'ejCk326UnaZWKisg';
$sAllpay_Hash_Iv	= isset($VAR_POST['allpay_hash_iv'])	? $VAR_POST['allpay_hash_iv']		: 'q9jcZX8Ib9LM8wYk';

$RelateNumber		= isset($VAR_POST['RelateNumber'])	? $VAR_POST['RelateNumber']		: '';
$CustomerID		= isset($VAR_POST['CustomerID'])	? $VAR_POST['CustomerID']		: '';
$CustomerIdentifier	= isset($VAR_POST['CustomerIdentifier'])? $VAR_POST['CustomerIdentifier']	: '';
$CustomerName		= isset($VAR_POST['CustomerName'])	? $VAR_POST['CustomerName']		: '';
$CustomerAddr		= isset($VAR_POST['CustomerAddr'])	? $VAR_POST['CustomerAddr']		: '';
$CustomerPhone		= isset($VAR_POST['CustomerPhone'])	? $VAR_POST['CustomerPhone']		: '';
$CustomerEmail		= isset($VAR_POST['CustomerEmail'])	? $VAR_POST['CustomerEmail']		: '';
$ClearanceMark		= isset($VAR_POST['ClearanceMark'])	? $VAR_POST['ClearanceMark']		: '';
$Print			= isset($VAR_POST['Print'])		? $VAR_POST['Print']			: '';
$Donation		= isset($VAR_POST['Donation'])		? $VAR_POST['Donation']			: '';
$LoveCode		= isset($VAR_POST['LoveCode'])		? $VAR_POST['LoveCode']			: '';
$CarruerType		= isset($VAR_POST['CarruerType'])	? $VAR_POST['CarruerType']		: '';
$CarruerNum		= isset($VAR_POST['CarruerNum'])	? $VAR_POST['CarruerNum']		: '';
$TaxType		= isset($VAR_POST['TaxType'])		? $VAR_POST['TaxType']			: '';
$SalesAmount		= isset($VAR_POST['SalesAmount'])	? $VAR_POST['SalesAmount']		: '';
$InvoiceRemark		= isset($VAR_POST['InvoiceRemark'])	? $VAR_POST['InvoiceRemark']		: '';
$ItemName		= isset($VAR_POST['ItemName'])		? $VAR_POST['ItemName']			: '';
$ItemCount		= isset($VAR_POST['ItemCount'])		? $VAR_POST['ItemCount']		: '';
$ItemWord		= isset($VAR_POST['ItemWord'])		? $VAR_POST['ItemWord']			: '';
$ItemPrice		= isset($VAR_POST['ItemPrice'])		? $VAR_POST['ItemPrice']		: '';
$ItemTaxType		= isset($VAR_POST['ItemTaxType'])	? $VAR_POST['ItemTaxType']		: '';
$ItemAmount		= isset($VAR_POST['ItemAmount'])	? $VAR_POST['ItemAmount']		: '';
$InvType		= isset($VAR_POST['InvType'])		? $VAR_POST['InvType']			: '';
$vat			= isset($VAR_POST['vat'])		? $VAR_POST['vat']			: '';
$DelayFlag		= isset($VAR_POST['DelayFlag'])		? $VAR_POST['DelayFlag']		: '';
$DelayDay		= isset($VAR_POST['DelayDay'])		? $VAR_POST['DelayDay']			: '';
$ECBankID		= isset($VAR_POST['ECBankID'])		? $VAR_POST['ECBankID']			: '';
$Tsr			= isset($VAR_POST['Tsr'])		? $VAR_POST['Tsr']			: '';
$PayType		= isset($VAR_POST['PayType'])		? $VAR_POST['PayType']			: '';
$PayAct			= isset($VAR_POST['PayAct'])		? $VAR_POST['PayAct']			: '';
$NotifyURL		= isset($VAR_POST['NotifyURL'])		? $VAR_POST['NotifyURL']		: '';
$InvoiceNo		= isset($VAR_POST['InvoiceNo'])		? $VAR_POST['InvoiceNo']		: '';
$AllowanceNotify	= isset($VAR_POST['AllowanceNotify'])	? $VAR_POST['AllowanceNotify']		: '';
$NotifyMail		= isset($VAR_POST['NotifyMail'])	? $VAR_POST['NotifyMail']		: '';
$NotifyPhone		= isset($VAR_POST['NotifyPhone'])	? $VAR_POST['NotifyPhone']		: '';
$AllowanceAmount	= isset($VAR_POST['AllowanceAmount'])	? $VAR_POST['AllowanceAmount']		: '';
$InvoiceNumber		= isset($VAR_POST['InvoiceNumber'])	? $VAR_POST['InvoiceNumber']		: '';
$Reason			= isset($VAR_POST['Reason'])		? $VAR_POST['Reason']			: '';
$AllowanceNo		= isset($VAR_POST['AllowanceNo'])	? $VAR_POST['AllowanceNo']		: '';
$Phone			= isset($VAR_POST['Phone'])		? $VAR_POST['Phone']			: '';
$Notify			= isset($VAR_POST['Notify'])		? $VAR_POST['Notify']			: '';
$InvoiceTag		= isset($VAR_POST['InvoiceTag'])	? $VAR_POST['InvoiceTag']		: '';
$Notified		= isset($VAR_POST['Notified'])		? $VAR_POST['Notified']			: '';
$ItemRemark		= isset($VAR_POST['ItemRemark'])	? $VAR_POST['ItemRemark']		: '';

$sMsg			= '';
$bError			= false;

if (isset($VAR_POST['Invoice_Method']))
{
	// 判斷
	switch ($Invoice_Method)
	{
		case 'INVOICE':
	        	$Invoice_Url = 'http://einvoice-stage.allpay.com.tw/Invoice/Issue' ;
		break;
		case 'INVOICE_DELAY':
	        	$Invoice_Url = 'http://einvoice-stage.allpay.com.tw/Invoice/DelayIssue' ;
		break;
		case 'ALLOWANCE':
	        	$Invoice_Url = 'http://einvoice-stage.allpay.com.tw/Invoice/Allowance' ;
		break;
		case 'INVOICE_VOID':
	        	$Invoice_Url = 'http://einvoice-stage.allpay.com.tw/Invoice/IssueInvalid' ;
		break;
		case 'ALLOWANCE_VOID':
	        	$Invoice_Url = 'http://einvoice-stage.allpay.com.tw/Invoice/AllowanceInvalid' ;
		break;
		case 'INVOICE_SEARCH':
	        	$Invoice_Url = 'http://einvoice-stage.allpay.com.tw/Query/Issue' ;
		break;
		case 'INVOICE_VOID_SEARCH':
	        	$Invoice_Url = 'http://einvoice-stage.allpay.com.tw/Query/IssueInvalid' ;
		break;
		case 'ALLOWANCE_SEARCH':
	        	$Invoice_Url = 'http://einvoice-stage.allpay.com.tw/Query/Allowance' ;
		break;
		case 'ALLOWANCE_VOID_SEARCH':
	        	$Invoice_Url = 'http://einvoice-stage.allpay.com.tw/Query/AllowanceInvalid' ;
		break;
		case 'INVOICE_NOTIFY':
	        	$Invoice_Url = 'http://einvoice-stage.allpay.com.tw/Notify/InvoiceNotify' ;
		break;
		case 'INVOICE_TRIGGER':
	        	$Invoice_Url = 'http://einvoice-stage.allpay.com.tw/Invoice/TriggerIssue' ;
		break;
	}
	
	if($Invoice_Url == '')
	{
		$bError = true ;
		$sMsg .= ( empty($sMsg) ? '' : WEB_MESSAGE_NEW_LINE ) . '請選擇動作方式';	
	}

}

if(!$bError && isset($VAR_POST['Invoice_Method']))
{	
	
	try
	{
		include_once('AllPay_Invoice.php');
		$allpay_invoice = new AllInvoice ;
		
		// 1.服務參數
		$allpay_invoice->Invoice_Method 		= $Invoice_Method ;
		$allpay_invoice->Invoice_Url 			= $Invoice_Url;
		$allpay_invoice->MerchantID 			= $sAllpay_Merchant_Id;
		$allpay_invoice->HashKey 			= $sAllpay_Hash_Key;
		$allpay_invoice->HashIV 			= $sAllpay_Hash_Iv;
		
		// 2.基本參數
		$aItems	= array();
		$aItems[0]['ItemName'] 				= $ItemName ;
		$aItems[0]['ItemCount'] 			= $ItemCount ;
		$aItems[0]['ItemWord'] 				= $ItemWord ;
		$aItems[0]['ItemPrice'] 			= $ItemPrice ;
		$aItems[0]['ItemTaxType'] 			= $ItemTaxType ;
		$aItems[0]['ItemAmount'] 			= $ItemAmount ;
		$aItems[0]['ItemRemark'] 			= $ItemRemark ;
		
		$allpay_invoice->Send['Items'] 			= $aItems ;
		
		$allpay_invoice->Send['RelateNumber'] 		= $RelateNumber;
		$allpay_invoice->Send['CustomerID'] 		= $CustomerID;
		$allpay_invoice->Send['CustomerIdentifier'] 	= $CustomerIdentifier;
		$allpay_invoice->Send['CustomerName'] 		= $CustomerName;
		$allpay_invoice->Send['CustomerAddr'] 		= $CustomerAddr;
		$allpay_invoice->Send['CustomerPhone'] 		= $CustomerPhone;
		$allpay_invoice->Send['CustomerEmail'] 		= $CustomerEmail;
		$allpay_invoice->Send['ClearanceMark'] 		= $ClearanceMark;
		$allpay_invoice->Send['Print'] 			= $Print;
		$allpay_invoice->Send['Donation'] 		= $Donation;
		$allpay_invoice->Send['LoveCode'] 		= $LoveCode;
		$allpay_invoice->Send['CarruerType'] 		= $CarruerType;
		$allpay_invoice->Send['CarruerNum'] 		= $CarruerNum;
		$allpay_invoice->Send['TaxType'] 		= $TaxType;
		$allpay_invoice->Send['SalesAmount'] 		= $SalesAmount;
		$allpay_invoice->Send['InvoiceRemark'] 		= $InvoiceRemark;	
		$allpay_invoice->Send['InvType'] 		= $InvType;
		$allpay_invoice->Send['vat'] 			= $vat;
		$allpay_invoice->Send['DelayFlag'] 		= $DelayFlag;
		$allpay_invoice->Send['DelayDay'] 		= $DelayDay;
		$allpay_invoice->Send['ECBankID'] 		= $ECBankID;
		$allpay_invoice->Send['Tsr'] 			= $Tsr;
		$allpay_invoice->Send['PayType'] 		= $PayType;
		$allpay_invoice->Send['PayAct'] 		= $PayAct;
		$allpay_invoice->Send['NotifyURL'] 		= $NotifyURL;
		$allpay_invoice->Send['InvoiceNo'] 		= $InvoiceNo;
		$allpay_invoice->Send['AllowanceNotify'] 	= $AllowanceNotify;
		$allpay_invoice->Send['NotifyMail'] 		= $NotifyMail;
		$allpay_invoice->Send['NotifyPhone'] 		= $NotifyPhone;
		$allpay_invoice->Send['AllowanceAmount'] 	= $AllowanceAmount;
		$allpay_invoice->Send['InvoiceNumber'] 		= $InvoiceNumber;
		$allpay_invoice->Send['Reason'] 		= $Reason;
		$allpay_invoice->Send['AllowanceNo'] 		= $AllowanceNo;
		$allpay_invoice->Send['Phone'] 			= $Phone;
		$allpay_invoice->Send['Notify'] 		= $Notify;
		$allpay_invoice->Send['InvoiceTag'] 		= $InvoiceTag;
		$allpay_invoice->Send['Notified'] 		= $Notified;
		
		// 3.送出參數
		$aReturn_Info = $allpay_invoice->Check_Out();
		
		// 4.返回陣列
		foreach($aReturn_Info as $key => $value)
		{
			$sMsg .=   $key . ' => ' . $value . '<br>' ;	
		}
	}
	catch (Exception $e)
	{
		// 例外錯誤處理。
		$sMsg = $e->getMessage();
	}

}	

// 驗證傳入參數是否符合安全性
function filtervar($sPost_Data)
{
	/**
	* 您可以在此函式中，判斷資料格式是否符合程式需求，避免有心人利用$_POST元素進行XSS或是SQL Injection等攻擊。
	*/
	
	return $sPost_Data;
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>歐付寶電子發票串接測試</title>
</head>
<body>
	<div id="contain-primary">
		<div class="contain-title">歐付寶電子發票串接測試 PHP V1.0.3</div>
		<?php if(!empty($sMsg)){ echo '<div id="errormsg">' .$sMsg . '</div>' ; } ?>
		<form name="form1" method="post" action="">
			<table border="0" cellspacing="0" cellpadding="0" id="table-form">
				<tr>
					<th width="300px" class="td-left">特店編號</th>
					<td colspan="3"><input name="allpay_merchant_id" type="text" value="<?php echo $sAllpay_Merchant_Id ; ?>" size="50" /></td>
				</tr>
				<tr>
					<th width="300px" class="td-left">HashKey</th>
					<td width="500px"><input name="allpay_hash_key" type="text" value="<?php echo $sAllpay_Hash_Key ; ?>" size="50" /></td>
					<th width="250px" class="td-left">HashIV</th>
					<td><input name="allpay_hash_iv" type="text" value="<?php echo $sAllpay_Hash_Iv ; ?>" size="50" /></td>
				</tr>
				<tr>
					<th class="td-left">執行動作</th>
					<td>
						<select name="Invoice_Method" onchange="javascript:ajax_query1()" >
							<option value="INVOICE" <?php if($Invoice_Method == 'INVOICE'){echo 'selected' ; } ?>>A.一般開立發票</option>
							<option value="INVOICE_DELAY" <?php if($Invoice_Method == 'INVOICE_DELAY'){echo 'selected' ; } ?>>B.延遲或觸發開立發票</option>
							<option value="ALLOWANCE" <?php if($Invoice_Method == 'ALLOWANCE'){echo 'selected' ; } ?>>C.開立折讓</option>
							<option value="INVOICE_VOID" <?php if($Invoice_Method == 'INVOICE_VOID'){echo 'selected' ; } ?>>D.發票作廢</option>
							<option value="ALLOWANCE_VOID" <?php if($Invoice_Method == 'ALLOWANCE_VOID'){echo 'selected' ; } ?>>E.折讓作廢</option>
							<option value="INVOICE_SEARCH" <?php if($Invoice_Method == 'INVOICE_SEARCH'){echo 'selected' ; } ?>>F.查詢發票</option>
							<option value="INVOICE_VOID_SEARCH" <?php if($Invoice_Method == 'INVOICE_VOID_SEARCH'){echo 'selected' ; } ?>>G.查詢作廢發票</option>
							<option value="ALLOWANCE_SEARCH" <?php if($Invoice_Method == 'ALLOWANCE_SEARCH'){echo 'selected' ; } ?>>H.查詢折讓明細</option>
							<option value="ALLOWANCE_VOID_SEARCH" <?php if($Invoice_Method == 'ALLOWANCE_VOID_SEARCH'){echo 'selected' ; } ?>>I.查詢折讓作廢明細</option>
							<option value="INVOICE_NOTIFY" <?php if($Invoice_Method == 'INVOICE_NOTIFY'){echo 'selected' ; } ?>>J.發送通知</option>
							<option value="INVOICE_TRIGGER" <?php if($Invoice_Method == 'INVOICE_TRIGGER'){echo 'selected' ; } ?>>K.付款完成觸發或延遲開立發票</option>
						</select>
					</td>
					<th class="td-left">連線網址</th>
					<td><div id="invoice_url"><?php echo $Invoice_Url ; ?></div></td>
				</tr>
			
			</table>
			<br>
			<table border="0" cellspacing="0" cellpadding="0" id="table-form">
				<tr>
					<th width="300px" class="td-left" id="4" title="‧空值:否&#10;‧預設不可重複&#10;‧預設最大長度為30碼">4.廠商自訂編號 RelateNumber</th>
					<td width="500px" ><input name="RelateNumber" type="text" value="<?php echo $RelateNumber ; ?>" size="50" /></td>
					<th width="250px"class="td-left" id="5" title="‧空值:是&#10;‧若載具類別 = '1' (會員載具)時，則客戶代號須有值&#10;‧若客戶代號有值時，則&#10;->預設最大長度為20碼&#10;->只接受英、數字與下底線格式">5.客戶代號 CustomerID</th>
					<td><input name="CustomerID" type="text" value="<?php echo $CustomerID ; ?>" size="50" /></td>
				</tr>
				<tr>
					<th class="td-left" id="6" title="‧空值:是&#10;‧若統一編號有值時，則固定長度為數字8碼">6.統一編號 CustomerIdentifier</th>
					<td><input name="CustomerIdentifier" type="text" value="<?php echo $CustomerIdentifier ; ?>" size="50" /></td>
					<th class="td-left" id="7" title="空值:是&#10;‧若列印註記 = 1 (列印)時，則客戶名稱須有值&#10;‧若客戶名稱有值時，則&#10;->僅能為中英數字格式&#10;->預設最大長度為30碼&#10;->請將參數值做UrlEncode">7.客戶名稱 CustomerName</th>
					<td><input name="CustomerName" type="text" value="<?php echo $CustomerName ; ?>" size="50" /></td>
				</tr>
				<tr>
					<th class="td-left" id="8" title="空值:是&#10;‧若列印註記 = 1 (列印)時，則客戶地址須有值&#10;->預設最大長度為100碼">8.客戶地址 CustomerAddr</th>
					<td><input name="CustomerAddr" type="text" value="<?php echo $CustomerAddr ; ?>" size="50" /></td>
					<th class="td-left" id="9" title="空值:是&#10;‧若客戶電子信箱為空值時，則客戶手機號碼不可為空值&#10;‧若客戶手機號碼有值時，則&#10;->預設格式為數字組成&#10;->預設最小長度為1碼，最大長度為20碼">9.客戶手機號碼 CustomerPhone</th>
					<td><input name="CustomerPhone" type="text" value="<?php echo $CustomerPhone ; ?>" size="50" /></td>
				</tr>
				<tr>
					<th class="td-left" id="10" title="空值:是&#10;‧若客戶手機號碼為空值時，則客戶電子信箱不可為空值&#10;‧若客戶電子信箱有值時，則&#10;->格式僅能為Email的標準格式->預設最大長度為80碼">10.客戶電子信箱 CustomerEmail</th>
					<td><input name="CustomerEmail" type="text" value="<?php echo $CustomerEmail ; ?>" size="50" /></td>
					<th class="td-left" id="11" title="空值:是&#10;‧若課稅類別等於2(零稅率)時&#10;->則VAL = '1'(經海關出口)或'2'(非經海關出口)&#10;‧若課稅類別不等於2(零稅率)時&#10;->則VAL = ''">11.通關方式 ClearanceMark</th>
					<td><input name="ClearanceMark" type="text" value="<?php echo $ClearanceMark ; ?>" size="50" /><br></td>
				</tr>
				<tr>
					<th class="td-left" id="12" title="空值:否&#10;‧若列印註記有值時，則&#10;->僅能為VAL = '0' (不列印)或VAL = '1' (列印)&#10;‧補充說明&#10;->若捐贈註記 = '1' (捐贈)時，則VAL = '0' (不列印)&#10;->若統一編號有值時，則VAL = '1' (列印)">12.列印註記 Print</th>
					<td>
						<select name="Print">
							<option value="" <?php if($Print == ''){echo 'selected' ; } ?>>請選擇</option>
							<option value="0" <?php if($Print == '0'){echo 'selected' ; } ?>>0.不列印</option>
							<option value="1" <?php if($Print == '1'){echo 'selected' ; } ?>>1.列印</option>
						</select>
					</td>
					<th class="td-left" id="13" title="空值:否&#10;‧固定給定下述預設值&#10;->若為捐贈時，則VAL = '1'&#10;->若為不捐贈時，則VAL = '2'&#10;‧補充說明&#10;->若統一編號有值時，則VAL = '2' (不捐贈)">13.捐贈註記 Donation</th>
					<td>
						<select name="Donation">
							<option value="0" <?php if($Donation == 0){echo 'selected' ; } ?>>請選擇</option>
							<option value="1" <?php if($Donation == '1'){echo 'selected' ; } ?>>1.捐贈</option>
							<option value="2" <?php if($Donation == '2'){echo 'selected' ; } ?>>2.不捐贈</option>
						</select>
					</td>
				</tr>
				<tr>
					<th class="td-left" id="14" title="空值:是&#10;‧若捐贈註記 = '1' (捐贈)時，則&#10;->須有值&#10;->長度限制為3至7碼&#10;->格式為全數字或1碼大小寫「X」加上2至6碼數字">14.愛心碼 LoveCode</th>
					<td><input name="LoveCode" type="text" value="<?php echo $LoveCode ; ?>" size="50" /></td>
					<th class="td-left" id="15" title="空值:是&#10;‧固定給定下述預設值&#10;->若為無載具時，則VAL = ''&#10;->若為會員載具時，則VAL = '1'&#10;->若為買受人之自然人憑證號碼時，則VAL = '2'&#10;->若為買受人之手機條碼資料時，則VAL = '3'&#10;‧補充說明&#10;->若統一編號有值時，則載具類別不可為會員載具或自然人憑證載具">15.載具類別 CarruerType</th>
					<td>
						<select name="CarruerType">
							<option value="0" <?php if($CarruerType == 0){echo 'selected' ; } ?>>請選擇</option>
							<option value="" <?php if($CarruerType == ''){echo 'selected' ; } ?>>空值.無載具</option>
							<option value="1" <?php if($CarruerType == '1'){echo 'selected' ; } ?>>1.會員載具</option>
							<option value="2" <?php if($CarruerType == '2'){echo 'selected' ; } ?>>2.自然人憑證</option>
							<option value="3" <?php if($CarruerType == '3'){echo 'selected' ; } ?>>3.手機條碼</option>
						</select>
					</td>
				</tr>
				<tr>
					<th class="td-left" id="16" title="空值:是&#10;‧若載具類別為無載具或會員載具時，則VAL=''&#10;‧若載具類別為買受人之自然人憑證號碼時，則&#10;->須有值&#10;->長度固定16碼&#10;->格式為2碼大小寫字母加上14碼數字&#10;‧若載具類別為買受人之手機條碼資料時，則&#10;->須有值&#10;->長度固定7碼&#10;->格式為1碼斜線「/」加上由7碼加號、減號、句號、數字及大小寫字母組成&#10;->若參數值中有加號，可能在介接驗證時發生錯誤，請將加號改為空白字元，產生驗證">16.載具編號 CarruerNum</th>
					<td><input name="CarruerNum" type="text" value="<?php echo $CarruerNum ; ?>" size="50" /></td>
					<th class="td-left" id="17" title="空值:否&#10;‧固定給定下述預設值&#10;->若為應稅時，則VAL = '1'&#10;->若為零稅率時，則VAL = '2'&#10;->若為免稅時，則VAL = '3'&#10;->若為混合應稅與免稅時(限收銀機發票無法分辨時使用，且需通過申請核可)，則VAL = '9'">17.課稅類別 TaxType</th>
					<td>
						<select name="TaxType">
							<option value="0" <?php if($TaxType == 0){echo 'selected' ; } ?>>請選擇</option>
							<option value="1" <?php if($TaxType == '1'){echo 'selected' ; } ?>>1.應稅</option>
							<option value="2" <?php if($TaxType == '2'){echo 'selected' ; } ?>>2.零稅率</option>
							<option value="3" <?php if($TaxType == '3'){echo 'selected' ; } ?>>3.免稅</option>
							<option value="9" <?php if($TaxType == '9'){echo 'selected' ; } ?>>9.混合應稅與免稅</option>
						</select>
					</td>
				</tr>
				<tr>
					<th class="td-left" id="18" title="空值:否&#10;‧含稅總金額">18.發票金額 SalesAmount</th>
					<td><input name="SalesAmount" type="text" value="<?php echo $SalesAmount ; ?>" size="50" /></td>
					<th class="td-left" id="19" title="空值:是">19.備註 InvoiceRemark</th>
					<td><input name="InvoiceRemark" type="text" value="<?php echo $InvoiceRemark ; ?>" size="50" /></td>
				</tr>
				<tr>
					<th class="td-left" id="20" title="空值:否&#10;‧預設格式如下&#10;名稱1|名稱2|名稱3| … | 名稱n&#10;‧若含二筆或以上的商品名稱時，則以「|」符號區隔">20.商品名稱 ItemName</th>
					<td><input name="ItemName" type="text" value="<?php echo $ItemName ; ?>" size="50" /></td>
					<th class="td-left" id="21" title="空值:否&#10;‧預設格式如下&#10;數量1|數量2|數量3| … |數量n&#10;‧若含二筆或以上的商品數量時，則以「|」符號區隔">21.商品數量 ItemCount</th>
					<td><input name="ItemCount" type="text" value="<?php echo $ItemCount ; ?>" size="50" /></td>
				</tr>
				<tr>
					<th class="td-left" id="22" title="空值:否&#10;‧預設格式如下&#10;單位1|單位2|單位3| … |單位n&#10;‧若含二筆或以上的商品單位時，則以「|」符號區隔&#10;‧預設最大長度為6碼">22.商品單位 ItemWord</th>
					<td><input name="ItemWord" type="text" value="<?php echo $ItemWord ; ?>" size="50" /></td>
					<th class="td-left" id="23" title="空值:否&#10;‧預設格式如下&#10;價格1|價格2|價格3| … |價格n&#10;‧若含二筆或以上的商品價格時，則以「|」符號區隔&#10;‧含稅單價金額">23.商品價格 ItemPrice</th>
					<td><input name="ItemPrice" type="text" value="<?php echo $ItemPrice ; ?>" size="50" /></td>
				</tr>
				<tr>
					<th class="td-left" id="24" title="空值:否&#10;‧預設格式如下&#10;課稅類別1|課稅類別2|課稅類別3| … |課稅類別n&#10;‧若含二筆或以上的商品課稅別時，則以「|」符號區隔&#10;‧課稅類別需混合應稅與免稅，TaxType = 9時&#10;‧商品課稅別固定給定下述預設值&#10;->若為應稅時，則VAL = '1'&#10;->若為免稅時，則VAL = '3'&#10;‧需含二筆或以上的商品課稅別，且至少需有一筆商品課稅別為應稅及至少需有一筆商品課稅別為免稅">24.商品課稅別 ItemTaxType</th>
					<td><input name="ItemTaxType" type="text" value="<?php echo $ItemTaxType ; ?>" size="50" /></td>
					<th class="td-left" id="25" title="空值:否&#10;‧預設格式如下&#10;合計1|合計2|合計3| … | 合計n&#10;‧若含二筆或以上的商品合計時，則以「|」符號區隔&#10;‧含稅小計金額">25.商品合計 ItemAmount</th>
					<td><input name="ItemAmount" type="text" value="<?php echo $ItemAmount ; ?>" size="50" /></td>
				</tr>
				<tr>
					<th class="td-left" id="143" title="空值:是&#10;‧預設格式如下&#10;備註1|備註2|備註3| … | 備註n&#10;‧若含二筆或以上的商品合計時，則以「|」符號區隔&#10;‧僅開放一般發票開立，單筆40最多字元">143.商品備註 ItemRemark</th>
					<td><input name="ItemRemark" type="text" value="<?php echo $ItemRemark ; ?>" size="40" /></td>
				
					<th class="td-left" id="27" title="空值:否&#10;‧固定給定下述預設值&#10;->若為一般稅額計算時，則VAL = '07'&#10;->若為特種稅額計算時，則VAL = '08'">27.字軌類別 InvType</th>
					<td>
						<select name="InvType">
							<option value="0" <?php if($InvType == 0){echo 'selected' ; } ?>>請選擇</option>
							<option value="07" <?php if($InvType == '07'){echo 'selected' ; } ?>>07.一般稅額</option>
							<option value="08" <?php if($InvType == '08'){echo 'selected' ; } ?>>08.特種稅額</option>
						</select>
					</td>
					
				</tr>
				<tr>
					<th class="td-left" id="28" title="空值:否&#10;‧預設格式如下&#10;「yyyy-MM-dd HH:mm:ss」&#10;‧不得大於當下時間且限48小時以內的時間&#10;‧不帶此參數或此參數無值時，發票開立時間預設為當下時間">28.發票開立時間 InvCreateDate</th>
					<td>1.0.3版 已經移除該參數</td>
					<th class="td-left" id="29" title="空值:否&#10;‧固定給定下述預設值&#10;->若為含稅價，則VAL = '1'&#10;->若為未稅價時，則VAL = '0'&#10;‧不帶此參數或此參數無值時，預設為含稅價">29.商品單價是否含稅 vat</th>
					<td>
						<select name="vat">
							<option value="" <?php if($vat == ''){echo 'selected' ; } ?>>請選擇</option>
							<option value="0" <?php if($vat == '0'){echo 'selected' ; } ?>>0.未稅價</option>
							<option value="1" <?php if($vat == '1'){echo 'selected' ; } ?>>1.含稅價</option>
						</select>
					</td>
				</tr>
				<tr>
					<th class="td-left" id="30" title="空值:否&#10;‧固定給定下述預設值&#10;->若為延遲時，則VAL = '1'&#10;->若為觸發時，則VAL = '2'">30.延遲註記 DelayFlag</th>
					<td>
						<select name="DelayFlag">
							<option value="0" <?php if($DelayFlag == 0){echo 'selected' ; } ?>>請選擇</option>
							<option value="1" <?php if($DelayFlag == '1'){echo 'selected' ; } ?>>1.延遲</option>
							<option value="2" <?php if($DelayFlag == '2'){echo 'selected' ; } ?>>2.觸發</option>
						</select>
					</td>
					<th class="td-left" id="31" title="空值:否&#10;‧若為延遲開立時&#10;->延遲天數須介於1至15天內&#10;‧若為觸發開立時&#10;->延遲天數須介於0至15天內">31.延遲天數 DelayDay</th>
					<td>
						<select name="DelayDay">
							<option value="" <?php if($DelayDay == ''){echo 'selected' ; } ?>>請選擇</option>
							<option value="0" <?php if($DelayDay == '0'){echo 'selected' ; } ?>>0</option>
							<option value="1" <?php if($DelayDay == '1'){echo 'selected' ; } ?>>1</option>
							<option value="2" <?php if($DelayDay == '2'){echo 'selected' ; } ?>>2</option>
							<option value="3" <?php if($DelayDay == '3'){echo 'selected' ; } ?>>3</option>
							<option value="4" <?php if($DelayDay == '4'){echo 'selected' ; } ?>>4</option>
							<option value="5" <?php if($DelayDay == '5'){echo 'selected' ; } ?>>5</option>
							<option value="6" <?php if($DelayDay == '6'){echo 'selected' ; } ?>>6</option>
							<option value="7" <?php if($DelayDay == '7'){echo 'selected' ; } ?>>7</option>
							<option value="8" <?php if($DelayDay == '8'){echo 'selected' ; } ?>>8</option>
							<option value="9" <?php if($DelayDay == '9'){echo 'selected' ; } ?>>9</option>
							<option value="10" <?php if($DelayDay == '10'){echo 'selected' ; } ?>>10</option>
							<option value="11" <?php if($DelayDay == '11'){echo 'selected' ; } ?>>11</option>
							<option value="12" <?php if($DelayDay == '12'){echo 'selected' ; } ?>>12</option>
							<option value="13" <?php if($DelayDay == '13'){echo 'selected' ; } ?>>13</option>
							<option value="14" <?php if($DelayDay == '14'){echo 'selected' ; } ?>>14</option>
							<option value="15" <?php if($DelayDay == '15'){echo 'selected' ; } ?>>15</option>
						</select>
					</td>
				</tr>
				<tr>
					<th class="td-left" id="32" title="空值:是&#10;">32.ECBank代號 ECBankID</th>
					<td><input name="ECBankID" type="text" value="<?php echo $ECBankID ; ?>" size="50" /></td>
					<th class="td-left" id="33" title="空值:否&#10;‧預設不可重複&#10;‧預設最大長度為30碼">33.交易單號 Tsr</th>
					<td><input name="Tsr" type="text" value="<?php echo $Tsr ; ?>" size="50" /></td>
				</tr>
				<tr>
					<th class="td-left" id="34" title="空值:否&#10;‧固定給定下述預設值->若為ECBANK時，則VAL = '1'&#10;->若為ECPAY時，則VAL = '2'&#10;->若為ALLPAY時，則VAL = '3'">34.交易類別 PayType</th>
					<td>
						<select name="PayType">
							<option value="0" <?php if($PayType == 0){echo 'selected' ; } ?>>請選擇</option>
							<option value="1" <?php if($PayType == '1'){echo 'selected' ; } ?>>1.ECBANK</option>
							<option value="2" <?php if($PayType == '2'){echo 'selected' ; } ?>>2.ECPAY</option>
							<option value="3" <?php if($PayType == '3'){echo 'selected' ; } ?>>3.ALLPAY</option>
						</select>
					</td>
					<th class="td-left" id="35" title="空值:否&#10;‧固定給定下述預設值&#10;->若交易類別='1'時，則VAL = 'ECBANK'&#10;->若交易類別='2'時，則VAL = 'ECPAY'&#10;->若交易類別='3'時，則VAL = 'ALLPAY'">35.交易類別名稱 PayAct</th>
					<td>
						<select name="PayAct">
							<option value="0" <?php if($PayAct == 0){echo 'selected' ; } ?>>請選擇</option>
							<option value="ECBANK" <?php if($PayAct == 'ECBANK'){echo 'selected' ; } ?>>ECBANK</option>
							<option value="ECPAY" <?php if($PayAct == 'ECPAY'){echo 'selected' ; } ?>>ECPAY</option>
							<option value="ALLPAY" <?php if($PayAct == 'ALLPAY'){echo 'selected' ; } ?>>ALLPAY</option>
						</select>
					</td>
				</tr>
				<tr>
					<th class="td-left" id="36" title="空值:是">36.開立完成時通知廠商的網址 NotifyURL</th>
					<td colspan="3"><input name="NotifyURL" type="text" value="<?php echo $NotifyURL ; ?>" size="50" /></td>
				</tr>
				<tr>
					<th class="td-left" id="37" title="空值:否&#10;‧預設長度固定10碼">37.發票號碼 InvoiceNo</th>
					<td><input name="InvoiceNo" type="text" value="<?php echo $InvoiceNo ; ?>" size="50" /></td>
					<th class="td-left" id="38" title="空值:否&#10;‧固定給定下述預設值&#10;->若為簡訊時，則VAL = 'S'&#10;->若為電子郵件時，則VAL = 'E'&#10;->若為皆通知時，則VAL = 'A'&#10;->若為皆不通知時，則VAL = 'N'">38.通知類別 AllowanceNotify</th>
					<td>
						<select name="AllowanceNotify">
							<option value="0" <?php if($AllowanceNotify == 0){echo 'selected' ; } ?>>請選擇</option>
							<option value="S" <?php if($AllowanceNotify == 'S'){echo 'selected' ; } ?>>S.簡訊</option>
							<option value="E" <?php if($AllowanceNotify == 'E'){echo 'selected' ; } ?>>E.電子郵件</option>
							<option value="A" <?php if($AllowanceNotify == 'A'){echo 'selected' ; } ?>>A.皆通知</option>
							<option value="N" <?php if($AllowanceNotify == 'N'){echo 'selected' ; } ?>>N.皆不通知</option>
						</select>
					</td>
				</tr>
				<tr>
					<th class="td-left" id="39" title="空值:是&#10;‧若客戶電子信箱有值時，則&#10;->格式僅能為Email的標準格式&#10;‧補充說明(下述情況通知電子信箱不可為空值)&#10;->通知手機號碼為空值&#10;->通知類別為E-電子郵件">39.45.通知電子信箱 NotifyMail</th>
					<td><input name="NotifyMail" type="text" value="<?php echo $NotifyMail ; ?>" size="50" /></td>
					<th class="td-left" id="40" title="空值:是&#10;‧若客戶手機號碼有值時，則&#10;->預設格式為數字組成&#10;->預設最小長度為1碼，最大長度為20碼&#10;‧補充說明(下述情況通知手機號碼不可為空值)&#10;->通知電子信箱為空值&#10;->通知類別為S-簡訊">40.通知手機號碼 NotifyPhone</th>
					<td><input name="NotifyPhone" type="text" value="<?php echo $NotifyPhone ; ?>" size="50" /></td>
				</tr>
				<tr>
					<th class="td-left" id="41" title="空值:否&#10;‧含稅總金額">41.折讓單總金額 AllowanceAmount</th>
					<td colspan="3"><input name="AllowanceAmount" type="text" value="<?php echo $AllowanceAmount ; ?>" size="50" /></td>
				</tr>
				<tr>
					<th class="td-left" id="42" title="空值:否&#10;預設長度固定10碼">42.發票號碼 InvoiceNumber</th>
					<td><input name="InvoiceNumber" type="text" value="<?php echo $InvoiceNumber ; ?>" size="50" /></td>
					<th class="td-left" id="43" title="空值:否&#10;‧字數限制在20(含)個字以內">43.作廢原因 Reason</th>
					<td id="43"><input name="Reason" type="text" value="<?php echo $Reason ; ?>" size="50" /></td>
				</tr>
				<tr>
					<th class="td-left" id="44" title="空值:否&#10;‧預設長度固定16碼">44.折讓編號 AllowanceNo</th>
					<td colspan="3" id="44" ><input name="AllowanceNo" type="text" value="<?php echo $AllowanceNo ; ?>" size="50" /></td>
				</tr>
				<tr>
					<th class="td-left" id="46" title="空值:是&#10;‧若客戶手機號碼有值時，則&#10;->預設格式為數字組成&#10;->預設最小長度為1碼，最大長度為20碼&#10;‧補充說明(下述情況通知手機號碼不可為空值)&#10;->通知電子信箱為空值&#10;->通知類別為S-簡訊">46.發送簡訊號碼 Phone</th>
					<td><input name="Phone" type="text" value="<?php echo $Phone ; ?>" size="50" /></td>
					<th class="td-left" id="47" title="空值:否&#10;‧固定給定下述預設值&#10;->若為簡訊時，則VAL = 'S'&#10;->若為電子郵件時，則VAL = 'E'&#10;->若為皆通知時，則VAL = 'A'">47.發送方式 Notify</th>
					<td id="100">
						<select name="Notify">
							<option value="" <?php if($Notify == ''){echo 'selected' ; } ?>>請選擇</option>
							<option value="S" <?php if($Notify == 'S'){echo 'selected' ; } ?>>S.簡訊</option>
							<option value="E" <?php if($Notify == 'E'){echo 'selected' ; } ?>>E.為電子郵件</option>
							<option value="A" <?php if($Notify == 'A'){echo 'selected' ; } ?>>A.皆通知</option>
						</select>
					</td>
				</tr>
				
				<tr>
					<th class="td-left" id="48" title="空值:否&#10;‧固定給定下述預設值&#10;->若為發票開立時，則VAL = 'I'&#10;->若為發票作廢時，則VAL = 'II'&#10;->若為折讓開立時，則VAL = 'A'&#10;->若為折讓作廢時，則VAL = 'AI'&#10;->若為發票中獎時，則VAL = 'AW'">48.發送內容類型 InvoiceTag</th>
					<td>
						<select name="InvoiceTag">
							<option value="" <?php if($InvoiceTag == ''){echo 'selected' ; } ?>>請選擇</option>
							<option value="I" <?php if($InvoiceTag == 'I'){echo 'selected' ; } ?>>I.發票開立時</option>
							<option value="II" <?php if($InvoiceTag == 'II'){echo 'selected' ; } ?>>II.發票作廢時</option>
							<option value="A" <?php if($InvoiceTag == 'A'){echo 'selected' ; } ?>>A.折讓開立時</option>
							<option value="AI" <?php if($InvoiceTag == 'AI'){echo 'selected' ; } ?>>AI.折讓作廢時</option>
							<option value="AW" <?php if($InvoiceTag == 'AW'){echo 'selected' ; } ?>>AW.發票中獎時</option>
						</select>
					</td>
					<th class="td-left" id="49" title="空值:否&#10;‧固定給定下述預設值&#10;->若為發送通知給客戶時，則VAL = C&#10;->若為發送通知給廠商時，則VAL = 'M'&#10;->若為皆發送通知時，則VAL = 'A'">49.發送對象 Notified</th>
					<td>
						<select name="Notified">
							<option value="" <?php if($Notified == ''){echo 'selected' ; } ?>>請選擇</option>
							<option value="C" <?php if($Notified == 'C'){echo 'selected' ; } ?>>C.通知給客戶</option>
							<option value="M" <?php if($Notified == 'A'){echo 'selected' ; } ?>>M.通知給廠商</option>
							<option value="A" <?php if($Notified == 'M'){echo 'selected' ; } ?>>A.皆發送</option>
						</select>
					</td>
				</tr>
				
			</table>
			<br>
			*僅提供單筆商品測試<br>
			<center><input name="submit1" type="submit"  value="送出" /></center>
		</form>
	</div>
</body>
</html>


<style type="text/css"> 
    	#errormsg { color:#F00; border:1px solid #FFB468; font-size:14px; padding:6px 10px 6px 27px; margin:8px 0px;  no-repeat 5px 4px #FFFFE6; }
	#contain-primary { clear:both; margin:10px 10px 40px 10px; position:relative; border:1px #E1E1E1 solid; padding:10px; background:#FFF; width="100%"}
	.contain-title { background:#FFF; color:#D26900; font-size:18px; font-weight:bold; border:1px none #595959; border-bottom-style:dashed; padding-bottom:10px; margin-bottom:10px; }
	
	/* 表單 */
	#table-form { width:100%; }
	#table-form table { border:none; width:100%; }
	#table-form th { font-size:14px; color:#FFF; border:1px none #CCC; border-bottom-style:dashed; font-weight:normal; background:#009393; padding:7px; text-align:center; }
	#table-form td { font-size:14px; color:#000; border:1px none #CCC; border-bottom-style:dashed; padding:3px; }
	#table-form .td-left { text-align:left; }
	#table-form .td-right { text-align:right; }
	#table-form .td-mark { background:#FFECF7; }
	
</style> 


<script type="text/javascript">
<!--
function ajax_query1()
{	
	var select_invoice = document.form1.Invoice_Method.value ;

	if(select_invoice == 'INVOICE')
	{
		document.getElementById( "4" ).className = "td-left";
		document.getElementById( "5" ).className = "td-left";
		document.getElementById( "6" ).className = "td-left";
		document.getElementById( "7" ).className = "td-left";
		document.getElementById( "8" ).className = "td-left";
		document.getElementById( "9" ).className = "td-left";
		document.getElementById( "10" ).className = "td-left";
		document.getElementById( "11" ).className = "td-left";
		document.getElementById( "12" ).className = "td-left";
		document.getElementById( "13" ).className = "td-left";
		document.getElementById( "14" ).className = "td-left";
		document.getElementById( "15" ).className = "td-left";
		document.getElementById( "16" ).className = "td-left";
		document.getElementById( "17" ).className = "td-left";
		document.getElementById( "18" ).className = "td-left";
		document.getElementById( "19" ).className = "td-left";
		document.getElementById( "20" ).className = "td-left";
		document.getElementById( "21" ).className = "td-left";
		document.getElementById( "22" ).className = "td-left";
		document.getElementById( "23" ).className = "td-left";
		document.getElementById( "24" ).className = "td-left";
		document.getElementById( "25" ).className = "td-left";
		document.getElementById( "27" ).className = "td-left";
		document.getElementById( "28" ).className = "td-left";
		document.getElementById( "29" ).className = "td-left";
		document.getElementById( "30" ).className = "td-mark";
		document.getElementById( "31" ).className = "td-mark";
		document.getElementById( "32" ).className = "td-mark";
		document.getElementById( "33" ).className = "td-mark";
		document.getElementById( "34" ).className = "td-mark";
		document.getElementById( "35" ).className = "td-mark";
		document.getElementById( "36" ).className = "td-mark";
		document.getElementById( "37" ).className = "td-mark";
		document.getElementById( "38" ).className = "td-mark";
		document.getElementById( "39" ).className = "td-mark";
		document.getElementById( "40" ).className = "td-mark";
		document.getElementById( "41" ).className = "td-mark";
		document.getElementById( "42" ).className = "td-mark";
		document.getElementById( "43" ).className = "td-mark";
		document.getElementById( "44" ).className = "td-mark";
		document.getElementById( "46" ).className = "td-mark";
		document.getElementById( "47" ).className = "td-mark";
		document.getElementById( "48" ).className = "td-mark";
		document.getElementById( "49" ).className = "td-mark";
		document.getElementById( "143" ).className = "td-left";
		
		
		
		document.getElementById("invoice_url").innerHTML = "http://einvoice-stage.allpay.com.tw/Invoice/Issue";
	}
	
	if(select_invoice == 'INVOICE_DELAY')
	{
		document.getElementById( "4" ).className = "td-left";
		document.getElementById( "5" ).className = "td-left";
		document.getElementById( "6" ).className = "td-left";
		document.getElementById( "7" ).className = "td-left";
		document.getElementById( "8" ).className = "td-left";
		document.getElementById( "9" ).className = "td-left";
		document.getElementById( "10" ).className = "td-left";
		document.getElementById( "11" ).className = "td-left";
		document.getElementById( "12" ).className = "td-left";
		document.getElementById( "13" ).className = "td-left";
		document.getElementById( "14" ).className = "td-left";
		document.getElementById( "15" ).className = "td-left";
		document.getElementById( "16" ).className = "td-left";
		document.getElementById( "17" ).className = "td-left";
		document.getElementById( "18" ).className = "td-left";
		document.getElementById( "19" ).className = "td-left";
		document.getElementById( "20" ).className = "td-left";
		document.getElementById( "21" ).className = "td-left";
		document.getElementById( "22" ).className = "td-left";
		document.getElementById( "23" ).className = "td-left";
		document.getElementById( "24" ).className = "td-left";
		document.getElementById( "25" ).className = "td-left";
		document.getElementById( "27" ).className = "td-left";
		document.getElementById( "28" ).className = "td-mark";
		document.getElementById( "29" ).className = "td-mark";
		document.getElementById( "30" ).className = "td-left";
		document.getElementById( "31" ).className = "td-left";
		document.getElementById( "32" ).className = "td-left";
		document.getElementById( "33" ).className = "td-left";
		document.getElementById( "34" ).className = "td-left";
		document.getElementById( "35" ).className = "td-left";
		document.getElementById( "36" ).className = "td-left";
		document.getElementById( "37" ).className = "td-mark";
		document.getElementById( "38" ).className = "td-mark";
		document.getElementById( "39" ).className = "td-mark";
		document.getElementById( "40" ).className = "td-mark";
		document.getElementById( "41" ).className = "td-mark";
		document.getElementById( "42" ).className = "td-mark";
		document.getElementById( "43" ).className = "td-mark";
		document.getElementById( "44" ).className = "td-mark";
		document.getElementById( "46" ).className = "td-mark";
		document.getElementById( "47" ).className = "td-mark";
		document.getElementById( "48" ).className = "td-mark";
		document.getElementById( "49" ).className = "td-mark";
		document.getElementById( "143" ).className = "td-mark";
		document.getElementById("invoice_url").innerHTML = "http://einvoice-stage.allpay.com.tw/Invoice/DelayIssue";
	}
	
	if(select_invoice == 'ALLOWANCE')
	{
		document.getElementById( "4" ).className = "td-mark";
		document.getElementById( "5" ).className = "td-mark";
		document.getElementById( "6" ).className = "td-mark";
		document.getElementById( "7" ).className = "td-left";
		document.getElementById( "8" ).className = "td-mark";
		document.getElementById( "9" ).className = "td-mark";
		document.getElementById( "10" ).className = "td-mark";
		document.getElementById( "11" ).className = "td-mark";
		document.getElementById( "12" ).className = "td-mark";
		document.getElementById( "13" ).className = "td-mark";
		document.getElementById( "14" ).className = "td-mark";
		document.getElementById( "15" ).className = "td-mark";
		document.getElementById( "16" ).className = "td-mark";
		document.getElementById( "17" ).className = "td-mark";
		document.getElementById( "18" ).className = "td-mark";
		document.getElementById( "19" ).className = "td-mark";
		document.getElementById( "20" ).className = "td-left";
		document.getElementById( "21" ).className = "td-left";
		document.getElementById( "22" ).className = "td-left";
		document.getElementById( "23" ).className = "td-left";
		document.getElementById( "24" ).className = "td-left";
		document.getElementById( "25" ).className = "td-left";
		document.getElementById( "27" ).className = "td-left";
		document.getElementById( "28" ).className = "td-mark";
		document.getElementById( "29" ).className = "td-mark";
		document.getElementById( "30" ).className = "td-mark";
		document.getElementById( "31" ).className = "td-mark";
		document.getElementById( "32" ).className = "td-mark";
		document.getElementById( "33" ).className = "td-mark";
		document.getElementById( "34" ).className = "td-mark";
		document.getElementById( "35" ).className = "td-mark";
		document.getElementById( "36" ).className = "td-mark";
		document.getElementById( "37" ).className = "td-left";
		document.getElementById( "38" ).className = "td-left";
		document.getElementById( "39" ).className = "td-left";
		document.getElementById( "40" ).className = "td-left";
		document.getElementById( "41" ).className = "td-left";
		document.getElementById( "42" ).className = "td-mark";
		document.getElementById( "43" ).className = "td-mark";
		document.getElementById( "44" ).className = "td-mark";
		document.getElementById( "46" ).className = "td-mark";
		document.getElementById( "47" ).className = "td-mark";
		document.getElementById( "48" ).className = "td-mark";
		document.getElementById( "49" ).className = "td-mark";
		document.getElementById( "143" ).className = "td-mark";
		document.getElementById("invoice_url").innerHTML = "http://einvoice-stage.allpay.com.tw/Invoice/Allowance";
	}
	
	if(select_invoice == 'INVOICE_VOID')
	{
		document.getElementById( "4" ).className = "td-mark";
		document.getElementById( "5" ).className = "td-mark";
		document.getElementById( "6" ).className = "td-mark";
		document.getElementById( "7" ).className = "td-mark";
		document.getElementById( "8" ).className = "td-mark";
		document.getElementById( "9" ).className = "td-mark";
		document.getElementById( "10" ).className = "td-mark";
		document.getElementById( "11" ).className = "td-mark";
		document.getElementById( "12" ).className = "td-mark";
		document.getElementById( "13" ).className = "td-mark";
		document.getElementById( "14" ).className = "td-mark";
		document.getElementById( "15" ).className = "td-mark";
		document.getElementById( "16" ).className = "td-mark";
		document.getElementById( "17" ).className = "td-mark";
		document.getElementById( "18" ).className = "td-mark";
		document.getElementById( "19" ).className = "td-mark";
		document.getElementById( "20" ).className = "td-mark";
		document.getElementById( "21" ).className = "td-mark";
		document.getElementById( "22" ).className = "td-mark";
		document.getElementById( "23" ).className = "td-mark";
		document.getElementById( "24" ).className = "td-mark";
		document.getElementById( "25" ).className = "td-mark";
		document.getElementById( "27" ).className = "td-mark";
		document.getElementById( "28" ).className = "td-mark";
		document.getElementById( "29" ).className = "td-mark";
		document.getElementById( "30" ).className = "td-mark";
		document.getElementById( "31" ).className = "td-mark";
		document.getElementById( "32" ).className = "td-mark";
		document.getElementById( "33" ).className = "td-mark";
		document.getElementById( "34" ).className = "td-mark";
		document.getElementById( "35" ).className = "td-mark";
		document.getElementById( "36" ).className = "td-mark";
		document.getElementById( "37" ).className = "td-mark";
		document.getElementById( "38" ).className = "td-mark";
		document.getElementById( "39" ).className = "td-mark";
		document.getElementById( "40" ).className = "td-mark";
		document.getElementById( "41" ).className = "td-mark";
		document.getElementById( "42" ).className = "td-left";
		document.getElementById( "43" ).className = "td-left";
		document.getElementById( "44" ).className = "td-mark";
		document.getElementById( "46" ).className = "td-mark";
		document.getElementById( "47" ).className = "td-mark";
		document.getElementById( "48" ).className = "td-mark";
		document.getElementById( "49" ).className = "td-mark";
		document.getElementById( "143" ).className = "td-mark";
		document.getElementById("invoice_url").innerHTML = "http://einvoice-stage.allpay.com.tw/Invoice/IssueInvalid";
	}
	
	if(select_invoice == 'ALLOWANCE_VOID')
	{
		document.getElementById( "4" ).className = "td-mark";
		document.getElementById( "5" ).className = "td-mark";
		document.getElementById( "6" ).className = "td-mark";
		document.getElementById( "7" ).className = "td-mark";
		document.getElementById( "8" ).className = "td-mark";
		document.getElementById( "9" ).className = "td-mark";
		document.getElementById( "10" ).className = "td-mark";
		document.getElementById( "11" ).className = "td-mark";
		document.getElementById( "12" ).className = "td-mark";
		document.getElementById( "13" ).className = "td-mark";
		document.getElementById( "14" ).className = "td-mark";
		document.getElementById( "15" ).className = "td-mark";
		document.getElementById( "16" ).className = "td-mark";
		document.getElementById( "17" ).className = "td-mark";
		document.getElementById( "18" ).className = "td-mark";
		document.getElementById( "19" ).className = "td-mark";
		document.getElementById( "20" ).className = "td-mark";
		document.getElementById( "21" ).className = "td-mark";
		document.getElementById( "22" ).className = "td-mark";
		document.getElementById( "23" ).className = "td-mark";
		document.getElementById( "24" ).className = "td-mark";
		document.getElementById( "25" ).className = "td-mark";
		document.getElementById( "27" ).className = "td-mark";
		document.getElementById( "28" ).className = "td-mark";
		document.getElementById( "29" ).className = "td-mark";
		document.getElementById( "30" ).className = "td-mark";
		document.getElementById( "31" ).className = "td-mark";
		document.getElementById( "32" ).className = "td-mark";
		document.getElementById( "33" ).className = "td-mark";
		document.getElementById( "34" ).className = "td-mark";
		document.getElementById( "35" ).className = "td-mark";
		document.getElementById( "36" ).className = "td-mark";
		document.getElementById( "37" ).className = "td-left";
		document.getElementById( "38" ).className = "td-mark";
		document.getElementById( "39" ).className = "td-mark";
		document.getElementById( "40" ).className = "td-mark";
		document.getElementById( "41" ).className = "td-mark";
		document.getElementById( "42" ).className = "td-mark";
		document.getElementById( "43" ).className = "td-left";
		document.getElementById( "44" ).className = "td-left";
		document.getElementById( "46" ).className = "td-mark";
		document.getElementById( "47" ).className = "td-mark";
		document.getElementById( "48" ).className = "td-mark";
		document.getElementById( "49" ).className = "td-mark";
		document.getElementById( "143" ).className = "td-mark";
		document.getElementById("invoice_url").innerHTML = "http://einvoice-stage.allpay.com.tw/Invoice/AllowanceInvalid";
	}
	
	if(select_invoice == 'INVOICE_SEARCH' || select_invoice == 'INVOICE_VOID_SEARCH')
	{
		document.getElementById( "4" ).className = "td-left";
		document.getElementById( "5" ).className = "td-mark";
		document.getElementById( "6" ).className = "td-mark";
		document.getElementById( "7" ).className = "td-mark";
		document.getElementById( "8" ).className = "td-mark";
		document.getElementById( "9" ).className = "td-mark";
		document.getElementById( "10" ).className = "td-mark";
		document.getElementById( "11" ).className = "td-mark";
		document.getElementById( "12" ).className = "td-mark";
		document.getElementById( "13" ).className = "td-mark";
		document.getElementById( "14" ).className = "td-mark";
		document.getElementById( "15" ).className = "td-mark";
		document.getElementById( "16" ).className = "td-mark";
		document.getElementById( "17" ).className = "td-mark";
		document.getElementById( "18" ).className = "td-mark";
		document.getElementById( "19" ).className = "td-mark";
		document.getElementById( "20" ).className = "td-mark";
		document.getElementById( "21" ).className = "td-mark";
		document.getElementById( "22" ).className = "td-mark";
		document.getElementById( "23" ).className = "td-mark";
		document.getElementById( "24" ).className = "td-mark";
		document.getElementById( "25" ).className = "td-mark";
		document.getElementById( "27" ).className = "td-mark";
		document.getElementById( "28" ).className = "td-mark";
		document.getElementById( "29" ).className = "td-mark";
		document.getElementById( "30" ).className = "td-mark";
		document.getElementById( "31" ).className = "td-mark";
		document.getElementById( "32" ).className = "td-mark";
		document.getElementById( "33" ).className = "td-mark";
		document.getElementById( "34" ).className = "td-mark";
		document.getElementById( "35" ).className = "td-mark";
		document.getElementById( "36" ).className = "td-mark";
		document.getElementById( "37" ).className = "td-mark";
		document.getElementById( "38" ).className = "td-mark";
		document.getElementById( "39" ).className = "td-mark";
		document.getElementById( "40" ).className = "td-mark";
		document.getElementById( "41" ).className = "td-mark";
		document.getElementById( "42" ).className = "td-mark";
		document.getElementById( "43" ).className = "td-mark";
		document.getElementById( "44" ).className = "td-mark";
		document.getElementById( "46" ).className = "td-mark";
		document.getElementById( "47" ).className = "td-mark";
		document.getElementById( "48" ).className = "td-mark";
		document.getElementById( "49" ).className = "td-mark";
		document.getElementById( "143" ).className = "td-mark";
		
		if(select_invoice == 'INVOICE_SEARCH' )
		{
			document.getElementById("invoice_url").innerHTML = "http://einvoice-stage.allpay.com.tw/Query/Issue";
		}
		else
		{
			document.getElementById("invoice_url").innerHTML = "http://einvoice-stage.allpay.com.tw/Query/IssueInvalid";
		}
	}
	
	if(select_invoice == 'ALLOWANCE_SEARCH' || select_invoice == 'ALLOWANCE_VOID_SEARCH')
	{
		document.getElementById( "4" ).className = "td-mark";
		document.getElementById( "5" ).className = "td-mark";
		document.getElementById( "6" ).className = "td-mark";
		document.getElementById( "7" ).className = "td-mark";
		document.getElementById( "8" ).className = "td-mark";
		document.getElementById( "9" ).className = "td-mark";
		document.getElementById( "10" ).className = "td-mark";
		document.getElementById( "11" ).className = "td-mark";
		document.getElementById( "12" ).className = "td-mark";
		document.getElementById( "13" ).className = "td-mark";
		document.getElementById( "14" ).className = "td-mark";
		document.getElementById( "15" ).className = "td-mark";
		document.getElementById( "16" ).className = "td-mark";
		document.getElementById( "17" ).className = "td-mark";
		document.getElementById( "18" ).className = "td-mark";
		document.getElementById( "19" ).className = "td-mark";
		document.getElementById( "20" ).className = "td-mark";
		document.getElementById( "21" ).className = "td-mark";
		document.getElementById( "22" ).className = "td-mark";
		document.getElementById( "23" ).className = "td-mark";
		document.getElementById( "24" ).className = "td-mark";
		document.getElementById( "25" ).className = "td-mark";
		document.getElementById( "27" ).className = "td-mark";
		document.getElementById( "28" ).className = "td-mark";
		document.getElementById( "29" ).className = "td-mark";
		document.getElementById( "30" ).className = "td-mark";
		document.getElementById( "31" ).className = "td-mark";
		document.getElementById( "32" ).className = "td-mark";
		document.getElementById( "33" ).className = "td-mark";
		document.getElementById( "34" ).className = "td-mark";
		document.getElementById( "35" ).className = "td-mark";
		document.getElementById( "36" ).className = "td-mark";
		document.getElementById( "37" ).className = "td-left";
		document.getElementById( "38" ).className = "td-mark";
		document.getElementById( "39" ).className = "td-mark";
		document.getElementById( "40" ).className = "td-mark";
		document.getElementById( "41" ).className = "td-mark";
		document.getElementById( "42" ).className = "td-mark";
		document.getElementById( "43" ).className = "td-mark";
		document.getElementById( "44" ).className = "td-left";
		document.getElementById( "46" ).className = "td-mark";
		document.getElementById( "47" ).className = "td-mark";
		document.getElementById( "48" ).className = "td-mark";
		document.getElementById( "49" ).className = "td-mark";
		document.getElementById( "143" ).className = "td-mark";
		
		if(select_invoice == 'ALLOWANCE_SEARCH' )
		{
			document.getElementById("invoice_url").innerHTML = "http://einvoice-stage.allpay.com.tw/Query/Allowance";
		}
		else
		{
			document.getElementById("invoice_url").innerHTML = "http://einvoice-stage.allpay.com.tw/Query/AllowanceInvalid";
		}
	}
	
	if(select_invoice == 'INVOICE_NOTIFY')
	{
		document.getElementById( "4" ).className = "td-mark";
		document.getElementById( "5" ).className = "td-mark";
		document.getElementById( "6" ).className = "td-mark";
		document.getElementById( "7" ).className = "td-mark";
		document.getElementById( "8" ).className = "td-mark";
		document.getElementById( "9" ).className = "td-mark";
		document.getElementById( "10" ).className = "td-mark";
		document.getElementById( "11" ).className = "td-mark";
		document.getElementById( "12" ).className = "td-mark";
		document.getElementById( "13" ).className = "td-mark";
		document.getElementById( "14" ).className = "td-mark";
		document.getElementById( "15" ).className = "td-mark";
		document.getElementById( "16" ).className = "td-mark";
		document.getElementById( "17" ).className = "td-mark";
		document.getElementById( "18" ).className = "td-mark";
		document.getElementById( "19" ).className = "td-mark";
		document.getElementById( "20" ).className = "td-mark";
		document.getElementById( "21" ).className = "td-mark";
		document.getElementById( "22" ).className = "td-mark";
		document.getElementById( "23" ).className = "td-mark";
		document.getElementById( "24" ).className = "td-mark";
		document.getElementById( "25" ).className = "td-mark";
		document.getElementById( "27" ).className = "td-mark";
		document.getElementById( "28" ).className = "td-mark";
		document.getElementById( "29" ).className = "td-mark";
		document.getElementById( "30" ).className = "td-mark";
		document.getElementById( "31" ).className = "td-mark";
		document.getElementById( "32" ).className = "td-mark";
		document.getElementById( "33" ).className = "td-mark";
		document.getElementById( "34" ).className = "td-mark";
		document.getElementById( "35" ).className = "td-mark";
		document.getElementById( "36" ).className = "td-mark";
		document.getElementById( "37" ).className = "td-left";
		document.getElementById( "38" ).className = "td-mark";
		document.getElementById( "39" ).className = "td-left";
		document.getElementById( "40" ).className = "td-mark";
		document.getElementById( "41" ).className = "td-mark";
		document.getElementById( "42" ).className = "td-mark";
		document.getElementById( "43" ).className = "td-mark";
		document.getElementById( "44" ).className = "td-left";
		document.getElementById( "46" ).className = "td-left";
		document.getElementById( "47" ).className = "td-left";
		document.getElementById( "48" ).className = "td-left";
		document.getElementById( "49" ).className = "td-left";
		document.getElementById( "143" ).className = "td-mark";
		
		document.getElementById("invoice_url").innerHTML = "http://einvoice-stage.allpay.com.tw/Notify/InvoiceNotify";
	}
	
	if(select_invoice == 'INVOICE_TRIGGER')
	{
		document.getElementById( "4" ).className = "td-mark";
		document.getElementById( "5" ).className = "td-mark";
		document.getElementById( "6" ).className = "td-mark";
		document.getElementById( "7" ).className = "td-mark";
		document.getElementById( "8" ).className = "td-mark";
		document.getElementById( "9" ).className = "td-mark";
		document.getElementById( "10" ).className = "td-mark";
		document.getElementById( "11" ).className = "td-mark";
		document.getElementById( "12" ).className = "td-mark";
		document.getElementById( "13" ).className = "td-mark";
		document.getElementById( "14" ).className = "td-mark";
		document.getElementById( "15" ).className = "td-mark";
		document.getElementById( "16" ).className = "td-mark";
		document.getElementById( "17" ).className = "td-mark";
		document.getElementById( "18" ).className = "td-mark";
		document.getElementById( "19" ).className = "td-mark";
		document.getElementById( "20" ).className = "td-mark";
		document.getElementById( "21" ).className = "td-mark";
		document.getElementById( "22" ).className = "td-mark";
		document.getElementById( "23" ).className = "td-mark";
		document.getElementById( "24" ).className = "td-mark";
		document.getElementById( "25" ).className = "td-mark";
		document.getElementById( "27" ).className = "td-mark";
		document.getElementById( "28" ).className = "td-mark";
		document.getElementById( "29" ).className = "td-mark";
		document.getElementById( "30" ).className = "td-mark";
		document.getElementById( "31" ).className = "td-mark";
		document.getElementById( "32" ).className = "td-mark";
		document.getElementById( "33" ).className = "td-left";
		document.getElementById( "34" ).className = "td-left";
		document.getElementById( "35" ).className = "td-mark";
		document.getElementById( "36" ).className = "td-mark";
		document.getElementById( "37" ).className = "td-mark";
		document.getElementById( "38" ).className = "td-mark";
		document.getElementById( "39" ).className = "td-mark";
		document.getElementById( "40" ).className = "td-mark";
		document.getElementById( "41" ).className = "td-mark";
		document.getElementById( "42" ).className = "td-mark";
		document.getElementById( "43" ).className = "td-mark";
		document.getElementById( "44" ).className = "td-mark";
		document.getElementById( "46" ).className = "td-mark";
		document.getElementById( "47" ).className = "td-mark";
		document.getElementById( "48" ).className = "td-mark";
		document.getElementById( "49" ).className = "td-mark";
		document.getElementById( "143" ).className = "td-mark";
		
		document.getElementById("invoice_url").innerHTML = "http://einvoice-stage.allpay.com.tw/Invoice/TriggerIssue";
	}
	
}


var select_invoice = document.form1.Invoice_Method.value ;

if(select_invoice == 'INVOICE')
	{
		document.getElementById( "2" ).className = "td-left";
		document.getElementById( "4" ).className = "td-left";
		document.getElementById( "5" ).className = "td-left";
		document.getElementById( "6" ).className = "td-left";
		document.getElementById( "7" ).className = "td-left";
		document.getElementById( "8" ).className = "td-left";
		document.getElementById( "9" ).className = "td-left";
		document.getElementById( "10" ).className = "td-left";
		document.getElementById( "11" ).className = "td-left";
		document.getElementById( "12" ).className = "td-left";
		document.getElementById( "13" ).className = "td-left";
		document.getElementById( "14" ).className = "td-left";
		document.getElementById( "15" ).className = "td-left";
		document.getElementById( "16" ).className = "td-left";
		document.getElementById( "17" ).className = "td-left";
		document.getElementById( "18" ).className = "td-left";
		document.getElementById( "19" ).className = "td-left";
		document.getElementById( "20" ).className = "td-left";
		document.getElementById( "21" ).className = "td-left";
		document.getElementById( "22" ).className = "td-left";
		document.getElementById( "23" ).className = "td-left";
		document.getElementById( "24" ).className = "td-left";
		document.getElementById( "25" ).className = "td-left";
		document.getElementById( "27" ).className = "td-left";
		document.getElementById( "28" ).className = "td-left";
		document.getElementById( "29" ).className = "td-left";
		document.getElementById( "30" ).className = "td-mark";
		document.getElementById( "31" ).className = "td-mark";
		document.getElementById( "32" ).className = "td-mark";
		document.getElementById( "33" ).className = "td-mark";
		document.getElementById( "34" ).className = "td-mark";
		document.getElementById( "35" ).className = "td-mark";
		document.getElementById( "36" ).className = "td-mark";
		document.getElementById( "37" ).className = "td-mark";
		document.getElementById( "38" ).className = "td-mark";
		document.getElementById( "39" ).className = "td-mark";
		document.getElementById( "40" ).className = "td-mark";
		document.getElementById( "41" ).className = "td-mark";
		document.getElementById( "42" ).className = "td-mark";
		document.getElementById( "43" ).className = "td-mark";
		document.getElementById( "44" ).className = "td-mark";
		document.getElementById( "46" ).className = "td-mark";
		document.getElementById( "47" ).className = "td-mark";
		document.getElementById( "48" ).className = "td-mark";
		document.getElementById( "49" ).className = "td-mark";
		document.getElementById( "143" ).className = "td-mark";
	}
	
	if(select_invoice == 'INVOICE_DELAY')
	{
		document.getElementById( "4" ).className = "td-left";
		document.getElementById( "5" ).className = "td-left";
		document.getElementById( "6" ).className = "td-left";
		document.getElementById( "7" ).className = "td-left";
		document.getElementById( "8" ).className = "td-left";
		document.getElementById( "9" ).className = "td-left";
		document.getElementById( "10" ).className = "td-left";
		document.getElementById( "11" ).className = "td-left";
		document.getElementById( "12" ).className = "td-left";
		document.getElementById( "13" ).className = "td-left";
		document.getElementById( "14" ).className = "td-left";
		document.getElementById( "15" ).className = "td-left";
		document.getElementById( "16" ).className = "td-left";
		document.getElementById( "17" ).className = "td-left";
		document.getElementById( "18" ).className = "td-left";
		document.getElementById( "19" ).className = "td-left";
		document.getElementById( "20" ).className = "td-left";
		document.getElementById( "21" ).className = "td-left";
		document.getElementById( "22" ).className = "td-left";
		document.getElementById( "23" ).className = "td-left";
		document.getElementById( "24" ).className = "td-left";
		document.getElementById( "25" ).className = "td-left";
		document.getElementById( "27" ).className = "td-left";
		document.getElementById( "28" ).className = "td-mark";
		document.getElementById( "29" ).className = "td-mark";
		document.getElementById( "30" ).className = "td-left";
		document.getElementById( "31" ).className = "td-left";
		document.getElementById( "32" ).className = "td-left";
		document.getElementById( "33" ).className = "td-left";
		document.getElementById( "34" ).className = "td-left";
		document.getElementById( "35" ).className = "td-left";
		document.getElementById( "36" ).className = "td-left";
		document.getElementById( "37" ).className = "td-mark";
		document.getElementById( "38" ).className = "td-mark";
		document.getElementById( "39" ).className = "td-mark";
		document.getElementById( "40" ).className = "td-mark";
		document.getElementById( "41" ).className = "td-mark";
		document.getElementById( "42" ).className = "td-mark";
		document.getElementById( "43" ).className = "td-mark";
		document.getElementById( "44" ).className = "td-mark";
		document.getElementById( "46" ).className = "td-mark";
		document.getElementById( "47" ).className = "td-mark";
		document.getElementById( "48" ).className = "td-mark";
		document.getElementById( "49" ).className = "td-mark";
		document.getElementById( "143" ).className = "td-mark";
	}
	
	if(select_invoice == 'ALLOWANCE')
	{
		document.getElementById( "4" ).className = "td-mark";
		document.getElementById( "5" ).className = "td-mark";
		document.getElementById( "6" ).className = "td-mark";
		document.getElementById( "7" ).className = "td-left";
		document.getElementById( "8" ).className = "td-mark";
		document.getElementById( "9" ).className = "td-mark";
		document.getElementById( "10" ).className = "td-mark";
		document.getElementById( "11" ).className = "td-mark";
		document.getElementById( "12" ).className = "td-mark";
		document.getElementById( "13" ).className = "td-mark";
		document.getElementById( "14" ).className = "td-mark";
		document.getElementById( "15" ).className = "td-mark";
		document.getElementById( "16" ).className = "td-mark";
		document.getElementById( "17" ).className = "td-mark";
		document.getElementById( "18" ).className = "td-mark";
		document.getElementById( "19" ).className = "td-mark";
		document.getElementById( "20" ).className = "td-left";
		document.getElementById( "21" ).className = "td-left";
		document.getElementById( "22" ).className = "td-left";
		document.getElementById( "23" ).className = "td-left";
		document.getElementById( "24" ).className = "td-left";
		document.getElementById( "25" ).className = "td-left";
		document.getElementById( "27" ).className = "td-left";
		document.getElementById( "28" ).className = "td-mark";
		document.getElementById( "29" ).className = "td-mark";
		document.getElementById( "30" ).className = "td-mark";
		document.getElementById( "31" ).className = "td-mark";
		document.getElementById( "32" ).className = "td-mark";
		document.getElementById( "33" ).className = "td-mark";
		document.getElementById( "34" ).className = "td-mark";
		document.getElementById( "35" ).className = "td-mark";
		document.getElementById( "36" ).className = "td-mark";
		document.getElementById( "37" ).className = "td-left";
		document.getElementById( "38" ).className = "td-left";
		document.getElementById( "39" ).className = "td-left";
		document.getElementById( "40" ).className = "td-left";
		document.getElementById( "41" ).className = "td-left";
		document.getElementById( "42" ).className = "td-mark";
		document.getElementById( "43" ).className = "td-mark";
		document.getElementById( "44" ).className = "td-mark";
		document.getElementById( "46" ).className = "td-mark";
		document.getElementById( "47" ).className = "td-mark";
		document.getElementById( "48" ).className = "td-mark";
		document.getElementById( "49" ).className = "td-mark";
		document.getElementById( "143" ).className = "td-mark";
	}
	
	if(select_invoice == 'INVOICE_VOID')
	{
		document.getElementById( "4" ).className = "td-mark";
		document.getElementById( "5" ).className = "td-mark";
		document.getElementById( "6" ).className = "td-mark";
		document.getElementById( "7" ).className = "td-mark";
		document.getElementById( "8" ).className = "td-mark";
		document.getElementById( "9" ).className = "td-mark";
		document.getElementById( "10" ).className = "td-mark";
		document.getElementById( "11" ).className = "td-mark";
		document.getElementById( "12" ).className = "td-mark";
		document.getElementById( "13" ).className = "td-mark";
		document.getElementById( "14" ).className = "td-mark";
		document.getElementById( "15" ).className = "td-mark";
		document.getElementById( "16" ).className = "td-mark";
		document.getElementById( "17" ).className = "td-mark";
		document.getElementById( "18" ).className = "td-mark";
		document.getElementById( "19" ).className = "td-mark";
		document.getElementById( "20" ).className = "td-mark";
		document.getElementById( "21" ).className = "td-mark";
		document.getElementById( "22" ).className = "td-mark";
		document.getElementById( "23" ).className = "td-mark";
		document.getElementById( "24" ).className = "td-mark";
		document.getElementById( "25" ).className = "td-mark";
		document.getElementById( "27" ).className = "td-mark";
		document.getElementById( "28" ).className = "td-mark";
		document.getElementById( "29" ).className = "td-mark";
		document.getElementById( "30" ).className = "td-mark";
		document.getElementById( "31" ).className = "td-mark";
		document.getElementById( "32" ).className = "td-mark";
		document.getElementById( "33" ).className = "td-mark";
		document.getElementById( "34" ).className = "td-mark";
		document.getElementById( "35" ).className = "td-mark";
		document.getElementById( "36" ).className = "td-mark";
		document.getElementById( "37" ).className = "td-mark";
		document.getElementById( "38" ).className = "td-mark";
		document.getElementById( "39" ).className = "td-mark";
		document.getElementById( "40" ).className = "td-mark";
		document.getElementById( "41" ).className = "td-mark";
		document.getElementById( "42" ).className = "td-left";
		document.getElementById( "43" ).className = "td-left";
		document.getElementById( "44" ).className = "td-mark";
		document.getElementById( "46" ).className = "td-mark";
		document.getElementById( "47" ).className = "td-mark";
		document.getElementById( "48" ).className = "td-mark";
		document.getElementById( "49" ).className = "td-mark";
		document.getElementById( "143" ).className = "td-mark";
	}
	
	if(select_invoice == 'ALLOWANCE_VOID')
	{
		document.getElementById( "4" ).className = "td-mark";
		document.getElementById( "5" ).className = "td-mark";
		document.getElementById( "6" ).className = "td-mark";
		document.getElementById( "7" ).className = "td-mark";
		document.getElementById( "8" ).className = "td-mark";
		document.getElementById( "9" ).className = "td-mark";
		document.getElementById( "10" ).className = "td-mark";
		document.getElementById( "11" ).className = "td-mark";
		document.getElementById( "12" ).className = "td-mark";
		document.getElementById( "13" ).className = "td-mark";
		document.getElementById( "14" ).className = "td-mark";
		document.getElementById( "15" ).className = "td-mark";
		document.getElementById( "16" ).className = "td-mark";
		document.getElementById( "17" ).className = "td-mark";
		document.getElementById( "18" ).className = "td-mark";
		document.getElementById( "19" ).className = "td-mark";
		document.getElementById( "20" ).className = "td-mark";
		document.getElementById( "21" ).className = "td-mark";
		document.getElementById( "22" ).className = "td-mark";
		document.getElementById( "23" ).className = "td-mark";
		document.getElementById( "24" ).className = "td-mark";
		document.getElementById( "25" ).className = "td-mark";
		document.getElementById( "27" ).className = "td-mark";
		document.getElementById( "28" ).className = "td-mark";
		document.getElementById( "29" ).className = "td-mark";
		document.getElementById( "30" ).className = "td-mark";
		document.getElementById( "31" ).className = "td-mark";
		document.getElementById( "32" ).className = "td-mark";
		document.getElementById( "33" ).className = "td-mark";
		document.getElementById( "34" ).className = "td-mark";
		document.getElementById( "35" ).className = "td-mark";
		document.getElementById( "36" ).className = "td-mark";
		document.getElementById( "37" ).className = "td-left";
		document.getElementById( "38" ).className = "td-mark";
		document.getElementById( "39" ).className = "td-mark";
		document.getElementById( "40" ).className = "td-mark";
		document.getElementById( "41" ).className = "td-mark";
		document.getElementById( "42" ).className = "td-mark";
		document.getElementById( "43" ).className = "td-left";
		document.getElementById( "44" ).className = "td-left";
		document.getElementById( "46" ).className = "td-mark";
		document.getElementById( "47" ).className = "td-mark";
		document.getElementById( "48" ).className = "td-mark";
		document.getElementById( "49" ).className = "td-mark";
		document.getElementById( "143" ).className = "td-mark";
	}
	
	if(select_invoice == 'INVOICE_SEARCH' || select_invoice == 'INVOICE_VOID_SEARCH')
	{
		document.getElementById( "4" ).className = "td-left";
		document.getElementById( "5" ).className = "td-mark";
		document.getElementById( "6" ).className = "td-mark";
		document.getElementById( "7" ).className = "td-mark";
		document.getElementById( "8" ).className = "td-mark";
		document.getElementById( "9" ).className = "td-mark";
		document.getElementById( "10" ).className = "td-mark";
		document.getElementById( "11" ).className = "td-mark";
		document.getElementById( "12" ).className = "td-mark";
		document.getElementById( "13" ).className = "td-mark";
		document.getElementById( "14" ).className = "td-mark";
		document.getElementById( "15" ).className = "td-mark";
		document.getElementById( "16" ).className = "td-mark";
		document.getElementById( "17" ).className = "td-mark";
		document.getElementById( "18" ).className = "td-mark";
		document.getElementById( "19" ).className = "td-mark";
		document.getElementById( "20" ).className = "td-mark";
		document.getElementById( "21" ).className = "td-mark";
		document.getElementById( "22" ).className = "td-mark";
		document.getElementById( "23" ).className = "td-mark";
		document.getElementById( "24" ).className = "td-mark";
		document.getElementById( "25" ).className = "td-mark";
		document.getElementById( "27" ).className = "td-mark";
		document.getElementById( "28" ).className = "td-mark";
		document.getElementById( "29" ).className = "td-mark";
		document.getElementById( "30" ).className = "td-mark";
		document.getElementById( "31" ).className = "td-mark";
		document.getElementById( "32" ).className = "td-mark";
		document.getElementById( "33" ).className = "td-mark";
		document.getElementById( "34" ).className = "td-mark";
		document.getElementById( "35" ).className = "td-mark";
		document.getElementById( "36" ).className = "td-mark";
		document.getElementById( "37" ).className = "td-mark";
		document.getElementById( "38" ).className = "td-mark";
		document.getElementById( "39" ).className = "td-mark";
		document.getElementById( "40" ).className = "td-mark";
		document.getElementById( "41" ).className = "td-mark";
		document.getElementById( "42" ).className = "td-mark";
		document.getElementById( "43" ).className = "td-mark";
		document.getElementById( "44" ).className = "td-mark";
		document.getElementById( "46" ).className = "td-mark";
		document.getElementById( "47" ).className = "td-mark";
		document.getElementById( "48" ).className = "td-mark";
		document.getElementById( "49" ).className = "td-mark";
		document.getElementById( "143" ).className = "td-mark";
	}
	
	if(select_invoice == 'ALLOWANCE_SEARCH' || select_invoice == 'ALLOWANCE_VOID_SEARCH')
	{
		document.getElementById( "4" ).className = "td-mark";
		document.getElementById( "5" ).className = "td-mark";
		document.getElementById( "6" ).className = "td-mark";
		document.getElementById( "7" ).className = "td-mark";
		document.getElementById( "8" ).className = "td-mark";
		document.getElementById( "9" ).className = "td-mark";
		document.getElementById( "10" ).className = "td-mark";
		document.getElementById( "11" ).className = "td-mark";
		document.getElementById( "12" ).className = "td-mark";
		document.getElementById( "13" ).className = "td-mark";
		document.getElementById( "14" ).className = "td-mark";
		document.getElementById( "15" ).className = "td-mark";
		document.getElementById( "16" ).className = "td-mark";
		document.getElementById( "17" ).className = "td-mark";
		document.getElementById( "18" ).className = "td-mark";
		document.getElementById( "19" ).className = "td-mark";
		document.getElementById( "20" ).className = "td-mark";
		document.getElementById( "21" ).className = "td-mark";
		document.getElementById( "22" ).className = "td-mark";
		document.getElementById( "23" ).className = "td-mark";
		document.getElementById( "24" ).className = "td-mark";
		document.getElementById( "25" ).className = "td-mark";
		document.getElementById( "27" ).className = "td-mark";
		document.getElementById( "28" ).className = "td-mark";
		document.getElementById( "29" ).className = "td-mark";
		document.getElementById( "30" ).className = "td-mark";
		document.getElementById( "31" ).className = "td-mark";
		document.getElementById( "32" ).className = "td-mark";
		document.getElementById( "33" ).className = "td-mark";
		document.getElementById( "34" ).className = "td-mark";
		document.getElementById( "35" ).className = "td-mark";
		document.getElementById( "36" ).className = "td-mark";
		document.getElementById( "37" ).className = "td-left";
		document.getElementById( "38" ).className = "td-mark";
		document.getElementById( "39" ).className = "td-mark";
		document.getElementById( "40" ).className = "td-mark";
		document.getElementById( "41" ).className = "td-mark";
		document.getElementById( "42" ).className = "td-mark";
		document.getElementById( "43" ).className = "td-mark";
		document.getElementById( "44" ).className = "td-left";
		document.getElementById( "46" ).className = "td-mark";
		document.getElementById( "47" ).className = "td-mark";
		document.getElementById( "48" ).className = "td-mark";
		document.getElementById( "49" ).className = "td-mark";
		document.getElementById( "143" ).className = "td-mark";
	}
	
	if(select_invoice == 'INVOICE_NOTIFY')
	{
		document.getElementById( "4" ).className = "td-mark";
		document.getElementById( "5" ).className = "td-mark";
		document.getElementById( "6" ).className = "td-mark";
		document.getElementById( "7" ).className = "td-mark";
		document.getElementById( "8" ).className = "td-mark";
		document.getElementById( "9" ).className = "td-mark";
		document.getElementById( "10" ).className = "td-mark";
		document.getElementById( "11" ).className = "td-mark";
		document.getElementById( "12" ).className = "td-mark";
		document.getElementById( "13" ).className = "td-mark";
		document.getElementById( "14" ).className = "td-mark";
		document.getElementById( "15" ).className = "td-mark";
		document.getElementById( "16" ).className = "td-mark";
		document.getElementById( "17" ).className = "td-mark";
		document.getElementById( "18" ).className = "td-mark";
		document.getElementById( "19" ).className = "td-mark";
		document.getElementById( "20" ).className = "td-mark";
		document.getElementById( "21" ).className = "td-mark";
		document.getElementById( "22" ).className = "td-mark";
		document.getElementById( "23" ).className = "td-mark";
		document.getElementById( "24" ).className = "td-mark";
		document.getElementById( "25" ).className = "td-mark";
		document.getElementById( "27" ).className = "td-mark";
		document.getElementById( "28" ).className = "td-mark";
		document.getElementById( "29" ).className = "td-mark";
		document.getElementById( "30" ).className = "td-mark";
		document.getElementById( "31" ).className = "td-mark";
		document.getElementById( "32" ).className = "td-mark";
		document.getElementById( "33" ).className = "td-mark";
		document.getElementById( "34" ).className = "td-mark";
		document.getElementById( "35" ).className = "td-mark";
		document.getElementById( "36" ).className = "td-mark";
		document.getElementById( "37" ).className = "td-left";
		document.getElementById( "38" ).className = "td-mark";
		document.getElementById( "39" ).className = "td-left";
		document.getElementById( "40" ).className = "td-mark";
		document.getElementById( "41" ).className = "td-mark";
		document.getElementById( "42" ).className = "td-mark";
		document.getElementById( "43" ).className = "td-mark";
		document.getElementById( "44" ).className = "td-left";
		document.getElementById( "46" ).className = "td-left";
		document.getElementById( "47" ).className = "td-left";
		document.getElementById( "48" ).className = "td-left";
		document.getElementById( "49" ).className = "td-left";
		document.getElementById( "143" ).className = "td-mark";
	}
	
	if(select_invoice == 'INVOICE_TRIGGER')
	{
		document.getElementById( "4" ).className = "td-mark";
		document.getElementById( "5" ).className = "td-mark";
		document.getElementById( "6" ).className = "td-mark";
		document.getElementById( "7" ).className = "td-mark";
		document.getElementById( "8" ).className = "td-mark";
		document.getElementById( "9" ).className = "td-mark";
		document.getElementById( "10" ).className = "td-mark";
		document.getElementById( "11" ).className = "td-mark";
		document.getElementById( "12" ).className = "td-mark";
		document.getElementById( "13" ).className = "td-mark";
		document.getElementById( "14" ).className = "td-mark";
		document.getElementById( "15" ).className = "td-mark";
		document.getElementById( "16" ).className = "td-mark";
		document.getElementById( "17" ).className = "td-mark";
		document.getElementById( "18" ).className = "td-mark";
		document.getElementById( "19" ).className = "td-mark";
		document.getElementById( "20" ).className = "td-mark";
		document.getElementById( "21" ).className = "td-mark";
		document.getElementById( "22" ).className = "td-mark";
		document.getElementById( "23" ).className = "td-mark";
		document.getElementById( "24" ).className = "td-mark";
		document.getElementById( "25" ).className = "td-mark";
		document.getElementById( "27" ).className = "td-mark";
		document.getElementById( "28" ).className = "td-mark";
		document.getElementById( "29" ).className = "td-mark";
		document.getElementById( "30" ).className = "td-mark";
		document.getElementById( "31" ).className = "td-mark";
		document.getElementById( "32" ).className = "td-mark";
		document.getElementById( "33" ).className = "td-left";
		document.getElementById( "34" ).className = "td-left";
		document.getElementById( "35" ).className = "td-mark";
		document.getElementById( "36" ).className = "td-mark";
		document.getElementById( "37" ).className = "td-mark";
		document.getElementById( "38" ).className = "td-mark";
		document.getElementById( "39" ).className = "td-mark";
		document.getElementById( "40" ).className = "td-mark";
		document.getElementById( "41" ).className = "td-mark";
		document.getElementById( "42" ).className = "td-mark";
		document.getElementById( "43" ).className = "td-mark";
		document.getElementById( "44" ).className = "td-mark";
		document.getElementById( "46" ).className = "td-mark";
		document.getElementById( "47" ).className = "td-mark";
		document.getElementById( "48" ).className = "td-mark";
		document.getElementById( "49" ).className = "td-mark";
		document.getElementById( "143" ).className = "td-mark";
	}

-->
</script>

