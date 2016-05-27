<?php


//Összes  termék kikeresése a wp_post táblából ID szerint növekvő sorrendben rendezve

function termekek_osszes()
{ 
 echo '<h3>Kiolvasott termékadatok aktív és NEM aktív termékek az "elfogyott"-akat kivéve: </h3>';
$product = mysql_query ("SELECT * 
FROM  `wp_posts` 
WHERE  `post_type` =  'product'
OR  `post_type` =  'attachment'
AND  `post_title` NOT LIKE  '%fogyott%'
AND  `post_status` NOT LIKE  '%inherit%'
ORDER BY  `ID` ASC ");
$darabszam = mysql_num_rows($product);
 echo '<b>Összes termék: ' . $darabszam . ' db</b><br />';
 


while ($adott_termek = mysql_fetch_array($product)) 		// Összes aktív termék kiolvasása
 {
	 
 $product_id =  $adott_termek["ID"]; //  Termék ID-je ez kell a képek megtalálásához
 $termek_leiras =  $adott_termek["post_content"]; // Termékleírás rész
 $termek_neve =  $adott_termek["post_title"]; //  Termék neve 
 $termek_status =  $adott_termek["post_status"]; //  Termék neve
 
 	
echo '<pre><b>Termék adatok: </b><br /></pre>';	
 echo '<pre><b>Termék ID</b> : ' . $product_id . '<br />
 <b>Név: </b>' . $termek_neve . '<br />
 <b>Állapot: </b> ' . $termek_status . '<br /></pre>';	
 
//echo '<b>Leírás: </b>' . $termek_leiras . '<br /></pre>';	
echo '<pre><b>Leírás: </b> Túl hosszú lenne..<br /></pre>';		
echo '<pre><b>Meta adatok: </b><br /></pre>';	

										// Aktív termékekhez tartozó kép linkek kiolvasása a $product_id  alapján
											$termek_adatok = mysql_query ("SELECT * 
																									FROM  `wp_postmeta` 
																									WHERE  `wp_postmeta`.`post_id` = $product_id");
																					while ($ossz_adat = mysql_fetch_array($termek_adatok)) 		// 
																					 {
																						 $meta_key = $ossz_adat["meta_key"];
																						 $meta_value= $ossz_adat["meta_value"];
																						 echo  $meta_key . ' = ' . $meta_value . '<br />';	
																					 }
										$kepek_sorok = mysql_query ("SELECT * 
																								FROM  `wp_posts` 
																								WHERE  `wp_posts`.`post_parent` = $product_id
																								AND  `post_status` =  'inherit'
																								AND  `post_type` =  'attachment'");
																								
																					while ($kep_link = mysql_fetch_array($kepek_sorok)) 		// 
																					 {
																						 $link_url = $kep_link["guid"];
																						// $meta_value= $kep_link["meta_value"];
																						 echo 'Kép linkek: ' . $link_url . '<br />';	
																					 }					 				  
 echo '<hr />'; 
 
 }
}

function insert_db_layered_price_index()

{
	
	// Értékek amik kellenek a táblán belül, ezek lehet, hogy nem itt lesznek, hanem ott ahol ezt a függvényt meghívom, a számok és adatok CSAK TÁJÉKOZTATÓNAK VANNAK
$id_product = 10;
$id_currency = 1;
$id_shop = 1;
$price_min = 13500;
$price_max = 17145;

//Beszúrás a layered_price_index táblába
$db_name = "monomo_chix";
//$table_name = "tesztshop_layered_price_index";
		$query = "INSERT INTO  `$db_name`.`tesztshop_layered_price_index` (
`id_product` ,
`id_currency` ,
`id_shop` ,
`price_min` ,
`price_max`
)
VALUES (
'$id_product',  '$id_currency',  '$id_shop',  '$price_min',  '$price_max'
)";
	
		$result = mysql_query($query) or die(mysql_error() . "<br />" . $query); // Hibajelentés kiírása, ha valami nem megy
}


function insert_db_image()

{

$id_image = 10;
$id_product = 1;
$position = 1;
$cover = 13500;


//Beszúrás az image táblába
$db_name = "monomo_chix";
$query = "INSERT INTO   `$db_name`.`tesztshop_image` (
`id_image`, 
`id_product`, 
`position`, 
`cover`
) 
VALUES
($id_image, $id_product, $position, $cover)";


$result = mysql_query($query) or die(mysql_error() . "<br />" . $query);

}


//Beszúrás a image_lang táblába
function insert_db_image_lang()

{

$id_image = 10;
$id_lang = 1;
$legend = 1;

//Beszúrás az image_lang táblába
$db_name = "monomo_chix";
$query = "INSERT INTO   `$db_name`.`tesztshop_image_lang` (
`id_image`, 
`id_lang`, 
`legend`
) 
VALUES
($id_image, $id_lang, '$legend')";


$result = mysql_query($query) or die(mysql_error() . "<br />" . $query);

}


