<?php

class ProductionTime
{
	const ONE_DAY_TIMESTAMP = 60 * 60 * 24;

	protected static $holiday = array('2018-01-01', '2018-01-02', '2018-03-01', '2018-04-06', '2018-04-13', '2018-04-14', '2018-04-15', '2018-04-16', '2018-05-01');

	protected static $maxDayProcess = 20;


	protected function getWorkDay($date)
	{
		for( $i = 1; $i <= self::$maxDayProcess; $i++ )
    	{
    		if( self::isHoliday($date) )
	        {
	        	$date = date('Y-m-d', strtotime($date) + self::ONE_DAY_TIMESTAMP );
	        }
	        else
	        {
	        	break;
	        }
    	}

    	return $date;
	}

    static public function Delivery($order_date)
    {

    	// Get working day
    	$workingDay = self::getWorkDay($order_date);

    	// Process to produce 1 day
    	$dayAfterIncreaseProduce = date('Y-m-d', strtotime($workingDay) + self::ONE_DAY_TIMESTAMP );

    	$processDay = self::getWorkDay($dayAfterIncreaseProduce);

    	// Process to ship 1 day
    	$dayAfterIncreaseShip = date('Y-m-d', strtotime($processDay) + self::ONE_DAY_TIMESTAMP );

    	$deliveryDate = self::getWorkDay($dayAfterIncreaseShip);

        // return delivery date
        return $deliveryDate;
    }

    static protected function isHoliday($order_date)
    {
    	return in_array( $order_date, self::$holiday) ? true : false;
	}                 
}  


echo 'The conditon of question unclear, Anyway the result are: <br/><br/>';
echo 'Delivery 2018-04-11 can get product: '. ProductionTime::Delivery('2018-04-11') .'<br/>';
echo 'Delivery 2018-04-13 can get product: '. ProductionTime::Delivery('2018-04-13') .'<br/>';
echo 'Delivery 2018-04-19 can get product: '. ProductionTime::Delivery('2018-04-19') .'<br/>';
//echo ProductionTime::Delivery('2018-04-11');
// result 2018-04-17

