<?php
require_once("plays.php");
require_once("invoices.php");

class Bill
{
    private $invoice;
    private $plays;

    public function __construct(array $invoice, array $plays)
    {
        $this->invoice = $invoice;
        $this->plays = $plays;    
    }

    public function show() 
    {
        $totalAmount = 0;
        $volumeCredits = 0;
        $result = "Statement for ".$this->invoice[0]['customer']."\n";
        $formater = new NumberFormatter("en-US", NumberFormatter::CURRENCY);
    
        foreach($this->invoice[0]['performances'] as $perf) {
            $play = $this->plays[$perf['playID']];
            $thisAmount = 0;

            switch ($play["type"]) {
                case 'tragedy':
                    $thisAmount = 40000;
                    if ($perf['audience'] > 30) {
                        $thisAmount += 1000 * ($perf['audience'] - 30);
                    }
                    break;
                case 'comedy':
                    $thisAmount = 30000;
                    if ($perf['audience'] > 20) {
                        $thisAmount += 10000 + 500 * ($perf['audience'] - 20);
                    }
                    $thisAmount += 300 * $perf['audience'];
                    break;
                
                default:
                    throw new Exception("Unknown type: ".$play["type"], 400);
            }
    
            //soma creditos por volume
            $volumeCredits += max($perf['audience'] - 30, 0);
            // soma uma credito extra para cada dez espectadores de com�dia
            if ('comedy' === $play['type']) $volumeCredits += floor($perf['audience'] / 5);
    
            // exibe a linha para  esta requisicao
            $result .= $play['name'].": ".$formater->format($thisAmount/100)." (".$perf['audience']." seats)\n";
            $totalAmount += $thisAmount;
        }
        $result .= "Amount owed is ".$formater->format($totalAmount/100)."\n";
        $result .= "You earned {$volumeCredits} credits \n";
    
        return $result;
    }

}

$Bill = new Bill($invoice, $plays);
echo $Bill->show();