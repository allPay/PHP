<?php
try
	{
		$sMsg = '' ;
// 1.載入SDK程式
		include_once('AllPay_Invoice.php') ;
		$allpay_invoice = new AllInvoice ;
// 2.寫入基本介接參數
		$allpay_invoice->Invoice_Method 	= 'INVOICE_TRIGGER';
		$allpay_invoice->Invoice_Url 		= 'https://einvoice-stage.allpay.com.tw/Invoice/TriggerIssue' ;
		$allpay_invoice->MerchantID 		= '2000132' ;
		$allpay_invoice->HashKey 		= 'ejCk326UnaZWKisg' ;
		$allpay_invoice->HashIV 		= 'q9jcZX8Ib9LM8wYk' ; 
// 3.寫入發票相關資訊
		$allpay_invoice->Send['InvoiceNo'] 	= 'AL00001934'; 				// 發票號碼
		$allpay_invoice->Send['NotifyMail'] 	= 'test@localhost.com'; 			// 發送電子信箱
		$allpay_invoice->Send ['Notify'] 	= 'E'; 			 			// 發送方式
		$allpay_invoice->Send['InvoiceTag'] 	= 'I'; 					 	// 發送內容類型
		$allpay_invoice->Send ['Notified'] 	= 'C'; 					 	// 發送對象
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
