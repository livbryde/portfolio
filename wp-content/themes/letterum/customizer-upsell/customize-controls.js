( function( api ) {
	api.sectionConstructor['letterum-upsell'] = api.Section.extend( {
		attachEvents: function () {},

		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
