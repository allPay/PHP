<?php
/*
電子發票SDK
版本:1.0.0
@author Wesley
*/

// 執行發票作業項目。
abstract class InvoiceMethod
{
	// 一般開立發票。
    	const INVOICE = 'INVOICE';

	// 延遲或觸發開立發票。
    	const INVOICE_DELAY = 'INVOICE_DELAY';

	// 開立折讓。
    	const ALLOWANCE = 'ALLOWANCE';

	// 發票作廢。
    	const INVOICE_VOID = 'INVOICE_VOID';

	// 折讓作廢。
    	const ALLOWANCE_VOID = 'ALLOWANCE_VOID';
    
	// 查詢發票。
    	const INVOICE_SEARCH = 'INVOICE_SEARCH';
    
	// 查詢作廢發票。
    	const INVOICE_VOID_SEARCH = 'INVOICE_VOID_SEARCH';
    
	// 查詢折讓明細。
    	const ALLOWANCE_SEARCH = 'ALLOWANCE_SEARCH';
    
	// 查詢折讓作廢明細。
    	const ALLOWANCE_VOID_SEARCH = 'ALLOWANCE_VOID_SEARCH';
     
	// 發送通知。
	const INVOICE_NOTIFY = 'INVOICE_NOTIFY';
    
	// 付款完成觸發或延遲開立發票。
	const INVOICE_TRIGGER = 'INVOICE_TRIGGER';
}

// 電子發票開立註記。
abstract class InvoiceState
{
	// 需要開立電子發票。
	const Yes = 'Y';

	// 不需要開立電子發票。
	const No = '';
}

// 電子發票載具類別
abstract class CarruerType
{
	// 無載具
	const None = '';
  
	// 會員載具
	const Member = '1';
  
	// 買受人自然人憑證
	const Citizen = '2';
  
	// 買受人手機條碼
	const Cellphone = '3';
}

// 電子發票列印註記
abstract class PrintMark
{
	// 不列印
	const No = '0';
  
	// 列印
	const Yes = '1';
}

// 電子發票捐贈註記
abstract class Donation
{
	// 捐贈
	const Yes = '1';
  
	// 不捐贈
	const No = '2';
}

// 通關方式
abstract class ClearanceMark
{
	// 經海關出口
	const Yes = '1';
  
	// 非經海關出口
	const No = '2';
}

// 課稅類別
abstract class TaxType
{
	// 應稅
	const Dutiable = '1';
  
	// 零稅率
	const Zero = '2';
  
	// 免稅
	const Free = '3';
  
	// 應稅與免稅混合(限收銀機發票無法分辦時使用，且需通過申請核可)
	const Mix = '9';
}

// 字軌類別
abstract class InvType
{
	// 一般稅額
	const General = '07';
  
	// 特種稅額
	const Special = '08';
}

// 商品單價是否含稅
abstract class VatType
{
	// 商品單價含稅價
	const Yes = '1';
  
	// 商品單價未稅價
	const No = '0';
}

// 延遲註記
abstract class DelayFlagType
{
	// 延遲註記
	const Delay = '1';
  
	// 觸發註記
	const Trigger = '2';
}

// 交易類別
abstract class PayTypeCategory
{
	// ECBANK
	const Ecbank = '1';
  
	// ECPAY
	const Ecpay = '2';
	
	// ALLPAY
	const Allpay = '3';
}

// 通知類別 
abstract class AllowanceNotifyType
{
	// 簡訊通知
	const Sms = 'S';
  
	// 電子郵件通知
	const Email = 'E';
	
	// 皆通知
	const All = 'A';
	
	// 皆不通知
	const None = 'N';
}

// 發送方式
abstract class NotifyType
{
	// 簡訊通知
	const Sms = 'S';
  
	// 電子郵件通知
	const Email = 'E';
	
	// 皆通知
	const All = 'A';
}

// 發送內容類型
abstract class InvoiceTagType
{
	// 發票開立
	const Invoice = 'I';
  
	// 發票作廢
	const Invoice_Void = 'II';
	
	// 折讓開立
	const Allowance = 'A';
	
	// 折讓作廢
	const Allowance_Void = 'AI';
	
	// 發票中獎
	const Invoice_Winning = 'AW';
}

// 發送對象
abstract class NotifiedType
{
	// 通知客戶
	const Customer = 'C';
  
	// 通知廠商
	const vendor = 'M';
	
	// 皆發送
	const All = 'A';
}

class AllInvoice
{	
	public $TimeStamp 	= 0;
	public $nInvCreateDate 	= 0;
	public $MerchantID 	= '';
	public $HashKey 	= '';
	public $HashIV 		= '';
	public $Send 		= 'Send';
	public $Invoice_Method 	= 'Invoice_Method';	// 電子發票執行項目
	public $Invoice_Url 	= 'Invoice_Url';	// 電子發票執行網址
	  
	function __construct()
	{
	        $this->AllInvoice();
	        $this->TimeStamp = time();

	        $this->Send = array(
	            "RelateNumber" => '',
	            "CustomerID" => '',
	            "CustomerIdentifier" => '',
	            "CustomerName" => '',
	            "CustomerAddr" => '',
	            "CustomerPhone" => '',
	            "CustomerEmail" => '',
	            "ClearanceMark" => '',
	            "Print" => PrintMark::No,
	            "Donation" => Donation::No,
	            "LoveCode" => '',
		    "CarruerType" => CarruerType::None,
	            "CarruerNum" => '',
	            "TaxType" => '',
	            "SalesAmount" => '',
	            "InvoiceRemark" => '',
	            "Items" => array(),
	            "InvType" => '',
	            "InvCreateDate" => '',
	            "vat" => VatType::Yes,
	            "DelayFlag" => '',
	            "DelayDay" => 0,
	            "ECBankID" => '',
		    "Tsr" => '',
	            "PayType" => '',
	            "PayAct" => '',
	            "NotifyURL" => '',
	            "InvoiceNo" => '',
	            "AllowanceNotify" => '',
	            "NotifyMail" => '',
	            "NotifyPhone" => '',
	            "AllowanceAmount" => '',
	            "InvoiceNumber" => '',
	            "Reason" => '',
	            "AllowanceNo" => '',
	            "Phone" => '',
	            "Notify" => '',
	            "InvoiceTag" => '',
	            "Notified" => ''
        	);
      
	}
   	
	function AllInvoice()
	{
    	}
	