function insert_db_image_shop()
{
$id_product = 10;
$id_image = 1;
$id_shop = 1;
$cover = 1;

//Beszúrás a image_shop táblába
$db_name = "monomo_chix";
$query = "INSERT INTO   `$db_name`.`tesztshop_image_shop` (`id_product`, `id_image`, `id_shop`, `cover`) VALUES
($id_product , $id_image, $id_shop , $cover)";

$result = mysql_query($query) or die(mysql_error() . "<br />" . $query);
}

function insert_db_layered_product_attribute()
{
$id_attribute = 10;
$id_product = 1;
$id_attribute_group = 1;
$id_shop = 1;

//Beszúrás a layered_product_attribute táblába
$db_name = "monomo_chix";
$query = "INSERT INTO   `$db_name`.`tesztshop_layered_product_attribute` (`id_attribute`, `id_product`, `id_attribute_group`, `id_shop`) VALUES
($id_attribute, $id_product, $id_attribute_group , $id_shop)";

$result = mysql_query($query) or die(mysql_error() . "<br />" . $query);
}


function insert_db_product()
{
	
$id_product = 11;
$id_supplier = 1;
$id_manufacturer = 1;
$id_category_default = 5;
$id_shop_default = 1;
$id_tax_rules_group = 1;
$on_sale = 0;
$online_only = 0;
$ean13 = 0;
//$upc = ''; //0.000000
$ecotax = 0.000000; 
$quantity = 0;
$minimal_quantity = 1;
$price = 1; //16.510000
$wholesale_price = 1; //16.510000
//$unity = 1;
$unit_price_ratio = 0.000000; 
$additional_shipping_cost = 0.00;
$reference = "demo_1"; 
//$supplier_reference = ;
//$location = ;
$width = 0.000000; 
$height = 0.000000; 
$depth = 0.000000; 
$weight = 0.000000; 
$out_of_stock = 2;
$quantity_discount = 0;
$customizable = 0;
$uploadable_files = 0;
$text_fields = 0;
$active = 1;
$redirect_type = 404;
$id_product_redirected = 0;
$available_for_order = 1; 
$available_date = 0000-00-00; 
$condition = "new";
$show_price = 1; 
$indexed = 1; 
$visibility = "both";
$cache_is_pack = 0;
$cache_has_attachments = 0;
$is_virtual = 0;
$cache_default_attribute = 1;
$date_add = 2016-01-01;
$date_upd = '2016-01-01 00:00:00';
$advanced_stock_management = 0;
$pack_stock_type = 3;
//Beszúrás a product táblába
$db_name = "monomo_chix";
$query = "INSERT INTO   `$db_name`.`tesztshop_product` (
`id_product`, `id_supplier`, `id_manufacturer`, `id_category_default`, `id_shop_default`, `id_tax_rules_group`, `on_sale`, `online_only`, `ean13`, `upc`, `ecotax`, `quantity`, `minimal_quantity`, `price`, `wholesale_price`, `unity`, `unit_price_ratio`, `additional_shipping_cost`, `reference`, `supplier_reference`, `location`, `width`, `height`, `depth`, `weight`, `out_of_stock`, `quantity_discount`, `customizable`, `uploadable_files`, `text_fields`, `active`, `redirect_type`, `id_product_redirected`, `available_for_order`, `available_date`, `condition`, `show_price`, `indexed`, `visibility`, `cache_is_pack`, `cache_has_attachments`, `is_virtual`, `cache_default_attribute`, `date_add`, `date_upd`, `advanced_stock_management`, `pack_stock_type`
) 
VALUES
($id_product, $id_supplier, $id_manufacturer, $id_category_default, $id_shop_default, $id_tax_rules_group, $on_sale, $online_only, '$ean13', '', '$ecotax', $quantity, $minimal_quantity, '$price', '$wholesale_price', '', '$unit_price_ratio', '$additional_shipping_cost', '$reference', '', '', '$width', '$height', '$depth', '$weight', $out_of_stock, $quantity_discount, $customizable, $uploadable_files, $text_fields, $active, '$redirect_type', $id_product_redirected, $available_for_order, '$available_date', '$condition', $show_price, $indexed, '$visibility', $cache_is_pack, $cache_has_attachments, $is_virtual, $cache_default_attribute, '$date_add', '$date_upd', $advanced_stock_management, $pack_stock_type)";

$result = mysql_query($query) or die(mysql_error() . "<br />" . $query);
}
/*  regular_price, sku, _yoast_wpseo_title, _yoast_wpseo_metadesc,
SELECT * 
FROM  `wp_postmeta` 
WHERE  `post_id` =1341 */


?>