<html>
<head><title></title></head>
<body>
</body>
</html>
<html>
	<head>
		<title>Menu</title>

	</head>
<body>

	<script>
	function display(source) {
		var placeholder = document.getElementById("placeholder");
		switch (source) {
			case("frozen"):
			placeholder.src="images/frozen.png";
			document.getElementById("placeholder").useMap = "#frozen";
			break;

			case("fresh"):
			placeholder.src="images/fresh.png";
			document.getElementById("placeholder").useMap = "#fresh";
			break;

			case("beverages"):
			placeholder.src="images/beverages.png";
			document.getElementById("placeholder").useMap = "#beverages";
			break;

			case("health"):
			placeholder.src="images/health.png";
			document.getElementById("placeholder").useMap = "#health";
			break;

			case("pet"):
			placeholder.src="images/pet.png";
			document.getElementById("placeholder").useMap = "#pet";
			break;

		}

	}
	</script>
	<!--The div tag defines a division or a section in an HTML document.
<div>
	*/usemap attribute specifies an image (or an object) as an image-map (an image-map is an image with clickable areas). -->
<img src="images/main.png" usemap="#linkmap"/>
<map name="linkmap">
	<area target="topright" onmouseover="display('frozen')" coords="2,90,119,148" shape="rect">
	<area target="topright" onmouseover="display('fresh')" coords="137,90,253,147" shape="rect">
	<area target="topright" onmouseover="display('beverages')" coords="287,86,405,143" shape="rect">
	<area target="topright" onmouseover="display('health')" coords="439,90,559,147" shape="rect">
	<area target="topright" onmouseover="display('pet')" coords="572,88,691,149" shape="rect">
</map>
</div>

<div>
		<img id="placeholder" src="" usemap="" />
		<map name="frozen" id="frozen">
			<area target="topright" href="item_desc.php?product_id=1002" coords="4,24,102,72" shape="rect">
			<area target="topright" href="item_desc.php?product_id=1000" coords="65,121,166,172" shape="rect">
			<area target="topright" href="item_desc.php?product_id=1001" coords="197,121,298,170" shape="rect">
			<area target="topright" href="item_desc.php?product_id=1003" coords="297,25,399,73" shape="rect">
			<area target="topright" href="item_desc.php?product_id=1004" coords="330,122,429,169" shape="rect">
			<area target="topright" href="item_desc.php?product_id=1005" coords="464,123,563,172" shape="rect">
		</map>

		<map name="fresh" id="fresh">
			<area target="topright" href="item_desc.php?product_id=3002" coords="2,46,94,92" shape="rect">
			<area target="topright" href="item_desc.php?product_id=3000" coords="3,112,93,153" shape="rect">
			<area target="topright" href="item_desc.php?product_id=3001" coords="132,111,223,156" shape="rect">
			<area target="topright" href="item_desc.php?product_id=3003" coords="199,46,288,90" shape="rect">
			<area target="topright" href="item_desc.php?product_id=3004" coords="296,48,385,90" shape="rect">
			<area target="topright" href="item_desc.php?product_id=3006" coords="391,49,482,91" shape="rect">
			<area target="topright" href="item_desc.php?product_id=3007" coords="488,50,578,90" shape="rect">
			<area target="topright" href="item_desc.php?product_id=3005" coords="583,48,674,90" shape="rect">
		</map>

		<map name="beverages" id="beverages">
			<area target="topright" href="item_desc.php?product_id=4003" coords="2,119,93,166" shape="rect">
			<area target="topright" href="item_desc.php?product_id=4004" coords="104,122,191,163" shape="rect">
			<area target="topright" href="item_desc.php?product_id=4000" coords="275,121,363,165" shape="rect">
			<area target="topright" href="item_desc.php?product_id=4001"  coords="375,123,463,165" shape="rect">
			<area target="topright" href="item_desc.php?product_id=4002" coords="474,124,561,165" shape="rect">
			<area target="topright" href="item_desc.php?product_id=4005" coords="403,50,490,97" shape="rect">
		</map>

		<map name="health" id="health">
			<area target="topright" href="item_desc.php?product_id=2002" coords="99,80,6,32" shape="rect">
			<area target="topright" href="item_desc.php?product_id=2000" coords="146,102,240,149" shape="rect">
			<area target="topright" href="item_desc.php?product_id=2001" coords="147,170,240,215" shape="rect">
			<area target="topright" href="item_desc.php?product_id=2005" coords="242,33,333,77" shape="rect">
			<area target="topright" href="item_desc.php?product_id=2003" coords="380,101,473,147" shape="rect">
			<area target="topright" href="item_desc.php?product_id=2004" coords="382,169,474,215" shape="rect">
			<area target="topright" href="item_desc.php?product_id=2006" coords="470,33,560,76" shape="rect">
		</map>

		<map name="pet" id="pet">
			<area target="topright" href="item_desc.php?product_id=5002" coords="5,58,118,114" shape="rect">
			<area target="topright" href="item_desc.php?product_id=5003" coords="149,60,261,114" shape="rect">
			<area target="topright" href="item_desc.php?product_id=5001" coords="325,142,438,197" shape="rect">
			<area target="topright" href="item_desc.php?product_id=5000" coords="322,230,436,283" shape="rect">
			<area target="topright" href="item_desc.php?product_id=5004" coords="438,59,549,116" shape="rect">
		</map>

</div>



	</body>
</html>
