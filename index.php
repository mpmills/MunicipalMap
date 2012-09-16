<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7,IE=9" />
    <meta name="viewport" content="initial-scale=1.0, width=device-width, maximum-scale=1.0, user-scalable=no"/>
    <!-- meta tags to hide url and minimize status bar to give the web app
    a native app look this only happens after app is saved to the desktop-->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="translucent-black"
    />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>New Jersey Meadowlands Commission &raquo; Municipal Map</title>

<link rel="stylesheet" type="text/css" href="http://serverapi.arcgisonline.com/jsapi/arcgis/3.1/js/dojo/dijit/themes/claro/claro.css">

<link rel="stylesheet" type="text/css" href="map.css" />

<script type="text/javascript">dojoConfig = { parseOnLoad:true };</script>
<script type="text/javascript" src="http://serverapi.arcgisonline.com/jsapi/arcgis/?v=3.1"></script>
<script type="text/javascript" src="MERI_formatting.js"></script>

</head>

<body class="claro">

<div id="wrapper">
    <div id="framecontent">
        <div class="innertube">
		<div id="toolbar">
			<div id="navToolbar" >
				<div class="tool_button" id="nav_zoom_in" 		title="Zoom In"					iconClass="zoominIcon" 		></div>
				<div class="tool_button" id="nav_zoom_out" 		title="Zoom Out"				iconClass="zoomoutIcon" 	></div>
				<div class="tool_button" id="nav_zoom_fullext" 	title="Zoom Full Extent"		iconClass="zoomfullextIcon" ></div>
				<div class="tool_button" id="nav_zoom_prev" 	title="Zoom Previous Extent" 	iconClass="zoomprevIcon"	></div>
				<div class="tool_button" id="nav_zoom_next" 	title="Zoom Next Extent"		iconClass="zoomnextIcon" 	></div>
				<div class="tool_button" id="nav_pan" 			title="Pan Map"					iconClass="panIcon" 		></div>
				<div class="tool_button" id="nav_identify" 		title="Identify"				 							></div>

				<div class="tool_button" id="nav_btn_select" 	title="Parcel Select"										></div>
				<div class="tool_button" id="nav_measure"		title="Measure"		 									    ></div>
				<div class="tool_button" id="nav_btn_erase"		title="Clear Map"											></div>
               
			</div>
		</div>
        
        <div id="tabs">
        	<ul id="tablist">
            	<li id="LayersToggle"><a href="#">Table of Contents</a></li>
                <li id="SearchTab"><a href="#">Search</a></li>
                <li id="ResultsTab"><a href="#">Results</a></li>
                <li id="HelpTab"><a href="#">About</a></li>
            </ul>
        </div>

		<div id="side_content">
			<div id="left_content">
            
				<div id="ResultsPane">
					
					<div id="dMeasureWrap" class="ctrl_wipe">
						<div id="dMeasureTool" ></div>
					</div>

					<div id="dBufferTool" class="ctrl_wipe">
						<div class="tocDivTitle">Buffer Selected Parcels</div>
							<div>Buffer Distance (feet): <input type="text" id="bufferToolDistance" value="200"  /></div>
							<div><a id="aBufferParcelExec" href="#" title="Execute Buffer tool on selected parcels with the given distance." >Execute Buffer</a></div>
							
							<div style="display:none">
							<div>Buffer Layer Visibilties</div>
							<div>
								<input id="chkBufferParcel" type="checkbox" checked="checked">Parcel to Buffer<br />
								<input type="checkbox" checked="checked">Parcel to Buffer<br />
							</div>
						</div>
					</div>
					
					<div id="ResultsPaneTitle"></div>
					<div id="dResultsSummary"></div>
                    
                    <!-- ERIS OUTPUT --><div id="Links_ERIS"></div><div id="Results_ERIS"></div>
					
					<div id="r_map_selection" class="ctrl_wipe"></div>
					<div id="r_map_buffer" class="ctrl_wipe"></div>
					
					<div id="dIdentifyResults" class="ctrl_wipe"></div>
					<div id="dSearchResults" class="ctrl_wipe"></div>
									
				</div><!-- ResultsPane-->
				<div id="treeToc"></div>
				<div id="SearchPane">
					<div id="search_menu"><strong>Search: </strong>
						<a href="#" onclick="f_search_handler('search_PROP');">Property</a>
						<!-- <a href="#" onclick="f_search_handler("search_FAC");">Facility</a> -->
						<a href="#" onclick="f_search_handler('search_OWNR');">Owner</a>
					</div>
					<div id="search_ALL" style="display:block">
						<h3>Search Options</h3>
						<div class="searchAdvancedDiv">
						<input type="radio" name="rdo_muni_search" id="rdo_muni_searchAll" selected="selected" />
							<label for="rdo_muni_searchAll">All Municipalities</label>
							<input type="radio" name="rdo_muni_search" id="rdo_muni_searchSelect">
							<label for="rdo_muni_searchSelect">Selected Municipalities</label>
							<div id="search_munis" style="display:none"></div>
						</div>
						<div class="searchAdvancedDiv">
							<input type="radio" name="rdo_qual_search" id="rdo_qual_searchAll" selected="selected" />
							<label for="rdo_qual_searchAll">All Parcels</label>
							<input type="radio" name="rdo_qual_search" id="rdo_qual_searchSelect">
							<label for="rdo_qual_searchSelect">Designated Parcels</label>
							<div id="search_qual" style="display:none"></div>
						</div>
						<div class="searchAdvancedDiv">
							<input type="radio" name="rdo_landuse_search" id="rdo_landuse_searchAll" selected="selected" />
							<label for="rdo_landuse_searchAll">All Land Uses</label>
							<input type="radio" name="rdo_landuse_search" id="rdo_landuse_searchSelect">
							<label for="rdo_landuse_searchSelect">Selected Land Uses</label>
							<div id="search_landuse" style="display:none"></div>
							<div id="r_search_landuse" style="display:none"></div>

						</div>
						<div class="searchAdvancedDiv">
							<div>Acreage:
								<label for="txtAcreageMin">Min:</label><input type="text" id="txtAcreageMin" style="width:40px;" title="Min Acreage" value=""  class="search_field" name="AcrMin" /> &nbsp;&nbsp;
								<label for="txtAcreageMax">Max:</label><input type="text" id="txtAcreageMax" style="width:40px;" title="Max Acreage" value="" class="search_field" name="AcrMax" />
							</div>
						</div>
					</div>

					<div id="search_PROP" style="display:block">
						<h3>Search Parcels</h3>
						<div class="searchParcelSection">
							<!-- A D D R E S S -->
							<div title="Search by Property Address" class="search_field" name="Address">
								<label for="txtQueryAddress">Address:</label><input type="text" id="txtQueryAddress"  />
							</div>
						</div>
						<div class="searchParcelSection">
							<!-- B L O C K   L O T  -->
							<div title="Search parcel Block"><label for="txtQueryBlock">Block:</label><input type="text" class="search_field"  id="txtQueryBlock" value="" name="Block" /></div>
							<div title="Search parcel Lot"><label for="txtQueryLot">Lot:</label><input type="text" class="search_field" id="txtQueryLot"  value="" name="Lot" /></div>
							<div title="">
								<input type="checkbox" name="OldBL" value="true" id="b_searchOldBlockLot" checked="checked" /> <label for="b_searchOldBlockLot">Search historical blocks and lots?</label>
							</div>
							<div title="Uncheck this box if you would like to do a "wildcard" search. See Help for more details.">
								<input type="checkbox" name="BlockLotExact" value="true" id="b_searchBlockLotExact" checked="checked" /> <label for="b_searchBlockLotExact">Find only exact matches?</label>
							</div>
						</div>
						<div>
							<input type="button" class="i_search_button" value="Search for Properties" id="i_btn_search_parcels"/>
						</div>
						<!--<div id="r_search_parcel" class="search_results"></div>-->
					</div>
                    <div id="search_OWNR">
						<h3>Owner Search</h3>
						<label>Owner Name:</label>
						<input type="text" id="txtQueryOwner" title="Owner Search" value="hartz mountain" />
						<!--<input type="text" class="search_field"name="Owner" /><br /><br />-->
						<input type="button" class="i_search_button" value="Search Owners" onclick="f_query_owners_exec()" />
                    	<div id="r_search_owner" class="search_results"></div>
                    </div><!-- search_OWNR -->
                    <div id="search_LND">
                    	<h3>Landuse</h3>
							<!-- old spot for landuse -->
							<input type="button" class="i_search_button" value="Search Landuse" onclick="f_query_landuse_exec()" />
						</div>
					</div><!-- search_LND -->
					<div id="search_FAC">
						<h3>Facility Search</h3>
						<label>Facility Name:</label><input type="text" id="txtQueryFacility" title="Facility Name Search" class="search_field" name="Facility" /><br /><br />
						<input type="button" class="i_search_button" value="Search Facilities" onclick="f_query_facility_exec()" />
						<div id="r_search_facility" class="search_results"></div>
					</div>
                    
				</div> <!-- Search -->
				<div id="MapLayers" >
					<div id="map_images">
						<div class="toc_heading">Basemap Imagery</div>
					</div>
					<div id="map_layers">
						<div class="toc_heading">Map Layers</div>
						<div id="map_layer_groups"></div>
					</div>
				</div>
				<div id="HelpPane" style="display: block;">
                <h2 class="sectionTitle">About</h2>
                
                <div class="sidebarContainer">
                	This version of NJMC’s Municipal Map encompasses 8 years of data collected about its 14-constituent towns, including historical to present geographic information. Municipalities can gain access to these layers and records about properties that falls within their respective municipalities and identify pertinent information about each property in question. The layers include: parcels, land use, zoning, wetlands, riparian, encumbrance, FEMA and much more. In addition, MERI-GIS has been compiling utility data from stormwater manholes to sanitary lines so towns can visualize and further make decision on existing infrastructure and conditions. Imagery accessible on this application ranges from the 1930’s to 2010. New data will become available once they are complete. Visit MERI’s webmaps periodically for timely updates. 
                </div>
                <hr>
                
                                
                <h2 class="sectionTitle">Disclaimer</h2>
                
                <div class="sidebarContainer">
                   	The information contained in this site is the best available according to the procedures and standards of the New Jersey Meadowlands Commission (NJMC)/Meadowlands Environmental Research Institute Geographic Information Systems group (MERI-GIS)<a id="disclaimerMoreLink" onclick="toggle_visibility('disclaimerMore'); toggle_visibility('disclaimerMoreLink');" target="_blank" title="read more" style="display:block;">...</a>
                    
                    <div id="disclaimerMore" style="display:none;">
                    In order to maintain the quality and timeliness of the data, MERI-GIS regularly maintains the information in their databases and GIS layers. However, unintentional inaccuracies may occur. MERI-GIS has made every effort to present the information in a clear and understandable way for a variety of users. However, we cannot be responsible for the misuse or misinterpretation of the information presented by this system. Therefore, under no circumstances shall the NJMC/MERI-GIS be liable for any actions taken or omissions made from reliance on any information contained herein from whatever source nor shall the NJMC/MERI-GIS be liable for any other consequences from any such reliance.<br /><br />

All data request shall be made directly to the GIS Department. Processing fees may apply and NJMC’s data distribution agreement is required on all requests. The GIS Department can be contacted at <a href="mailto:merigis@njmeadowlands.gov">merigis@njmeadowlands.gov</a>.<br />

<div style="text-align:right;"><a onclick="toggle_visibility('disclaimerMore'); toggle_visibility('disclaimerMoreLink');"><img src="http://webmaps.njmeadowlands.gov/imagery/images/icons_BK/more_arrow_up.png" title="collapse" /></a></div>

                    
                    </div>
                    
                </div>
                <hr>
                <!-- -->
                <h2 class="sectionTitle" >Help</h2>
                
                <div class="sidebarContainer" >
                   	Need help using this application?<br /><br />

					A full guide covering everything from the basics all the way up to advanced features is provided <a href="help/" target="_blank">here</a>.
                </div>
                <hr >
                
                <!-- -->
                <h2 class="sectionTitle">ERIS</h2>
                
                <div class="sidebarContainer">
                                <div id="signInForm">
                <form id="signInFormNode">
        
                    <label class="eris_login_lbl">Username: </label><input type="text" name="userName" class="eris_login_fld" /><br />
                    <label class="eris_login_lbl">Password: </label><input type="password" name="password" class="eris_login_fld" />
        
                </form>
                    <button id="ERISLogin" onClick="ERISLogin();">Login</button>
                </div>
                
                <pre id="signInResultNode"></pre>
				                
                
                   	
                    
                    
                </div>
                <hr>
                
                
                <!-- -->
                <h2 class="sectionTitle">METADATA</h2>
                
                <div class="sidebarContainer">
                   	Need the Metadata?<br /><br />

					A complete listing of all the GIS data is provided <a href="http://apps.njmeadowlands.gov/mapping/metadata/?c=municipal" target="_blank">here</a>.
                </div>
                <hr>
                
                <!-- -->                
                <h2 class="sectionTitle">Contact</h2>
                
                <div class="sidebarContainer">
                   	We appreciate your feedback, please let us know what you think about the application using this <a href="http://apps.njmeadowlands.gov/feedback/?i=f&a=1" target="_blank">form.</a>
                    <br />
					<br />

                    You can also contact the MERI GIS Department at 201-460-4612
                </div>

                
                </div>
			</div><!-- left_content -->
		</div><!-- side_content -->

		<div id="footer"> &copy 2011 New Jersey Meadowlands Commission
			<div id="colapse"> <img src="images/icons_bk/left_arr16_2.png" onclick="coll_mnu();" alt="Collapse Menu" title="Collapse Menu" /></div>
		</div>
        
	</div><!-- innertube -->
	</div><!-- framecontent -->
	<div id="expand" >
		<div id="expand_bttn">
			<img src="images/arr_right.png" onclick="expnd_mnu();" alt="Expand Menu" title="Expand Menu" />
		</div>
	</div>
	<div id="map"></div>


</div><!-- wrapper -->
<script type="text/javascript">

/*
	// Naming Conventions
	//
	//  MAP STUFF
	//
	//		M		-	Map
	//		IT		- 	Identify Task
	//		IP		- 	Identify Parameters
	// 		TP		-	Task Parameters
	// 		BP		-	Buffer Parameters
	// 		Q		-	Query
	// 		QT		-	Query Task
	// 		EVT		-	Event
	// 		F		-	Feature
	// 		IW		-	Info Window
	// 		GS		-	GeoService
	// 		GeomS	-	Geometry Service
	//		S		-	Symbol
	// 		G		-	Graphic
	//		LG		-	Layer Graphics
	//		LD		-	Layer Dynamic
	//		LT		-	Layer Tiled

	//
	//  OTHER STUFF
	//
	//		f_		-	javascript function
	//		e_		-	html element
	//		b_		-	boolean variable
	//		r_		-	search result divs
	//		GV_		-	global var
	//		_lbl	-	label
*/


