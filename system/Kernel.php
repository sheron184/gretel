<?php 

/*
 *
 *  Kernel consist of major middleware of the application
 * 
 * */

namespace System;

use System\Request;

function initRateLmitter($request: Request){
  
}

function initKernelMiddleware(){
  $request = new Request();
  initRateLimitter($request);
}


