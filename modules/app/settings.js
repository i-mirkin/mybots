$(document).ready(function() {
	global_settings(defaultval);
	//console.log(defaultval.theme);

	// loop and active mark default values
	for (var key in defaultval) {
		if (defaultval.hasOwnProperty(key)) {
			//console.log(key + " : " + defaultval[key]);
		}
	}

	// on click any link apply settings
	$(document).on('click', '.nav-site-mode', function(e) {
		e.preventDefault();
		var cur_mode = $('body').attr('data-header');
		console.log(cur_mode);
		if (cur_mode == 'light') {
			var set_sitemode = { header: 'dark', menu: 'dark', footer: 'dark', footer_menu_style: 'dark', site_mode: 'dark'};
			site_mode_settings(set_sitemode);
		} else {
			var set_sitemode = { header: 'light', menu: 'light', footer: 'light', footer_menu_style: 'light', site_mode: 'light'};
			site_mode_settings(set_sitemode);
		}

		//settings_session();
	});

	function site_mode_settings(obj) {
		$.each(obj, function(type, value) {
			console.log( type + ": " + value );
			$('body').attr('data-' + type, value);
			localStorage[type] = value;
		});
	}

	function global_settings(defaultval) {
		// Set default values in localstorage if no value is set yet
		for (var key in defaultval) {
			if (defaultval.hasOwnProperty(key)) {
				//console.log(key + ' : ' + defaultval[key]);
				if (localStorage.getItem(key) == '' || localStorage.getItem(key) == null) {
					//console.log('set now: ');
					localStorage[key] = defaultval[key];
				}
			}
			//console_log(key+": "+localStorage[key]);

			// Set body tag attributes based on localstorage
			// Also Set Settings checked values based on localstorage
			if (localStorage.getItem(key) != '') {
				$('body').attr('data-' + key, localStorage[key]);
			}
		}

		/*console_log(localStorage.site_mode);
        type = "site_mode";
        value = localStorage.site_mode;
        $("body").attr('data-'+type,value);*/

		/*// loop and active mark default values
        for (var key in defaultval) {
          if(defaultval.hasOwnProperty(key)){
            //console_log(key + " : " + defaultval[key]);
            //$(".appsettings[data-type='"+key+"'][data-value='"+defaultval[key]+"']").addClass("active");
          }
        }*/
	}

	// function settings_session() {
	// 	var type = 'aa';
	// 	sess = '';
	// 	$('.sidesettings .appsettings.active').each(function(index) {
	// 		sess += $(this).attr('data-type') + ':';
	// 		sess += $(this).attr('data-value') + '|';
	// 	});

	// 	$.post(
	// 		'includes/settings_session.php',
	// 		{
	// 			sess: sess
	// 		},
	// 		function(response, status) {
	// 			//console.log("*----Received Data----*nnResponse : " + response+"nnStatus : " + status);
	// 		}
	// 	);
	// }
});
//console.log(localStorage);
//resetSettings();

function resetSettings(){
	console.log(localStorage);

	for (var key in defaultval) {
		if (defaultval.hasOwnProperty(key)) {
			//console.log(key + ' : ' + defaultval[key]);
	//		if (localStorage.getItem(key) == '' || localStorage.getItem(key) == null) {
				console.log('reset: '+key);
				localStorage[key] = '';
	//		}
		}
	}

}