	/**
	* 執行發票各項動作
	*/
	function Check_Out()
	{		
		// 變數宣告
		$arErrors 		= '' ;
		$aSend_Info 		= array() ;	// 送出參數
		$aSend_CheckMac_Info 	= array() ;	// 送出檢查碼用陣列
		
		$aReturn_Info 		= array() ;	// 回傳參數
		$aReturn_CheckMacValue 	= array() ;	// 回傳檢查碼用陣列
		$sReturn_CheckMacValue	= '' ;		// 回傳回來的CheckMacValue
		
		// A.一般開立發票、B.延遲或觸發開立發票、C.開立折讓使用
		$sItemName		= '' ;		// 商品名稱
        	$sItemCount		= '' ;		// 商品數量
        	$sItemWord		= '' ;		// 商品單位
        	$sItemPrice		= '' ;		// 商品價格
        	$sItemTaxType		= '' ;		// 商品課稅別
        	$sItemAmount		= '' ;		// 商品合計
        	$nItems_Foreach_Count	= 1 ;		// 商品計算
        	
		// 參數檢查
		$arErrors = $this->Check_String() ;
		
		// 1.有錯誤變數
		if(sizeof($arErrors) > 0)
		{
			throw new Exception(join('<br>', $arErrors));     
		}
		else
		{
			// 2.整理必要參數
			$aSend_Info = $this->Send ;
			
			$aSend_Info['TimeStamp'] = $this->TimeStamp ;
			$aSend_Info['MerchantID'] = $this->MerchantID ;

			// 3.判斷動作類型
			
			// A.一般開立發票 
			if( $this->Invoice_Method == InvoiceMethod::INVOICE )
			{
				// 3-1過濾不需要的項目
				unset($aSend_Info['DelayFlag']) ;
				unset($aSend_Info['DelayDay']) ;
				unset($aSend_Info['ECBankID']) ;
				unset($aSend_Info['Tsr']) ;
				unset($aSend_Info['PayType']) ;
				unset($aSend_Info['PayAct']) ;
				unset($aSend_Info['NotifyURL']) ;
				unset($aSend_Info['InvoiceNo']) ;
				unset($aSend_Info['AllowanceNotify']) ;
				unset($aSend_Info['NotifyMail']) ;
				unset($aSend_Info['NotifyPhone']) ;
				unset($aSend_Info['AllowanceAmount']) ;
				unset($aSend_Info['InvoiceNumber']) ;
				unset($aSend_Info['Reason']) ;
				unset($aSend_Info['AllowanceNo']) ;
				unset($aSend_Info['Phone']) ;
				unset($aSend_Info['Notify']) ;
				unset($aSend_Info['InvoiceTag']) ;
				unset($aSend_Info['Notified']) ;
				
				// 3-2商品資訊組合
				$nItems_Count_Total = count($this->Send['Items']) ;	// 商品總筆數
				foreach($this->Send['Items'] as $key => $value)
	        		{
	        			$sItemName .= $value['ItemName'] ;
	        			$sItemCount .= (int) $value['ItemCount'] ;
	        			$sItemWord .= $value['ItemWord'] ;
	        			$sItemPrice .= (int) $value['ItemPrice'] ;
	        			$sItemTaxType .= $value['ItemTaxType'] ;
	        			$sItemAmount .= (int) $value['ItemAmount'] ;
	        			
	        			if( $nItems_Foreach_Count < $nItems_Count_Total )
	        			{
	        				$sItemName .= '|' ;
	        				$sItemCount .= '|' ;
	        				$sItemWord .= '|' ;
	        				$sItemPrice .= '|' ;
	        				$sItemTaxType .= '|' ;
	        				$sItemAmount .= '|' ;
	        			}

	        			$nItems_Foreach_Count++ ; 	
	        		}

        			$aSend_Info['ItemName'] 	= urlencode($sItemName);	// 商品名稱
        			$aSend_Info['ItemCount'] 	= $sItemCount ;
        			$aSend_Info['ItemWord'] 	= urlencode($sItemWord);	// 商品單位
        			$aSend_Info['ItemPrice'] 	= $sItemPrice ;
        			$aSend_Info['ItemTaxType'] 	= $sItemTaxType ;
        			$aSend_Info['ItemAmount'] 	= $sItemAmount ;
        			
        			unset($aSend_Info['Items']) ;

        			// 如果沒有填入資料，則清除該欄位，預設為當下時間
        			if($aSend_Info['InvCreateDate'] == '')
        			{
        				unset($aSend_Info['InvCreateDate']) ;
        			}
        			
				// 3-3產生檢查碼
				$aSend_CheckMac_Info = $aSend_Info ;
				
				// 過濾不需要參數項目
				unset($aSend_CheckMac_Info['ItemName']) ;
				unset($aSend_CheckMac_Info['ItemWord']) ;
				unset($aSend_CheckMac_Info['InvoiceRemark']) ;
				
				// 載具編號內包含+號則改為空白
				$aSend_CheckMac_Info['CarruerNum'] = str_replace ('+',' ',$aSend_CheckMac_Info['CarruerNum']);
				
				// 產生檢查碼
				$aSend_Info['CheckMacValue'] = $this->GenerateCheckMacValue($aSend_CheckMac_Info) ;
			}
			
			// B.延遲或觸發開立發票
			if( $this->Invoice_Method == InvoiceMethod::INVOICE_DELAY )
			{
				// 3-1過濾不需要的項目
				unset($aSend_Info['InvCreateDate']) ;
				unset($aSend_Info['vat']) ;
				unset($aSend_Info['InvoiceNo']) ;
				unset($aSend_Info['AllowanceNotify']) ;
				unset($aSend_Info['NotifyMail']) ;
				unset($aSend_Info['NotifyPhone']) ;
				unset($aSend_Info['AllowanceAmount']) ;
				unset($aSend_Info['InvoiceNumber']) ;
				unset($aSend_Info['Reason']) ;
				unset($aSend_Info['AllowanceNo']) ;
				unset($aSend_Info['Phone']) ;
				unset($aSend_Info['Notify']) ;
				unset($aSend_Info['InvoiceTag']) ;
				unset($aSend_Info['Notified']) ;
				
				if(empty($aSend_Info['CustomerIdentifier']))
				{
					unset($aSend_Info['CustomerIdentifier']);
				}
				else
				{
					$aSend_Info['CustomerIdentifier'] ;
				}
				
				// 3-2商品資訊組合
				$nItems_Count_Total = count($this->Send['Items']) ;	// 商品總筆數
				foreach($this->Send['Items'] as $key => $value)
	        		{
	        			$sItemName .= $value['ItemName'] ;
	        			$sItemCount .= (int) $value['ItemCount'] ;
	        			$sItemWord .= $value['ItemWord'] ;
	        			$sItemPrice .= (int) $value['ItemPrice'] ;
	        			$sItemTaxType .= $value['ItemTaxType'] ;
	        			$sItemAmount .= (int) $value['ItemAmount'] ;
	        			
	        			if( $nItems_Foreach_Count < $nItems_Count_Total )
	        			{
	        				$sItemName .= '|' ;
	        				$sItemCount .= '|' ;
	        				$sItemWord .= '|' ;
	        				$sItemPrice .= '|' ;
	        				$sItemTaxType .= '|' ;
	        				$sItemAmount .= '|' ;
	        			}

	        			$nItems_Foreach_Count++ ; 	
	        		}

        			$aSend_Info['ItemName'] 	= urlencode($sItemName);	// 商品名稱
        			$aSend_Info['ItemCount'] 	= $sItemCount ;
        			$aSend_Info['ItemWord'] 	= urlencode($sItemWord);	// 商品單位
        			$aSend_Info['ItemPrice'] 	= $sItemPrice ;
        			$aSend_Info['ItemTaxType'] 	= $sItemTaxType ;
        			$aSend_Info['ItemAmount'] 	= $sItemAmount ;
        			
        			unset($aSend_Info['Items']) ;

        			
				// 3-3產生檢查碼
				$aSend_CheckMac_Info = $aSend_Info ;
				
				// 過濾不需要參數項目
				unset($aSend_CheckMac_Info['ItemName']) ;
				unset($aSend_CheckMac_Info['ItemWord']) ;
				unset($aSend_CheckMac_Info['InvoiceRemark']) ;
				
				// 載具編號內包含+號則改為空白
				$aSend_CheckMac_Info['CarruerNum'] = str_replace ('+',' ',$aSend_CheckMac_Info['CarruerNum']);
				
				// 產生檢查碼
				$aSend_Info['CheckMacValue'] = $this->GenerateCheckMacValue($aSend_CheckMac_Info) ;
			}
			
			// C.開立折讓
			if( $this->Invoice_Method == InvoiceMethod::ALLOWANCE )
			{
				// 3-1過濾不需要的項目
				unset($aSend_Info['RelateNumber']) ;
				unset($aSend_Info['CustomerID']) ;
				unset($aSend_Info['CustomerIdentifier']) ;
				unset($aSend_Info['CustomerAddr']) ;
				unset($aSend_Info['CustomerPhone']) ;
				unset($aSend_Info['CustomerEmail']) ;
				unset($aSend_Info['ClearanceMark']) ;
				unset($aSend_Info['Print']) ;
				unset($aSend_Info['Donation']) ;
				unset($aSend_Info['LoveCode']) ;
				unset($aSend_Info['CarruerType']) ;
				unset($aSend_Info['CarruerNum']) ;
				unset($aSend_Info['TaxType']) ;
				unset($aSend_Info['SalesAmount']) ;
				unset($aSend_Info['InvoiceRemark']) ;
				unset($aSend_Info['InvType']) ;
				unset($aSend_Info['InvCreateDate']) ;
				unset($aSend_Info['vat']) ;
				unset($aSend_Info['DelayFlag']) ;
				unset($aSend_Info['DelayDay']) ;
				unset($aSend_Info['ECBankID']) ;
				unset($aSend_Info['Tsr']) ;
				unset($aSend_Info['PayType']) ;
				unset($aSend_Info['PayAct']) ;
				unset($aSend_Info['NotifyURL']) ;
				unset($aSend_Info['InvoiceNumber']) ;
				unset($aSend_Info['Reason']) ;
				unset($aSend_Info['AllowanceNo']) ;
				unset($aSend_Info['Phone']) ;
				unset($aSend_Info['Notify']) ;
				unset($aSend_Info['InvoiceTag']) ;
				unset($aSend_Info['Notified']) ;
				
				// 3-2商品資訊組合
				$nItems_Count_Total = count($this->Send['Items']) ;	// 商品總筆數
				foreach($this->Send['Items'] as $key => $value)
	        		{
	        			$sItemName .= $value['ItemName'] ;
	        			$sItemCount .= (int) $value['ItemCount'] ;
	        			$sItemWord .= $value['ItemWord'] ;
	        			$sItemPrice .= (int) $value['ItemPrice'] ;
	        			$sItemTaxType .= $value['ItemTaxType'] ;
	        			$sItemAmount .= (int) $value['ItemAmount'] ;
	        			
	        			if( $nItems_Foreach_Count < $nItems_Count_Total )
	        			{
	        				$sItemName .= '|' ;
	        				$sItemCount .= '|' ;
	        				$sItemWord .= '|' ;
	        				$sItemPrice .= '|' ;
	        				$sItemTaxType .= '|' ;
	        				$sItemAmount .= '|' ;
	        			}

	        			$nItems_Foreach_Count++ ; 	
	        		}

        			$aSend_Info['ItemName'] 	= urlencode($sItemName);	// 商品名稱
        			$aSend_Info['ItemCount'] 	= $sItemCount ;
        			$aSend_Info['ItemWord'] 	= urlencode($sItemWord);	// 商品單位
        			$aSend_Info['ItemPrice'] 	= $sItemPrice ;
        			$aSend_Info['ItemTaxType'] 	= $sItemTaxType ;
        			$aSend_Info['ItemAmount'] 	= $sItemAmount ;
        			
        			unset($aSend_Info['Items']) ;

        			
				// 3-3產生檢查碼
				$aSend_CheckMac_Info = $aSend_Info ;
				
				// 過濾不需要參數項目
				unset($aSend_CheckMac_Info['ItemName']) ;
				unset($aSend_CheckMac_Info['ItemWord']) ;
				
				// 產生檢查碼
				$aSend_Info['CheckMacValue'] = $this->GenerateCheckMacValue($aSend_CheckMac_Info) ;
			}
			
			// D.發票作廢
			if( $this->Invoice_Method == InvoiceMethod::INVOICE_VOID )
			{
				// 3-1過濾不需要的項目
				unset($aSend_Info['RelateNumber']) ;
				unset($aSend_Info['CustomerID']) ;
				unset($aSend_Info['CustomerIdentifier']) ;
				unset($aSend_Info['CustomerName']) ;
				unset($aSend_Info['CustomerAddr']) ;
				unset($aSend_Info['CustomerPhone']) ;
				unset($aSend_Info['CustomerEmail']) ;
				unset($aSend_Info['ClearanceMark']) ;
				unset($aSend_Info['Print']) ;
				unset($aSend_Info['Donation']) ;
				unset($aSend_Info['LoveCode']) ;
				unset($aSend_Info['CarruerType']) ;
				unset($aSend_Info['CarruerNum']) ;
				unset($aSend_Info['TaxType']) ;
				unset($aSend_Info['SalesAmount']) ;
				unset($aSend_Info['InvoiceRemark']) ;
				unset($aSend_Info['ItemName']) ;
				unset($aSend_Info['ItemCount']) ;
				unset($aSend_Info['ItemWord']) ;
				unset($aSend_Info['ItemPrice']) ;
				unset($aSend_Info['ItemTaxType']) ;
				unset($aSend_Info['ItemAmount']) ;
				unset($aSend_Info['InvType']) ;
				unset($aSend_Info['InvCreateDate']) ;
				unset($aSend_Info['vat']) ;
				unset($aSend_Info['DelayFlag']) ;
				unset($aSend_Info['DelayDay']) ;
				unset($aSend_Info['ECBankID']) ;
				unset($aSend_Info['Tsr']) ;
				unset($aSend_Info['PayType']) ;
				unset($aSend_Info['PayAct']) ;
				unset($aSend_Info['NotifyURL']) ;
				unset($aSend_Info['InvoiceNo']) ;
				unset($aSend_Info['AllowanceNotify']) ;
				unset($aSend_Info['NotifyMail']) ;
				unset($aSend_Info['NotifyPhone']) ;
				unset($aSend_Info['AllowanceAmount']) ;
				unset($aSend_Info['AllowanceNo']) ;
				unset($aSend_Info['Phone']) ;
				unset($aSend_Info['Notify']) ;
				unset($aSend_Info['InvoiceTag']) ;
				unset($aSend_Info['Notified']) ;
				
				// 3-2商品資訊組合
        			unset($aSend_Info['Items']) ;

        			
				// 3-3產生檢查碼
				$aSend_CheckMac_Info = $aSend_Info ;
				
				// 過濾不需要參數項目
				unset($aSend_CheckMac_Info['Reason']) ;
				
				// 產生檢查碼
				$aSend_Info['CheckMacValue'] = $this->GenerateCheckMacValue($aSend_CheckMac_Info) ;
			}
			
			// E.折讓作廢
			if( $this->Invoice_Method == InvoiceMethod::ALLOWANCE_VOID )
			{
				// 3-1過濾不需要的項目
				unset($aSend_Info['RelateNumber']) ;
				unset($aSend_Info['CustomerID']) ;
				unset($aSend_Info['CustomerIdentifier']) ;
				unset($aSend_Info['CustomerName']) ;
				unset($aSend_Info['CustomerAddr']) ;
				unset($aSend_Info['CustomerPhone']) ;
				unset($aSend_Info['CustomerEmail']) ;
				unset($aSend_Info['ClearanceMark']) ;
				unset($aSend_Info['Print']) ;
				unset($aSend_Info['Donation']) ;
				unset($aSend_Info['LoveCode']) ;
				unset($aSend_Info['CarruerType']) ;
				unset($aSend_Info['CarruerNum']) ;
				unset($aSend_Info['TaxType']) ;
				unset($aSend_Info['SalesAmount']) ;
				unset($aSend_Info['InvoiceRemark']) ;
				unset($aSend_Info['ItemName']) ;
				unset($aSend_Info['ItemCount']) ;
				unset($aSend_Info['ItemWord']) ;
				unset($aSend_Info['ItemPrice']) ;
				unset($aSend_Info['ItemTaxType']) ;
				unset($aSend_Info['ItemAmount']) ;
				unset($aSend_Info['InvType']) ;
				unset($aSend_Info['InvCreateDate']) ;
				unset($aSend_Info['vat']) ;
				unset($aSend_Info['DelayFlag']) ;
				unset($aSend_Info['DelayDay']) ;
				unset($aSend_Info['ECBankID']) ;
				unset($aSend_Info['Tsr']) ;
				unset($aSend_Info['PayType']) ;
				unset($aSend_Info['PayAct']) ;
				unset($aSend_Info['NotifyURL']) ;
				unset($aSend_Info['AllowanceNotify']) ;
				unset($aSend_Info['NotifyMail']) ;
				unset($aSend_Info['NotifyPhone']) ;
				unset($aSend_Info['AllowanceAmount']) ;
				unset($aSend_Info['InvoiceNumber']) ;
				unset($aSend_Info['Phone']) ;
				unset($aSend_Info['Notify']) ;
				unset($aSend_Info['InvoiceTag']) ;
				unset($aSend_Info['Notified']) ;
				
				// 3-2商品資訊組合
        			unset($aSend_Info['Items']) ;

        			
				// 3-3產生檢查碼
				$aSend_CheckMac_Info = $aSend_Info ;
				
				// 過濾不需要參數項目
				unset($aSend_CheckMac_Info['Reason']) ;
				
				// 產生檢查碼
				$aSend_Info['CheckMacValue'] = $this->GenerateCheckMacValue($aSend_CheckMac_Info) ;
			}
			
			// F.查詢發票 G.查詢作廢發票
			if( $this->Invoice_Method == InvoiceMethod::INVOICE_SEARCH || $this->Invoice_Method == InvoiceMethod::INVOICE_VOID_SEARCH )
			{
				// 3-1過濾不需要的項目
				unset($aSend_Info['CustomerID']) ;
				unset($aSend_Info['CustomerIdentifier']) ;
				unset($aSend_Info['CustomerName']) ;
				unset($aSend_Info['CustomerAddr']) ;
				unset($aSend_Info['CustomerPhone']) ;
				unset($aSend_Info['CustomerEmail']) ;
				unset($aSend_Info['ClearanceMark']) ;
				unset($aSend_Info['Print']) ;
				unset($aSend_Info['Donation']) ;
				unset($aSend_Info['LoveCode']) ;
				unset($aSend_Info['CarruerType']) ;
				unset($aSend_Info['CarruerNum']) ;
				unset($aSend_Info['TaxType']) ;
				unset($aSend_Info['SalesAmount']) ;
				unset($aSend_Info['InvoiceRemark']) ;
				unset($aSend_Info['ItemName']) ;
				unset($aSend_Info['ItemCount']) ;
				unset($aSend_Info['ItemWord']) ;
				unset($aSend_Info['ItemPrice']) ;
				unset($aSend_Info['ItemTaxType']) ;
				unset($aSend_Info['ItemAmount']) ;
				unset($aSend_Info['InvType']) ;
				unset($aSend_Info['InvCreateDate']) ;
				unset($aSend_Info['vat']) ;
				unset($aSend_Info['DelayFlag']) ;
				unset($aSend_Info['DelayDay']) ;
				unset($aSend_Info['ECBankID']) ;
				unset($aSend_Info['Tsr']) ;
				unset($aSend_Info['PayType']) ;
				unset($aSend_Info['PayAct']) ;
				unset($aSend_Info['NotifyURL']) ;
				unset($aSend_Info['InvoiceNo']) ;
				unset($aSend_Info['AllowanceNotify']) ;
				unset($aSend_Info['NotifyMail']) ;
				unset($aSend_Info['NotifyPhone']) ;
				unset($aSend_Info['AllowanceAmount']) ;
				unset($aSend_Info['InvoiceNumber']) ;
				unset($aSend_Info['Reason']) ;
				unset($aSend_Info['AllowanceNo']) ;
				unset($aSend_Info['Phone']) ;
				unset($aSend_Info['Notify']) ;
				unset($aSend_Info['InvoiceTag']) ;
				unset($aSend_Info['Notified']) ;
				
				// 3-2商品資訊組合
        			unset($aSend_Info['Items']) ;

        			
				// 3-3產生檢查碼
				$aSend_CheckMac_Info = $aSend_Info ;
				
				// 過濾不需要參數項目
				unset($aSend_CheckMac_Info['Reason']) ;
				
				// 產生檢查碼
				$aSend_Info['CheckMacValue'] = $this->GenerateCheckMacValue($aSend_CheckMac_Info) ;
			}
			
			// H.查詢折讓明細 I.查詢折讓作廢明細
			if( $this->Invoice_Method == InvoiceMethod::ALLOWANCE_SEARCH || $this->Invoice_Method == InvoiceMethod::ALLOWANCE_VOID_SEARCH )
			{
				// 3-1過濾不需要的項目
				unset($aSend_Info['RelateNumber']) ;
				unset($aSend_Info['CustomerID']) ;
				unset($aSend_Info['CustomerIdentifier']) ;
				unset($aSend_Info['CustomerName']) ;
				unset($aSend_Info['CustomerAddr']) ;
				unset($aSend_Info['CustomerPhone']) ;
				unset($aSend_Info['CustomerEmail']) ;
				unset($aSend_Info['ClearanceMark']) ;
				unset($aSend_Info['Print']) ;
				unset($aSend_Info['Donation']) ;
				unset($aSend_Info['LoveCode']) ;
				unset($aSend_Info['CarruerType']) ;
				unset($aSend_Info['CarruerNum']) ;
				unset($aSend_Info['TaxType']) ;
				unset($aSend_Info['SalesAmount']) ;
				unset($aSend_Info['InvoiceRemark']) ;
				unset($aSend_Info['ItemName']) ;
				unset($aSend_Info['ItemCount']) ;
				unset($aSend_Info['ItemWord']) ;
				unset($aSend_Info['ItemPrice']) ;
				unset($aSend_Info['ItemTaxType']) ;
				unset($aSend_Info['ItemAmount']) ;
				unset($aSend_Info['InvType']) ;
				unset($aSend_Info['InvCreateDate']) ;
				unset($aSend_Info['vat']) ;
				unset($aSend_Info['DelayFlag']) ;
				unset($aSend_Info['DelayDay']) ;
				unset($aSend_Info['ECBankID']) ;
				unset($aSend_Info['Tsr']) ;
				unset($aSend_Info['PayType']) ;
				unset($aSend_Info['PayAct']) ;
				unset($aSend_Info['NotifyURL']) ;
				unset($aSend_Info['AllowanceNotify']) ;
				unset($aSend_Info['NotifyMail']) ;
				unset($aSend_Info['NotifyPhone']) ;
				unset($aSend_Info['AllowanceAmount']) ;
				unset($aSend_Info['InvoiceNumber']) ;
				unset($aSend_Info['Reason']) ;
				unset($aSend_Info['Phone']) ;
				unset($aSend_Info['Notify']) ;
				unset($aSend_Info['InvoiceTag']) ;
				unset($aSend_Info['Notified']) ;
				
				// 3-2商品資訊組合
        			unset($aSend_Info['Items']) ;

				// 3-3產生檢查碼
				$aSend_CheckMac_Info = $aSend_Info ;
				
				// 產生檢查碼
				$aSend_Info['CheckMacValue'] = $this->GenerateCheckMacValue($aSend_CheckMac_Info) ;
			}
			
			// J.發送通知
			if( $this->Invoice_Method == InvoiceMethod::INVOICE_NOTIFY )
			{
				// 3-1過濾不需要的項目
				unset($aSend_Info['RelateNumber']) ;
				unset($aSend_Info['CustomerID']) ;
				unset($aSend_Info['CustomerIdentifier']) ;
				unset($aSend_Info['CustomerName']) ;
				unset($aSend_Info['CustomerAddr']) ;
				unset($aSend_Info['CustomerPhone']) ;
				unset($aSend_Info['CustomerEmail']) ;
				unset($aSend_Info['ClearanceMark']) ;
				unset($aSend_Info['Print']) ;
				unset($aSend_Info['Donation']) ;
				unset($aSend_Info['LoveCode']) ;
				unset($aSend_Info['CarruerType']) ;
				unset($aSend_Info['CarruerNum']) ;
				unset($aSend_Info['TaxType']) ;
				unset($aSend_Info['SalesAmount']) ;
				unset($aSend_Info['InvoiceRemark']) ;
				unset($aSend_Info['ItemName']) ;
				unset($aSend_Info['ItemCount']) ;
				unset($aSend_Info['ItemWord']) ;
				unset($aSend_Info['ItemPrice']) ;
				unset($aSend_Info['ItemTaxType']) ;
				unset($aSend_Info['ItemAmount']) ;
				unset($aSend_Info['InvType']) ;
				unset($aSend_Info['InvCreateDate']) ;
				unset($aSend_Info['vat']) ;
				unset($aSend_Info['DelayFlag']) ;
				unset($aSend_Info['DelayDay']) ;
				unset($aSend_Info['ECBankID']) ;
				unset($aSend_Info['Tsr']) ;
				unset($aSend_Info['PayType']) ;
				unset($aSend_Info['PayAct']) ;
				unset($aSend_Info['NotifyURL']) ;
				unset($aSend_Info['AllowanceNotify']) ;
				unset($aSend_Info['NotifyPhone']) ;
				unset($aSend_Info['AllowanceAmount']) ;
				unset($aSend_Info['InvoiceNumber']) ;
				unset($aSend_Info['Reason']) ;
				
				// 3-2商品資訊組合
        			unset($aSend_Info['Items']) ;

				// 3-3產生檢查碼
				$aSend_CheckMac_Info = $aSend_Info ;
				
				// 產生檢查碼
				$aSend_Info['CheckMacValue'] = $this->GenerateCheckMacValue($aSend_CheckMac_Info) ;
			}
			
			// K.查詢折讓明細
			if( $this->Invoice_Method == InvoiceMethod::INVOICE_TRIGGER )
			{
				// 3-1過濾不需要的項目
				unset($aSend_Info['RelateNumber']) ;
				unset($aSend_Info['CustomerID']) ;
				unset($aSend_Info['CustomerIdentifier']) ;
				unset($aSend_Info['CustomerName']) ;
				unset($aSend_Info['CustomerAddr']) ;
				unset($aSend_Info['CustomerPhone']) ;
				unset($aSend_Info['CustomerEmail']) ;
				unset($aSend_Info['ClearanceMark']) ;
				unset($aSend_Info['Print']) ;
				unset($aSend_Info['Donation']) ;
				unset($aSend_Info['LoveCode']) ;
				unset($aSend_Info['CarruerType']) ;
				unset($aSend_Info['CarruerNum']) ;
				unset($aSend_Info['TaxType']) ;
				unset($aSend_Info['SalesAmount']) ;
				unset($aSend_Info['InvoiceRemark']) ;
				unset($aSend_Info['ItemName']) ;
				unset($aSend_Info['ItemCount']) ;
				unset($aSend_Info['ItemWord']) ;
				unset($aSend_Info['ItemPrice']) ;
				unset($aSend_Info['ItemTaxType']) ;
				unset($aSend_Info['ItemAmount']) ;
				unset($aSend_Info['InvType']) ;
				unset($aSend_Info['InvCreateDate']) ;
				unset($aSend_Info['vat']) ;
				unset($aSend_Info['DelayFlag']) ;
				unset($aSend_Info['DelayDay']) ;
				unset($aSend_Info['ECBankID']) ;
				unset($aSend_Info['PayAct']) ;
				unset($aSend_Info['NotifyURL']) ;
				unset($aSend_Info['InvoiceNo']) ;
				unset($aSend_Info['AllowanceNotify']) ;
				unset($aSend_Info['NotifyMail']) ;
				unset($aSend_Info['NotifyPhone']) ;
				unset($aSend_Info['AllowanceAmount']) ;
				unset($aSend_Info['InvoiceNumber']) ;
				unset($aSend_Info['Reason']) ;
				unset($aSend_Info['AllowanceNo']) ;
				unset($aSend_Info['Phone']) ;
				unset($aSend_Info['Notify']) ;
				unset($aSend_Info['InvoiceTag']) ;
				unset($aSend_Info['Notified']) ;
				
				// 3-2商品資訊組合
        			unset($aSend_Info['Items']) ;

				// 3-3產生檢查碼
				$aSend_CheckMac_Info = $aSend_Info ;
				
				// 產生檢查碼
				$aSend_Info['CheckMacValue'] = $this->GenerateCheckMacValue($aSend_CheckMac_Info) ;
				
				
			}
			
			// 4.送出資訊
			if(true)
			{
				$aReturn_Info = $this->ServerPost($aSend_Info);
			}
		        
  			// 5.狀態回傳驗證
  			if(true)
			{
		  		// A. B. C. D. E.
		  		if( $this->Invoice_Method == InvoiceMethod::INVOICE || $this->Invoice_Method == InvoiceMethod::INVOICE_DELAY || $this->Invoice_Method == InvoiceMethod::ALLOWANCE || $this->Invoice_Method == InvoiceMethod::INVOICE_VOID || $this->Invoice_Method == InvoiceMethod::ALLOWANCE_VOID)
	  			{
					// 5-1 CheckMac檢查
					if(count($aReturn_Info) > 0 && isset($aReturn_Info['CheckMacValue']))
					{
						$aReturn_CheckMacValue = $aReturn_Info ;
						$sReturn_CheckMacValue = $aReturn_Info['CheckMacValue'] ;
						unset($aReturn_CheckMacValue['CheckMacValue']) ;
						
						$sCheckMacValueGen = $this->GenerateCheckMacValue($aReturn_CheckMacValue) ;
						
						if($sCheckMacValueGen != $sReturn_CheckMacValue )
						{
							array_push($arErrors, '1000001 CheckMacValue verify fail.');
						}
					}	
					else
					{
						// 傳出參數錯誤，查無資料
						array_push($arErrors, 'Error:10100050');
					}	
				}
				
				// F.查詢發票
				if( $this->Invoice_Method == InvoiceMethod::INVOICE_SEARCH )
	  			{
	  				// 5-1 CheckMac檢查
					if(count($aReturn_Info) > 0 && isset($aReturn_Info['CheckMacValue']))
					{
						$aReturn_CheckMacValue = $aReturn_Info ;
						$sReturn_CheckMacValue = $aReturn_Info['CheckMacValue'] ;
						
						unset($aReturn_CheckMacValue['CheckMacValue']) ;
						unset($aReturn_CheckMacValue['ItemName']) ;
						unset($aReturn_CheckMacValue['ItemWord']) ;
						unset($aReturn_CheckMacValue['InvoiceRemark']) ;
						
						if($aReturn_Info['RtnCode'] == 1)
						{
							$aReturn_CheckMacValue['IIS_Customer_Name'] = $this->Replace_Symbol(urlencode($aReturn_CheckMacValue['IIS_Customer_Name']));
							$aReturn_CheckMacValue['IIS_Customer_Addr'] = $this->Replace_Symbol(urlencode($aReturn_CheckMacValue['IIS_Customer_Addr']));
							$aReturn_CheckMacValue['IIS_Customer_Email'] = $this->Replace_Symbol(urlencode($aReturn_CheckMacValue['IIS_Customer_Email']));
							
							// EMIAL項目的@不做urlencode還原回來
							$aReturn_CheckMacValue['IIS_Customer_Email'] = str_replace('%40', '@', $aReturn_CheckMacValue['IIS_Customer_Email']);
						}
						
						$sCheckMacValueGen = $this->GenerateCheckMacValue($aReturn_CheckMacValue) ;
						
						if($sCheckMacValueGen != $sReturn_CheckMacValue )
						{
							array_push($arErrors, '1000001 CheckMacValue verify fail.');
						}
					}
					else
					{
						// 傳出參數錯誤，查無資料
						array_push($arErrors, 'Error:10100050');
					}			
	  			}
	  			
	  			// G.查詢作廢發票
				if( $this->Invoice_Method == InvoiceMethod::INVOICE_VOID_SEARCH )
	  			{
	  				// 5-1 CheckMac檢查
					if(count($aReturn_Info) > 0 && isset($aReturn_Info['CheckMacValue']))
					{
						$aReturn_CheckMacValue = $aReturn_Info ;
						$sReturn_CheckMacValue = $aReturn_Info['CheckMacValue'] ;
						
						unset($aReturn_CheckMacValue['CheckMacValue']) ;
						unset($aReturn_CheckMacValue['Reason']) ;
						
						$sCheckMacValueGen = $this->GenerateCheckMacValue($aReturn_CheckMacValue) ;
						if($sCheckMacValueGen != $sReturn_CheckMacValue )
						{
							array_push($arErrors, '1000001 CheckMacValue verify fail.');
						}
					}
					else
					{
						// 傳出參數錯誤，查無資料
						array_push($arErrors, 'Error:10100050');
					}			
	  			}
	  			
	  			// H.查詢折讓明細
				if( $this->Invoice_Method == InvoiceMethod::ALLOWANCE_SEARCH )
	  			{
	  				
	  				// 5-1 CheckMac檢查
					if(count($aReturn_Info) > 0 && isset($aReturn_Info['CheckMacValue']))
					{
						$aReturn_CheckMacValue = $aReturn_Info ;
						$sReturn_CheckMacValue = $aReturn_Info['CheckMacValue'] ;
						
						unset($aReturn_CheckMacValue['CheckMacValue']) ;
						unset($aReturn_CheckMacValue['ItemName']) ;
						unset($aReturn_CheckMacValue['ItemWord']) ;
						
						$aReturn_CheckMacValue['IIS_Customer_Name'] = $this->Replace_Symbol(urlencode($aReturn_CheckMacValue['IIS_Customer_Name'])) ;

						$sCheckMacValueGen = $this->GenerateCheckMacValue($aReturn_CheckMacValue) ;
						if($sCheckMacValueGen != $sReturn_CheckMacValue )
						{
							array_push($arErrors, '1000001 CheckMacValue verify fail.');
						}
					}
					else
					{
						// 傳出參數錯誤，查無資料
						array_push($arErrors, 'Error:10100050');
					}		
	  			}
	  			
	  			// I.查詢折讓作廢明細
				if( $this->Invoice_Method == InvoiceMethod::ALLOWANCE_VOID_SEARCH )
	  			{
	  				// 5-1 CheckMac檢查
					if(count($aReturn_Info) > 0 && isset($aReturn_Info['CheckMacValue']))
					{
						$aReturn_CheckMacValue = $aReturn_Info ;
						$sReturn_CheckMacValue = $aReturn_Info['CheckMacValue'] ;
						
						unset($aReturn_CheckMacValue['CheckMacValue']) ;
						unset($aReturn_CheckMacValue['Reason']) ;
						
						$sCheckMacValueGen = $this->GenerateCheckMacValue($aReturn_CheckMacValue) ;
						if($sCheckMacValueGen != $sReturn_CheckMacValue )
						{
							array_push($arErrors, '1000001 CheckMacValue verify fail.');
						}
					}
					else
					{
						// 傳出參數錯誤，查無資料
						array_push($arErrors, 'Error:10100050');
					}			
	  			}
	  			
	  			// J.發送通知
				if( $this->Invoice_Method == InvoiceMethod::INVOICE_NOTIFY )
	  			{
	  				// 5-1 CheckMac檢查
					if(count($aReturn_Info) > 0 && isset($aReturn_Info['CheckMacValue']))
					{
						$aReturn_CheckMacValue = $aReturn_Info ;
						$sReturn_CheckMacValue = $aReturn_Info['CheckMacValue'] ;
						
						unset($aReturn_CheckMacValue['CheckMacValue']) ;
						
						$sCheckMacValueGen = $this->GenerateCheckMacValue($aReturn_CheckMacValue) ;
						if($sCheckMacValueGen != $sReturn_CheckMacValue )
						{
							array_push($arErrors, '1000001 CheckMacValue verify fail.');
						}
					}
					else
					{
						// 傳出參數錯誤，查無資料
						array_push($arErrors, 'Error:10100050');
					}			
	  			}
	  			
	  			// K.付款完成觸發或延遲開立發票
				if( $this->Invoice_Method == InvoiceMethod::INVOICE_TRIGGER )
	  			{
	  				// 5-1 CheckMac檢查
					if(count($aReturn_Info) > 0 && isset($aReturn_Info['CheckMacValue']))
					{
						$aReturn_CheckMacValue = $aReturn_Info ;
						$sReturn_CheckMacValue = $aReturn_Info['CheckMacValue'] ;
						
						unset($aReturn_CheckMacValue['CheckMacValue']) ;
						
						$sCheckMacValueGen = $this->GenerateCheckMacValue($aReturn_CheckMacValue) ;
						if($sCheckMacValueGen != $sReturn_CheckMacValue )
						{
							array_push($arErrors, '1000001 CheckMacValue verify fail.');
						}
					}
					else
					{
						// 傳出參數錯誤，查無資料
						array_push($arErrors, 'Error:10100050');
					}			
	  			}
	  			
	  			return (count($arErrors) > 0) ? $arErrors : $aReturn_Info ;	
			}	
		}
		
 		exit;
	}
    	
