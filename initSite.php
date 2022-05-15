<?php

/**
The MIT License (MIT)

Shaheed Ahmed Dewan Sagar
Email : sdewan64@gmail.com
Ahsanullah University of Science and Technology,Dhaka,Bangladesh.
Copyright (c) 2014                      

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
*/
require_once 'class.DatabaseConstants.php';
require_once '../uses_classes/class.DBase.php';
require_once 'class.SiteConstant.inc';

$db = new DatabaseConstants();
//initiating databse class
$dBase = new DBase($db->getHost(),$db->getUser(), $db->getPass());
$dBase->setDatabaseName($db->getDb());
if($dBase->connectDatabase()){
    $siteQuery = mysqli_query($dBase->getDbobj(),'SELECT title,link,header FROM siteinfo WHERE id=1');
    $siteData = mysqli_fetch_assoc($siteQuery);
}
$dBase->closeDatabse($dBase->getDbobj());

//initiating SiteConstant class
$siteConstant = new SiteConstant($siteData['title'],$siteData['link'],$siteData['header']);



//adding external files
//css files
$siteConstant->addFile('css', 'design.css');

//jquery files
$siteConstant->addFile('jq', 'jquery.js');
$siteConstant->addFile('jq', 'menu.js');
