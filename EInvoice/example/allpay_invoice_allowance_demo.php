
<?php

try
	{
		
		$sMsg = '' ;
		
		// 1.載入SDK
		include_once('AllPay_Invoice.php');
		$allpay_invoice = new AllInvoice ;
		
		// 2.寫入基本介接參數
		$allpay_invoice->Invoice_Method 		= 'ALLOWANCE' ;
		$allpay_invoice->Invoice_Url 			= 'https://einvoice-stage.allpay.com.tw/Invoice/Allowance';
		$allpay_invoice->MerchantID 			= '2000132';
		$allpay_invoice->HashKey 			= 'ejCk326UnaZWKisg';
		$allpay_invoice->HashIV 			= 'q9jcZX8Ib9LM8wYk';
		
		// 3.寫入發票相關資訊
		$aItems	= array();
		
		// 商品資訊
		array_push($allpay_invoice->Send['Items'], array('ItemName' => '商品名稱一', 'ItemCount' => 1, 'ItemWord' => '批', 'ItemPrice' => 100, 'ItemTaxType' => 1, 'ItemAmount' => 100 ));
		
		// 產生測試用自訂訂單編號
		$RelateNumber = 'ALLPAY'. date('YmdHis') . rand(1000000000,2147483647);
		
		$allpay_invoice->Send['CustomerName'] 		= '';
		$allpay_invoice->Send['InvoiceNo'] 		= 'AL00001934';
		$allpay_invoice->Send['AllowanceNotify'] 	= 'E';
		$allpay_invoice->Send['NotifyMail'] 		= 'test@localhost.com';
		$allpay_invoice->Send['NotifyPhone'] 		= '';
		$allpay_invoice->Send['AllowanceAmount'] 	= 100;
		
		// 3.送出
		$aReturn_Info = $allpay_invoice->Check_Out();
		
		// 4.返回
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
	
	echo 'RelateNumber=>' . $RelateNumber.'<br>'.$sMsg ;


?>