	/**
	* 檢查各個參數是否符合規格
	*/
    	function Check_String()
    	{
     		$arErrors = array();

		// 檢查是否傳入動作方式
        	if($this->Invoice_Method == '' || $this->Invoice_Method == 'Invoice_Method')
        	{
			array_push($arErrors, 'Invoice_Method is required.');	
        	}
        	
        	// 檢查是否有傳入MerchantID
		if(strlen($this->MerchantID) == 0)
		{
	            array_push($arErrors, 'MerchantID is required.');
		}
	        if(strlen($this->MerchantID) > 10)
	        {
	            array_push($arErrors, 'MerchantID max langth as 10.');
	        }
	        
	        // 檢查是否有傳入HashKey
	        if(strlen($this->HashKey) == 0)
		{
	            array_push($arErrors, 'HashKey is required.');
		}
		
		// 檢查是否有傳入HashIV
	        if(strlen($this->HashIV) == 0)
		{
	            array_push($arErrors, 'HashIV is required.');
		}
		
		// 檢查是否有傳送網址
	        if(strlen($this->Invoice_Url) == 0)
		{
	            array_push($arErrors, 'Invoice_Url is required.');
		}
		
	        // 檢查 A.一般開立發票、B.延遲觸發開立發票、F.查詢發票、G.查詢作廢發票
	        if( $this->Invoice_Method == InvoiceMethod::INVOICE || $this->Invoice_Method == InvoiceMethod::INVOICE_DELAY || $this->Invoice_Method == InvoiceMethod::INVOICE_SEARCH || $this->Invoice_Method == InvoiceMethod::INVOICE_VOID_SEARCH)
	        {	
	        	// 4.廠商自訂編號
	        	
	        	// *預設不可為空值
	        	if(strlen($this->Send['RelateNumber']) == 0)
	        	{
	        		array_push($arErrors, '4:RelateNumber is required.');
	        	}
	        	// *預設最大長度為30碼
	        	if(strlen($this->Send['RelateNumber']) > 30)
	        	{
	        		array_push($arErrors, '4:RelateNumber max langth as 30.');
	        	}
	        }
	        
	        // 檢查 A.一般開立發票、B.延遲觸發開立發票
	        if( $this->Invoice_Method == InvoiceMethod::INVOICE || $this->Invoice_Method == InvoiceMethod::INVOICE_DELAY )
	        {	
	        	// 5.客戶代號 CustomerID
	        	
	        	// *載具類別為1 則客戶代號需有值
        		if($this->Send['CarruerType'] == 1)
        		{
        			if(strlen($this->Send['CustomerID']) == 0 )
		        	{
		        		array_push($arErrors, '5:CustomerID is required.');
		        	}
        		}
        		// *預設最大長度為20碼
        		if(strlen($this->Send['CustomerID']) > 20 )
	        	{
	        		array_push($arErrors, '5:CustomerID max langth as 20.');
	        	}
	        	// *比對客戶代號 只接受英、數字與下底線格式
	        	if(strlen($this->Send['CustomerID']) > 0)
	        	{
	        		
	        		if( !preg_match('/^[a-zA-Z0-9_]+$/', $this->Send['CustomerID']) )
		        	{
		        		arRay_push($arErrors, '5:Invalid CustomerID.');
		        	}
	        	}
	        	
	        	// 6.統一編號判斷 CustomerIdentifier
	        	
	        	// *若統一編號有值時，則固定長度為數字8碼
	        	if( strlen( $this->Send['CustomerIdentifier'] ) > 0  )
	        	{		        	
		        	if( !preg_match('/^[0-9]{8}$/', $this->Send['CustomerIdentifier']) ) 
		        	{
		        		
		        		array_push($arErrors, '6:CustomerIdentifier length should be 8.');
		        	}
		        }
	        }
	        
	        // 檢查 C.開立折讓
	        if( $this->Invoice_Method == InvoiceMethod::ALLOWANCE )
	        {
	        	// 7.客戶名稱 CustomerName
			// x僅能為中英數字格式
        		// *預設最大長度為30碼
	        	if( mb_strlen($this->Send['CustomerName'], 'UTF-8') > 30)
	        	{
	        		array_push($arErrors, '7:CustomerName max length as 30.');
	        	}
	        	// *UrlEncode
	        	$this->Send['CustomerName'] = urlencode($this->Send['CustomerName']);
	        	$this->Send['CustomerName'] = $this->Replace_Symbol($this->Send['CustomerName']) ;	
	        }
	        
		// 檢查 A.一般開立發票、B.延遲觸發開立發票
	        if( $this->Invoice_Method == InvoiceMethod::INVOICE || $this->Invoice_Method == InvoiceMethod::INVOICE_DELAY )
	        {		        	
	        	// 7.客戶名稱 CustomerName
	        	// x僅能為中英數字格式
	        	// *若列印註記 = '1' (列印)時，則客戶名稱須有值
	        	if ($this->Send['Print'] == PrintMark::Yes)
        		{
				if (mb_strlen($this->Send['CustomerName'], 'UTF-8') == 0)
				{
					array_push($arErrors, "7:CustomerName is required.");
				}
        		}
        		// *預設最大長度為30碼
	        	if( mb_strlen($this->Send['CustomerName'], 'UTF-8') > 30)
	        	{
	        		array_push($arErrors, '7:CustomerName max length as 30.');
	        	}
	        	// *UrlEncode
	        	$this->Send['CustomerName'] = urlencode($this->Send['CustomerName']);
	        	$this->Send['CustomerName'] = $this->Replace_Symbol($this->Send['CustomerName']) ;
	        		
			// 8.客戶地址 CustomerAddr(UrlEncode, 預設為空字串)
			
			// *若列印註記 = '1' (列印)時，則客戶地址須有值
			if ($this->Send['Print'] == PrintMark::Yes)
			{
				if (mb_strlen($this->Send['CustomerAddr'], 'UTF-8') == 0)
				{
					array_push($arErrors, "8:CustomerAddr is required.");
				}
			}
			// *預設最大長度為100碼
			if (mb_strlen($this->Send['CustomerAddr'], 'UTF-8') > 100)
			{
				array_push($arErrors, "8:CustomerAddr max length as 100.");
			}
			// *UrlEncode
	        	$this->Send['CustomerAddr'] = urlencode($this->Send['CustomerAddr']);
	        	$this->Send['CustomerAddr'] = $this->Replace_Symbol($this->Send['CustomerAddr']) ;
	        	
		        // 9.客戶手機號碼 CustomerPhone
		        
		        // *預設最小長度為1碼，最大長度為20碼
			if (strlen($this->Send['CustomerPhone']) > 20)
			{
				array_push($arErrors, "9:CustomerPhone max length as 20.");
			}
			// *預設格式為數字組成
			if (strlen($this->Send['CustomerPhone']) > 0)
			{
				if( !preg_match('/^[0-9]*$/', $this->Send['CustomerPhone']) )
		        	{
		        		array_push($arErrors, '9:Invalid CustomerPhone.');
		        	}
		        }
			
			// 10.客戶電子信箱 CustomerEmail(UrlEncode, 預設為空字串, 與CustomerPhone擇一不可為空)
			
			// *預設最大長度為80碼
			if (strlen($this->Send['CustomerEmail']) > 80)
			{
				array_push($arErrors, "10:CustomerEmail max length as 80.");
			}
			// *若客戶電子信箱有值時，則格式僅能為Email的標準格式
			if(strlen($this->Send['CustomerEmail']) > 0 )
	        	{
	        		if ( !preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-_]+\.([a-z0-9\-_]+\.)*?[a-z]+$/is', $this->Send['CustomerEmail']) )
	        		{
	        			array_push($arErrors, '10:Invalid CustomerEmail Format.');
	        		}
	        	}
			// *UrlEncode
	        	$this->Send['CustomerEmail'] = urlencode($this->Send['CustomerEmail']);
			$this->Send['CustomerEmail'] = $this->Replace_Symbol($this->Send['CustomerEmail']) ;
	        	
			// 9. 10. 
			
			// *若客戶手機號碼為空值時，則客戶電子信箱不可為空值 
			if (strlen($this->Send['CustomerPhone']) == 0 && strlen($this->Send['CustomerEmail']) == 0)
			{
				array_push($arErrors, "9-10:CustomerPhone or CustomerEmail is required.");
			}	
	        	
	        	// 11.通關方式 ClearanceMark(預設為空字串)
	        	
	        	// *最多1字元
			if (strlen($this->Send['ClearanceMark']) > 1)
			{
                  		array_push($arErrors, "11:ClearanceMark max length as 1.");
			}
			
			// *請設定空字串，僅課稅類別為零稅率(Zero)時，此參數不可為空字串
			if ($this->Send['TaxType'] == TaxType::Zero)
			{
				if ( ( $this->Send['ClearanceMark'] != ClearanceMark::Yes ) && ( $this->Send['ClearanceMark'] != ClearanceMark::No ) )
				{
					array_push($arErrors, "11:ClearanceMark is required.");
				}
			}
			else
			{
				if (strlen($this->Send['ClearanceMark']) > 0)
				{
					array_push($arErrors, "11:Please remove ClearanceMark.");
				}
			}

	        	// 12.列印註記 Print(預設為No)
	        	
	        	// *列印註記僅能為 0 或 1
			if ( ( $this->Send['Print'] != PrintMark::Yes ) && ( $this->Send['Print'] != PrintMark::No ) )
			{
				array_push($arErrors, "12:Invalid Print.");
			}
			// *若捐贈註記 = '1' (捐贈)時，則VAL = '0' (不列印)
			if ($this->Send['Donation'] == Donation::Yes)
			{
				if ($this->Send['Print'] != PrintMark::No)
				{
					array_push($arErrors, "12:Donation Print should be No.");
				}
			}
			// *若統一編號有值時，則VAL = '1' (列印)
			if (strlen($this->Send['CustomerIdentifier']) > 0)
			{
				if ($this->Send['Print'] != PrintMark::Yes)
				{
                      			array_push($arErrors, "12:CustomerIdentifier Print should be Yes.");
				}
			}	
			
			// 13.捐贈註記 Donation
			
			// *固定給定下述預設值若為捐贈時，則VAL = '1'，若為不捐贈時，則VAL = '2'
			if ( ($this->Send['Donation'] != Donation::Yes ) && ( $this->Send['Donation'] != Donation::No ) )
			{
				array_push($arErrors, "13:Invalid Donation.");
			}
			// *若統一編號有值時，則VAL = '2' (不捐贈)
			if (strlen($this->Send['CustomerIdentifier']) > 0 && $this->Send['Donation'] == Donation::Yes )
			{
				array_push($arErrors, "13:CustomerIdentifier Donation should be No.");
			}
			
			
			// 14.愛心碼 LoveCode(預設為空字串)
			
			// *若捐贈註記 = '1' (捐贈)時，則須有值
			if ($this->Send['Donation'] == Donation::Yes)
			{
				if ( !preg_match('/^([xX]{1}[0-9]{2,6}|[0-9]{3,7})$/', $this->Send['LoveCode']) )
				{
                      			array_push($arErrors, "14:Invalid LoveCode.");
				}
			}
			else
			{
				if (strlen($this->Send['LoveCode']) > 0)
				{
					array_push($arErrors, "14:Please remove LoveCode.");
				}
			}
			
			// 15.載具類別 CarruerType(預設為None)
			
			// *固定給定下述預設值None、Member、Cellphone
			if ( ( $this->Send['CarruerType'] != CarruerType::None ) && ( $this->Send['CarruerType'] != CarruerType::Member ) && ( $this->Send['CarruerType'] != CarruerType::Citizen ) && ( $this->Send['CarruerType'] != CarruerType::Cellphone ) )
			{
				array_push($arErrors, "15:Invalid CarruerType.");
			}
			else
			{
				// *統一編號不為空字串時，則載具類別不可為會載具或自然人憑證載具
				if (strlen($this->Send['CustomerIdentifier']) > 0)
				{
					if ($this->Send['CarruerType'] == CarruerType::Member || $this->Send['CarruerType'] == CarruerType::Citizen )
					{
                          			array_push($arErrors, "15:Invalid CarruerType.");
                      			}		
				}
			}
              
			// 16.載具編號 CarruerNum(預設為空字串)
			switch ($this->Send['CarruerType'])
			{
              			// *載具類別為無載具(None)或會員載具(Member)時，請設定空字串
              			case CarruerType::None:
              			case CarruerType::Member:
					if (strlen($this->Send['CarruerNum']) > 0)
					{
                      				array_push($arErrors, "16:Please remove CarruerNum.");
                  			}
                 		 break;
                 		 
				// *載具類別為買受人自然人憑證(Citizen)時，請設定自然人憑證號碼，前2碼為大小寫英文，後14碼為數字
				case CarruerType::Citizen:
					if ( !preg_match('/^[a-zA-Z]{2}\d{14}$/', $this->Send['CarruerNum']) )
                  			{
                      				array_push($arErrors, "16:Invalid CarruerNum.");
	                          	}
				break;
              
              			// *載具類別為買受人手機條碼(Cellphone)時，請設定手機條碼，第1碼為「/」，後7碼為大小寫英文、數字、「+」、「-」或「.」
              			case CarruerType::Cellphone:
					if ( !preg_match('/^\/{1}[0-9a-zA-Z+-.]{7}$/', $this->Send['CarruerNum']) )
					{
						array_push($arErrors, "16:Invalid CarruerNum.");
					}
				break;
				default:
					array_push($arErrors, "16:Please remove CarruerNum.");
			}
			
			// 17.課稅類別 TaxType(不可為空)
			
			// *不可為空
			if (strlen($this->Send['TaxType']) == 0)
			{
				array_push($arErrors, "17:TaxType is required.");
			}
			// *僅能為 1應稅 2零稅率 3免稅 9.應稅與免稅混合
			if ( ( $this->Send['TaxType'] != TaxType::Dutiable ) && ( $this->Send['TaxType'] != TaxType::Zero ) && ( $this->Send['TaxType'] != TaxType::Free ) && ( $this->Send['TaxType'] != TaxType::Mix ) )
			{
				array_push($arErrors, "17:Invalid TaxType.");
			}
			
			
			// 18.發票金額 SalesAmount
			
			// *不可為空
			if (strlen($this->Send['SalesAmount']) == 0)
			{
				array_push($arErrors, "18:SalesAmount is required.");
			}
			
			// 19.備註 InvoiceRemark
			
			// *請將參數值做UrlEncode
			if (strlen($this->Send['InvoiceRemark']) != 0)
			{
				// *UrlEncode
	        		$this->Send['InvoiceRemark'] = urlencode($this->Send['InvoiceRemark']);
	        		$this->Send['InvoiceRemark'] = $this->Replace_Symbol($this->Send['InvoiceRemark']) ;
			}
		}
		
		// 檢查 A.一般開立發票、B.延遲觸發開立發票、C.開立折讓
	        if( $this->Invoice_Method == InvoiceMethod::INVOICE || $this->Invoice_Method == InvoiceMethod::INVOICE_DELAY || $this->Invoice_Method == InvoiceMethod::ALLOWANCE )
	        {	
			// 20.21.22.23.24.25. 商品資訊

			// *不可為空
			if (sizeof($this->Send['Items']) == 0)
			{
				array_push($arErrors, '20-25:Items is required.');
		        }
		        else
		        {
		        	// 檢查是否存在保留字元 '|'
		        	$bFind_Tag 		= true;
		        	$bError_Tag 		= false;
		        	
		        	foreach($this->Send['Items'] as $key => $value)
		        	{
		        		$bFind_Tag = strpos($value['ItemName'], '|') ;
		        		if($bFind_Tag != false || empty($value['ItemName']))
		        		{
		        			$bError_Tag = true ;
		        			array_push($arErrors, '20-25:Invalid ItemName.');
		        			break;	
		        		}
		        		
		        		$bFind_Tag = strpos($value['ItemCount'], '|') ;
		        		if($bFind_Tag != false || empty($value['ItemCount']))
		        		{
		        			$bError_Tag = true ;
		        			array_push($arErrors, '20-25:Invalid ItemCount.');
		        			break;	
		        		}
		        		
		        		$bFind_Tag = strpos($value['ItemWord'], '|') ;
		        		if($bFind_Tag != false || empty($value['ItemWord']))
		        		{
		        			$bError_Tag = true ;
		        			array_push($arErrors, '20-25:Invalid ItemWord.');
		        			break;	
		        		}
		        		
		        		$bFind_Tag = strpos($value['ItemPrice'], '|') ;
		        		if($bFind_Tag != false || empty($value['ItemPrice']))
		        		{
		        			$bError_Tag = true ;
		        			array_push($arErrors, '20-25:Invalid ItemPrice.');
		        			break;	
		        		}
		        		
		        		$bFind_Tag = strpos($value['ItemTaxType'], '|') ;
		        		if($bFind_Tag != false || empty($value['ItemTaxType']))
		        		{
		        			$bError_Tag = true ;
		        			array_push($arErrors, '20-25:Invalid ItemTaxType.');
		        			break;	
		        		}
		        		
		        		$bFind_Tag = strpos($value['ItemAmount'], '|') ;
		        		if($bFind_Tag != false || empty($value['ItemAmount']))
		        		{
		        			$bError_Tag = true ;
		        			array_push($arErrors, '20-25:Invalid ItemAmount.');
		        			break;	
		        		}
		        	}
		        	
		        	// 檢查商品格式
		        	if(!$bError_Tag)
		        	{
		        		foreach($this->Send['Items'] as $key => $value)
		        		{
		        			// *ItemCount數字判斷
		        			if ( !preg_match('/^[0-9]*$/', $value['ItemCount']) )
		        			{
		        				array_push($arErrors, '20-25:Invalid ItemCount.');
		        			}
		        			
		        			// *ItemWord 預設最大長度為6碼
		        			if (strlen($value['ItemWord']) > 6 )
						{
							array_push($arErrors, '20-25:ItemWord max length as 6.');
						}
						
						// *ItemPrice數字判斷
		        			if ( !preg_match('/^[0-9]*$/', $value['ItemPrice']) )
		        			{
		        				array_push($arErrors, '20-25:Invalid ItemPrice.');
		        			}
		        			
		        			// *ItemAmount數字判斷
		        			if ( !preg_match('/^[0-9]*$/', $value['ItemAmount']) )
		        			{
		        				array_push($arErrors, '20-25:Invalid ItemAmount.');
		        			}	
		        		}	
		        	}
		        }
		}
		
		// 檢查 A.一般開立發票、B.延遲觸發開立發票
	        if( $this->Invoice_Method == InvoiceMethod::INVOICE || $this->Invoice_Method == InvoiceMethod::INVOICE_DELAY )
	        {        
			// 27.字軌類別 
			
			// *InvType(不可為空) 僅能為 07 或 08 狀態
			if( ( $this->Send['InvType'] != InvType::General ) && ( $this->Send['InvType'] != InvType::Special ) )
			{
				array_push($arErrors, "27:Invalid InvType.");
			}
	        }
	        
	        // 檢查 A.一般開立發票
		if( $this->Invoice_Method == InvoiceMethod::INVOICE )
	        {
	        	// 28.發票開立時間

	        	// *UrlEncode
	        	$this->Send['InvCreateDate'] = urlencode($this->Send['InvCreateDate']);
	        	$this->Send['InvCreateDate'] = $this->Replace_Symbol($this->Send['InvCreateDate']) ;	

	        	// 29.商品單價是否含稅(預設為含稅價)

			// *固定給定下述預設值 若為含稅價，則VAL = '1'
			if(!empty($this->Send['vat']))
			{
				if( ( $this->Send['vat'] != VatType::Yes ) && ( $this->Send['vat'] != VatType::No ) )
				{
					array_push($arErrors, "29:Invalid VatType.");
				}	
			}
	        }
	        
	        
		// 檢查 B.延遲觸發開立發票
	        if( $this->Invoice_Method == InvoiceMethod::INVOICE_DELAY )
	        {
	        	// 30.延遲註記 DelayFlag
			if( ( $this->Send['DelayFlag'] != DelayFlagType::Delay ) && ( $this->Send['DelayFlag'] != DelayFlagType::Trigger ) )
			{
				array_push($arErrors, "30:Invalid DelayFlagType.");
			}
			
			// 31.延遲天數 DelayDay
			// 延遲天數，範圍0~15，設定為0時，付款完成後立即開立發票
			
			// *DelayDay(不可為空, 預設為0)
			$this->Send['DelayDay'] = (int)$this->Send['DelayDay'];
			// *若為延遲開立時，延遲天數須介於1至15天內
			if ( $this->Send['DelayFlag'] == DelayFlagType::Delay )
			{
				if ($this->Send['DelayDay'] < 1 || $this->Send['DelayDay'] > 15)
				{
					array_push($arErrors, "31:DelayDay should be 1 ~ 15.");
				}
			}
			// *若為觸發開立時，延遲天數須介於0至15天內
			if ($this->Send['DelayFlag'] == DelayFlagType::Trigger)
			{
				if ($this->Send['DelayDay'] < 0 || $this->Send['DelayDay'] > 15)
				{
					array_push($arErrors, "31:DelayDay should be 0 ~ 15.");
				}
			}
		}
		
		// 檢查 B.延遲觸發開立發票、K.付款完成觸發或延遲開立發票
	        if( $this->Invoice_Method == InvoiceMethod::INVOICE_DELAY || $this->Invoice_Method == InvoiceMethod::INVOICE_TRIGGER)
	        {	
			// 33.交易單號 Tsr
			
			// *必填項目
			if(strlen($this->Send['Tsr']) == 0 )
	        	{
	        		array_push($arErrors, '33:Tsr is required.');
	        	}
		        
		        // *判斷最大字元是否超過30字
			if (strlen($this->Send['Tsr']) > 30)
			{
      				array_push($arErrors, '33:Tsr max length as 30.');
  			}
			
			// 34.交易類別 PayType
			
			// *僅允許 1.ECBANK 2.ECPAY 3.ALLPAY 
			if( ( $this->Send['PayType'] != PayTypeCategory::Ecbank ) && ( $this->Send['PayType'] != PayTypeCategory::Ecpay ) && ( $this->Send['PayType'] != PayTypeCategory::Allpay ) )
			{
				array_push($arErrors, "34:Invalid PayType.");
			}
		}
		
		// 檢查 B.延遲觸發開立發票
	        if( $this->Invoice_Method == InvoiceMethod::INVOICE_DELAY )
	        {	
			// 35.交易類別名稱 PayAct
			
			// *固定給定下述預設值
			switch ($this->Send['PayType'])
			{
              			// *若交易類別='1'時，則VAL = 'ECBANK'
              			case PayTypeCategory::Ecbank:
					$this->Send['PayAct'] = 'ECBANK' ;
				break;
                 		 
				// *若交易類別='2'時，則VAL = 'ECPAY'
              			case PayTypeCategory::Ecpay:
					$this->Send['PayAct'] = 'ECPAY' ;
				break;
              
              			// *若交易類別='3'時，則VAL = 'ALLPAY'
              			case PayTypeCategory::Allpay:
					$this->Send['PayAct'] = 'ALLPAY' ;
				break;
				
				default:
					$this->Send['PayAct'] = '' ;
			}
			
			// *必填項目 交易類別名稱預設不能為空值
			if(strlen($this->Send['PayAct']) == 0 )
	        	{
	        		array_push($arErrors, '35:PayAct is required.');
	        	}
	        }
        
	        // 檢查 C.開立折讓、E.折讓作廢、H.查詢折讓明細、I.查詢折讓作廢明細、J.發送通知
	        if( $this->Invoice_Method == InvoiceMethod::ALLOWANCE || $this->Invoice_Method == InvoiceMethod::ALLOWANCE_VOID || $this->Invoice_Method == InvoiceMethod::ALLOWANCE_SEARCH || $this->Invoice_Method == InvoiceMethod::ALLOWANCE_VOID_SEARCH || $this->Invoice_Method == InvoiceMethod::INVOICE_NOTIFY )
	        {
	        	// 37.發票號碼 InvoiceNo
	        	
	        	// *必填項目
	        	if(strlen($this->Send['InvoiceNo']) == 0 )
	        	{
	        		array_push($arErrors, '37:InvoiceNo is required.');
	        	}
	        	  // *預設長度固定10碼
			if (strlen($this->Send['InvoiceNo']) != 10)
			{
      				array_push($arErrors, '37:InvoiceNo length as 10.');
  			}
	        }
	        
	        // 檢查 C.開立折讓
	        if( $this->Invoice_Method == InvoiceMethod::ALLOWANCE )
	        {	
	        	// 38.通知類別 AllowanceNotify
	        	
	        	// *固定給定下述預設值
	        	if( ( $this->Send['AllowanceNotify'] != AllowanceNotifyType::Sms ) && ( $this->Send['AllowanceNotify'] != AllowanceNotifyType::Email ) && ( $this->Send['AllowanceNotify'] != AllowanceNotifyType::All ) && ( $this->Send['AllowanceNotify'] != AllowanceNotifyType::None ) )
			{
				array_push($arErrors, "38:Invalid AllowanceNotifyType.");
			}

			// 39.通知電子信箱 NotifyMail
			
			// *若客戶電子信箱有值時，則格式僅能為Email的標準格式
			if(strlen($this->Send['NotifyMail']) > 0 )
	        	{
	        		if ( !preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-_]+\.([a-z0-9\-_]+\.)*?[a-z]+$/is', $this->Send['NotifyMail'] ) )
	        		{
	        			array_push($arErrors, '39:Invalid Email Format.');
	        		}
	        	}
	        	// *下述情況通知電子信箱不可為空值(通知類別為E-電子郵件)
	        	if($this->Send['AllowanceNotify'] == AllowanceNotifyType::Email && strlen($this->Send['NotifyMail']) == 0 )
	        	{
	        		array_push($arErrors, "39:NotifyMail is required.");
	        	}
			// *UrlEncode
	        	$this->Send['NotifyMail'] = urlencode($this->Send['NotifyMail']);
	        	$this->Send['NotifyMail'] = $this->Replace_Symbol($this->Send['NotifyMail']) ;	
	        	
			// 40.通知手機號碼 NotifyPhone
			
			// *若客戶手機號碼有值時，則預設格式為數字組成
			if(strlen($this->Send['NotifyPhone']) > 0 )
	        	{
	        		if ( !preg_match('/^[0-9]*$/', $this->Send['NotifyPhone']) )
	        		{
	        			array_push($arErrors, '40:Invalid NotifyPhone.');
	        		}
	        	}
	        	// * 最大20字元
	        	if (strlen($this->Send['NotifyPhone']) > 20)
			{
      				array_push($arErrors, '40:NotifyPhone max length as 20.');
  			}
	        	// *下述情況通知手機號碼不可為空值(通知類別為S-簡訊)
	        	if( $this->Send['AllowanceNotify'] == AllowanceNotifyType::Sms && strlen($this->Send['NotifyPhone']) == 0 )
	        	{
	        		array_push($arErrors, "40:NotifyPhone is required.");
	        	}
	        	
	        	// 39-40 通知電子信箱、通知手機號碼不能全為空值 (如果狀態為SMS 或 EMAIL)
	        	if(strlen($this->Send['NotifyPhone']) == 0 && strlen($this->Send['NotifyMail']) == 0 && ( $this->Send['AllowanceNotify'] == AllowanceNotifyType::Sms || $this->Send['AllowanceNotify'] == AllowanceNotifyType::Email ) )
	        	{
	        		array_push($arErrors, "39-40:NotifyMail or NotifyPhone is required.");
	        	}
	        	else
	        	{
		        	// *下述情況通知手機號碼與電子信箱不可為空值(通知類別為A-皆通知)
		        	if( $this->Send['AllowanceNotify'] == AllowanceNotifyType::All && ( strlen($this->Send['NotifyMail']) == 0 || strlen($this->Send['NotifyPhone']) == 0 ) )
		        	{
		        		array_push($arErrors, "39-40:NotifyMail And NotifyPhone is required.");
		        	}
		        	
		        	// *下述情況通知手機號碼與電子信箱為空值(通知類別為N-皆不通知)
		        	if($this->Send['AllowanceNotify'] == AllowanceNotifyType::None && ( strlen($this->Send['NotifyMail']) > 0 || strlen($this->Send['NotifyPhone']) > 0 ))
		        	{
		        		array_push($arErrors, "39-40:Please remove NotifyMail And NotifyPhone.");
		        	}
		        }
		        
		     
	        	
	        	// 41.折讓單總金額 AllowanceAmount
	        	
	        	// *必填項目
	        	if(strlen($this->Send['AllowanceAmount']) == 0)
	        	{
	        		array_push($arErrors, "41:AllowanceAmount is required.");
	        	}
	        	else
	        	{
	        		// *含稅總金額
	        		$this->Send['AllowanceAmount'] = (int) $this->Send['AllowanceAmount'] ;	
	        	}
		}
		
		
		// 檢查 D.發票作廢
	        if( $this->Invoice_Method == InvoiceMethod::INVOICE_VOID )
	        {
	        	// 42.發票號碼 InvoiceNumber 
	        	
	        	// *必填項目
	        	if(strlen($this->Send['InvoiceNumber']) == 0)
	        	{
	        		array_push($arErrors, "42:InvoiceNumber is required.");
	        	}
	        	// *預設長度固定10碼
	        	if(strlen($this->Send['InvoiceNumber']) != 10)
	        	{
	        		array_push($arErrors, '42:InvoiceNumber length as 10.');
	        	}
	        }
	        
	        // 檢查 D.發票作廢、折讓作廢
	        if( $this->Invoice_Method == InvoiceMethod::INVOICE_VOID || $this->Invoice_Method == InvoiceMethod::ALLOWANCE_VOID )
	        {
			// 43.作廢原因 Reason
			
			// *必填欄位
			if(strlen($this->Send['Reason']) == 0)
	        	{
	        		array_push($arErrors, "43:Reason is required.");
	        	}
			// *字數限制在20(含)個字以內
			if(strlen($this->Send['Reason']) > 20)
	        	{
	        		array_push($arErrors, "43:Reason max length as 20.");
	        	}
	        	// *urlencode
	        	$this->Send['Reason'] = urlencode($this->Send['Reason']);
			$this->Send['Reason'] = $this->Replace_Symbol($this->Send['Reason']) ;	
		}
		
		// 檢查 E.折讓作廢、H.查詢折讓明細 I.查詢折讓作廢明細、J.發送通知
	        if( $this->Invoice_Method == InvoiceMethod::ALLOWANCE_VOID || $this->Invoice_Method == InvoiceMethod::ALLOWANCE_SEARCH || $this->Invoice_Method == InvoiceMethod::ALLOWANCE_VOID_SEARCH || $this->Invoice_Method == InvoiceMethod::INVOICE_NOTIFY )
	        {
			// 44.折讓編號 AllowanceNo
			
			// *除了J.發送通知非必填不須判斷其他項目都要
			if( $this->Invoice_Method != InvoiceMethod::INVOICE_NOTIFY )
			{
				if(strlen($this->Send['AllowanceNo']) == 0)
		        	{
		        		array_push($arErrors, "44:AllowanceNo is required.");
		        	}
			}
			// *若有值長度固定16字元
			if(strlen($this->Send['AllowanceNo']) != 0 && strlen($this->Send['AllowanceNo']) != 16 )
	        	{
	        		array_push($arErrors, '44:AllowanceNo length as 16.');
	        	}
		}
		
		// 檢查J.發送通知
	        if( $this->Invoice_Method == InvoiceMethod::INVOICE_NOTIFY )
	        {
			// 45.NotifyMail 發送電子信箱 
			
			// *若客戶電子信箱有值時，則格式僅能為Email的標準格式
			if(strlen($this->Send['NotifyMail']) > 0 )
	        	{
	        		if ( !preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-_]+\.([a-z0-9\-_]+\.)*?[a-z]+$/is', $this->Send['NotifyMail']) )
	        		{
	        			array_push($arErrors, '45:Invalid Email Format.');
	        		}
	        	}
	        	// *下述情況通知電子信箱不可為空值(發送方式為E-電子郵件)
	        	if( $this->Send['Notify'] == NotifyType::Email && strlen($this->Send['NotifyMail']) == 0 )
	        	{
	        		array_push($arErrors, "39:NotifyMail is required.");
	        	}
			// *UrlEncode
	        	$this->Send['NotifyMail'] = urlencode($this->Send['NotifyMail']);
	        	$this->Send['NotifyMail'] = $this->Replace_Symbol($this->Send['NotifyMail']) ;	
	        	
			// 46.通知手機號碼 NotifyPhone
			
			// *若客戶手機號碼有值時，則預設格式為數字組成
			if(strlen($this->Send['Phone']) > 0 )
	        	{
	        		if ( !preg_match('/^[0-9]*$/', $this->Send['Phone']) )
	        		{
	        			array_push($arErrors, '46:Invalid Phone.');
	        		}
	        	}
	        	// *最大長度為20碼
	        	if(strlen($this->Send['Phone']) > 20 )
	        	{
	        		array_push($arErrors, "46:Phone max length as 20.");
	        	}
	        	// *下述情況通知手機號碼不可為空值(發送方式為S-簡訊)
	        	if( $this->Send['Notify'] == NotifyType::Sms && strlen($this->Send['Phone']) == 0 )
	        	{
	        		array_push($arErrors, "46:Phone is required.");
	        	}
	        	
	        	// 45-46 發送簡訊號碼、發送電子信箱不能全為空值
	        	if(strlen($this->Send['Phone']) == 0 && strlen($this->Send['NotifyMail']) == 0)
	        	{
	        		array_push($arErrors, "45-46:NotifyMail or Phone is required.");
	        	}
	        	else
	        	{
	        		if( $this->Send['Notify'] == NotifyType::All && ( strlen($this->Send['NotifyMail']) == 0 || strlen($this->Send['Phone']) == 0 ) )
	        		{
	        			array_push($arErrors, "45-46:NotifyMail and Phone is required.");
	        		}
	        	}
	        	// 47. 發送方式 Notify
	        	
	        	// *固定給定下述預設值
	        	if( ($this->Send['Notify'] != NotifyType::Sms ) && ( $this->Send['Notify'] != NotifyType::Email ) && ( $this->Send['Notify'] != NotifyType::All ) )
	        	{
	        		array_push($arErrors, "47:Notify is required.");
	        	}
	        	
			// 48.發送內容類型 InvoiceTag
			
			// *固定給定下述預設值
			if( ( $this->Send['InvoiceTag'] != InvoiceTagType::Invoice ) && ( $this->Send['InvoiceTag'] != InvoiceTagType::Invoice_Void ) && ( $this->Send['InvoiceTag'] != InvoiceTagType::Allowance ) && ( $this->Send['InvoiceTag'] != InvoiceTagType::Allowance_Void ) && ( $this->Send['InvoiceTag'] != InvoiceTagType::Invoice_Winning ) )
	        	{
	        		array_push($arErrors, "48:InvoiceTag is required.");
	        	}
			
			// 49.發送對象 Notified
			
			// *固定給定下述預設值
			if( ( $this->Send['Notified'] != NotifiedType::Customer ) && ( $this->Send['Notified'] != NotifiedType::vendor ) && ( $this->Send['Notified'] != NotifiedType::All ) )
	        	{
	        		array_push($arErrors, "49:Notified is required.");
	        	}
		}

		return $arErrors ;	
    	}
    	
