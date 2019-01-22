<?php

class DateTimeHandler extends DateTime {
	
	private  $formatter = null; 
	
	public function __construct($time, DateTimeZone $zone=null){
		Locale::setDefault('tr_TR.utf-8');
		$this->setFormatterInstance();
		parent::__construct($time,$zone);
	}
	
	private  function setFormatterInstance(){

			$this->formatter = new IntlDateFormatter( 
			    "tr-TR", 
			    IntlDateFormatter::LONG, 
			    IntlDateFormatter::NONE, 
			    "Europe/Istanbul", 
			    IntlDateFormatter::GREGORIAN, 
			    "YYYY-MM-DD" 
			);	
				
	}

    public function diff($now = 'NOW',$absolute=null) {
        if(!($now instanceOf DateTime)) {
            $now = new DateTime($now);
        }
        return parent::diff($now);
    }

    public function getAge($now = 'NOW') {
        return $this->diff($now)->format('%y');
    }
	
	public function format($format){
		$this->formatter->setPattern($format);
		return $this->formatter->format($this);
	}
	


}

$birthday = new DateTimeHandler('1879-03-14 23:00:00');
echo $birthday->format("dd MM YYYY EEEE");

echo '<p>Albert Einstein yaşasaydı ', $birthday->getAge(), ' yaşında olurdu.</p>';
echo '<p>Albert Einstein yaşasaydı ', $birthday->diff()->format('%y Years, %m Months, %d Days'), ' yaşında olurdu.</p>';
echo '<p>Albert Einstein, 2010-01-01 yılında yaşasaydı ', $birthday->getAge('2010-01-01'), ' yaşında olurdu.</p>';




$today = new DateTime('today');
var_dump($today);

$today -> modify('-2 days');
var_dump($today);

die();

echo $today -> format('Y-m-d') . PHP_EOL;

$today = new DateTime('today');
var_dump($today);

$today -> add(new DateInterval('P2D')) -> sub(new DateInterval('P1M'));
var_dump($today);

die();
$today -> sub(new DateInterval('P1M'));
var_dump($today);

die();

$today = new DateTime('today');
$TCFirstDay = new DateTime('1923-10-29');

$interval = $today -> diff($TCFirstDay);

var_dump($today > $TCFirstDay);
var_dump($today < $TCFirstDay);
var_dump($today == $TCFirstDay);
var_dump($interval);

echo 'Cumhuriyetin ilanından bugüne ', $interval -> format('%y'), ' yıl geçti';

die();

echo '<h3>Mevcut zaman</h3>';

$currentDateTime = new DateTime();
echo $currentDateTime -> format('d.m.Y H:i:s');

die();

echo '<h3>Dün</h3>';
$yesterday = new DateTime('yesterday');
var_dump($yesterday);

echo '<h3>İki gün sonra</h3>';
$twoDaysLater = new DateTime('+ 2 days');
var_dump($twoDaysLater);

echo '<h3>1 hafta önce</h3>';
$oneWeekEarly = new DateTime('- 1 week');
var_dump($oneWeekEarly);

echo '<h3>Özbekistan Taşkent\'te dün. </h3>';
$yesterdayInTashkent = new DateTime('yesterday', new DateTimeZone('Asia/Tashkent'));
var_dump($yesterdayInTashkent);
