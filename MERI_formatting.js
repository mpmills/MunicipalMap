///////////////////////////////////////////////
// 
// OUTPUT FORMATING AND CLEANUP FUNCTIONS
//
///////////////////////////////////////////////


//PROPERCASE
	function toProperCase(s)
	{
		s = s.toString();
	  	return s.toLowerCase().replace(/^(.)|\s(.)/g, 
			  function($1) { return $1.toUpperCase(); });
	}
	
//FIELD NAME ALIASES
	function fieldAlias(fieldName, dataSource){
		
		dataSource = typeof(dataSource) != 'undefined' ? dataSource : '';		
		var names = new Array();
		
		// names[""] = ""; 
		names["PID"] = "PID"; 
		names["PAMS Pin"] = "PAMS Pin"; 
		names["OLD_BLOCK"] = "Old Block"; 
		names["OLD_LOT"] = "Old Lot"; 
		names["PROPERTY_ADDRESS"] = "Address"; 
		names["TAX_ACRES"] = "Tax Acres"; 
		names["CITY_STATE"] = "City, State";
		names["MAP_ACRES"] = "GIS Acres";
		names["MUN_CODE"] = "Municipality";
		names["LANDUSE_CODE"] = "Landuse";
		names["ZONE_CODE"] = "Zone";
		names['NAME'] = dataSource + ' Name';
		names["ADDRESS"] = dataSource + ' Address';
		names["FIRM_PAN"] = "Firm Panel #";
		names["TMAPNUM"] = "Tidelands Map #";
		names["FLD_ZONE"] = "Flood Zone";
		names["STATIC_BFE"] = "Static Base Flood Elevation";
		names["LABEL07"] = "Wetland Label";
		names["TYPE07"] = "Wetland Type";
		names["LU07"] = "Anderson landuse class";
		names["RECIEVINGWATER"] = "Receiving Water";
		names["NAME10"] = "Voting District Label"; 
		
		names["FACILITY_NAME"] = "Facility Name"; 
		names["BUILDING_LOCATION"] = "Building Location"; 
		names["TOTALBLDG_SF"] = "Total Building Square Feet"; 
		names["PHYSICAL_ADDRESS"] = "Address"; 
		names["PHYSICAL_CITY"] = "City"; 
		names["PHYSICAL_ZIP"] = "Zip Code"; 
		names["COMPANY_CONTACT"] = "Company Contact"; 
		names["CONTACT_PHONE"] = "Phone"; 
		names["OFFICIAL_CONTACT"] = "Official Contact"; 
		names["OFFICIAL_PHONE"] = "Phone"; 
		names["EMERGENCY_CONTACT"] = "Emergency Contact"; 
		names["EMERGENCY_PHONE"] = "Phone"; 
		names["CAS_NUMBER"] = "CAS Number"; 
		
		names["LandUse_Code"] = "Landuse"; 
		names["Zone_Code"] = "Zoning"; 
		names["LANDUSE_CODE"] = "Landuse"; 
		names["ZONE_CODE"] = "Zoning"; 
		
		if(fieldName in names){
			return(names[fieldName]);
		}else{
			return(toProperCase(fieldName));
		}
						
	}
