window.onload=function() /*initial slider setup*/
{
	var container = document.getElementById("sliderContainer");
	container.setAttribute('currslide', '0');
}

// run the currently selected effect
function boogieWoogieWoogie(slidetype)
{
	// get effect type from
	var selectedEffect = $( "#slidetype" ).val();
	// most effect types need no options passed by default
	var options = {};
	// some effects have required parameters
	if ( selectedEffect === "scale" ) {
	options = { percent: 0 };
	} else if ( selectedEffect === "transfer" ) {
	options = { to: "#button", className: "ui-effects-transfer" };
	} else if ( selectedEffect === "size" ) {
	options = { to: { width: 200, height: 60 } };
	}
	// run the effect
	$( "#effect" ).effect( selectedEffect, options, 500, callback );
};

// callback function to bring a hidden box back
function callback() {
setTimeout(function() {
$( "#effect" ).removeAttr( "style" ).hide().fadeIn();
}, 1000 );
};

