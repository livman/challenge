var marginCarLeft = 0;
var marginCarRight = 35;
var screenSideWidth = 280;

function endOfRightWall(currentPos, endWallPos)
{
	if( (currentPos + marginCarLeft) > endWallPos )
	{
		return -(marginCarLeft) - screenSideWidth + 30;
	}

	return currentPos;
}

function endOfLeftWall(currentPos, endWallPos)
{
	if( (currentPos - marginCarRight) < -(screenSideWidth) )
	{
		return endWallPos;
	}

	return currentPos;
}

$(function () {

    $(document).on('keydown', function (event) {

    	var currentBackPos = parseInt($('#car').css('left'));
    	var nextBackPos;

    	// Left arrow 
        if (event.keyCode == 37) 
        {
        	
        	nextBackPos = endOfLeftWall((currentBackPos - 2), 800);
        	$('.wheel1-line').css('animation', 'animateCircleBackward 5s linear infinite');
            $('#car').css('left', nextBackPos);
        }

        // Right arrow 
        if (event.keyCode == 39) 
        {
        	nextBackPos = endOfRightWall((currentBackPos + 2), 800);
        	$('.wheel1-line').css('animation', 'animateCircleForward 5s linear infinite');
            $('#car').css('left', nextBackPos);
        }
        
    });

    $(document).on('keyup', function (event) {
    	$('.wheel1-line').css('animation', '');
    });
});