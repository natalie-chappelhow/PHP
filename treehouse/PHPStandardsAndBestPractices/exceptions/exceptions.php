<?php
	//making an exception be thrown

	ini_set('display_errors', 1);//display errors. 1 - means true. Help to recognise any unexpected errors


	//HTTP download script which will download the body of any URL provided


	//defining multiple types of exception
	class HttpRedirectException extends Exception {}
	class HttpClientException extends Exception {}
	class HttpServerException extends Exception {}

	//defining a function named fetch HTTP body. It takes an argument - a URL. Argument is a string value of the URL to download
	function fetchHttpBody($url)
	{
		$browser = new Buzz\Browser(); //instantiates a class called Browser which lives in the Buzz namespace. This package allows work with HTTP interactions without the need for curl
		$response = $browser->get($url); //instantiated browser object and is running the get(), passing $url as an argument

		$content = $response->getContent();//downloading the content of the response - HTTP body 
		$statusCode = $response->getStatusCode();//running the getStatus() and storing in a status code variable

		$statusGroup = substr((string) $statusCode, 0, 1);//creating new statusGroup. Finding out the first digit of the string is. e.g. if get 400 code it takes the 4

		switch ($statusGroup) {
			case '2':
				return $content;

			case '3':
				throw new HttpRedirectException('HTTP request was redirected' . $statusCode);

			case '4':
				throw new HttpClientException('You made a bad request' . $statusCode);

			case '5':
				throw new HttpServerException('The server you tried calling is not okay' . $statusCode);

			default:
				throw new Exception('Got an unexpected status code of ' . $statusGroup);

		}
	}

	//now try this request
	//try block - should look out for any exceptions being thrown and if the exceptions being thrown match any, then the piece of code in the catch block will run
	try{ //calling fetchHttpBody() and echoing the result
		echo fetchHttpBody('http://example.org');
	
	} catch(HttpRedirectException $e){
		printf('Redirect error: %s (code %d)', $e->getMessage(), $e->getCode());//outputting getMessage() and the code

	} catch(HttpClientException $e){
		printf('Client error: %s (code %d)', $e->getMessage(), $e->getCode());
	
	} catch(HttpServerException $e){
		printf('Server error: %s (code %d)', $e->getMessage(), $e->getCode());
	
	} catch(Exception $e){
		echo 'General error: ' . $e->getMessage();
	}



?>