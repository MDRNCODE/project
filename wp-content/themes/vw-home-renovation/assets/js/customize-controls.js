( function( api ) {

	// Extends our custom "vw-home-renovation" section.
	api.sectionConstructor['vw-home-renovation'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );