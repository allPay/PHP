<?php

/**
 * 付款方式。
 */
abstract class PaymentMethod {

    /**
     * 不指定付款方式。
     */
    const ALL = 'ALL';

    /**
     * 信用卡付費。
     */
    const Credit = 'Credit';

    /**
     * 網路 ATM。
     */
    const WebATM = 'WebATM';

    /**
     * 自動櫃員機。
     */
    const ATM = 'ATM';

    /**
     * 超商代碼。
     */
    const CVS = 'CVS';

    /**
     * 超商條碼。
     */
    const BARCODE = 'BARCODE';

    /**
     * 支付寶。
     */
    const Alipay = 'Alipay';

    /**
     * 財付通。
     */
    const Tenpay = 'Tenpay';

    /**
     * 儲值消費。
     */
    const TopUpUsed = 'TopUpUsed';

}

/**
 * 付款方式子項目。
 */
abstract class PaymentMethodItem {

    /**
     * 不指定。
     */
    const None = '';
    // WebATM 類(001~100)
    /**
     * 台新銀行。
     */
    const WebATM_TAISHIN = 'TAISHIN';

    /**
     * 玉山銀行。
     */
    const WebATM_ESUN = 'ESUN';

    /**
     * 華南銀行。
     */
    const WebATM_HUANAN = 'HUANAN';

    /**
     * 台灣銀行。
     */
    const WebATM_BOT = 'BOT';

    /**
     * 台北富邦。
     */
    const WebATM_FUBON = 'FUBON';

    /**
     * 中國信託。
     */
    const WebATM_CHINATRUST = 'CHINATRUST';

    /**
     * 第一銀行。
     */
    const WebATM_FIRST = 'FIRST';

    /**
     * 國泰世華。
     */
    const WebATM_CATHAY = 'CATHAY';

    /**
     * 兆豐銀行。
     */
    const WebATM_MEGA = 'MEGA';

    /**
     * 元大銀行。
     */
    const WebATM_YUANTA = 'YUANTA';

    /**
     * 土地銀行。
     */
    const WebATM_LAND = 'LAND';
    // ATM 類(101~200)
    /**
     * 台新銀行。
     */
    const ATM_TAISHIN = 'TAISHIN';

    /**
     * 玉山銀行。
     */
    const ATM_ESUN = 'ESUN';

    /**
     * 華南銀行。
     */
    const ATM_HUANAN = 'HUANAN';

    /**
     * 台灣銀行。
     */
    const ATM_BOT = 'BOT';

    /**
     * 台北富邦。
     */
    const ATM_FUBON = 'FUBON';

    /**
     * 中國信託。
     */
    const ATM_CHINATRUST = 'CHINATRUST';

    /**
     * 第一銀行。
     */
    const ATM_FIRST = 'FIRST';
    // 超商類(201~300)
    /**
     * 超商代碼繳款。
     */
    const CVS = 'CVS';

    /**
     * OK超商代碼繳款。
     */
    const CVS_OK = 'OK';

    /**
     * 全家超商代碼繳款。
     */
    const CVS_FAMILY = 'FAMILY';

    /**
     * 萊爾富超商代碼繳款。
     */
    const CVS_HILIFE = 'HILIFE';

    /**
     * 7-11 ibon代碼繳款。
     */
    const CVS_IBON = 'IBON';
    // 其他第三方支付類(301~400)
    /**
     * 支付寶。
     */
    const Alipay = 'Alipay';

    /**
     * 財付通。
     */
    const Tenpay = 'Tenpay';
    // 儲值/餘額消費類(401~500)
    /**
     * 儲值/餘額消費(歐付寶)
     */
    const TopUpUsed_AllPay = 'AllPay';

    /**
     * 儲值/餘額消費(玉山)
     */
    const TopUpUsed_ESUN = 'ESUN';
    // 其他類(901~999)
    /**
     * 超商條碼繳款。
     */
    const BARCODE = 'BARCODE';

    /**
     * 信用卡(MasterCard/JCB/VISA)。
     */
    const Credit = 'Credit';

    /**
     * 貨到付款。
     */
    const COD = 'COD';

}

/**
 * 額外付款資訊。
 */
abstract class ExtraPaymentInfo {

    /**
     * 需要額外付款資訊。
     */
    const Yes = 'Y';

    /**
     * 不需要額外付款資訊。
     */
    const No = 'N';

}

/**
 * 額外付款資訊。
 */
abstract class DeviceType {

    /**
     * 桌機版付費頁面。
     */
    const PC = 'P';

    /**
     * 行動裝置版付費頁面。
     */
    const Mobile = 'M';

}

/**
 * 信用卡訂單處理動作資訊。
 */
abstract class ActionType {

    /**
     * 關帳
     */
    const C = 'C';

    /**
     * 退刷
     */
    const R = 'R';

    /**
     * 取消
     */
    const E = 'E';

    /**
     * 放棄
     */
    const N = 'N';

}

/**
 * 定期定額的週期種類。
 */
abstract class PeriodType {

    /**
     * 無
     */
    const None = '';

    /**
     * 年
     */
    const Year = 'Y';

    /**
     * 月
     */
    const Month = 'M';

    /**
     * 日
     */
    const Day = 'D';

}

/**
 * 電子發票開立註記。
 */
abstract class InvoiceState {
    /**
     * 需要開立電子發票。
     */
	const Yes = 'Y';

    /**
     * 不需要開立電子發票。
     */
	const No = '';
}

/**
 * 電子發票載具類別
 */
abstract class CarruerType {
  // 無載具
  const None = '';
  
  // 會員載具
  const Member = '1';
  
  // 買受人自然人憑證
  const Citizen = '2';
  
  // 買受人手機條碼
  const Cellphone = '3';
}

/**
 * 電子發票列印註記
 */
abstract class PrintMark {
  // 不列印
  const No = '0';
  
  // 列印
  const Yes = '1';
}

/**
 * 電子發票捐贈註記
 */
abstract class Donation {
  // 捐贈
  const Yes = '1';
  
  // 不捐贈
  const No = '2';
}

/**
 * 通關方式
 */
abstract class ClearanceMark {
  // 經海關出口
  const Yes = '1';
  
  // 非經海關出口
  const No = '2';
}

/**
 * 課稅類別
 */
abstract class TaxType {
  // 應稅
  const Dutiable = '1';
  
  // 零稅率
  const Zero = '2';
  
  // 免稅
  const Free = '3';
  
  // 應稅與免稅混合(限收銀機發票無法分辦時使用，且需通過申請核可)
  const Mix = '9';
}

/**
 * 字軌類別
 */
abstract class InvType {
  // 一般稅額
  const General = '07';
  
  // 特種稅額
  const Special = '08';
}

/**
 * AllInOne short summary.
 *
 * AllInOne description.
 *
 * @version 1.0
 * @author andy.chao
 */
class AllInOne {

    public $ServiceURL = 'ServiceURL';
    public $ServiceMethod = 'ServiceMethod';
    public $HashKey = 'HashKey';
    public $HashIV = 'HashIV';
    public $MerchantID = 'MerchantID';
    public $PaymentType = 'PaymentType';
    public $Send = 'Send';
    public $SendExtend = 'SendExtend';
    public $Query = 'Query';
    public $Action = 'Action';
    public $ChargeBack = 'ChargeBack';

    function __construct() {
        $this->AllInOne();
        $this->PaymentType = 'aio';
        $this->Send = array(
            "ReturnURL" => '',
            "ClientBackURL" => '',
            "OrderResultURL" => '',
            "MerchantTradeNo" => '',
            "MerchantTradeDate" => '',
            "PaymentType" => 'aio',
            "TotalAmount" => '',
            "TradeDesc" => '',
            "ChoosePayment" => PaymentMethod::ALL,
            "Remark" => '',
            "ChooseSubPayment" => PaymentMethodItem::None,
            "NeedExtraPaidInfo" => ExtraPaymentInfo::No,
            "DeviceSource" => DeviceType::PC,
            "IgnorePayment" => '',
            "PlatformID" => '',
            "InvoiceMark" => InvoiceState::No,
            "Items" => array()
        );
        $this->SendExtend = array(
            // ATM 延伸參數。
            "ExpireDate" => 3,
            // CVS, BARCODE 延伸參數。
            "Desc_1" => '', "Desc_2" => '', "Desc_3" => '', "Desc_4" => '',
            // ATM, CVS, BARCODE 延伸參數。
            "ClientRedirectURL" => '',
            // Alipay 延伸參數。
            "Email" => '', "PhoneNo" => '', "UserName" => '',
            // Tenpay 延伸參數。
            "ExpireTime" => '',
            // Credit 分期延伸參數。
            "CreditInstallment" => 0, "InstallmentAmount" => 0, "Redeem" => FALSE, "UnionPay" => FALSE,
            // Credit 定期定額延伸參數。
            "PeriodAmount" => '', "PeriodType" => '', "Frequency" => '', "ExecTimes" => '',
            // 回傳網址的延伸參數。
            "PaymentInfoURL" => '', "PeriodReturnURL" => '',
            // 電子發票延伸參數。
            "CustomerIdentifier" => '',
            "CarruerType" => CarruerType::None,
            "CustomerID" => '',
            "Donation" => Donation::No,
            "Print" => PrintMark::No,
            "CustomerName" => '',
            "CustomerAddr" => '',
            "CustomerPhone" => '',
            "CustomerEmail" => '',
            "ClearanceMark" => '',
            "CarruerNum" => '',
            "LoveCode" => '',
            "InvoiceRemark" => '',
            "DelayDay" => 0,
        );
        $this->Query = array(
            'MerchantTradeNo' => '', 'TimeStamp' => ''
        );
        $this->Action = Array(
            'MerchantTradeNo' => '', 'TradeNo' => '', 'Action' => ActionType::C, 'TotalAmount' => 0
        );
        $this->ChargeBack = Array(
            'MerchantTradeNo' => '', 'TradeNo' => '', 'ChargeBackTotalAmount' => 0, 'Remark' => ''
        );
    }

    function AllInOne() {
        
    }

    function CheckOut($target = "_self") {
        $szHtml = $this->CheckOutString(null, $target);

        print $szHtml;

        exit();
        die();
        flush();

        return;
    }

    function CheckOutString($paymentButton, $target = "_self") {
        // 變數宣告。
        $arErrors = array();
        $szHtml = '';
        $arParameters = null;

        $szItemName = '';
        $szAlipayItemName = '';
        $szAlipayItemCounts = '';
        $szAlipayItemPrice = '';
        $szInvoiceItemName = '';
        $szInvoiceItemCount = '';
        $szInvoiceItemWord = '';
        $szInvoiceItemPrice = '';
        $szInvoiceItemTaxType = '';
        $InvSptr = '|';
        // 檢查資料。
        if (strlen($this->ServiceURL) == 0) {
            array_push($arErrors, 'ServiceURL is required.');
        }
        if (strlen($this->ServiceURL) > 200) {
            array_push($arErrors, 'ServiceURL max langth as 200.');
        }
        if (strlen($this->HashKey) == 0) {
            array_push($arErrors, 'HashKey is required.');
        }
        if (strlen($this->HashIV) == 0) {
            array_push($arErrors, 'HashIV is required.');
        }
        if (strlen($this->MerchantID) == 0) {
            array_push($arErrors, 'MerchantID is required.');
        }
        if (strlen($this->MerchantID) > 10) {
            array_push($arErrors, 'MerchantID max langth as 10.');
        }

        if (strlen($this->Send['ReturnURL']) == 0) {
            array_push($arErrors, 'ReturnURL is required.');
        }
        if (strlen($this->Send['ClientBackURL']) > 200) {
            array_push($arErrors, 'ClientBackURL max langth as 10.');
        }
        if (strlen($this->Send['OrderResultURL']) > 200) {
            array_push($arErrors, 'OrderResultURL max langth as 10.');
        }

        if (strlen($this->Send['MerchantTradeNo']) == 0) {
            array_push($arErrors, 'MerchantTradeNo is required.');
        }
        if (strlen($this->Send['MerchantTradeNo']) > 20) {
            array_push($arErrors, 'MerchantTradeNo max langth as 20.');
        }
        if (strlen($this->Send['MerchantTradeDate']) == 0) {
            array_push($arErrors, 'MerchantTradeDate is required.');
        }
        if (strlen($this->Send['TotalAmount']) == 0) {
            array_push($arErrors, 'TotalAmount is required.');
        }
        if (strlen($this->Send['TradeDesc']) == 0) {
            array_push($arErrors, 'TradeDesc is required.');
        }
        if (strlen($this->Send['TradeDesc']) > 200) {
            array_push($arErrors, 'TradeDesc max langth as 200.');
        }
        if (strlen($this->Send['ChoosePayment']) == 0) {
            array_push($arErrors, 'ChoosePayment is required.');
        }
        if (strlen($this->Send['NeedExtraPaidInfo']) == 0) {
            array_push($arErrors, 'NeedExtraPaidInfo is required.');
        }
        if (strlen($this->Send['DeviceSource']) == 0) {
            array_push($arErrors, 'DeviceSource is required.');
        }
        if (sizeof($this->Send['Items']) == 0) {
            array_push($arErrors, 'Items is required.');
        }
        // 檢查 Alipay 條件。
        if ($this->Send['ChoosePayment'] == PaymentMethod::Alipay) {
            if (strlen($this->SendExtend['Email']) == 0) {
                array_push($arErrors, "Email is required.");
            }
            if (strlen($this->SendExtend['Email']) > 200) {
                array_push($arErrors, "Email max langth as 200.");
            }
            if (strlen($this->SendExtend['PhoneNo']) == 0) {
                array_push($arErrors, "PhoneNo is required.");
            }
            if (strlen($this->SendExtend['PhoneNo']) > 20) {
                array_push($arErrors, "PhoneNo max langth as 20.");
            }
            if (strlen($this->SendExtend['UserName']) == 0) {
                array_push($arErrors, "UserName is required.");
            }
            if (strlen($this->SendExtend['UserName']) > 20) {
                array_push($arErrors, "UserName max langth as 20.");
            }
        }
        // 檢查產品名稱。
        if (sizeof($this->Send['Items']) > 0) {
            foreach ($this->Send['Items'] as $keys => $value) {
                $szItemName .= vsprintf('#%s %d %s x %u', $this->Send['Items'][$keys]);
                $szAlipayItemName .= sprintf('#%s', $this->Send['Items'][$keys]['Name']);
                $szAlipayItemCounts .= sprintf('#%u', $this->Send['Items'][$keys]['Quantity']);
                $szAlipayItemPrice .= sprintf('#%d', $this->Send['Items'][$keys]['Price']);

                if (!array_key_exists('ItemURL', $this->Send)) {
                    $this->Send['ItemURL'] = $this->Send['Items'][$keys]['URL'];
                }
            }

            if (strlen($szItemName) > 0) {
                $szItemName = mb_substr($szItemName, 1, 200);
            }
            if (strlen($szAlipayItemName) > 0) {
                $szAlipayItemName = mb_substr($szAlipayItemName, 1, 200);
            }
            if (strlen($szAlipayItemCounts) > 0) {
                $szAlipayItemCounts = mb_substr($szAlipayItemCounts, 1, 100);
            }
            if (strlen($szAlipayItemPrice) > 0) {
                $szAlipayItemPrice = mb_substr($szAlipayItemPrice, 1, 20);
            }
        } else {
            array_push($arErrors, "Goods information not found.");
        }
        
        // 檢查電子發票參數
        if (strlen($this->Send['InvoiceMark']) > 1) {
            array_push($arErrors, "InvoiceMark max length as 1.");
        } else {
          if ($this->Send['InvoiceMark'] == InvoiceState::Yes) {
              // RelateNumber(不可為空)
              if (strlen($this->SendExtend['RelateNumber']) == 0) {
                  array_push($arErrors, "RelateNumber is required.");
              } else {
                  if (strlen($this->SendExtend['RelateNumber']) > 30) {
                      array_push($arErrors, "RelateNumber max length as 30.");
                  }
              }
              
              // CustomerIdentifier(預設為空字串)
              if (strlen($this->SendExtend['CustomerIdentifier']) > 0) {
                  if (strlen($this->SendExtend['CustomerIdentifier']) != 8) {
                      array_push($arErrors, "CustomerIdentifier length should be 8.");
                  }
              }
              
              // CarruerType(預設為None)
              if (strlen($this->SendExtend['CarruerType']) > 1) {
                  array_push($arErrors, "CarruerType max length as 1.");
              } else {
                  // 統一編號不為空字串時，載具類別請設定空字串
                  if (strlen($this->SendExtend['CustomerIdentifier']) > 0) {
                      if ($this->SendExtend['CarruerType'] != CarruerType::None) {
                          array_push($arErrors, "CarruerType should be None.");
                      }
                  }
              }
              
              // CustomerID(預設為空字串)
              if (strlen($this->SendExtend['CustomerID']) > 20) {
                  array_push($arErrors, "CustomerID max length as 20.");
              } else {
                  // 當載具類別為會員載具(Member)時，此參數不可為空字串
                  if ($this->SendExtend['CarruerType'] == CarruerType::Member) {
                      if (strlen($this->SendExtend['CustomerID']) == 0) {
                          array_push($arErrors, "CustomerID is required.");
                      }
                  }
              }
              
              // Donation(預設為No)
              if (strlen($this->SendExtend['Donation']) > 1) {
                  array_push($arErrors, "Donation max length as 1.");
              } else {
                  // 統一編號不為空字串時，請設定不捐贈(No)
                  if (strlen($this->SendExtend['CustomerIdentifier']) > 0) {
                      if ($this->SendExtend['Donation'] != Donation::No) {
                          array_push($arErrors, "Donation should be No.");
                      }
                  } else {
                      if (strlen($this->SendExtend['Donation']) == 0) {
                          $this->SendExtend['Donation'] = Donation::No;
                      }
                  }
              }

              // Print(預設為No)
              if (strlen($this->SendExtend['Print']) > 1) {
                  array_push($arErrors, "Print max length as 1.");
              } else {
                  // 捐贈註記為捐贈(Yes)時，請設定不列印(No)
                  if ($this->SendExtend['Donation'] == Donation::Yes) {
                      if ($this->SendExtend['Print'] != PrintMark::No) {
                          array_push($arErrors, "Print should be No.");
                      }
                  } else {
                      // 統一編號不為空字串時，請設定列印(Yes)
                      if (strlen($this->SendExtend['CustomerIdentifier']) > 0) {
                          if ($this->SendExtend['Print'] != PrintMark::Yes) {
                              array_push($arErrors, "Print should be Yes.");
                          }
                      } else {
                          if (strlen($this->SendExtend['Print']) == 0) {
                              $this->SendExtend['Print'] = PrintMark::No;
                          }
                          
                          // 載具類別為會員載具(Member)、買受人自然人憑證(Citizen)、買受人手機條碼(Cellphone)時，請設定不列印(No)
                          $notPrint = array(CarruerType::Member, CarruerType::Citizen, CarruerType::Cellphone);
                          if (in_array($this->SendExtend['CarruerType'], $notPrint) and $this->SendExtend['Print'] == PrintMark::Yes) {
                              array_push($arErrors, "Print should be No.");
                          }
                      }
                  }
                  
              }
              
              // CustomerName(UrlEncode, 預設為空字串)
              if (mb_strlen($this->SendExtend['CustomerName'], 'UTF-8') > 20) {
                  array_push($arErrors, "CustomerName max length as 20.");
              } else {
                  // 列印註記為列印(Yes)時，此參數不可為空字串
                  if ($this->SendExtend['Print'] == PrintMark::Yes) {
                      if (mb_strlen($this->SendExtend['CustomerName'], 'UTF-8') == 0) {
                          array_push($arErrors, "CustomerName is required.");
                      }
                  }
              }
              
              // CustomerAddr(UrlEncode, 預設為空字串)
              if (mb_strlen($this->SendExtend['CustomerAddr'], 'UTF-8') > 200) {
                  array_push($arErrors, "CustomerAddr max length as 200.");
              } else {
                  // 列印註記為列印(Yes)時，此參數不可為空字串
                  if ($this->SendExtend['Print'] == PrintMark::Yes) {
                      if (mb_strlen($this->SendExtend['CustomerAddr'], 'UTF-8') == 0) {
                          array_push($arErrors, "CustomerAddr is required.");
                      }
                  }
              }
              
              // CustomerPhone(與CustomerEmail擇一不可為空)
              if (strlen($this->SendExtend['CustomerPhone']) > 20) {
                  array_push($arErrors, "CustomerPhone max length as 20.");
              }
              
              // CustomerEmail(UrlEncode, 預設為空字串, 與CustomerPhone擇一不可為空)
              if (strlen($this->SendExtend['CustomerEmail']) > 200) {
                  array_push($arErrors, "CustomerEmail max length as 200.");
              }
              
              if (strlen($this->SendExtend['CustomerPhone']) == 0 and strlen($this->SendExtend['CustomerEmail']) == 0) {
                  array_push($arErrors, "CustomerPhone or CustomerEmail is required.");
              }
              
              // TaxType(不可為空)
              if (strlen($this->SendExtend['TaxType']) > 1) {
                  array_push($arErrors, "TaxType max length as 1.");
              } else {
                  if (strlen($this->SendExtend['TaxType']) == 0) {
                      array_push($arErrors, "TaxType is required.");
                  }
              }
              
              // ClearanceMark(預設為空字串)
              if (strlen($this->SendExtend['ClearanceMark']) > 1) {
                  array_push($arErrors, "ClearanceMark max length as 1.");
              } else {
                  // 請設定空字串，僅課稅類別為零稅率(Zero)時，此參數不可為空字串
                  if ($this->SendExtend['TaxType'] == TaxType::Zero) {
                      if ($this->SendExtend['ClearanceMark'] != ClearanceMark::Yes and $this->SendExtend['ClearanceMark'] != ClearanceMark::No) {
                          array_push($arErrors, "ClearanceMark is required.");
                      }
                  } else {
                      if (strlen($this->SendExtend['ClearanceMark']) > 0) {
                          array_push($arErrors, "Please remove ClearanceMark.");
                      }
                  }
              }
              
              // CarruerNum(預設為空字串)
              if (strlen($this->SendExtend['CarruerNum']) > 64) {
                  array_push($arErrors, "CarruerNum max length as 64.");
              } else {
                  switch ($this->SendExtend['CarruerType']) {
                      // 載具類別為無載具(None)或會員載具(Member)時，請設定空字串
                      case CarruerType::None:
                      case CarruerType::Member:
                          if (strlen($this->SendExtend['CarruerNum']) > 0) {
                              array_push($arErrors, "Please remove CarruerNum.");
                          }
                          break;
                      // 載具類別為買受人自然人憑證(Citizen)時，請設定自然人憑證號碼，前2碼為大小寫英文，後14碼為數字
                      case CarruerType::Citizen:
                          if (!preg_match('/^[a-zA-Z]{2}\d{14}$/', $this->SendExtend['CarruerNum']))
                          {
                              array_push($arErrors, "Invalid CarruerNum.");
                          }
                          break;
                      // 載具類別為買受人手機條碼(Cellphone)時，請設定手機條碼，第1碼為「/」，後7碼為大小寫英文、數字、「+」、「-」或「.」
                      case CarruerType::Cellphone:
                          if (!preg_match('/^\/{1}[0-9a-zA-Z+-.]{7}$/', $this->SendExtend['CarruerNum'])) {
                              array_push($arErrors, "Invalid CarruerNum.");
                          }
                          break;
                      default:
                          array_push($arErrors, "Please remove CarruerNum.");
                  }
              }
              
              // LoveCode(預設為空字串)
              // 捐贈註記為捐贈(Yes)時，參數長度固定3~7碼，請設定全數字或第1碼大小寫「X」，後2~6碼全數字
              if ($this->SendExtend['Donation'] == Donation::Yes) {
                  if (!preg_match('/^([xX]{1}[0-9]{2,6}|[0-9]{3,7})$/', $this->SendExtend['LoveCode'])) {
                      array_push($arErrors, "Invalid LoveCode.");
                  }
              } else {
                  if (strlen($this->SendExtend['LoveCode']) > 0) {
                      array_push($arErrors, "Please remove LoveCode.");
                  }
              }
              
              // InvoiceItemName(UrlEncode, 不可為空)
              // InvoiceItemCount(不可為空)
              // InvoiceItemWord(UrlEncode, 不可為空)
              // InvoiceItemPrice(不可為空)
              // InvoiceItemTaxType(不可為空)
              if (sizeof($this->SendExtend['InvoiceItems']) > 0) {
                  $tmpItemName = array();
                  $tmpItemCount = array();
                  $tmpItemWord = array();
                  $tmpItemPrice = array();
                  $tmpItemTaxType = array();
                  foreach ($this->SendExtend['InvoiceItems'] as $tmpItemInfo) {
                      if (mb_strlen($tmpItemInfo['Name'], 'UTF-8') > 0) {
                          array_push($tmpItemName, $tmpItemInfo['Name']);
                      }
                      if (strlen($tmpItemInfo['Count']) > 0) {
                          array_push($tmpItemCount, $tmpItemInfo['Count']);
                      }
                      if (mb_strlen($tmpItemInfo['Word'], 'UTF-8') > 0) {
                          array_push($tmpItemWord, $tmpItemInfo['Word']);
                      }
                      if (strlen($tmpItemInfo['Price']) > 0) {
                          array_push($tmpItemPrice, $tmpItemInfo['Price']);
                      }
                      if (strlen($tmpItemInfo['TaxType']) > 0) {
                          array_push($tmpItemTaxType, $tmpItemInfo['TaxType']);
                      }
                  }
                  
                  if ($this->SendExtend['TaxType'] == TaxType::Mix) {
                      if (in_array(TaxType::Dutiable, $tmpItemTaxType) and in_array(TaxType::Free, $tmpItemTaxType)) {
                          // Do nothing
                      }  else {
                          $tmpItemTaxType = array();
                      }
                  }
                  if ((count($tmpItemName) + count($tmpItemCount) + count($tmpItemWord) + count($tmpItemPrice) + count($tmpItemTaxType)) == (count($tmpItemName) * 5)) {
                      $szInvoiceItemName = implode($InvSptr, $tmpItemName);
                      $szInvoiceItemCount = implode($InvSptr, $tmpItemCount);
                      $szInvoiceItemWord = implode($InvSptr, $tmpItemWord);
                      $szInvoiceItemPrice = implode($InvSptr, $tmpItemPrice);
                      $szInvoiceItemTaxType = implode($InvSptr, $tmpItemTaxType);
                  } else {
                      array_push($arErrors, "Invalid Invoice Goods information.");
                  }
              } else {
                  array_push($arErrors, "Invoice Goods information not found.");
              }

              // InvoiceRemark(UrlEncode, 預設為空字串)
              
              // DelayDay(不可為空, 預設為0)
              // 延遲天數，範圍0~15，設定為0時，付款完成後立即開立發票
              $this->SendExtend['DelayDay'] = (int)$this->SendExtend['DelayDay'];
              if ($this->SendExtend['DelayDay'] < 0 or $this->SendExtend['DelayDay'] > 15) {
                  array_push($arErrors, "DelayDay should be 0 ~ 15.");
              } else {
                  if (strlen($this->SendExtend['DelayDay']) == 0) {
                      $this->SendExtend['DelayDay'] = 0;
                  }
              }
              
              // InvType(不可為空)
              if (strlen($this->SendExtend['InvType']) == 0) {
                  array_push($arErrors, "InvType is required.");
              }
          }
        }
        
        // 輸出表單字串。
        if (sizeof($arErrors) == 0) {
            // 信用卡特殊邏輯判斷(行動裝置畫面的信用卡分期處理，不支援定期定額)
            if ($this->Send['ChoosePayment'] == PaymentMethod::Credit && $this->Send['DeviceSource'] == DeviceType::Mobile && !$this->SendExtend['PeriodAmount']) {
                $this->Send['ChoosePayment'] = PaymentMethod::ALL;
                $this->Send['IgnorePayment'] = 'WebATM#ATM#CVS#BARCODE#Alipay#Tenpay#TopUpUsed#APPBARCODE#AccountLink';
            }
            // 產生畫面控制項與傳遞參數。
            $arParameters = array(
              'MerchantID' => $this->MerchantID,
              'PaymentType' => $this->PaymentType,
              'ItemName' => $szItemName,
              'ItemURL' => $this->Send['ItemURL'],
              'InvoiceItemName' => $szInvoiceItemName,
              'InvoiceItemCount' => $szInvoiceItemCount,
              'InvoiceItemWord' => $szInvoiceItemWord,
              'InvoiceItemPrice' => $szInvoiceItemPrice,
              'InvoiceItemTaxType' => $szInvoiceItemTaxType,
            );
            $arParameters = array_merge($arParameters, $this->Send);
            $arParameters = array_merge($arParameters, $this->SendExtend);
            // 處理延伸參數
            if (!$this->Send['PlatformID']) { unset($arParameters['PlatformID']); }
            // 整理全功能參數。
            if ($this->Send['ChoosePayment'] == PaymentMethod::ALL) {
                unset($arParameters['ExecTimes']);
                unset($arParameters['Frequency']);
                unset($arParameters['PeriodAmount']);
                unset($arParameters['PeriodReturnURL']);
                unset($arParameters['PeriodType']);

                $arParameters = array_merge($arParameters, array(
                    'AlipayItemName' => $szAlipayItemName,
                    'AlipayItemCounts' => $szAlipayItemCounts,
                    'AlipayItemPrice' => $szAlipayItemPrice
                ));

                if (!$arParameters['CreditInstallment']) { unset($arParameters['CreditInstallment']); }
                if (!$arParameters['InstallmentAmount']) { unset($arParameters['InstallmentAmount']); }
                if (!$arParameters['Redeem']) { unset($arParameters['Redeem']); }
                if (!$arParameters['UnionPay']) { unset($arParameters['UnionPay']); }

                if (!$this->Send['IgnorePayment']) { unset($arParameters['IgnorePayment']); }
                if (!$this->SendExtend['ClientRedirectURL']) { unset($arParameters['ClientRedirectURL']); }
            }
            // 整理 Alipay 參數。
            if ($this->Send['ChoosePayment'] == PaymentMethod::Alipay) {
                $arParameters = array_merge($arParameters, array(
                    'AlipayItemName' => $szAlipayItemName,
                    'AlipayItemCounts' => $szAlipayItemCounts,
                    'AlipayItemPrice' => $szAlipayItemPrice
                ));

                unset($arParameters['CreditInstallment']);
                unset($arParameters['Desc_1']);
                unset($arParameters['Desc_2']);
                unset($arParameters['Desc_3']);
                unset($arParameters['Desc_4']);
                unset($arParameters['ExecTimes']);
                unset($arParameters['ExpireDate']);
                unset($arParameters['ExpireTime']);
                unset($arParameters['Frequency']);
                unset($arParameters['InstallmentAmount']);
                unset($arParameters['PaymentInfoURL']);
                unset($arParameters['PeriodAmount']);
                unset($arParameters['PeriodReturnURL']);
                unset($arParameters['PeriodType']);
                unset($arParameters['Redeem']);
                unset($arParameters['UnionPay']);

                unset($arParameters['IgnorePayment']);
                unset($arParameters['ClientRedirectURL']);
            }
            // 整理 Tenpay 參數。
            if ($this->Send['ChoosePayment'] == PaymentMethod::Tenpay) {
                unset($arParameters['CreditInstallment']);
                unset($arParameters['Desc_1']);
                unset($arParameters['Desc_2']);
                unset($arParameters['Desc_3']);
                unset($arParameters['Desc_4']);
                unset($arParameters['Email']);
                unset($arParameters['ExecTimes']);
                unset($arParameters['ExpireDate']);
                unset($arParameters['Frequency']);
                unset($arParameters['InstallmentAmount']);
                unset($arParameters['PaymentInfoURL']);
                unset($arParameters['PeriodAmount']);
                unset($arParameters['PeriodReturnURL']);
                unset($arParameters['PeriodType']);
                unset($arParameters['PhoneNo']);
                unset($arParameters['Redeem']);
                unset($arParameters['UnionPay']);
                unset($arParameters['UserName']);

                unset($arParameters['IgnorePayment']);
                unset($arParameters['ClientRedirectURL']);
            }
            // 整理 ATM 參數。
            if ($this->Send['ChoosePayment'] == PaymentMethod::ATM) {
                unset($arParameters['CreditInstallment']);
                unset($arParameters['Desc_1']);
                unset($arParameters['Desc_2']);
                unset($arParameters['Desc_3']);
                unset($arParameters['Desc_4']);
                unset($arParameters['Email']);
                unset($arParameters['ExecTimes']);
                unset($arParameters['ExpireTime']);
                unset($arParameters['Frequency']);
                unset($arParameters['InstallmentAmount']);
                unset($arParameters['PeriodAmount']);
                unset($arParameters['PeriodReturnURL']);
                unset($arParameters['PeriodType']);
                unset($arParameters['PhoneNo']);
                unset($arParameters['Redeem']);
                unset($arParameters['UnionPay']);
                unset($arParameters['UserName']);

                unset($arParameters['IgnorePayment']);
                if (!$this->SendExtend['ClientRedirectURL']) { unset($arParameters['ClientRedirectURL']); }
            }
            // 整理 BARCODE OR CVS 參數。
            if ($this->Send['ChoosePayment'] == PaymentMethod::BARCODE || $this->Send['ChoosePayment'] == PaymentMethod::CVS) {
                unset($arParameters['CreditInstallment']);
                unset($arParameters['Email']);
                unset($arParameters['ExecTimes']);
                unset($arParameters['ExpireDate']);
                unset($arParameters['ExpireTime']);
                unset($arParameters['Frequency']);
                unset($arParameters['InstallmentAmount']);
                unset($arParameters['PeriodAmount']);
                unset($arParameters['PeriodReturnURL']);
                unset($arParameters['PeriodType']);
                unset($arParameters['PhoneNo']);
                unset($arParameters['Redeem']);
                unset($arParameters['UnionPay']);
                unset($arParameters['UserName']);

                unset($arParameters['IgnorePayment']);
                if (!$this->SendExtend['ClientRedirectURL']) { unset($arParameters['ClientRedirectURL']); }
            }
            // 整理全功能、WebATM OR TopUpUsed 參數。
            if ($this->Send['ChoosePayment'] == PaymentMethod::WebATM || $this->Send['ChoosePayment'] == PaymentMethod::TopUpUsed) {
                unset($arParameters['CreditInstallment']);
                unset($arParameters['Desc_1']);
                unset($arParameters['Desc_2']);
                unset($arParameters['Desc_3']);
                unset($arParameters['Desc_4']);
                unset($arParameters['Email']);
                unset($arParameters['ExecTimes']);
                unset($arParameters['ExpireDate']);
                unset($arParameters['ExpireTime']);
                unset($arParameters['Frequency']);
                unset($arParameters['InstallmentAmount']);
                unset($arParameters['PaymentInfoURL']);
                unset($arParameters['PeriodAmount']);
                unset($arParameters['PeriodReturnURL']);
                unset($arParameters['PeriodType']);
                unset($arParameters['PhoneNo']);
                unset($arParameters['Redeem']);
                unset($arParameters['UnionPay']);
                unset($arParameters['UserName']);

                unset($arParameters['IgnorePayment']);
                unset($arParameters['ClientRedirectURL']);
            }
            // 整理 Credit 參數。
            if ($this->Send['ChoosePayment'] == PaymentMethod::Credit) {
                // Credit 分期。
                $arParameters['Redeem'] = ($arParameters['Redeem'] ? 'Y' : '');
                $arParameters['UnionPay'] = ($arParameters['UnionPay'] ? 1 : 0);

                unset($arParameters['Desc_1']);
                unset($arParameters['Desc_2']);
                unset($arParameters['Desc_3']);
                unset($arParameters['Desc_4']);
                unset($arParameters['Email']);
                unset($arParameters['ExpireDate']);
                unset($arParameters['ExpireTime']);
                unset($arParameters['PaymentInfoURL']);
                unset($arParameters['PhoneNo']);
                unset($arParameters['UserName']);

                unset($arParameters['IgnorePayment']);
                unset($arParameters['ClientRedirectURL']);
            }

            unset($arParameters['Items']);
           
            // 處理電子發票參數
            unset($arParameters['InvoiceItems']);
            if ($this->Send['InvoiceMark'] == InvoiceState::Yes) {
                $encode_fields = array(
                    'CustomerName',
                    'CustomerAddr',
                    'CustomerEmail',
                    'InvoiceItemName',
                    'InvoiceItemWord',
                    'InvoiceRemark'
                );
                foreach ($encode_fields as $tmp_field) {
                    $arParameters[$tmp_field] = urlencode($arParameters[$tmp_field]);
                }
            } else {
                unset($arParameters['InvoiceMark']);
                unset($arParameters['RelateNumber']);
                unset($arParameters['CustomerIdentifier']);
                unset($arParameters['CarruerType']);
                unset($arParameters['CustomerID']);
                unset($arParameters['Donation']);
                unset($arParameters['Print']);
                unset($arParameters['CustomerName']);
                unset($arParameters['CustomerAddr']);
                unset($arParameters['CustomerPhone']);
                unset($arParameters['CustomerEmail']);
                unset($arParameters['TaxType']);
                unset($arParameters['ClearanceMark']);
                unset($arParameters['CarruerNum']);
                unset($arParameters['LoveCode']);
                unset($arParameters['InvoiceItemName']);
                unset($arParameters['InvoiceItemCount']);
                unset($arParameters['InvoiceItemWord']);
                unset($arParameters['InvoiceItemPrice']);
                unset($arParameters['InvoiceItemTaxType']);
                unset($arParameters['InvoiceRemark']);
                unset($arParameters['DelayDay']);
                unset($arParameters['InvType']);
            }
            
            // 資料排序
			// php 5.3以下不支援
			// ksort($arParameters, SORT_NATURAL | SORT_FLAG_CASE);
			uksort($arParameters, array('AllInOne','merchantSort'));

            $szCheckMacValue = "HashKey=$this->HashKey";
            foreach ($arParameters as $key => $value) {
                $szCheckMacValue .= "&$key=$value";
            }
            $szCheckMacValue .= "&HashIV=$this->HashIV";
            $szCheckMacValue = strtolower(urlencode($szCheckMacValue));
            // 取代為與 dotNet 相符的字元
            $szCheckMacValue = str_replace('%2d', '-', $szCheckMacValue);
            $szCheckMacValue = str_replace('%5f', '_', $szCheckMacValue);
            $szCheckMacValue = str_replace('%2e', '.', $szCheckMacValue);
            $szCheckMacValue = str_replace('%21', '!', $szCheckMacValue);
            $szCheckMacValue = str_replace('%2a', '*', $szCheckMacValue);
            $szCheckMacValue = str_replace('%28', '(', $szCheckMacValue);
            $szCheckMacValue = str_replace('%29', ')', $szCheckMacValue);
            // Customize for Magento
            $szCheckMacValue = str_replace('%3f___sid%3d' . session_id(), '', $szCheckMacValue);
            $szCheckMacValue = str_replace('%3f___sid%3du', '', $szCheckMacValue);
            $szCheckMacValue = str_replace('%3f___sid%3ds', '', $szCheckMacValue);
            // MD5 編碼
            $szCheckMacValue = md5($szCheckMacValue);

            $szHtml = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
            $szHtml .= '<div style="text-align:center;" ><form id="__allpayForm" method="post" target="' . $target . '" action="' . $this->ServiceURL . '">';
            foreach ($arParameters as $keys => $value) {
                $szHtml .="<input type='hidden' name='$keys' value='$value' />";
            }
            $szHtml .= '<input type="hidden" name="CheckMacValue" value="' . $szCheckMacValue . '" />';
            // 手動或自動送出表單。
            if (!isset($paymentButton)) {
                $szHtml .= '<script type="text/javascript">document.getElementById("__allpayForm").submit();</script>';
            } else {
                $szHtml .= '<input type="submit" id="__paymentButton" value="' . $paymentButton . '" />';
            }
            $szHtml .= '</form></div>';
        }

        if (sizeof($arErrors) > 0) {
            throw new Exception(join('- ', $arErrors));
        }

        return $szHtml;
    }

    function CheckOutFeedback() {
        // 變數宣告。
        $arErrors = array();
        $arParameters = array();
        $arFeedback = array();
        $szCheckMacValue = '';
        // 重新整理回傳參數。
        foreach ($_POST as $keys => $value) {
            if ($keys != 'CheckMacValue') {
                if ($keys == 'PaymentType') {
                    $value = str_replace('_CVS', '', $value);
                    $value = str_replace('_BARCODE', '', $value);
                    $value = str_replace('_Alipay', '', $value);
                    $value = str_replace('_Tenpay', '', $value);
                    $value = str_replace('_CreditCard', '', $value);
                }
                if ($keys == 'PeriodType') {
                    $value = str_replace('Y', 'Year', $value);
                    $value = str_replace('M', 'Month', $value);
                    $value = str_replace('D', 'Day', $value);
                }
                $arFeedback[$keys] = $value;
            } else {
                $szCheckMacValue = $value;
            }
        }
        // 回傳參數鍵值轉小寫。
        foreach ($_POST as $keys => $value) {
			if ($keys == 'view' || $keys == 'hikashop_front_end_main') {
				// Customize to Skip Parameters for HikaShop
			} else if ($keys == 'mijoshop_store_id' || $keys == 'language') {
				// Customize to Skip Parameters for MijoShop
			} else {
				$arParameters[strtolower($keys)] = $value;
			}
        }
        unset($arParameters['checkmacvalue']);
        ksort($arParameters);
        // 驗證檢查碼。
        if (sizeof($arFeedback) > 0) {
            $szConfirmMacValue = "HashKey=$this->HashKey";
            foreach ($arParameters as $key => $value) {
                $szConfirmMacValue .= "&$key=$value";
            }
            $szConfirmMacValue .= "&HashIV=$this->HashIV";
            $szConfirmMacValue = strtolower(urlencode($szConfirmMacValue));
            // 取代為與 dotNet 相符的字元
            $szConfirmMacValue = str_replace('%2d', '-', $szConfirmMacValue);
            $szConfirmMacValue = str_replace('%5f', '_', $szConfirmMacValue);
            $szConfirmMacValue = str_replace('%2e', '.', $szConfirmMacValue);
            $szConfirmMacValue = str_replace('%21', '!', $szConfirmMacValue);
            $szConfirmMacValue = str_replace('%2a', '*', $szConfirmMacValue);
            $szConfirmMacValue = str_replace('%28', '(', $szConfirmMacValue);
            $szConfirmMacValue = str_replace('%29', ')', $szConfirmMacValue);
            // MD5 編碼
            $szConfirmMacValue = md5($szConfirmMacValue);

            if ($szCheckMacValue != strtoupper($szConfirmMacValue)) {
                array_push($arErrors, 'CheckMacValue verify fail.');
            }
        }

        if (sizeof($arErrors) > 0) {
            throw new Exception(join('- ', $arErrors));
        }

        return $arFeedback;
    }

    function QueryTradeInfo() {
        // 變數宣告。
        $arErrors = array();
        $this->Query['TimeStamp'] = time();
        $arFeedback = array();
        $arConfirmArgs = array();
        // 檢查資料。
        if (strlen($this->ServiceURL) == 0) {
            array_push($arErrors, 'ServiceURL is required.');
        }
        if (strlen($this->ServiceURL) > 200) {
            array_push($arErrors, 'ServiceURL max langth as 200.');
        }
        if (strlen($this->HashKey) == 0) {
            array_push($arErrors, 'HashKey is required.');
        }
        if (strlen($this->HashIV) == 0) {
            array_push($arErrors, 'HashIV is required.');
        }
        if (strlen($this->MerchantID) == 0) {
            array_push($arErrors, 'MerchantID is required.');
        }
        if (strlen($this->MerchantID) > 10) {
            array_push($arErrors, 'MerchantID max langth as 10.');
        }

        if (strlen($this->Query['MerchantTradeNo']) == 0) {
            array_push($arErrors, 'MerchantTradeNo is required.');
        }
        if (strlen($this->Query['MerchantTradeNo']) > 20) {
            array_push($arErrors, 'MerchantTradeNo max langth as 20.');
        }
        if (strlen($this->Query['TimeStamp']) == 0) {
            array_push($arErrors, 'TimeStamp is required.');
        }
        // 呼叫查詢。
        if (sizeof($arErrors) == 0) {
            $arParameters = array("MerchantID" => $this->MerchantID);
            $arParameters = array_merge($arParameters, $this->Query);
            // 資料排序。
            ksort($arParameters);
            // 產生檢查碼。
            $szCheckMacValue = "HashKey=$this->HashKey";
            foreach ($arParameters as $key => $value) {
                $szCheckMacValue .= "&$key=$value";
            }
            $szCheckMacValue .= "&HashIV=$this->HashIV";
            $szCheckMacValue = strtolower(urlencode($szCheckMacValue));
            // 取代為與 dotNet 相符的字元
            $szCheckMacValue = str_replace('%2d', '-', $szCheckMacValue);
            $szCheckMacValue = str_replace('%5f', '_', $szCheckMacValue);
            $szCheckMacValue = str_replace('%2e', '.', $szCheckMacValue);
            $szCheckMacValue = str_replace('%21', '!', $szCheckMacValue);
            $szCheckMacValue = str_replace('%2a', '*', $szCheckMacValue);
            $szCheckMacValue = str_replace('%28', '(', $szCheckMacValue);
            $szCheckMacValue = str_replace('%29', ')', $szCheckMacValue);
            // Customize for Magento
            $szCheckMacValue = str_replace('%3f___sid%3d' . session_id(), '', $szCheckMacValue);
            $szCheckMacValue = str_replace('%3f___sid%3du', '', $szCheckMacValue);
            $szCheckMacValue = str_replace('%3f___sid%3ds', '', $szCheckMacValue);
            // MD5 編碼
            $szCheckMacValue = md5($szCheckMacValue);

            $arParameters["CheckMacValue"] = $szCheckMacValue;
            // 送出查詢並取回結果。
            $szResult = $this->ServerPost($arParameters);
            $szResult = str_replace(' ', '%20', $szResult);
            $szResult = str_replace('+', '%2B', $szResult);
            //$szResult = str_replace('/', '%2F', $szResult);
            //$szResult = str_replace('?', '%3F', $szResult);
            //$szResult = str_replace('%', '%25', $szResult);
            //$szResult = str_replace('#', '%23', $szResult);
            //$szResult = str_replace('&', '%26', $szResult);
            //$szResult = str_replace('=', '%3D', $szResult);
            // 轉結果為陣列。
            parse_str($szResult, $arParameters);
            // 重新整理回傳參數。
            foreach ($arParameters as $keys => $value) {
                if ($keys == 'CheckMacValue') {
                    $szCheckMacValue = $value;
                } else {
                    $arFeedback[$keys] = $value;
                    $arConfirmArgs[strtolower($keys)] = $value;
                }
            }

            ksort($arConfirmArgs);
            // 驗證檢查碼。
            if (sizeof($arFeedback) > 0) {
                $szConfirmMacValue = "HashKey=$this->HashKey";
                foreach ($arConfirmArgs as $key => $value) {
                    $szConfirmMacValue .= "&$key=$value";
                }
                $szConfirmMacValue .= "&HashIV=$this->HashIV";
                $szConfirmMacValue = strtolower(urlencode($szConfirmMacValue));
                // 取代為與 dotNet 相符的字元
                $szConfirmMacValue = str_replace('%2d', '-', $szConfirmMacValue);
                $szConfirmMacValue = str_replace('%5f', '_', $szConfirmMacValue);
                $szConfirmMacValue = str_replace('%2e', '.', $szConfirmMacValue);
                $szConfirmMacValue = str_replace('%21', '!', $szConfirmMacValue);
                $szConfirmMacValue = str_replace('%2a', '*', $szConfirmMacValue);
                $szConfirmMacValue = str_replace('%28', '(', $szConfirmMacValue);
                $szConfirmMacValue = str_replace('%29', ')', $szConfirmMacValue);
                // MD5 編碼
                $szConfirmMacValue = md5($szConfirmMacValue);

                if ($szCheckMacValue != strtoupper($szConfirmMacValue)) {
                    array_push($arErrors, 'CheckMacValue verify fail.');
                }
            }
        }

        if (sizeof($arErrors) > 0) {
            throw new Exception(join('- ', $arErrors));
        }

        return $arFeedback;
    }
	
    function QueryPeriodCreditCardTradeInfo() {
        // 變數宣告。
        $arErrors = array();
        $this->Query['TimeStamp'] = time();
        $arFeedback = array();
        // 檢查資料。
        if (strlen($this->ServiceURL) == 0) {
            array_push($arErrors, 'ServiceURL is required.');
        }
        if (strlen($this->ServiceURL) > 200) {
            array_push($arErrors, 'ServiceURL max langth as 200.');
        }
        if (strlen($this->HashKey) == 0) {
            array_push($arErrors, 'HashKey is required.');
        }
        if (strlen($this->HashIV) == 0) {
            array_push($arErrors, 'HashIV is required.');
        }
        if (strlen($this->MerchantID) == 0) {
            array_push($arErrors, 'MerchantID is required.');
        }
        if (strlen($this->MerchantID) > 10) {
            array_push($arErrors, 'MerchantID max langth as 10.');
        }

        if (strlen($this->Query['MerchantTradeNo']) == 0) {
            array_push($arErrors, 'MerchantTradeNo is required.');
        }
        if (strlen($this->Query['MerchantTradeNo']) > 20) {
            array_push($arErrors, 'MerchantTradeNo max langth as 20.');
        }
        if (strlen($this->Query['TimeStamp']) == 0) {
            array_push($arErrors, 'TimeStamp is required.');
        }
        // 呼叫查詢。
        if (sizeof($arErrors) == 0) {
            $arParameters = array("MerchantID" => $this->MerchantID);
            $arParameters = array_merge($arParameters, $this->Query);
            // 資料排序。
            ksort($arParameters);
            // 產生檢查碼。
            $szCheckMacValue = "HashKey=$this->HashKey";
            foreach ($arParameters as $key => $value) {
                $szCheckMacValue .= "&$key=$value";
            }
            $szCheckMacValue .= "&HashIV=$this->HashIV";
            $szCheckMacValue = strtolower(urlencode($szCheckMacValue));
            // 取代為與 dotNet 相符的字元
            $szCheckMacValue = str_replace('%2d', '-', $szCheckMacValue);
            $szCheckMacValue = str_replace('%5f', '_', $szCheckMacValue);
            $szCheckMacValue = str_replace('%2e', '.', $szCheckMacValue);
            $szCheckMacValue = str_replace('%21', '!', $szCheckMacValue);
            $szCheckMacValue = str_replace('%2a', '*', $szCheckMacValue);
            $szCheckMacValue = str_replace('%28', '(', $szCheckMacValue);
            $szCheckMacValue = str_replace('%29', ')', $szCheckMacValue);
            // Customize for Magento
            $szCheckMacValue = str_replace('%3f___sid%3d' . session_id(), '', $szCheckMacValue);
            $szCheckMacValue = str_replace('%3f___sid%3du', '', $szCheckMacValue);
            $szCheckMacValue = str_replace('%3f___sid%3ds', '', $szCheckMacValue);
            // MD5 編碼
            $szCheckMacValue = md5($szCheckMacValue);

            $arParameters["CheckMacValue"] = $szCheckMacValue;
            // 送出查詢並取回結果。
            $szResult = $this->ServerPost($arParameters);
            $szResult = str_replace(' ', '%20', $szResult);
            $szResult = str_replace('+', '%2B', $szResult);
            //$szResult = str_replace('/', '%2F', $szResult);
            //$szResult = str_replace('?', '%3F', $szResult);
            //$szResult = str_replace('%', '%25', $szResult);
            //$szResult = str_replace('#', '%23', $szResult);
            //$szResult = str_replace('&', '%26', $szResult);
            //$szResult = str_replace('=', '%3D', $szResult);
            // 轉結果為陣列。
            parse_str($szResult, $arFeedback);
        }

        if (sizeof($arErrors) > 0) {
            throw new Exception(join('- ', $arErrors));
        }

        return $arFeedback;
    }

    function DoAction() {
        // 變數宣告。
        $arErrors = array();
        $arFeedback = array();
        // 檢查資料。
        if (strlen($this->ServiceURL) == 0) {
            array_push($arErrors, 'ServiceURL is required.');
        }
        if (strlen($this->ServiceURL) > 200) {
            array_push($arErrors, 'ServiceURL max langth as 200.');
        }
        if (strlen($this->HashKey) == 0) {
            array_push($arErrors, 'HashKey is required.');
        }
        if (strlen($this->HashIV) == 0) {
            array_push($arErrors, 'HashIV is required.');
        }
        if (strlen($this->MerchantID) == 0) {
            array_push($arErrors, 'MerchantID is required.');
        }
        if (strlen($this->MerchantID) > 10) {
            array_push($arErrors, 'MerchantID max langth as 10.');
        }

        if (strlen($this->Action['MerchantTradeNo']) == 0) {
            array_push($arErrors, 'MerchantTradeNo is required.');
        }
        if (strlen($this->Action['MerchantTradeNo']) > 20) {
            array_push($arErrors, 'MerchantTradeNo max langth as 20.');
        }
        if (strlen($this->Action['TradeNo']) == 0) {
            array_push($arErrors, 'TradeNo is required.');
        }
        if (strlen($this->Action['TradeNo']) > 20) {
            array_push($arErrors, 'TradeNo max langth as 20.');
        }
        if (strlen($this->Action['Action']) == 0) {
            array_push($arErrors, 'Action is required.');
        }
        if (strlen($this->Action['Action']) > 1) {
            array_push($arErrors, 'Action max length as 1.');
        }
        if (strlen($this->Action['TotalAmount']) == 0) {
            array_push($arErrors, 'TotalAmount is required.');
        }
        // 呼叫信用卡訂單處理。
        if (sizeof($arErrors) == 0) {
            $arParameters = array("MerchantID" => $this->MerchantID);
            $arParameters = array_merge($arParameters, $this->Action);
            // 資料排序。
            ksort($arParameters);
            // 產生檢查碼。
            $szCheckMacValue = "HashKey=$this->HashKey";
            foreach ($arParameters as $key => $value) {
                $szCheckMacValue .= "&$key=$value";
            }
            $szCheckMacValue .= "&HashIV=$this->HashIV";
            $szCheckMacValue = strtolower(urlencode($szCheckMacValue));
            // 取代為與 dotNet 相符的字元
            $szCheckMacValue = str_replace('%2d', '-', $szCheckMacValue);
            $szCheckMacValue = str_replace('%5f', '_', $szCheckMacValue);
            $szCheckMacValue = str_replace('%2e', '.', $szCheckMacValue);
            $szCheckMacValue = str_replace('%21', '!', $szCheckMacValue);
            $szCheckMacValue = str_replace('%2a', '*', $szCheckMacValue);
            $szCheckMacValue = str_replace('%28', '(', $szCheckMacValue);
            $szCheckMacValue = str_replace('%29', ')', $szCheckMacValue);
            // Customize for Magento
            $szCheckMacValue = str_replace('%3f___sid%3d' . session_id(), '', $szCheckMacValue);
            $szCheckMacValue = str_replace('%3f___sid%3du', '', $szCheckMacValue);
            $szCheckMacValue = str_replace('%3f___sid%3ds', '', $szCheckMacValue);
            // MD5 編碼
            $szCheckMacValue = md5($szCheckMacValue);

            $arParameters["CheckMacValue"] = $szCheckMacValue;
            // 送出查詢並取回結果。
            $szResult = $this->ServerPost($arParameters);
            // 轉結果為陣列。
            parse_str($szResult, $arParameters);
            // 重新整理回傳參數。
            foreach ($arParameters as $keys => $value) {
                if ($keys == 'CheckMacValue') {
                    $szCheckMacValue = $value;
                } else {
                    $arFeedback[$keys] = $value;
                }
            }

            if (array_key_exists('RtnCode', $arFeedback) && $arFeedback['RtnCode'] != '1') {
                array_push($arErrors, vsprintf('#%s: %s', array($arFeedback['RtnCode'], $arFeedback['RtnMsg'])));
            }
        }

        if (sizeof($arErrors) > 0) {
            throw new Exception(join('- ', $arErrors));
        }

        return $arFeedback;
    }

    function AioChargeback() {
        // 變數宣告。
        $arErrors = array();
        $arParameters = array("MerchantID" => $this->MerchantID);
        $arParameters = array_merge($arParameters, $this->ChargeBack);
        $arFeedback = array();
        // 檢查資料。
        if (strlen($this->ServiceURL) == 0) {
            array_push($arErrors, 'ServiceURL is required.');
        }
        if (strlen($this->ServiceURL) > 200) {
            array_push($arErrors, 'ServiceURL max langth as 200.');
        }
        if (strlen($this->HashKey) == 0) {
            array_push($arErrors, 'HashKey is required.');
        }
        if (strlen($this->HashIV) == 0) {
            array_push($arErrors, 'HashIV is required.');
        }
        if (strlen($this->MerchantID) == 0) {
            array_push($arErrors, 'MerchantID is required.');
        }
        if (strlen($this->MerchantID) > 10) {
            array_push($arErrors, 'MerchantID max langth as 10.');
        }

        if (strlen($this->ChargeBack['MerchantTradeNo']) == 0) {
            array_push($arErrors, 'MerchantTradeNo is required.');
        }
        if (strlen($this->ChargeBack['MerchantTradeNo']) > 20) {
            array_push($arErrors, 'MerchantTradeNo max langth as 20.');
        }
        if (strlen($this->ChargeBack['TradeNo']) == 0) {
            array_push($arErrors, 'TradeNo is required.');
        }
        if (strlen($this->ChargeBack['TradeNo']) > 20) {
            array_push($arErrors, 'TradeNo max langth as 20.');
        }
        if (strlen($this->ChargeBack['ChargeBackTotalAmount']) == 0) {
            array_push($arErrors, 'ChargeBackTotalAmount is required.');
        }
        if (strlen($this->ChargeBack['Remark']) > 200) {
            array_push($arErrors, 'Remark max length as 200.');
        }
        // 資料排序。
        ksort($arParameters);
        // 產生檢查碼。
        $szCheckMacValue = "HashKey=$this->HashKey";
        foreach ($arParameters as $key => $value) {
            $szCheckMacValue .= "&$key=$value";
        }
        $szCheckMacValue .= "&HashIV=$this->HashIV";
        $szCheckMacValue = strtolower(urlencode($szCheckMacValue));
        // 取代為與 dotNet 相符的字元
        $szCheckMacValue = str_replace('%2d', '-', $szCheckMacValue);
        $szCheckMacValue = str_replace('%5f', '_', $szCheckMacValue);
        $szCheckMacValue = str_replace('%2e', '.', $szCheckMacValue);
        $szCheckMacValue = str_replace('%21', '!', $szCheckMacValue);
        $szCheckMacValue = str_replace('%2a', '*', $szCheckMacValue);
        $szCheckMacValue = str_replace('%28', '(', $szCheckMacValue);
        $szCheckMacValue = str_replace('%29', ')', $szCheckMacValue);
        // Customize for Magento
        $szCheckMacValue = str_replace('%3f___sid%3d' . session_id(), '', $szCheckMacValue);
        $szCheckMacValue = str_replace('%3f___sid%3du', '', $szCheckMacValue);
        $szCheckMacValue = str_replace('%3f___sid%3ds', '', $szCheckMacValue);
        // MD5 編碼
        $szCheckMacValue = md5($szCheckMacValue);

        $arParameters["CheckMacValue"] = $szCheckMacValue;
        // 送出查詢並取回結果。
        $szResult = $this->ServerPost($arParameters);
        // 檢查結果資料。
        if ($szResult == '1|OK') {
            $arFeedback['RtnCode'] = '1';
            $arFeedback['RtnMsg'] = 'OK';
        } else {
            array_push($arErrors, str_replace('-', ': ', $szResult));
        }

        if (sizeof($arErrors) > 0) {
            throw new Exception(join('- ', $arErrors));
        }

        return $arFeedback;
    }

    private function ServerPost($parameters) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->ServiceURL);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        $rs = curl_exec($ch);

        curl_close($ch);

        return $rs;
    }

    /**
	* 自訂排序使用
	*/
	private static function merchantSort($a,$b)
	{
		return strcasecmp($a, $b);
	}
    
}
