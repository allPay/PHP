
<?php

try
	{
		
		$sMsg = '' ;
		
		// 1.載入SDK
		include_once('AllPay_Invoice.php');
		$allpay_invoice = new AllInvoice ;
		
		// 2.寫入基本介接參數
		$allpay_invoice->Invoice_Method 		= 'INVOICE_DELAY' ;
		$allpay_invoice->Invoice_Url 			= 'https://einvoice-stage.allpay.com.tw/Invoice/DelayIssue';
		$allpay_invoice->MerchantID 			= '2000132';
		$allpay_invoice->HashKey 			= 'ejCk326UnaZWKisg';
		$allpay_invoice->HashIV 			= 'q9jcZX8Ib9LM8wYk';
		
		// 3.寫入發票相關資訊
		$aItems	= array();
		
		// 商品資訊
		array_push($allpay_invoice->Send['Items'], array('ItemName' => '商品名稱一', 'ItemCount' => 1, 'ItemWord' => '批', 'ItemPrice' => 100, 'ItemTaxType' => 1, 'ItemAmount' => 100 ));
		array_push($allpay_invoice->Send['Items'], array('ItemName' => '商品名稱二', 'ItemCount' => 2, 'ItemWord' => '件', 'ItemPrice' => 200, 'ItemTaxType' => 1, 'ItemAmount' => 400 ));
		
		// 產生測試用自訂訂單編號
		$RelateNumber = 'ALLPAY'. date('YmdHis') . rand(1000000000,2147483647);
		
		$allpay_invoice->Send['RelateNumber'] 		= $RelateNumber;
		$allpay_invoice->Send['CustomerID'] 		= '';
		$allpay_invoice->Send['CustomerIdentifier'] 	= '';
		$allpay_invoice->Send['CustomerName'] 		= '';
		$allpay_invoice->Send['CustomerAddr'] 		= '';
		$allpay_invoice->Send['CustomerPhone'] 		= '';
		$allpay_invoice->Send['CustomerEmail'] 		= 'test@localhost.com';
		$allpay_invoice->Send['ClearanceMark'] 		= '';
		$allpay_invoice->Send['Print'] 			= '0';
		$allpay_invoice->Send['Donation'] 		= '2';
		$allpay_invoice->Send['LoveCode'] 		= '';
		$allpay_invoice->Send['CarruerType'] 		= '';
		$allpay_invoice->Send['CarruerNum'] 		= '';
		$allpay_invoice->Send['TaxType'] 		= '1';
		$allpay_invoice->Send['SalesAmount'] 		= '500';
		$allpay_invoice->Send['InvoiceRemark'] 		= 'SDK TEST';	
		$allpay_invoice->Send['InvType'] 		= '07';
		$allpay_invoice->Send['DelayFlag'] 		= '1';
		$allpay_invoice->Send['DelayDay'] 		= '1';
		$allpay_invoice->Send['ECBankID'] 		= '';
		$allpay_invoice->Send['Tsr'] 			= $RelateNumber;
		$allpay_invoice->Send['PayType'] 		= '3';
		$allpay_invoice->Send['PayAct'] 		= 'ALLPAY';
		$allpay_invoice->Send['NotifyURL'] 		= '';

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