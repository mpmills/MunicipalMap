// adapted BK arrays to aliases object.. this could be dynamically linked to layer domains

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

    // should be identified by layer


    "fieldNames" :{
        "PID" : "PID",
        "PAMS Pin" : "PAMS Pin",
        "PAMS_PIN" : "PAMS Pin",
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

// OBJECTS TO HOLD DISPLAY PROPERTIES FOR FEATURES
var F_outFields = {
    "parcel":[ "PID", "PAMS_PIN" ,"BLOCK", "LOT", "OLD_BLOCK", "OLD_LOT", "FACILITYNAME", "PROPERTY_ADDRESS", "MAP_ACRES", "TAX_ACRES", "MUN_CODE","QUALIFIER" ],
    "parcelB":[ "PID", "PAMS_PIN", "MUN_CODE", "BLOCK", "LOT", "OLD_BLOCK", "OLD_LOT", "FACILITY_NAME", "PROPERTY_ADDRESS" ],
    "owner":[ "OWNID", "NAME", "ADDRESS", "CITY_STATE", "ZIPCODE" ],
    "building":[ "PID", "BID", "MUNICIPALITY", "BUILDING_LOCATION" ,"FACILITY_NAME" ],
    "ERIS":[ "*" ]
}

// Map InfoWindow Templates (Pop-ups when highlighted feature is clicked)
var F_IW_templates = {

    "parcel":{
        "title": f_getWindowTitle,
        "content": f_getWindowContent
    },
    "parcel_buffer":{
        "title":"${PID}<br /><a class=\"parcelTools buffer\" href=\"#test\">Buffer</a>",
        "content":"PAMS_PIN: ${PAMS_PIN}<br />MUN_CODE: ${MUN_CODE}<br />PROPERTY_ADDRESS: ${PROPERTY_ADDRESS}<a href=\"#\" onclick=\"clk_buffer_parcel(${OBJECTID})\">link</a>"
    },
    "searchParcel":{
        "title":"${PID}<br /><a class=\"parcelTools buffer\" href=\"#test\">Buffer</a>",
        "content":"PAMS_PIN: ${PAMS_PIN}<br />MUN_CODE: ${MUN_CODE}<br />PROPERTY_ADDRESS: ${PROPERTY_ADDRESS}<a href=\"#\" onclick=\"clk_buffer_parcel(${OBJECTID})\">link</a>"
    }
}


// options for municipality search is built with JSON object. centroid is not yet used, but should be implemented for a zoom to muni function
// json object for municipality data for dropdowns, zoom features
// could be combined with aliases.munCodes, but will need js function updates throughout webapp
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


// JSON object for Table of Contents Creation.. exported from excel file and tweaked here
// each grouping contains multiple layers..
// each layer has...
// id:   which correspondes to the mxd layer id
// name: name which is displayed in the Table of Contents
// vis: a default visibility.. 0 = visible, 1 = visible
// ident: used to designate inclusion in identify functions
// desc: used for tool tips on hover of name

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

// json object for dynamic imagery layer creation.. objects can be commented for exclusion
// properties are self explanatory
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


// layer id and fields to display for identify operations
var identify_fields_json = {
    14:["FIRM_PAN"], // fema panel
    25:["TMAPNUM","STATUS "], // riparian claim
    27:["FLD_ZONE","FLOODWAY","STATIC_BFE","SFHA_TF"], //fema 100yr flood
    28:["LABEL07","TYPE07","ACRES","LU07"], // wetlands
    1: ["MUNICIPALITY","TIDEGATE_NAME","GPSPOINT_TYPE","ELEVATION","DATE_OBS","TYPE_OF_TIDE_GATE","TYPE_OF_GATE","FUNCTIONALITY","MAINTENANCEREQUIRED"], //tidegates
    13:["TYPE"], //drainage
    23:["TYPE"], //hydro lines
    5: ["MUNICIPALITY","CATCHBASINTYPE", "CATCHBASINSHAPE", "WATERTYPE","RECIEVINGWATER","WALLMATERIAL", "RIM"], //stormwater catchbasin
    6: ["NJMCMANHOLEID","MANHOLETYPE","WALLMATERIAL"], //stormwater manhole
    7: ["NJMCOUTFALLID","RECEIVINGWATERS","HEADWALL","DIAMETER","MATERIAL","OUTLETCONDITION","SCOURING","OWNEDBY","MAINTAINEDBY"], //sotmwater outfal
    8: ["NJMCLINEID","FROMSTRUCTURE","TOSTRUCTURE","DIAMETER","LENGTH","INVERTUP","INVERTDOWN"], // stormwater line
    9: ["NJMCMANHOLEID","WALLMATERIAL","WATERTYPE","LOCATIONDESCRIPTION","RIMELEVATION"], //sanitary manhole
    10:["NJMCLINEID","FROMSTRUCTURE","TOSTRUCTURE","DIAMETER","HEIGHT","LENGTH","MATERIAL","INVERTUP","INVERTDOWN"], //sanitary line
    11:["ID","STREET","LOCATION1","LOCATION2","ACCESS_","PIPE_DIAMETER","PIPEDIAMETER_VALUE"], //hydrants
    26:["BID","FACILITY_NAME","BUILDING_LOCATION","TOTALBLDG_SF"], //buildings
    31:["LandUse_Code"], //landuse
    32:["Zone_Code"], //zoning
    22:["ENCUMBRANCETYPE","ENCUMBRANCEOWNER","ENCUMBRANCEDESCRIPTION"], //encumberance
    29:["NAME10"],  //voting districts
    0: ["ELEVATION"], //sopt elevations
    15:["Elevation","Type"], //fence line
    16:["ELEVATION"], //countor lines
    12:["SLD_NAME"], //dot roads
    17:["Elevation","Type"], //rail
    18:["Elevation","Type"] //roads row
};

var printMapLink = "http://webmaps.njmeadowlands.gov/municipal/print_parcel_info.php?id=";

function f_getWindowTitle( graphic ){
    var attribs = graphic.attributes;
    return "<div style=\"border-bottom:1px solid #CCC\">" + attribs.PROPERTY_ADDRESS + "</div>" +

        "<div style=\"text-align:center;margin-top:5px\" class=\"dParcelItem\">" +
        //"<a onclick=\"f_feature_action('zoomTo', 'selection', 'PID', '" + attribs.PID + 	"')\" href=\"#\">Zoom To</a> " +
        //"<a onclick=\"f_feature_action('panTo',  'selection', 'PID', '" + attribs.PID + 	"')\" href=\"#\">Pan To</a> " +
        //"<a onclick=\"f_feature_action('flash',  'selection', 'PID', '" + attribs.PID + 	"')\" href=\"#\">Flash</a> " +
        "<a href=\"http://webmaps.njmeadowlands.gov/municipal/print_parcel_info.php?id=" + attribs.PID + "\" target=\"_blank\">Print</a> " +
        "<a  onclick=\"f_feature_action('Remove', 'selection', 'PID', '" +  attribs.PID + "')\" href=\"#\">Remove</a> " +
        "</div>"
};

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
        content: "" +
            "<div class=\"ResultList\" style=\"border-bottom:none\">"+
                FormatResult( "MUN_CODE", attribs.MUN_CODE, "selection" ) +
                FormatResult( "PAMS_PIN", attribs.PAMS_PIN, "selection" ) +
                FormatResult( "BLOCK", attribs.BLOCK, "selection" ) +
                FormatResult( "Lot", attribs.LOT, "selection" ) +
                FormatResult( "OLD_BLOCK", attribs.OLD_BLOCK, "selection" ) +
                FormatResult( "OLD_LOT", attribs.OLD_LOT, "selection" ) +
                FormatResult( "PROPERTY_ADDRESS", attribs.PROPERTY_ADDRESS, "selection" ) +
                FormatResult( "TAX_ACRES", attribs.TAX_ACRES, "selection" ) +
                FormatResult( "MAP_ACRES", attribs.MAP_ACRES, "selection" ) +
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

    //bc.addChild(cp1);
    bc.addChild(tc);

    return bc.domNode;

}

