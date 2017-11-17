<?php

if(!emptyempty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
	// If AJAX Request Then
} else {
	//something else
}