<?php

//Összes  termék kikeresése a wp_post táblából ID szerint növekvő sorrendben rendezve

function termekek_osszes()
{ 

$db_name = "monomo_chix";
$id_shop = 1;

 echo '<h3>Kiolvasott termékadatok az "elfogyott"-akat kivéve:</h3>';
$product = mysql_query ("SELECT * 
FROM  `wp_posts` 
WHERE  `ID` = 2420
AND `post_type` =  'product' 
AND  `post_title` NOT LIKE  '%fogyott%'
AND  `post_status` NOT LIKE  '%inherit%'
ORDER BY  `ID` ASC
LIMIT 0 , 30
");

$darabszam = mysql_num_rows($product);
 echo '<b>Összes termék: ' . $darabszam . ' db</b><br />';
 


while ($adott_termek = mysql_fetch_array($product)) 		// Összes aktív termék kiolvasása
 {
	
 $termek_post_date =  $adott_termek["post_date"]; //  Termék kihelyezésének ideje
 $termek_post_name =  $adott_termek["post_name"]; //  Termék linkje 
 $termek_post_modified =  $adott_termek["post_modified"]; //  Termék módosításának ideje 
 $termek_leiras =  $adott_termek["post_content"]; // Termékleírás rész
 $termek_neve =  $adott_termek["post_title"]; //  Termék neve 
																							$termek_status =  $adott_termek["post_status"]; //  Termék állapota
																						  if ($termek_status == "publish"){
																							 $termek_status = 1;
																						 }
																						 else {
																							  $termek_status = 0;
																						 }
  
  
 $product_id =  $adott_termek["ID"]; //  Termék ID-je ez kell a képek megtalálásához

										// Aktív termékekhez tartozó kép linkek kiolvasása a $product_id  alapján
											$termek_adatok = mysql_query ("SELECT * 
																									FROM  `wp_postmeta` 
																									WHERE  `wp_postmeta`.`post_id` = $product_id");
																					while ($ossz_adat = mysql_fetch_array($termek_adatok)) 		// 
																					 {
																						 $meta_key = $ossz_adat["meta_key"];
																						 $meta_value= $ossz_adat["meta_value"];
																						 if ($meta_key == "regular_price"){
																							 $regular_price = $meta_value;
																							 
																						 }
																						  if ($meta_key == "sku"){
																							 $sku = $meta_value;
																							 
																						
																						 }
																						  if ($meta_key == "_yoast_wpseo_focuskw"){
																							 $yoast_wpseo_focuskw = $meta_value;
																							 
																						
																						 }
																						  if ($meta_key == "_yoast_wpseo_title"){
																							 $yoast_wpseo_title = $meta_value;
																							 
																							 
																						
																						 }
																						  if ($meta_key == "_yoast_wpseo_metadesc"){
																							 $yoast_wpseo_metadesc = $meta_value;
																							 
																						
																						 }
																						  if ($meta_key == "stock"){
																							 $stock = $meta_value;
																							 
																						
																						 }
																						  if ($meta_key == "brand"){
																							 $brand = $meta_value;
																							 
																						
																						 }
}
// Brand ID kinyerése 
							if ($brand == "Alea"){ $brand_id = 3;}
if ($brand == "Alexio Giorgio"){ $brand_id = 4;}
if ($brand == "Ambition"){ $brand_id = 5;}
if ($brand == "Anis"){ $brand_id = 6;}
if ($brand == "Avanti"){ $brand_id = 7;}
if ($brand == "Baldaccini"){ $brand_id = 8;}
if ($brand == "Belle"){ $brand_id = 9;}
if ($brand == "Bellissa"){ $brand_id = 10;}
if ($brand == "Bioeco"){ $brand_id = 11;}
if ($brand == "Caprice"){ $brand_id = 12;}
if ($brand == "Catwoman"){ $brand_id = 13;}
if ($brand == "Cerutti"){ $brand_id = 14;}
if ($brand == "Chix"){ $brand_id = 15;}
if ($brand == "Deska"){ $brand_id = 16;}
if ($brand == "Dora"){ $brand_id = 17;}
if ($brand == "Edeo"){ $brand_id = 18;}
if ($brand == "Ellen Blake"){ $brand_id = 19;}
if ($brand == "Exclusive Roberto"){ $brand_id = 20;}
if ($brand == "Fabio Fabrizi"){ $brand_id = 21;}
if ($brand == "Fabrizio"){ $brand_id = 22;}
if ($brand == "Flex & Go"){ $brand_id = 23;}
if ($brand == "Gamis"){ $brand_id = 24;}
if ($brand == "Goldbut"){ $brand_id = 25;}
if ($brand == "Jana"){ $brand_id = 26;}
if ($brand == "Kampa"){ $brand_id = 27;}
if ($brand == "Klimpol"){ $brand_id = 28;}
if ($brand == "Kotyl"){ $brand_id = 29;}
if ($brand == "La Boda"){ $brand_id = 30;}
if ($brand == "Laura Messi"){ $brand_id = 31;}
if ($brand == "Laura Piacci"){ $brand_id = 32;}
if ($brand == "Linea Uno"){ $brand_id = 33;}
if ($brand == "Luca Cavialli"){ $brand_id = 34;}
if ($brand == "Lucia Bosetti"){ $brand_id = 35;}
if ($brand == "Lukasz"){ $brand_id = 36;}
if ($brand == "Lux"){ $brand_id = 37;}
if ($brand == "M-Silvio"){ $brand_id = 38;}
if ($brand == "Marco Tozzi"){ $brand_id = 39;}
if ($brand == "Marila"){ $brand_id = 40;}
if ($brand == "Massimo Poli"){ $brand_id = 41;}
if ($brand == "Mexx"){ $brand_id = 42;}
if ($brand == "Monnari"){ $brand_id = 43;}
if ($brand == "Pabia"){ $brand_id = 44;}
if ($brand == "Pamar"){ $brand_id = 45;}
if ($brand == "Prestige"){ $brand_id = 46;}
if ($brand == "Przemar"){ $brand_id = 47;}
if ($brand == "Roberto Exclusive"){ $brand_id = 48;}
if ($brand == "Sabatina"){ $brand_id = 49;}
if ($brand == "Sagan"){ $brand_id = 50;}
if ($brand == "Senso"){ $brand_id = 51;}
if ($brand == "Stefany"){ $brand_id = 52;}
if ($brand == "Stella Glanz"){ $brand_id = 53;}
if ($brand == "Tamaris"){ $brand_id = 54;}
if ($brand == "Via Roma"){ $brand_id = 55;}
if ($brand == "Walk"){ $brand_id = 56;}
if ($brand == "Zodiaco"){ $brand_id = 57;}
		 
 	
 echo '<b>mb_detect_encoding:</b>' . mb_detect_encoding($termek_leiras, "auto");
echo '<br />';	
 echo '<b>Termék ID</b> : ' . $product_id . '<br />
 <b>Név: </b>' . $termek_neve . '<br />
 <b>Brand: </b>' . $brand . ' | brand_id: ' . $brand_id . '<br />
 <b>Állapot: </b> ' . $termek_status . '<br />';
print '<br /><b>ÁR: </b>' . number_format($regular_price, 2, '.', '');
echo '<br /><b>yoast_wpseo_focuskw: </b>' . $yoast_wpseo_focuskw;	
echo '<br /><b>SKU: </b>' . $sku;	
echo '<br /><b>yoast_wpseo_title:</b> ' . $yoast_wpseo_title;	
echo '<br /><b>yoast_wpseo_metadesc:</b> ' . $yoast_wpseo_metadesc;	
echo '<br /><b>stock:</b> ' . $stock;	
echo '<br /><b>Link vége: </b>' . $termek_post_name;	
echo '<br /><b>termek_post_date:</b> ' . $termek_post_date;	
echo '<br /><b>termek_post_modified: </b>' . $termek_post_modified;	
 
echo '<b><br />Leírás: </b>' . $termek_leiras . '<br />';	
	$kepek_sorok = mysql_query ("SELECT * 
																								FROM  `wp_posts` 
																								WHERE  `wp_posts`.`post_parent` = $product_id
																								AND  `post_status` =  'inherit'
																								AND  `post_type` =  'attachment'");
																								
																					while ($kep_link = mysql_fetch_array($kepek_sorok)) 		// 
																					 {
																						 $link_url = $kep_link["guid"];
																						// $meta_value= $kep_link["meta_value"];
																						 echo '<b>Kép linkek: </b>' . $link_url . '<br />';	
																					 }					 				  
 echo '<hr />'; 													
//************************************************************INSERT PRÓBA ELEJE: ******************************************
$id_product = $product_id;
$id_supplier = 1;
$id_manufacturer = $brand_id;
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
$price = number_format($regular_price, 2, '.', ''); // Eredmény: 17990.00
//$price = $regular_price; //16.510000
//$price = number_format($regular_price, 1, '.', '');
$wholesale_price =  0; //17990.00
//$unity = 1;
$unit_price_ratio = 0.000000; 
$additional_shipping_cost = 0.00;
$reference = "$sku"; 
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
$active = $termek_status;
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
$date_add = $termek_post_date;
$date_upd = $termek_post_modified;
$advanced_stock_management = 0;
$pack_stock_type = 3;


//function insert_db_product_lang()
//{

$id_product = $product_id;
$description = $termek_leiras; //Hosszú leírás
$description_short = $yoast_wpseo_title; //Rövid leírás
$link_rewrite = $termek_post_name; //link cím (termek-neve-akarmi)
$meta_description = $yoast_wpseo_metadesc; //Hosszú meta leírás
$meta_keywords = $yoast_wpseo_focuskw; // meta kulcsszavak
$meta_title = $yoast_wpseo_title; // meta rövid cím
$name = $termek_neve; // Termék neve
$available_now = "Raktáron"; // Ha elérhető, akkor a szöveg ez
$available_later = 'Rendelésre'; // Ha elfogyott akkor a szöveg ez

//Beszúrás a product_lang táblába
$query = "INSERT INTO  `$db_name`.`tesztshop_product_lang` (
`id_product` ,
`id_shop` ,
`id_lang` ,
`description` ,
`description_short` ,
`link_rewrite` ,
`meta_description` ,
`meta_keywords` ,
`meta_title` ,
`name` ,
`available_now` ,
`available_later`
)
VALUES (
'$id_product',  '1',  '1',  '" . $description . "',  '" . $description_short . "',  '$link_rewrite',  '$meta_description',  '$meta_keywords',  '$meta_title',  '$name', '$available_now' , '$available_later')";

$result = mysql_query($query) or die(mysql_error() . "<br />" . $query);



//Beszúrás a product táblába
$query = "INSERT INTO   `$db_name`.`tesztshop_product` (
`id_product`, `id_supplier`, `id_manufacturer`, `id_category_default`, `id_shop_default`, `id_tax_rules_group`, `on_sale`, `online_only`, `ean13`, `upc`, `ecotax`, `quantity`, `minimal_quantity`, `price`, `wholesale_price`, `unity`, `unit_price_ratio`, `additional_shipping_cost`, `reference`, `supplier_reference`, `location`, `width`, `height`, `depth`, `weight`, `out_of_stock`, `quantity_discount`, `customizable`, `uploadable_files`, `text_fields`, `active`, `redirect_type`, `id_product_redirected`, `available_for_order`, `available_date`, `condition`, `show_price`, `indexed`, `visibility`, `cache_is_pack`, `cache_has_attachments`, `is_virtual`, `cache_default_attribute`, `date_add`, `date_upd`, `advanced_stock_management`, `pack_stock_type`
) 
VALUES
($id_product, $id_supplier, $id_manufacturer, $id_category_default, $id_shop_default, $id_tax_rules_group, $on_sale, $online_only, '$ean13', '', '$ecotax', $quantity, $minimal_quantity, '$price', '$wholesale_price', '', '$unit_price_ratio', '$additional_shipping_cost', '$reference', '', '', '$width', '$height', '$depth', '$weight', $out_of_stock, $quantity_discount, $customizable, $uploadable_files, $text_fields, $active, '$redirect_type', $id_product_redirected, $available_for_order, '$available_date', '$condition', $show_price, $indexed, '$visibility', $cache_is_pack, $cache_has_attachments, $is_virtual, $cache_default_attribute, '$date_add', '$date_upd', $advanced_stock_management, $pack_stock_type)";

$result = mysql_query($query) or die(mysql_error() . "<br />" . $query);


//Beszúrás a product_shop táblába

$query = "INSERT INTO `$db_name`.`tesztshop_product_shop` (
`id_product`, `id_shop`, `id_category_default`, `id_tax_rules_group`, `on_sale`, `online_only`, `ecotax`, `minimal_quantity`, `price`, `wholesale_price`, `unity`, `unit_price_ratio`, `additional_shipping_cost`, `customizable`, `uploadable_files`, `text_fields`, `active`, `redirect_type`, `id_product_redirected`, `available_for_order`, `available_date`, `condition`, `show_price`, `indexed`, `visibility`, `cache_default_attribute`, `advanced_stock_management`, `date_add`, `date_upd`, `pack_stock_type`
) 
VALUES 
('$id_product', '1', '$id_category_default', '1', '0', '0', '0.000000', '1', '$price', '$wholesale_price', '', 
'0.000000', '0.00', 
'0', 
'0', 
'0', 
'$active', '404', '0', 
'1', '0000-00-00', 'new', '1', '1', 'both', '1', '0', 
'$date_add', '$date_upd', '3')";

$result = mysql_query($query) or die(mysql_error() . "<br />" . $query);
//***********************************************************INSERT PRÓBA VÉGE *********************************************
																						 
												
									
 
 


//function insert_db_layered_price_index()

//{
	
	// Értékek amik kellenek a táblán belül, ezek lehet, hogy nem itt lesznek, hanem ott ahol ezt a függvényt meghívom, a számok és adatok CSAK TÁJÉKOZTATÓNAK VANNAK
$id_product = $product_id;
$id_currency = 1;
$id_shop = 1;
$price_min = 0;
$price_max =   number_format($regular_price, 0, '.', '');

//Beszúrás a layered_price_index táblába

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
//}

//}

//function insert_db_layered_product_attribute()
//{
$id_attribute = 10;
$id_product = $product_id;
$id_attribute_group = 1;
$id_shop = 1;

//Beszúrás a layered_product_attribute táblába
$query = "INSERT INTO   `$db_name`.`tesztshop_layered_product_attribute` (`id_attribute`, `id_product`, `id_attribute_group`, `id_shop`) VALUES
($id_attribute, $id_product, $id_attribute_group , $id_shop)";

$result = mysql_query($query) or die(mysql_error() . "<br />" . $query);


//Beszúrás a stock_available táblába
$query = "INSERT INTO `$db_name`.`tesztshop_stock_available` (
`id_stock_available`, `id_product`, `id_product_attribute`, `id_shop`, `id_shop_group`, `quantity`, `depends_on_stock`, `out_of_stock`) 
VALUES (
'', '$id_product', '0', '1', '0', '$stock', '0', '1')";

$result = mysql_query($query) or die(mysql_error() . "<br />" . $query);
}
}


function insert_db_image()

{

$id_image = 10;
$id_product = $product_id;
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
function gyartok()
{
$gyartok = mysql_query ("SELECT * 
FROM  `tesztshop_manufacturer` 
WHERE  `active` =1 ");
																					while ($adat = mysql_fetch_array($gyartok)) 		// 
																					 {
																						 $brand = $adat["name"];
																						 $brand_id = $adat["id_manufacturer"];
																						// echo $brand . ' - ' . $brand_id . '<br />';
																						
																						 echo	 'if ($brand == "' . $brand . '"){
																						 $brand_id = ' . $brand_id . '}<br />';
																							 
																						
																						 
																						 }
																						 
}


?>
