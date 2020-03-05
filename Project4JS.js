function addMovie(movieID) 
{
    window.location.replace("./index.php?action=add&movie_id=" + movieID);
    return true;
}

function confirmCheckout() 
{
    if(confirm("Checkout: Are you sure?"))
	{
        window.location.replace("./index.php?action=checkout");
        return true;
    } 
	else 
	{
        return false;
    }
}

function confirmLogout() 
{
    if(confirm("Logout of myMovies Express: Are you sure?"))
	{
        window.location.replace("./logon.php?action=logoff");
        return true;
    }
	else 
	{
        return false;
    }
}

function confirmRemove(title, movieID) {
    if(confirm("Remove " + title + " from your cart: Are you sure?"))
	{
        window.location.replace("./index.php?action=remove&movie_id=" + movieID);
        return true;
    } 
	else 
	{
        return false;
    }
}