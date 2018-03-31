<?php

class ProductionTime
{
	const ONE_DAY_TIMESTAMP = 60 * 60 * 24;

	protected $holiday = array('2018-01-01', '2018-01-02', '2018-03-01', '2018-04-06', '2018-04-13', '2018-04-14', '2018-04-15', '2018-04-16', '2018-05-01');

	protected $maxDayProcess = 20;

	public function __construct()
	{
		date_default_timezone_set("Asia/Bangkok");
	}

	protected function getWorkDay($date)
	{
		for( $i = 1; $i <= $this->maxDayProcess; $i++ )
    	{
    		if( $this->isHoliday($date) )
	        {
	        	$date = date('Y-m-d', strtotime($date) + (self::ONE_DAY_TIMESTAMP * 1) );
	        }
	        else
	        {
	        	break;
	        }
    	}

    	return $date;
	}

    public function Delivery($order_date)
    {

    	// Get working day
    	$workingDay = $this->getWorkDay($order_date);

    	// Process to produce 1 day
    	$dayAfterIncreaseProduce = date('Y-m-d', strtotime($workingDay) + (self::ONE_DAY_TIMESTAMP * 1) );

    	$processDay = $this->getWorkDay($dayAfterIncreaseProduce);

    	// Process to ship 1 day
    	$dayAfterIncreaseShip = date('Y-m-d', strtotime($processDay) + (self::ONE_DAY_TIMESTAMP * 1) );

    	$deliveryDate = $this->getWorkDay($dayAfterIncreaseShip);

        // return delivery date
        return $deliveryDate;
    }

    protected function isHoliday($order_date)
    {
    	return in_array( $order_date, $this->holiday) ? true : false;
	}                 
}  

echo 'The conditon of question unclear, Anyway the result are: <br/><br/>';
echo 'Delivery 2018-04-11 can get product: '. (new ProductionTime())->Delivery('2018-04-11') .'<br/>';
echo 'Delivery 2018-04-13 can get product: '.(new ProductionTime())->Delivery('2018-04-13') .'<br/>';
echo 'Delivery 2018-04-19 can get product: '.(new ProductionTime())->Delivery('2018-04-19') .'<br/>';
//echo ProductionTime::Delivery('2018-04-11');
// result 2018-04-17

