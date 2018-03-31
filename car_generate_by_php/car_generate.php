<?php

class Truck
{
	protected $text;

    protected function setText($text)
    {
    	// set text here
        $this->text = $text;
    }
}  

class TruckCopy extends Truck
{
	private $color;

    private function setBodyColor($color)
    {
    	// set color here
        $this->color = $color;
    }

    public function getTruckHtml($color, $text)
	{
	    // create the truck with html here

	    $this->setText($text);

	    $this->setBodyColor($color);

	    // Split text to 2 lines.
	    list($text1, $text2) = explode(',', $this->text);

	    return '  
	    		
					<div id="car">
						<div class="wheel-container" id="wheel1">
						  <div class="wheel1-line"></div>
						</div>

						<div class="wheel-container" id="wheel2">
						  <div class="wheel1-line"></div>
						</div>

						<div id="car-front"></div>

						<div id="car-floor" style="background-color: '. $this->color .'"></div>

						<div id="car-divided" style="background-color: '. $this->color .'"></div>

						<div id="car-carry" style="background-color: '. $this->color .'">
							<div id="carry-label">
								<div>'. $text1 .'</div>
								<div>'. $text2 .'</div>
							</div>
						</div>
					</div>
				
	    ';
	}    
}

$truck_a = (new TruckCopy())->getTruckHtml('#CCE70B','Hello, Ecommerce.'); 
$truck_b = (new TruckCopy())->getTruckHtml('#E5560E','Hi, Magento.'); 


echo $truck_a;
echo '<br />';
echo $truck_b;

?>

<style type="text/css">
  
    	@keyframes animateCircle1
		{
			0%
			{
				transform: rotate(0deg);
			}
			100%
			{
				transform: rotate(360deg);
			}
		}


		.wheel-container{
		    display: block;
		    position: absolute;
		    background: #929998;
		    width: 30px;
		    height: 30px;
		    border-radius: 50%;
		}

		#wheel1 {
			top: 70%;
		    left: 60%;

		}

		h1 {
			text-align: center;
		}

		#wheel2 {
			top: 70%;
		    left: 20%;
		}

		.wheel1-line {
		  height: 100%;
		  width: 10%;
		  background-color: white;
		  left: 50%;
		  top: 0;
		  position: absolute;
		  animation: animateCircle1 5s linear infinite;
		}

		#frame {
			margin: 0 auto;
			left: 500px;
			top: 500px;
			width: 70%;
			height: 100%;
		}

		#car {
			margin: 0 auto;
			position: relative;
			width: 300px;
			height: 200px;
			top: 60%;
		}

		#car-front {
			display: block;
		    position: absolute;
		    background: #96d3d0;
		    width: 60px;
		    height: 60px;
		    border-radius: 50%;
		  	left: 65%;
		  	top: 40%;
		}

		#car-floor {
			position: absolute;
			background: #c7d811;
			width: 70%;
			height: 7%;
			top: 65%;
			left: 13%;
		}

		#car-divided {
			position: absolute;
			background: #c7d811;
			width: 11%;
			height: 25%;
			top: 40%;
			left: 64%;
		}

		#car-carry {
			position: absolute;
			background: #e8edec;
			width: 50%;
			height: 40%;
			top: 24%;
			left: 13%;
		}

		#carry-label {
			font-size: 22px;
			top: 20%;
			left: 10%;
			position: absolute;
		}



</style>