// lANDUSE CLEANUP
function landuseAlias(a){
		var alias = new Array();
		alias["000"] = "Unclassified";
		alias["AL"] = "Altered Lands";
		alias["CO"] = "Commercial Office";
		alias["CR"] = "Commercial Retail";
		alias["CU"] = "Communication Utility";
		alias["HM"] = "Hotels and Motels";
		alias["ICC"] = "Ind. Comm. Complex";
		alias["IND"] = "Industrial";
		alias["PQP"] = "Public Services";
		alias["RES"] = "Residential";
		alias["RL"] = "Recreational Land";
		alias["TRS"] = "Transportation";
		alias["VAC"] = "Vacant Land";
		alias["WAT"] = "Water";
		alias["WET"] = "Wetlands";
		
		if(a in alias){
			return(alias[a]);
		}else{
			return(toProperCase(a));
		}
}
// ZONING CLEANUP
function zoningAlias(a){
		var alias = new Array();
		alias["AV"] = "Aviation facilities"; 
		alias["CP"] = "Commercial Park"; 
		alias["EC"] = "Environmental Conservation"; 
		alias["HI"] = "Heavy Industrial"; 
		alias["HC"] = "Highway Commercial"; 
		alias["IA"] = "Intermodal A"; 
		alias["IB"] = "Intermodal B"; 
		alias["LIA"] = "Light Industrial A"; 
		alias["LIB"] = "Light Industrial B"; 
		alias["LDR"] = "Low Density Residential"; 
		alias["NC"] = "Neighborhood Commercial"; 
		alias["PR"] = "Planned Residential"; 
		alias["PU"] = "Public Utilities"; 
		alias["RC"] = "Regional Commercial"; 
		alias["TC"] = "Transportation Center"; 
		alias["WR"] = "Waterfront Recreation"; 
		alias["RRR"] = "Roads, Rails, ROWs"; 
		alias["000"] = "Unclassified"; 
		alias["RA"] = "Redevelopment Area"; 
		alias["MZ"] = "Multiple Zones"; 
		alias["CZC-SECA"] = "Commercial Zone C - Secaucus"; 
		alias["LI1-SECA"] = "Light Industrial Zone 1 - Secaucus"; 
		alias["RZA-SECA"] = "Residential Zone A - Secaucus"; 
		alias["WAT"] = "Water"; 
		alias["LID-TET"] = "Light Industrial & Distribution Zone - Teterboro"; 
		alias["RA1-TET"] = "Redevelopment Area 1 Zone - Teterboro"; 
		alias["RA2-TET"] = "Redevelopment Area 2 Zone - Teterboro"; 
		alias["PA"] = "Parks and Recreation"; 
		alias["C-CARL"] = "Commercial Zone - Carlstadt"; 
		alias["LI-CARL"] = "Light Industrial - Carlstadt"; 
		alias["LDR-TET"] = "Low Density Residential - Teterboro"; 
		alias["MCZ-CARL"] = "Mixed Commercial Zone - Carlstadt"; 
		alias["RZ-CARL"] = "Residential Zone - Carlstadt"; 
		alias["RZB-SECA"] = "Residential Zone B - Secaucus"; 
		alias["MNF-MOON"] = "Manufacturing Zone - Moonachie"; 
		alias["R1-MOON"] = "1-Family Residential Zone - Moonachie"; 
		alias["R2-MOON"] = "2-Family Residential Zone - Moonachie"; 
		alias["B1-MOON"] = "General Business Zone - Moonachie"; 
		alias["B2-MOON"] = "Limited Business Zone - Moonachie"; 
		alias["R1-ER"] = "Low Density Residential - E Rutherford"; 
		alias["R2-ER"] = "Medium Density Residential - E Rutherford"; 
		alias["R3-ER"] = "Multi-Family Residential - E Rutherford"; 
		alias["NC-ER"] = "Neighborhood Commercial - E Rutherford"; 
		alias["RC-ER"] = "Regional Commercial - E Rutherford"; 
		alias["PCD-ER"] = "Planned Commercial Development - E Rutherford"; 
		alias["RD1-ER"] = "Redevelopment-1 - E Rutherford"; 
		alias["R1-NA"] = "1-Family Residential - N Arlington"; 
		alias["R2-NA"] = "1&2-Family Residential - N Arlington"; 
		alias["RRRA-NA"] = "Ridge Road Redevelopment Area - N Arlington"; 
		alias["PARA-NA"] = "Porete Avenue Redevelopment Area - N Arlington"; 
		alias["R3-NA"] = "Multi-Family Residential - N Arlington"; 
		alias["I1-NA"] = "Light Industrial - N Arlington"; 
		alias["C3-NA"] = "Cemetery - N Arlington"; 
		alias["P/OS-NA"] = "Parks & Open Space - N Arlington"; 
		alias["W/C-NA"] = "Waterways & Creeks - N Arlington"; 
		alias["SEA"] = "Sports and Expositions"; 
		alias["I-ER"] = "Light Industrial -  E Rutherford"; 
		alias["C2-NA"] = "Commercial 2 - N Arlington"; 
		alias["C1-NA"] = "Commercial 1 - N Arlington"; 
		alias["R1-RU"] = "Single Family Residential - Rutherford"; 
		alias["R1A-RU"] = "Single Family Residential - Rutherford"; 
		alias["R1B-RU"] = "Single Family Residential - Rutherford"; 
		alias["R2-RU"] = "Two Family Residential - Rutherford"; 
		alias["R4-RU"] = "Five Story Apartment - Rutherford"; 
		alias["B1-RU"] = "Three Story Office - Rutherford"; 
		alias["B2-RU"] = "Five Story Office - Rutherford"; 
		alias["B3-RU"] = "Three Story Office-Retail - Rutherford"; 
		alias["B3/SH-RU"] = "Business / Senior Housing - Rutherford"; 
		alias["B4-RU"] = "Business / Light Industrial - Rutherford"; 
		alias["ORD-RU"] = "Ten Story Office, Research & Distribution - Rutherford"; 
		alias["HC-RU"] = "Highway Commercial Development - Rutherford"; 
		alias["PCD-RU"] = "Planned Commercial Development - Rutherford"; 
		alias["R3-RU"] = "Three Story Apartment - Rutherford"; 
		alias["UR1A-RU"] = "University / Residential, Single Family - Rutherford"; 
		alias["C-RF"] = "Commercial - Ridgefield"; 
		alias["C/HRH-RF"] = "Commercial / High Rise Hotel - Ridgefield"; 
		alias["GA/TH C-RF"] = "GA/TH Cluster - Ridgefield"; 
		alias["LM-RF"] = "Light Manufacturing - Ridgefield"; 
		alias["NB-RF"] = "Neighborhood Business - Ridgefield"; 
		alias["O/TH-RF"] = "Office / T.H. - Ridgefield"; 
		alias["OC-RF"] = "Office Commercial - Ridgefield"; 
		alias["OMR-RF"] = "Office Mid Rise - Ridgefield"; 
		alias["OMRH-RF"] = "Office Mid Rise Hotel - Ridgefield"; 
		alias["OFR-RF"] = "One Family Residential - Ridgefield"; 
		alias["P/SP-RF"] = "Public / Semi Public - Ridgefield"; 
		alias["TH/SRCH-RF"] = "TH / SR Citizens Housing - Ridgefield"; 
		alias["T-RF"] = "Townhomes - Ridgefield"; 
		alias["TFR-RF"] = "Two Family Residential - Ridgefield"; 
		alias["RB-LF"] = "One & Two Family Residential - Little Ferry"; 
		alias["RM-LF"] = "Multifamily Residential - Little Ferry"; 
		alias["BH-LF"] = "Highway & Regional Business - Little Ferry"; 
		alias["BN-LF"] = "Neighborhood Business - Little Ferry"; 
		alias["IR-LF"] = "Restricted Industrial - Little Ferry"; 
		alias["IG-LF"] = "General Industrial - Little Ferry"; 
		alias["P-LF"] = "Public Facilities - Little Ferry"; 
		alias["RA-LF"] = "One Family Residential - Little Ferry"; 
		alias["P/SP-NA"] = "Public/Semi-Public - N Arlington"; 
		alias["A-SH"] = "Residential - South Hackensack"; 
		alias["B-SH"] = "Commercial - South Hackensack"; 
		alias["C-SH"] = "Industrial - South Hackensack"; 
		alias["M-SH"] = "Mixed - South Hackensack"; 
		alias["SCR-SH"] = "Senior Citizen Multifamily Res - South Hackensack"; 
		alias["RA-LYND"] = "One Family Residence - Lyndhurst"; 
		alias["RB-LYND"] = "One and Two Familly Residence - Lyndhurst"; 
		alias["RC-LYND"] = "Medium Density Residential - Lyndhurst"; 
		alias["B-LYND"] = "Business - Lyndhurst"; 
		alias["M1-LYND"] = "Light Industrial - Lyndhurst"; 
		alias["M2-LYND"] = "Heavy Industrial - Lyndhurst"; 
		alias["CGI-LYND"] = "Commercial-General Industrial - Lyndhurst"; 
		alias["R-1-K"] = "One Family Residential - Kearny"; 
		alias["OS-K"] = "Open Space Parks and Recreation District - Kearny"; 
		alias["SU-1-K"] = "Special Use 1 - Kearny"; 
		alias["SU-3_K"] = "Special Use 3 - Kearny"; 
		alias["SOCD-K"] = "Street Oriented Commercial District - Kearny"; 
		alias["SKI-N-K"] = "South Kearny Industrial North - Kearny"; 
		alias["SKI-S-K"] = "South Kearny Industrial South - Kearny"; 
		alias["RDP-K"] = "Research Distribution Park - Kearny"; 
		alias["RD-K"] = "Residential District - Kearny"; 
		alias["R-A-K"] = "Redevelopment Area - Kearny"; 
		alias["R-3-K"] = "Multi-Family Residential - Kearny"; 
		alias["R-2B-K"] = "One_Two Family Residential/Hospital - Kearny"; 
		alias["R-2-K"] = "One_Two Family Residential - Kearny"; 
		alias["PRD-K"] = "Planned Residential Development - Kearny"; 
		alias["MXD-K"] = "Mixed Use District - Kearny"; 
		alias["MP-K"] = "Marshland Preservation - Kearny"; 
		alias["M-K"] = "Manufacturing - Kearny"; 
		alias["LTI-K"] = "Light Industrial - Kearny"; 
		alias["LID-B-K"] = "Light Industrial Distribution B - Kearny"; 
		alias["LID-A-K"] = "Light Industrial Distribution A - Kearny"; 
		alias["LCD-K"] = "Large Scale Commercial District - Kearny"; 
		alias["H-I-K"] = "Heavy Industrial - Kearny"; 
		alias["ESCD-K"] = "Existing Shopping Center District - Kearny"; 
		alias["CEM-K"] = "Cemetery - Kearny"; 
		alias["C-4-K"] = "General Commercial - Kearny"; 
		alias["C-3-K"] = "Community Business - Kearny"; 
		alias["C-2-K"] = "Neighborhood Business - Kearny"; 
		alias["C-1-K"] = "Office - Kearny"; 
		alias["ARLD-K"] = "Adaptive Reuse Loft District - Kearny"; 
		alias["ACD-K"] = "Automobile Oriented Commercial District - Kearny"; 
		alias["LI-K"] = "   Limited Industrial- Kearny"; 
		alias["R1-NB"] = "Low Density Residential - N Bergen"; 
		alias["R2-NB"] = "Intermediate Density Residential - N Bergen"; 
		alias["R3-NB"] = "Moderate Density Residential - N Bergen"; 
		alias["C1-NB"] = "General Business - N Bergen"; 
		alias["C1A-NB"] = "General Business Limited Mixed Use - N Bergen"; 
		alias["C1B-NB"] = "General Business Limited Mixed Use Bergenline - N Bergen"; 
		alias["C1C-NB"] = "General Business Mixed Use - N Bergen"; 
		alias["C1R-NB"] = "Commercial Residential District - N Bergen"; 
		alias["C2-NB"] = "Highway Business - N Bergen"; 
		alias["I-NB"] = "Industrial - N Bergen"; 
		alias["P1-NB"] = "Riverside - N Bergen"; 
		alias["P2-NB"] = "Edgecliff - N Bergen"; 
		alias["P3-NB"] = "River Road West - N Bergen"; 
		alias["TRD-NB"] = "Tonnelle Ave Redevelopment Area - N Bergen"; 
		alias["ET-NB"] = "East Side Tonnelle Ave Zone - N Bergen"; 
		alias["GL-NB"] = "Granton Ave-Liberty Ave-69th Street Zone - N Bergen"; 
		alias["KO-NB"] = "Kennedy Overlay Zone - N Bergen"; 
		alias["TO-NB"] = "Townhouse Overlay Zone - N Bergen"; 
	
		
		if(a in alias){
			return(alias[a]);
		}else{
			return(toProperCase(a));
		}
}
// MUN_CODE CLEANUP
function muncodeToName(c){

		var code = new Array();
		
		if(c.length == 4){
			c = c.substr(1,3);
		}
		
		code["205"] = "Carlstadt";
		code["212"] = "East Rutherford";
		code["230"] = "Little Ferry";
		code["232"] = "Lyndhurst";
		code["237"] = "Moonachie";
		code["239"] = "North Arlington";
		code["249"] = "Ridgefield";
		code["256"] = "Rutherford";
		code["259"] = "South Hackensack";
		code["262"] = "Teterboro";
		code["906"] = "Jersey City";
		code["907"] = "Kearny";
		code["908"] = "North bergen";
		code["909"] = "Secaucus";	
		
		
		if(c in code){
			return(code[c]);
		}else{
			return(toProperCase(c));
		}
}
//ARRAY SEARCH FUNCTION
function InArray(array, value) {
	var result = false;
	
	for (var i =0; i<array.length; i++) {
		//console.log(array[i] + '--' + value);
		if(array[i] == value){
			result =  true;
		}	
	}
	return result;
}
//
// BIG FUNCTION THAT CHECKS FOR VARIOUS FIELD TWEAKS (ALIASES, ROUNDING VALUES, ETC)
// 
// 
//
function FormatResult(fieldName, fieldValue, dataSource){
	
	console.log("Field Name: " + fieldName);
	console.log("Field Value: " + fieldValue);
	console.log("Field DataSource: " + dataSource);
	console.log("---------------------------------------------------------");

	dataSource = typeof(dataSource) != 'undefined' ? dataSource : '';
	var CSS = new Array();
	CSS['field'] = CSS['value'] = '';
	if(dataSource != ''){
		CSS['field'] = "field_" + dataSource;
		CSS['value'] = "value_" + dataSource;
	}
	var Result = new Array();
	
	//default 
	Result['field'] = fieldAlias(fieldName);
	Result['value'] = fieldValue;
	
	//Acres
	//check if Value is numeric and has a large decmil place, round it up
	if(fieldName == "MAP_ACRES" && !isNaN(fieldValue)){
		Result['value'] = Math.round(fieldValue*100)/100;	
	}
	//landuse
	if(fieldName == "LANDUSE_CODE"){Result['value'] = landuseAlias(fieldValue)}
	//landuse
	if(fieldName == "ZONE_CODE"){Result['value'] = zoningAlias(fieldValue)}
	//municipalities
	if(fieldName == "MUN_CODE"){Result['value'] = muncodeToName(fieldValue)}
	//zoning
	
	//normal output
	return '<li><span class="field ' + CSS['field'] + '">' + Result['field'] + ':</span><span class="value ' + CSS['value'] + '">' + Result['value'] + '</span></li>';
	
	//debug output - true fieldnames
	//return '<li><div class="field ' + CSS['field'] + '">' + fieldName + ':</div><div class="value ' + CSS['value'] + '">' + Result['value'] + '</div></li>';
}

//PAMS PIN TO PROJECT KEY HELPER/CONVERTER FUNCTION
	function pams_to_old(pin){
		if(pin.substr(0,1) == 0){
			pin = pin.substr(1);
			pin = pin.replace(/_/g," "); //remove all underscores (g = modifier for all)
			return (pin);
		}	
	}
	
// Property Photo Lookup Function
//checks to see if valid photo exists and returns that or false
//id is currently PAMS pin
	function ImageExists(id, target_div)
	{
		dojo.xhrGet({
			// The URL of the request
			url: 'http://webmaps.njmeadowlands.gov/municipal/get-photo.php?id=' + id,
			// The success callback with result from server
			load: function(newContent) {
				dojo.byId(target_div).innerHTML = newContent;
			}			
		});	
	}