var aliases = {
	
		"munCodes" : { 
		
			"205" : "Carlstadt",
			"212" : "East Rutherford",
			"230" : "Little Ferry",
			"232" : "Lyndhurst",
			"237" : "Moonachie",
			"239" : "North Arlington",
			"249" : "Ridgefield",
			"256" : "Rutherford",
			"259" : "South Hackensack",
			"262" : "Teterboro",
			"906" : "Jersey City",
			"907" : "Kearny",
			"908" : "North bergen",
			"909" : "Secaucus"
		},
		
		"landUseCodes" : {
			"000" : "Unclassified",
			"AL"  : "Altered Lands",
			"CO"  : "Commercial Office",
			"CR"  : "Commercial Retail",
			"CU"  : "Communication Utility",
			"HM"  : "Hotels and Motels",
			"ICC" : "Ind. Comm. Complex",
			"IND" : "Industrial",
			"PQP" : "Public Services",
			"RES" : "Residential",
			"RL"  : "Recreational Land",
			"TRS" : "Transportation",
			"VAC" : "Vacant Land",
			"WAT" : "Water",
			"WET" : "Wetlands"
		},
		
		"zoneCodes" : {
			"AV" : "Aviation facilities", 
			"CP" : "Commercial Park",
			"EC" : "Environmental Conservation",
			"HI" : "Heavy Industrial", 
			"HC" : "Highway Commercial", 
			"IA" : "Intermodal A", 
			"IB" : "Intermodal B", 
			"LIA" : "Light Industrial A", 
			"LIB" : "Light Industrial B", 
			"LDR" : "Low Density Residential", 
			"NC" : "Neighborhood Commercial", 
			"PR" : "Planned Residential", 
			"PU" : "Public Utilities", 
			"RC" : "Regional Commercial", 
			"TC" : "Transportation Center", 
			"WR" : "Waterfront Recreation", 
			"RRR" : "Roads, Rails, ROWs", 
			"000" : "Unclassified", 
			"RA" : "Redevelopment Area", 
			"MZ" : "Multiple Zones", 
			"CZC-SECA" : "Commercial Zone C - Secaucus", 
			"LI1-SECA" : "Light Industrial Zone 1 - Secaucus", 
			"RZA-SECA" : "Residential Zone A - Secaucus", 
			"WAT" : "Water", 
			"LID-TET" : "Light Industrial & Distribution Zone - Teterboro", 
			"RA1-TET" : "Redevelopment Area 1 Zone - Teterboro", 
			"RA2-TET" : "Redevelopment Area 2 Zone - Teterboro", 
			"PA" : "Parks and Recreation", 
			"C-CARL" : "Commercial Zone - Carlstadt", 
			"LI-CARL" : "Light Industrial - Carlstadt", 
			"LDR-TET" : "Low Density Residential - Teterboro", 
			"MCZ-CARL" : "Mixed Commercial Zone - Carlstadt", 
			"RZ-CARL" : "Residential Zone - Carlstadt", 
			"RZB-SECA" : "Residential Zone B - Secaucus", 
			"MNF-MOON" : "Manufacturing Zone - Moonachie", 
			"R1-MOON" : "1-Family Residential Zone - Moonachie", 
			"R2-MOON" : "2-Family Residential Zone - Moonachie", 
			"B1-MOON" : "General Business Zone - Moonachie", 
			"B2-MOON" : "Limited Business Zone - Moonachie", 
			"R1-ER" : "Low Density Residential - E Rutherford", 
			"R2-ER" : "Medium Density Residential - E Rutherford", 
			"R3-ER" : "Multi-Family Residential - E Rutherford", 
			"NC-ER" : "Neighborhood Commercial - E Rutherford", 
			"RC-ER" : "Regional Commercial - E Rutherford", 
			"PCD-ER" : "Planned Commercial Development - E Rutherford", 
			"RD1-ER" : "Redevelopment-1 - E Rutherford", 
			"R1-NA" : "1-Family Residential - N Arlington", 
			"R2-NA" : "1&2-Family Residential - N Arlington", 
			"RRRA-NA" : "Ridge Road Redevelopment Area - N Arlington", 
			"PARA-NA" : "Porete Avenue Redevelopment Area - N Arlington", 
			"R3-NA" : "Multi-Family Residential - N Arlington", 
			"I1-NA" : "Light Industrial - N Arlington", 
			"C3-NA" : "Cemetery - N Arlington", 
			"P/OS-NA" : "Parks & Open Space - N Arlington", 
			"W/C-NA" : "Waterways & Creeks - N Arlington", 
			"SEA" : "Sports and Expositions", 
			"I-ER" : "Light Industrial -  E Rutherford", 
			"C2-NA" : "Commercial 2 - N Arlington", 
			"C1-NA" : "Commercial 1 - N Arlington", 
			"R1-RU" : "Single Family Residential - Rutherford", 
			"R1A-RU" : "Single Family Residential - Rutherford", 
			"R1B-RU" : "Single Family Residential - Rutherford", 
			"R2-RU" : "Two Family Residential - Rutherford", 
			"R4-RU" : "Five Story Apartment - Rutherford", 
			"B1-RU" : "Three Story Office - Rutherford", 
			"B2-RU" : "Five Story Office - Rutherford", 
			"B3-RU" : "Three Story Office-Retail - Rutherford", 
			"B3/SH-RU" : "Business / Senior Housing - Rutherford", 
			"B4-RU" : "Business / Light Industrial - Rutherford", 
			"ORD-RU" : "Ten Story Office, Research & Distribution - Rutherford", 
			"HC-RU" : "Highway Commercial Development - Rutherford", 
			"PCD-RU" : "Planned Commercial Development - Rutherford", 
			"R3-RU" : "Three Story Apartment - Rutherford", 
			"UR1A-RU" : "University / Residential, Single Family - Rutherford", 
			"C-RF" : "Commercial - Ridgefield", 
			"C/HRH-RF" : "Commercial / High Rise Hotel - Ridgefield", 
			"GA/TH C-RF" : "GA/TH Cluster - Ridgefield", 
			"LM-RF" : "Light Manufacturing - Ridgefield", 
			"NB-RF" : "Neighborhood Business - Ridgefield", 
			"O/TH-RF" : "Office / T.H. - Ridgefield", 
			"OC-RF" : "Office Commercial - Ridgefield", 
			"OMR-RF" : "Office Mid Rise - Ridgefield", 
			"OMRH-RF" : "Office Mid Rise Hotel - Ridgefield", 
			"OFR-RF" : "One Family Residential - Ridgefield", 
			"P/SP-RF" : "Public / Semi Public - Ridgefield", 
			"TH/SRCH-RF" : "TH / SR Citizens Housing - Ridgefield", 
			"T-RF" : "Townhomes - Ridgefield", 
			"TFR-RF" : "Two Family Residential - Ridgefield", 
			"RB-LF" : "One & Two Family Residential - Little Ferry", 
			"RM-LF" : "Multifamily Residential - Little Ferry", 
			"BH-LF" : "Highway & Regional Business - Little Ferry", 
			"BN-LF" : "Neighborhood Business - Little Ferry", 
			"IR-LF" : "Restricted Industrial - Little Ferry", 
			"IG-LF" : "General Industrial - Little Ferry", 
			"P-LF" : "Public Facilities - Little Ferry", 
			"RA-LF" : "One Family Residential - Little Ferry", 
			"P/SP-NA" : "Public/Semi-Public - N Arlington", 
			"A-SH" : "Residential - South Hackensack", 
			"B-SH" : "Commercial - South Hackensack", 
			"C-SH" : "Industrial - South Hackensack", 
			"M-SH" : "Mixed - South Hackensack", 
			"SCR-SH" : "Senior Citizen Multifamily Res - South Hackensack", 
			"RA-LYND" : "One Family Residence - Lyndhurst", 
			"RB-LYND" : "One and Two Familly Residence - Lyndhurst", 
			"RC-LYND" : "Medium Density Residential - Lyndhurst", 
			"B-LYND" : "Business - Lyndhurst", 
			"M1-LYND" : "Light Industrial - Lyndhurst", 
			"M2-LYND" : "Heavy Industrial - Lyndhurst", 
			"CGI-LYND" : "Commercial-General Industrial - Lyndhurst", 
			"R-1-K" : "One Family Residential - Kearny", 
			"OS-K" : "Open Space Parks and Recreation District - Kearny", 
			"SU-1-K" : "Special Use 1 - Kearny", 
			"SU-3_K" : "Special Use 3 - Kearny", 
			"SOCD-K" : "Street Oriented Commercial District - Kearny", 
			"SKI-N-K" : "South Kearny Industrial North - Kearny", 
			"SKI-S-K" : "South Kearny Industrial South - Kearny", 
			"RDP-K" : "Research Distribution Park - Kearny", 
			"RD-K" : "Residential District - Kearny", 
			"R-A-K" : "Redevelopment Area - Kearny", 
			"R-3-K" : "Multi-Family Residential - Kearny", 
			"R-2B-K" : "One_Two Family Residential/Hospital - Kearny", 
			"R-2-K" : "One_Two Family Residential - Kearny", 
			"PRD-K" : "Planned Residential Development - Kearny", 
			"MXD-K" : "Mixed Use District - Kearny", 
			"MP-K" : "Marshland Preservation - Kearny", 
			"M-K" : "Manufacturing - Kearny", 
			"LTI-K" : "Light Industrial - Kearny", 
			"LID-B-K" : "Light Industrial Distribution B - Kearny", 
			"LID-A-K" : "Light Industrial Distribution A - Kearny", 
			"LCD-K" : "Large Scale Commercial District - Kearny", 
			"H-I-K" : "Heavy Industrial - Kearny", 
			"ESCD-K" : "Existing Shopping Center District - Kearny", 
			"CEM-K" : "Cemetery - Kearny", 
			"C-4-K" : "General Commercial - Kearny", 
			"C-3-K" : "Community Business - Kearny", 
			"C-2-K" : "Neighborhood Business - Kearny", 
			"C-1-K" : "Office - Kearny", 
			"ARLD-K" : "Adaptive Reuse Loft District - Kearny", 
			"ACD-K" : "Automobile Oriented Commercial District - Kearny", 
			"LI-K" : "   Limited Industrial- Kearny", 
			"R1-NB" : "Low Density Residential - N Bergen", 
			"R2-NB" : "Intermediate Density Residential - N Bergen", 
			"R3-NB" : "Moderate Density Residential - N Bergen", 
			"C1-NB" : "General Business - N Bergen", 
			"C1A-NB" : "General Business Limited Mixed Use - N Bergen", 
			"C1B-NB" : "General Business Limited Mixed Use Bergenline - N Bergen", 
			"C1C-NB" : "General Business Mixed Use - N Bergen", 
			"C1R-NB" : "Commercial Residential District - N Bergen", 
			"C2-NB" : "Highway Business - N Bergen", 
			"I-NB" : "Industrial - N Bergen", 
			"P1-NB" : "Riverside - N Bergen", 
			"P2-NB" : "Edgecliff - N Bergen", 
			"P3-NB" : "River Road West - N Bergen", 
			"TRD-NB" : "Tonnelle Ave Redevelopment Area - N Bergen", 
			"ET-NB" : "East Side Tonnelle Ave Zone - N Bergen", 
			"GL-NB" : "Granton Ave-Liberty Ave-69th Street Zone - N Bergen", 
			"KO-NB" : "Kennedy Overlay Zone - N Bergen", 
			"TO-NB" :"Townhouse Overlay Zone - N Bergen"
		},
		
		"fieldNames" :{
			"PID" : "PID", 
			"PAMS Pin" : "PAMS Pin", 
			"OLD_BLOCK" : "Old Block", 
			"OLD_LOT" : "Old Lot", 
			"PROPERTY_ADDRESS" : "Address", 
			"TAX_ACRES" : "Tax Acres", 
			"CITY_STATE" : "City, State",
			"MAP_ACRES" : "GIS Acres",
			"MUN_CODE" : "Municipality",
			"LANDUSE_CODE" : "Landuse",
			"ZONE_CODE" : "Zone",
			'NAME' : 'Name',
			"ADDRESS" : 'Address',
			"FIRM_PAN" : "Firm Panel #",
			"TMAPNUM" : "Tidelands Map #",
			"FLD_ZONE" : "Flood Zone",
			"STATIC_BFE" : "Static Base Flood Elevation",
			"LABEL07" : "Wetland Label",
			"TYPE07" : "Wetland Type",
			"LU07" : "Anderson landuse class",
			"RECIEVINGWATER" : "Receiving Water",
			"NAME10" : "Voting District Label", 
			
			"FACILITY_NAME" : "Facility Name", 
			"BUILDING_LOCATION" : "Building Location", 
			"TOTALBLDG_SF" : "Total Building Square Feet", 
			"PHYSICAL_ADDRESS" : "Address", 
			"PHYSICAL_CITY" : "City", 
			"PHYSICAL_ZIP" : "Zip Code", 
			"COMPANY_CONTACT" : "Company Contact", 
			"CONTACT_PHONE" : "Phone", 
			"OFFICIAL_CONTACT" : "Official Contact", 
			"OFFICIAL_PHONE" : "Phone", 
			"EMERGENCY_CONTACT" : "Emergency Contact", 
			"EMERGENCY_PHONE" : "Phone", 
			"CAS_NUMBER" : "CAS Number", 
			
			"LandUse_Code" : "Landuse", 
			"Zone_Code" : "Zoning", 
			"LANDUSE_CODE" : "Landuse", 
			"ZONE_CODE" : "Zoning"
		
		}
		
	};

// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
//
//  D E P E N D E N C I E S
//
// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

	var dependencies = {
		"landuse":{
			"isLoaded":false
		},
		"legend":{
			"isLoaded":false
		}
	};			
	
	var loadingDialog;
	
	// require dojo and esri libs and parse
	require( 
		[	
				//"dgrid/OnDemandGrid", 
				//"dgrid/Selection", 
				//"dojo/store/Memory", 
				//"esri/Map", 
				//"esri/layers/FeatureLayer", 
				//"dojo/_base/declare", 
				//"dojo/number", 
				//"dojo/parser", 
				//"dojo/domReady!"
				

				//dijits
				"dijit/Dialog",
				"esri/dijit/Measurement", 
				"dijit/layout/BorderContainer", 
				"dijit/layout/TabContainer", 
				"dijit/layout/ContentPane",
				
				"esri/dijit/Scalebar", 
				"esri/dijit/OverviewMap",
				//"esri/dijit/Popup",

				//"dijit.Toolbar" // no longer need toolbar since we rolled our own
				
				
				// map components
				"esri/Map",
				"esri/toolbars/navigation",
				
				// tasks
				"esri/tasks/geometry",
				"esri/tasks/query",
				"dojo/domReady!",
	
		],
		
		function(  ){
		
			// set proxy options and path
			esri.config.defaults.io.alwaysUseProxy = false;
			esri.config.defaults.io.proxyUrl = DynamicLayerHost + "/proxy/proxy.ashx";
		
		
			// set the default geometry service
			esri.config.defaults.geometryService = new esri.tasks.GeometryService(DynamicLayerHost + "/ArcGIS/rest/services/Map_Utility/Geometry/GeometryServer");
			
			console.log("Dom Ready.....");
			
			loadingDialog = new dojo.dijit.Dialog({
				title: "Municipal Map",
				content: "<div style=\"text-align:center;margin-top:30px;margin-bottom:30px;\">"+
							"<h2>Welcome to MERI's Municipal Map</h2>"+
							//"<div style=\"margin:20px 0 20px 0;\"><img src=\"map_loading_40.gif\" ></div>"+
							"<div style=\"margin:20px 0 20px 0;\"><img src=\"meri_globe.gif\" ></div>"+
							"<h3 style=\"padding:0 40px 0 40px;\">Please be patient while the web application is prepared.</h3>"+
						 "</div>",
						 
				style: "width: 360px;height:"
			});
			
			
	
			// request landuse and build object.
			dojo.xhrGet({
				// request the url for the LandUse Layer definition, including all domains
				url: "http://webmaps.njmeadowlands.gov/ArcGIS/rest/services/Parcels/NJMC_Parcels_2011/MapServer/3?f=json",
				handleAs: "json",
				load: function(json) {
					//alert("The message is: " + result);
					console.log("json response:", json);
					for( field in json.fields ){
						if( json.fields[field].name == "LANDUSE_CODE"){
							landuse_json = json.fields[field].domain.codedValues;
						}
					}
					// now that data is loaded
					dependencies["landuse"].isLoaded = true;
					loadContinue( );
				},
				error: function() {
					// in case of error fail to these values - 061312
					landuse_json = [
						{"code":"CO","name":"Commercial Office"},
						{"code":"CR","name":"Commercial Retail"},
						{"code":"HM","name":"Hotels and Motels"},
						{"code":"IND","name":"Industrial"},
						{"code":"ICC","name":"Industrial Commercial Complex"},
						{"code":"PQP","name":"Public/Quasi Public Services"},
						{"code":"RL","name":"Recreational Land"},
						{"code":"RES","name":"Residential"},
						{"code":"TRS","name":"Transportation"},
						{"code":"WAT","name":"Water"},
						{"code":"WET","name":"Wetlands"},
						{"code":"000","name":"Unclassified"},
						{"code":"CU","name":"Communication Utility"},
						{"code":"MU","name":"Multiple Uses"},
						{"code":"VAC","name":"Open Lands"},
						{"code":"TL","name":"Transitional Lands"}
					];
					
					dependencies["landuse"].isLoaded = true;
					loadContinue( );
					
					//f_search_landuse_build();
					
				}
			});
			
			// request legend from MunicipalMap_live service and set object.
			dojo.xhrGet({
				// The URL of the request
				url: DynamicLayerHost + "/ArcGIS/rest/services/Municipal/MunicipalMap_live/MapServer/legend?f=json",
				// The success callback with result from server
				handleAs:"json",
				handle: function( content ) {
					console.log( "map_legend", content);
					map_legend = content;
					dependencies["legend"].isLoaded = true;
					loadContinue( );
				}			
			});	

			loadingDialog.show();
			
			dojo.connect( window, "onresize", resize_content_pane );			

//
}); // END onReady LOAD
		
	
		
	// map globals;
	var mmm, M_meri, basemap_dynamic, navToolbar, tool_selected,
		LD_base, LD_visible = [],
		LD_flooding, LD_flood_visible =[],
		ERIS_base,
		njmcExtent;
		
	// ALL Local Variables converted to MapObject
	
	// initialize all query and query tasks
	// query tasks
	var QT_parcel, QT_owners, QT_address, QT_blockLot, QT_landuse, QT_landuse_parcel, QT_facility, QT_owner_int, QT_owner_parcels, QT_ERIS_selection, QT_ERIS_BIDtoINTERMEDIATE;

	// queries 
	var Q_parcel, Q_owners, Q_address, Q_blockLot, Q_landuse, Q_landuse_parcel, Q_facility, Q_owner_int, Q_owner_parcels, Q_ERIS_selection, Q_ERIS_BIDtoINTERMEDIATE, Q_RTK_IDS;
	
	// Identify Task, parameters, and layer array
	var IT_Parcels, IP_Parcels, IT_Map_All, IP_Map_All, IP_Identify_Layers = [];
	   
	// selected graphic, map click event
	var G_parcel_selected, EVT_parcel_click;

	// object for collection of feature sets.. as returned by relationship query for owners -> int -> parcels
	var featureSet_ownerParcels = [];

	// object for collection of selected parcels and buffered parcels
	var fSet_selected_parcels = [], fSet_buffered_parcels = [];
	
	///////////////////////
	// GRAPHIC LAYERS
	///////////////////////
	
	// SELECTION
	var GL_parcel_selection;
	var GL_parcel_owners;
	
	// BUFFER
	var GL_buffer_parcel, GL_buffer_buffer, GL_buffer_selected_parcels;
	//var GL_parcel_selection_buffer, GL_parcel_buffer, GL_parcel_buffer_parcels;
	// SEARCH RESULTS

	var GL_query_parcel, GL_query_landuse, GL_query_facility,  GL_parcel_owners;

	// SYMBOLS
	var S_feature_selection, S_feature_flash, S_buffer_parcel, S_buffer_buffer, S_buffer_selected_parcels;
	
	// BUFFER GEOMETRY SERVICE
	var GS_parcel_selection_buffer;

	// BUFFER TASK PARAMTERS
	var TP_parcel_selection_buffer;
	
	// NAVIGATION MENU SELECTION BASED QUERIES
	var QT_parcel_selection, Q_parcel_selection;
	
	var printMapLink = "http://webmaps.njmeadowlands.gov/municipal/print_parcel_info.php?id=";

	// OBJECTS TO HOLD DISPLAY PROPERTIES FOR FEATURES
	var F_outFields = {
		"parcel":[ "PID", "PAMS_PIN" ,"BLOCK", "LOT", "OLD_BLOCK", "OLD_LOT", "FACILITYNAME", "PROPERTY_ADDRESS", "MAP_ACRES", "TAX_ACRES", "MUN_CODE" ],
		"parcelB":[ "PID", "PAMS_PIN", "MUN_CODE", "BLOCK", "LOT", "OLD_BLOCK", "OLD_LOT", "FACILITY_NAME", "PROPERTY_ADDRESS" ],
		"owner":[ "OWNID", "NAME", "ADDRESS", "CITY_STATE", "ZIPCODE" ],
		"building":[ "PID", "BID", "MUNICIPALITY", "BUILDING_LOCATION" ,"FACILITY_NAME" ],
		"ERIS":[ "*" ]
	}
	
	var overviewMapDijit, measurementDijit, scalebarDijit;
	
	var L_opacities = {};

	// IMAGE LAYER OBJECT. SET ON LOAD AND WHEN IMAGE LAYER IS TOGGLED
	var IL_basemap;
	// templates for features

	// simple objects that can be copied on each template usage
	// provides one place to edit all templates

	var F_IW_templates = {

		"parcel":{
			"title": f_getWindowTitle,
			"content": f_getWindowContent
		},
		parcel_buffer:{
			"title":"${PID}<br /><a class=\"parcelTools buffer\" href=\"#test\">Buffer</a>",
			"content":"PAMS_PIN: ${PAMS_PIN}<br />MUN_CODE: ${MUN_CODE}<br />PROPERTY_ADDRESS: ${PROPERTY_ADDRESS}<a href=\"#\" onclick=\"clk_buffer_parcel(${OBJECTID})\">link</a>"
		}
	}

	
	// imagery layers.. toc imagery is dynamically built from JSON object
	
	var map_legend, map_legend_eris;
	
	// map layers... toc for layers is dynamically build from JSON object
	
	var map_layers_flooding_json = {
		
		"title":"Flooding Scenarios",
		title_tgf:"Predicted Flooding in absence of tidegates",
		title_surge:"Storm Surge",
		scenarios:
			[	
				{"group":8,"lyr":1,"vis":0},
				{"group":7,"lyr":4,"vis":0},
				{"group":6,"lyr":7,"vis":0},
				{"group":5,"lyr":10,"vis":0},
				{"group":4,"lyr":13,"vis":0},
				{"group":3,"lyr":16,"vis":0},
				{"group":2,"lyr":19,"vis":0}
			]	
	};
		
	// options for municipality search is built with JSON object. centroid is not yet used, but should be implemented for a zoom to muni function
	var munis_json = [
		{"muncode":"0205","mun":"Carlstadt","centroid":{"x":613600,"y":725600}},
		{"muncode":"0212","mun":"East Rutherford","centroid":{"x":606900,"y":723200}},
		{"muncode":"0906","mun":"Jersey City","centroid":{"x":611600,"y":685800}},
		{"muncode":"0907","mun":"Kearny","centroid":{"x":597300,"y":699400}},
		{"muncode":"0230","mun":"Little Ferry","centroid":{"x":619700,"y":733600}},
		{"muncode":"0232","mun":"Lyndhurst","centroid":{"x":600100,"y":715300}},
		{"muncode":"0237","mun":"Moonachie","centroid":{"x":614100,"y":731500}},
		{"muncode":"0239","mun":"North Arlington","centroid":{"x":595300,"y":712000}},
		{"muncode":"0908","mun":"North Bergen","centroid":{"x":623600,"y":714400}},
		{"muncode":"0249","mun":"Ridgefield","centroid":{"x":626400,"y":728100}},
		{"muncode":"0256","mun":"Rutherford","centroid":{"x":601200,"y":724000}},
		{"muncode":"0909","mun":"Secaucus","centroid":{"x":612300,"y":709700}},
		{"muncode":"0259","mun":"South Hackensack","centroid":{"x":616100,"y":737700}},
		{"muncode":"0262","mun":"Teterboro","centroid":{"x":614000,"y":737700}}
	];

	var quals_json = [
		{"id":"MD","name":"In District","desc":"All parcels fully within the NJMC District"},
		{"id":"OMD","name":"Out of District","desc":"All parcels fully outside the NJMC District"},
		{"id":"MD-OMD","name":"Borderline Parcels","desc":"All parcels partially in and partially out of the NJMC District"}
	];

	
	

	var mapLayersJSON = [		
			{"name":"Environmental",
				"id":"environ",
				"layers":[	
					{"id":"14","name":"FEMA Panel","vis":1,"ident":1,"desc":"FEMA Panel"},
					{"id":"25","name":"Riparian Claim (NJDEP)","vis":0,"ident":1,"desc":"Riparian Claim (NJDEP)"},
					{"id":"27","name":"FEMA (100-YR FLOOD)","vis":0,"ident":1,"desc":"FEMA (100-YR FLOOD)"},
					{"id":"28","name":"Wetlands (DEP)","vis":0,"ident":1,"desc":"Wetlands (DEP)"}
				]
			},
			{"name":"Hydro",
				"id":"hydro",
				"layers":[	
					{"id":1,"name":"Tidegates","vis":1,"ident":1,"desc":"Tidegates"},
					{"id":2,"name":"Creek Names","vis":1,"ident":0,"desc":"Creek Names"},
					{"id":13,"name":"Drainage","vis":1,"ident":1,"desc":"Drainage"},
					{"id":23,"name":"Hydro Lines - Wetland Edge","vis":1,"ident":1,"desc":"Hydro Lines - Wetland Edge"},
					{"id":24,"name":"Waterways","vis":0,"ident":0,"desc":"Waterways"}
				]
			},
			{"name":"Infrastructure/ Utilities",
				"id":"inf_util","layers":[	
					{"id":5,"name":"Stormwater Catchbasins","vis":0,"ident":1,"desc":"Stormwater Catchbasins"},
					{"id":6,"name":"Stormwater Manholes","vis":0,"ident":1,"desc":"Stormwater Manholes"},
					{"id":7,"name":"Stormwater Outfalls","vis":0,"ident":1,"desc":"Stormwater Outfalls"},
					{"id":8,"name":"Stormwater Lines","vis":0,"ident":1,"desc":"Stormwater Lines"},
					{"id":9,"name":"Sanitary Manhole","vis":0,"ident":1,"desc":"Sanitary Manhole"},
					{"id":10,"name":"Sanitary Lines","vis":0,"ident":1,"desc":"Sanitary Lines"},
					{"id":11,"name":"Hydrants","vis":1,"ident":1,"desc":"Hydrants"}
				]
			},
			{"name":"Political / Jurisdiction",
				"id":"planning_cad",
				"layers":[	
					{"id":3,"name":"NJMC District","vis":1,"ident":0,"desc":"NJMC District"},
					{"id":4,"name":"Municipal Boundaries","vis":1,"ident":0,"desc":"Municipal Boundaries"},
					{"id":20,"name":"Block Limit","vis":1,"ident":0,"desc":"Block Limit"},
					{"id":21,"name":"Parcel Lines","vis":1,"ident":0,"desc":"Parcel Lines"},
					{"id":26,"name":"Buildings","vis":1,"ident":1,"desc":"Buildings"},
					{"id":31,"name":"Land Use","vis":0,"ident":1,"desc":"Land Use"},
					{"id":32,"name":"Zoning","vis":0,"ident":1,"desc":"Zoning"},
					{"id":22,"name":"Encumbrance/Easements","vis":0,"ident":1,"desc":"Encumbrance/Easements"},
					{"id":30,"name":"Census Blocks 2010","vis":0,"ident":0,"desc":"Census Blocks 2010"},
					{"id":29,"name":"Voting Districts 2010","vis":0,"ident":1,"desc":"Voting Districts 2010"}
				]
			},
			{"name":"Topographic & Planimetrics",
				"id":"topo_plan",
				"layers":[	
					{"id":0,"name":"Spot Elevations","vis":0,"ident":1,"desc":"Spot Elevations"},
					{"id":15,"name":"Fence Lines","vis":0,"ident":1,"desc":"Fence Lines"},
					{"id":16,"name":"Contour Lines","vis":0,"ident":1,"desc":"Contour Lines"}
				]
			},
			{"name":"Transportation",
				"id":"trans",
				"layers":[	
					{"id":12,"name":"DOT Roads","vis":1,"ident":1,"desc":"DOT Roads"},
					{"id":19,"name":"Bridges - Overpass","vis":1,"ident":0,"desc":"Bridges - Overpass"},
					{"id":17,"name":"Rails","vis":1,"ident":1,"desc":"Rails"},
					{"id":18,"name":"Roads ROW","vis":1,"ident":1,"desc":"Roads ROW"}
				]
			}
		];
	
	var imageryLayersJSON = [
			{"id":"IMG_1930_BW","title": "1930 Black and White (NJDEP)", "desc": "1930 Black and White Imagery from the NJDEP"},
			{"id":"IMG_1958_BW","title": "1958 Black and White (NJDEP)", "desc": "1958 Black and White Imagery from the NJDEP"},
			{"id":"IMG_1969_BW","title": "1969 Black and White (NJMC)", "desc": "1969 Black and White Imagery from the NJMC"},
			{"id":"IMG_1978_BW","title": "1978 Black and White (NJMC)", "desc": "1978 Black and White Imagery from the NJMC"},
			{"id":"IMG_1985_BW","title": "1985 Black and White (NJMC)", "desc": "1985 Black and White Imagery from the NJDEP"},
			{"id":"IMG_1992_BW","title": "1992 Black and White (NJMC)", "desc": "1992 Black and White Imagery from the NJMC"},
			{"id":"IMG_1995-97_CIR","title": "1995-97 Color Infrared (NJDEP)", "desc": "1995-1997 Color Infrared Imagery from the NJDEP"},
			{"id":"IMG_2001_C","title":"2001 Color (NJMC)","desc":"2001 True Color Imagery from GEOD"},
			{"id":"IMG_2002_BW","title": "2002 Black and White (NJMC)", "desc": "2002 Black and White from the NJMC"},
			{"id":"IMG_2002_C","title": "2002 Color Infrared (NJDEP)", "desc": "2002 Color Infrared Imagery from the NJDEP"},
			{"id":"IMG_2008_C","title": "2008 Color (NJDEP)", "desc": "2008 True Color Imagery from the NJDEP"},
			{"id":"IMG_2009_C","title": "2009 Color (NJMC)", "desc": "2009 True Color Imagery from the NJMC"},
			{"id":"IMG_2010_C","title": "2010 Color (Hudson County)", "desc": "2010 True Color Imagery from Hudson County. This imagery only covers the Hudson County portion of the NJMC District"}
		];
	
			
	var landuse_json;
	
	// layer id and fields to display
	var identify_fields_json = {	
		14:["FIRM_PAN"], // fema panel
		25:["TMAPNUM","STATUS "], // riparian claim
		27:["FLD_ZONE","FLOODWAY","STATIC_BFE","SFHA_TF"], //fema 100yr flood
		28:["LABEL07","TYPE07","ACRES","LU07"], // wetlands
		1:["MUNICIPALITY","TIDEGATE_NAME","GPSPOINT_TYPE","ELEVATION","DATE_OBS","TYPE_OF_TIDE_GATE","TYPE_OF_GATE","FUNCTIONALITY","MAINTENANCEREQUIRED"], //tidegates
		13:["TYPE"], //drainage
		23:["TYPE"], //hydro lines
		5:["MUNICIPALITY","CATCHBASINTYPE", "CATCHBASINSHAPE", "WATERTYPE","RECIEVINGWATER","WALLMATERIAL", "RIM"], //stormwater catchbasin
		6:["NJMCMANHOLEID","MANHOLETYPE","WALLMATERIAL"], //stormwater manhole
		7:["NJMCOUTFALLID","RECEIVINGWATERS","HEADWALL","DIAMETER","MATERIAL","OUTLETCONDITION","SCOURING","OWNEDBY","MAINTAINEDBY"], //sotmwater outfal
		8:["NJMCLINEID","FROMSTRUCTURE","TOSTRUCTURE","DIAMETER","LENGTH","INVERTUP","INVERTDOWN"], // stormwater line
		9:["NJMCMANHOLEID","WALLMATERIAL","WATERTYPE","LOCATIONDESCRIPTION","RIMELEVATION"], //sanitary manhole
		10:["NJMCLINEID","FROMSTRUCTURE","TOSTRUCTURE","DIAMETER","HEIGHT","LENGTH","MATERIAL","INVERTUP","INVERTDOWN"], //sanitary line
		11:["ID","STREET","LOCATION1","LOCATION2","ACCESS_","PIPE_DIAMETER","PIPEDIAMETER_VALUE"], //hydrants
		26:["BID","FACILITY_NAME","BUILDING_LOCATION","TOTALBLDG_SF"], //buildings
		31:["LandUse_Code"], //landuse
		32:["Zone_Code"], //zoning
		22:["ENCUMBRANCETYPE","ENCUMBRANCEOWNER","ENCUMBRANCEDESCRIPTION"], //encumberance
		29:["NAME10"],  //voting districts
		0:["ELEVATION"], //sopt elevations
		15:["Elevation","Type"], //fence line
		16:["ELEVATION"], //countor lines
		12:["SLD_NAME"], //dot roads
		17:["Elevation","Type"], //rail
		18:["Elevation","Type"] //roads row
	};

	// non map globals
	var SearchDivs = ["search_PROP","search_OWNR","search_FAC"];
	
	// todo:clean up randomly scoped vars
	var search_LandUseIDs = [];
	var GV_current_ownerid;
	var GV_searchtool_current;

	//var DynamicLayerHost = "http://"+ location.hostname;
	var DynamicLayerHost = "http://webmaps.njmeadowlands.gov";

		
		
// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	//
	//  D Y N A M I C   L A Y E R   L I S T
	//
	//	** Current the dynamic layerlist is drawn from the JSON object.
	//  this could be adjusted below in the commented function that uses each
	//  layers information to determine visibilities, etc.
	//
	//  ** ultimately we would like to have the layer list only list layers
	//  that are visible at the current extent. might be too much for a simple layer.
	//  maybe we can just disable the checkbox when the layer is not visible.
	//
	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

	function f_layer_list_build(  ) {
		
		console.log("mapLayersJSON", mapLayersJSON);
	
		dojo.forEach( mapLayersJSON , function( group, index ){

			// create toc group div
			var e_div_group = dojo.doc.createElement("div");
			e_div_group.setAttribute("class","toc_group_div");
			e_div_group.id = "toc_grp_"+ group.id;

			// create toc group div title div
			var e_div_title = dojo.doc.createElement("div");
			e_div_title.setAttribute("class","toc_group_title");
			e_div_title.innerHTML = group.name;

			// create toc group layer div container div
			var e_div_group_layers = dojo.doc.createElement("div");
			e_div_group_layers.setAttribute("class","toc_group_container");
			e_div_group_layers.setAttribute("title", group.name);

			// add the title div to the group div
			e_div_group.appendChild( e_div_title);

			// loop through all group layers
			dojo.forEach( group.layers, function( layer, lyrIndex ){

				//create a new div element to hold the layer checkbox and name
				var e_div = dojo.doc.createElement("div");
				e_div.setAttribute("class","toc_layer_div");

				// create a new input checkbox element and assig its class, default visibility (check), click event and id
				var e_chk = dojo.doc.createElement("input");
				e_chk.type = "checkbox";
				e_chk.setAttribute("class","toc_layer_check");

				// test to see if layer checkbox should be checked by default; if so, check it
				if( layer.vis ) e_chk.setAttribute("checked", "checked");
				
				// test is the layer should be included in IDENTIFY results, if so add to array
				if( layer.ident ) IP_Identify_Layers.push(layer.id);

				e_chk.id = "m_layer_" + layer.id;
				e_chk.setAttribute("onclick", "f_layer_list_update()");

				// create a label element for the checkbox, set the for and innerHTML properties
				var e_lbl = dojo.doc.createElement("label");
				e_lbl.setAttribute("for", "m_layer_" + layer.id);
				e_lbl.setAttribute("class", "toc_layer_label");
				e_lbl.setAttribute("title", layer.desc);
				e_lbl.innerHTML = layer.name;

				// append legend anchor
				var e_legend_link = dojo.doc.createElement("span");
				e_legend_link.setAttribute("class","toc_legend_toggle toc_imagedown");
				e_legend_link.innerHTML = "<img id=\"toc_img_"+layer.id +"\" src=\"" + DynamicLayerHost + "/municipal/images/icons_BK/more_arrow_down.png\" />";
				e_legend_link.setAttribute("onclick", "toggle_visibility(\"toc_legend_" + layer.id + "\")");
				
				// append legend div
				var e_div_legend = dojo.doc.createElement("div");
				e_div_legend.setAttribute("class","toc_legend");
				e_div_legend.id = "toc_legend_"+ layer.id;
				
				e_div_legend.innerHTML = ""; //map_legend.layers[layer.id].layerName + "--- <br />";
				
				dojo.forEach( map_legend.layers[ layer.id ].legend, function( layer_legend ){
					e_div_legend.innerHTML += "<div> <img src=\"" + DynamicLayerHost + "/ArcGIS/rest/services/Municipal/MunicipalMap_live/MapServer/1/images/" + layer_legend.url + "\" />"+ layer_legend.label + " </div>";
				});
				
				// add checkbox and label to the div element
				e_div.appendChild( e_chk);
				e_div.appendChild( e_lbl);
				e_div.appendChild( e_legend_link);
				e_div.appendChild( e_div_legend);

				// append the div element to the map_layer placeholder
				//dojo.byId("map_layers").appendChild( e_div);
				e_div_group_layers.appendChild( e_div);

			});
			
			// add current layers to group div
			e_div_group.appendChild( e_div_group_layers );

			// append group div to page div
			dojo.byId("map_layer_groups").appendChild( e_div_group);
		});
		
		// create toc group div
		var e_div_flood = dojo.doc.createElement("div");
		e_div_flood.setAttribute("class","toc_group_div");
		e_div_flood.id = "toc_grp_flood";

		// create toc group div title div
		var e_div_title = dojo.doc.createElement("div");
		e_div_title.setAttribute( "class", "toc_group_title" );
		e_div_title.innerHTML = map_layers_flooding_json.title;
		
		var e_flood_legend = dojo.doc.createElement("div");
		var img_flood_surge = dojo.doc.createElement("img");
		
		dojo.attr( img_flood_surge, {
			src: "http://webmaps.njmeadowlands.gov/ArcGIS/rest/services/Flooding/Flooding_Scenarios/MapServer/2/images/C5A8CAC6",
			alt: "Flooding due to tidal surge",
			"title": "Flooding due to tidal surge"
		});
		
		var img_flood_surge_lbl = dojo.doc.createElement("div");
		
		img_flood_surge_lbl.appendChild( img_flood_surge);
		img_flood_surge_lbl.appendChild( dojo.doc.createTextNode("Flooding due to tidal surge"));
		
		var img_flood_tgf = dojo.doc.createElement("img");
		
		dojo.attr(img_flood_tgf, {
			"src": "http://webmaps.njmeadowlands.gov/ArcGIS/rest/services/Flooding/Flooding_Scenarios/MapServer/3/images/5ABA6602",
			"alt": "TGF",
			"title": "Predicted Flooding in absence of tidegates"
		});
		
		var img_flood_tgf_lbl = dojo.doc.createElement("div");
			
		img_flood_tgf_lbl.appendChild( img_flood_tgf );
		img_flood_tgf_lbl.appendChild( dojo.doc.createTextNode("Predicted Flooding in absence of tidegates"));
		
		e_flood_legend.appendChild( img_flood_surge_lbl );
		e_flood_legend.appendChild( img_flood_tgf_lbl );
		
		e_div_flood.appendChild( e_div_title );
		e_div_flood.appendChild( e_flood_legend );
		
		// loop through all flooding scenarios and create a checkbox and link
		dojo.forEach( map_layers_flooding_json.scenarios, function( scenario, index ){
		
			// create div witch check box for scenario group
			var e_div_group = dojo.doc.createElement("div");
			e_div_group.setAttribute("class","toc_group_div flood_group");
			e_div_group.id = "toc_fld_"+ scenario.group;
			
			// add checkbox for scenario group
			var e_chk_group = dojo.doc.createElement("input");
			e_chk_group.type = "checkbox";
			e_chk_group.setAttribute("class","toc_layer_flood_check");
			
			if ( scenario.vis ) e_chk_group.setAttribute("checked", "checked");
					
			e_chk_group.id = "m_layer_flood_" + scenario.lyr;
			e_chk_group.setAttribute("onclick", "f_layer_list_flood_update()");
			
			var e_lbl_group = dojo.doc.createElement("label");
			e_lbl_group.setAttribute("for", "m_layer_flood_" + scenario.lyr);
			e_lbl_group.setAttribute("class", "toc_layer_label ");
			e_lbl_group.setAttribute("title", scenario.group + " Predicted Flooding in absence of tidegates");
			e_lbl_group.innerHTML = scenario.group + " Foot Tidal Surge";
			
			// append group checkbox and label
			e_div_group.appendChild( e_chk_group);
			e_div_group.appendChild( e_lbl_group);
			
			e_div_flood.appendChild( e_div_group);
			
		});
		
		// append all flood scenarios to flood toc container
		dojo.byId("map_layer_groups").appendChild( e_div_flood);
		
			
	} // end layer_list_build function
	
	function f_layer_list_update() {

		// create array of all checkboxes
		var inputs = dojo.query(".toc_layer_check"), input;

		// reset visibilties array
		LD_visible = [];

		// loop through all checkboxes; if checked, append to to visibilities array
		dojo.forEach( inputs, function( input ){
		  if ( input.checked ) LD_visible.push( input.id.replace( "m_layer_", "" ) );
		});

		//if there aren"t any layers visible set the array to be -1
		if( LD_visible.length === 0) LD_visible.push(-1);

		// update the map layer visibilities
		LD_base.setVisibleLayers( LD_visible );
	}
	
	function f_layer_list_flood_update() {

		// create array of all checkboxes
		var inputs = dojo.query(".toc_layer_flood_check"), input;

		// reset visibilties array
		LD_flood_visible = [];

		// loop through all checkboxes; if checked, append to to visibilities array
		dojo.forEach(inputs,function(input){
		  if ( input.checked ) LD_flood_visible.push( input.id.replace( "m_layer_flood_", "") );
		});

		//if there aren"t any layers visible set the array to be -1
		if ( LD_flood_visible.length === 0 ) LD_flood_visible.push( -1 );

		// update the map layer visibilities
		LD_flooding.setVisibleLayers( LD_flood_visible );
	}
	
	function f_layer_list_eris_update() {

		// create array of all checkboxes
		var inputs = dojo.query(".toc_layer_eris_check"), input;

		// reset visibilties array
		LD_eris_visible = [];

		// loop through all checkboxes; if checked, append to to visibilities array
		dojo.forEach( inputs, function( input ){
		  if ( input.checked ) LD_eris_visible.push( input.id.replace( "m_layer_", "" ));
		});

		//if there aren"t any layers visible set the array to be -1
		if( LD_eris_visible.length === 0 ) LD_eris_visible.push( -1 );

		// update the map layer visibilities
		ERIS_base.setVisibleLayers( LD_eris_visible );
	}

	// expand and colapse all map layer groups
		
	function f_toc_vis( show ){

		var groups = dojo.query( ".toc_group_container" );

		if( show ){
			dojo.forEach( groups , function( group ){
				dojo.style( group ,"display", "block");
			});
		}
		else{
			dojo.forEach( groups, function( group ){
				dojo.style( group, "display", "none" );
			});
		}
	}

	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	//
	//  I M A G E R Y   L A Y E R S
	//
	//  ** this funtionality will allow the user to choose the desired
	//  imagery base map
	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

	function f_imagery_list_build( ){
		console.log("Imagery Layers JSON:", imageryLayersJSON);
		
		dojo.forEach( imageryLayersJSON, function( img_lyr, index ){

			var e_div = dojo.doc.createElement("div");
			e_div.setAttribute("class","image_layer_div");
			e_div.setAttribute("title",img_lyr.desc);

			// create a new input radio element and assig its class,name,id and onclick event
			var e_rdo = dojo.doc.createElement("input");
			e_rdo.type = "radio";
			e_rdo.setAttribute( "class", "img_layer_rdo" );
			e_rdo.setAttribute( "name", "img_rdos" );
			e_rdo.id = img_lyr.id;

			e_rdo.setAttribute("onclick", "f_image_layer_toggle(\""+ img_lyr.id +"\")");

			// create a label element for the checkbox, set the for and innerHTML properties
			var e_lbl = dojo.doc.createElement("label");
			e_lbl.setAttribute("for", img_lyr.id);
			e_lbl.setAttribute("class", "img_layer_label");
			e_lbl.innerHTML = img_lyr.title;

			// add radio and label to the div element
			e_div.appendChild( e_rdo);
			e_div.appendChild( e_lbl);

			// append the div element to the map_layer placeholder
			dojo.byId("map_images").appendChild( e_div );
		});
	}

	function f_image_layer_toggle(img_layer){

		M_meri.removeLayer(IL_basemap);

		IL_basemap = new esri.layers.ArcGISImageServiceLayer( DynamicLayerHost + "/ArcGIS/rest/services/Imagery/" + img_layer + "/ImageServer");

		M_meri.addLayer( IL_basemap, 0 );
	}

	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	//
	//  M A P    F U N C T I O N S  -  C L I C K   H A N D L E R
	//
	//  ** Click handler will determine which event is triggered when the
	//  map is clicked.
	//
	//  the function that will be triggered is based on the currently
	//  selected navigation item..
	//
	//  Global Var tool_selected
	//
	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

	function f_map_click_handler( evt_click ){

		// debug logging
		console.log("map clicked:\n  current tool: "+ tool_selected );

		switch( tool_selected ){
			case "select": f_parcel_selection_exec( evt_click ); break;
			case "buffer": f_parcel_buffer_exec( evt_click ); break;
			case "identify": f_map_identify_exec( evt_click ); break;
			case "measure":break;
			case "pan": console.log("map mode is pan"); break;
		}
	}

	function f_map_identify_init( ){
	
		IT_Map_All = new esri.tasks.IdentifyTask( DynamicLayerHost + "/ArcGIS/rest/services/Municipal/MunicipalMap_live/MapServer" );
		IP_Map_All = new esri.tasks.IdentifyParameters();
		IP_Map_All.tolerance = 3;
		IP_Map_All.returnGeometry = true;
		IP_Map_All.layerIds = IP_Identify_Layers; // use global settings, as determined by layer list build function and defined in map layer json obj
		IP_Map_All.layerOption = esri.tasks.IdentifyParameters.LAYER_OPTION_ALL;
		IP_Map_All.width  = M_meri.width;
		IP_Map_All.height = M_meri.height;
	}
	
	function f_map_identify_exec( click_evt ) {

		IP_Map_All.geometry = click_evt.mapPoint;
		IP_Map_All.mapExtent = M_meri.extent;
	  
		IT_Map_All.execute(IP_Map_All,function(identifyResults){
		
			//alert("yay - results: " + results.features.length);
					
			dojo.forEach(identifyResults, function(identifyResult){
				
				// identifyResult has following objects
				// displayFieldName
				// feature
				// layerId
				// layerName
				
				// create layer div
				var el_layer = dojo.doc.createElement("div");
				//el_layer.id = "identLayer_" + identifyResult.layerName;
				el_layer.setAttribute("class","ident_layer");
			
				var el_layer_title = dojo.doc.createElement("div");
				el_layer_title.setAttribute("class","ident_layer_title");
				el_layer_title.innerHTML = toProperCase( identifyResult.layerName );
				
				// add the title div to the layer div
				el_layer.appendChild( el_layer_title);
				
				// loop through all attributes for this div
				dojo.forEach( identify_fields_json[ identifyResult.layerId ], function( attr ){
				
					//create attribute div
					var el_layer_attr = dojo.doc.createElement( "div" );
					el_layer_attr.setAttribute( "class", "ident_layer_attr" );
					
					var el_layer_attr_field = dojo.doc.createElement("span");
					el_layer_attr_field.setAttribute( "class", "ident_field" + " field_" + attr);
					el_layer_attr_field.innerHTML = fieldAlias(attr);
					
					var el_layer_attr_val = dojo.doc.createElement( "span" );
					el_layer_attr_val.setAttribute("class","ident_value" + " val_" + attr);
					el_layer_attr_val.innerHTML = identifyResult.feature.attributes[attr];
					
					// append field name span to attribute (row) div
					el_layer_attr.appendChild( el_layer_attr_field);
					
					// append field value span to attribute (row) div
					el_layer_attr.appendChild( el_layer_attr_val );
					el_layer.appendChild( el_layer_attr );
				});
				dojo.byId( "dIdentifyResults" ).appendChild( el_layer );
			});
		}, showerror);

	}
	
	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	//
	//  P A R C E L ( S )    S E L E C T I O N
	//
	//  1. Select one or more parcels,
	//
	//  2. Save parcel featureSet to global object fSet_selected_parcels
	//
	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

	function f_parcel_selection_init(){

		// query on the Parcel Feature Class - layer id 0
		QT_parcel_selection = new esri.tasks.QueryTask( DynamicLayerHost + "/ArcGIS/rest/services/Parcels/NJMC_Parcels_2011/MapServer/0" );

		Q_parcel_selection = new esri.tasks.Query();
		Q_parcel_selection.returnGeometry = true;
		Q_parcel_selection.outFields = F_outFields.parcel;//["OBJECTID","PID","PAMS_PIN","MUN_CODE","BLOCK","LOT","OLD_BLOCK","OLD_LOT","FACILITY_NAME","PROPERTY_ADDRESS"];
	}

	function f_parcel_selection_exec( map_event ){
		// get map clicked point
		Q_parcel_selection.geometry = map_event.mapPoint;
		// run the query task and pass results to the process_results_parcel function, passing "selection" as the type
		QT_parcel_selection.execute( Q_parcel_selection, function( results ){
			console.log("parcel selected");
			f_process_results_parcel( "selection", results );
		});
	}
	
		
	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	//
	//  S E L E C T I O N / B U F F E R  / O W N E R  G R A P H I C S   A C T I O N S 
	//
	//  - all graphical operations have been combined for all collections..
	//	this includes parcel selection and buffer selection
	//
	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	
	function f_feature_action( funct, type, object_attr, oid ){

		console.log( "|| f_feature_action ||\n Function: " + funct + "\n Type: "+ type + "\n PID: "+ oid + "\n");
		
		var graphics_layer, target_div, child_div, object_attr;
		
		object_attr = "PID";
		
		switch( type ){
			case "selection":
				graphics_layer = GL_parcel_selection;
				target_div = "r_map_selection";
				child_div = "selParcel_" + oid;
				break;
			
			case "parcel":
				graphics_layer = GL_query_parcel;
				target_div = "dSearchResults";
				//child_div = "searchParcel_" + oid;
				child_div = "r_parcel_" + oid;
				break;
				
			case "buffer":
				graphics_layer = GL_buffer_selected_parcels;
				target_div = "r_map_buffer";
				child_div = "selParcelBuffer_" + oid;
				break;

			case "landuse":
				graphics_layer = GL_query_landuse;
				target_div = "r_search_landuse";
				child_div = "selParcelLanduse_" + oid;
				break;

			case "facility":
				graphics_layer = GL_query_facility;
				target_div = "r_search_facility";
				child_div = "selParcelFacility_" +oid;
				object_attr = "BID";
				break;
				
			case "parcel_owners":
				graphics_layer = GL_parcel_owners;
				target_div = "r_search_owners";
				child_div = "selParcelOwners_" +oid;
				break;
				
			case "owners":
				graphics_layer = GL_parcel_owners;
				target_div = "r_search_owners";
				child_div = "selParcelOwners_" +oid;
				break;


		}
		
		console.log("Output Div: " + target_div + "\nChild Div: "+ child_div + "\n");
		
		switch( funct ){
		
			case "zoomTo":
		
				for( var x=0; x <graphics_layer.graphics.length; x++){
					if( graphics_layer.graphics[x].attributes[object_attr] == oid ){
						M_meri.setExtent( graphics_layer.graphics[x].geometry.getExtent().expand(1.3),true );
						break;
					}
				}
				break;
				
			case "panTo":
				for(var x=0; x< graphics_layer.graphics.length;x++){
					if( graphics_layer.graphics[x].attributes[object_attr] == oid ){
						M_meri.centerAt(graphics_layer.graphics[x].geometry.getExtent().getCenter());
						break;
					}
				}
				break;
			
			case "flash":
				for( var x=0; x < graphics_layer.graphics.length; x++){
					if( graphics_layer.graphics[ x ].attributes[ object_attr ] == oid ){
						
						var divParcel = dojo.byId( child_div );
						divParcel.scrollIntoView();
						
						var divFlashColor = new dojo.Color( [ 98, 194, 204] )
						
						// get current symbol so we can put it back correctly
						var curSymbol = graphics_layer.graphics[x].symbol;
						
						var flashSymbol = new esri.symbol.SimpleFillSymbol( 
								esri.symbol.SimpleFillSymbol.STYLE_SOLID,
								new esri.symbol.SimpleLineSymbol( esri.symbol.SimpleLineSymbol.STYLE_SOLID, divFlashColor, 2),
								new dojo.Color( [ 98, 194, 204, 0.5 ] )
							);
						
						graphics_layer.graphics[x].setSymbol( flashSymbol );
						divParcel.style.backgroundColor = divFlashColor;
						
						setTimeout( 
							function( ){ 
								graphics_layer.graphics[ x ].setSymbol( curSymbol );
								divParcel.style.backgroundColor = "";
							
								setTimeout( 
									function( ){ 
										graphics_layer.graphics[ x ].setSymbol( flashSymbol );
										divParcel.style.backgroundColor = divFlashColor;
										
										setTimeout( 
											function( ){ 
												graphics_layer.graphics[ x ].setSymbol( curSymbol ); 
												divParcel.style.backgroundColor = "";
												
											}, 750 )
									}, 750 )
							}, 750 )
						break;
					}
				}
				break;
				
			case "remove":
				for( var x = 0; x < graphics_layer.graphics.length; x++){

					if( graphics_layer.graphics[ x ].attributes[ object_attr ] == oid ){

						// remove layer from map
						graphics_layer.remove( graphics_layer.graphics[ x ] );

						// remove layer from toc
						dojo.byId( target_div ).removeChild( dojo.byId( child_div ) );
						break;
					}
				}
				break;
		}
		
		f_summarize_totals( graphics_layer.graphics, type );
		
	}

	function f_process_results_parcel( type, results ){

		console.log("|| f_process_results_parcel ||\n Type: " + type + "\n");

		var target_div, feature_div, GL_container, GL_count, IW_template, G_symbol, object_attr;
		console.log(" Target: || " + target_div + "\n");
		
		// set field as PID, only changes are Facility and owner
		object_attr = "PID";
		
		// set appropriate graphics title, graphics layer, info window template, graphic symbol, and GL count
		switch(type){

			case "parcel":
				GL_container = GL_query_parcel;
				IW_template = F_IW_templates.parcel;
				G_symbol = S_feature_selection;
				target_div = "dSearchResults";
				feature_div = "r_parcel_";
				break;
			
			case "landuse":
				GL_container = GL_query_landuse;
				IW_template = F_IW_templates.parcel;
				target_div = "r_facility";
				feature_div = "r_facility_";
				break;
			
			case "facility":
				GL_container = GL_query_facility;
				IW_template = F_IW_templates.parcel;
				G_symbol = S_feature_selection;
				target_div = "r_search_facility";
				feature_div = "selParcelFacility_";
				object_attr = "BID"
				break;
				
			case "parcel_owners":
				target_div = "r_owner";
				feature_div = "selParcelOwner";
			
				GL_container = GL_parcel_owners;
				IW_template = F_IW_templates.parcel;
				G_symbol = S_feature_selection;
				break;				

			case "selection":
				target_div = "r_map_selection";
				feature_div = "selParcel_";
				
				GL_container = GL_parcel_selection;
				IW_template = F_IW_templates.parcel;
				G_symbol = S_feature_selection;
				break;
				
			case "buffer":
				target_div = "r_map_buffer";
				feature_div = "selParcelBuffer_";

				GL_container = GL_buffer_selected_parcels;
				IW_template = F_IW_templates.parcel;
				G_symbol = S_feature_selection;
				break;
		}
		
		// set graphics count so we have position to the array element
		GL_count = GL_container.graphics.length;
				
		console.log("-- Type: " + type + "\nTarget: " + target_div + "\n Feature Count: "+ GL_count);
		
		//var str_pid_list = "";
				
		for ( var i=0, il = results.features.length; i < il; i++) {
			
			var featureAttributes = results.features[ i ].attributes;
			var graphic = results.features[ i ];
			
			//if the layer type is buffer, append the PID list for the export link
			//if( type=="buffer" ){
			//	str_pid_list += featureAttributes[ "PID" ] + ",";
			//}

			graphic.setSymbol( G_symbol );
			graphic.infoTemplate = IW_template;

			GL_container.add( graphic );

			var GL_count = GL_container.graphics.length;

			// show all Parcel Attributes.. // show link to parcel layer // set header of template // set content of template

			// create container element
			var el_parcel = dojo.doc.createElement("div");
			el_parcel.id = feature_div + featureAttributes[object_attr];
			el_parcel.setAttribute("class","dParcelItem");

			// prepend content with a horizontal rule
			el_parcel.appendChild( dojo.doc.createElement("hr") );
			
			var el_featureToolRemove = dojo.doc.createElement("a");
			el_featureToolRemove.setAttribute("onclick", "f_feature_action(\"remove\",\"" + type + "\",\"" + object_attr + "\",\"" + featureAttributes[ object_attr ] +"\")");
			el_featureToolRemove.setAttribute("href","#");
			el_featureToolRemove.innerHTML = "Remove";

			// create dom a element - tool to zoom to parcel
			var el_featureToolZoomTo = dojo.doc.createElement("a");
			el_featureToolZoomTo.setAttribute( "onclick", "f_feature_action(\"zoomTo\",\"" + type + "\",\"" + object_attr + "\",\"" + featureAttributes[ object_attr ] + "\")");
			el_featureToolZoomTo.setAttribute( "href", "#");
			el_featureToolZoomTo.innerHTML = "Zoom To";

			// create dom a element - tool to pan to parcel
			var el_featureToolPanTo = dojo.doc.createElement("a");
			el_featureToolPanTo.setAttribute( "onclick", "f_feature_action(\"panTo\",\"" + type + "\",\"" + object_attr + "\",\"" + featureAttributes[ object_attr ] + "\")");
			el_featureToolPanTo.setAttribute("href","#");
			el_featureToolPanTo.innerHTML = "Pan To";

			// create dom a element - tool to flash parcel
			var el_featureToolFlash = dojo.doc.createElement("a");
			el_featureToolFlash.setAttribute("onclick","f_feature_action(\"flash\",\"" + type + "\",\"" + object_attr + "\",\""+ featureAttributes[ object_attr ] + "\")");
			el_featureToolFlash.setAttribute("href","#");
			el_featureToolFlash.innerHTML = "Flash";
			
			// create dom a element - tool to link to print map
			var el_featureToolPrint = dojo.doc.createElement("a");
			//el_featureToolFlash.setAttribute("onclick","f_feature_action("print",""+type+"",""+object_attr+"",""+ featureAttributes[object_attr] +"")");
			el_featureToolPrint.setAttribute( "href", printMapLink + featureAttributes[ object_attr ] );
			el_featureToolPrint.setAttribute( "target", "_blank" );
			el_featureToolPrint.innerHTML = "Print";

			// create dom a element - tool to view owners
			//var el_featureToolOwners = dojo.doc.createElement("a");
			//el_featureToolOwners.setAttribute("onclick","f_parcel_selection_owners(""+type+"",""+ featureAttributes["PID"] +"")");
			//el_featureToolOwners.setAttribute("href","#");
			//el_featureToolOwners.innerHTML = "View Owners";

			var el_featureAttribs = dojo.doc.createElement("div");
			el_featureAttribs.setAttribute( "class", "dSelParcelContainer" );
			
			// check if image is there
			//if so, create img
			
			// spit out attributes.  can use a template here eventually.. just bold and show field contents for now
			var output = "<ul class=\"ResultList SelectionResult\">";
			for ( attr in featureAttributes ) {	
				output +=  FormatResult( attr, featureAttributes[ attr ], "selection" );			
			}
			output += "</ul>";
			el_featureAttribs.innerHTML += output;
			
			// create view more details link
			
			var el_viewMoreDiv = dojo.doc.createElement("div");
			el_viewMoreDiv.setAttribute("class","dSummaryViewMore")
			el_viewMoreDiv.id = "detail_"+feature_div +"_"+ featureAttributes[object_attr];
			
			var el_viewMoreToggle = dojo.doc.createElement("div");
			el_viewMoreToggle.setAttribute("class","dSummaryToggle");
			
			var el_viewMoreToggleLink = dojo.doc.createElement("a");
			el_viewMoreToggleLink.id="detail_view_a_"+featureAttributes[object_attr];
			el_viewMoreToggleLink.setAttribute("href","#");
			el_viewMoreToggleLink.innerHTML = "-- View More --";
			el_viewMoreToggleLink.setAttribute("onclick","f_result_detail(\"parcel\",\""+el_viewMoreDiv.id+"\"," + featureAttributes[object_attr] + "," + featureAttributes["oid"] +")");
			
			// add anchor to toggle div
			el_viewMoreToggle.appendChild( el_viewMoreToggleLink );
			
			// add toggle div to View More container
			el_viewMoreDiv.appendChild( el_viewMoreToggle );

			// add all the links to the primary parcel container
			el_parcel.appendChild( el_featureToolRemove );
			el_parcel.appendChild( el_featureToolZoomTo );
			el_parcel.appendChild( el_featureToolPanTo );
			el_parcel.appendChild( el_featureToolFlash );
			el_parcel.appendChild( el_featureToolPrint );
			el_parcel.appendChild( el_featureAttribs );
			el_parcel.appendChild( el_viewMoreDiv );
			
			//el_parcel.appendChild( el_featureToolOwners);
			// no ownID is available, so we"ll need to create an additional owner search using parcel as enterance"
			//<a href="javascript:query_owner_int_exec("+feature.attributes["OWNID"]+")">view owner parcels</a>:<hr />

			//dojo.byId("r_search_" + GV_current_ownerid).appendChild( el_parcel);
			
			// if the type is a buffer, we will add the export to excel link

			dojo.byId( target_div ).appendChild( el_parcel );
		}
		
		f_summarize_totals( GL_container.graphics, type );

	}
	
	function f_getWindowTitle( graphic ){
		var attribs = graphic.attributes;
		return "<div style=\"border-bottom:1px solid #CCC\">" + attribs.PROPERTY_ADDRESS + "</div>" + 
		
			"<div style=\"text-align:center;margin-top:5px\" class=\"dParcelItem\">" +
				"<a onclick=\"f_feature_action('zoomTo', 'selection', 'PID', '" + attribs.PID + 	"')\" href=\"#\">Zoom To</a> " +
				"<a onclick=\"f_feature_action('panTo',  'selection', 'PID', '" + attribs.PID + 	"')\" href=\"#\">Pan To</a> " +
				"<a onclick=\"f_feature_action('flash',  'selection', 'PID', '" + attribs.PID + 	"')\" href=\"#\">Flash</a> " +
				"<a href=\"http://webmaps.njmeadowlands.gov/municipal/print_parcel_info.php?id=" + attribs.PID + "\" target=\"_blank\">Print</a> " +
				"<a  onclick=\"f_feature_action('remove', 'selection', 'PID', '" +  attribs.PID + 	"')\" href=\"#\">Remove</a> " +
			"</div>"
	}
	
	function f_getWindowContent( graphic ){
	
		var attribs = graphic.attributes;
        //make a tab container 
			
		// TAB CONTAINER
        var tc = new dijit.layout.TabContainer({
          style: "width:100%;height:220px;left:0;top:0",
		  region:"top"
        }, dojo.create("div"));
		
        // TAB
        var tab1 = new dijit.layout.ContentPane({
          title: "Selected Parcel",
          content: 
		  "<div >" +
			"<div class=\"IW_att_row\"><span class=\"field field_selection\">Municipality</span>:	<span class=\"value value_selection\"> " + attribs.MUN_CODE			+ "</span></div>" +
			"<div class=\"IW_att_row\"><span class=\"field field_selection\">PAMS Pin</span>:		<span class=\"value value_selection\"> " + attribs.PAMS_PIN			+ "</span></div>" +
			"<div class=\"IW_att_row\"><span class=\"field field_selection\">Block</span>:			<span class=\"value value_selection\"> " + attribs.BLOCK				+ "</span></div>" +
			"<div class=\"IW_att_row\"><span class=\"field field_selection\">Lot</span>:			<span class=\"value value_selection\"> " + attribs.LOT				+ "</span></div>" +
			"<div class=\"IW_att_row\"><span class=\"field field_selection\">Old Block</span>:		<span class=\"value value_selection\"> " + attribs.OLD_BLOCK		 	+ "</span></div>" +
			"<div class=\"IW_att_row\"><span class=\"field field_selection\">Old Lot</span>:		<span class=\"value value_selection\"> " + attribs.OLD_LOT			+ "</span></div>" +
			"<div class=\"IW_att_row\"><span class=\"field field_selection\">Address</span>:		<span class=\"value value_selection\"> " + attribs.PROPERTY_ADDRESS	+ "</span></div>" +
			"<div class=\"IW_att_row\"><span class=\"field field_selection\">Tax Acres</span> :		<span class=\"value value_selection\"> " + attribs.TAX_ACRES	 		+ "</span></div>" +
			"<div class=\"IW_att_row\"><span class=\"field field_selection\">GIS Acres</span> :		<span class=\"value value_selection\"> " + attribs.MAP_ACRES	 		+ "</span></div>" +
			
			"</div>"
        });
		
		 //display a dojo pie chart for the male/female percentage
        var tab2 = new dijit.layout.ContentPane({
          title: "Property Photo",
          content: "<div class=\"IW_map_div\">"+
				
				"<img src=\"http://webmaps.njmeadowlands.gov/municipal/MunicipalPhotos/Photos/"+ attribs.MUN_CODE.substring(1,4) + " " + attribs.BLOCK + " " + attribs.LOT +".jpg\" class=\"property_photo\">"+
		  
			"</div>"
        });

		// ADD TABS TO CONTAINER
        tc.addChild(tab1);
        tc.addChild(tab2);
		
		var bc = new  dijit.layout.BorderContainer({
			//style: "height: 280px; width: 440px;",
			style: "height: 100%; width: 100%;",
			splitter:false
        });
		
 //		var cp1 = new  dijit.layout.ContentPane({
            // region:"top",
			// content: "<div>" +
					// "<a  onclick=\"f_feature_action('remove', 'selection', 'PID', '" +  attribs.PID + 	"')\" href=\"#\">Remove</a> " +
					// "<a onclick=\"f_feature_action('zoomTo', 'selection', 'PID', '" + attribs.PID + 	"')\" href=\"#\">Zoom To</a> " +
					// "<a onclick=\"f_feature_action('panTo',  'selection', 'PID', '" + attribs.PID + 	"')\" href=\"#\">Pan To</a> " +
					// "<a onclick=\"f_feature_action('flash',  'selection', 'PID', '" + attribs.PID + 	"')\" href=\"#\">Flash</a> " +
					// "<a href=\"http://webmaps.njmeadowlands.gov/municipal/print_parcel_info.php?id=" + attribs.PID + "\" target=\"_blank\">Print</a> " +
					// "</div>"
        // });
		
		//bc.addChild(cp1);
		bc.addChild(tc);
	
		return bc.domNode;
				
	}
	
	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	//
	//  B U F F E R   F U N C T I O N S
	//
	//  Functions:
	//
	//  A) Buffer Parcels "parcel_buffer_selection"
	//
	//     1) Select Parcels, return geometries
	//     2) Buffer parcel geometry by user provided distance
	//     3) Intersect Parcel Buffer with Parcels Layer, return featureSet
	//     4) Show results in tab
	//
	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

	function f_parcel_buffer_init( ){

		// 1. initialize query functionality

		Q_parcel_selection_buffer = new esri.tasks.Query();
		QT_parcel_selection_buffer = new esri.tasks.QueryTask( DynamicLayerHost + "/ArcGIS/rest/services/Parcels/NJMC_Parcels_2011/MapServer/0" );
		Q_parcel_selection_buffer.returnGeometry = true;

		Q_parcel_selection_buffer.spatialRelationship = esri.tasks.Query.SPATIAL_REL_INTERSECTS;

		Q_parcel_selection_buffer.outFields = F_outFields.parcel;
		Q_parcel_selection_buffer.outSpatialReference = {"wkid":3424};

	}

	function f_multi_parcel_buffer_exec( ){

		// this function runs the buffer execute function for multiple parcels.. 
		// we will iterate through the selected parcels graphics layer, collecting the geometries.. the geometries will be passed to the parcel buffer Query Paramter geometry

		// hide any info windows
		M_meri.infoWindow.hide();
		
		// collect geometries from parcel selection graphics layer -> GL_parcel_selection

		// this polygon will hold all the individual polygon rings in as a multipart feature
		var multiparcel_geometries = esri.geometry.Polygon(new esri.SpatialReference({"wkid":3424}));
		
		// add individual polygon rings to multipart feature
		for(var m=0; m<GL_parcel_selection.graphics.length; m++){
			multiparcel_geometries.addRing(GL_parcel_selection.graphics[m].geometry.rings[0]);
		}
					
		var bufferDistanceTxt = dojo.byId("bufferToolDistance").value;
		var bufferDistance = 200;

		if( isNaN( bufferDistanceTxt ) || ( bufferDistanceTxt == "" ) ){
			alert("Buffer Tool Error:\n\nYou must enter a numeric distance for the buffer tool.");
		}
		else{
			// set up query and query task on parcels
			var QT_parcel_selection_buffer = new esri.tasks.QueryTask(DynamicLayerHost + "/ArcGIS/rest/services/Parcels/NJMC_Parcels_2011/MapServer/0");
			var Q_parcel_selection_buffer = new esri.tasks.Query();

			bufferDistance = bufferDistanceTxt;

			// set up intersection query. use INTERSECTS spatial relationship
			Q_parcel_selection_buffer.returnGeometry = true;
			Q_parcel_selection_buffer.spatialRelationship = esri.tasks.Query.SPATIAL_REL_INTERSECTS;
			Q_parcel_selection_buffer.outFields = F_outFields.parcel;
			Q_parcel_selection_buffer.outSpatialReference = {"wkid":3424};

			// new geometry service
			var GeomS_parcel_buffer = new esri.tasks.GeometryService(DynamicLayerHost + "/ArcGIS/rest/services/Map_Utility/Geometry/GeometryServer");

			// set selected parcel
			//var G_parcel_selected = GL_parcel_selection.graphics;
			// set symbol and innfo window.. use templates
			//G_parcel_selected.setSymbol(S_buffer_parcel);
			//G_parcel_selected.setInfoTemplate(new esri.InfoTemplate(F_IW_templates.parcel));

			// set the buffer parameters.. default to 200 foot
			var BP_parcel_selection = new esri.tasks.BufferParameters();
			
			BP_parcel_selection.geometries  = [multiparcel_geometries];

			// add selected parcel graphic (clicked on parcel)
			GL_buffer_parcel = GL_parcel_selection;

			BP_parcel_selection.distances = [ bufferDistance ];
			BP_parcel_selection.unit = esri.tasks.GeometryService.UNIT_FOOT;
			BP_parcel_selection.bufferSpatialReference = {"wkid": 3424};
			BP_parcel_selection.outSpatialReference = {"wkid": 3424};

			console.log("ready to run buffer");
			// run the geometry service buffer with buffer parameters, returns geometries o
			GeomS_parcel_buffer.buffer(BP_parcel_selection,function(geometries) {

				// add buffer ring graphic
				
				var graphic = new esri.Graphic(geometries[0],S_buffer_buffer);
				GL_buffer_buffer.add(graphic);

				Q_parcel_selection_buffer.geometry = graphic.geometry;
				Q_parcel_selection_buffer.outSpatialReference = {"wkid":3424};

				// eqecute the buffer query task. pass results to unified results function for processing
				QT_parcel_selection_buffer.execute(Q_parcel_selection_buffer, function (fset){

					f_process_results_parcel("buffer",fset);
					console.log("\nsingle parcel buffer selection complete");
				}
				, showerror);
			  console.log("\nexecuting query with parcel buffer graphic");
			},showerror);

			console.log("\ndo parcel-buffered parcel intersection query..listen for callback");
		}
	}
	
	function f_parcel_buffer_exec( click_evt ){

		// this function runs the buffer execute function.. it is initiated by the map click event handler
		
		// hide any info windows
		M_meri.infoWindow.hide();
		
		//set parcel click event and set buffer geometry to map point. point is used to select the parcel
		EVT_parcel_click = Q_parcel_selection_buffer.geometry = click_evt.mapPoint;

		// execute buffer with query. send results to f_parcel_buffer_results function
		QT_parcel_selection_buffer.execute( Q_parcel_selection_buffer, f_parcel_buffer_results, showerror );
	}

	function f_parcel_buffer_results( graphics ){
		
		var bufferDistanceTxt = dojo.byId("bufferToolDistance").value;
		var bufferDistance = 200;
		
		if( isNaN( bufferDistanceTxt ) || ( bufferDistanceTxt == "" )){
			alert("Buffer Tool Error:\n\nYou must enter a numeric distance for the buffer tool.");
		}
		else{
			// set up query and query task on parcels
			var QT_parcel_selection_buffer = new esri.tasks.QueryTask(DynamicLayerHost + "/ArcGIS/rest/services/Parcels/NJMC_Parcels_2011/MapServer/0");
			var Q_parcel_selection_buffer = new esri.tasks.Query();
			
			bufferDistance = bufferDistanceTxt;
		
			// set up intersection query. use INTERSECTS spatial relationship
			Q_parcel_selection_buffer.returnGeometry = true;
			Q_parcel_selection_buffer.spatialRelationship = esri.tasks.Query.SPATIAL_REL_INTERSECTS;
			Q_parcel_selection_buffer.outFields = F_outFields.parcel;
			Q_parcel_selection_buffer.outSpatialReference = {"wkid":3424};

			// new geometry service
			var GeomS_parcel_buffer = new esri.tasks.GeometryService(DynamicLayerHost + "/ArcGIS/rest/services/Map_Utility/Geometry/GeometryServer");

			// set selected parcel
			var G_parcel_selected = graphics.features[0];

			// set symbol and innfo window.. use templates
			G_parcel_selected.setSymbol(S_buffer_parcel);
			
			
			G_parcel_selected.setInfoTemplate( new esri.InfoTemplate( F_IW_templates.parcel ) );
			
			// set the buffer parameters.. default to 200 foot
			var BP_parcel_selection = new esri.tasks.BufferParameters();
			BP_parcel_selection.geometries  = [G_parcel_selected.geometry];
			
			// add selected parcel graphic (clicked on parcel)
			GL_buffer_parcel.add(G_parcel_selected);

			BP_parcel_selection.distances = [ bufferDistance ];
			BP_parcel_selection.unit = esri.tasks.GeometryService.UNIT_FOOT;
			BP_parcel_selection.bufferSpatialReference = {"wkid": 3424};
			BP_parcel_selection.outSpatialReference = {"wkid": 3424};

			// run the geometry service buffer with buffer parameters, returns geometries o
			GeomS_parcel_buffer.buffer(BP_parcel_selection,function(geometries) {

				// add graphic to the map
				var graphic = new esri.Graphic(geometries[0],S_buffer_selected_parcels);
				
				// add buffer ring graphic
				GL_buffer_buffer.add(graphic)

				// set selected parcel geometry as the geometry for secondary query
				Q_parcel_selection_buffer.geometry = graphic.geometry;
				Q_parcel_selection_buffer.outSpatialReference = {"wkid":3424};

				// eqecute the buffer query task. pass results to unified results function for processing
				QT_parcel_selection_buffer.execute(Q_parcel_selection_buffer, function (fset){

					f_process_results_parcel("buffer",fset);
					console.log("\nsingle parcel buffer selection complete");
				}
				, showerror);
			  console.log("\nexecuting query with parcel buffer graphic");
			},showerror);

			console.log("\ndo parcel-buffered parcel intersection query..listen for callback");
		}
	}

	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	//
	//  O W N E R   L O O K U P
	//
	//  Step 1: Search "NAME" field in Owners table.
	//
	//  This set of functions query_owners_* will query the "CAD_OWNERS" table
	//  and return a featureSet (no geometries since its a table)
	//
	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

	function f_query_owners_init(){

		// Owners table currently has an ID of 5
		QT_owners = new esri.tasks.QueryTask(DynamicLayerHost + "/ArcGIS/rest/services/Parcels/NJMC_Parcels_2011/MapServer/5");
		Q_owners = new esri.tasks.Query();
		Q_owners.returnGeometry = false;
		Q_owners.outFields = F_outFields.owner;
	}

	function f_query_owners_exec(){

		Q_owners.where = "([NAME] LIKE \"%\""+ dojo.byId("txtQueryOwner").value + "\"%\")";

		QT_owners.execute(Q_owners,f_query_owners_results);
	}

	function f_query_owners_results( results ){

		for (var i=0, il=results.features.length; i<il; i++) {

			var featureAttributes = results.features[i].attributes;
			var e_div_owner = dojo.doc.createElement("div");
			e_div_owner.id = "r_owner_"+featureAttributes["OWNID"];

			for (att in featureAttributes) {
				var e_div_owner_attrib = dojo.doc.createElement("div");
				e_div_owner_attrib.innerHTML += "<b>" + fieldAlias(att, "owner") + ":</b>  " + featureAttributes[att] + "<br />";
				e_div_owner.appendChild( e_div_owner_attrib);
			}

			var e_div_owner_tools = dojo.doc.createElement("div");
			e_div_owner_tools.innerHTML = "<a href=\"#\" onclick=\"f_query_owner_int_exec("+featureAttributes["OWNID"]+")\">Find Owner Parcels</a>";
			e_div_owner_tools.appendChild( dojo.doc.createElement("hr"));
			e_div_owner.appendChild( e_div_owner_tools);
			dojo.byId("dSearchResults").appendChild( e_div_owner);
			
		}
		tabs_toggle("ResultsPane");
	}

	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	//
	//  O W N E R    R E L A T E D   L O O K U P  ( O W N E R   P A R C E L S )
	//
	//  Step 2: "Query Related Records" from intermediate table
	//          with all occurences of "OID" from Step 1.
	//
	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

	function f_query_owner_int_init(){

		// query on the Intermediate Table - layer 8
		QT_owner_int = new esri.tasks.QueryTask( DynamicLayerHost + "/ArcGIS/rest/services/Parcels/NJMC_Parcels_2011/MapServer/8" );

		Q_owner_int = new esri.tasks.Query();
		Q_owner_int.returnGeometry = false;
	}

	function f_query_owner_parcels_init(){

		// query on the Intermediate using Oids - layer 1
		QT_owner_parcels = new esri.tasks.QueryTask(DynamicLayerHost + "/ArcGIS/rest/services/Parcels/NJMC_Parcels_2011/MapServer/8");

		Q_owner_parcels = new esri.tasks.RelationshipQuery();
		Q_owner_parcels.returnGeometry = true;
		Q_owner_parcels.relationshipId = 11;
		Q_owner_parcels.outFields = F_outFields.parcel;//["PID","PAMS_PIN"]
	}

	function f_query_owner_int_exec(ownerid){

		// Perform relationship query on Owner table to get Parcel IDs from Intermediate Table

		GV_current_ownerid = ownerid;
		Q_owner_int.where = "[OWNERID] = "+ ownerid;
		QT_owner_int.executeForIds(Q_owner_int,f_query_owner_int_results,showerror);
	}

	function f_query_owner_int_results(results){

		// this holds all the parcel intermediate RecordIds.. this is used in a RelationshipQuery on intermediate to parcel
		if(results){
			Q_owner_parcels.objectIds = [results];
			//QT_owner_parcels.executeRelationshipQuery(Q_owner_parcels,f_query_owner_parcels_results,showerror);
			QT_owner_parcels.executeRelationshipQuery(Q_owner_parcels,f_query_owner_parcels_results,showerror);
		}
		else{
			alert("No owner records were found.");
		}
	}

	// following will be combined with unified parcel results function
	function f_query_owner_parcels_results(featureSets){

		// set global so we can select a parcel graphic to show it on the map
		//featureSet_ownerParcels = featureSets;

		// RelationshipQuery can return multiple featureSets.. use object iteration
		var type = "parcel_owners";
		
		var object_attr="PID";
		var s = "";

		for(featureSet in featureSets){

			// write attributes
			
			var graphic;
			var featureAttributes;

			for (var i=0, il=featureSets[featureSet].features.length; i<il; i++) {

				featureSet_ownerParcels = featureSets[featureSet];
				
				featureAttributes = featureSets[featureSet].features[i].attributes;
				graphic = featureSets[featureSet].features[i];

				graphic.setSymbol( S_feature_selection );
				graphic.infoTemplate = F_IW_templates.parcel;

				GL_parcel_owners.add(graphic);
				var GL_parcel_owner_count = GL_parcel_owners.graphics.length;

				// set header of template
				// set content of template

				var el_parcel = dojo.doc.createElement("div");
				el_parcel.id = "selOwnerParcel_"+ featureAttributes["PID"];
				el_parcel.setAttribute("class","dParcelItem");
				el_parcel.appendChild( dojo.doc.createElement("hr"));

				// create dom a element - tool to zoom to parcel
				var el_parcelToolZoomTo = dojo.doc.createElement("a");
				el_parcelToolZoomTo.setAttribute("onclick","f_feature_action(\"zoomTo\",\""+type+"\",\""+object_attr+"\",\""+ featureAttributes[object_attr] +"\")");
				el_parcelToolZoomTo.setAttribute("href","#");
				el_parcelToolZoomTo.innerHTML = "Zoom To";

				// create dom a element - tool to pan to parcel
				var el_parcelToolPanTo = dojo.doc.createElement("a");
				el_parcelToolPanTo.setAttribute("onclick","f_feature_action(\"panTo\",\""+type+"\",\""+object_attr+"\",\""+ featureAttributes[object_attr] +"\")");
				el_parcelToolPanTo.setAttribute("href","#");
				el_parcelToolPanTo.innerHTML = "Pan To";

				// create dom a element - tool to flash parcel
				var el_parcelToolFlash = dojo.doc.createElement("a");
				el_parcelToolFlash.setAttribute("onclick","f_feature_action(\"flash\",\""+type+"\",\""+object_attr+"\",\""+ featureAttributes[object_attr] +"\")");
				el_parcelToolFlash.setAttribute("href","#");
				el_parcelToolFlash.innerHTML = "Flash";

				var el_parcelAttribs = dojo.doc.createElement("div");
				el_parcelAttribs.setAttribute("class","dSelParcelContainer");

				for (att in featureAttributes) {
					el_parcelAttribs.innerHTML += "<b>" + fieldAlias(att, "owner") + ":</b>  " + featureAttributes[att] + "<br />";
				}

				// add all the links to the parcel container
				el_parcel.appendChild( el_parcelToolZoomTo);
				el_parcel.appendChild( el_parcelToolPanTo);
				el_parcel.appendChild( el_parcelToolFlash);
				el_parcel.appendChild( el_parcelAttribs);

				// append all the parcel tools and attributes to the specific parcel div
				dojo.byId("r_owner_" + GV_current_ownerid).appendChild( el_parcel);
			}
		}
	}

	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	//
	//  P R O P E R T Y    L O O K U P
	//
	//  New query to replace individual Address, Facility, and Block/Lot Queries
	//
	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

	function f_query_parcel_init(){

		// query on the Parcel Feature Class - layer id 0
		QT_parcel = new esri.tasks.QueryTask( DynamicLayerHost + "/ArcGIS/rest/services/Parcels/NJMC_Parcels_2011/MapServer/0" );
		Q_parcel = new esri.tasks.Query();
		Q_parcel.returnGeometry = true;

		Q_parcel.outFields = F_outFields.parcel;
	}

	function f_query_parcel_exec(){

		// generate where clause from all input boxes
		// first function creates where clause for searchable fields, second is from checkboxes
		
		// check if this is a landuse search
		if( dojo.byId("rdo_landuse_searchSelect").checked )
		{
			// this is a landuse search
			var chk_landuses = dojo.query(".s_landuse_chk_item"),
				//landuse_count = 0,
				landuse_search = "LANDUSE_CODE  IN ("; 
			
			dojo.forEach( chk_landuses, function( landuse ){
				if ( landuse.checked ) {
					//landuse_count++;
					landuse_search += "'" + landuse.id.replace("chk_landuse_","") + "',";
				}
			});
			
			landuse_search = landuse_search.substring(0,landuse_search.length-1) + ")";
						
			landuse_search += f_query_search_extent();
			
			//now run landuse query.. set callback to use f_search
			//alert(landuse_search);
			
			console.log("LandUse Query: " + landuse_search);
			
			Q_landuse.where = landuse_search;

			search_LandUseIDs = [];

			QT_landuse.execute(Q_landuse, function(results){

				// get PIDs
				// now query parcels w/ PIDs.. instead of relationshipquery using landuse OIDs
				for (var i=0, il=results.features.length; i<il; i++) {
					search_LandUseIDs.push(results.features[i].attributes["PID"]);
				}

				f_search("PID IN (" + commaListFromArray( search_LandUseIDs ) + ")");
				
			});
		}
		else{
		
			f_search("");
		}
		
	}
	
	function f_search(whereClause){
	
		var strListPIDs ="";
		
		if(whereClause.length > 0){
			strListPIDs = whereClause + " AND ";
		}
		
		strWhereParcel = f_where_parcel();
		strWhereExtent = f_query_search_extent();
		
		// need to update to check if strWhere starts with AND.. means that there was no f_where_parcel;
		if(strWhereParcel.length > 0){
		
			var strWhere = strListPIDs + strWhereParcel + strWhereExtent;
			
			console.log("Query: " + strWhere + "\n\n");
			Q_parcel.where = strWhere;
			QT_parcel.execute(Q_parcel,function(results){
				f_process_results_parcel( "parcel", results);
			},showerror);
			
			tabs_toggle("ResultsPane","Search Results");
		}
		else{
			alert("You must supply search critera for this operation.\n\nPlease include any of the following:\n\n    1. Address  \n\n    2. Block\n\n    3. Lot\n\n    4. Acreage (Min and Max in search options)");
		}
	
	}

	function f_where_parcel(){

	// now check for values in search fields. include them in WHERE clause if necessary;

		/////////////////////////
		//
		// B L O C K  /  L O T
		//
		/////////////////////////

		var strWhereBlock = "",strWhereLot = "",strWhereOldBlock = "", strWhereOldLot = "", strWhereAddress = "", strWhereAcres = "";

		// grab all input values
		var qBlock = dojo.byId("txtQueryBlock"),
			qLot = dojo.byId("txtQueryLot"),
			qAddress = dojo.byId("txtQueryAddress"),
			qAcresMin = dojo.byId("txtAcreageMin"),
			qAcresMax = dojo.byId("txtAcreageMax");

		// grab search option checkbox values
		var b_BlockLotOld = dojo.byId("b_searchOldBlockLot"),
			b_BlockLotExact = dojo.byId("b_searchBlockLotExact");

		// see if either block or lot is set. if so, set block and/or lot filters
		if (qBlock.value.length > 0 || qLot.value.length > 0) {

			// check if old block lot search is enabled: if so, create additonal filter

			// check to see if block has value set.. if so, create appropriate filter..
			if (qBlock.value.length > 0) {

				// check old block
				if(b_BlockLotOld.checked){
					strWhereOldBlock = (b_BlockLotExact.checked) ? "OR [OLD_BLOCK] = \"" + qBlock.value + "\" " : "OR [OLD_BLOCK] LIKE \"%\" + qBlock.value + \"%\" ";
				}

				// check if exact match is required. if so use =, if not use LIKE
				if(b_BlockLotExact.checked){
					strWhereBlock = "( [BLOCK] = \"" + qBlock.value + "\" " + strWhereOldBlock + ") ";
				}
				else{
					strWhereBlock = "( [BLOCK] LIKE \"%" + qBlock.value + "%\" " + strWhereOldBlock + ") ";
				}
			}
			else{
				strWhereBlock = "";
			}

			if (qLot.value.length > 0) {

				// check old lot
				if(b_BlockLotOld.checked){
					strWhereOldLot = (b_BlockLotExact.checked) ? "OR [OLD_LOT] = \"" + qLot.value + "\" " : "OR [OLD_LOT] LIKE \"%" + qLot.value + "%\" ";
				}

				strWhereLot = (qBlock.value) ? " AND " : "";

				// check if exact match is required. if so use =, if not use LIKE
				if(b_BlockLotExact.checked){
					strWhereLot += "( [LOT] = \"" + qLot.value + "\" " + strWhereOldLot + ") ";
				}
				else{
					strWhereLot += "( [LOT] LIKE \"%" + qLot.value + "%\" " + strWhereOldLot + ") ";
				}
			}
			else{
				strWhereLot = "";
			}

		}

		/////////////////////
		//
		// A D D R E S S
		//
		/////////////////////

		if( qAddress.value ){

			strWhereAddress = (strWhereBlock.length > 0 || strWhereLot.length > 0) ? " AND " : "";

			strWhereAddress += "( [PROPERTY_ADDRESS] LIKE "%" + qAddress.value + "%" ) ";
		}

		/////////////////////
		//
		//  A C R E A G E
		//
		/////////////////////

		// check if we need to inclue the Acreage filter

		if(qAcresMin.value && qAcresMin != 0){

			strWhereAcres = ( strWhereBlock.length > 0 || strWhereLot.length > 0 || strWhereAddress.length > 0 ) ? " AND " : "";

			strWhereAcres += " ( [MAP_ACRES] >= " + qAcresMin.value + " ) ";
		}

		if(qAcresMax.value && qAcresMin != 0){

			strWhereAcres += ( strWhereBlock.length > 0 || strWhereLot.length > 0 || strWhereAddress.length > 0 || strWhereAcres.length > 0) ? " AND " : "";

			strWhereAcres += " ( [MAP_ACRES] <= " + qAcresMax.value + " ) ";
		}

		// concat all where filters into
		return strWhereBlock + strWhereLot + strWhereAddress + strWhereAcres;
	}

	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	//
	//  L A N D U S E   L O O K U P
	//
	//  Step 1: Search "LANDUSE_CODE" field in CAD_LANDUSE table and [MAP_ACRES] field
	//
	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

	function f_query_landuse_init(){

		// query on the Landuse Table - layer id 9
		QT_landuse = new esri.tasks.QueryTask(DynamicLayerHost + "/ArcGIS/rest/services/Parcels/NJMC_Parcels_2011/MapServer/9");
		Q_landuse = new esri.tasks.Query();
		Q_landuse.returnGeometry = false;
		Q_landuse.outFields = ["PID"];

		QT_landuse_parcel = new esri.tasks.QueryTask(DynamicLayerHost + "/ArcGIS/rest/services/Parcels/NJMC_Parcels_2011/MapServer/0");
		Q_landuse_parcel = new esri.tasks.Query();
		Q_landuse_parcel.returnGeometry = true;
		Q_landuse_parcel.outFields = F_outFields.parcel;

		// enter additional fields in following array to include them in the results set
		// check rest url for available fields --> http://webmaps/ArcGIS/rest/services/Parcels/NJMC_Parcels_2011/MapServer/0
	}

	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	//
	//  F A C I L I T Y  ( B U I L D I N G )   L O O K U P
	//
	//  Step 1: Search "FACILITY_NAME" field in Building feature class
	//
	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

	function f_query_facility_init(){

		// query on the Building Feature Class - layer id 1
		QT_facility = new esri.tasks.QueryTask(DynamicLayerHost + "/ArcGIS/rest/services/Parcels/NJMC_Parcels_2011/MapServer/1");
		Q_facility = new esri.tasks.Query();
		Q_facility.returnGeometry = true;

		// enter additional fields in following array to include them in the results set
		// check rest url for available fields --> http://webmaps/ArcGIS/rest/services/Parcels/NJMC_Parcels_2011/MapServer/1
		//["PID","BID","MUNICIPALITY","BUILDING_LOCATION","FACILITY_NAME"];

		Q_facility.outFields = F_outFields.building;
	}

	function f_query_facility_exec(){

		var strSearchExtent = f_query_search_extent();
		// build query with facility name

		Q_facility.where = " ([FACILITY_NAME] LIKE \"%"+ dojo.byId("txtQueryFacility").value  + "%\")"+ strSearchExtent;

		QT_facility.execute(Q_facility,function(results){
			f_process_results_parcel("facility",results);
		},showerror);
	}

