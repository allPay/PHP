<?php
try
	{
		$sMsg = '' ;
// 1.載入SDK程式
		include_once('AllPay_Invoice.php') ;
		$allpay_invoice = new AllInvoice ;
// 2.寫入基本介接參數
		$allpay_invoice->Invoice_Method 	= 'INVOICE_TRIGGER';
		$allpay_invoice->Invoice_Url 		= 'http://einvoice-stage.allpay.com.tw/Invoice/TriggerIssue' ;
		$allpay_invoice->MerchantID 		= '2000132' ;
		$allpay_invoice->HashKey 		= 'ejCk326UnaZWKisg' ;
		$allpay_invoice->HashIV 		= 'q9jcZX8Ib9LM8wYk' ; 
// 3.寫入發票相關資訊
		$allpay_invoice->Send['Tsr'] 		= 'ALLPAY201511241023171381912849'; 	// 交易單號
		$allpay_invoice->Send['PayType'] 	= '3'; 					// 交易類別
// 4.送出
		$aReturn_Info = $allpay_invoice->Check_Out();
// 5.返回
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
	echo $sMsg ;
?>