    	/**
	* 產生檢查碼
	* 傳入	$arParameters	各參數
	* 傳出	$sMacValue	檢查碼
	*/
	function GenerateCheckMacValue($arParameters)
	{
		$sMacValue = '' ;
		
		if(isset($arParameters))
		{
			// 資料排序
			// php 5.3以下不支援
			// ksort($arParameters, SORT_NATURAL | SORT_FLAG_CASE);
			uksort($arParameters, array('AllInvoice','merchantSort'));

			// 開始組合字串
			$sMacValue = 'HashKey=' . $this->HashKey ;
			foreach($arParameters as $key => $value)
			{
				$sMacValue .= '&' . $key . '=' . $value ;
			}
			
			$sMacValue .= '&HashIV=' . $this->HashIV ;	
			
			// URL Encode編碼		
			$sMacValue = urlencode($sMacValue);	
			
			// 轉成小寫
			$sMacValue = strtolower($sMacValue);		
			
			// 取代為與 dotNet 相符的字元
			$sMacValue = str_replace('%2d', '-', $sMacValue);
			$sMacValue = str_replace('%5f', '_', $sMacValue);
			$sMacValue = str_replace('%2e', '.', $sMacValue);
			$sMacValue = str_replace('%21', '!', $sMacValue);
			$sMacValue = str_replace('%2a', '*', $sMacValue);
			$sMacValue = str_replace('%28', '(', $sMacValue);
			$sMacValue = str_replace('%29', ')', $sMacValue);
								
			// MD5編碼
			$sMacValue = md5($sMacValue);
			$sMacValue = strtoupper($sMacValue);
		}
		
		return $sMacValue ;

	}

