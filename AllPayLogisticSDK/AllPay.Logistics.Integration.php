<?php

	/**
	 * allPay Logistics integration
	 *
	 * @version 1.0
	 * @author  Shawn.Chang
	 */
  
  // 物流類型
	abstract class LogisticsType {		
		const CVS = 'CVS';// 超商取貨
		const HOME = 'Home';// 宅配
	}
	
  // 物流子類型
	abstract class LogisticsSubType {			
		const TCAT = 'TCAT';// 黑貓(宅配)
		const FAMILY = 'FAMI';// 全家
		const UNIMART = 'UNIMART';// 統一超商
		const FAMILY_C2C = 'FAMIC2C';// 全家店到店
		const UNIMART_C2C = 'UNIMARTC2C';// 統一超商寄貨便
	}
	
  // 是否代收貨款
	abstract class IsCollection {
		const YES = 'Y';// 貨到付款
		const NO = 'N';// 僅配送
	}
	
  // 使用設備
	abstract class Device {
		const PC = 0;// PC
		const MOBILE = 1;// 行動裝置
	}
	
  // 歐付寶測試廠商編號
	abstract class AllpayTestMerchantID {
		const B2C = '2000132';// B2C
		const C2C = '2000933';// C2C
	}
	
  // 歐付寶正式環境網址
	abstract class AllpayURL {
		const CVS_MAP = 'https://logistics.allpay.com.tw/Express/map';// 電子地圖
		const SHIPPING_ORDER = 'https://logistics.allpay.com.tw/Express/Create';// 物流訂單建立
		const HOME_RETURN_ORDER = 'https://logistics.allpay.com.tw/Express/ReturnHome';// 宅配逆物流訂單
		const FAMILY_RETURN_ORDER = 'https://logistics.allpay.com.tw/express/ReturnCVS';// 超商取貨逆物流訂單(全家超商B2C)
		const FAMILY_RETURN_CHECK = 'https://logistics.allpay.com.tw/Helper/LogisticsCheckAccoounts';// 全家逆物流核帳(全家超商B2C)
		const UNIMART_UPDATE_LOGISTICS_INFO = 'https://logistics.allpay.com.tw/Helper/UpdateShipmentInfo';// 統一修改物流資訊(全家超商B2C)
		const UNIMART_UPDATE_STORE_INFO = 'https://logistics.allpay.com.tw/Express/UpdateStoreInfo';// 更新門市(統一超商C2C)
		const UNIMART_CANCEL_LOGISTICS_ORDER = 'https://logistics.allpay.com.tw/Express/CancelC2COrder';// 取消訂單(統一超商C2C)
		const QUERY_LOGISTICS_INFO = 'https://logistics.allpay.com.tw/Helper/QueryLogisticsTradeInfo';// 物流訂單查詢
		const PRINT_TRADE_DOC = 'https://logistics.allpay.com.tw/helper/printTradeDocument';// 產生托運單(宅配)/一段標(超商取貨)
		const PRINT_UNIMART_C2C_BILL = 'https://logistics.allpay.com.tw/Express/PrintUniMartC2COrderInfo';// 列印繳款單(統一超商C2C)
		const PRINT_FAMILY_C2C_BILL = 'https://logistics.allpay.com.tw/Express/PrintFAMIC2COrderInfo';// 全家列印小白單(全家超商C2C)
	}
	
  // 歐付寶正式測試環境網址
	abstract class AllpayTestURL {
		const CVS_MAP = 'http://logistics-stage.allpay.com.tw/Express/map';// 電子地圖
		const SHIPPING_ORDER = 'http://logistics-stage.allpay.com.tw/Express/Create';// 物流訂單建立
		const HOME_RETURN_ORDER = 'http://logistics-stage.allpay.com.tw/Express/ReturnHome';// 宅配逆物流訂單
		const FAMILY_RETURN_ORDER = 'http://logistics-stage.allpay.com.tw/express/ReturnCVS';// 超商取貨逆物流訂單(全家超商B2C)
		const FAMILY_RETURN_CHECK = 'http://logistics-stage.allpay.com.tw/Helper/LogisticsCheckAccoounts';// 全家逆物流核帳(全家超商B2C)
		const UNIMART_UPDATE_LOGISTICS_INFO = 'http://logistics-stage.allpay.com.tw/Helper/UpdateShipmentInfo';// 統一修改物流資訊(全家超商B2C)
		const UNIMART_UPDATE_STORE_INFO = 'http://logistics-stage.allpay.com.tw/Express/UpdateStoreInfo';// 更新門市(統一超商C2C)
		const UNIMART_CANCEL_LOGISTICS_ORDER = 'http://logistics-stage.allpay.com.tw/Express/CancelC2COrder';// 取消訂單(統一超商C2C)
		const QUERY_LOGISTICS_INFO = 'http://logistics-stage.allpay.com.tw/Helper/QueryLogisticsTradeInfo';// 物流訂單查詢
		const PRINT_TRADE_DOC = 'http://logistics-stage.allpay.com.tw/helper/printTradeDocument';// 產生托運單(宅配)/一段標(超商取貨)
		const PRINT_UNIMART_C2C_BILL = 'http://logistics-stage.allpay.com.tw/Express/PrintUniMartC2COrderInfo';// 列印繳款單(統一超商C2C)
		const PRINT_FAMILY_C2C_BILL = 'http://logistics-stage.allpay.com.tw/Express/PrintFAMIC2COrderInfo';// 全家列印小白單(全家超商C2C)
	}
	
  // 溫層
	abstract class Temperature {
		const ROOM = '0001';// 常溫
		const REFRIGERATION = '0002';// 冷藏
		const FREEZE = '0003';// 冷凍
	}
	
  // 距離
	abstract class Distance {
		const SAME = '01';// 同縣市
		const OTHER = '02';// 外縣市
		const ISLAND = '03';// 離島
	}
	
  // 規格
	abstract class Specification {
		const CM_60 = '0001';// 60cm
		const CM_90 = '0002';// 90cm
		const CM_120 = '0003';// 120cm
		const CM_150 = '0004';// 150cm
	}
	
  // 預計取件時段
	abstract class ScheduledPickupTime {
		const TIME_9_12 = '1';// 9~12時
		const TIME_12_17 = '2';// 12~17時
		const TIME_17_20 = '3';// 17~20時
		const UNLIMITED = '4';// 不限時
	}
	
  // 預定送達時段
	abstract class ScheduledDeliveryTime {
		const TIME_9_12 = '1';// 9~12時
		const TIME_12_17 = '2';// 12~17時
		const TIME_17_20 = '3';// 17~20時
		const UNLIMITED = '4';// 不限時
		const TIME_20_21 = '5';// 20~21時(需限定區域)
	}
	
  // 門市類型
	abstract class StoreType {
		const RECIVE_STORE = '01';// 取件門市
		const RETURN_STORE = '02';// 退件門市
	}
	
	class AllpayLogistics {
		
		public $ServiceURL = '';
		public $HashKey = '';
		public $HashIV = '';
		public $Send = '';
		public $SendExtend = '';
		public $PostParameters = '';
		public $Error = '';
		public $Encode = 'UTF-8';
		
		public function __construct() {
			
			$this->Send = array();
			$this->Error = array();
			$this->PostParams = array();
		}
		
		// 電子地圖
		public function CvsMap($ButtonDesc = '電子地圖', $Target = '_self') {
			
			// 參數初始化
			$ParamList = array(
				'MerchantID' => '',
				'MerchantTradeNo' => '',
				'LogisticsSubType' => '',
				'IsCollection' => '',
				'ServerReplyURL' => '',
				'ExtraData' => '',
				'Device' => Device::PC
			);
			$this->PostParams = $this->GetPostParams($this->Send, $ParamList);
			$this->PostParams['LogisticsType'] = LogisticsType::CVS;
			
			// 參數檢查
			$this->ValidateID('MerchantID', $this->PostParams['MerchantID'], 10);
			$this->ServiceURL = $this->GetURL('CVS_MAP');
			$this->ValidateMerchantTradeNo();
			$this->ValidateLogisticsSubType();
			$this->ValidateIsCollection();
			$this->ValidateURL('ServerReplyURL', $this->PostParams['ServerReplyURL']);
			$this->ValidateString('ExtraData', $this->PostParams['ExtraData'], 20, true);
			$this->ValidateDevice(true);
			
			return $this->GenPostHTML($ButtonDesc, $Target);
		}
		
		// 物流訂單建立
		public function CreateShippingOrder($ButtonDesc = '物流訂單建立', $Target = '_self') {
      
			// 參數初始化
			$ParamList = array(
				'MerchantID' => '',
				'MerchantTradeNo' => '',
				'MerchantTradeDate' => '',
				'LogisticsType' => '',
				'LogisticsSubType' => '',
				'GoodsAmount' => 0,
				'CollectionAmount' => 0,
				'IsCollection' => IsCollection::NO,
				'GoodsName' => '',
				'SenderName' => '',
				'SenderPhone' => '',
				'SenderCellPhone' => '',
				'ReceiverName' => '',
				'ReceiverPhone' => '',
				'ReceiverCellPhone' => '',
				'ReceiverEmail' => '',
				'TradeDesc' => '',
				'ServerReplyURL' => '',
				'ClientReplyURL' => '',
				'LogisticsC2CReplyURL' => '',
				'Remark' => '',
				'PlatformID' => ''
			);
			$this->PostParams = $this->GetPostParams($this->Send, $ParamList);
			
			// 參數檢查
      $this->ValidateHashKey();
      $this->ValidateHashIV();
			$this->ValidateID('MerchantID', $this->PostParams['MerchantID'], 10);
			$this->ServiceURL = $this->GetURL('SHIPPING_ORDER');
			$this->ValidateMerchantTradeNo();
			$this->ValidateMerchantTradeDate();
			$this->ValidateLogisticsType();
			$this->ValidateLogisticsSubType();
			
			// 依不同的物流類型(LogisticsType)設定專屬參數並檢查
			switch ($this->PostParams['LogisticsType']) {
				case LogisticsType::CVS:
					$CvsParamList = array(
						'ReceiverStoreID' => '',
						'ReturnStoreID' => ''
					);
					$this->PostParams = $this->GetPostParams($this->SendExtend, $CvsParamList, $this->PostParams);
				
					$this->ValidateID('ReceiverStoreID', $this->PostParams['ReceiverStoreID'], 6);
					$this->ValidateID('ReturnStoreID', $this->PostParams['ReturnStoreID'], 6, true);
					# 物流子類型(LogisticsSubType)為全家店到店(FAMIC2C)/統一超商交貨便(UNIMARTC2C)，退貨門市代號(ReturnStoreID)不可為空
					break;
				case LogisticsType::HOME:
					$HomeParamList = array(
						'SenderZipCode' => '',
						'SenderAddress' => '',
						'ReceiverZipCode' => '',
						'ReceiverAddress' => '',
						'Temperature' => Temperature::ROOM,
						'Distance' => Distance::SAME,
						'Specification' => Specification::CM_60,
						'ScheduledDeliveryTime' => ''
					);
					$this->PostParams = $this->GetPostParams($this->SendExtend, $HomeParamList, $this->PostParams);
					$this->PostParams['ScheduledPickupTime'] = ScheduledPickupTime::UNLIMITED;
					
					$this->ValidateZipCode('SenderZipCode', $this->PostParams['SenderZipCode']);
					$this->ValidateString('SenderAddress', $this->PostParams['SenderAddress'], 200);
					$this->ValidateZipCode('ReceiverZipCode', $this->PostParams['ReceiverZipCode']);
					$this->ValidateString('ReceiverAddress', $this->PostParams['ReceiverAddress'], 200);
					$this->ValidateTemperature();
					$this->ValidateDistance();
					$this->ValidateSpecification();
					$this->ValidateScheduledDeliveryTime(true);
					break;
				default:
			}
			
			$this->ValidateAmount('GoodsAmount', $this->PostParams['GoodsAmount']);
			// 取得最金額限制
			$MinAmount = 1;
			$MaxAmount = 20000;
			if ($this->PostParams['LogisticsSubType'] == LogisticsSubType::UNIMART_C2C) {
				// 物流子類型(LogisticsSubType)為統一超商交貨便(UNIMARTC2C)時，商品金額範圍為1~19,999元
				$MaxAmount = 19999;
			}
			if ($this->PostParams['GoodsAmount'] < $MinAmount or $this->PostParams['GoodsAmount'] > $MaxAmount){
				throw new Exception('Invalid GoodsAmount.');
			}
			
			$this->ValidateIsCollection(true);
			if ($this->PostParams['IsCollection'] == IsCollection::NO) {
				// 若設定為僅配送，清除代收金額
				unset($this->PostParams['CollectionAmount']);
			} else {
				$this->ValidateAmount('CollectionAmount', $this->PostParams['CollectionAmount']);
				if ($this->PostParams['CollectionAmount'] < $MinAmount or $this->PostParams['CollectionAmount'] > $MaxAmount){
					throw new Exception('Invalid CollectionAmount.');
				}
			}
			
			if ($this->PostParams['LogisticsSubType'] == LogisticsSubType::FAMILY_C2C or $this->PostParams['LogisticsSubType'] == LogisticsSubType::UNIMART_C2C) {
				// 物流子類型(LogisticsSubType)為全家店到店(FAMIC2C)、 統一超商交貨便(UNIMARTC2C)時，不可為空
				$this->ValidateString('GoodsName', $this->PostParams['GoodsName'], 60);
			} else {
				$this->ValidateString('GoodsName', $this->PostParams['GoodsName'], 60, true);
			}
			
			$this->ValidateString('SenderName', $this->PostParams['SenderName'], 10);
			$this->ValidatePhoneNumber('SenderPhone', $this->PostParams['SenderPhone'], true);
			$this->ValidatePhoneNumber('SenderCellPhone', $this->PostParams['SenderCellPhone'], true);
			// 物流類型(LogisticsType)為宅配(Home)時，寄件人電話(SenderPhone)或寄件人手機(SenderCellPhone)不可為空
			if ($this->PostParams['LogisticsType'] == LogisticsType::HOME) {
				if (empty($this->PostParams['SenderPhone']) and empty($this->PostParams['SenderCellPhone'])) {
					throw new Exception('SenderPhone or SenderCellPhone is required when LogisticsType is Home.');
				}
			} else if ($this->PostParams['LogisticsSubType'] == LogisticsSubType::UNIMART_C2C) {
				// 物流子類型(LogisticsSubType)為統一超商交貨便(UNIMARTC2C)時，寄件人手機(SenderCellPhone)不可為空
				if (empty($this->PostParams['SenderCellPhone'])) {
					throw new Exception('SenderCellPhone is required when LogisticsSubType is UNIMARTC2C.');
				}
			}
			
			$this->ValidateString('ReceiverName', $this->PostParams['ReceiverName'], 10);
			$this->ValidatePhoneNumber('ReceiverPhone', $this->PostParams['ReceiverPhone'], true);
			$this->ValidatePhoneNumber('ReceiverCellPhone', $this->PostParams['ReceiverCellPhone'], true);
			// 物流類型(LogisticsType)為宅配(Home)時，收件人電話(ReceiverPhone)或收件人手機(ReceiverCellPhone)不可為空
			if ($this->PostParams['LogisticsType'] == LogisticsType::HOME) {
				if (empty($this->PostParams['ReceiverPhone']) and empty($this->PostParams['ReceiverCellPhone'])) {
					throw new Exception('ReceiverPhone or ReceiverCellPhone is required when LogisticsType is Home.');
				}
			} else if ($this->PostParams['LogisticsSubType'] == LogisticsSubType::UNIMART_C2C) {
				// 物流子類型(LogisticsSubType)為統一超商交貨便(UNIMARTC2C)時，收件人手機(ReceiverCellPhone)不可為空
				if (empty($this->PostParams['ReceiverCellPhone'])) {
					throw new Exception('ReceiverCellPhone is required when LogisticsSubType is UNIMARTC2C.');
				}
			}
			
			$this->ValidateEmail('ReceiverEmail', $this->PostParams['ReceiverEmail'], 100, true);
			$this->ValidateString('TradeDesc', $this->PostParams['TradeDesc'], 200, true);
			$this->ValidateURL('ServerReplyURL', $this->PostParams['ServerReplyURL']);
			$this->ValidateURL('ClientReplyURL', $this->PostParams['ClientReplyURL'], 200, true);
			
			if ($this->PostParams['LogisticsSubType'] == LogisticsSubType::UNIMART_C2C) {
				// 物流子類型(LogisticsSubType)為統一超商交貨便(UNIMARTC2C)時，此欄位不可為空
				$this->ValidateURL('LogisticsC2CReplyURL', $this->PostParams['LogisticsC2CReplyURL']);
			} else {
				$this->ValidateURL('LogisticsC2CReplyURL', $this->PostParams['LogisticsC2CReplyURL'], 200, true);
			}
			
			$this->ValidateString('Remark', $this->PostParams['Remark'], 200, true);
			$this->ValidateID('PlatformID', $this->PostParams['PlatformID'], 10, true);
			
			// 產生 CheckMacValue
			$this->PostParams['CheckMacValue'] = $this->GenCheckMacValue($this->PostParams, $this->HashKey, $this->HashIV);
			
			return $this->GenPostHTML($ButtonDesc, $Target);
		}

		// 回傳 CheckMacValue 檢查
		public function CheckOutFeedback($Feedback = array()) {
			
      $this->ValidateHashKey();
      $this->ValidateHashIV();
			
			if (empty($Feedback)) {
				$Feedback = $_POST;
			}
			
			if (!isset($Feedback['CheckMacValue'])) {
				throw new Exception('Feedback CheckMacValue is required.');
			} else {
				$FeedbackCheckMacValue = $Feedback['CheckMacValue'];
				unset($Feedback['CheckMacValue']);
				$CheckMacValue = $this->GenCheckMacValue($Feedback, $this->HashKey, $this->HashIV);
				if ($CheckMacValue != $FeedbackCheckMacValue) {
					throw new Exception('CheckMacValue verify fail.');
				}
			}
		}
	
		// 宅配逆物流訂單產生
		public function CreateHomeReturnOrder() {
			
			// 參數初始化
			$ParamList = array(
				'MerchantID' => '',
				'AllPayLogisticsID' => '',
				'SenderName' => '',
				'SenderPhone' => '',
				'SenderCellPhone' => '',
				'SenderZipCode' => '',
				'SenderAddress' => '',
				'ReceiverName' => '',
				'ReceiverPhone' => '',
				'ReceiverCellPhone' => '',
				'ReceiverEmail' => '',
				'ReceiverZipCode' => '',
				'ReceiverAddress' => '',
				'ServerReplyURL' => '',
				'PlatformID' => ''
			);
			$this->PostParams = $this->GetPostParams($this->Send, $ParamList);
			
			// 參數檢查
      $this->ValidateHashKey();
      $this->ValidateHashIV();
			$this->ValidateID('MerchantID', $this->PostParams['MerchantID'], 10);
			$this->ServiceURL = $this->GetURL('HOME_RETURN_ORDER');
			$this->ValidateID('AllPayLogisticsID', $this->PostParams['AllPayLogisticsID'], 20);
			$this->ValidateString('SenderName', $this->PostParams['SenderName'], 60, true);
			$this->ValidatePhoneNumber('SenderPhone', $this->PostParams['SenderPhone'], true);
			$this->ValidatePhoneNumber('SenderCellPhone', $this->PostParams['SenderCellPhone'], true);
			$this->ValidateZipCode('SenderZipCode', $this->PostParams['SenderZipCode'], true);
			$this->ValidateString('SenderAddress', $this->PostParams['SenderAddress'], 200, true);
			$this->ValidateString('ReceiverName', $this->PostParams['ReceiverName'], 60, true);
			$this->ValidatePhoneNumber('ReceiverPhone', $this->PostParams['ReceiverPhone'], 20, true);
			$this->ValidatePhoneNumber('ReceiverCellPhone', $this->PostParams['ReceiverCellPhone'], 20, true);
			$this->ValidateString('ReceiverEmail', $this->PostParams['ReceiverEmail'], 100, true);
      $this->ValidateZipCode('ReceiverZipCode', $this->PostParams['ReceiverZipCode'], true);
			$this->ValidateString('ReceiverAddress', $this->PostParams['ReceiverAddress'], 200, true);
			$this->ValidateURL('ServerReplyURL', $this->PostParams['ServerReplyURL']);
			$this->ValidateID('PlatformID', $this->PostParams['PlatformID'], 10, true);
			
			// 產生 CheckMacValue
			$this->PostParams['CheckMacValue'] = $this->GenCheckMacValue($this->PostParams, $this->HashKey, $this->HashIV);
			
			// 解析回傳結果
			$Feedback = $this->ServerPost($this->PostParams, $this->ServiceURL);
			$Result = $this->ParseFeedback($Feedback);
			
			return $Result;
		}
		
		// 超商取貨逆物流訂單(全家超商B2C)
		public function CreateFamilyB2CReturnOrder() {
			
			// 參數初始化
			$ParamList = array(
				'MerchantID' => '',
				'AllPayLogisticsID' => '',
				'ServerReplyURL' => '',
				'GoodsName' => '',
				'GoodsAmount' => 0,
				'SenderName' => '',
				'SenderPhone' => '',
				'Remark' => '',
				'Quantity' => '',
				'Cost' => '',
				'PlatformID' => ''
			);
			$this->PostParams = $this->GetPostParams($this->Send, $ParamList);
			$this->PostParams['CollectionAmount'] = 0;
			$this->PostParams['ServiceType'] = 4;// 退貨不付款
			
			// 參數檢查
      $this->ValidateHashKey();
      $this->ValidateHashIV();
			$this->ValidateID('MerchantID', $this->PostParams['MerchantID'], 10);
			$this->ServiceURL = $this->GetURL('FAMILY_RETURN_ORDER');
			$this->ValidateID('AllPayLogisticsID', $this->PostParams['AllPayLogisticsID'], 20, true);
			$this->ValidateURL('ServerReplyURL', $this->PostParams['ServerReplyURL']);
			$this->ValidateString('GoodsName', $this->PostParams['GoodsName'], 50, true);
			$this->ValidateAmount('GoodsAmount', $this->PostParams['GoodsAmount']);
			$this->ValidateString('SenderName', $this->PostParams['SenderName'], 50);
			$this->ValidatePhoneNumber('SenderPhone', $this->PostParams['SenderPhone'], true);
			$this->ValidateString('Remark', $this->PostParams['Remark'], 20, true);
			$this->ValidateString('Quantity', $this->PostParams['Quantity'], 50, true);
			$this->ValidateString('Cost', $this->PostParams['Cost'], 50, true);
			$this->ValidateID('PlatformID', $this->PostParams['PlatformID'], 10, true);
			
			// 檢查商品名稱, 數量 與 成本
			$GoodsNameNumber = count(explode('#', $this->PostParams['GoodsName']));
			$QuantityNumber = count(explode('#', $this->PostParams['Quantity']));
			$CostNumber = count(explode('#', $this->PostParams['Cost']));
			
			if (!empty($this->PostParams['GoodsName']) and !empty($this->PostParams['Quantity'])) {
				if ($GoodsNameNumber != $QuantityNumber) {
					throw new Exception('GoodsName number and Quantity number do not match.');
				}
			}
			
			if (!empty($this->PostParams['Quantity']) and !empty($this->PostParams['Cost'])) {
				if ($GoodsNameNumber != $CostNumber) {
					throw new Exception('Quantity number and Cost number do not match.');
				}
			}
			
			if (!empty($this->PostParams['Cost']) and !empty($this->PostParams['GoodsName'])) {
				if ($GoodsNameNumber != $CostNumber) {
					throw new Exception('Cost number and GoodsName number do not match.');
				}
			}
			
			// 產生 CheckMacValue
			$this->PostParams['CheckMacValue'] = $this->GenCheckMacValue($this->PostParams, $this->HashKey, $this->HashIV);
			
			// 解析回傳結果
			$Feedback = $this->ServerPost($this->PostParams, $this->ServiceURL);
			$Pieces = explode('|', $Feedback);
			$Result = array('RtnMerchantTradeNo' => '', 'RtnOrderNo' => '');
			if (empty($Pieces[0])) {
				$Result = array('ErrorMessage' => $Pieces[1]);
			} else {
				$Result['RtnMerchantTradeNo'] = $Pieces[0];
				$Result['RtnOrderNo'] = $Pieces[1];
			}
			
			return $Result;
		}
		
		// 全家逆物流核帳(全家超商B2C)
		public function CheckFamilyB2CLogistics() {
			
			// 參數初始化
			$ParamList = array(
				'MerchantID' => '',
				'RtnMerchantTradeNo' => '',
				'PlatformID' => ''
			);
			$this->PostParams = $this->GetPostParams($this->Send, $ParamList);
			
			// 參數檢查
      $this->ValidateHashKey();
      $this->ValidateHashIV();
			$this->ValidateID('MerchantID', $this->PostParams['MerchantID'], 10);
			$this->ServiceURL = $this->GetURL('FAMILY_RETURN_CHECK');
			$this->ValidateID('RtnMerchantTradeNo', $this->PostParams['RtnMerchantTradeNo'], 13);
			$this->ValidateID('PlatformID', $this->PostParams['PlatformID'], 10, true);
			
			// 產生 CheckMacValue
			$this->PostParams['CheckMacValue'] = $this->GenCheckMacValue($this->PostParams, $this->HashKey, $this->HashIV);
			
			// 解析回傳結果
			$Feedback = $this->ServerPost($this->PostParams, $this->ServiceURL);
			$Result = $this->ParseFeedback($Feedback);
			
			return $Result;
		}

		// 廠商修改出貨日期、取貨門市(統一超商B2C)
		public function UpdateUnimartLogisticsInfo() {
			
			// 參數初始化
			$ParamList = array(
				'MerchantID' => '',
				'AllPayLogisticsID' => '',
				'ShipmentDate' => '',
				'ReceiverStoreID' => '',
				'PlatformID' => ''
			);
			$this->PostParams = $this->GetPostParams($this->Send, $ParamList);
			
			// 參數檢查
      $this->ValidateHashKey();
      $this->ValidateHashIV();
			$this->ValidateID('MerchantID', $this->PostParams['MerchantID'], 10);
			$this->ServiceURL = $this->GetURL('UNIMART_UPDATE_LOGISTICS_INFO');
			$this->ValidateID('AllPayLogisticsID', $this->PostParams['AllPayLogisticsID'], 20);
			
			$this->ValidateShipmentDate(true);
			$this->ValidateID('ReceiverStoreID', $this->PostParams['ReceiverStoreID'], 6, true);
			if (empty($this->PostParams['ShipmentDate']) and empty($this->PostParams['ReceiverStoreID'])) {
				throw new Exception('ShipmentDate or ReceiverStoreID is required.');
			}
			
			$this->ValidateID('PlatformID', $this->PostParams['PlatformID'], 10, true);
			
			// 產生 CheckMacValue
			$this->PostParams['CheckMacValue'] = $this->GenCheckMacValue($this->PostParams, $this->HashKey, $this->HashIV);
			
			// 解析回傳結果
			$Feedback = $this->ServerPost($this->PostParams, $this->ServiceURL);
			$Result = $this->ParseFeedback($Feedback);
			
			return $Result;
		}

		// 更新門市(統一超商C2C)
		public function UpdateUnimartStore() {
			
			// 參數初始化
			$ParamList = array(
				'MerchantID' => '',
				'AllPayLogisticsID' => '',
				'CVSPaymentNo' => '',
				'CVSValidationNo' => '',
				'StoreType' => '',
				'ReceiverStoreID' => '',
				'ReturnStoreID' => '',
				'PlatformID' => ''
			);
			$this->PostParams = $this->GetPostParams($this->Send, $ParamList);
			
			// 參數檢查
      $this->ValidateHashKey();
      $this->ValidateHashIV();
			$this->ValidateID('MerchantID', $this->PostParams['MerchantID'], 10);
			$this->ServiceURL = $this->GetURL('UNIMART_UPDATE_STORE_INFO');
			$this->ValidateID('AllPayLogisticsID', $this->PostParams['AllPayLogisticsID'], 20);
			$this->ValidateMixTypeID('CVSPaymentNo', $this->PostParams['CVSPaymentNo'], 15);
			$this->ValidateID('CVSValidationNo', $this->PostParams['CVSValidationNo'], 10);
			$this->ValidateStoreType();
			
			if ($this->PostParams['StoreType'] == StoreType::RECIVE_STORE) {
				$this->ValidateID('ReceiverStoreID', $this->PostParams['ReceiverStoreID'], 6);
			} else {
				unset($this->PostParams['ReceiverStoreID']);
			}
		
			if ($this->PostParams['StoreType'] == StoreType::RETURN_STORE) {
				$this->ValidateID('ReturnStoreID', $this->PostParams['ReturnStoreID'], 6);
			} else {
				unset($this->PostParams['ReturnStoreID']);
			}
			
			$this->ValidateID('PlatformID', $this->PostParams['PlatformID'], 10, true);
			
			// 產生 CheckMacValue
			$this->PostParams['CheckMacValue'] = $this->GenCheckMacValue($this->PostParams, $this->HashKey, $this->HashIV);
			
			// 解析回傳結果
			$Feedback = $this->ServerPost($this->PostParams, $this->ServiceURL);
			$Result = $this->ParseFeedback($Feedback);
			
			return $Result;
		}
		
		// 取消訂單(統一超商C2C)
		public function CancelUnimartLogisticsOrder() {
			
			// 參數初始化
			$ParamList = array(
				'MerchantID' => '',
				'AllPayLogisticsID' => '',
				'CVSPaymentNo' => '',
				'CVSValidationNo' => '',
				'PlatformID' => ''
			);
			$this->PostParams = $this->GetPostParams($this->Send, $ParamList);
			
			// 參數檢查
      $this->ValidateHashKey();
      $this->ValidateHashIV();
			$this->ValidateID('MerchantID', $this->PostParams['MerchantID'], 10);
			$this->ServiceURL = $this->GetURL('UNIMART_CANCEL_LOGISTICS_ORDER');
			$this->ValidateID('AllPayLogisticsID', $this->PostParams['AllPayLogisticsID'], 20);
			$this->ValidateMixTypeID('CVSPaymentNo', $this->PostParams['CVSPaymentNo'], 15);
			$this->ValidateID('CVSValidationNo', $this->PostParams['CVSValidationNo'], 10);
			$this->ValidateID('PlatformID', $this->PostParams['PlatformID'], 10, true);
			
			// 產生 CheckMacValue
			$this->PostParams['CheckMacValue'] = $this->GenCheckMacValue($this->PostParams, $this->HashKey, $this->HashIV);
			
			// 解析回傳結果
			$Feedback = $this->ServerPost($this->PostParams, $this->ServiceURL);
			$Result = $this->ParseFeedback($Feedback);
			
			return $Result;
		}
		
		// 物流訂單查詢
		public function QueryLogisticsInfo() {
			
			// 參數初始化
			$ParamList = array(
				'MerchantID' => '',
				'AllPayLogisticsID' => '',
				'PlatformID' => ''
			);
			$this->PostParams = $this->GetPostParams($this->Send, $ParamList);
			$this->PostParams['TimeStamp'] = strtotime('now');
			
			// 參數檢查
      $this->ValidateHashKey();
      $this->ValidateHashIV();
			$this->ValidateID('MerchantID', $this->PostParams['MerchantID'], 10);
			$this->ServiceURL = $this->GetURL('QUERY_LOGISTICS_INFO');
			$this->ValidateID('AllPayLogisticsID', $this->PostParams['AllPayLogisticsID'], 20);
			$this->ValidateID('PlatformID', $this->PostParams['PlatformID'], 10, true);
			
			// 產生 CheckMacValue
			$this->PostParams['CheckMacValue'] = $this->GenCheckMacValue($this->PostParams, $this->HashKey, $this->HashIV);
			
			// 解析回傳結果
			$Result = array();
			$Feedback = $this->ServerPost($this->PostParams, $this->ServiceURL);
			parse_str($Feedback, $Result);
			$this->CheckOutFeedback($Result);
			
			return $Result;
		}
		
		// 產生托運單(宅配)/一段標(超商取貨)
		public function PrintTradeDoc($ButtonDesc = '產生托運單/一段標', $Target = '_blank') {
			
			// 參數初始化
			$ParamList = array(
				'MerchantID' => '',
				'AllPayLogisticsID' => '',
				'PlatformID' => ''
			);
			$this->PostParams = $this->GetPostParams($this->Send, $ParamList);
			
			// 參數檢查
      $this->ValidateHashKey();
      $this->ValidateHashIV();
			$this->ValidateID('MerchantID', $this->PostParams['MerchantID'], 10);
			$this->ServiceURL = $this->GetURL('PRINT_TRADE_DOC');
			$this->ValidateID('AllPayLogisticsID', $this->PostParams['AllPayLogisticsID'], 20);
			$this->ValidateID('PlatformID', $this->PostParams['PlatformID'], 10, true);
			
			// 產生 CheckMacValue
			$this->PostParams['CheckMacValue'] = $this->GenCheckMacValue($this->PostParams, $this->HashKey, $this->HashIV);
			
			return $this->GenPostHTML($ButtonDesc, $Target);
		}
		
		// 列印繳款單(統一超商C2C)
		public function PrintUnimartC2CBill($ButtonDesc = '列印繳款單(統一超商C2C)', $Target = '_blank') {
			
			// 參數初始化
			$ParamList = array(
				'MerchantID' => '',
				'AllPayLogisticsID' => '',
				'CVSPaymentNo' => '',
				'CVSValidationNo' => '',
				'PlatformID' => ''
			);
			$this->PostParams = $this->GetPostParams($this->Send, $ParamList);
			
			// 參數檢查
      $this->ValidateHashKey();
      $this->ValidateHashIV();
			$this->ValidateID('MerchantID', $this->PostParams['MerchantID'], 10);
			$this->ServiceURL = $this->GetURL('PRINT_UNIMART_C2C_BILL');
			$this->ValidateID('AllPayLogisticsID', $this->PostParams['AllPayLogisticsID'], 20);
			$this->ValidateMixTypeID('CVSPaymentNo', $this->PostParams['CVSPaymentNo'], 15);
			$this->ValidateID('CVSValidationNo', $this->PostParams['CVSValidationNo'], 10);
			$this->ValidateID('PlatformID', $this->PostParams['PlatformID'], 10, true);
			
			// 產生 CheckMacValue
			$this->PostParams['CheckMacValue'] = $this->GenCheckMacValue($this->PostParams, $this->HashKey, $this->HashIV);
			
			return $this->GenPostHTML($ButtonDesc, $Target);
		}
		
		// 全家列印小白單(全家超商C2C)
		public function PrintFamilyC2CBill($ButtonDesc = '全家列印小白單(全家超商C2C)', $Target = '_blank') {
			
			// 參數初始化
			$ParamList = array(
				'MerchantID' => '',
				'AllPayLogisticsID' => '',
				'CVSPaymentNo' => '',
				'PlatformID' => ''
			);
			$this->PostParams = $this->GetPostParams($this->Send, $ParamList);
			
			// 參數檢查
      $this->ValidateHashKey();
      $this->ValidateHashIV();
			$this->ValidateID('MerchantID', $this->PostParams['MerchantID'], 10);
			$this->ServiceURL = $this->GetURL('PRINT_FAMILY_C2C_BILL');
			$this->ValidateID('AllPayLogisticsID', $this->PostParams['AllPayLogisticsID'], 20);
			$this->ValidateMixTypeID('CVSPaymentNo', $this->PostParams['CVSPaymentNo'], 15);
			$this->ValidateID('PlatformID', $this->PostParams['PlatformID'], 10, true);
			
			// 產生 CheckMacValue
			$this->PostParams['CheckMacValue'] = $this->GenCheckMacValue($this->PostParams, $this->HashKey, $this->HashIV);
			
			return $this->GenPostHTML($ButtonDesc, $Target);
		}
		
    private function ValidateHashKey(){
      
      if (empty($this->HashKey)) {
        throw new Exception('HashKey is required.');
      }
    }
    
    private function ValidateHashIV(){
      
      if (empty($this->HashIV)) {
        throw new Exception('HashIV is required.');
      }
    }
	
		private function ValidateID($Name, $Value, $MaxLength = 1, $AllowEmpty = false) {
			
			if (empty($Value)) {
				if (!$AllowEmpty) {
					throw new Exception($Name . ' is required.');
				}
			} else if (!preg_match('/^\d{1,' . $MaxLength . '}$/', $Value)){
				throw new Exception('Invalid ' . $Name . '.');
			}
		}
		
		private function ValidateURL($Name, $Value, $MaxLength = 200, $AllowEmpty = false) {
			
			if (empty($Value)) {
				if (!$AllowEmpty) {
					throw new Exception($Name . ' is required.');
				}
			} else if (!preg_match('/^(http|https):\/\/+/', $Value)){
				throw new Exception('Invalid ' . $Name . '.');
			} else if ($this->StringLength($Value) > $MaxLength) {
				throw new Exception($Name . ' max length is ' . $MaxLength . '.');
			}
		}
		
		private function ValidateString($Name, $Value, $MaxLength = 1, $AllowEmpty = false) {
			
			if (empty($Value)) {
				if (!$AllowEmpty) {
					throw new Exception($Name . ' is required.');
				}
			} else if ($this->StringLength($Value) > $MaxLength) {
				throw new Exception($Name . ' max length is ' . $MaxLength . '.');
			}
		}
		
		private function ValidateAmount($Name, $Value, $AllowEmpty = false) {
			
			if (empty($Value)) {
				if (!$AllowEmpty) {
					throw new Exception($Name . ' is required.');
				}
			} else if ((gettype($Value) != 'integer') or (!preg_match('/^\d+$/', $Value))) {
				throw new Exception('Invalid ' . $Name . '.');
			}
		}
		
		private function ValidatePhoneNumber($Name, $Value, $AllowEmpty = false) {
			
			if (empty($Value)) {
				if (!$AllowEmpty) {
					throw new Exception($Name . ' is required.');
				}
			} else if (!preg_match('/^\d{7,20}$/', $Value)) {
				throw new Exception('Invalid ' . $Name . '.');
			}
		}
		
		private function ValidateEmail($Name, $Value, $MaxLength = 100, $AllowEmpty = false) {
			
			if (empty($Value)) {
				if (!$AllowEmpty) {
					throw new Exception($Name . ' is required.');
				}
			} else if ($this->StringLength($Value) > $MaxLength) {
				throw new Exception($Name . ' max length is ' . $MaxLength . '.');
			} else if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9]{2,4}$/', $Value)) {
				throw new Exception('Invalid ' . $Name . '.');
			}
		}
		
		private function ValidateZipCode($Name, $Value, $AllowEmpty = false) {
			
			if (empty($Value)) {
				if (!$AllowEmpty) {
					throw new Exception($Name . ' is required.');
				}
			} else if (!preg_match('/^\d{3,5}$/', $Value)){
				throw new Exception('Invalid ' . $Name . '.');
			}
		}
		
		private function ValidateMixTypeID($Name, $Value, $MaxLength = 1, $AllowEmpty = false) {
			
			if (empty($Value)) {
				if (!$AllowEmpty) {
					throw new Exception($Name . ' is required.');
				}
			} else if (!preg_match('/^[0-9a-zA-Z]{1,' . $MaxLength . '}$/', $Value)){
				throw new Exception('Invalid ' . $Name . '.');
			}
		}
		
		private function ValidateStoreType() {
			
			if (empty($this->PostParams['StoreType'])) {
				throw new Exception('StoreType is required.');
			} else if ($this->PostParams['StoreType'] != StoreType::RECIVE_STORE and $this->PostParams['StoreType'] != StoreType::RETURN_STORE) {
				throw new Exception('Invalid StoreType.');
			}
		}
		
		
		
		private function ValidateMerchantTradeNo() {
			
			if (empty($this->PostParams['MerchantTradeNo'])) {
				throw new Exception('MerchantTradeNo is required.');
			} else if (!preg_match('/^[a-zA-Z0-9]{1,20}$/', $this->PostParams['MerchantTradeNo'])) {
				throw new Exception('Invalid MerchantTradeNo.');
			}
		}
		
		private function ValidateLogisticsType() {
			
			if (empty($this->PostParams['LogisticsType'])) {
				throw new Exception('LogisticsType is required.');
			} else if ($this->PostParams['LogisticsType'] != LogisticsType::CVS and $this->PostParams['LogisticsType'] != LogisticsType::HOME) {
				throw new Exception('Invalid LogisticsType.');
			}
		}
		
		private function ValidateLogisticsSubType() {
			
			if (empty($this->PostParams['LogisticsSubType'])) {
				throw new Exception('LogisticsSubType is required.');
			} else {
				if ($this->PostParams['LogisticsType'] == LogisticsType::HOME) {
					if ($this->PostParams['LogisticsSubType'] != LogisticsSubType::TCAT) {
						throw new Exception('Invalid LogisticsSubType.');
					}
				} else {
					if (
						$this->PostParams['LogisticsSubType'] != LogisticsSubType::FAMILY and
						$this->PostParams['LogisticsSubType'] != LogisticsSubType::UNIMART and
						$this->PostParams['LogisticsSubType'] != LogisticsSubType::FAMILY_C2C and
						$this->PostParams['LogisticsSubType'] != LogisticsSubType::UNIMART_C2C
					) {
						throw new Exception('Invalid LogisticsSubType.');
					}
				}
				
			}
		}
		
		private function ValidateIsCollection($AllowEmpty = false) {
			
			if (empty($this->PostParams['IsCollection'])) {
				if (!$AllowEmpty) {
					throw new Exception('IsCollection is required.');
				}
			} else if ($this->PostParams['IsCollection'] != IsCollection::YES and $this->PostParams['IsCollection'] != IsCollection::NO) {
				throw new Exception('Invalid IsCollection.');
			} else if ($this->PostParams['LogisticsType'] == LogisticsType::HOME and $this->PostParams['IsCollection'] == IsCollection::YES) {
				// 目前物流類型(LogisticsType)宅配(Home)不支援代收貨款(IsCollection = Y)
				throw new Exception('IsCollection could not be Y, when LogisticsType is Home.');
			}
		}
		
		private function ValidateDevice($AllowEmpty = false) {
			
			if (empty($this->PostParams['Device'])) {
				if (!$AllowEmpty) {
					throw new Exception('Device is required.');
				}
			} else if (gettype($this->PostParams['Device']) != 'integer' or ($this->PostParams['Device'] != Device::PC and $this->PostParams['Device'] != Device::MOBILE)) {
				throw new Exception('Invalid Device.');
			}
		}
		
		private function ValidateMerchantTradeDate() {
			
			if (empty($this->PostParams['MerchantTradeDate'])) {
				throw new Exception('MerchantTradeDate is required.');
			} else if (date('Y/m/d H:i:s', strtotime($this->PostParams['MerchantTradeDate'])) != $this->PostParams['MerchantTradeDate']){
				throw new Exception('Invalid MerchantTradeDate.');
			}
		}

		private function ValidateTemperature() {
			
			if (empty($this->PostParams['Temperature'])) {
				throw new Exception('Temperature is required.');
			} else if (
				$this->PostParams['Temperature'] != Temperature::ROOM and
				$this->PostParams['Temperature'] != Temperature::REFRIGERATION and
				$this->PostParams['Temperature'] != Temperature::FREEZE
			) {
				throw new Exception('Invalid Temperature.');
			}
		}
	
		private function ValidateDistance() {
			
			if (empty($this->PostParams['Distance'])) {
				throw new Exception('Distance is required.');
			} else if (
				$this->PostParams['Distance'] != Distance::SAME and
				$this->PostParams['Distance'] != Distance::OTHER and
				$this->PostParams['Distance'] != Distance::ISLAND
			) {
				throw new Exception('Invalid Distance.');
			}
		}
		
		private function ValidateSpecification() {
			
			if (empty($this->PostParams['Specification'])) {
				throw new Exception('Specification is required.');
			} else if (
				$this->PostParams['Specification'] != Specification::CM_60 and
				$this->PostParams['Specification'] != Specification::CM_90 and
				$this->PostParams['Specification'] != Specification::CM_120 and
				$this->PostParams['Specification'] != Specification::CM_150
			) {
				throw new Exception('Invalid Specification.');
			}
		}
			
		private function ValidateScheduledDeliveryTime($AllowEmpty = false) {
			
			if (empty($this->PostParams['ScheduledDeliveryTime'])) {
				if (!$AllowEmpty) {
					throw new Exception('ScheduledDeliveryTime is required.');
				}
			} else if (
				$this->PostParams['ScheduledDeliveryTime'] != ScheduledDeliveryTime::TIME_9_12 and
				$this->PostParams['ScheduledDeliveryTime'] != ScheduledDeliveryTime::TIME_12_17 and
				$this->PostParams['ScheduledDeliveryTime'] != ScheduledDeliveryTime::TIME_17_20 and
				$this->PostParams['ScheduledDeliveryTime'] != ScheduledDeliveryTime::UNLIMITED and
				$this->PostParams['ScheduledDeliveryTime'] != ScheduledDeliveryTime::TIME_20_21
			) {
				throw new Exception('Invalid ScheduledDeliveryTime.');
			}
		}
		
		private function ValidateShipmentDate($AllowEmpty = false) {
			
			if (empty($this->PostParams['ShipmentDate'])) {
				if (!$AllowEmpty) {
					throw new Exception('ShipmentDate is required.');
				}
			} else if (date('Y/m/d', strtotime($this->PostParams['ShipmentDate'])) != $this->PostParams['ShipmentDate']){
				throw new Exception('Invalid ShipmentDate.');
			}
		}
		
		
		
		private function GetPostParams($Source, $ParamList, $MergeParams = array()) {
			
			$PostParams = array();
			foreach ($ParamList as $Name => $Value) {
				if (isset($Source[$Name])) {
					$PostParams[$Name] = $Source[$Name];
				} else {
					$PostParams[$Name] = $Value;
				}
			}
			return array_merge($MergeParams, $PostParams);
		}
		
		private function GetURL($FunctionType) {
			
			$UrlList = array();
			if ($this->PostParams['MerchantID'] == AllpayTestMerchantID::B2C or $this->PostParams['MerchantID'] == AllpayTestMerchantID::C2C) {
				// 測試環境
				$UrlList = array(
					'CVS_MAP' => AllpayTestURL::CVS_MAP,
					'SHIPPING_ORDER' => AllpayTestURL::SHIPPING_ORDER,
					'HOME_RETURN_ORDER' => AllpayTestURL::HOME_RETURN_ORDER,
					'FAMILY_RETURN_ORDER' => AllpayTestURL::FAMILY_RETURN_ORDER,
					'FAMILY_RETURN_CHECK' => AllpayTestURL::FAMILY_RETURN_CHECK,
					'UNIMART_UPDATE_LOGISTICS_INFO' => AllpayTestURL::UNIMART_UPDATE_LOGISTICS_INFO,
					'UNIMART_UPDATE_STORE_INFO' => AllpayTestURL::UNIMART_UPDATE_STORE_INFO,
					'UNIMART_CANCEL_LOGISTICS_ORDER' => AllpayTestURL::UNIMART_CANCEL_LOGISTICS_ORDER,
					'QUERY_LOGISTICS_INFO' => AllpayTestURL::QUERY_LOGISTICS_INFO,
					'PRINT_TRADE_DOC' => AllpayTestURL::PRINT_TRADE_DOC,
					'PRINT_UNIMART_C2C_BILL' => AllpayTestURL::PRINT_UNIMART_C2C_BILL,
					'PRINT_FAMILY_C2C_BILL' => AllpayTestURL::PRINT_FAMILY_C2C_BILL,
				);
			} else {
				// 正式環境
				$UrlList = array(
					'CVS_MAP' => AllpayURL::CVS_MAP,
					'SHIPPING_ORDER' => AllpayURL::SHIPPING_ORDER,
					'HOME_RETURN_ORDER' => AllpayURL::HOME_RETURN_ORDER,
					'FAMILY_RETURN_ORDER' => AllpayURL::FAMILY_RETURN_ORDER,
					'FAMILY_RETURN_CHECK' => AllpayURL::FAMILY_RETURN_CHECK,
					'UNIMART_UPDATE_LOGISTICS_INFO' => AllpayURL::UNIMART_UPDATE_LOGISTICS_INFO,
					'UNIMART_UPDATE_STORE_INFO' => AllpayURL::UNIMART_UPDATE_STORE_INFO,
					'UNIMART_CANCEL_LOGISTICS_ORDER' => AllpayURL::UNIMART_CANCEL_LOGISTICS_ORDER,
					'QUERY_LOGISTICS_INFO' => AllpayURL::QUERY_LOGISTICS_INFO,
					'PRINT_TRADE_DOC' => AllpayURL::PRINT_TRADE_DOC,
					'PRINT_UNIMART_C2C_BILL' => AllpayURL::PRINT_UNIMART_C2C_BILL,
					'PRINT_FAMILY_C2C_BILL' => AllpayURL::PRINT_FAMILY_C2C_BILL,
				);
			}
			
			return $UrlList[$FunctionType];
		}
		
		private function NextLine($content) {
			return $content . "\n";
		}
		
		private function GenPostHTML($ButtonDesc = '', $Target = '_self') {
			// 產生 POST form HTML
			$PostHTML = $this->NextLine('<div style="text-align:center;">');
			$PostHTML .= $this->NextLine('  <form id="allpayForm" method="POST" action="' . $this->ServiceURL . '" target="' . $Target . '">');
			foreach ($this->PostParams as $Name => $Value) {
				$PostHTML .= $this->NextLine('    <input type="hidden" name="' . $Name . '" value="' . $Value . '" />');
			}
			if (!empty($ButtonDesc)) {
				$PostHTML .= $this->NextLine('    <input type="submit" id="__paymentButton" value="' . $ButtonDesc . '" />');
			} else {
				$PostHTML .= $this->NextLine('<script>document.getElementById("allpayForm").submit();</script>');
			}
			$PostHTML .= $this->NextLine('  </form>');
			$PostHTML .= $this->NextLine('</div>');
			
			return $PostHTML;
		}
		
		private function StringLength($string) {
			return mb_strwidth($string, $this->Encode);
		}
		
		private function GenCheckMacValue($ParamList, $HashKey, $HashIV) {
			# CheckMacValue
			ksort($ParamList);
			$CheckMacValue = 'HashKey=' . $HashKey;
			foreach ($ParamList as $ParamName => $ParamValue) {
				$CheckMacValue .= '&' . $ParamName . '=' . $ParamValue;
			}
			$CheckMacValue .= '&HashIV=' . $HashIV;
			$CheckMacValue = strtolower(urlencode($CheckMacValue));
			
			// 取之為與 dotNet 相符的字元
			$CheckMacValue = str_replace('%2d', '-', $CheckMacValue);
			$CheckMacValue = str_replace('%5f', '_', $CheckMacValue);
			$CheckMacValue = str_replace('%2e', '.', $CheckMacValue);
			$CheckMacValue = str_replace('%21', '!', $CheckMacValue);
			$CheckMacValue = str_replace('%2a', '*', $CheckMacValue);
			$CheckMacValue = str_replace('%28', '(', $CheckMacValue);
			$CheckMacValue = str_replace('%29', ')', $CheckMacValue);
			
			// MD5 編碼
			$CheckMacValue = strtoupper(md5($CheckMacValue));
			
			return $CheckMacValue;
		}
		
		private function ServerPost($ParamList, $URL) {
			
			$Curl = curl_init();
			curl_setopt($Curl, CURLOPT_URL, $URL);
			curl_setopt($Curl, CURLOPT_HEADER, FALSE);
			curl_setopt($Curl, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($Curl, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($Curl, CURLOPT_POST, TRUE);
			curl_setopt($Curl, CURLOPT_POSTFIELDS, http_build_query($ParamList));
			$Result = curl_exec($Curl);
			curl_close($Curl);

			return $Result;
    }
		
		private function ParseFeedback($Feedback, $FeedbackList = array('RtnCode', 'RtnMsg'), $Separator = '|') {
			
			$Pieces = explode('|', $Feedback);
			$Feedback = array();
			if (count($Pieces) == count($FeedbackList)) {
				foreach ($FeedbackList as $Idx => $Name) {
					$Feedback[$Name] = $Pieces[$Idx];
				}
			} else {
				$Feedback['ParseMsg'] = 'Unknown feedback : ' . $Feedback;
			}
			return $Feedback;
		}
	}
?>