<?php 
	
	/*entree des donner*/
	function parfeu($donne)
	{
		/*verification du typage de la donne si c'estun (int)*/
		if (ctype_digit($donne)) 
		{
			$donne = stripcslashes($donne);
			$donne = htmlspecialchars($donne);	
		}
		/*Pour tous les autres typages */
		else
		{
			$donne = stripcslashes($donne);
			$donne = htmlspecialchars($donne);
		}//fin du if
	} //fin de la function 

 ?>