///////////////////////////////////////////////
// 
// OUTPUT FORMATING AND CLEANUP FUNCTIONS
//
///////////////////////////////////////////////

//PROPERCASE

	function toProperCase(s)
	{
		s = s.toString();
	  	return s.toLowerCase().replace(/^(.)|\s(.)/g,  function( $1 ) { return $1.toUpperCase(); });
	}
	
//FIELD NAME ALIASES
	function fieldAlias( fieldName, dataSource ){
	
	
		dataSource = typeof(dataSource) != 'undefined' ? dataSource : '';

		aliases.fieldNames['NAME'] = dataSource + ' Name';
		aliases.fieldNames["ADDRESS"] = dataSource + ' Address';		
		
		if( fieldName in aliases.fieldNames ){
			return( aliases.fieldNames[ fieldName ] );
		}else{
			return( toProperCase( fieldName ));
		}
						
	}
// lANDUSE CLEANUP
function landuseAlias( a ){
	
		if( a in aliases.landUseCodes){
			return( aliases.landUseCodes[ a ]);
		}else{
			return( toProperCase( a ));
		}
}
// ZONING CLEANUP
function zoningAlias( a ){

		if( a in aliases.zoneCodes ){
			return( aliases.zoneCodes[a] );
		}else{
			return( toProperCase(a) );
		}
}
// MUN_CODE CLEANUP
function muncodeToName( c ){

	if( c.length == 4){
		c = c.substr(1,3);
	}
	if( c in aliases.munCodes ){
		return( aliases.munCodes[ c ] );
	}else{
		return( toProperCase(c) );
	}
}
//ARRAY SEARCH FUNCTION
function InArray(array, value) {
	var result = false;
	
	for (var i =0; i < array.length; i++) {
		//console.log(array[i] + '--' + value);
		if( array[i] == value ){
			result =  true;
		}	
	}
	return result;
}

//
// BIG FUNCTION THAT CHECKS FOR VARIOUS FIELD TWEAKS (ALIASES, ROUNDING VALUES, ETC)
// 

function FormatResult(fieldName, fieldValue, dataSource){
	
	//console.log("Field Name: " + fieldName);
	//console.log("Field Value: " + fieldValue);
	//console.log("Field DataSource: " + dataSource);
	//console.log("---------------------------------------------------------");

	var dataSource = ( typeof(dataSource) != 'undefined' ) ? dataSource : '';
	
	var CSS = new Array();
	CSS['field'] = CSS['value'] = '';
	
	if( dataSource != '' ){
		CSS['field'] = "field_" + dataSource;
		CSS['value'] = "value_" + dataSource;
	}
	var Result = new Array();
	
	//default 
	Result['field'] = fieldAlias(fieldName);
	Result['value'] = fieldValue;
	
	//Acres
	//check if Value is numeric and has a large decmil place, round it up
	if(fieldName == "MAP_ACRES" && !isNaN( fieldValue )){
		Result['value'] = Math.round(fieldValue*100)/100;	
	}
	//landuse
	if( fieldName == "LANDUSE_CODE" ){ Result['value'] = landuseAlias( fieldValue );}
	//zoning
	if( fieldName == "ZONE_CODE" ){ Result['value'] = zoningAlias( fieldValue );}
	//municipalities
	if( fieldName == "MUN_CODE" ){ Result['value'] = muncodeToName( fieldValue );}
	
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