///////////////////////////////////////////////////

	// add Municipality and Parcel Criteria to search
	// applies to all search

	function f_query_search_extent(){

		/////////////////////
		// SET MUNI Extent
		/////////////////////
		var str_where = "";

		var chk_munis = dojo.query(".s_muni_chk_item");

		if(chk_munis.length > 0){

			var str_munis = " AND ( [MUN_CODE] IN (";

			// loop through all checkboxes; if checked, append to the muni portion of the where clause;
			var count = 0;

			dojo.forEach(chk_munis,function(muni){
				if (muni.checked) {
					count++;
					str_munis += "'" + muni.id.replace( "chk_muni_", "" ) + "',";
				}
			});

			str_munis += ", ) ) ";
			str_munis = str_munis.replace( ",," , "");

			if( count > 0 ){ str_where = str_munis; }
		}

		////////////////////////
		// SET QUALIFIER Extent
		////////////////////////

		var chk_quals = dojo.query( ".s_qual_chk_item" );

		if(chk_quals.length > 0){

			var str_quals = " AND ( [QUALIFIER] IN (";

			// loop through all checkboxes; if checked, append to the muni portion of the where clause;

			var count=0;

			dojo.forEach( chk_quals, function( qual ){

				if ( qual.checked ) {
					count++;
					str_quals += "\"" + qual.id.replace("chk_qual_","") + "\",";
				}
			});

			str_quals += ", ) ) ";
			str_quals = str_quals.replace( ",," ,"" );

			if( count > 0 ) str_where += str_quals; 
		}
		return str_where;
	}

