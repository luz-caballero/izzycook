( function( api ) {

	// Extends our custom "coffee-brewery" section.
	api.sectionConstructor['coffee-brewery'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );