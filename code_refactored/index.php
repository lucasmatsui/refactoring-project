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
        return $this->renderPlainText();
    }

    private function renderPlainText()
    {
        $result = "Statement for ".$this->invoice[0]['customer']."\n";
        
        foreach($this->invoice[0]['performances'] as $perf) {
            $result .= $this->playFor($perf)['name'].": ".$this->usd($this->amountFor($perf))." (".$perf['audience']." seats)\n";
        }

        $result .= "Amount owed is ".$this->usd($this->totalAmount())."\n";
        $result .= "You earned {$this->totalVolumeCredits()} credits \n";
    
        return $result;
    }

    private function amountFor(array $performance)
    {
        $result = 0;

        switch ($this->playFor($performance)["type"]) {
            case 'tragedy':
                $result = 40000;
                if ($performance['audience'] > 30) {
                    $result += 1000 * ($performance['audience'] - 30);
                }
                break;
            case 'comedy':
                $result = 30000;
                if ($performance['audience'] > 20) {
                    $result += 10000 + 500 * ($performance['audience'] - 20);
                }
                $result += 300 * $performance['audience'];
                break;
            
            default:
                throw new Exception("Unknown type: ".$this->playFor($performance)["type"], 400);
        }

        return $result;
    }

    private function playFor(array $performance)
    {
        return $this->plays[$performance['playID']];
    }

    private function volumeCreditsFor(array $performance)
    {
        $result = 0;

        $result += max($performance['audience'] - 30, 0);

        if ('comedy' === $this->playFor($performance)['type']) {
            $result += floor($performance['audience'] / 5);
        } 

        return $result;

    }

    private function usd(float $number)
    {
        $NumberFormatter = new NumberFormatter("en-US", NumberFormatter::CURRENCY);
        return $NumberFormatter->format($number/100);
    }

    private function totalVolumeCredits()
    {
        $result = 0;

        foreach($this->invoice[0]['performances'] as $perf) {
            $result += $this->volumeCreditsFor($perf);
        }

        return $result;
    }

    private function totalAmount()
    {
        $result = 0;

        foreach($this->invoice[0]['performances'] as $perf) {
            $result += $this->amountFor($perf);
        }

        return $result;
    }

}

$Bill = new Bill($invoice, $plays);
echo $Bill->show();