/////////////////

	function zoomToCustomFullExtent()	{
		//var CustomFullExtent = new esri.geometry.Extent( 582057.758333342, 659902.81542969, 636285.741666661, 747578.709309896, new esri.SpatialReference( { "wkid":3424 } ));
		M_meri.setExtent(njmcExtent);
	}

	function commaListFromArray(ary){
		var str = "";
		dojo.forEach( ary, function( el ){ str += "'" + el + "',"; });
		return str.substring( 0, str.length-1 );
	}

	function f_search_handler( id ){

		// set global search tool var.
		GV_searchtool_current = id;

		search_field_display( id );

		/* other options are not currently operational.. commenting block for time being
		// we can do other stuff here, depending which search tool is set

		switch (id){

			case "search_BL": console.log("search tool block-lot activated");
				break;
			case "search_ADDR":console.log("search tool address activated");
				break;
			case "search_OWNR":console.log("search tool owner activated");
				break;
			case "search_LND":console.log("search tool landuse activated");
				break;
			case "search_FAC":console.log("search tool facility activated");
				break;
		}
		*/
		
	}

	// Build Municipality Checkbox Menu
	function f_search_munis_build( ){

		var e_div_checkboxs = dojo.doc.createElement("div");
		e_div_checkboxs.id = "selSearchMuni";

		// set the class
		e_div_checkboxs.setAttribute("class","search_item");

		dojo.forEach( munis_json, function( muni, index){

			var e_div_container = dojo.doc.createElement("div");
			e_div_container.setAttribute("class","muniCheckRow");
			//e_div_container.id = "s_muni_"+muni.muncode;

			var e_chk = dojo.doc.createElement("input");
			e_chk.type = "checkbox";
			e_chk.id = "chk_muni_"+muni.muncode;
			e_chk.setAttribute("class","s_muni_chk_item");

			var e_lbl = dojo.doc.createElement("label");
			e_lbl.setAttribute("for", "chk_muni_"+muni.muncode);
			e_lbl.setAttribute("class", "search_muni_label");

			e_lbl.innerHTML = muni.mun;

			// add the div and the label to the container
			e_div_container.appendChild( e_chk);
			e_div_container.appendChild( e_lbl);

			e_div_container.setAttribute("title",muni.mun);

			//add the container to the main muni search container
			e_div_checkboxs.appendChild( e_div_container);

		});

		dojo.byId("search_munis").appendChild( e_div_checkboxs);
	}

	// Build Qualifier Checkbox Menu
	function f_search_qual_build( ){

		var e_div_checkboxs = dojo.doc.createElement("div");
		e_div_checkboxs.id = "selSearchQual";

		// set the class
		e_div_checkboxs.setAttribute("class","search_item");

		dojo.forEach( quals_json, function(qual,index){

			var e_div_container = dojo.doc.createElement("div");
			e_div_container.setAttribute("class","qualCheckRow");

			var e_chk = dojo.doc.createElement("input");
			e_chk.type = "checkbox";
			e_chk.id = "chk_qual_"+qual.id;
			e_chk.setAttribute("class","s_qual_chk_item");

			var e_lbl = dojo.doc.createElement("label");
			e_lbl.setAttribute("for", "chk_qual_"+qual.id);
			e_lbl.setAttribute("class", "search_qual_label");

			e_lbl.innerHTML = qual.name;

			// add the div and the label to the container
			e_div_container.appendChild( e_chk);
			e_div_container.appendChild( e_lbl);

			e_div_container.setAttribute("title",qual.desc);

			//add the container to the main muni search container
			e_div_checkboxs.appendChild( e_div_container);

		});

		dojo.byId("search_qual").appendChild( e_div_checkboxs);
	}

	function f_search_landuse_build( ){

		if( typeof( landuse_json.length ) == "undefined" ){
			// console.log.. 
			return;
		}
		
		var e_div_checkboxs = dojo.doc.createElement("div");
		e_div_checkboxs.id = "selSearchLanduse";

		// set the class
		e_div_checkboxs.setAttribute("class","search_item");

		dojo.forEach( landuse_json, function( landuse, index ){

			var e_div_container = dojo.doc.createElement("div");
			e_div_container.setAttribute("class","landuseCheckRow");

			var e_chk = dojo.doc.createElement("input");
			e_chk.type = "checkbox";
			e_chk.id = "chk_landuse_"+landuse.code;
			e_chk.setAttribute("class", "s_landuse_chk_item");

			var e_lbl = dojo.doc.createElement("label");
			e_lbl.setAttribute("for", "chk_landuse_" + landuse.code );
			e_lbl.setAttribute("class", "search_landuse_label");

			e_lbl.innerHTML = landuse.name;

			// add the div and the label to the container
			e_div_container.appendChild( e_chk);
			e_div_container.appendChild( e_lbl);

			e_div_container.setAttribute("title",landuse.name);

			//add the container to the main muni search container
			e_div_checkboxs.appendChild( e_div_container);

		});

		dojo.byId("search_landuse").appendChild( e_div_checkboxs );
	}

	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	//
	//  C S S  /  L A Y O U T   J A V A S C R I P T
	//
	// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	
	function toggle_visibility( id ) {

		var el = dojo.byId( id );

		if( el.style.display == "block") el.style.display = "none";
		else el.style.display = "block";
	}

	function hide_visibility( id ){ dojo.style( id, "display", "none"); }

	function show_visibility( id ){ dojo.style( id, "display", "block"); }
	
	function tabs_toggle(id){
	
		var panes = ["MapLayers", "SearchPane", "ResultsPane", "HelpPane"],
			tabs = ["LayersToggle", "SearchTab", "ResultsTab", "HelpTab"],
			selectedTab;
		
		dojo.forEach( panes, function( pane ){ hide_visibility( pane ); });
		
		show_visibility(id);

		// shade active tab
		dojo.forEach( tabs, function( tab ){
			 dojo.byId(tab).style.backgroundColor = "#FFFFFF";
			 dojo.byId(tab).style.fontWeight = "normal";
			 dojo.byId(tab).style.paddingBottom = "0";
		});
		
		switch (id){
			case "MapLayers":
				selectedTab = "LayersToggle";
				break;
			case "SearchPane":
				selectedTab = "SearchTab";
				break;
			case "ResultsPane":
				selectedTab = "ResultsTab";
				break;
			case "HelpPane":
				selectedTab = "HelpTab";
				break;
		}
			
		dojo.byId(selectedTab).style.backgroundColor = "#F0F0F0";
		dojo.byId(selectedTab).style.fontWeight = "bold";
		dojo.byId(selectedTab).style.paddingBottom = "1px";
	
	}
	
	///////////////////////////////////
	//
	// WINDOW ADJUSTMENTS
	//bk
	//////////////////////////////////
	function resize_content_pane() {
		
		//get window height
		var theHeight = dojo.window.getBox().h;
		var DivHeight = theHeight - 145;	
		
		var tabs = ["MapLayers", "SearchPane", "ResultsPane", "HelpPane"];
		
		dojo.forEach( tabs, function( tab ){
			console.log("tab",tab);
			dojo.style( tab , "height", DivHeight + "px");
		});
		
	}
	
	function hide_search_boxes(){

		// set all search boxes display to none -hide it
		dojo.forEach(SearchDivs,function(searchDiv){
			dojo.style(searchDiv,"display","none");
		});
	}

	function search_field_display( id ){

		//hide search boxes
		dojo.forEach(SearchDivs,function(searchDiv){
			dojo.style(searchDiv,"display","none");
		});

		//show selected search
		dojo.style(id,"display","block");
	}

	// BK MENU Stuff 
	function coll_mnu(){
		hide_visibility("framecontent");

		// set map style left 20px
		dojo.style( dojo.byId("map"), "left", "20px" );

		show_visibility("expand");

		// resize and reposition map
		M_meri.resize();
		M_meri.reposition();
	}

	// BK MENU Stuff 
	function expnd_mnu(){
	
		show_visibility( "framecontent" );

		dojo.style(dojo.byId("map"),"left", "320px");

		hide_visibility( "expand" );

		// resize and reposition map
		M_meri.resize();
		M_meri.reposition();
	}

	function showerror( error ){ 
		console.log("ERROR", error, error.toString() );
	}
	
	
	// PARCEL SELECTION RESULTS
	function f_result_detail( type, target_el, pid, oid ){
	
		// type = parcel
		// el = detail_selParcel_41553
		
		//dojo.byId(target_el).appendChild( );
		
		// get image
		// get zoning
		// get owners
		
		// query on the Landuse Table - layer id 9
		var QT_det_landuse = new esri.tasks.QueryTask(DynamicLayerHost + "/ArcGIS/rest/services/Parcels/NJMC_Parcels_2011/MapServer/9");
		var Q_det_landuse = new esri.tasks.Query();
		Q_det_landuse.returnGeometry = false;
		Q_det_landuse.outFields = ["LANDUSE_CODE","MAP_ACRES"];
		Q_det_landuse.where = "PID = " + pid;

		var QT_det_zoning = new esri.tasks.QueryTask(DynamicLayerHost + "/ArcGIS/rest/services/Parcels/NJMC_Parcels_2011/MapServer/7");
		var Q_det_zoning = new esri.tasks.Query();
		Q_det_zoning.returnGeometry = false;
		Q_det_zoning.outFields = ["ZONE_CODE","MAP_ACRES"];
		Q_det_zoning.where = "PID = " + pid;
		
		var QT_det_owners_int = new esri.tasks.QueryTask(DynamicLayerHost + "/ArcGIS/rest/services/Parcels/NJMC_Parcels_2011/MapServer/8");
		var Q_det_owners_int = new esri.tasks.Query();
		Q_det_owners_int.returnGeometry = false;	
		Q_det_owners_int.where = "PID = " + pid;
		
		var QT_det_owners = new esri.tasks.QueryTask(DynamicLayerHost + "/ArcGIS/rest/services/Parcels/NJMC_Parcels_2011/MapServer/8");
		var Q_det_owners = new esri.tasks.RelationshipQuery();
		Q_det_owners.relationshipId = 10;
		Q_det_owners.returnGeometry = false;
		Q_det_owners.outFields = ["NAME","ADDRESS","CITY_STATE","ZIPCODE"];	
		
		dojo.style( dojo.byId("detail_view_a_"+pid), "display", "none");

		//view more LANDUSE
		QT_det_landuse.execute(Q_det_landuse, function(results){
		
			var el_layer = dojo.doc.createElement("div");
			//el_layer.id = "identLayer_" + identifyResult.layerName;
			el_layer.setAttribute("class","details");
		
			for (var i=0, il=results.features.length; i<il; i++) {
			
				var featureAttributes = results.features[i].attributes;
				var output = "<ul class=\"ResultList SelectionResult\">";
				
				for (attr in featureAttributes) {
									
					output += FormatResult(attr, results.features[i].attributes[attr], "selection selection_more");
				
				}
				output += "</ul>";
				el_layer.innerHTML += output;	
				dojo.byId(target_el).appendChild( el_layer);
			}
			
			// loop through all attributes for this div
	
		},function(error){console.log(error)});
		
		//view more ZONING
		QT_det_zoning.execute(Q_det_zoning, function(results){
		
			var el_layer = dojo.doc.createElement("div");
			el_layer.setAttribute("class","details");
		
			for (var i=0, il=results.features.length; i<il; i++) {
			
				var featureAttributes = results.features[i].attributes;				
				var output = "<ul class=\"ResultList SelectionResult\">";				
				for (attr in featureAttributes) {
									
					output += FormatResult(attr, results.features[i].attributes[attr], "selection selection_more");
				
				}
				output += "</ul>";
				el_layer.innerHTML += output;	
				dojo.byId(target_el).appendChild( el_layer);
			}	
		},showerror);
		
		//view more OWNERS
		QT_det_owners_int.executeForIds(Q_det_owners_int,function(ids){
	
			Q_det_owners.objectIds = [ids];
		
			QT_det_owners.executeRelationshipQuery(Q_det_owners,function(featureSets){
				
				for(featureSet in featureSets){

					// write attributes
					
					var el_layer = dojo.doc.createElement("div");
					el_layer.setAttribute("class","details");
					
					var featureAttributes;

					for (var i=0, il=featureSets[featureSet].features.length; i<il; i++) {

						featureAttributes = featureSets[featureSet].features[i].attributes;
						
						var el_layer_attr = dojo.doc.createElement("div");
						el_layer_attr.setAttribute("class","detail_layer_attr");

						var el_parcelAttribs = dojo.doc.createElement("div");
						el_parcelAttribs.setAttribute("class","dSelParcelContainer");
						
						var output = "<ul class=\"ResultList SelectionResult\">";

						for (attr in featureAttributes) {				
							output += FormatResult(attr, featureAttributes[attr], "selection selection_more");
						}
						output += "</ul>";
						
						el_layer.innerHTML += output;

						// add all the links to the primary parcel container
						//el_layer.appendChild( el_parcelAttribs);
						
						dojo.byId(target_el).appendChild( el_layer);
					}
				}
						

			}
			,showerror);		
	
		},showerror);
		
	}
	
	function f_summarize_totals( graphics, clickType ){
		
		console.log("Click Type:",clickType, "graphics", graphics );
		
		var totalAcres = 0,
			field = "MAP_ACRES",
			str_pid_list = "";
		
		dojo.forEach( graphics, function( graphic ){
			totalAcres += graphic.attributes[ field ];
			
			//if( type=="buffer" ){
			str_pid_list += graphic.attributes[ "PID" ] + ",";
		});
	
		var e_summary = dojo.doc.createElement("div");
			e_summary.innerHTML =  graphics.length + " "  + ( graphics.length == 1 ? " parcel was found. " : "parcels were found." ) +  "( "+ Math.round( totalAcres * 100 ) / 100 + " acres )";
		
		var e_export = dojo.doc.createElement("a")
			e_export.innerHTML = "Export Results to Excel";
			e_export.setAttribute( "href", "http://webmaps.njmeadowlands.gov/municipal/export_parcel_owners.php?excel=1&layers=Owner&pids=" + str_pid_list.substring( 0, str_pid_list.length - 1 ));
			e_export.setAttribute( "style", "padding-top:6px;display:block");
			
		//var e_zoomToExtent = dojo.doc.createElement("div");
		//	e_zoomToExtent.innerHTML = "Zoom to Result Extent";
		//	e_zoomToExtent.setAttribute("onclick", function( graphics ){ f_zoomToGraphicsExtent( gs );} );
			
		var e_exportSummary = dojo.doc.createElement("div");
			e_exportSummary.appendChild( e_summary );
			e_exportSummary.appendChild( e_export );
			//e_exportSummary.appendChild( e_zoomToExtent );
		
		var resultsSummary = dojo.byId("dResultsSummary");
			dojo.empty(resultsSummary);
			resultsSummary.appendChild( e_exportSummary );
	}
	
	function f_map_graphics_clear(){
			
		// clear selection graphics 
		GL_parcel_selection.clear();
		GL_buffer_parcel.clear();
		GL_buffer_buffer.clear();
		GL_buffer_selected_parcels.clear();
		
		// clear search graphics			
		GL_query_parcel.clear();
		GL_query_landuse.clear();
		GL_query_facility.clear();
		GL_parcel_owners.clear();
		
		// clear any random map graphics
		M_meri.graphics.clear();
					
		// reset featureSet selection collections
		fSet_selected_parcels = [];
		fSet_buffered_parcels = [];
		
		// clear result divs
		dojo.byId("r_map_selection").innerHTML = "";
		dojo.byId("r_map_buffer").innerHTML = "";
		dojo.byId("dIdentifyResults").innerHTML = "";
		dojo.byId("dResultsSummary").innerHTML = "";
		dojo.byId("dSearchResults").innerHTML = "";
		dojo.byId("Results_ERIS").innerHTML = "";
		dojo.byId("Links_ERIS").innerHTML = "";
	}	
	
	
	function f_zoomToGraphicsExtent( gs ){
	
		M_meri.setExtent( esri.graphicsExtent( gs ));
		
	}
	
	function mapInitialize( ) {
				
		//resize side content pane area
		resize_content_pane();

		// create municipality and qualifier search filter checkboxs
		f_search_munis_build( );
		f_search_qual_build( );
		f_search_landuse_build( );
		
		njmcExtent = new esri.geometry.Extent({
			xmin:566663,
			ymin:664051,
			xmax:652186,
			ymax:747704,
			spatialReference:{ "wkid":3424 }
		})

		// initialize map object, setting spatial reference and other properties
		M_meri = new esri.Map( "map", {
			logo: false,
			nav:true,
			navigationMode: "css-transforms", //  'classic'
			extent: njmcExtent
		});
		
		
		
		scalebarDijit = new esri.dijit.Scalebar( {map: M_meri, scalebarUnit:"english", attachTo:"bottom-left"} );
		
		// cached layer imagery basemap
		IL_basemap = new esri.layers.ArcGISImageServiceLayer( DynamicLayerHost + "/ArcGIS/rest/services/Imagery/IMG_2009_C/ImageServer");

		// dynamic layer for MunicipalMap_live
		LD_base = new esri.layers.ArcGISDynamicMapServiceLayer( DynamicLayerHost + "/ArcGIS/rest/services/Municipal/MunicipalMap_live/MapServer",{opacity:0.8});

		// dynamic layer for flooding
		LD_flooding = new esri.layers.ArcGISDynamicMapServiceLayer( DynamicLayerHost + "/ArcGIS/rest/services/Flooding/Flooding_Scenarios/MapServer",{opacity:0.65});
		
		// graphics layers to hold queries
		GL_query_parcel = new esri.layers.GraphicsLayer( {opacity:0.60,} );
		
		GL_query_landuse = new esri.layers.GraphicsLayer( {opacity:0.60} );
		GL_query_facility = new esri.layers.GraphicsLayer( {opacity:0.60} );
		
		
		// graphics layer to hold parcel selections
		GL_parcel_selection = new esri.layers.GraphicsLayer( {opacity:0.60} );
		GL_parcel_owners = new esri.layers.GraphicsLayer( {opacity:0.60} );
		
		
		GL_buffer_parcel = new esri.layers.GraphicsLayer( {opacity:0.60} );
		GL_buffer_buffer = new esri.layers.GraphicsLayer( {opacity:0.60} );
		GL_buffer_selected_parcels = new esri.layers.GraphicsLayer( {opacity:0.60} );

		// add all map layers.. new in 3.1
		/// layer presedence is based on array position
		M_meri.addLayers( [ IL_basemap, LD_base, LD_flooding ] );
				
		M_meri.addLayer( GL_parcel_selection );
		M_meri.addLayer( GL_parcel_owners );
		M_meri.addLayer( GL_buffer_selected_parcels );
		M_meri.addLayer( GL_buffer_parcel );
		M_meri.addLayer( GL_buffer_buffer );
		M_meri.addLayer( GL_query_parcel );
		
		 // GL_parcel_selection 		 .enableMouseEvents();
		 // GL_parcel_owners 			 .enableMouseEvents();
		 // GL_buffer_selected_parcels  .enableMouseEvents();
		 // GL_buffer_parcel		     .enableMouseEvents();
		 // GL_buffer_buffer            .enableMouseEvents();
		 // GL_query_parcel             .enableMouseEvents();
		
		// resize the info window
		M_meri.infoWindow.resize(440,300);
		
		// create the geometry service object
		GS_parcel_selection_buffer = new esri.tasks.GeometryService( DynamicLayerHost + "/ArcGIS/rest/services/Map_Utility/Geometry/GeometryServer" );
		
		dojo.connect( M_meri, "onLoad", function( map ){
			
			console.log("Map loaded");
			
			f_query_parcel_init( );
			f_query_landuse_init( );		
			f_query_facility_init( );
			f_query_owners_init( );	
			
			f_query_owner_int_init( );
			f_query_owner_parcels_init( );
			f_parcel_selection_init( );
			f_parcel_buffer_init( );
			
			f_map_identify_init( );
			
			navToolbar = new esri.toolbars.Navigation( M_meri );
			
			//overviewMapDijit = new esri.dijit.OverviewMap( { map: M_merp, visible:false } );
			//overviewMapDijit.startup();
			
			measurementDijit = new esri.dijit.Measurement( { map: map }, dojo.byId( 'dMeasureTool' ) );
			measurementDijit.startup();
			
			// set symbols globally so they can be use for multiple feature groups
			// esri.symbol.SimpleFillSymbol(style, outline, color)
			// new dojo.Color([255,0,0,0.25]) R,G,B,transparency
			S_feature_selection = new esri.symbol.SimpleFillSymbol(
					esri.symbol.SimpleFillSymbol.STYLE_SOLID, 
					new esri.symbol.SimpleLineSymbol(esri.symbol.SimpleLineSymbol.STYLE_DASHDOT, new dojo.Color([255,0,0]), 2), 
					new dojo.Color([255,255,0,0.5])
				);
				
			S_feature_flash = new esri.symbol.SimpleFillSymbol(
					esri.symbol.SimpleFillSymbol.STYLE_SOLID,
					new esri.symbol.SimpleLineSymbol(esri.symbol.SimpleLineSymbol.STYLE_SOLID, new dojo.Color([98,194,204]), 2),
					new dojo.Color([98,194,204,0.5])
				);		
			
			S_buffer_parcel = new esri.symbol.SimpleFillSymbol(
					esri.symbol.SimpleFillSymbol.STYLE_SOLID, 
					new esri.symbol.SimpleLineSymbol(esri.symbol.SimpleFillSymbol.STYLE_SOLID, new dojo.Color([100,100,100]), 3),
					new dojo.Color([255,0,0,0.20])
				);
			
			S_buffer_buffer = new esri.symbol.SimpleFillSymbol(
					esri.symbol.SimpleFillSymbol.STYLE_SOLID, 
					new esri.symbol.SimpleLineSymbol(esri.symbol.SimpleFillSymbol.STYLE_SOLID, new dojo.Color([100,100,100]), 3),
					new dojo.Color([255,0,0,0.20])
				);
				
			S_buffer_selected_parcels = new esri.symbol.SimpleFillSymbol(
					esri.symbol.SimpleFillSymbol.STYLE_SOLID, 
					new esri.symbol.SimpleLineSymbol("dashdot", new dojo.Color([255,0,0]), 2), 
					new dojo.Color([255,255,0,0.25])
				);
				
				
			setTimeout( function(){ loadingDialog.hide();}, 2000 );
			
	
		});
		
		////////  end on map Load
		
		dojo.connect( LD_base, "onLoad", function(){ f_layer_list_build( )});

		// after the imagery layer is loaded, build the imagery list
		dojo.connect( IL_basemap, "onLoad", function(){ f_imagery_list_build( )});

		dojo.connect( M_meri, "onLayersAddResult", function( ){ 
		
			console.log("All Layers have been added.");

		});
		
		//dojo.connect( M_meri, "onMouseDrag", function(a){console.log("onMouseDrag",a)});
		
		dojo.connect( dojo.byId("map"), "resize", function() {
				clearTimeout(resizeTimer);
				resizeTimer = setTimeout( function( ) {
					M_meri.resize();
					M_meri.reposition();
					console.log("resize map");
				}, 500);
			});

		// define event handlers for toolbar and other elements..		

		// NAVIGATION EVENTS
		
		dojo.connect( dojo.byId("nav_zoom_in"), "onclick", function( ) {
			navToolbar.activate( esri.toolbars.Navigation.ZOOM_IN );
		});

		dojo.connect( dojo.byId("nav_zoom_out"), "onclick", function( ) {
			navToolbar.activate( esri.toolbars.Navigation.ZOOM_OUT);
		});

		dojo.connect( dojo.byId( "nav_zoom_fullext"), "onclick", function( ) {
			zoomToCustomFullExtent();
		});

		dojo.connect( dojo.byId("nav_zoom_prev"), "onclick", function( ) {
			navToolbar.zoomToPrevExtent();
		});

		dojo.connect( dojo.byId("nav_zoom_next"), "onclick", function( ) {
			navToolbar.zoomToNextExtent();
		});

		dojo.connect( dojo.byId("nav_pan"), "onclick", function( ) {
			tool_selected = "pan";
			M_meri.enableMapNavigation();
			navToolbar.activate( esri.toolbars.Navigation.PAN );
			
			//_onMouseDragHandler_connect
			//_panHandler_connect
			
		});
		
		dojo.connect( dojo.byId("nav_identify"), "onclick", function( ) {
			navToolbar.activate( esri.toolbars.Navigation.PAN );
			tool_selected = "identify";
			tabs_toggle( "ResultsPane" );
		});

		dojo.connect( dojo.byId("nav_btn_select"), "onclick", function( ) {
			navToolbar.activate( esri.toolbars.Navigation.PAN );
			tool_selected="select";
			tabs_toggle("ResultsPane");
			show_visibility("dBufferTool");
		});

		dojo.connect( dojo.byId("nav_btn_erase"), "onclick", f_map_graphics_clear );
		
		dojo.connect( dojo.byId("aBufferParcelExec"), "onclick", f_multi_parcel_buffer_exec );
		
		dojo.connect( dojo.byId("nav_measure"), "onclick", function(){
			navToolbar.deactivate();
			measurementDijit.setTool("location",true);
			tool_selected = "measure";
			tabs_toggle( "ResultsPane" );
			show_visibility( "dMeasureWrap" );
		});

		dojo.connect( dojo.byId( "LayersToggle" ), "onclick", function( ) {
			tabs_toggle( "MapLayers" );
		});
		
		dojo.connect( dojo.byId("SearchTab"), "onclick", function( ) {
			tabs_toggle( "SearchPane" );
		});
		
		dojo.connect( dojo.byId("ResultsTab"),"onclick", function( ) {
			tabs_toggle("ResultsPane");
		});
		
		dojo.connect( dojo.byId("HelpTab"),"onclick", function( ) {
			tabs_toggle("HelpPane");
		});

		dojo.connect( dojo.byId( "i_btn_search_parcels" ), "onclick", function( ) {
			f_query_parcel_exec();
		});

		dojo.connect( dojo.byId( "rdo_muni_searchSelect" ), "onclick", function(){
			dojo.fx.wipeIn( {node:"search_munis",duration:1000} ).play();
		});

		// add event listeners to the Radio Buttons for municipality filter
		dojo.connect( dojo.byId("rdo_muni_searchAll"), "onclick",function( ) {
			dojo.fx.wipeOut( {node:"search_munis", duration:1000} ).play();
			dojo.query(".s_muni_chk_item").forEach( function( muni ){
				dojo.removeAttr( dojo.byId( muni.id ), "checked");
				muni.setAttribute( "value", "off" );
				muni.checked = false;
			});
		});
		
		// add event listeners to the Radio Buttons for qualifier filter
		dojo.connect(dojo.byId("rdo_landuse_searchAll"),"onclick",function( ) {
			dojo.fx.wipeOut({node:"search_landuse",duration:1000}).play();
			dojo.query(".s_landuse_chk_item").forEach(function(landuse){
				dojo.removeAttr(dojo.byId(landuse.id),"checked");
				landuse.setAttribute("value","off");
				landuse.checked = false;
			});
		});

		dojo.connect(dojo.byId("rdo_qual_searchSelect"),"onclick",function( ) {
			dojo.fx.wipeIn({node:"search_qual",duration:1000}).play();
		});

		// add event listeners to the Radio Buttons for qualifier filter
		dojo.connect(dojo.byId("rdo_qual_searchAll"),"onclick",function( ) {
			dojo.fx.wipeOut({node:"search_qual",duration:1000}).play();
			dojo.query(".s_qual_chk_item").forEach(function(qual){
				dojo.removeAttr(dojo.byId(qual.id),"checked");
				qual.setAttribute("value","off");
				qual.checked = false;
			});
		});

		dojo.connect(dojo.byId("rdo_landuse_searchSelect"),"onclick",function( ) {
			dojo.fx.wipeIn({node:"search_landuse",duration:1000}).play();
		});

		dojo.connect( M_meri, "onClick", f_map_click_handler );
		
		//Default tab
		tabs_toggle("HelpPane");
	}
	//end of map init

	////////////////////////////////////////////////
	//
	// ERIS FUNCTIONS
	//
	/////////////////////////////////////////////////

	//ERIS LOGIN
	function ERISLogin() {
		// Get the result node
		var signInResultNode = dojo.byId("signInResultNode");
		var signInForm = dojo.byId("signInForm");
		// Using dojo.xhrGet, as very little information is being sent
		dojo.xhrPost({
			// The URL of the request
			url: "ERIS/authenticate.php",
			// Form to send
			form: dojo.byId("signInFormNode"),
			// The success callback with result from server
			load: function(loginResponse) {
				dojo.style(signInResultNode,"display","block");
				
				if(loginResponse == "true"){
					//hide login buttons if login was successful
					dojo.style(signInForm,"display","none");
					signInResultNode.innerHTML = "You are now logged in";
					window.location.reload(true); //reloads app since ERIS is a lot
				}
				else{
					signInResultNode.innerHTML = "Your password or username did not match.";
				}
			},
			// The error handler
			error: function() {
				signInResultNode.innerHTML = "There was an error with your request.";
			}
		});
	}
	
	function loadContinue( ) {
		
		// test if all layers have loaded
		if( dependencies["landuse"].isLoaded && dependencies["legend"].isLoaded ){
			
			//initialize map, pass meri map obj
			mapInitialize( );
		}
	}
	
		
		
</script>
</body>
</html>