function f_getContentAttributes(attribs){

    var divOut = dojo.doc.createElement("div");

    var fields = {
       "Municipality" : "MUN_CODE",
       "PAMS Pin" : "PAMS_PIN",
       "Block" : "BLOCK",
       "Lot" : "LOT",
       "Old Block" : "OLD_BLOCK",
       "Old Lot" : "OLD_LOT",
       "Address" : "PROPERTY_ADDRESS",
       "Tax Acres" : "TAX_ACRES",
       "GIS Acres" : "MAP_ACRES"
};

    dojo.forEach(fields,function(field){
        var div = dojo.doc.createElement("div");
        var spanA = dojo.doc.createElement("span");
        var spanB = dojo.doc.createElement("span");

        div.setAttribute("class", "IW_att_row");

        spanA.setAttribute("class", "field field_selection");
        spanA.innerHTML = field;

        spanB.setAttribute("class", "value value_selection");
        spanB.innerHTML = FormatResult(fields[field], attribs[fields[field]], "selection");

        div.appendChild(spanA);
        div.appendChild(spanB);

        divOut.appendChild(div)
    });

    return divOut;

////
//    return  "<div >" +
//        "<div class=\"IW_att_row\"><span class=\"field field_selection\">Municipality</span>:	<span class=\"value value_selection\"> " + attribs.MUN_CODE			+ "</span></div>" +
//        "<div class=\"IW_att_row\"><span class=\"field field_selection\">PAMS Pin</span>:		<span class=\"value value_selection\"> " + attribs.PAMS_PIN			+ "</span></div>" +
//        "<div class=\"IW_att_row\"><span class=\"field field_selection\">Block</span>:			<span class=\"value value_selection\"> " + attribs.BLOCK				+ "</span></div>" +
//        "<div class=\"IW_att_row\"><span class=\"field field_selection\">Lot</span>:			<span class=\"value value_selection\"> " + attribs.LOT				+ "</span></div>" +
//        "<div class=\"IW_att_row\"><span class=\"field field_selection\">Old Block</span>:		<span class=\"value value_selection\"> " + attribs.OLD_BLOCK		 	+ "</span></div>" +
//        "<div class=\"IW_att_row\"><span class=\"field field_selection\">Old Lot</span>:		<span class=\"value value_selection\"> " + attribs.OLD_LOT			+ "</span></div>" +
//        "<div class=\"IW_att_row\"><span class=\"field field_selection\">Address</span>:		<span class=\"value value_selection\"> " + attribs.PROPERTY_ADDRESS	+ "</span></div>" +
//        "<div class=\"IW_att_row\"><span class=\"field field_selection\">Tax Acres</span>:		<span class=\"value value_selection\"> " + attribs.TAX_ACRES	 		+ "</span></div>" +
//        "<div class=\"IW_att_row\"><span class=\"field field_selection\">GIS Acres</span> :		<span class=\"value value_selection\"> " + attribs.MAP_ACRES	 		+ "</span></div>" +
//        "</div>";

// output +=  FormatResult( attr, featureAttributes[ attr ], "selection" );
}