	/**
	* 參數內特殊字元取代
	* 傳入	$sParameters	參數
	* 傳出	$sReturn_Info	回傳取代後變數
	*/
	function Replace_Symbol($sParameters)
	{
		if(!empty($sParameters))
		{
			$sParameters = str_replace('%2D', '-', $sParameters);
			$sParameters = str_replace('%2d', '-', $sParameters);
			$sParameters = str_replace('%5F', '_', $sParameters);
			$sParameters = str_replace('%5f', '_', $sParameters);
			$sParameters = str_replace('%2E', '.', $sParameters);
			$sParameters = str_replace('%2e', '.', $sParameters);
			$sParameters = str_replace('%21', '!', $sParameters);
			$sParameters = str_replace('%2A', '*', $sParameters);
			$sParameters = str_replace('%2a', '*', $sParameters);
			$sParameters = str_replace('%28', '(', $sParameters);
			$sParameters = str_replace('%29', ')', $sParameters);
		}
		return $sParameters ;
	}
	
	/**
	* 自訂排序使用
	*/
	private static function merchantSort($a,$b)
	{
		return strcasecmp($a, $b);
	}
	
	/**
	* 幕後送出參數
	* 傳入	$aSend_Info	送出參數
	* 傳出	$aReturn_Info	回傳參數
	*/
	private function ServerPost($aSend_Info)
	{
		// 變數宣告
		$sSend_Info 		= '' ;
		$sReturn_Info		= '' ;
		$aReturn_Info		= array() ;
		
		// 組合字串
		foreach($aSend_Info as $key => $value)
		{
			if( $sSend_Info == '')
			{
				$sSend_Info .= $key . '=' . $value ;
			}
			else
			{
				$sSend_Info .= '&' . $key . '=' . $value ;
			}
		}
		
		// 送出參數
		$ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, $this->Invoice_Url);
	        curl_setopt($ch, CURLOPT_HEADER, FALSE);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	        curl_setopt($ch, CURLOPT_POST, TRUE);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $sSend_Info);
		
		// 回傳參數       
	        $sReturn_Info = curl_exec($ch);
		curl_close($ch);
	
		// 轉結果為陣列。
		parse_str($sReturn_Info, $aReturn_Info);
		 	
		return $aReturn_Info;

	}	 	
}

?>