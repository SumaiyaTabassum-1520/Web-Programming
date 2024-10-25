<?php
class Account {
    private $accountID;
    private $accountBalance;
    private static $count = 0;

    public function __construct($id, $initialBalance) {
        $this->accountID = $id;
        $this->accountBalance = $initialBalance;
        self::$count++; 
    }

    public function showInformation() {
        echo "Account ID: {$this->accountID}\n";
        echo "Account Balance: {$this->accountBalance}\n";
    }

    public function deposit($amount) {
        $this->accountBalance += $amount;
    }

    public function withdraw($amount) {
        if ($amount <= $this->accountBalance) {
            $this->accountBalance -= $amount;
        } else {
            echo "Insufficient balance\n";
        }
    }

    public function showAccountInfo() {
        echo "Account Information:\n";
        $this->showInformation();
    }

    public function transferMoney($account, $amount) {
        if ($amount <= $this->accountBalance) {
            $this->accountBalance -= $amount;
            $account->deposit($amount);
            echo "successfull\n";
        } 
    }

    public static function getCount() {
        return self::$count;
    }
}

// Create accounts and test functionality
$account1 = new Account('sumaiya', 10000);
$account2 = new Account('zara', 15000);

$account1->showAccountInfo();
$account1->deposit(500);
$account1->withdraw(200);
$account1->showAccountInfo();

$account2->showAccountInfo();
$account2->transferMoney($account1, 300);
$account2->showAccountInfo();
?>
