<?php

class GroupNumber
{
	protected $maxNumber = 500;

	protected $allowedGroup = array(3, 5, 9, 15, 20);

	protected $tempReserveNumber = array();

	protected function isAllowedGroup($group)
	{
		return in_array($group, $this->allowedGroup);
	}

    public function getGroupNumber($group)
    {
    	// Restrict if group not allowed
    	if ( ! $this->isAllowedGroup($group) ) { throw new Exception("Group must be 3, 5, 9, 15, 20"); }

    	$result = array();

    	for( $i = $group; $i <= $this->maxNumber; $i++ )
    	{
    		// Skip if number is reserved by another group
    		if ( isset( $this->tempReserveNumber[$i] ) )
    		{
    			continue;
    		}

    		if ( $i % $group != 0 ) { continue; }

    		$this->tempReserveNumber[$i] = $i;

    		$result[] = $i;
    	}

    	return $result;
    }    
}  
$group_number    = new GroupNumber();

$group_20     = $group_number->getGroupNumber(20);

$group_15     = $group_number->getGroupNumber(15);

$group_9      = $group_number->getGroupNumber(9);

$group_5      = $group_number->getGroupNumber(5);

$group_3      = $group_number->getGroupNumber(3);


echo 'Group#20: '.implode(',', $group_20);

echo '<br/>';

echo 'Group#15: '.implode(',', $group_15);

echo '<br/>';

echo 'Group#9: '.implode(',', $group_9);

echo '<br/>';

echo 'Group#5: '.implode(',', $group_5);

echo '<br/>';

echo 'Group#3: '.implode(',', $group_3);