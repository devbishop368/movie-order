<?php 
    session_start();
    processPageRequest();

    function displaySearchForm() 
	{
		require_once './templates/search_form.html';
    }

    function displaySearchResults($searchString) 
	{
        $results = file_get_contents('http://www.omdbapi.com/?apikey=2934cb28&s='.urlencode($searchString).'&type=movie&r=json');
        $movies = json_decode($results, true)["Search"];
        
		require_once './templates/results_form.html';
    }

    function processPageRequest() 
	{
		if($_SERVER['REQUEST_METHOD'] === 'POST') 
		{
			if(isset($_POST['keyword']))
			{
				displaySearchResults($_POST['keyword']);
			}
        }
		else 
		{
			displaySearchForm();
		}           
    }
?>