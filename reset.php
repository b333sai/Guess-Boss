<?php
include("header.php");
mysql_query("update animals set done='0' ");
mysql_query("update carcompanies set done='0' ");
mysql_query("update chocolatecompanies set done='0' ");
mysql_query("update clothingbrands set done='0' ");
mysql_query("update countrycapitals set done='0' ");
mysql_query("update electronicgoodcompanies set done='0' ");
mysql_query("update movies set done='0' ");
mysql_query("update countries set done='0' ");
?>